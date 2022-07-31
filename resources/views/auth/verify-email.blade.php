@include('includes.header')

<div class="banner-area center">
    <div class="area">
        <div class="bodycontainer">
            <h1 class="tlt text-white" style="margin: 20px 0;">VERIFY <span class="text-default">EMAIL</span></h1>
            <div class="banner-title">
               <span class="decor-equal"></span>
            </div>
            <div  style="margin: 20px 0;">
                <a href="{{url('/')}}">HOME</a> / VERIFY EMAIL
            </div>
        </div>
        <div id="particles-js"></div>
        
    </div>
    </div>
        <div class="smallcontainer padding">
        
    
    
    <form action="/email/verification-notification" id="verify" method="POST">
        @csrf
            <div class="title_container">
                  <h4>Email Verification</h4>
                  <span class="decor_default"></span>
            </div>
            @if(session('message')) <div class="success">{{session('message')}}</div> @endif
            <br>
            <div class="alertdanger">An email verification link was sent to your email when you registered. Please verify your email by clicking the link.</div>
        
               <button type="submit" class="btn round red margintb" style="width: 100%">Resend Email for Verification</button>
               <br><br><br>
        </form>
         
        
        </div>

@include('includes.footer')