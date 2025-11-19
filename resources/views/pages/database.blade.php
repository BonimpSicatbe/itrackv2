<x-app-layout>
    <div class="flex flex-col gap-4 w-full h-full">
        <div class="flex flex-row gap-4 w-full">
            <button type="button" class="btn btn-sm btn-success"><i class="fa-solid fa-file-export"></i> Export
                Beneficiaries</button>
            <button type="button" class="btn btn-sm btn-success btn-outline"><i class="fa-solid fa-search"></i>
                Quick Search</button>
            <div class="grow"></div>
            <input type="search" name="search" id="search" class="input input-sm input-bordered"
                placeholder="Search...">
            <livewire:projects.create-project />
        </div>
        <livewire:projects.project-list />
    </div>
</x-app-layout>
