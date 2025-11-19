<div class="w-full h-full overflow-x-auto">

    <table class="table table-auto table-sm table-pin-rows w-full table-bordered text-center">
        <thead>
            <tr>
                <th>Actions</th>
                <th>Project Number</th>
                <th>Project Name</th>
                <th>Project City/Municipality</th>
                <th>No. of Beneficiaries</th>
                <th>No. of Seniors</th>
                <th>No. of Females</th>
                <th>Implementation Date</th>
                <th>Total Cost</th>
            </tr>
        </thead>
        <tbody class="uppercase">
            @forelse ($projects as $project)
                <tr>
                    <td>
                        <div class="dropdown">
                            <div tabindex="0" role="button" class="btn btn-xs btn-success">Action</div>
                            <ul tabindex="-1"
                                class="dropdown-content menu bg-base-100 rounded-box z-1 w-52 p-2 shadow-sm">
                                <li><button wire:click=''><i class="fa-solid fa-eye min-w-5 text-center"></i>
                                        View</button></li>
                                <li><button wire:click=''><i class="fa-solid fa-eye min-w-5 text-center"></i>
                                        Details</button></li>
                                <li><button wire:click=''><i class="fa-solid fa-eye min-w-5 text-center"></i>
                                        Update</button></li>
                                <li><button wire:click=''><i class="fa-solid fa-eye min-w-5 text-center"></i>
                                        Export</button></li>
                                <li><button wire:click='deleteProject({{ $project->id }})'><i
                                            class="fa-solid fa-eye min-w-5 text-center"></i> Delete</button></li>
                            </ul>
                        </div>
                    </td>
                    <td>{{ $project->project_number ?? 'N/A' }}</td>
                    <td>{{ $project->project_name ?? 'N/A' }}</td>
                    <td>{{ $project->cityMunicipality->name ?? 'N/A' }}</td>
                    <td>{{ $project->number_of_beneficiaries ?? 0 }}</td>
                    <td>{{ $project->number_of_seniors ?? 0 }}</td>
                    <td>{{ $project->number_of_females ?? 0 }}</td>
                    <td>{{ $project->implementation_date }}</td>
                    <td>{{ number_format($project->total_cost, 2) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">No projects found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @if (!$projects->isEmpty())
        {{ $projects->links() }}
    @endif
</div>
