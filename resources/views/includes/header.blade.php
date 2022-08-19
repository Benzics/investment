<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@isset($title) {{$title}} @endisset - {{setting('site-name')}}</title>
    
<link href="{{ asset('favicon.png') }}" rel="icon" type="image/x-icon" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

{{-- Our css --}}
<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet"/>
<link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet" />

{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap-grid.min.css" rel="stylesheet"/> --}}
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.0/jquery.min.js" integrity="sha512-synHs+rLg2WDVE9U0oHVJURDCiqft60GcWOW7tXySy8oIr0Hjl3K9gv7Bq/gSj4NDVpc5vmsNkMGGJ6t2VpUMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.50/jquery.form.min.js" integrity="sha512-zsLciaUdJLt5CtNc7c4MO7wa/YHcsHO+MwPGXoZ08Ps8hEAN/YwKqmvzXYv0npytDOJMvYqrt8rN0thncUPOOg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<link href="{{ asset('/assets/css/select2.min.css') }}" rel="stylesheet" />

<script>
    $(document).ready(function() {
        function close_accordion_section() {
            $('.accordion .accordion-section-title').removeClass('active');
            $('.accordion .accordion-section-content').slideUp(300).removeClass('open');
        }
     
        $('.accordion-section-title').click(function(e) {
            // Grab current anchor value
            var currentAttrValue = $(this).attr('href');
     
            if($(e.target).is('.active')) {
                close_accordion_section();
            }else {
                close_accordion_section();
     
                // Add active class to section title
                $(this).addClass('active');
                // Open up the hidden content panel
                $('.accordion ' + currentAttrValue).slideDown(300).addClass('open'); 
            }
     
            e.preventDefault();
        });
    });
    </script>
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
<body class="loading_it">
{{-- <body> --}}

    <header class="header">

     <!-- TradingView Widget BEGIN -->
     <div class="tradingview-widget-container">
        <div class="tradingview-widget-container__widget"></div>
        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
            {
                "symbols": [
                {
                    "description": "Amazon",
                    "proName": "NASDAQ:AMZN"
                },
                {
                    "description": "Facebook",
                    "proName": "NASDAQ:FB"
                },
                {
                    "description": "Alphabet",
                    "proName": "NASDAQ:GOOGL"
                },
                {
                    "description": "Apple",
                    "proName": "NASDAQ:AAPL"
                },
                {
                    "description": "Microsoft",
                    "proName": "NASDAQ:MSFT"
                },
                {
                    "description": "BTC/USD",
                    "proName": "COINBASE:BTCUSD"
                },
                {
                    "description": " \tAlibaba Group Holding",
                    "proName": " \tNYSE:BABA"
                },
                {
                    "description": " \tBerkshire Hathaway",
                    "proName": " \tNYSE:BRK.B"
                },
                {
                    "description": " \tJPMorgan Chase",
                    "proName": " \tNYSE:JPM"
                },
                {
                    "description": "ETH/USD",
                    "proName": "KRAKEN:ETHUSD"
                },
                {
                    "description": " \tJohnson & Johnson",
                    "proName": " \tNYSE:JNJ"
                },
                {
                    "description": " \tExxon Mobil",
                    "proName": " \tNYSE:XOM"
                },
                {
                    "description": " \tRoyal Dutch Shell",
                    "proName": " \tNYSE:RDS.A"
                },
                {
                    "description": " \tBank of America",
                    "proName": " \tNYSE:BAC"
                },
                {
                    "description": "XRP/USD",
                    "proName": "BITFINEX:XRPUSD"
                }
            ],
                    "colorTheme": "dark",
                    "isTransparent": false,
                    "displayMode": "compact",
                    "locale": "en"
            }
        </script>
    </div>
    <!-- TradingView Widget END -->
    
    
    
    
    
    
<div class="container row">
<ul class="topheader">
	<li class="logo">
		<div class="bodycontainer">
			<button class="btn round default right menu"><i class="fa fa-align-right"></i></button>
			<a href="{{ url('/') }}">
				<img src="{{ asset(setting('site-logo-1')) }}" title="Global Options FX Trade"/>
			</a>
		</div>
	</li>
	<li class="data">
		<div class="bodycontainer">
			<ul>
				<li><div>3,649,450 USD</div>Payouts</li>
				<li><div>+5.26%</div>24 hour price</li>
				<li><div>12.820 BTC</div>24 hour volume</li>
				<li><div>69,775</div>active traders</li>
				<li><div class="btcwdgt-price" bw-cur="usd"></div>Live Bitcoin price</li>
			</ul>
		</div>
	</li>
	<li class="account row">
		<div class="bodycontainer">
            @auth
            <div class="button_container">
                <a href="{{ url('/user/dashboard') }}" class="btn"><i class="fa fa-user"></i> DASHBOARD</a>
            </div>
			<div class="button_container">
                <a href="{{ url('/logout') }}" class="btn v2"><i class="fa fa-sign-out"></i> LOGOUT</a>
            </div>
            @else
			<div class="button_container">
                <a href="{{ url('/login') }}" class="btn"><i class="fa fa-user"></i> SIGN IN</a>
            </div>
			<div class="button_container">
                <a href="{{ url('/register') }}" class="btn v2"><i class="fa fa-user-plus"></i> REGISTER</a>
            </div>		
            @endauth
        </div>
	</li>
</ul>
</div>
</header>
<nav class="center">
	<div class="bodycontainer">
		<ul>
			<li><a href="{{ url('/') }}" class="active">HOME</a></li>
			<li><a href="{{ url('/about') }}">ABOUT US</a></li>
			<li><a href="{{ url('#investment') }}">INVESTMENT PLANS</a></li>
			<li><a href="#">LEGAL <i class="fa fa-chevron-down"></i></a>
				<ul>
					<li><a href="{{ url('/terms') }}">TERMS & CONDITIONS</a></li>
					<li><a href="{{ url('/faqs') }}">FAQS</a></li>
				</ul>
			</li>
			<li><a href="{{ url('/contact') }}">CONTACT US</a></li>
			<li><a href="{{ url('/affiliate_program') }}">AFFILIATE</a></li>
		</ul>
	</div>
</nav>
<script>
	$(".menu").click( function(){
		$("nav").slideToggle();
	});
</script>

<div class="preloader">
<div id="bitcoin">
  <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="200px" height="200px" viewBox="100 100 400 400" xml:space="preserve">
    <filter id="dropshadow" height="130%">
  <feGaussianBlur in="SourceAlpha" stdDeviation="5"/>
  <feOffset dx="0" dy="0" result="offsetblur"/>
  <feFlood flood-color="red"/>
<feComposite in2="offsetblur" operator="in"/>
<feMerge>
<feMergeNode/>
<feMergeNode in="SourceGraphic"/>
</feMerge>
</filter>          
<path class="path" style="filter:url(#dropshadow)" fill="#000000" d="M446.089,261.45c6.135-41.001-25.084-63.033-67.769-77.735l13.844-55.532l-33.801-8.424l-13.48,54.068
	c-8.896-2.217-18.015-4.304-27.091-6.371l13.568-54.429l-33.776-8.424l-13.861,55.521c-7.354-1.676-14.575-3.328-21.587-5.073
	l0.034-0.171l-46.617-11.64l-8.993,36.102c0,0,25.08,5.746,24.549,6.105c13.689,3.42,16.159,12.478,15.75,19.658L208.93,357.23
	c-1.675,4.158-5.925,10.401-15.494,8.031c0.338,0.485-24.579-6.134-24.579-6.134l-9.631,40.468l36.843,9.188
	c8.178,2.051,16.209,4.19,24.098,6.217l-13.978,56.17l33.764,8.424l13.852-55.571c9.235,2.499,18.186,4.813,26.948,6.995
	l-13.802,55.309l33.801,8.424l13.994-56.061c57.648,10.902,100.998,6.502,119.237-45.627c14.705-41.979-0.731-66.193-31.06-81.984
	C425.008,305.984,441.655,291.455,446.089,261.45z M368.859,369.754c-10.455,41.983-81.128,19.285-104.052,13.589l18.562-74.404
	C306.28,314.65,379.774,325.975,368.859,369.754z M379.302,260.846c-9.527,38.187-68.358,18.781-87.442,14.023l16.828-67.489
	C327.767,212.14,389.234,221.02,379.302,260.846z"/>
          
</svg>
</div>
</div>
<script>
/*--window load functions--*/
jQuery(window).load(function(){
	var preLoder = $(".preloader");
	preLoder.fadeOut(1000);
	$("body").removeClass("loading_it");
});
</script>