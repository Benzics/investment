@include('includes.admin.header')



<div class="container vh">
    <nav aria-label="breadcrumb" class="mt-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Investment Plans</li>
        </ol>
    </nav>
    <h2 class="mt-4 mb-3 page-title">Investment Plans</h2>

    <div class="mb-3 mt-3 d-flex justify-content-end">
        <a href="{{url('/admin/investments/create')}}" class="btn btn-primary" data-toggle="tooltip" title="Add investment plan"><i class="fas fa-plus"></i></a>
    </div>
    <div class="table-responsive">
        <table id="data-table" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Commission</th>
                    
                    <th>Minimum</th>
                    <th>Maximum</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php($id = 0)

             
                @foreach($investments as $row)
                @php($id++)

                <tr>
                    <td>{{ $id }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->commission }}</td>
                    <td>{{ currency_symbol() . num_format($row->minimum) }}</td>
                    <td>{{ currency_symbol() . num_format($row->maximum) }}</td>
                    <td>
                        <a href="{{ url('/admin/investments/' . $row->id) }}" class="btn btn-primary mb-2" data-toggle="tooltip" title="View"><i class="fas fa-eye"></i></a>
                        <a href="{{ url('/admin/investments/' . $row->id . '/edit') }}" class="btn btn-primary mb-2" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
                       
                        <form action="{{url('/admin/investments/' . $row->id)}}" 
                            onsubmit="return confirm('Are you sure you want to delete {{$row->email}}?')" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger"  data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></button>
                        </form>
                       
                       
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
       
    </div>
</div>



@include('includes.admin.footer')
