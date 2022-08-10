<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@isset($title) {{$title}} @endisset - {{config('app.name')}}</title>
    
<link href="{{ asset('favicon.png') }}" rel="icon" type="image/x-icon" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

{{-- Our css --}}
<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet"/>
<link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet" />

<link href="{{ asset('assets/css/home.css') }}" rel="stylesheet"/>

<link href="{{ asset('assets/css/dataurl.css') }}" rel="stylesheet"/>

<link href="{{ asset('assets/css/iziModal.min.css') }}" rel="stylesheet"/>

<link rel="manifest" href="{{ asset('assets/js/manifest.json') }}" />
<meta name="theme-color" content="#FD961A">
<meta name="msapplication-navbutton-color" content="#FD961A" />
<!-- iOS Safari -->
<meta name="apple-mobile-web-app-status-bar-style" content="#FD961A" />


<meta name="theme-color" content="#FD961A" />
<meta name="msapplication-navbutton-color" content="#FD961A" />
<!-- iOS Safari -->
<meta name="apple-mobile-web-app-status-bar-style" content="#FD961A" />

<link rel="icon" sizes="192x192" href="{{ asset('/assets/images/icon/icon-192.png') }}">

<meta name="keywords" content="Global Options FX Trade, cryptocurrency, investments" />
<meta property="og:image" content="{{ asset('/assets/images/icon/icon-310x310.png') }}" />

<meta name="msapplication-square310x310logo" content="{{ asset('/assets/images/icon/icon-310x310.png') }}" />
<meta name="msapplication-square70x70logo" content="{{ asset('/assets/images/icon/icon-70x70.png') }}" />
<meta name="msapplication-square150x150logo" content="{{ asset('/assets/images/icon/icon-150x150.png') }}" />
<meta name="msapplication-wide310x150logo" content="{{ asset('/assets/images/icon/icon-310x150.png') }}" />


<script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('/assets/js/jquery-ui.js') }}"></script>
<script src="{{ asset('/assets/js/jquery.form.js') }}"></script>

<script src="{{ asset('/assets/js/pace.min.js') }}"></script>

