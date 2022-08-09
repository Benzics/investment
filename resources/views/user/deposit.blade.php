@include('includes.user.header')

<div class="udex-main" id="main">

    <script src="/assets/js/validation.js"></script>
    
<div class="row kk">
<div class="col-12" style="padding-top: 0">
	<div class="title_container">
		<ul class="breadcrumb right udex-hidden">
  <li><a href="{{ url('/user/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
  <li class="bold">Deposit Method</li></ul>
		<h4>Deposit Method</h4>
		<span class="decor_default"></span>
	</div>
</div>
<div class="col-4 col-m-6">
<div class="white section round">
	<h4>Bitcoin</h4>
	<div class="center padding" style="border: 2px dashed #FF6600">
		<img src="{{ asset(' /assets/images/5b55bb652af1a.png')}}" style="height:90px">
	</div>
	<button class="btn has-gradient-to-right-bottom margintb trigger-btc" style="padding: 10px 20px"><i class="fa fa-send"></i> Add Fund</button>
</div>
</div>
<div class="col-4 col-m-6">
<div class="white section round">
	<h4>Ethereum</h4>
	<div class="center padding" style="border: 2px dashed #FF6600">
		<img src="{{ asset('/assets/images/1532345051h7.png')}}" style="height:90px">
	</div>
	<button class="btn has-gradient-to-right-bottom margintb trigger-eth" style="padding: 10px 20px"><i class="fa fa-send"></i> Add Fund</button>
</div>
</div>
<div class="col-4 col-m-6">
<div class="white section round">
	<h4>Skrill</h4>
	<div class="center padding" style="border: 2px dashed #FF6600">
		<img src="{{ asset('assets/images/1532345115h7.png')}}" style="height:90px">
	</div>
	<button class="btn has-gradient-to-right-bottom margintb trigger-skr" style="padding: 10px 20px"><i class="fa fa-send"></i> Add Fund</button>
</div>
</div>
</div>
<style> 
	.div-symbol-explanation { display: none; }
	#main {padding: 0 20px !important; } .row.kk [class*="col-"] { padding: 1px 5px;}
	@media (min-width: 992px){
		#main {padding: 0 40px !important; } .row.kk [class*="col-"] { padding: 1px 15px;}
	}
</style>	

<div class="dash_footer">
	<p>Copyright &copy; {{date('Y')}} {{config('app.name')}}</p><br>
	<p>Version 1.0</p>
	</div>
</div>
    
<script>
$(document).on('change', '#image_upload_file', function () {
var progressBar = $('.progressBar'), bar = $('.progressBar .bar'), percent = $('.progressBar .percent');

document.getElementById('myModal').style.display = "none";
$('#image_upload_form').ajaxForm({
    beforeSend: function() {
		progressBar.fadeIn();
        var percentVal = '0%';
        bar.width(percentVal)
        percent.html(percentVal);
    },
    uploadProgress: function(event, position, total, percentComplete) {
        var percentVal = percentComplete + '%';
        bar.width(percentVal)
        percent.html(percentVal);
    },
    success: function(html, statusText, xhr, $form) {		
		obj = $.parseJSON(html);	
		if(obj.status){		
			var percentVal = '100%';
			bar.width(percentVal)
			percent.html(percentVal);
			$("#imgArea>img").prop('src','assets/'+obj.image_small);		
		} else {
			alert(obj.error);
		}
    },
	complete: function(xhr) {
		progressBar.fadeOut();			
	}	
}).submit();		

});
</script>
<div id="myModal" class="modal padding">

  <!-- Modal content -->
  <div class="modal-content-small">
  <div class="modal-body center">
    <span class="close text-grey">&times;</span><br>
    <h3>Your profile photo</h3>
<h6>It is not allowed to publish:</h6><br>
<div class="danger">
<ul class="bullet">
    <li>photos of an explicitly sexual or pornographic nature</li>
    <li>images aimed at inciting ethnic or racial hatred or aggression</li>
    <li>photos involving persons under 18 years of age</li>
    <li>third-party copyright protected photos</li>
    <li>images larger than 5 MB and in a format other than JPG, GIF or PNG</li>
</ul></div><br>
Your face must be clearly visible on the photo.<br>
All photos and videos uploaded by you must comply with these requirements, otherwise they can be removed.
</div>
<form enctype="multipart/form-data" action="assets/image_profile_upload.php" method="post" name="image_upload_form" id="image_upload_form">
<div class="modal-footer center lightgrey padding">
    <a class="btn default border2 round" id="imgChange" style="width:200px">
    <input type="hidden" name="user" value="">
    <input type="file" accept="image/*" name="image_upload_file" id="image_upload_file">Select a Photo</a>
  </div>
