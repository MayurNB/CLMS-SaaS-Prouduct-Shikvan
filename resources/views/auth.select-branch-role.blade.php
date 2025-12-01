<h3>Select Branch & Role</h3>
<form action="{{ route('branch-role.select') }}" method="POST">
    @csrf
    <select name="branch_role_id" required>
        @foreach($branchRoles as $br)
            <option value="{{ $br->id }}">
                {{ $br->branch->name }} - {{ $br->role->display_name }}
            </option>
        @endforeach
    </select>
    <button type="submit">Enter Dashboard</button>
</form>
