<!DOCTYPE html>

<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

        <meta charset="utf-8">
       <meta http-equiv="X-UA-compatible" content="iE=edge">
       
       <meta name="viewport" content="width=device-width, initial-scale=1"> 

        <title>@isset($title) {{$title}} @endisset - {{setting('site-name')}}</title>
        <meta name="designer" href="index.html">
      
        <link rel="shortcut icon" href="/assets/images/favicon.ico">
        <link rel="apple-touch-icon" href="/assets/images/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/assets/images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/assets/images/apple-touch-icon-114x114.png">

        <!-- ==============================================
        Vendor Stylesheet
        =============================================== -->
        <link rel="stylesheet" href="/assets/css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="/assets/css/vendor/slider.min.css">
        <link rel="stylesheet" href="/assets/css/main1.css">
        <link rel="stylesheet" href="/assets/css/vendor/icons.min.css">
        <link rel="stylesheet" href="/assets/css/vendor/icons-fa.min.css">
        <link rel="stylesheet" href="/assets/css/vendor/animation.min.css">
        <link rel="stylesheet" href="/assets/css/vendor/gallery.min.css">
        <link rel="stylesheet" href="/assets/css/vendor/cookie-notice.min.css">

        <!-- ==============================================
        Custom Stylesheet
        =============================================== -->
        <link rel="stylesheet" href="/assets/css/default.css">

        <!-- ==============================================
        Theme Color
        =============================================== -->
        <meta name="theme-color" content="#21333e">

        <!-- ==============================================
        Theme Settings
        =============================================== -->
        <style>
            :root {
                --hero-bg-color: #080d10;
                
                --section-1-bg-color: #ffffff;
                --section-2-bg-color: #111117;
                --section-3-bg-color: #111117;
                --section-4-bg-color: #ffffff;
                --section-5-bg-color: #eef4ed;
                --section-6-bg-color: #111117;
                --section-7-bg-color: #ffffff;

                --footer-bg-color: #080d10; --footer-bg-image: url('assets/images/bg-7.jpg');
            }
        </style>
        
    
  <!--  <script language="javascript">
function openCalculator(id)
{

  w = 225; h = 400;
  t = (screen.height-h-30)/2;
  l = (screen.width-w-30)/2;
  window.open('?a=calendar&type=' + id, 'calculator' + id, "top="+t+",left="+l+",width="+w+",height="+h+",resizable=1,scrollbars=0");


  
  for (i = 0; i < document.spendform.h_id.length; i++)
  {
    if (document.spendform.h_id[i].value == id)
    {
      document.spendform.h_id[i].checked = true;
    }
  }

  

}

function updateCompound() {
  var id = 0;
  var tt = document.spendform.h_id.type;
  if (tt && tt.toLowerCase() == 'hidden') {
    id = document.spendform.h_id.value;
  } else {
    for (i = 0; i < document.spendform.h_id.length; i++) {
      if (document.spendform.h_id[i].checked) {
        id = document.spendform.h_id[i].value;
      }
    }
  }

  var cpObj = document.getElementById('compound_percents');
  if (cpObj) {
    while (cpObj.options.length != 0) {
      cpObj.options[0] = null;
    }
  }

  if (cps[id] && cps[id].length > 0) {
    document.getElementById('coumpond_block').style.display = '';

    for (i in cps[id]) {
      cpObj.options[cpObj.options.length] = new Option(cps[id][i]);
    }
  } else {
    document.getElementById('coumpond_block').style.display = 'none';
  }
}
var cps = {};
</script> -->

