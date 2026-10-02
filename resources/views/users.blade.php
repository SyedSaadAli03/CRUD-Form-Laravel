<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h1>Users</h1>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Action</th>
                <th>Image</th>

            </tr>
        </thead>

        <tbody>

            @foreach($users as $user)

            <tr>
                <td>{{ $user->id }}</td>

                <td>{{ $user->name }}</td>

                <td>{{ $user->email }}</td>

                <td>{{ $user->phone }}</td>

                <td>{{ $user->gender }}</td>

                <td>
                    @if($user->image)
        <img
            src="{{ asset('uploads/'.$user->image) }}"
            width="80"
            height="80"
            style="object-fit: cover;"
            alt="User Image"
        >
         @else
        No Image
         @endif
            </td>
                <td>
                <a href="{{ url('/user/'.$user->id.'/edit') }}" class="btn btn-primary">Edit</a>
                <form action="{{ url('/user/'.$user->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">
                Delete
                </button>
                </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