<link href="{{ asset('/assets/css/select2.min.css') }}" rel="stylesheet" />

    <script>
    var fade_outthis = function() {
        $(".alert").fadeOut().empty();
    }
    setTimeout(fade_outthis, 8000);
    
    $(document).ready(function(){
        $(".closebtn").click(function(){
            $(this).parent().fadeOut().empty();
        });
    });
    </script>
    </head>
    <body>
    
    <header class="cpanel_header row" id="cpanel_header">
        <ul>
            <li class="bar"><a id="menu_btn"><i class="fa fa-align-left"></i></a></li>
            <li class="brand"><img src="{{ asset('/assets/images/bitcoinn.png') }}" title="Global Options FX Trade"/></li>
            <li class="user"><a href="#" id="open_account"><i class="fa fa-user"></i></a>
            </li>
        </ul>
    </header>
    <div id="account" class="udex-animate-right">
        <ul>
            <li class="title">Account</li>
            <li><a href="https://globaloptionsfxtrade.com/account/info"><i class="fa fa-user"></i> Allen Coza</a></li>
            <li><a href="https://globaloptionsfxtrade.com/account/security"><i class="fa fa-gear"></i> Safety & Security</a></li>
            <li><a href="https://globaloptionsfxtrade.com/account/changepass"><i class="fa fa-lock"></i> Change Password</a></li>
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-power-off"></i> Sign Out</a></li>
        </ul>
    </div>
    <script>
    $('#open_account').click( function(){
        $("#account").toggle();
        $("#main, header, .cpanel_info, .udex_footer").toggleClass("cubic-right");
        $("body").toggleClass("udex_overflow");
    });
    $("#menu_btn").click( function(){
        $("#mySidebar").toggle();
        $("#main, header, .cpanel_info, .udex_footer").toggleClass("cubic-left");
        $("body").toggleClass("udex_overflow");
    });
    </script>	
    <style rel="modal-content">
        @media handheld, only screen and (max-width: 700px) {
            #modal-content{
                width: 90% !important;
                max-width: 90% !important;
                left: 0 !important;
            }
        }
        input, textarea { max-width: 100%; }
    </style>
    
    
    
    
    
    
    <style type="text/css">
    #imgArea {
        display: block;
        margin: 0 auto;
        position: relative;
        font-size: 13px;
        overflow:hidden;
    }
    #imgArea img {
        outline: medium none;
        vertical-align: middle;
        width: 100%;
    }
    #imgContainer {
        width: 100%;
        text-align: center;
        position: relative;
    }
    #imgChange input[type="file"] {
        bottom: 0;
        cursor: pointer;
        height: 100%;
        left: 0;
        margin: 0;
        opacity: 0;
        padding: 0;
        position: absolute;
        width: 100%;
    }
    /* Progressbar */
    .progressBar {
        background: none repeat scroll 0 0 #fff;
        left: 0;
        padding: 5px 0;
        position: absolute;
        top: 50%;
        width: 100%;
        display: none;
    }
    .progressBar .bar {
        background-color: #2196f3;
        width: 0%;
        height: 18px;
    }
    .progressBar .percent {
        display: inline-block;
        left: 0;
        position: absolute;
        text-align: center;
        top: 5px;
        color: #FFF;
        width: 100%;
    }
    #imgChange {
        position: relative;
    }
    .mb-3 {
        margin-bottom: 15px;
    }
    </style>
    <div class="default cpanel_info">
        USER ID: ZCI-422248</div>
    <div class="udex-sidebar udex-collapse udex-animate-left" id="mySidebar">
        <ul class="udex-ul">
            <li class="header"><a href="https://globaloptionsfxtrade.com/account"><i class="fa fa-home"></i> MY OFFICE</a></li>
            <li ><a href="https://globaloptionsfxtrade.com/account/transaction-log"> <i class="fa fa-history"></i> User Activity Log</a></li>
            <li ><a href="{{url('/user/deposit')}}"> <i class="fa fa-inbox"></i> Deposit Funds</a></li>
            <li ><a href="{{url('/user/withdrawal')}}"> <i class="fa fa-money"></i> Withdraw Funds</a></li>
            <li ><a href="https://globaloptionsfxtrade.com/account/investment-new"> <i class="fa fa-database"></i> New Investment</a></li>
            <li ><a href="https://globaloptionsfxtrade.com/account/reference-user"> <i class="fa fa-crosshairs"></i> Affiliate Program</a></li>
            <li ><a href="https://globaloptionsfxtrade.com/account/testimony"> <i class="fa fa-bullhorn"></i> Write Testimony</a></li>
            <li ><a href="https://globaloptionsfxtrade.com/account/info"> <i class="fa fa-gears"></i> Account Settings</a></li>
            <li ><a href="https://globaloptionsfxtrade.com/account/trading-view"> <i class="fa fa-bullseye"></i> Trade View</a></li>
            <li><a href="https://globaloptionsfxtrade.com/logout"> <i class="fa fa-power-off"></i> Logout</a></li>
            <li><a href="https://globaloptionsfxtrade.com/contact"> <i class="fa fa-exclamation-circle"></i> Help</a></li>
        </ul>
    </div>

    <div class="udex-main" id="main">

        <script src="/assets/js/validation.js"></script>
        
    <div class="row kk">
    <div class="col-12" style="padding-top: 0">
        <div class="title_container">
            <ul class="breadcrumb right udex-hidden">
      <li><a href="{{ url('/user/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
      <li class="bold"> {{$page_title ?? ''}} </li></ul>
            <h4>{{$page_title ?? ''}}</h4>
            <span class="decor_default"></span>
        </div>
    </div>

    @if (session('success') !== null)
<div class="col-12">
    <div class="success mb-3">
        {{ session('success') }}
    </div>
</div>
@endif

@if (session('error') !== null)
<div class="col-12">
<div class="danger mb-3">
    {{ session('error') }}
</div>
</div>
@endif

@if ($errors->any())
<div class="col-12">
    <div class="danger mb-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif
