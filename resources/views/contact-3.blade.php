@include('includes.header-3')
<section id="slider" class="hero p-0 odd featured">
    <div class="swiper-container no-slider animation slider-h-50 slider-h-auto">
        <div class="swiper-wrapper">

            <!-- Item 1 -->
            <div class="swiper-slide slide-center">

                <!-- Media -->
                <video class="full-image to-bottom" data-mask="70" src="assets/videos/building.mp4" autoplay muted></video>

                <div class="slide-content row text-center">
                    <div class="col-12 mx-auto inner">

                        <!-- Content -->
                        <nav data-aos="zoom-out-up" data-aos-delay="800" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Support</li>
                            </ol>
                        </nav>
                        <h1 class="mb-0 title effect-static-text">Contact Us</h1>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="section-1 highlights team image-right">
    <div class="container">       



<script language=javascript>

function checkform() {
if (document.mainform.name.value == '') {
alert("Please type your full name!");
document.mainform.name.focus();
return false;
}
if (document.mainform.email.value == '') {
alert("Please enter your e-mail address!");
document.mainform.email.focus();
return false;
}
if (document.mainform.message.value == '') {
alert("Please type your message!");
document.mainform.message.focus();
return false;
}
return true;
}

</script>

<form method=post name=mainform onsubmit="return checkform()">
@csrf

<div class="row form-group-margin">
<div class="col-6 m-0 p-2 input-group">
<input type="text" name="name" value="" class="form-control field-name" placeholder="Your Name" >    </div>
<div class="col-6 m-0 p-2 input-group">
<input type="text" name="email" value="" class="form-control field-email" placeholder="Your Email" >    </div>

<div class="col-12 m-0 p-2 input-group">
<textarea name=text class="form-control field-message" placeholder="Message"></textarea>
</div>


<div class="col-12 input-group m-0 p-2">
<button type="submit" class="btn primary-button">SEND</a>
                                    </div>
                                </div>
</form>

          <!-- Navbar Icons -->
            <ul class="navbar-nav icons">
                <li class="nav-item social">
                    <a href="https://m.youtube.com/#" class="nav-link"><i class="fab fa-youtube"></i>  Youtube</a>
                </li>
                <li class="nav-item social">
                    <a href="https://t.me/#" class="nav-link"><i class="fab fa-telegram"></i> 
Telegram channels </a>
                    </li>
                <li class="nav-item social">
                    <a href="https://t.me/#" class="nav-link"><i class="fab fa-telegram"></i>  Telegram group</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('includes.footer-3')