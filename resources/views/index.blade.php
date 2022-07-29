<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
<link href="{{ asset('favicon.png') }}" rel="icon" type="image/x-icon" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

{{-- Our css --}}
<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet"/>
<link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet" />

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
				<img src="{{ asset('/assets/images/pro.jpg') }}" title="Global Options FX Trade"/>
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
			<div class="button_container"><a href="{{ url('/login') }}" class="btn"><i class="fa fa-user"></i> SIGN IN</a></div>
				<div class="button_container"><a href="{{ url('/register') }}" class="btn v2"><i class="fa fa-user-plus"></i> REGISTER</a></div>		</div>
	</li>
</ul>
</div>
</header>
<nav class="center">
	<div class="bodycontainer">
		<ul>
			<li><a href="{{ url('/') }}" class="active">HOME</a></li>
			<li><a href="{{ url('/info/about') }}">ABOUT US</a></li>
			<li><a href="{{ url('#investment') }}">INVESTMENT PLANS</a></li>
			<li><a href="#">LEGAL <i class="fa fa-chevron-down"></i></a>
				<ul>
					<li><a href="{{ url('/info/terms') }}">TERMS & CONDITIONS</a></li>
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


<script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
</script>
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/slick/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/slick/slick-theme.css') }}"> 
<style>
.slick-dots{bottom: -10px !important;}
.slick-dotted.slick-slider{ margin-bottom: 0px;}
</style>
<div class="Modern-Slider row center">
  <!-- Item -->
  <div class="item">
    <div class="img-fill">
      <img src="{{ asset('assets/images/912465.jpg') }}" alt="">
      <div class="info-slick">
        <div>
          <h1 class="headering"><span class="text-default">SECURE</span> AND <span class="text-default">EASY WAY</span><br>TO BITCOIN MINNING</h1>
		  <a href="" class="btn">LEARN MORE</a>
        </div>
      </div>
    </div>
  </div>
  <!-- // Item -->
  <!-- Item -->
  <div class="item">
    <div class="img-fill">
      <img src="{{ asset('assets/images/913441.jpg') }}" alt="">
      <div class="info-slick">
        <div>
          <h1 class="headering"><span class="text-default">BITCOIN</span> INVESTMENT<br>YOU CAN <span class="text-default">TRUST</span></h1>
		  <a href="" class="btn">GET STARTED</a>
        </div>
      </div>
    </div>
  </div>
  <!-- // Item -->
</div>
<script src="{{ asset('/assets/js/jquery.fittext.js') }}"></script>
<script>
  $(".headering").fitText(1.3, { minFontSize: 35 });
</script>
    

<div class="dark">
	<div class="bodycontainer" style="padding:0 30px">
	<div class="row" style="background: #1D1D1D; top: -40px; position: relative; text-align: left;">
		<div class="col-4">
			<div class="col-3 col-m-4 center">
				<img src="{{ asset('assets/images/download-bitcoin.png') }}">
			</div>
			<div class="col-9 col-m-8 center-sm">
				<h5 class="text-white">Download Bitcoin Wallet</h5>
				<p>Get it on PC or Mobile to create, send and receive bitcoins.</p>
			</div>
		</div>
		<div class="col-4">
			<div class="col-3 col-m-4 center">
				<img src="{{ asset('assets/images/add-bitcoins.png') }}">
			</div>
			<div class="col-9 col-m-8 center-sm">
				<h5 class="text-white">Add Funds & Start Investment</h5>
				<p>Add bitcoins you’ve created or exchanged via credit card.</p>
			</div>
		</div>
		<div class="col-4">
			<div class="col-3 col-m-4 center">
				<img src="{{ asset('assets/images/buy-sell-bitcoins.png') }}">
			</div>
			<div class="col-9 col-m-8 center-sm">
				<h5 class="text-white">Withdraw Your Profit</h5>
				<p>Request for withdrawal and receive it within 1day.</p>
			</div>
		</div>
	</div>
	<div class="center">
		<h1 class="tlt text-white">ABOUT <span class="text-default">US</span></h1>
		<p class="sub_tlt">MOST FLEXIBLE CRYPTOCURRENCY INVESTMENT COMPANY</p>
	</div>
	
	<div class="row" style="margin-top: 20px">
		<div class="col-6 center">
			<img src="{{ asset('assets/images/about-us.png') }}">
		</div>
		<div class="col-6">
			<h2 class="text-white">WE ARE GLOBAL OPTIONS FX TRADE</h2>
			<p>Global Options FX Trade Investment Company is a distinctive investment company offering our investors access to high-growth investment opportunities in Bitcoin markets and other services. We implement best practices of trading & mining of Bitcoins through our operations, while offering flexibility in our investment plans. Our company benefits from an extensive network of global clients.</p>
			<div id="tabs" style="margin-bottom: 20px">
			  <ul>
				<li><a href="#tabs-1">OUR MISSION</a></li>
				<li><a href="#tabs-2">OUR ADVANTAGES</a></li>
				<li><a href="#tabs-3">OUR GUARANTEES</a></li>
			  </ul>
			  <div id="tabs-1">
				<p>Our aim is to utilize our expertise & knowledge which will benefit our clients and the users of our services.</p>
			  </div>
			  <div id="tabs-2">
				<p>Our mission as an official partner of Bitcoin Foundation is to help you enter and better understand the world of #1 cryptocurrency and avoid any issues you may encounter.</p>
			  </div>
			  <div id="tabs-3">
				<p>We are here because we are passionate about open, transparent markets and aim to be a major driving force in widespread adoption, we are one the bests in cryptocurrency investment.</p>
			  </div>
			</div>
			<a href="info/about" class="btn default">READ MORE</a>
		</div>
	</div>
    </div>
