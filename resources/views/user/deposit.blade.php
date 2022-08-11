@include('includes.user.header')


@foreach($payments as $row)
<div class="col-4 col-m-6">
<div class="white section round">
	<h4>{{ $row->name }}</h4>
	<div class="center padding" style="border: 2px dashed #FF6600">
		<img src="{{ asset($row->image)}}" style="height:90px">
	</div>
	<button class="btn has-gradient-to-right-bottom margintb trigger-payment" data-id="{{ $row->id }}" style="padding: 10px 20px"><i class="fa fa-send"></i> Add Fund</button>
</div>
</div>
@endforeach

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

@foreach($payments as $row)
<div id="payment-method{{ $row->id }}" class="iziModal card" style="border-bottom: 3px solid #FF6600; overflow: hidden; display: none; max-width:90% !important;">
	<div class="iziModal-header"style="background: #333;">
		<i class="iziModal-header-icon icon-stack fa fa-inbox"></i>
		<h2 class="iziModal-header-title" style="color: #fff !important">Add Fund via {{ $row->name }}</h2>
		<a href="javascript:void(0)" class="iziModal-button-close" data-izimodal-close=""></a>
	</div>
	<div class="iziModal-wrap">
		<div class="iziModal-content">
		<form method="POST" action="/user/deposit-fund" class="row">
            @csrf
            <input type="hidden" name="payment_id" value="{{ $row->id }}">
			<div class="col-12">
				<div class="danger margintb">Deposit Charge : {{ $charges }}</div>
				<div class="display-container">
					<input type="number" required name="amount" placeholder="Amount" class="padding bold" style="width: 100%; padding-right: 70px !important">
					<span class="display-topright grey padding border" style="display: inline-block">{{ $currency }}</span>
				</div>
				<button class="btn default padding center" style="margin-top: 10px; width: 100%"><i class="fa fa-send"></i> CONTINUE</button>
			</div>
		</div>
		</form>
		</div>
	</div>
</div>

@endforeach




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
$("{{ $payment_string ? $payment_string . ',' : ''}} #modal-content4, #modal-content5, #modal-content6").iziModal({
        overlayColor: 'rgba(0, 0, 0, 0.8)',
		iconClass: 'icon-stack',
        width: 360,
        padding: 5
    });
    $(document).on('click', '.trigger-payment', function (event) {
        event.preventDefault();
       
        var payment_id = $(this).attr('data-id');
        $('#payment-method' + payment_id).iziModal('open');
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

