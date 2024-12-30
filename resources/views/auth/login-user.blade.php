<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>
<body class="container" style="background: #F3F9FF">
    @if ($errors->any())
        <div class="alert alert-danger pb-0 mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow-sm mx-auto rounded-4 p-4" style="width: 50vh; margin-top: 15vh;">
        <div class="card-body">
            <h4 class="text-center fw-semibold mb-5">Sign In User</h4>
            <form action="{{ route('login.user') }}" method="POST">
                @csrf
                <input class="form-control" type="text" name="username" id="username"
                    value="" placeholder="Username" required>
                <br>

                <input class="form-control" type="password" name="password" id="password"
                    value="" placeholder="Password" required>
                <br>

                <button class="btn btn-primary w-100" type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>