</div>


<div class="darkgrey">
    <div class="bodycontainer-left">
    <div class="row lineup">
        <div class="col-8 center">
            <div class="col-6 col-m-6">
                <div><img src="assets/images/strong-security.png" style="height:40px"></div>
                <h5 class="text-white">STRONG SECURITY</h5>
                <p>Protection against DDoS attacks,<br>full data encryption</p>
            </div>
            <div class="col-6 col-m-6">
                <div><img src="{{ asset('assets/images/world-coverage.png') }}" style="height:40px"></div>
                <h5 class="text-white">WORLD COVERAGE</h5>
                <p>Providing services in 99% countries<br>around all the globe</p>
            </div>
            <div class="col-6 col-m-6">
                <div><img src="{{ asset('assets/images/payment-options.png') }}" style="height:40px"></div>
                <h5 class="text-white">PAYMENT OPTIONS</h5>
                <p>Popular methods: Bitcoin, Ethereum,<br>Skril</p>
            </div>
            <div class="col-6 col-m-6">
                <div><img src="{{ asset('assets/images/mobile-app.png') }}" style="height:40px"></div>
                <h5 class="text-white">MOBILE FRIENDLY</h5>
                <p>Our User Dashboard is Made<br>to match all Mobile resolution</p>
            </div>
            <div class="col-6 col-m-6">
                <div><img src="{{ asset('assets/images/cost-efficiency.png') }}" style="height:40px"></div>
                <h5 class="text-white">COST EFFICIENCY</h5>
                <p>Reasonable trading fees for traders<br>and all market makers</p>
            </div>
            <div class="col-6 col-m-6">
                <div><img src="{{ asset('assets/images/high-liquidity.png') }}" style="height:40px"></div>
                <h5 class="text-white">HIGH LIQUIDITY</h5>
                <p>Fast access to high liquidity orderbook<br>for top currency pairs</p>
            </div>
        </div>
        <div class="col-4 video-lightbox">
            <a href="#" class="play circle js-video-button" data-video-id="GmOzih6I1zs"><i class="fa fa-play"></i></a>	
        </div>
    </div>
    </div>
    </div>
    <script src="{{ asset('assets/js/jquery-modal-video.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/modal-video.min.css') }}">
    <script>
        $(".js-video-button").modalVideo();
    </script>
    <div class="dark" style="padding: 40px 20px 80px 20px" id="investment">
        <div class="bodycontainer center">
            <h1 class="tlt text-white">AFFORDABLE <span class="text-default">PACKAGES</span></h1>
            <p class="sub_tlt">CHOOSE YOUR PREFERABLE PLAN FOR INVESTMENT.</p>
            <div class="row">
                                <div class="col-4 col-m-12">
                    <div class="pricing_header default">
                        <h3 class="bold">MINDFUL</h3>
                        <h6 class="bold">9.5% AFTER 180 DAYS</h6>
                    </div>
                    <div class="pricing_body">
                        <ul>
                            <li>DAILY RETURN</li>
                            <li>INSTANT WITHDRAWAL</li>
                            <li>9.5% ROI EACH TIME</li>
                        </ul>
                        <div class="row pricing_info">
                            <div class="col-6 col-m-6 col-sm-6" style="padding:10px 0 0 0">
                                MINIMUM<br>$ 1000						</div>
                            <div class="col-6 col-m-6 col-sm-6 v2" style="padding: 10px 0 0 0">
                                MAXIMUM<br>$ 15000						</div>
                            <div class="col-12 v3" style="padding: 0">
                                <input type="text" value="$ 8000" id="range_1">
                            </div>
                            <div class="col-12" style="padding: 0">
                                <input type="text" class="range_47" data-id="range_1" data-times="180" data-cent="9.5%" data-per="range1_per" data-total="range1_total" value="8000" data-prefix="$ " data-type="single" data-min="1000" data-max="15000" data-from="8000"/>
                            </div>
                            <div class="col-6 col-m-6 col-sm-6" style="padding:10px 0 0 0">
                                PER TIME<br><span id="range1_per">$ 760</span>
                            </div>
                            <div class="col-6 col-m-6 col-sm-6 v2" style="padding:10px 0 0 0">
                                TOTAL RETURN<br><span id="range1_total">$ 136800</span>
                            </div>
                        </div>
                    </div>
                    <div class="pricing_footer">
                        <a href="assets/register" class="btn default round-xxlarge">SIGN UP</a>
                    </div>
                </div>
                                <div class="col-4 col-m-12">
                    <div class="pricing_header default">
                        <h3 class="bold">CONSERVATIVE </h3>
                        <h6 class="bold">10.5% AFTER 365 DAYS</h6>
                    </div>
                    <div class="pricing_body">
                        <ul>
                            <li>DAILY RETURN</li>
                            <li>INSTANT WITHDRAWAL</li>
                            <li>10.5% ROI EACH TIME</li>
                        </ul>
                        <div class="row pricing_info">
                            <div class="col-6 col-m-6 col-sm-6" style="padding:10px 0 0 0">
                                MINIMUM<br>$ 16000						</div>
                            <div class="col-6 col-m-6 col-sm-6 v2" style="padding: 10px 0 0 0">
                                MAXIMUM<br>$ 99000						</div>
                            <div class="col-12 v3" style="padding: 0">
                                <input type="text" value="$ 57500" id="range_2">
                            </div>
                            <div class="col-12" style="padding: 0">
                                <input type="text" class="range_47" data-id="range_2" data-times="365" data-cent="10.5%" data-per="range2_per" data-total="range2_total" value="57500" data-prefix="$ " data-type="single" data-min="16000" data-max="99000" data-from="57500"/>
                            </div>
                            <div class="col-6 col-m-6 col-sm-6" style="padding:10px 0 0 0">
                                PER TIME<br><span id="range2_per">$ 6037.5</span>
                            </div>
                            <div class="col-6 col-m-6 col-sm-6 v2" style="padding:10px 0 0 0">
                                TOTAL RETURN<br><span id="range2_total">$ 2203687.5</span>
                            </div>
                        </div>
                    </div>
                    <div class="pricing_footer">
                        <a href="assets/register" class="btn default round-xxlarge">SIGN UP</a>
                    </div>
                </div>
                                <div class="col-4 col-m-12">
                    <div class="pricing_header default">
                        <h3 class="bold">BALANCED </h3>
                        <h6 class="bold">12.5% AFTER 1095 DAYS</h6>
                    </div>
                    <div class="pricing_body">
                        <ul>
                            <li>DAILY RETURN</li>
                            <li>INSTANT WITHDRAWAL</li>
                            <li>12.5% ROI EACH TIME</li>
                        </ul>
                        <div class="row pricing_info">
                            <div class="col-6 col-m-6 col-sm-6" style="padding:10px 0 0 0">
                                MINIMUM<br>$ 100000						</div>
                            <div class="col-6 col-m-6 col-sm-6 v2" style="padding: 10px 0 0 0">
                                MAXIMUM<br>$ 5000000						</div>
                            <div class="col-12 v3" style="padding: 0">
                                <input type="text" value="$ 2550000" id="range_3">
                            </div>
                            <div class="col-12" style="padding: 0">
                                <input type="text" class="range_47" data-id="range_3" data-times="1095" data-cent="12.5%" data-per="range3_per" data-total="range3_total" value="2550000" data-prefix="$ " data-type="single" data-min="100000" data-max="5000000" data-from="2550000"/>
                            </div>
                            <div class="col-6 col-m-6 col-sm-6" style="padding:10px 0 0 0">
                                PER TIME<br><span id="range3_per">$ 318750</span>
                            </div>
                            <div class="col-6 col-m-6 col-sm-6 v2" style="padding:10px 0 0 0">
                                TOTAL RETURN<br><span id="range3_total">$ 349031250</span>
                            </div>
                        </div>
                    </div>
                    <div class="pricing_footer">
                        <a href="assets/register" class="btn default round-xxlarge">SIGN UP</a>
                    </div>
                </div>
                    
            </div>
        </div>
    </div>
    <style>
        .irs-single, .irs-min, .irs-max { display: none !important;}
        .irs-bar {
            border-top: 1px solid #FF6600 !important;
            border-bottom: 1px solid #FF6600 !important;
            background: #FF6600 !important;
        }
        .irs-bar-edge {
            border: 1px solid #FF6600 !important;
            background: #FF6600 !important;
            background: #FF6600 !important;
        }
        .irs-slider {
            border: 3px solid #AAA !important;
            background: #FF6600 !important;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('assets/css/ion.rangeSlider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/ion.rangeSlider.skinHTML5.css') }}">
    <script src="{{ asset('assets/js/ion.rangeSlider.min.js') }}"></script>
    <script>
    var $range = $(".range_47");
    $range.ionRangeSlider();
    
    $range.on("change", function () {
        var $this = $(this),
           value = $this.prop("value");
           var output = $this.prop("value") * ($this.data("cent")/100);
          $("#"+$this.data("id")).val("$ " + $this.prop("value"));
            $("#"+$this.data("per")).html("$ " + output.toFixed(1));
            $("#"+$this.data("total")).html("$ " + (output * $this.data("times")).toFixed(1));
        console.log("Value: " + value);
    });
    </script>

<div class="calculator-container" style="position: relative; top: -50px; margin-bottom: -50px;">
	<div class="bodycontainer center" style="padding: 0 20px">
		<form class="bitcoin-calculator round-large	cards" id="bitcoin-calculator">
			<h1 class="tlt text-white"><span class="text-default">BITCOIN</span> CALCULATOR</h1>
			<p style="margin: 20px 0; font-size: 14px">FIND OUT THE CURRENT BITCOIN VALUE WITH OUR EASY-TO-USE CONVERTER</p>
			<div style="margin: 20px 0">
			<!-- Input #1 Starts -->
			<input class="form-input" name="btc-calculator-value" value="1">
			<!-- Input #1 Ends -->
			<div class="form-info"><i class="fa fa-bitcoin"></i></div>
			<div class="form-equal">=</div>
			<!-- Input/Result Starts -->
			<input class="form-input form-input-result" name="btc-calculator-result">
			<!-- Input/Result Ends -->
			<!-- Select Currency Starts -->
			<div class="form-wrap">
				<select id="currency-select" class="form-input select-currency select-primary select2-hidden-accessible" name="btc-calculator-currency" data-dropdown-class="select-primary-dropdown" tabindex="-1" aria-hidden="true"><option value="0">USD</option><option value="1">AUD</option><option value="2">BRL</option><option value="3">CAD</option><option value="4">CHF</option><option value="5">CLP</option><option value="6">CNY</option><option value="7">DKK</option><option value="8">EUR</option><option value="9">GBP</option><option value="10">HKD</option><option value="11">INR</option><option value="12">ISK</option><option value="13">JPY</option><option value="14">KRW</option><option value="15">NZD</option><option value="16">PLN</option><option value="17">RUB</option><option value="18">SEK</option><option value="19">SGD</option><option value="20">THB</option><option value="21">TWD</option></select>
			</div>
			<!-- Select Currency Ends -->
			</div>
			<p><i>* Data updated every 15 minutes</i></p>
		</form>
	</div>
	<div class="bitcoin-calculator-bg"></div>
</div>
<style>
.btcwdgt.btcwdgt-chart .btcwdgt-footer {
    display: none !important;
}
.btcwdgt-headlines.btcwdgt-clean {
    margin: 0 auto !important;
    border: 1px solid #333 !important;
    box-shadow: none !important;
    max-width: 615px !important;
	width: 100%;
}
</style>
<div class="dark">
<div class="row lineup">
	<div class="col-4 col-m-12 testimony-lightbox">
		<div class="bodycontainer center-mode" style="position: relative">
		
	<ul class="testimonials" style="padding: 40px 20px">
		<li>
			<div class="padding">
				<span class="comment">
					<p>Thank you Williams James Donnelly. You guys are amazing. I just recovered my lost bitcoin of 2.6BTC.</p>
				</span>
			</div>
			<div class="author">
				<img src="uploads/small/4941597591323.png" class="circle"> <div style="margin-top:10px" class="bold">Abraham willard</div>
			</div>
		</li>
		<li>
			<div class="padding">
				<span class="comment">
					<p>Thank you for keeping to your words. I invested with $10k and i just received an investment profit of $26k within 2 months.</p>
				</span>
			</div>
			<div class="author">
				<img src="uploads/small/4111597591055.png" class="circle"> <div style="margin-top:10px" class="bold">Jessica phel</div>
			</div>
		</li>
		<li>
			<div class="padding">
				<span class="comment">
					<p>I want to thank Williams James Donnelly. i just received the sum of $17k from my investment. My whole family is indeed happy. I&#39;m hoping to invest big by next week.</p>
				</span>
			</div>
			<div class="author">
				<img src="uploads/small/5761597590797.png" class="circle"> <div style="margin-top:10px" class="bold">Fatimah Harmed</div>
			</div>
		</li>
		<li>
			<div class="padding">
				<span class="comment">
					<p>Thank you so much, I just made my first $100,000 trading fx</p>
				</span>
			</div>
			<div class="author">
				<img src="uploads/small/5511597007223.png" class="circle"> <div style="margin-top:10px" class="bold">Steve Brutt</div>
			</div>
		</li>
		<li>
			<div class="padding">
				<span class="comment">
					<p>I&#39;m now a super woman because of you guys. Thank you</p>
				</span>
			</div>
			<div class="author">
				<img src="{{ asset('uploads/small/5321597006964.png') }}" class="circle"> <div style="margin-top:10px" class="bold">Hanna jackson</div>
			</div>
		</li>
		<li>
			<div class="padding">
				<span class="comment">
					<p>Thank you Williams James Donnelly.</p>
				</span>
			</div>
			<div class="author">
				<img src="{{ asset('uploads/small/5221597006888.png') }}" class="circle"> <div style="margin-top:10px" class="bold">Howard keil</div>
			</div>
		</li>
		<li>
			<div class="padding">
				<span class="comment">
					<p>You guys are amazing. Thank you now I&#39;m financially stable. Williams James Donnelly is the best</p>
				</span>
			</div>
			<div class="author">
				<img src="{{ asset('uploads/small/6961597006775.png') }}" class="circle"> <div style="margin-top:10px" class="bold">Oliver moore</div>
			</div>
		</li>
		<li>
			<div class="padding">
				<span class="comment">
					<p>Thank you Williams James Donnelly. You guys are indeed amazing</p>
				</span>
			</div>
			<div class="author">
				<img src="{{ asset('uploads/small/6391597006127.png') }}" class="circle"> <div style="margin-top:10px" class="bold">Sarah Petterson</div>
			</div>
		</li>
		<li>
			<div class="padding">
				<span class="comment">
					<p>I want to say a very big thank you to Williams James Donnelly for helping create a chain of financial stability. It&#39;s been awesome working with you guys</p>
				</span>
			</div>
			<div class="author">
				<img src="{{ asset('uploads/small/8571597006435.png') }}" class="circle"> <div style="margin-top:10px" class="bold">Eric Bullard</div>
			</div>
		</li></ul></div>
</div>
<div class="col-8 col-m-12 center">
	<div class="bodycontainer">
		<div class="btcwdgt-chart" bw-theme="dark" style="width:100%"></div>
	</div>
</div>
</div>
</div>

<script src="https://widgets.bitcoin.com/widget.js" id="btcwdgt"></script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script>
/* ----------------------------------------------------------- */
		/*  VARIABLES FOR SELECT INPUT AND BITCOIN CALCULATOR FORM
		/* ----------------------------------------------------------- */
		
		var userAgent = navigator.userAgent.toLowerCase(),
        plugins = {
            selectFilter: $("#currency-select"),
            btcCalculator: $("#bitcoin-calculator"),
        };
		
		
		/* ----------------------------------------------------------- */
		/*  REPLACE OLD SELECT IN BITCOIN CALCULATOR FORM
		/* ----------------------------------------------------------- */

        if (plugins.selectFilter.length) {
            for (var i = 0; i < plugins.selectFilter.length; i++) {
                var select = $(plugins.selectFilter[i]);
                select.select2({
                    placeholder: select.attr("data-placeholder") ? select.attr("data-placeholder") : false,
                    minimumResultsForSearch: select.attr("data-minimum-results-search") ? select.attr("data-minimum-results-search") : 10,
                    maximumSelectionSize: 3,
                    dropdownCssClass: select.attr("data-dropdown-class") ? select.attr("data-dropdown-class") : ""
                });
            }
        }
		
		/* ----------------------------------------------------------- */
		/*  BITCOIN CALCULATOR [ WWW.BLOCKCHAIN.INFO API ]
		/* ----------------------------------------------------------- */
		
        if (plugins.btcCalculator.length) {

            $.getJSON("https://blockchain.info/ticker", function(btcJsonData) {
				var currencyList = [];
				var index = 0;

				for (var currency in btcJsonData) {
					currencyList.push({
						"id": index,
						"text": currency
					});
					index++;
				}

				for (var i = 0; i < plugins.btcCalculator.length; i++) {
					var btcForm = $(plugins.btcCalculator[i]),
						btcFormInput = $(btcForm.find('[name="btc-calculator-value"]')),
						btcFormOutput = $(btcForm.find('[name="btc-calculator-result"]')),
						btcFormCurrencySelect = $(btcForm.find('[name="btc-calculator-currency"]'));

					btcFormCurrencySelect.select2({
						placeholder: btcFormCurrencySelect.attr("data-placeholder") ? btcFormCurrencySelect.attr("data-placeholder") : false,
						minimumResultsForSearch: btcFormCurrencySelect.attr("data-minimum-results-search") ? btcFormCurrencySelect.attr("data-minimum-results-search") : 50,
						maximumSelectionSize: 3,
						dropdownCssClass: btcFormCurrencySelect.attr("data-dropdown-class") ? btcFormCurrencySelect.attr("data-dropdown-class") : '',
						data: currencyList
					});

					if (btcFormInput.length && btcFormOutput.length) {
						// BTC => Currency
						(function(btcFormInput, btcFormOutput, btcFormCurrencySelect) {
							var lastChanged = 'btc';

							btcFormInput.on('input', function() {
								// store current positions in variables
								var selectionStart = this.selectionStart,
									selectionEnd = this.selectionEnd;

								this.value = toCryptoCurrencyFormat(this.value);

								// restore cursor position
								this.setSelectionRange(selectionStart, selectionEnd);

								btcFormOutput.val(toCurrencyFormat('' + btcJsonData[btcFormCurrencySelect.select2('data')[0].text]["buy"] * this.value));
								lastChanged = 'btc';
							});

							// Currency => BTC
							btcFormOutput.on('input', function() {
								// store current positions in variables
								var selectionStart = this.selectionStart,
									selectionEnd = this.selectionEnd;

								this.value = toCurrencyFormat(this.value);

								// restore cursor position
								this.setSelectionRange(selectionStart, selectionEnd);

								btcFormInput.val(toCryptoCurrencyFormat('' + this.value / btcJsonData[btcFormCurrencySelect.select2('data')[0].text]["sell"]));
								lastChanged = 'currency';
							});

							btcFormInput.trigger('input');
							btcFormOutput.blur();

							btcFormCurrencySelect.on('change', function() {
								if (lastChanged === 'btc') {
									btcFormOutput.val(toCurrencyFormat('' + btcJsonData[btcFormCurrencySelect.select2('data')[0].text]["buy"] * btcFormInput.val()));
								} else {
									btcFormInput.val(toCryptoCurrencyFormat('' + btcFormOutput.val() / btcJsonData[btcFormCurrencySelect.select2('data')[0].text]["sell"]));
								}
							});
						})(btcFormInput, btcFormOutput, btcFormCurrencySelect);
					}
				}
			})
			.fail(function() {
				console.log('Error while fetching data from https://blockchain.info/ticker');
			});
		}

		function toCurrencyFormat(stringValue) {
			var value = parseFloat(stringValue.replace(/[^\d.]/g, '')).toFixed(2);
			return $.isNumeric(value) ? value : 0;
		}

		function toCryptoCurrencyFormat(stringValue) {
			var value = stringValue.replace(/[^\d.]/g, '');
			return $.isNumeric(value) ? value : 0;
		}
		
</script>










<script src="{{ asset('assets/js/slick/slick.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('assets/js/slick/slick-animation.min.js') }}" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
	// Init slick slider + animation
	$(document).ready(function(){
  
  $(".Modern-Slider").slick({
    autoplay:true,
    autoplaySpeed:10000,
    speed:600,
    slidesToShow:1,
    slidesToScroll:1,
    pauseOnHover:false,
    dots: false,
    pauseOnDotsHover:true,
    cssEase:'linear',
   // fade:true,
    draggable:false,
    prevArrow:'<button class="PrevArrow"></button>',
    nextArrow:'<button class="NextArrow"></button>', 
  });
  $(".testimonials").slick({
    autoplay:true,
    autoplaySpeed:10000,
    speed:600,
    slidesToShow:1,
    slidesToScroll:1,
    pauseOnHover:false,
    dots:false,
	arrows: false,
	adaptiveHeight: true
  });
  
})
</script>
<a href="#" id="back-to-top" class="back-to-top fa fa-arrow-up show-back-to-top"></a>
<script>
/*--window Scroll functions--*/
$(window).on('scroll', function () {
	/*--show and hide scroll to top --*/
	var ScrollTop = $('#back-to-top');
	if ($(window).scrollTop() > 500) {
		ScrollTop.fadeIn(1000);
	} else {
		ScrollTop.fadeOut(1000);
	}
});
</script>
<div class="footer_bg center">
	<div class="area">
		<div class="bodycontainer">
			<div style="z-index:2; position: relative">
				<h2 class="margintb">GET STARTED TODAY WITH BITCOIN INVESTMENT</h2>
				<p class="margintb">Open account for free and start trading Bitcoins!</p>
				<a href="get-started" class="btn">GET STARTED</a>
			</div>
		</div>
	</div>
</div>


<footer>
    

    
    <!-- ConveyThis button: -->
<div id="conveythis-wrapper-main"><a href="https://www.conveythis.com" class="conveythis-no-translate notranslate" title="ConveyThis" >ConveyThis</a></div>
<script src="//s2.conveythis.com/javascriptClassic/1/conveythis.js"></script>
<script src="//s2.conveythis.com/javascriptClassic/1/translate.js"></script>
<script type="text/javascript">
document.addEventListener("DOMContentLoaded", function(e) {
conveythis.init({source_language_id: 703, languages: [{"id":"703","active":true},{"id":"704","active":false},{"id":"708","active":false},{"id":"709","active":false},{"id":"710","active":false},{"id":"711","active":false},{"id":"707","active":false},{"id":"712","active":false},{"id":"713","active":false},{"id":"714","active":false},{"id":"715","active":false},{"id":"716","active":false},{"id":"706","active":false},{"id":"717","active":false},{"id":"718","active":false},{"id":"806","active":false},{"id":"705","active":false},{"id":"719","active":false},{"id":"796","active":false},{"id":"798","active":false},{"id":"720","active":false},{"id":"723","active":false},{"id":"703","active":false},{"id":"724","active":false},{"id":"725","active":false},{"id":"722","active":false},{"id":"726","active":false},{"id":"727","active":false},{"id":"799","active":false},{"id":"728","active":false},{"id":"729","active":false},{"id":"730","active":false},{"id":"731","active":false},{"id":"732","active":false},{"id":"800","active":false},{"id":"733","active":false},{"id":"801","active":false},{"id":"734","active":false},{"id":"735","active":false},{"id":"736","active":false},{"id":"721","active":false},{"id":"802","active":false},{"id":"737","active":false},{"id":"738","active":false},{"id":"803","active":false},{"id":"775","active":false},{"id":"776","active":false},{"id":"797","active":false},{"id":"777","active":false},{"id":"778","active":false},{"id":"774","active":false},{"id":"779","active":false},{"id":"780","active":false},{"id":"781","active":false},{"id":"782","active":false},{"id":"783","active":false},{"id":"784","active":false},{"id":"785","active":false},{"id":"786","active":false},{"id":"787","active":false},{"id":"812","active":false},{"id":"811","active":false},{"id":"788","active":false},{"id":"789","active":false},{"id":"790","active":false},{"id":"813","active":false},{"id":"795","active":false},{"id":"794","active":false},{"id":"793","active":false},{"id":"792","active":false},{"id":"791","active":false},{"id":"810","active":false},{"id":"809","active":false},{"id":"773","active":false},{"id":"772","active":false},{"id":"808","active":false},{"id":"770","active":false},{"id":"769","active":false},{"id":"768","active":false},{"id":"767","active":false},{"id":"765","active":false},{"id":"807","active":false},{"id":"764","active":false},{"id":"763","active":false},{"id":"762","active":false},{"id":"766","active":false},{"id":"761","active":false},{"id":"760","active":false},{"id":"759","active":false},{"id":"758","active":false},{"id":"757","active":false},{"id":"755","active":false},{"id":"754","active":false},{"id":"753","active":false},{"id":"752","active":false},{"id":"751","active":false},{"id":"750","active":false},{"id":"749","active":false},{"id":"748","active":false},{"id":"805","active":false},{"id":"804","active":false},{"id":"746","active":false},{"id":"745","active":false},{"id":"744","active":false},{"id":"771","active":false},{"id":"756","active":false},{"id":"747","active":false},{"id":"743","active":false},{"id":"742","active":false},{"id":"814","active":false},{"id":"815","active":false},{"id":"739","active":false},{"id":"741","active":false},{"id":"740","active":false}]})
});
</script>
<!-- End ConveyThis button code. -->

    
  
  

  
  
  
  
  
    
    
    <div class="bodycontainer">
        <div class="row">
            <div class="col-2 col-m-4 col-sm-12">
            <div class="padding">
                <h3>QUICK LINKS</h3>
                <ul>
                    <li><a href="assets/">Home</a></li>
                    <li><a href="assets/info/about">About Us</a></li>
                    <li><a href="assets/faqs">FAQS</a></li>
                    <li><a href="assets/info/terms">TERMS AND CONDITIONS</a></li>
                    <li><a href="assets/contact">CONTACT US</a></li>
                </ul>
            </div>
            </div>
            <div class="col-2 col-m-4 col-sm-12">
            <div class="padding">
                <h3>HELP & SUPPORT</h3>
                <ul>
                    <li><a href="https://cointelegraph.com/bitcoin-for-beginners/what-are-cryptocurrencies" target="_blank">WHAT IS BITCOIN?</a></li>
                    <li><a href="https://www.investopedia.com/tech/how-to-buy-bitcoin/" target="_blank">HOW TO BUY BITCOIN</a></li>
                    <li><a href="assets/register">REGISTER</a></li>
                    <li><a href="assets/login">LOGIN</a></li>
					<li><a href="assets/fpass">FORGOT PASSWORD</a></li>
                </ul>
            </div>
            </div>
            <div class="col-3 col-m-4 col-sm-12">
            <div class="padding">
                <h3>CONTACT US</h3>
                <ul>
                    <li>Kloveniersburgwal 105II, 1011 KB Amsterdam, Netherlands</li>
                </ul>
				<a href="mailto://info@globaloptionsfxtrade.com"><h3>info@globaloptionsfxtrade.com</h3></a>
				<a href="tel:+1 959 500 9190">+1 959 500 9190</a>
				<ul>
					<li>MON-SAT 08AM ⇾ 05PM</li>
					<ul class="social">
						<li><a href="" class="circle"><i class="fa fa-facebook"></i></a></li>
						<li><a href="" class="circle"><i class="fa fa-twitter"></i></a></li>
					</ul>
				</ul>
            </div>
            </div>
            <div class="col-5 col-m-12 col-sm-12">
				<div class="col-6 col-m-6 col-sm-6" style="padding-bottom:0">
					<div class="value">$198.76B</div>
					MARKET CAP
					<div class="value">69K+</div>
					ACTIVE ACCOUNTS
				</div>
				<div class="col-6 col-m-6 col-sm-6" style="padding-bottom:0">
					<div class="value">243K</div>
					WEEKLY TRANSACTIONS
					<div class="value">127</div>
					SUPPORTED COUNTRIES
				</div>
				<div class="col-12" style="padding-top:0">
					<hr>
					SUPPORTED PAYMENT METHODS<br>
					<img src="assets/images/5b55bb652af1a.png" style="width:40px">
					<img src="assets/images/1532345051h7.png" style="width:40px">
					<img src="assets/images/1532345115h7.png" style="width:40px">
				</div>
            </div>
        </div>
	<hr>
	<p class="center">Copyright © {{date('Y')}} Global Options FX Trade. All Rights Reserved</p>
    </div>
</footer>
<script src="assets/js/particle.js"></script>
<script>
particlesJS("particles-js", {
	"particles":{ "number":{"value":100,"density":{"enable":true,"value_area":800}},"color":{"value":"#ffffff"},"shape":{"type":"circle","stroke":{"width":0,"color":"#000000"},"polygon":{"nb_sides":5},"image":{"src":"img/github.svg","width":100,"height":100}},"opacity":{"value":0.5,"random":false,"anim":{"enable":false,"speed":1,"opacity_min":0.1,"sync":false}},"size":{"value":3,"random":true,"anim":{"enable":false,"speed":40,"size_min":0.1,"sync":false}},"line_linked":{"enable":true,"distance":150,"color":"#ffffff","opacity":0.4,"width":1},"move":{"enable":true,"speed":6,"direction":"none","random":false,"straight":false,"out_mode":"out","bounce":false,"attract":{"enable":false,"rotateX":600,"rotateY":1200}}},"interactivity":{"detect_on":"canvas","events":{"onhover":{"enable":true,"mode":"repulse"},"onclick":{"enable":true,"mode":"push"},"resize":true},"modes":{"grab":{"distance":400,"line_linked":{"opacity":1}},"bubble":{"distance":400,"size":40,"duration":2,"opacity":8,"speed":3},"repulse":{"distance":200,"duration":0.4},"push":{"particles_nb":4},"remove":{"particles_nb":2}}
},"retina_detect":true});
</script>
<script>
  (function(b,i,t,C,O,I,N) {
    window.addEventListener('load',function() {
      if(b.getElementById(C))return;
      I=b.createElement(i),N=b.getElementsByTagName(i)[0];
      I.src=t;I.id=C;N.parentNode.insertBefore(I, N);
    },false)
  })(document,'script','https://widgets.bitcoin.com/widget.js','btcwdgt');
</script>







</body>
</html>