</form>
</div>

</div>
<div class="udex-overlay" id="myOverlay"></div>
{{-- <ul class="udex_footer">
	<div class="bodycontainer2" style="max-width: 500px">
		<li><a href="assets/account"><i class="fa fa-home"></i><span>Office</span></a></li>
		<li><a href="assets/account/trading-view"><i class="fa fa-line-chart"></i><span>Signal</span></a></li>
		<li><a href="assets/account/info"><i class="fa fa-gears"></i><span>Settings</span></a></li>
		<li><a href="assets/logout"><i class="fa fa-power-off"></i><span>Logout</span></a></li>
	</div> --}}

<div id="modal-content" class="iziModal card" style="border-bottom: 3px solid #FF6600; overflow: hidden; display: none; max-width:90% !important;">
	<div class="iziModal-header"style="background: #333;">
		<i class="iziModal-header-icon icon-stack fa fa-inbox"></i>
		<h2 class="iziModal-header-title" style="color: #fff !important">Add Fund via Bitcoin</h2>
		<a href="javascript:void(0)" class="iziModal-button-close" data-izimodal-close=""></a>
	</div>
	<div class="iziModal-wrap">
		<div class="iziModal-content">
		<form method="POST" action="assets/account/deposit-fund" class="row">
			<div class="col-12">
				<div class="danger margintb">Deposit Charge : (1 + 1%) - USD</div>
				<div class="display-container">
					<input type="number" required name="bit_amount_fund" placeholder="Amount" class="padding bold" style="width: 100%; padding-right: 70px !important">
					<span class="display-topright grey padding border" style="display: inline-block">USD</span>
				</div>
				<button class="btn default padding center" style="margin-top: 10px; width: 100%"><i class="fa fa-send"></i> CONTINUE</button>
			</div>
		</div>
		</form>
		</div>
	</div>
</div>
<div id="modal-content2" class="iziModal card" style="border-bottom: 3px solid #FF6600; overflow: hidden; display: none; max-width:90% !important;">
	<div class="iziModal-header"style="background: #333;">
		<i class="iziModal-header-icon icon-stack fa fa-inbox"></i>
		<h2 class="iziModal-header-title" style="color: #fff !important">Add Fund via Ethereum</h2>
		<a href="javascript:void(0)" class="iziModal-button-close" data-izimodal-close=""></a>
	</div>
	<div class="iziModal-wrap">
		<div class="iziModal-content">
		<form method="POST" action="assets/account/deposit-fund" class="row">
			<div class="col-12">
				<div class="danger margintb">Deposit Charge : (1 + 1%) - USD</div>
				<div class="display-container">
					<input type="number" required name="eth_amount_fund" placeholder="Amount" class="padding bold" style="width: 100%; padding-right: 70px !important">
					<span class="display-topright grey padding border" style="display: inline-block">USD</span>
				</div>
				<button class="btn default padding center" style="margin-top: 10px; width: 100%"><i class="fa fa-send"></i> CONTINUE</button>
			</div>
		</div>
		</form>
		</div>
	</div>
</div>
<div id="modal-content3" class="iziModal card" style="border-bottom: 3px solid #FF6600; overflow: hidden; display: none; max-width:90% !important;">
	<div class="iziModal-header"style="background: #333;">
		<i class="iziModal-header-icon icon-stack fa fa-inbox"></i>
		<h2 class="iziModal-header-title" style="color: #fff !important">Add Fund via Skrill</h2>
		<a href="javascript:void(0)" class="iziModal-button-close" data-izimodal-close=""></a>
	</div>
	<div class="iziModal-wrap">
		<div class="iziModal-content">
		<form method="POST" action="assets/account/deposit-fund" class="row">
			<div class="col-12">
				<div class="danger margintb">Deposit Charge : (1 + 1%) - USD</div>
				<div class="display-container">
					<input type="number" required name="skr_amount_fund" placeholder="Amount" class="padding bold" style="width: 100%; padding-right: 70px !important">
					<span class="display-topright grey padding border" style="display: inline-block">USD</span>
				</div>
				<button class="btn default padding center" style="margin-top: 10px; width: 100%"><i class="fa fa-send"></i> CONTINUE</button>
			</div>
		</div>
		</form>
		</div>
	</div>
</div>
















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










