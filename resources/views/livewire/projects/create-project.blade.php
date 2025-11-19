<div class="">
    <label for="create_project_modal" class="btn btn-sm btn-success"><i class="fa-solid fa-plus min-w-5 text-center"></i>
        Create Project</label>

    <input type="checkbox" id="create_project_modal" class="modal-toggle" />
    <div class="modal" role="dialog">
        <form wire:submit="createProject" class="flex flex-col gap-4 modal-box w-11/12 max-w-5xl">
            <div class="flex flex-row w-full pb-4 border-b border-gray-300">
                <h3 class="text-lg font-bold grow">Create New Project</h3>
                <label for="create_project_modal" class="btn btn-xs btn-ghost btn-default btn-circle"><i
                        class="fa-solid fa-xmark"></i></label>
            </div>
            <div class="bg-blue-800 p-2 text-white font-bold text-lg rounded-lg">Project Information</div>
            <div class="grid grid-cols-2 gap-x-2">
                {{-- Project Number --}}
                <x-text-fieldset label="Project Number" wire:model.live="project_number"
                    id="project_number" />
                {{-- Project Name --}}
                <x-text-fieldset label="Project Name" wire:model.live="project_name"
                    id="project_name" />
                {{-- City/Municipality --}}
                <x-select-fieldset label="City/Municipality" wire:model.live="city_municipality"
                    id="city_municipality">
                    @forelse ($city_municipalities as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @empty
                        <option value="">No City/Municipality Found</option>
                    @endforelse
                </x-select-fieldset>
                {{-- Partner --}}
                <x-text-fieldset label="Partner" wire:model.live="partner" id="partner" />
                {{-- Number of days --}}
                <x-number-fieldset label="Number of days" wire:model.live="number_of_days"
                    id="number_of_days" value="{{ $this->number_of_days }}" />
                {{-- Implementation Date --}}
                <div class="grid grid-cols-2 gap-2">
                    {{-- Starting Date --}}
                    <x-date-fieldset label="Starting Date" wire:model.live="starting_date"
                        id="starting_date" value="{{ $this->starting_date }}" />
                    {{-- Ending Date --}}
                    <x-date-fieldset label="Ending Date" wire:model.live="ending_date"
                        id="ending_date" value="{{ $this->ending_date }}" />
                </div>
                <div class="col-span-2 grid grid-cols-3 gap-2">
                    {{-- Number of Beneficiaries --}}
                    <x-number-fieldset label="Number of Beneficiaries"
                        wire:model.live="number_of_beneficiaries" id="number_of_beneficiaries"
                        value="{{ $this->number_of_beneficiaries }}" />
                    {{-- Daily Wage --}}
                    <x-number-fieldset label="Daily Wage" wire:model.live="daily_wage" id="daily_wage"
                        placeholder="Daily Wage" value="{{ $this->daily_wage }}" readonly />
                    {{-- Total Cost --}}
                    <x-number-fieldset label="Total Cost" wire:model.live="total_cost" id="total_cost"
                        placeholder="Total Cost" value="{{ $this->total_cost }}" readonly />
                </div>
            </div>
            <div class="bg-blue-800 p-2 text-white font-bold text-lg rounded-lg">Upload Documents</div>
            {{-- Uploaded File --}}
            <fieldset class="fieldset">
                <input type="file" wire:model.live="uploaded_file" id="uploaded_file"
                    class="file-input file-input-md file-input-bordered w-full {{ $errors->has('uploaded_file') ? ' file-input-error' : '' }}">
                @error('uploaded_file')
                    <label class="label text-red-500">{{ $message }}</label>
                @enderror
            </fieldset>

            <div class="flex flex-row justify-end gap-2">
                <label for="create_project_modal" class="btn btn-sm btn-default">Cancel</label>
                <button type="submit" class="btn btn-sm btn-success" x-loading="Creating...">Create Project</button>
            </div>
        </form>
        <label class="modal-backdrop" for="create_project_modal"></label>
    </div>
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('project-created', () => {
                document.getElementById('create_project_modal').checked = false;
            });
        });
    </script>
</div>
