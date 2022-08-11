@include('includes.user.header')

@foreach($investments as $row)
<div class="col-4 col-m-6">
	<form action="" method="POST" class="white section round center" style="padding:0">
        @csrf
		<div class="has-gradient-to-right-bottom padding"><h4 class="text-white">{{ $row->name }}</h4></div>
		<ul class="listing padding">
			<li class="bold grey">{{ $row->minimum . ' ' . $currency }} - {{ $row->maximum . ' ' . $currency }} USD</li>
			<li>Commission - {{ $row->commission }}</li>
			<li>Time - {{ $row->times }} times</li>
			<li>Compound - <span class="border-green small round-xxlarge smpadding">{{ $row->type }}</span></li>
			<input type="hidden" name="investment_id" value="{{ $row->id }}">
			<li class="grey">
				<button class="btn has-gradient-to-right-bottom round-xxlarge" style="font-size: 14px; padding: 5px 20px"><i class="fa fa-send"></i> INVEST NOW</button>
			</li>
		</ul>
	</form>
</div>
@endforeach

@include('includes.user.footer')