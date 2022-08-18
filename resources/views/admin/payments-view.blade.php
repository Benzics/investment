@include('includes.admin.header')



<div class="container vh">

    <nav aria-label="breadcrumb" class="mt-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ url('/admin/payment-settings') }}">{{ $page_title }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">View</li>
        </ol>
    </nav>

    <div class="card mt-5">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <div class="row">
                    <div class="col-6">Name</div>
                    <div class="col-6">{{ $payment->name }}</div>
                </div>
            </li>

            <li class="list-group-item">
                <div class="row">
                    <div class="col-6">Logo</div>
                    <div class="col-6"><img src="{{ asset($payment->image) }}" alt="logo" style="max-width: 100px"></div>
                </div>
            </li>

            <li class="list-group-item">
                <div class="row">
                    <div class="col-6">Address</div>
                    <div class="col-6">{{ $payment->address }}</div>
                </div>
            </li>

            <li class="list-group-item">
                <div class="row">
                    <div class="col-6">Status</div>
                    <div class="col-6">{{ map_investment_status($payment->status) }}</div>
                </div>
            </li>
            
            </li>

           
        </div>
    </div>
</div>

@include('includes.admin.footer')
