@include('includes.admin.header')



<div class="container vh">

    <nav aria-label="breadcrumb" class="mt-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ url('/admin/investments') }}">{{ $page_title }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">View</li>
        </ol>
    </nav>

    <div class="card mt-5">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <div class="row">
                    <div class="col-6">Name</div>
                    <div class="col-6">{{ $investment->name }}</div>
                </div>
            </li>

            <li class="list-group-item">
                <div class="row">
                    <div class="col-6">Commission</div>
                    <div class="col-6">{{ $investment->commission }}</div>
                </div>
            </li>

            <li class="list-group-item">
                <div class="row">
                    <div class="col-6">Commission type</div>
                    <div class="col-6">{{ map_investment_type($investment->commission_type) }}</div>
                </div>
            </li>

            <li class="list-group-item">
                <div class="row">
                    <div class="col-6">Minimum Amount</div>
                    <div class="col-6">{{ currency_symbol() . num_format($investment->minimum) }}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-6">Maximum Amount</div>
                    <div class="col-6">{{ currency_symbol() . num_format($investment->maximum) }}</div>
                </div>
            </li>

            <li class="list-group-item">
                <div class="row">
                    <div class="col-6">Commission Interval</div>
                    <div class="col-6">{{ $investment->type }} Days</div>
                </div>
            </li>

            <li class="list-group-item">
                <div class="row">
                    <div class="col-6">Commission Duration / Times</div>
                    <div class="col-6">{{ $investment->times }} Days</div>
                </div>
            </li>

           
        </div>
    </div>
</div>

@include('includes.admin.footer')
