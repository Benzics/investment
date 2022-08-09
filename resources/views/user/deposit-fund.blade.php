@include('includes.user.header')
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

  
	<div class="col-4 col-m-6 sticky">
		<div class="white section round center" style="padding:0">
			<div class="has-gradient-to-right-bottom padding"><h4 class="text-white">Ethereum</h4></div>
			<ul class="listing padding">
				<li><img src="{{ $payment->image }}"></li>
				<li>
					<a href="{{ url('/user/deposit') }}" class="btn has-gradient-to-right-bottom round-xxlarge" style="font-size: 14px; padding: 5px 20px"><i class="fa fa-send"></i> GO BACK</a>
				</li>
			</ul>
		</div>
	</div>
	<form action="/user/deposit" method="POST" enctype="multipart/form-data" class="col-8 col-m-6 sticky" id="form">
        @csrf
	
	<input type="hidden" name="amount" value="{{ $amount }}" required>
	<input type="hidden" name="charges" value="{{ $charges }}" required>
    <input type="hidden" name="payment_id" value="{{ $payment->id }}" required>
	
	<div class="white section round">
	<h4>Deposit Preview</h4><hr>
	<div class="row container" style="max-width: 500px">
		<div class="col-4 col-m-12 bold udex-right">
			Deposit Amount:
		</div>
		<div class="col-8 col-m-12">
			<div class="display-container">
				<input type="number" name="amount" value="{{ $amount }}" required class="bold padding" style="width: 100%; padding-right: 80px !important;" disabled>
				<span class="padding border grey display-topright" style="display: inline-block;">USD</span>
			</div>
		</div>
		<div class="col-4 col-m-12 bold udex-right">
			Deposit Charge:
		</div>
		<div class="col-8 col-m-12">
			<div class="display-container">
				<input type="number" name="charges" value="{{ $charges }}" required class="bold padding" style="width: 100%; padding-right: 80px !important;" disabled>
				<span class="padding border grey display-topright" style="display: inline-block;">USD</span>
			</div>
		</div>
		<div class="col-4 col-m-12 bold udex-right">
			Total Amount:
		</div>
		<div class="col-8 col-m-12">
			<div class="display-container">
				<input type="number" name="total" value="{{ $amount + $charges }}" required class="bold padding" style="width: 100%; padding-right: 80px !important;" disabled>
				<span class="padding border grey display-topright" style="display: inline-block;">USD</span>
			</div>
		</div>
	</div><hr>
	<div class="center container" style="max-width: 500px">
		<h4>SENDING DETAILS</h4>
		<h6>Official Wallet Address:</h6><div class="text-red">{{ $payment->address }}</div>
	</div><hr>
	<div class="row container" style="max-width: 500px">
		<div class="col-12 center"><h4>DEPOSIT PROOF</h4><hr>
		<div class="col-4 col-m-12 bold udex-right">Select Image:</div>
		<div class="col-8 col-m-12">
			<div class="display-container">
				<input type="file" name="attachment" required class="bold padding" style="width: 100%; padding-right: 60px !important;">
				<span class="padding border grey display-topright" style="display: inline-block;"><i class="fa fa-photo"></i></span>
			</div>
		</div>
		<div class="col-4 col-m-12 bold udex-right">Message:</div>
		<div class="col-8 col-m-12">
			<div class="display-container">
				<textarea name="description" class="bold padding" style="width: 100%; height: 100px"></textarea>
				<button class="btn has-gradient-to-right-bottom" style="font-size: 14px; padding: 15px 20px; width: 100%"><i class="fa fa-send"></i> SUBMIT NOW</button>
			</div>
		</div>
	</div>
	</div>
	</div>
	</div>
	</form>
<style> 
	.div-symbol-explanation { display: none; }
	#main {padding: 0 20px !important; } .row.kk [class*="col-"] { padding: 1px 5px;}
	@media (min-width: 992px){
		#main {padding: 0 40px !important; } .row.kk [class*="col-"] { padding: 1px 15px;}
	}
</style>	