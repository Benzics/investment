@include('includes.admin.header')


    <div class="container">
        <h2 class="mt-4 b-3 page-title">Create New User</h2>

      
        <form action="{{url('/admin/users')}}" method="post">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Full name" value="{{ old('name') }}">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">User Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="User email address">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="amount">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Create User</button>
            </div>
        </form>
    </div>


@include('includes.admin.footer')