<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class CreateProject extends Component
{
    use WithFileUploads;

    #[Validate('required|string|max:255|unique:projects,project_number')]
    public $project_number;

    #[Validate('required|string|max:255|unique:projects,project_name')]
    public $project_name;

    #[Validate('required|string|max:255')]
    public $city_municipality;

    #[Validate('required|string|max:255')]
    public $partner;

    #[Validate('required|numeric|min:1')]
    public $number_of_days;

    #[Validate('required|date')]
    public $starting_date;

    #[Validate('required|date|after:starting_date')]
    public $ending_date;

    #[Validate('required|numeric|min:0')]
    public $number_of_beneficiaries;

    #[Validate('required|numeric|min:0')]
    public $daily_wage;

    #[Validate('required|numeric|min:0')]
    public $total_cost;

    #[Validate('nullable|file|mimes:xls,xlsx,csv,ods')]
    public $uploaded_file;

    public function mount()
    {
        $this->number_of_days = 10;
        $this->number_of_beneficiaries = 0;
        $this->daily_wage = number_format(600, 2, '.', '');
        $this->total_cost = number_format(0, 2, '.', '');
        $this->starting_date = Carbon::today()->toDateString();
        $this->ending_date = Carbon::parse($this->starting_date)
            ->addDays((int) $this->number_of_days)
            ->toDateString();
    }

    // Triggered after any property is updated
    public function updated($propertyName)
    {
        // Recalculate when relevant fields change
        if (in_array($propertyName, ['daily_wage', 'number_of_beneficiaries', 'number_of_days'])) {
            $this->calculateTotalCost();
        }

        // Update ending date when number_of_days changes
        if ($propertyName === 'number_of_days' && $this->starting_date && $this->number_of_days) {
            $this->updateEndingDate();
        } elseif ($propertyName === 'starting_date' && $this->starting_date && $this->number_of_days) {
            $this->updateEndingDate();
        }

        // Update number_of_days when ending_date changes
        if ($propertyName === 'ending_date' && $this->starting_date && $this->ending_date) {
            $this->updateNumberOfDays();
        }
    }

    private function updateNumberOfDays()
    {
        $start = Carbon::parse($this->starting_date);
        $end = Carbon::parse($this->ending_date);
        $this->number_of_days = max(0, $start->diffInDays($end));
    }

    private function updateEndingDate()
    {
        $this->ending_date = Carbon::parse($this->starting_date)
            ->addDays((int) $this->number_of_days) // Cast to int
            ->toDateString();
    }

    private function calculateTotalCost()
    {
        $beneficiaries = (float) ($this->number_of_beneficiaries ?? 0);
        $days = (float) ($this->number_of_days ?? 0);
        $wage = (float) ($this->daily_wage ?? 0);

        $this->total_cost = number_format($beneficiaries * $days * $wage, 2, '.', '');
    }

    public function createProject()
    {
        $validated = $this->validate();

        // Exclude uploaded_files from validated
        unset($validated['uploaded_file']);

        // Uppercase all string values
        foreach ($validated as $key => $value) {
            if (is_string($value)) {
                $validated[$key] = mb_strtoupper($value);
            }
        }

        // Create project
        $project = Project::create($validated);

        $this->reset();
        $this->mount();
        $this->dispatch('project-created');
    }

    public function render()
    {
        return view('livewire.projects.create-project', [
            'city_municipalities' => \App\Models\CityMunicipality::orderBy('name')->get(),
        ]);
    }
}
