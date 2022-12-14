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
                    <th>Charges</th>
                    <th>Total</th>
                    <th>Method</th>
                    <th>Proof</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
              
                @php $id = 0; @endphp
                @foreach ($deposits as $row)
                @php $id++ @endphp
                <tr>
                    <td>{{ $id }}</td>
                    <td>{{ get_email($row->user_id) }}</td>
                    <td>{{ currency_symbol() . num_format($row->amount) }}</td>
                    <td>{{ currency_symbol() . num_format($row->charges) }}</td>
                    <td>{{ currency_symbol() . num_format($row->total) }}</td>
                    <td>{{ $row->name }}</td>
                    <td><a href="{{ asset('storage/' . $row->attachment) }}" target="_blank">View Attachment</a></td>
                    <td>{{ map_withdrawal_status($row->status) }}</td>
                    <td>
                        @if($row->status == 0)
                        <a href="{{ url('/admin/deposits/approve/' . $row->id) }}"  data-toggle="tooltip" title="Approve" class="btn btn-primary mb-1"><i class="fas fa-check-circle"></i></a>
                        <a href="{{ url('/admin/deposits/decline/' . $row->id) }}"  data-toggle="tooltip" title="Decline" class="btn btn-warning mb-1"><i class="fas fa-times-circle"></i></a>
                        @endif
                        
                        <form method="post" action="{{url('/admin/deposits/delete')}}" onsubmit="return confirm('Are you sure you want to delete this deposit?')">
                            @csrf
                            <input type="hidden" name="id" value="{{ $row->id }}">
                            <button class="btn btn-danger" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
      
    </div>
</div>



@include('includes.admin.footer')