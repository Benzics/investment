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
</style>
<div class="container vh">
    <nav aria-label="breadcrumb" class="mt-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">{{ $page_title }}</li>
        </ol>
    </nav>
    <h2 class="mt-4 b-3 page-title">{{ $page_title }}</h2>

    <div class="row">
        <div class="col-md-6 col-xl-3">
            <a href="{{ url('/admin/users') }}">
                <div class="card text-white bg-primary dash-card mb-4">
                    <div class="card-body text-center">
                        <i class="fas fa-users"></i>
                        <b class="info">{{ $users }}</b>
                        <p class="">Total Users</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6 col-xl-3">
            <a href="{{ url('/admin/user-investments') }}">
                <div class="card text-white bg-danger dash-card mb-4">
                    <div class="card-body text-center">
                        <i class="fas fa-database"></i>
                        <b class="info">{{ $investments }}</b>
                        <p class="">Active Investments</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6 col-xl-3">
            <a href="{{ url('/admin/deposits') }}">
                <div class="card text-white bg-info dash-card mb-4">
                    <div class="card-body text-center">
                        <i class="fas fa-inbox"></i>
                        <b class="info">{{ $deposits }}</b>
                        <p class="">New Deposits</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6 col-xl-3">
            <a href="{{ url('/admin/withdrawals') }}">
                <div class="card text-white bg-success dash-card mb-4">
                    <div class="card-body text-center">
                        <i class="fas fa-money-bill"></i>
                        <b class="info">{{ $withdrawals }}</b>
                        <p class="">New Withdrawals</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-xl-3">
            
            <div class="card text-white bg-purple dash-card mb-4">
                <div class="card-body text-center">
                    <i class="fas fa-money-bill-alt"></i>
                    <b class="info-2">{{ currency_symbol() . $total_deposit }}</b>
                    <p class="">Total Deposits</p>
                </div>
            </div>
            
        </div>

        <div class="col-md-6 col-xl-3">
            
            <div class="card text-white bg-dark dash-card mb-4">
                <div class="card-body text-center">
                    <i class="fas fa-money-check-alt"></i>
                    <b class="info-2">{{ currency_symbol() . $total_investment }}</b>
                    <p class="">Total Investments</p>
                </div>
            </div>
            
        </div>

    </div>

    <h2 class="mt-3 mb-3">Transaction History</h2>

    <div class="table-responsive">
        <table id="data-table" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Credit</th>
                    <th>Debit</th>
                    <th>Balance</th>
                    <th>Description</th>
                    <th>Type</th>
                    
                </tr>
            </thead>
            <tbody>
              
                @php $id = 0; @endphp
                @foreach ($transactions as $row)
                @php $id++ @endphp
                <tr>
                    <td>{{ $id }}</td>
                    <td>{{ get_email($row->user_id) }}</td>
                    <td>{{ currency_symbol() . num_format($row->credit) }}</td>
                    <td>{{ currency_symbol() . num_format($row->debit) }}</td>
                    <td>{{ currency_symbol() . num_format($row->balance) }}</td>
                    <td>{{ $row->description }}</td>
                    
                    <td>{{ map_transaction_type($row->type) }}</td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
      
    </div>

</div>

@include('includes.admin.footer')