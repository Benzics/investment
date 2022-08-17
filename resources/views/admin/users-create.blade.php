@include('includes.admin.header')


    <div class="container vh">
        <nav aria-label="breadcrumb" class="mt-3">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ url('/admin/users') }}">Users</a></li>
              <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
        </nav>
        <h2 class="mt-4 mb-3 page-title">Create New User</h2>

      
        <form action="{{url('/admin/users')}}" method="post">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" required id="name" placeholder="Full name" value="{{ old('name') }}">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">User Email</label>
                        <input type="email" name="email" id="email" required value="{{ old('email') }}" class="form-control" placeholder="User email address">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" class="form-control" name="password" required placeholder="Password">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Create User</button>
            </div>
        </form>
    </div>


@include('includes.admin.footer')