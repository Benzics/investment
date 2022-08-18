@include('includes.admin.header')


    <div class="container vh">
        <nav aria-label="breadcrumb" class="mt-3">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ url('/admin/users') }}">Users</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
        <h2 class="mt-4 mb-3 page-title">Edit {{ $page_title }}</h2>

      
        <form action="{{url('/admin/users/' . $id)}}" method="post" autocomplete="off">
            @csrf
            @method('put')

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" required id="name" placeholder="Full name" value="{{ old('name', $user->name) }}">
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">User Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" id="email" required value="{{ old('email', $user->email) }}" class="form-control" placeholder="User email address">
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender"  class="form-control" >
                            <option value="male" {{ $profile->gender == 'male' ? 'selected' : ''; }}>Male</option>
                            <option value="female" {{ $profile->gender == 'female' ? 'selected' : ''; }}>Female</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" class="form-control"  id="phone" name="phone" placeholder="Phone number" value="{{ old('phone', $profile->phone) }}">
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control"  name="address" id="address" placeholder="Address" value="{{ old('address', $profile->address) }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="zip">Zip Code</label>
                        <input type="text" class="form-control"  name="zip" id="zip" placeholder="Zip/Postal" value="{{ old('zip', $profile->zip) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" class="form-control"  name="country" id="country" placeholder="Country" value="{{ old('country', $profile->country) }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">New Password (
                            <small class="text-muted">Leave empty if you don't intend to change password</small>
                            )</label>
                        <input type="password" autocomplete="new-password" class="form-control"  name="password" id="password" placeholder="New Password">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password_confirmation">Confirm New Password (
                            <small class="text-muted">Leave empty if you don't intend to change password</small>
                            )</label>
                        <input type="password" class="form-control" autocomplete="new-password"  name="password_confirmation" id="password_confirmation" placeholder="Confirm New Password">
                    </div>
                </div>

            </div>
            <div class="form-group">
                <button class="btn btn-primary">Update User</button>
            </div>
        </form>
    </div>


@include('includes.admin.footer')