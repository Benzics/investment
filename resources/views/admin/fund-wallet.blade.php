@include('includes.admin.header')

<main class="col-12 col-xl-10 col-md-9">
    <div class="container">
        <h2 class="mt-4 b-3">Fund User Wallet</h2>

        @if (session('success') !== null)
       
        <div class="alert alert-success mb-3">
            {{ session('success') }}
        </div>
        
        @endif
        
        @if (session('error') !== null)
      
        <div class="alert alert-danger mb-3">
            {{ session('error') }}
        </div>
        
        @endif
        
        @if ($errors->any())

        <div class="alert alert-danger mb-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        
        @endif
        <form action="" method="post">
            @csrf
            <div class="form-group">
                <label for="email">User Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="User email address">
            </div>
            <div class="form-group">
                <label for="amount">Amount {{ currency_short() }}</label>
                <input type="number" class="form-control" value="{{ old('amount') }}" name="amount" placeholder="Amount to add to wallet">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Fund Wallet</button>
            </div>
        </form>
    </div>
</main>

@include('includes.admin.footer')