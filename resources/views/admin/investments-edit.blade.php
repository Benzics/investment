@include('includes.admin.header')


    <div class="container vh">
        <nav aria-label="breadcrumb" class="mt-3">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ url('/admin/investments') }}">Investment Plans</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
        <h2 class="mt-4 mb-3 page-title">Edit Investment Plan</h2>

      
        <form action="{{url('/admin/investments/' . $id)}}" method="post">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" required id="name" placeholder="Plan name" value="{{ old('name', $investment->name) }}">
                    </div>
                </div>
           
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="commission">Commission <span class="text-danger">*</span></label>
                        <input type="number" name="commission" id="commission" required value="{{ old('commission', $investment->commission) }}" class="form-control" placeholder="Commission">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="commission_type">Commission Type ( <small class="text-muted">Is commission paid in a fixed amount or a percentage</small> )</label>
                        <select name="commission_type" id="commission_type" class="form-control">
                            <option {{ $investment->commission_type == 0 ? 'selected' : '' }} value="0">Percentage</option>
                            <option {{ $investment->commission_type == 1 ? 'selected' : '' }} value="1">Fixed Amount</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="minimum">Minimum Amount <span class="text-danger">*</span></label>
                        <input type="number" name="minimum" id="minimum" required value="{{ old('minimum', $investment->minimum) }}" class="form-control" placeholder="Minimum investment amount">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="maximum">Maximum Amount <span class="text-danger">*</span></label>
                        <input type="number" name="maximum" id="maximum" required value="{{ old('maximum', $investment->maximum) }}" class="form-control" placeholder="Maximum investment amount">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="type">Commission Interval ( <small class="text-muted">Days between each commission</small> ) <span class="text-danger">*</span></label>
                        <input type="number" name="type" id="type" required value="{{ old('type', $investment->type) }}" class="form-control" placeholder="Commission interval">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="times">Commission Times ( <small class="text-muted">Number of times commission is paid</small> ) <span class="text-danger">*</span></label>
                        <input type="number" name="times" id="times" required value="{{ old('times', $investment->times) }}" class="form-control" placeholder="Commission times">
                    </div>
                </div>
                
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Edit Plan</button>
            </div>
        </form>
    </div>


@include('includes.admin.footer')