@include('includes.admin.header')

<style>
    .dash-card i {
        font-size: 3em;
        display: block;
    }
    .dash-card .info {
        font-size: 2em;
        display: block;
        font-family: serif;
    }
    .dash-card .info-2 {
        font-size: 1.4em;
        display: block;
        font-family: sans-serif;
        letter-spacing: 1px;
    }
    .bg-purple {
        background-color: purple;
    }
    .left-tag {
        text-align: right;
        border: 1px solid #fff;
        background: #fd961a;
        color: #333;
        font-weight: bold;
    }
    .right-tag {
        text-align: left;
        border: 1px solid #fff;
        background: #ddd;
        color: #fff;
        font-weight: bold;
    }
    .bg-brown {
        background-color: #fd961a;
        color: #000;
    }

    .bg-lightg {
        background-color: #eee;
    }
    .thumb {
        width: 50px;
        height: 50px;
    }
</style>
<div class="container vh">
    <nav aria-label="breadcrumb" class="mt-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">{{ $page_title }}</li>
        </ol>
    </nav>
    <h2 class="mt-4 b-3 page-title">Information</h2>

   <div class="row">
        <div class="col-5 left-tag">
            <div class="p-2 ">Users</div>
        </div>
        <div class="col-7 right-tag">
            <div class="p-2">
                <span class="badge badge-primary">{{ $users }}</span>
                <span class="badge badge-success">{{ $active_users }}</span>
                <span class="badge badge-danger">{{ $inactive_users }}</span>
            </div>
        
        </div>
        <div class="col-5 left-tag">
            <div class="p-2 ">Active Users</div>
        </div>
        <div class="col-7 right-tag">
            <div class="p-2">
                <span class="badge badge-success">{{ $active_users }}</span>
                <span class="badge badge-danger">{{ $inactive_users }}</span>
            </div>
        
        </div>
        <div class="col-5 left-tag">
            <div class="p-2 ">Investment Packages</div>
        </div>
        <div class="col-7 right-tag">
            <div class="p-2">
                <span class="badge badge-success">{{ $investment_packages }}</span>
            
            </div>
        
        </div>
        <div class="col-5 left-tag">
            <div class="p-2 ">Withdrawal Requests</div>
        </div>
        <div class="col-7 right-tag">
            <div class="p-2">
              
                <span class="badge badge-danger">{{ $pending_withdrawals }}</span>
            </div>
           
        </div>
        <div class="col-5 left-tag">
            <div class="p-2 ">Pending Deposits</div>
        </div>
        <div class="col-7 right-tag">
            <div class="p-2">
                <span class="badge badge-success">{{ $pending_deposits }}</span>
            </div>
           
        </div>
   </div>

   <div class="table-responsive mt-5 mb-5">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th></th>
                
                <th>Total Members Fund Added</th>
                <th>Current Deposits</th>
                <th>Total Withdrawals</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payment_methods as $row)
            <tr>
                <td><img src="{{ asset($row->image) }}" alt="{{ $row->name }}" class="thumb"></td>
             
                <td class="text-success">{{ currency_symbol() . num_format(getDeposits($row->id)) }}</td>
                <td class="text-info">{{ currency_symbol() .  num_format(getCurrentDeposits($row->id)) }}</td>
                <td class="text-danger">{{ currency_symbol() .  num_format(getWithdrawals($row->id)) }}</td>
            </tr>
            @endforeach
           
        </tbody>
    </table>
   </div>

   <div class="mt-2 mb-2">
    <h3>Total In/Out</h3>
        <div class="position-relative mb-5"><canvas id="totalearning"></canvas></div>
   </div>
   <div class="mt-3 table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th colspan="2">24 Hours</th>
                    <th colspan="2">7 days</th>
                    <th colspan="2">Month</th>
                    <th colspan="2">Year</th>
                    <th colspan="2">All Time</th>
                </tr>
                <tr>
                    <th>In</th>
                    <th>Out</th>
                    <th>In</th>
                    <th>Out</th>
                    <th>In</th>
                    <th>Out</th>
                    <th>In</th>
                    <th>Out</th>
                    <th>In</th>
                    <th>Out</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-success">{{ currency_symbol() . num_format($hours_in) }}</td>
                    <td class="text-danger">{{ currency_symbol() . num_format($hours_out) }}</td>

                    <td class="text-success">{{ currency_symbol() . num_format($week_in) }}</td>
                    <td class="text-danger">{{ currency_symbol() . num_format($week_out) }}</td>

                    <td class="text-success">{{ currency_symbol() . num_format($month_in) }}</td>
                    <td class="text-danger">{{ currency_symbol() . num_format($month_out) }}</td>

                    <td class="text-success">{{ currency_symbol() . num_format($year_in) }}</td>
                    <td class="text-danger">{{ currency_symbol() . num_format($year_out) }}</td>

                    <td class="text-success">{{ currency_symbol() . num_format($all_time_in) }}</td>
                    <td class="text-danger">{{ currency_symbol() . num_format($all_time_out) }}</td>
                </tr>
            </tbody>
        </table>
   </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.1.1/chart.umd.js" integrity="sha512-+Aecf3QQcWkkA8IUdym4PDvIP/ikcKdp4NCDF8PM6qr9FtqwIFCS3JAcm2+GmPMZvnlsrGv1qavSnxL8v+o86w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var chart = document.getElementById('totalearning');
    const data = {!! $var_data !!};

    const out = {!! $withdrawal_data !!};

    new Chart(chart, {
        type: 'bar',
        data: {
            labels: data.map(x => x.month),
            datasets: [
                {
                    label: 'Money In',
                    data: data.map(x => x.count),
                },
                {
                    label: 'Money Out',
                    data: out.map(x => x.count),
                }
            ]
        }
    });

</script>
@include('includes.admin.footer')