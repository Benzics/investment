@include('includes.admin.header')



<div class="container vh">
    <nav aria-label="breadcrumb" class="mt-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">User Withdrawals</li>
        </ol>
    </nav>
    <h2 class="mt-4 mb-3 page-title">User Withdrawals</h2>

    <div class="table-responsive">
        <table id="data-table" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Amount</th>
                    <th>Method</th>
                    <th>Address</th>
                    
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php($id = 0)

             
                @foreach($withdrawals as $row)
                @php($id++)

                <tr>
                    <td>{{ $id }}</td>
                    <td>{{ get_email($row->user_id) }}</td>
                   
                    <td>{{ currency_symbol() . num_format($row->amount) }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->address }}</td>
                    <td>{{ map_withdrawal_status_two($row->status) }}</td>
                    <td>
                        @if($row->status == 0)
                        <a href="{{ url('/admin/withdrawals/approve/' . $row->id) }}" class="btn btn-primary mb-2" data-toggle="tooltip" title="Mark as paid"><i class="fas fa-check-circle"></i></a>
                        <a href="{{ url('/admin/withdrawals/decline/' . $row->id) }}" class="btn btn-danger mb-2" data-toggle="tooltip" title="Decline"><i class="fas fa-times-circle"></i></a>
                        @endif
                       
                       
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
       
    </div>
</div>



@include('includes.admin.footer')
