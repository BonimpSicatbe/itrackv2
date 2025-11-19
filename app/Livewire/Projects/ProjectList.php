<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Livewire\Attributes\On;
use Livewire\Component;

class ProjectList extends Component
{
    public function deleteProject(Project $project)
    {
        $project->delete();
    }

    #[On('project-created')]
    public function render()
    {
        return view('livewire.projects.project-list', [
            'projects' => Project::paginate(20),
        ]);
    }
}
