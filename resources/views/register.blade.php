@include('includes.header')

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
                    <div class="col-12 col-m-12 col-sm-12">
                <input type="text" placeholder="Reference ID(Optional)" name="g_id" style="width:100%" style="width:100%" class="round">
            </div>
                    <div class="col-12 col-m-12 col-sm-12">
                <input type="text" placeholder="First Name" required name="fname" value="" style="width:100%" class="round">
                
            </div>
            <div class="col-12 col-m-12 col-sm-12">
                <input type="text" placeholder="Last Name" required name="lname" value="" style="width:100%" class="round">
               
            </div>
                    <div class="col-12 col-m-12 col-sm-12">
                <input type="email" placeholder="Email" required name="email" value="" style="width:100%" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,3}$" oninput="emaila(this)" class="round">
        
            </div>
            <div class="col-12 col-m-12 col-sm-12">
                <select name="gender" id="gender" style="width:100%" class="round">
                    <option id="male">Male</option>
                    <option id="female">Female</option>
                </select>
            </div>
            <div class="col-12 col-m-12 col-sm-12">
                <input type="tel" placeholder="Mobile number" id="mobile-number" required name="phone" value="" class="round" style="width:100%;">
                <select id="address-country" name="country" style="display:none" required></select>
            </div>
           
            <div class="col-12 col-m-12 col-sm-12">
                <input type="password" placeholder="Password" name="password" style="width:100%" id="password" oninput="passworda(this)" required pattern="(?=.*\d)(?=.*[A-Za-z]).{6,}" class="round">
               
            </div>
            <div class="col-12 col-m-12 col-sm-12">
                <input type="password" placeholder="Confirm Password" required name="password" style="width:100%" class="round" oninput="passwordca(this)">
            </div>
   
            <div class="col-12 col-m-12 col-sm-12"><input type="checkbox" name="agree" required checked> I agree to Global Options FX Trade <a href="assets/info/terms" target="_blank">Terms and conditions</a>
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