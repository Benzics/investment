@include('includes.user.header')

<div class="white section round" style="padding:0">
    <script type="text/javascript">
    baseUrl = "https://widgets.cryptocompare.com/";
    var scripts = document.getElementsByTagName("script");
    var embedder = scripts[ scripts.length - 1 ];
    var cccTheme = {"General":{"borderWidth":"0px","borderColor":"#cccccc"},"Tabs":{"activeBorderColor":"#FF6600"},"Chart":{"fillColor":"#cccccc","borderColor":"#FF6600"}};
    (function (){
    var appName = encodeURIComponent(window.location.hostname);
    if(appName==""){appName="local";}
    var s = document.createElement("script");
    s.type = "text/javascript";
    s.async = true;
    var theUrl = baseUrl+'serve/v3/coin/chart?fsym=BTC&tsyms=USD,EUR,CNY,GBP';
    s.src = theUrl + ( theUrl.indexOf("?") >= 0 ? "&" : "?") + "app=" + appName;
    embedder.parentNode.appendChild(s);
    })();
    </script>
    <style>
    .cryptocompare-logo, .chartTypeTabLinks { display: none !important; }
    fill #5cb85c
    </style>
    </div>

@include('includes.user.footer')