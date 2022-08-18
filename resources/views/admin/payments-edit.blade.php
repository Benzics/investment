@include('includes.admin.header')


    <div class="container vh">
        <nav aria-label="breadcrumb" class="mt-3">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ url('/admin/payment-settings') }}">{{ $page_title }}</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
        <h2 class="mt-4 b-3 page-title">Edit {{ $page_title }}</h2>

      
        <form action="{{url('/admin/payment-settings/' . $id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Payment Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" required id="name" value="{{ old('name', $payment->name) }}" class="form-control" placeholder="Payment method name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address">Payment Address <span class="text-danger">*</span></label>
                        <input type="text" required class="form-control" value="{{ old('address', $payment->address) }}" name="address" placeholder="Address to receive payments">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="image">Payment Logo </label>
                        <input type="file" class="form-control" name="image">
                        <small class="text-muted">{{ asset($payment->image) }}</small>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1" {{ $payment->status == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $payment->status == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>

            </div>
            <div class="form-group">
                <button class="btn btn-primary">Edit Payment Method</button>
            </div>
           
        </form>
    </div>


@include('includes.admin.footer')