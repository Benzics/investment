@include('includes.admin.header')



<div class="container vh">
    <nav aria-label="breadcrumb" class="mt-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Users</li>
        </ol>
    </nav>
    <h2 class="mt-4 mb-3 page-title">Users</h2>

    <div class="mb-3 mt-3 d-flex justify-content-end">
        <a href="{{url('/admin/users/create')}}" class="btn btn-primary" data-toggle="tooltip" title="Add user"><i class="fas fa-user-plus"></i></a>
    </div>
    <div class="table-responsive">
        <table id="data-table" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php($id = 0)

                @if(count($users) == 0)
                <tr>
                    <td colspan="5">No users found</td>
                </tr>
                @endif
                @foreach($users as $row)
                @php($id++)

                <tr>
                    <td>{{ $id }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ map_user_status($row->status) }}</td>
                    <td>
                        <a href="{{ url('/admin/users/' . $row->id) }}" class="btn btn-primary mb-2" data-toggle="tooltip" title="View"><i class="fas fa-eye"></i></a>
                        <a href="{{ url('/admin/users/' . $row->id . '/edit') }}" class="btn btn-primary mb-2" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
                        @if($row->id != 1)
                        <form action="{{url('/admin/users/' . $row->id)}}" 
                            onsubmit="return confirm('Are you sure you want to delete {{$row->email}}?')" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger"  data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></button>
                        </form>
                        @endif
                       
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
       
    </div>
</div>



@include('includes.admin.footer')
