@include('includes.user.header')

<div class="udex-main" id="main">

    <script src="/js/validation.js"></script>
    
<div class="row">
<div class="col-12">
	<div class="title_container">
		<ul class="breadcrumb right udex-hidden">
  <li><a href="/account"><i class="fa fa-home"></i> Home</a></li>
  <li class="bold">User Dashboard</li></ul>
		<h4>User Dashboard</h4>
		<span class="decor_default"></span>
	</div>
</div>
<div class="col-4 col-m-6">
<a href="/account/transaction-log">
	<div class="r4_counter db_box has-gradient-to-right-bottom">
		<div class="icon-after">
			<img src="/assets/images/cryptonia-ico-lg.png" alt="">
		</div>
		<i class="pull-left fa fa-usd icon-md icon-white mt-10"></i>
		<div class="stats">
			<h3 class="color-white mb-5">0 USD</h3>
			<span>Balance</span>
		</div>
	</div>
</a>
</div>
<div class="col-4 col-m-6">
<a href="/account/repeat-history">
	<div class="r4_counter db_box">
		<div class="icon-after">
			<img src="/assets/images/cryptonia-ico-lg.png" alt="">
		</div>
		<i class="pull-left fa fa-usd icon-md mt-10"></i>
		<div class="stats">
			<h3 class="color-white mb-5">0</h3>
			<span>Profit</span>
		</div>
	</div>
</a>
</div>
<div class="col-4 col-m-6">
<a href="/account/reference-user">
	<div class="r4_counter db_box">
		<div class="icon-after">
			<img src="/assets/images/cryptonia-ico-lg.png" alt="">
		</div>
		<i class="pull-left fa fa-users icon-md mt-10"></i>
		<div class="stats">
			<h3 class="color-white mb-5">0</h3>
			<span>Reference</span>
		</div>
	</div>
</a>
</div>
<div class="col-4 col-m-6">
<a href="/account/deposit-history">
	<div class="r4_counter db_box">
		<div class="icon-after">
			<img src="/assets/images/sell-icon-lg.png" alt="">
		</div>
		<i class="pull-left ico-icon icon-md icon-primary mt-20">
			<img src="/assets/images/sell-icon-so.png" class="ico-icon-o" alt="">
			<img src="/assets/images/sell-icon-sw.png" class="ico-icon-w" alt="">
		</i>
		<div class="stats" style="padding: 0 20px;border-left: 1px solid #eeebeb;">
			<h3 class="color-white mb-5">$0</h3>
			<span>Total Deposit(s)</span>
		</div>
	</div>
</a>
</div>
<div class="col-4 col-m-6">
<a href="/account/withdraw-log">
	<div class="r4_counter db_box">
		<div class="icon-after">
			<img src="/assets/images/buy-icon-lg.png" alt="">
		</div>
		<i class="pull-left ico-icon icon-md icon-primary mt-20">
			<img src="/assets/images/buy-icon-so.png" class="ico-icon-o" alt="">
			<img src="/assets/images/buy-icon-sw.png" class="ico-icon-w" alt="">
		</i>
		<div class="stats" style="padding: 0 20px;border-left: 1px solid #eeebeb;">
			<h3 class="color-white mb-5">$0</h3>
			<span>Total Withdrawal(s)</span>
		</div>
	</div>
</a>
</div>
<div class="col-4 col-m-6">
<a href="/account/investment-history">
	<div class="r4_counter db_box">
		<div class="icon-after">
			<img src="/assets/images/exchange-icon-lg.png" alt="">
		</div>
		<i class="pull-left ico-icon icon-md icon-primary mt-20">
			<img src="/assets/images/exchange-icon-so.png" class="ico-icon-o" alt="">
			<img src="/assets/images/exchange-icon-sw.png" class="ico-icon-w" alt="">
		</i>
		<div class="stats" style="padding: 0 20px;border-left: 1px solid #eeebeb;">
			<h3 class="color-white mb-5">$0</h3>
			<span>Total Investment(s)</span>
		</div>
	</div>
</a>
</div>
<div class="col-8 col-m-8">
	<div class="white section round row" style="padding: 0">
		<div class="col-12" style="padding: 10px 20px">
			<h5>Latest Investments</h5>
			<div style="overflow-y: auto;" class="margint">
				<table style="width:100%" class="striped">
					<tr style="background: #F9F9FA; border-top: 1px solid #F1F1F1">
						<th style="min-width: 120px">Date</th><th>Plan</th><th style="min-width: 120px">Amount</th><th>Rate</th><th style="min-width: 140px">Status</th>
					</tr>
				</table>
			</div>
		</div>
		<div class="col-6 col-m-6" style="padding: 10px 20px">
			<a href="/account/investment-history" class="has-gradient-to-right-bottom dash_btn padding center">View All</a>
		</div>
		<div class="col-6 col-m-6" style="padding: 10px 20px">
			<a href="/account/repeat-history" class="has-gradient-to-right-bottom dash_btn padding center">Profit History</a>
		</div>
	</div>
</div>
<div class="col-4 col-m-4">
	<div class="white section round">
		<h5>Live Crypto Prices</h5>
		<div class="margint">
			<script type="text/javascript">
			baseUrl = "https://widgets.cryptocompare.com/";
			var scripts = document.getElementsByTagName("script");
			var embedder = scripts[ scripts.length - 1 ];
			var cccTheme = {"Trend":{"colorUp":"#3D942F","colorUnchanged":"#FF6600"}};
			(function (){
			var appName = encodeURIComponent(window.location.hostname);
			if(appName==""){appName="local";}
			var s = document.createElement("script");
			s.type = "text/javascript";
			s.async = true;
			var theUrl = baseUrl+'serve/v1/coin/multi?fsyms=BTC,ETH,XMR,LTC,DASH&tsyms=USD,EUR,CNY,GBP';
			s.src = theUrl + ( theUrl.indexOf("?") >= 0 ? "&" : "?") + "app=" + appName;
			embedder.parentNode.appendChild(s);
			})();
			</script>
		</div>
		<style> 
			.div-symbol-explanation { display: none; }
			#main {padding: 0 20px !important; } [class*="col-"] { padding: 1px 5px;}
			@media (min-width: 992px){
				#main {padding: 0 40px !important; } [class*="col-"] { padding: 1px 15px;}
			}
		</style>
	</div>
</div>
</div>	

@include('includes.user.footer')
    