@include('includes.admin.header')



<div class="container vh">
    <nav aria-label="breadcrumb" class="mt-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ $page_title }}</li>
        </ol>
    </nav>
    <h2 class="mt-4 mb-3 page-title">{{ $page_title }}</h2>

    <div class="table-responsive">
        <table id="data-table" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Amount</th>
                    
                    <th>Investment Plan</th>
                    <th>Status</th>
                    <th>Date</th>
                   
                </tr>
            </thead>
            <tbody>
                @php($id = 0)

                @foreach($investments as $row)
                @php($id++)

                <tr>
                    <td>{{ $id }}</td>
                    <td>{{ get_email($row->user_id) }}</td>
                    <td>{{ currency_symbol() . num_format($row->amount) }}</td>
                    <td>{{ $row->name }}</td>
                    <td> {{ map_investment_status($row->status) }} </td>
                    <td>{{ friendly_time($row->created_at) }}</td>
                </tr>

                @endforeach
            </tbody>
        </table>
       
    </div>
</div>



@include('includes.admin.footer')
