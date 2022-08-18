@include('includes.admin.header')


    <div class="container vh">
        <nav aria-label="breadcrumb" class="mt-3">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ url('/admin/payment-settings') }}">Payment Settings</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add</li>
            </ol>
        </nav>
        <h2 class="mt-4 b-3 page-title">Add Payment Method</h2>

      
        <form action="{{url('/admin/payment-settings')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Payment Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" required id="name" value="{{ old('name') }}" class="form-control" placeholder="Payment method name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address">Payment Address <span class="text-danger">*</span></label>
                        <input type="text" required class="form-control" value="{{ old('address') }}" name="address" placeholder="Address to receive payments">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="image">Payment Logo <span class="text-danger">*</span></label>
                        <input type="file" required class="form-control" value="{{ old('image') }}" name="image">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1" selected>Active</option>
                            <option value="0" selected>Inactive</option>
                        </select>
                    </div>
                </div>

            </div>
            <div class="form-group">
                <button class="btn btn-primary">Add Payment Method</button>
            </div>
           
        </form>
    </div>


@include('includes.admin.footer')