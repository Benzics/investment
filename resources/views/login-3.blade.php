@include('includes.header-3')
<section id="slider" class="hero p-0 odd featured">
    <div class="swiper-container no-slider animation slider-h-50 slider-h-auto">
        <div class="swiper-wrapper">

            <!-- Item 1 -->
            <div class="swiper-slide slide-center">

                <!-- Media -->
                <video class="full-image to-bottom" data-mask="70" src="assets/videos/work.mp4" autoplay muted loop></video>  

                <div class="slide-content row text-center">
                    <div class="col-12 mx-auto inner">

                        <!-- Content -->
                        <nav data-aos="zoom-out-up" data-aos-delay="800" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Login</li>
                            </ol>
                        </nav>
                        <h1 class="mb-0 title effect-static-text">Login To User
                </h1>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Contact -->
<section id="contact" class="section-1 form contact">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 pr-md-5 align-self-center text">
                <div class="row intro">
                    <div class="col-12 p-0">
                        <span class="pre-title m-0">LOGIN TO DASHBOARD</span>
                        <h2>User  <span class="featured"><span>Login</span></span></h2>
                      
                    </div>
                </div>

                <div class="mt-3 ">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-12 p-0">
<form method=post name=mainform class="nexgen-simple-form">
    @csrf

<div class="row form-group-margin">
<div class="col-12 col-md-6 m-0 p-2 input-group">
<input type="email" name="email" value="{{old('email')}}" class="form-control field-name" placeholder="Your Email">
</div>

<div class="col-12 col-md-6 m-0 p-2 input-group">
<input type="password" name="password" value='' class="form-control field-email" placeholder="Password">
</div>
{{-- <div class="col-12 input-group m-0 p-2">
<a href="index8083.html?a=forgot_password">Forgot Password?</a>
</div> --}}

<div class="col-12 input-group m-0 p-2">
<button type="submit" class="btn primary-button">LOGIN</a>
 </div>
                            </div>
</form>
</div>
                </div>                        
            </div>
           
           <div class="col-12 col-md-4">
                <div class="contacts" style="background-image: url(assets/images/about-3.jpg); background-size: cover;
background-repeat: no-repeat; height: 400px;">
                    
                </div>
            </div>
            
        </div>
    </div>
</section>
@include('includes.footer-3')