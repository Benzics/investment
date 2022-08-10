@include('includes.user.header')

<div class="white section round row kk" style="padding: 0px">
    @foreach($payments as $row)
    <div class="col-4 col-m-6">
        <div class="center">
            <div class="has-gradient-to-right-bottom padding"><h4 class="text-white">{{ $row->name }}</h4></div>
            <ul class="listing padding">
                <li class="border margintb">Minimum - 500 USD</li>
                <li class="border margintb">Maximum - 1000000 USD</li>
                <li class="border margintb">Charge - 25 + 2.25 USD</li>
                <li class="border margintb">Processing Time - <span class="border-green small round-xxlarge smpadding">1 Day</span></li>
                <li>
                    <button class="btn default round-xxlarge trigger-withdraw" data-id="{{ $row->id }}" style="font-size: 14px; padding: 5px 20px"><i class="fa fa-send"></i> WITHDRAW NOW</button>
                </li>
            </ul>
        </div>
    </div>
    @endforeach
    
    </div>
    <style>
        .row.kk [class*="col-"] { padding: 5px 5px;}
        @media (min-width: 992px){
            .row.kk [class*="col-"] { padding: 4px 8px;}
        }
    </style>	

@foreach($payments as $row)
<div id="withdraw-content{{ $row->id }}" class="iziModal card" style="border-bottom: 3px solid #FF6600; overflow: hidden; display: none; max-width:90% !important;">
	<div class="iziModal-header"style="background: #333;">
		<i class="iziModal-header-icon icon-stack fa fa-inbox"></i>
		<h2 class="iziModal-header-title" style="color: #fff !important">Withdraw via {{ $row->name }}</h2>
		<a href="javascript:void(0)" class="iziModal-button-close" data-izimodal-close=""></a>
	</div>
	<div class="iziModal-wrap">
		<div class="iziModal-content">
		<form method="POST" action="" class="row">
            @csrf
			<div class="col-12">
				<div class="danger margintb">Withdraw Charge : (25 + 2.25%) - USD</div>
				<div class="display-container">
					<input type="number" required name="amount" placeholder="Amount" class="padding bold" style="width: 100%; padding-right: 70px !important">
                    <input type="hidden" name="payment_id" value="{{ $row->id }}">
					<span class="display-topright grey padding border" style="display: inline-block">USD</span>
				</div>
				<button class="btn default padding center" style="margin-top: 10px; width: 100%"><i class="fa fa-send"></i> WITHDRAW NOW</button>
			</div>
		</div>
		</form>
		</div>
	</div>
</div>
@endforeach

<script>

$("{{ $payment_string ? $payment_string : ''}}").iziModal({
        overlayColor: 'rgba(0, 0, 0, 0.8)',
		iconClass: 'icon-stack',
        width: 360,
        padding: 5
    });
    $(document).on('click', '.trigger-withdraw', function (event) {
    event.preventDefault();
    var payment_id = $(this).attr('data-id');

    $('#withdraw-content' + payment_id).iziModal('open');
});
</script>

@include('includes.user.footer')