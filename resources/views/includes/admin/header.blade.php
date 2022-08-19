<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@isset($title) {{ $title }} @endisset - Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('/assets/css/admin.css') }}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
</head>
<body>
    <header class="bg-primary p-2 text-light">
        <div class="brand"><img src="{{ asset('/assets/images/bitcoin-15.png') }}" title="" style="width: 100%"/></div></header>
    <div class="container-fluid">
    <div class="row flex-xl-nowrap">
        <div class="col-md-3 col-12 col-xl-2">
            <nav class="v10 fh">
                <ul class="side-nav fh pt-3">
                    <li class="{{(isset($page_title) && $page_title == 'Dashboard' ? 'active' : '')}}">
                        <a href="{{ url('/admin/dashboard') }}"> Dashboard</a>
                    </li>
                    <li class="{{(isset($page_title) && $page_title == 'Users' ? 'active' : '')}}">
                        <a href="{{ url('/admin/users') }}"> Users</a>
                    </li>
                    <li class="{{(isset($page_title) && $page_title == 'Investment Plans' ? 'active' : '')}}">
                        <a href="{{ url('/admin/investments') }}"> Investment Plans</a>
                    </li>
                    <li class="{{(isset($page_title) && $page_title == 'User Investments' ? 'active' : '')}}">
                        <a href="{{ url('/admin/user-investments') }}"> User Investments</a>
                    </li>
                    <li class="{{(isset($page_title) && $page_title == 'deposits' ? 'active' : '')}}">
                        <a href="{{ url('/admin/deposits') }}"> Deposits</a>
                    </li>
                    <li class="{{(isset($page_title) && $page_title == 'Withdrawals' ? 'active' : '')}}">
                        <a href="{{ url('/admin/withdrawals') }}"> Withdrawals</a>
                    </li>

                    <li class="{{(isset($page_title) && $page_title == 'Fund Wallet' ? 'active' : '')}}">
                        <a href="{{ url('/admin/fund-wallet') }}"> Wallet Top Up</a>
                    </li>
                    <li class="{{(isset($page_title) && $page_title == 'Payment Settings' ? 'active' : '')}}">
                        <a href="{{ url('/admin/payment-settings') }}"> Payment Settings</a>
                    </li>
                    <li class="{{(isset($page_title) && $page_title == 'Settings' ? 'active' : '')}}">
                        <a href="{{ url('/admin/settings') }}"> Site Settings</a>
                    </li>
                    <li>
                        <a href="{{ url('/logout') }}">Logout</a>
                    </li>
                </ul>
            </nav>
        </div>

        <main class="col-12 col-xl-10 col-md-9">
        <div class="container">
        @if (session('success') !== null)
       
        <div class="alert alert-success mb-3 mt-5">
            {{ session('success') }}
        </div>
        
        @endif
        
        @if (session('error') !== null)
      
        <div class="alert alert-danger mb-3 mt-5">
            {{ session('error') }}
        </div>
        
        @endif
        
        @if ($errors->any())

        <div class="alert alert-danger mb-3 mt-5">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        
        @endif
    </div>