@include('includes.user.header')

<div class="col-4 col-m-6">
	<div class="white section round center" style="padding:0">
		<div class="has-gradient-to-right-bottom padding"><h4 class="text-white">{{ $name ?? '' }}</h4></div>
		<ul class="listing padding">
			<li class="bold grey">{{ $minimum ?? 0 }} - {{ $maximum ?? 0 }} </li>
			<li>Commission - {{ $commission ?? 0 }}</li>
			<li>Time - {{ $times ?? 0 }} times</li>
			<li>Compound - <span class="border-green small round-xxlarge smpadding">{{ $type ?? '' }}</span></li>
			<li>
				<a href="{{ url('/user/new-investment') }}" class="btn has-gradient-to-right-bottom round-xxlarge" style="font-size: 14px; padding: 5px 20px"><i class="fa fa-send"></i> GO BACK</a>
			</li>
		</ul>
	</div>
</div>
<form method="POST" action="{{ url('/user/invest') }}" class="col-8 col-m-6">
    @csrf
<input type="hidden" name="investment_id" value="{{ $investment->id ?? 0 }}">

<div class="white section round">
<h4>Investment Preview</h4>
<h2 class="padding center" style="font-weight: 100">Current Balance : <strong> {{ $balance }} USD</strong></h2>
<hr/>
Amount 
@if($low_balance)
<div class="danger">Your balance must be more than the minimum investment amount!</div>
@endif

<div class="display-container">
	<input type="number" name="amount" min="{{$investment->minimum}}" required placeholder="Enter Investment Amount" class="bold padding" 
    style="width: 100%; padding-left: 60px !important; padding-right: 80px !important;" 
    @if($low_balance) disabled @endif>
	<span class="padding border grey display-topleft" style="display: inline-block;">{{ $currency_sign ?? ''}}</span>
	<span class="padding border grey display-topright" style="display: inline-block;">{{ $currency ?? ''}}</span>

    @if(!$low_balance)
        <br>
        <button class="btn has-gradient-to-right-bottom round-xxlarge" style="font-size: 14px; padding: 5px 20px"><i class="fa fa-send"></i> INVEST NOW</button>
  
    @endif
</div>
</div>
</form>
</div>

@include('includes.user.footer')