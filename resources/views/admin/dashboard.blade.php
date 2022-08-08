<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@isset($title) {{ $title }} @endisset - Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/assets/css/admin.css') }}" />
</head>
<body>
    <header class="bg-primary p-2 text-light">Admin Panel</header>
    <div class="row">
        <aside class="col-md-3 col-12 col-xl-2">
            <nav class="bg-dark">
                <ul class="side-nav">
                    <li class="active">
                        <a href="#" class="active">Dashboard</a>
                    </li>
                    <li>
                        <a href="#">Users</a>
                    </li>
                    <li>
                        <a href="#">Deposits</a>
                    </li>
                    <li>
                        <a href="#">All Transactions</a>
                    </li>
                    <li>
                        <a href="#">Site Settings</a>
                    </li>
                </ul>
            </nav>
        </aside>
    </div>
</body>
</html>