<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <style>
        main {
            display:block;
            max-width: 500px !important;
            margin-left: auto;
            margin-right: auto;
        }
    </style>

</head>
<body>
    <header class="bg-primary p-4 mb-5 text-light">Admin Login</header>

    <main class="pt-5 mb-5 container">
       
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="" method="post">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Your email" />
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control" />
            </div>
            <div class="form-group">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember Me</label>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Login</button>
            </div>
        </form>
    </main>

</body>
</html>