<table class="table table-hover">
    <thead>
    <tr class="table-info">
        <th scope="col">#</th>
        <th scope="col">Email</th>
        <th scope="col">Fullname</th>
        <th scope="col">Phone</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->email }}</td>
            <td>{{ $user->fullname }}</td>
            <td>{{ $user->phone_number }}</td>
            <td>
                <button type="button" class="btn btn-primary">Edit</button>
                <button type="button" class="btn btn-danger btn-delete"
                        onclick="deleteUser( {{ $user->id }}) ;">Delete
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>