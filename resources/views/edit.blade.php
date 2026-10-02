<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <title>Edit User</title>
</head>

<body>

<div class="container">
    <h1 class="text-center">Edit User</h1>

    <form action="{{ url('/user/'.$user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Name --}}
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}">
            <span class="text-danger">
                @error('name')
                    {{ $message }}
                @enderror
            </span>
        </div>


        {{-- Email --}}
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}">
            <span class="text-danger">
                @error('email')
                    {{ $message }}
                @enderror
            </span>
        </div>


        {{-- Phone --}}
        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" class="form-control" name="phone" value="{{ old('phone', $user->phone) }}">
            <span class="text-danger">
                @error('phone')
                    {{ $message }}
                @enderror
            </span>
        </div>


        {{-- Gender --}}
        <div class="mb-3">
            <label class="form-label">Gender</label>

            <select class="form-control" name="gender">

                <option value="">Select Gender</option>

                <option value="male"
                    {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>
                    Male
                </option>

                <option value="female"
                    {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>
                    Female
                </option>

                <option value="other"
                    {{ old('gender', $user->gender) == 'other' ? 'selected' : '' }}>
                    Other
                </option>

            </select>

            <span class="text-danger">
                @error('gender')
                    {{ $message }}
                @enderror
            </span>
        </div>

        
        @if($user->image)
    <div class="mb-3">
        <label class="form-label">Current Image</label>
        <br>

        <img src="{{ asset('uploads/'.$user->image) }}"
            width="120"
            height="120"
            style="object-fit: cover;"
            alt="Current Image"
        >
    </div>
@endif

<div class="mb-3">
    <label class="form-label">Change Image</label>

    <input
        type="file"
        class="form-control"
        name="image"
    >

    @error('image')
        <span class="text-danger">
            {{ $message }}
        </span>
    @enderror
</div>


        <button type="submit" class="btn btn-success">
            Update
        </button>

    </form>
</div>
</body>
</html>
