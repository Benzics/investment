@include('includes.header')
<style>
  .tell {
    margin-top: 1rem;
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;
  }
</style>
<div class="banner-area center">
    <div class="area">
        <div class="bodycontainer">
            <h1 class="tlt text-white" style="margin: 20px 0;">USER <span class="text-default">REGISTRATION</span></h1>
            <div class="banner-title">
               <span class="decor-equal"></span>
            </div>
            <div  style="margin: 20px 0;">
                <a href="{{ url('/') }}">HOME</a> / CREATE AN ACCOUNT
            </div>
        </div>
        <div id="particles-js"></div>
    </div>
    </div>
  
    
    <link rel="stylesheet" href="{{ asset('assets/css/intlTelInput.css')}}">
    <div class="smallcontainer padding">
        <form action="" method="post" class="validate row" id="register">
            @csrf
            <div class="col-12 col-m-12 col-sm-12">
                <div class="title_container">
                      <h4>Create an Account</h4>
                      <span class="decor_default"></span>
                </div>
            </div>
            <div class="col-12">
                @if ($errors->any())
                    <div class="tell">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
                    <div class="col-12 col-m-12 col-sm-12">
                <input type="text" placeholder="Reference ID(Optional)" name="g_id" style="width:100%" style="width:100%" value="{{ old('g_id', $ref) }}" class="round" {{ ($ref) ? 'readonly' : ''}}>
            </div>
                    <div class="col-12 col-m-12 col-sm-12">
                <input type="text" placeholder="Full Name" required name="name" value="{{ old('name') }}" style="width:100%" class="round">
                
            </div>
  
                    <div class="col-12 col-m-12 col-sm-12">
                <input type="email" placeholder="Email" required name="email" value="{{ old('email') }}" style="width:100%" class="round">
               
            </div>
            <div class="col-12 col-m-12 col-sm-12">
                <select name="gender" id="gender" style="width:100%" class="round">
                    <option value="male" @if(old('gender') == 'male' ) selected @endif>Male</option>
                    <option value="female" @if(old('gender') == 'female' ) selected @endif >Female</option>
                </select>
            </div>
            <div class="col-12 col-m-12 col-sm-12">
                <input type="tel" placeholder="Mobile number" id="mobile-number" required name="phone" value="{{ old('phone') }}" class="round" style="width:100%;">
               
               
            </div>
           
            <div class="col-12 col-m-12 col-sm-12">
                <input type="password" placeholder="Password" name="password" style="width:100%" id="password" required class="round">
               
            </div>
            <div class="col-12 col-m-12 col-sm-12">
                <input type="password" placeholder="Confirm Password" required name="password_confirmation" style="width:100%" class="round">
            </div>
   
            <div class="col-12 col-m-12 col-sm-12"><input type="checkbox" name="agree" required checked> I agree to Global Options FX Trade <a href="/info/terms" target="_blank">Terms and conditions</a>
            </div>
          
            <div class="col-12 col-m-12 col-sm-12">
                <input type="submit" value="Submit" class="btn round default" style="border:0"><br><br>
                <a href="/login">Already have an account? Login</a>
            </div>
        </form>
    </div>
    <style>
    .intl-tel-input .country-list {
        background-color: #111111 !important;
        border: 1px solid #2d2d2d !important;
    }
    .intl-tel-input .country-list .divider { border-bottom: 1px solid #2D2D2D !important; }
    .intl-tel-input .selected-flag .iti-arrow { border-top: 4px solid #F1F1F1 !important; }
    </style>
    
@include('includes.footer')