<script src="/assets/js/vendor/jquery.min.js"></script>

    <script>

    jQuery(document).on("show_variation", function(event, variant) {
        if (!variant.is_in_stock)
            return;
        window.nudgify.product({
            id: variant.variation_id || null,
            stock: variant.max_qty || null,
            image: variant.image.thumb_src || null,
        })
    });
    (function(w) {
        var k = "nudgify",
            n = w[k] || (w[k] = {});
        n.uuid = "3e391543-264e-4201-9aec-c2c5fcd2e200";
        var d = document,
            s = d.createElement("script");
        s.src = "index.html\/\/pixel.nudgify.com\/pixel.js";
        s.async = 1;
        s.charset = "utf-8";
        d.getElementsByTagName("head")[0].appendChild(s)
    })(window)
    </script>

        
    </head>

    <body>
        
        <!-- Preloader -->
        <div id="preloader" data-timeout="2000" class="odd preloader counter">
            <div data-aos="fade-up" data-aos-delay="500" class="row justify-content-center text-center items">
                <div data-percent="100" class="radial">
                    <span></span>
                </div>
            </div>
        </div>

        <!-- Header -->
        <header id="header">

            <!-- Top Navbar -->
            <nav class="navbar navbar-expand top">
                <div class="container header">

                    <!-- Navbar Items [left] -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link pl-0"><i class="fas fa-clock mr-2"></i>work every day 24/7 </a>
                        </li>
                    </ul>

                    <!-- Nav holder -->
                    <div class="ml-auto"></div>

                    <!-- Navbar Items [right] -->
                    <ul class="navbar-nav">
                      <!--  <li class="nav-item">
                            <a href="#" class="nav-link"><i class="fas fa-phone-alt mr-2"></i>+44 1633 9315 71</a>
                        </li> -->
                        <li class="nav-item">
                            <a href="mailto:support@exprofessionancetrades.com" class="nav-link"><i class="fas fa-envelope mr-2"></i>support@exprofessionancetrades.com</a>
                        </li>
                    </ul>

                    <!-- Navbar Icons -->
                    <ul class="navbar-nav icons">
                        <li class="nav-item social">
                            <a href="#" class="nav-link"><i class="fab fa-youtube"></i></a>
                        </li>
                        <li class="nav-item social">
                            <a href="#" class="nav-link"><i class="fab fa-telegram"></i></a>
                            </li>
                        <li class="nav-item social">
                            <a href="#" class="nav-link"><i class="fab fa-telegram"></i></a>
                        </li>
                        
                        <li class="nav-item">
                            <div id="google_translate_element"></div>

<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE
        }, 'google_translate_element');
    }

</script>

<script type="text/javascript" src="//translate.google.com/translate_a/elementa0d8.js?cb=googleTranslateElementInit"></script>
<style>
    .goog-te-gadget img {
        display: none;
    }

    .goog-te-gadget-simple {
        border-radius: 15px;
        padding: 7px;
        border: 2px solid #fff;
        background-color: #21333e;
    }
    
    .goog-te-gadget-simple .goog-te-menu-value span{
        border-right: none;
    }

</style>

                        </li>
                    </ul>

                </div>
            </nav>

           <!-- Navbar -->
            <nav class="navbar navbar-expand navbar-fixed sub">
                <div class="container header">

                    <!-- Navbar Brand-->
                    <a class="navbar-brand" href="index.html">
                        <span class="brand">
                            <span class="featured">
                                <span style="font-size:15px;" class="first">Avans</span>
                            </span>
                           <span style="font-size:15px;" class="last">Trades</span>
                        </span>
                        
                        <!-- 
                            Custom Logo
                            <img src="/assets/images/logo.svg" alt="NEXGEN">
                        -->
                    </a>

                    <!-- Nav holder -->
                    <div class="ml-auto"></div>

                    <!-- Navbar Items -->
                    <ul class="navbar-nav items">
                        <li class="nav-item"><a href="{{url('/')}}" class="nav-link">HOME</a></li>
                        <li class="nav-item"><a href="{{url('/about')}}" class="nav-link">About</a></li>
                        <li class="nav-item"><a href="{{url('/faqs')}}" class="nav-link">FAQ's</a></li>
                        <li class="nav-item"><a href="{{url('/contact')}}" class="nav-link">Contact Us</a></li>
          
        <li class="nav-item"><a href="{{url('/login')}}" class="nav-link">Login</a></li>
        <li class="nav-item"><a href="{{url('/register')}}" class="nav-link">Register</a></li>
                                                </ul>

                    <!-- Navbar Icons -->
                 
                    <!-- Navbar Toggle -->
                    <ul class="navbar-nav toggle">
                        <li class="nav-item">
                            <a href="#" class="nav-link" data-toggle="modal" data-target="#menu">
                                <i class="icon-menu m-0"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            
       

        </header>