<div id="modal-content4" class="iziModal card" style="border-bottom: 3px solid #FF6600; overflow: hidden; display: none; max-width:90% !important;">
	<div class="iziModal-header"style="background: #333;">
		<i class="iziModal-header-icon icon-stack fa fa-inbox"></i>
		<h2 class="iziModal-header-title" style="color: #fff !important">Withdraw via Bitcoin</h2>
		<a href="javascript:void(0)" class="iziModal-button-close" data-izimodal-close=""></a>
	</div>
	<div class="iziModal-wrap">
		<div class="iziModal-content">
		<form method="POST" action="assets/account/withdraw-request" class="row">
			<div class="col-12">
				<div class="danger margintb">Withdraw Charge : (25 + 2.25%) - USD</div>
				<div class="display-container">
					<input type="number" required name="btc_amount_withdraw" placeholder="Amount" class="padding bold" style="width: 100%; padding-right: 70px !important">
					<span class="display-topright grey padding border" style="display: inline-block">USD</span>
				</div>
				<button class="btn default padding center" style="margin-top: 10px; width: 100%"><i class="fa fa-send"></i> WITHDRAW NOW</button>
			</div>
		</div>
		</form>
		</div>
	</div>
</div>
<div id="modal-content5" class="iziModal card" style="border-bottom: 3px solid #FF6600; overflow: hidden; display: none; max-width:90% !important;">
	<div class="iziModal-header"style="background: #333;">
		<i class="iziModal-header-icon icon-stack fa fa-inbox"></i>
		<h2 class="iziModal-header-title" style="color: #fff !important">Withdraw via Ethereum</h2>
		<a href="javascript:void(0)" class="iziModal-button-close" data-izimodal-close=""></a>
	</div>
	<div class="iziModal-wrap">
		<div class="iziModal-content">
		<form method="POST" action="assets/account/withdraw-request" class="row">
			<div class="col-12">
				<div class="danger margintb">Withdraw Charge : (25 + 2.30%) - USD</div>
				<div class="display-container">
					<input type="number" required name="eth_amount_withdraw" placeholder="Amount" class="padding bold" style="width: 100%; padding-right: 70px !important">
					<span class="display-topright grey padding border" style="display: inline-block">USD</span>
				</div>
				<button class="btn default padding center" style="margin-top: 10px; width: 100%"><i class="fa fa-send"></i> WITHDRAW NOW</button>
			</div>
		</div>
		</form>
		</div>
	</div>
</div>
<div id="modal-content6" class="iziModal card" style="border-bottom: 3px solid #FF6600; overflow: hidden; display: none; max-width:90% !important;">
	<div class="iziModal-header"style="background: #333;">
		<i class="iziModal-header-icon icon-stack fa fa-inbox"></i>
		<h2 class="iziModal-header-title" style="color: #fff !important">Withdraw via Skrill</h2>
		<a href="javascript:void(0)" class="iziModal-button-close" data-izimodal-close=""></a>
	</div>
</div>
<script src="{{ asset('/assets/js/iziModal.min.js')}}"></script>


<script>
if ($(window).width() > 992) {
	boxPosition = $(".udex-sidebar").offset().top;
	$(window).scroll(function(){
	   var isFixed = $(".udex-sidebar").css("position") === "fixed";
	   if($(window).scrollTop() > boxPosition && !isFixed){
				$(".udex-sidebar").css({position:"fixed", top: "0px"});
	   }else if($(window).scrollTop() < boxPosition){
			$(".udex-sidebar").css({position:"absolute", top: "auto"});
	   }
	});
}
</script>
<script>
$("#modal-content, #modal-content2, #modal-content3, #modal-content4, #modal-content5, #modal-content6").iziModal({
        overlayColor: 'rgba(0, 0, 0, 0.8)',
		iconClass: 'icon-stack',
        width: 360,
        padding: 5
    });
    $(document).on('click', '.trigger-btc', function (event) {
        event.preventDefault();
        $('#modal-content').iziModal('open');
    });
    $(document).on('click', '.trigger-eth', function (event) {
        event.preventDefault();
        $('#modal-content2').iziModal('open');
    });
    $(document).on('click', '.trigger-skr', function (event) {
        event.preventDefault();
        $('#modal-content3').iziModal('open');
    });
    $(document).on('click', '.trigger-withdraw-btc', function (event) {
        event.preventDefault();
        $('#modal-content4').iziModal('open');
    });
    $(document).on('click', '.trigger-withdraw-eth', function (event) {
        event.preventDefault();
        $('#modal-content5').iziModal('open');
    });
    $(document).on('click', '.trigger-withdraw-skr', function (event) {
        event.preventDefault();
        $('#modal-content6').iziModal('open');
    });
</script>
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

