<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="keywords" content="Capital for creativity and innovation" />
        <meta name="description" content="Capital for creativity and innovation" />
        <meta name="author" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>{{ setting('site-name') }}</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="images/favicon.png" />

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Archivo:400,400i,500,500i,600,600i,700,700i&amp;display=swap" />

        <!-- CSS Global Compulsory (Do not remove)-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css" integrity="sha512-gMjQeDaELJ0ryCI+FtItusU9MkAifCZcGq789FrzkiM49D8lbDhoaUaIX4ASU187wofMNlgBJ4ckbrXM9sE6Pg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{ asset('/assets/css/v2/flaticon.css') }}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha512-tDXPcamuZsWWd6OsKFyH6nAqh/MjZ/5Yk88T5o+aMfygqNFPan1pLyPFAndRzmOWHKT+jSDzWpJv8krj6x1LMA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Page CSS Implementing Plugins (Remove the plugin CSS here if site does not use that feature)-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css" integrity="sha512-NK1a+fwVgHnWk57liCcVd4/Cm9meSmYYY130YqQ3fEOD7gw3GQ36UJ+CZWVfpM/CtE08YkpIg4MBGzwNG2P3SQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" integrity="sha512-YTL2qFiv2wZNnC764l1DD5zN6lYxDzJ89Ss6zj6YoYIzr6+zwjdVKM1sUR+971X3h7qWCa9cPUBXyYqhOqWWLQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" integrity="sha512-+EoPw+Fiwh6eSeRK7zwIKG2MA8i3rV/DGa3tdttQGgWyatG/SkncT53KHQaS5Jh9MNOT3dmFL0FjTY08And/Cw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Template Style -->
        <link rel="stylesheet" href="{{ asset('/assets/css/v2/style.css') }}" />
        <link rel="stylesheet" href="{{ asset('/assets/css/v2/fake-notification.css') }}" />
    </head>
    <body>
        <!--=================================
    header -->
        <header class="header header-style-02">
            <div class="tradingview-widget-container">
                <div class="tradingview-widget-container__widget"></div>
                <div class="tradingview-widget-copyright">
                    <a href="https://www.tradingview.com" rel="noopener" target="_blank"><span class="blue-text"></span></a>
                </div>

                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
                      {
                      "symbols": [
                        {
                          "proName": "FOREXCOM:SPXUSD",
                          "title": "S&P 500"
                        },
                        {
                          "proName": "FOREXCOM:NSXUSD",
                          "title": "Nasdaq 100"
                        },
                        {
                          "proName": "FX_IDC:EURUSD",
                          "title": "EUR/USD"
                        },
                        {
                          "proName": "BITSTAMP:BTCUSD",
                          "title": "BTC/USD"
                        },
                        {
                          "proName": "BITSTAMP:ETHUSD",
                          "title": "ETH/USD"
                        }
                      ],
                      "colorTheme": "dark",
                      "isTransparent": false,
                      "displayMode": "adaptive",
                      "locale": "en"
                    }
                </script>
            </div>

            <div class="topbar">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-sm-flex">
                                <a class="navbar-brand" href="{{url('/')}}">
                                    <img class="img-fluid" src="{{ asset(setting('site-logo-1')) }}" alt="logo" />
                                </a>
                                <div id="ytWidget"></div>
                                <script src="https://translate.yandex.net/website-widget/v1/widget.js?widgetId=ytWidget&pageLang=en&widgetTheme=light&autoMode=false" type="text/javascript"></script>
                                <div class="contact-info ml-auto align-items-center d-none d-lg-flex">
                                    <ul>
                                        <li>
                                            <i class="flaticon-world"></i>
                                            <span>
                                                <label class="d-block">{{setting('address')}} </label>
                                            </span>
                                        </li>
                                        <li>
                                            <i class="flaticon-call"></i>
                                            <span>
                                                <label class="d-block">+vip members</label>
                                            </span>
                                        </li>
                                        <li>
                                            <i class="flaticon-email"></i>
                                            <span>
                                                <label class="d-block">{{setting('support-mail')}}</label>
                                                
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <nav class="navbar navbar-static-top navbar-expand-lg">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target=".navbar-collapse"><i class="fas fa-align-left"></i></button>
                            <div class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('/')}}">HOME</a>
                                    </li>
                                    <li class="nav-item"></li>
                                    <li class="nav-item">
                                        <a href="{{url('/about')}}" class="nav-link" data-toggle="dropdown">ABOUT US</a>
                                  
                                    </li>
                                  

                                    <li class="nav-item"></li>
                                  
                                    <li class="nav-item">
                                        <a href="{{url('/terms')}}" class="nav-link">TERMS</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('/faqs')}}" class="nav-link">FAQ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('/contact')}}" class="nav-link">CONTACT</a>
                                    </li>
                                                                        <li class="nav-item">
                                        <a href="{{url('/login')}}" class="nav-link">LOGIN</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('/register')}}" class="nav-link">SIGN UP</a>
                                    </li>
                                                                    </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>