@include('includes.admin.header')


    <div class="container">
        <h2 class="mt-4 b-3 page-title">Fund User Wallet</h2>

      
        <form action="" method="post">
            @csrf
            <div class="form-group">
                <label for="email">User Email</label>
                <input type="email" name="email" required id="email" value="{{ old('email') }}" class="form-control" placeholder="User email address">
            </div>
            <div class="form-group">
                <label for="amount">Amount {{ currency_short() }}</label>
                <input type="number" required class="form-control" value="{{ old('amount') }}" name="amount" placeholder="Amount to add to wallet">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Fund Wallet</button>
            </div>
        </form>
    </div>


@include('includes.admin.footer')