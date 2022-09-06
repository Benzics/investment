@include('includes.admin.header')


    <div class="container vh">
        <nav aria-label="breadcrumb" class="mt-3">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
              
              <li class="breadcrumb-item active" aria-current="page">{{ $page_title }}</li>
            </ol>
        </nav>
        <h2 class="mt-4 b-3 page-title">{{ $page_title }}</h2>

      
        <form action="" method="post">
            @csrf
            <div class="form-group">
                <label for="email">User Email <span class="text-danger">*</span></label>
                <input type="email" name="email" required id="email" value="{{ old('email') }}" class="form-control" placeholder="User email address">
            </div>
            <div class="form-group">
                <label for="amount">Amount {{ currency_short() }} <span class="text-danger">*</span></label>
                <input type="text" required class="form-control" value="{{ old('amount') }}" name="amount" placeholder="Amount to add to wallet">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">{{$page_title}}</button>
            </div>
        </form>
    </div>


@include('includes.admin.footer')