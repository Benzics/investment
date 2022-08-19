@include('includes.header')

<div class="banner-area center">
    <div class="area">
        <div class="bodycontainer">
            <h1 class="tlt text-white" style="margin: 20px 0;">Contact <span class="text-default">Us</span></h1>
            <div class="banner-title">
               <span class="decor-equal"></span>
            </div>
            <div  style="margin: 20px 0;">
                <a href="https://globaloptionsfxtrade.com/">HOME</a> / CONTACT US
            </div>
        </div>
        <div id="particles-js"></div>
    </div>
    </div>
    <div class="bodycontainer">
    
       
    
    <div class="row">
    <div class="col-12 col-m-12 col-sm-12">
         <div class="col-8 col-sm-12">
         <div class="title_container">
        <h4>Feel free to drop us a message.</h4>
        <span class="decor_default"></span>
    </div>
    @if (session('success') !== null)
    <div class="col-12">
        <div class="success mb-3">
            {{ session('success') }}
        </div>
    </div>
    @endif
    @if ($errors->any())
    <div class="col-12">
        <div class="danger mb-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif
    <script type="text/javascript" src="js/mail.js"></script>
    <form method="POST" action="" id="contactform">
        @csrf
    <p>What can we help you with?</p>
        <div class="row">
    <div class="col-6" style="padding:5px 0">
    <input type="text" name="name" placeholder="Name" required style="width:100%;" class="round" value="{{old('name')}}">
    </div>
    <div class="col-6" style="padding:5px 0">
    <input type="email" name="email" placeholder="Email" required style="width:100%" class="round" value="{{old('email')}}">
    </div><div class="col-12" style="padding:5px 0">
    <textarea name="text" placeholder="Message" class="round" required style="width:100%; height: 120px">{{old('text')}}</textarea>
    </div>
    <div class="col-12" style="padding:5px 0">
    <button name="Submit" type="submit" id="sendform" class="btn default round">Send</button>
    
    </div>
    </div>
    </form>
    </div>
         
         
         <div class="col-4 col-sm-12">
            <div class="darkgrey row">
                <div class="col-3 col-m-2 col-sm-3 center">
                    <i class="fa fa-home fa-2x text-default"></i>
                </div>
                <div class="col-9 col-m-10 col-sm-9">
                    <h6 style="line-height:30px !important">ADDRESS:</h6>
                    <p>{{$address}}</p>
                </div>
                <div class="col-3 col-m-2 col-sm-3 center">
                    <i class="fa fa-envelope fa-2x text-default"></i>
                </div>
                <div class="col-9 col-m-10 col-sm-9">
                    <h6 style="line-height:30px !important">EMAIL ADDRESS:</h6>
                    <p><a href="mailto://{{$email}}">{{$email}}</a></p>
                </div>
            </div>
        </div>
     </div>
         
    
    </div>
    </div>
    


@include('includes.footer')