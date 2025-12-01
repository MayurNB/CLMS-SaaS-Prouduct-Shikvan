@forelse($branches as $branch)
<tr>
    <td>{{ $branch->branch_name }}</td>
    <td>{{ $branch->address_line_1 }}, {{ $branch->city }}, {{ $branch->state_province }}, {{ $branch->postal_code }}, {{ $branch->country }}</td>
    <td>{{ $branch->contact_email }}, {{ $branch->phone_number }}</td>
    <td> 
        @if($branch->is_active == 1)
        <p>Active</p>
    @else
        <p>Inactive</p>
    @endif
    
    </td>
    <td>
        <!-- The button for opening the small modal -->
        <button class="btn btn-sm btn-primary viewBranchBtn"
        data-coreui-toggle="modal"
        data-coreui-target="#branchDetailModal"
        data-branch='@json($branch)'>
    View
</button>
    </td>
</tr>
@empty
<tr>
    <td colspan="4" class="text-center">No branches found.</td>
</tr>
@endforelse
