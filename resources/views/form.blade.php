<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
    <h1 class="text-center">Register</h1>

    <form action="{{ url('/') }}/register" enctype="multipart/form-data" method="post">
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
        <span class="text-danger">
            @error('name')
                {{ $message }}
            @enderror
        </span>
    </div>


    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
        <span class="text-danger">
            @error('email')
                {{ $message }}
            @enderror
        </span>
    </div>


    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
        <span class="text-danger">
            @error('phone')
                {{ $message }}
            @enderror
        </span>
    </div>


    <div class="mb-3">
        <label for="gender" class="form-label">Gender</label>
        <select class="form-control" id="gender" name="gender">
            <option value="">Select Gender</option>

            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>
                Male
            </option>

            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>
                Female
            </option>
        </select>
        <span class="text-danger">
            @error('gender')
                {{ $message }}
            @enderror
        </span>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Image</label>
        <input type="file" class="form-control" id="file" name="image">
    </div>

    <button type="submit" class="btn btn-primary">
        Submit
    </button>
</form>

  </body>
</html>