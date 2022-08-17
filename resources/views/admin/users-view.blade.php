@include('includes.admin.header')



<div class="container vh">

    <nav aria-label="breadcrumb" class="mt-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ url('/admin/users') }}">Users</a></li>
          <li class="breadcrumb-item active" aria-current="page">View</li>
        </ol>
    </nav>

    <div class="card mt-5">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <div class="row">
                    <div class="col-6">Email</div>
                    <div class="col-6">{{ $user->email }}</div>
                </div>
            </li>

            <li class="list-group-item">
                <div class="row">
                    <div class="col-6">Name</div>
                    <div class="col-6">{{ $user->name }}</div>
                </div>
            </li>

            <li class="list-group-item">
                <div class="row">
                    <div class="col-6">Photo</div>
                    <div class="col-6"><img src="{{asset("/storage/$profile->photo")}}" alt="Profile Picture" style="max-width:100px"></div>
                </div>
            </li>

            <li class="list-group-item">
                <div class="row">
                    <div class="col-6">Status</div>
                    <div class="col-6">{{ map_user_status($user->status) }}</div>
                </div>
            </li>

            <li class="list-group-item">
                <div class="row">
                    <div class="col-6">Gender</div>
                    <div class="col-6">{{ $profile->gender }}</div>
                </div>
            </li>

            <li class="list-group-item">
                <div class="row">
                    <div class="col-6">Phone</div>
                    <div class="col-6">{{ $profile->phone }}</div>
                </div>
            </li>

            <li class="list-group-item">
                <div class="row">
                    <div class="col-6">Address</div>
                    <div class="col-6">{{ $profile->address }}</div>
                </div>
            </li>

            <li class="list-group-item">
                <div class="row">
                    <div class="col-6">Zip Code</div>
                    <div class="col-6">{{ $profile->zip }}</div>
                </div>
            </li>

            <li class="list-group-item">
                <div class="row">
                    <div class="col-6">Country</div>
                    <div class="col-6">{{ $profile->country }}</div>
                </div>
            </li>
        </div>
    </div>
</div>

@include('includes.admin.footer')
