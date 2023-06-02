@include('includes.header-3')

<!-- Hero -->
<section id="slider" class="hero p-0 odd">
    <div class="swiper-container full-slider animation slider-h-100 slider-h-auto">
        <div class="swiper-wrapper">

            <!-- Item 1 -->
            <div class="swiper-slide slide-center">

                <!-- Media -->
                <video class="full-image to-bottom" data-mask="70" src="/assets/videos/building.mp4" autoplay muted></video>

                <div class="slide-content row">
                    <div class="col-12 d-flex justify-content-start inner">
                        <div class="left text-left">

                            <!-- Content -->
                            <h3>We Are A Global Company</h3>
                            <p data-aos="zoom-in" data-aos-delay="2400" class="description">avanstrade.com is an officially registered company in Australia. The company has registration number is 542210953 and it is located at 94 Bowden Street, Coogee,  New South Wales, Australia.
avanstrade.com was founded by experienced traders who have an extensive trading experience and have successfully traded in the falling bear market during 2013, as well as in 2019 and 2020.
avanstrade.com traders are developing successful trading strategies and implementing trading tools that allow to trade successfully at any time and in any market.</p>

                            <!-- Action -->
                            <div data-aos="fade-up" data-aos-delay="2800" class="buttons">
                                <div class="d-sm-inline-flex">
                                    <a href="/register" class="mt-4 btn primary-button">Create Your Account</a>
                                    <a href="/login" class="ml-sm-4 mt-4 btn outline-button">Make Deposit</a>
                                    <a href="/login" class="ml-sm-4 mt-4 btn outline-button">Withdraw Profits</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="swiper-slide slide-center">

                <!-- Media -->
                <img src="/assets/images/bg-2.jpg" alt="Full Image" class="full-image" data-mask="40">  

                <div class="slide-content row">
                    <div class="col-12 d-flex justify-content-start justify-content-md-center inner">
                        <div class="center text-left text-md-center">

                            <!-- Content -->
                            <h3>Grow Your Capital Today!</h3>
                            <p data-aos="zoom-in" data-aos-delay="800" class="description mr-auto ml-auto">Success begins with us, we have a team that are good at what they do. <br>
                           You are assured to never regret if you start an investment today.</p>
                           
                            <!-- Action -->
                            <div data-aos="fade-up" data-aos-delay="1200" class="buttons">
                                <div class="d-sm-inline-flex">
                                    <a href="/register" class="mt-4 btn primary-button">JOIN NOW </a>
                                    <a href="/login" class="ml-sm-4 mt-4 btn outline-button">LOGIN</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </div>
        <div class="swiper-pagination"></div>
    </div>
</section>

<!-- Video -->
{{-- <section id="video" class="section-1 highlights image-center">
    <div class="container smaller">
        <div class="row text-center intro">
            <div class="col-12">
                <span class="pre-title">avanstrade.com Video Presentation</span>
                <h2>VIDEO <span class="featured"><span>PRESENTATION</span></span></h2>
                <p class="text-max-800"> Our company was founded by a group of skilled analysts and experienced traders, to create a secure and highly profitable investment opportunities. Our trading department is primarily focused on the trading of Cryptocurrencies such as Bitcoin, USDT, Ethereum and Litecoin. We help our clients earn money on the volatility of the cryptocurrency market. Due to the use of high frequency, medium-term and long-term trading strategies our company is able to consistently generate a high percentage of profits and thereby pay high interests to their investors.</p>
            </div>
        </div>
        <h3 style="text-align: center;">Click To Watch</h3>
       
                
                <iframe  width="100%" autoplay="true" height="290" src="expro.mp4"> </iframe>

            </div>
        </div>
    </div>
</section> --}}

                

<!-- plan start -->
<section id="pricing" class="section-2 odd plans">
    <div class="container">
        <div class="row text-center intro">
            <div class="col-12">
                <span class="pre-title">Our Plans</span>
                <h2><span class="featured"><span>Investment </span></span>plans </h2>
                <p class="text-max-800">avanstrade.com can help you realize your financial future, using the latest technology, from strategy development to implementation.</p>
            </div>
        </div>
        <div class="row justify-content-center text-center items">

            @foreach($investments as $row)
            <div class="col-12 col-md-6 col-lg-4 align-self-center text-center item">
                <div data-aos="fade-up" class="card">
                    <a href="/register" class="choose-plan" title="Calculator" style="font-size: 2rem;"><i class=" pulse fas fas fa-calculator"></i></a>
                    <i class="icon icon-rocket"></i>
                    <h4>{{ $row->name }}</h4>
                    <span class="price">
                        {{ $row->commission }}<i>%</i><span class="plan"> / Profit</span>
                    </span>                            
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center text-left">
                            <span>Duration </span>
                            {{$row->times}} Days
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center text-left">
                            <span>Minimum Deposit</span>
                            {{currency_symbol() . num_format($row->minimum)}}
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center text-left">
                            <span>Maximum Deposit</span>
                            {{currency_symbol() . num_format($row->maximum)}}
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center text-left">
                            <span>Principle Return</span>
                            Yes
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center text-left">
                            <span>Instant Withdraw</span>
                            Yes
                        </li>
                    </ul>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</section>

<!-- plan end-->

<!-- Affiliate start -->
<section class="section-2 highlights image-right counter funfacts featured" style="background:#fff; padding: 30px 0;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 pr-md-5 align-self-center text-center text-md-left text items">
                <div data-aos="fade-up" class="row intro mb-4">
                    <div class="col-12 p-0">
                        <span class="pre-title m-auto m-md-0">Partner Program</span>
                        <h2><span class="featured"><span>Referral</span></span> Commission</h2>
                        <p>avanstrade.com provide 3 Level commission 10% - 2% -1% from deposit for our investors who invite their friends & family members.</p>
                    </div>
                </div>
                <div class="row items">
                    <div data-aos="fade-up" class="col-12 col-md-4 p-0 pr-md-4 item">
                        <div data-percent="10" class="radial left">
                            <span></span>
                        </div>
                        <h4>1st Level</h4>
                    </div>
                    <div data-aos="fade-up" class="col-12 col-md-4 p-0 pr-md-4 item">
                        <div data-percent="2" class="radial left">
                            <span></span>
                        </div>
                        <h4>2nd Level</h4>
                    </div>
                    <div data-aos="fade-up" class="col-12 col-md-4 p-0 pr-md-4 item">
                        <div data-percent="1" class="radial left">
                            <span></span>
                        </div>
                        <h4>3rd Level</h4>
                    </div>
                </div>

                <!-- Action -->
              
            </div>
            <div class="col-12 col-md-6 p-0 image">
                <img src="/assets/images/bg-4.jpg" class="fit-image" alt="Affiliate">
            </div>
        </div>
    </div>
</section>
<!-- Affiliate end --> 

<!-- statics start-->
<section id="funfacts" class="section-2 odd counter funfacts">
    <video class="full-image to-bottom grayscale" data-mask="70" src="/assets/videos/work.mp4" autoplay muted loop></video> 
    <div class="container">
        <div class="row mb-md-5 text-center">
            <div class="col-12">
                <span class="pre-title">What are we doing</span>
                <h2><span class="featured"><span>Results</span></span> in Numbers</h2>
            </div>
        </div>
        <div class="row justify-content-center text-center items">
            <div class="col-12 col-md-6 col-lg-3 item">
                <div data-percent="3597" class="radial">
                    <span></span>
                </div>
                <h4>Running Days</h4>
            </div>
            <div class="col-12 col-md-6 col-lg-3 item">
                <div data-percent="94506144" class="radial">
                    <span></span>
                </div>
                <h4>Total Account</h4>
            </div>
            <div class="col-12 col-md-6 col-lg-3 item">
                <div data-percent="3346187.05" class="radial">
                    <span></span>
                </div>
                <h4>Total Deposit ($)</h4>
            </div>
            <div class="col-12 col-md-6 col-lg-3 item">
                <div data-percent="2959663.53 " class="radial">
                    <span></span>
                </div>
                <h4>Total Withdraw ($)</h4>
            </div>
        </div>
    </div>
</section>
<!-- statics end-->



<!-- Services -->
<section id="services" class="section-3 odd offers">
    <div class="container">
        <div class="row intro">
            <div class="col-12 col-md-9 align-self-center text-center text-md-left">
                <span class="pre-title m-auto ml-md-0">Avanstrade.com</span>
                <h2>Why Choose <span class="featured"><span>Us?</span></span></h2>
                <p></p>
            </div>
            <div class="col-12 col-md-3 align-self-end">
                <a href="/about" class="btn mx-auto mr-md-0 ml-md-auto outline-button">SEE ALL</a>
            </div>
        </div>
        <div class="row justify-content-center items">
            <div class="col-12 col-md-6 col-lg-4 item">
                <div class="card">
                    <i class="icon icon-organization"></i>
                    <h4>Registrations Company</h4>
                    <p>Avanstrade.com is officially registered in Australia and has an number 542210953.</p>
                    <a href="#"><i class="btn-icon pulse fas fas fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 item">
                <div class="card">
                    <i class="icon icon-briefcase"></i>
                    <h4>Fast withdrawals</h4>
                    <p>Our team works every day. It guarantees that the withdrawal request will be processed Instant.</p>
                    <a href="#"><i class="btn-icon pulse fas fas fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 item">
                <div class="card">
                    <i class="icon icon-chart"></i>
                    <h4>Passive income</h4>
                    <p>We provide the best solution to get passive income on investment with the minimum amount of $50. </p>
                    <a href="#"><i class="btn-icon pulse fas fas fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 item">
                <div class="card">
                    <i class="icon icon-plane"></i>
                    <h4>Support 24/7</h4>
                    <p>You can find any answer to your questions in the FAQ Page. If you need help please contact us any time 24/7.</p>
                    <a href="#"><i class="btn-icon pulse fas fas fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 item">
                <div class="card">
                    <i class="icon icon-globe-alt"></i>
                    <h4>Work automated</h4>
                    <p>It does not require for investors to have any special knowledge to make profit with us.</p>
                    <a href="#"><i class="btn-icon pulse fas fas fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 item">
                <div class="card">
                    <i class="icon icon-drawer"></i>
                    <h4>Highly Secured</h4>
                    <p>Avanstrade.com have SSL connection, cold storages and the strongest anti-DDoS. It allows to protect your funds on our platform.</p>
                    <a href="#"><i class="btn-icon pulse fas fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>





<!-- Team start-->
<section id="team" class="section-4 highlights team image-right">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8 align-self-top text-center text-md-left text">
                <div class="row intro">
                    <div class="col-12 p-0">
                        <span class="pre-title m-auto m-md-0">We like what we do</span>
                        <h2><span class="featured"><span>Team</span></span> of Experts</h2>
                        <p>Ethics and integrity are the bases on which our professionals build their careers.<br>They are fundamentals that become daily attitudes.</p>
                    </div>
                </div>
                <div class="row items text-left">
                    <div class="col-12 col-md-6 p-0">
                        <div class="row item">
                            <div class="col-4 p-0 pr-3 align-self-center">
                                <img src="/assets/images/team-1.jpg" alt="Person" class="person">
                            </div>
                            <div class="col-8 align-self-center text-left">
                                <h4>Maury Tony</h4>
                                <p>CTO & TECHNOLOGIST</p>
                                <ul class="navbar-nav social share-list ml-auto">
                                    <li class="nav-item">
                                        <a href="mailto:tony@avanstrade.com" class="nav-link"><i class="fas fa-envelope"></i></a>
                                    </li>
                                </ul>
                            </div>  
                        </div>
                        <div class="row item">
                            <div class="col-4 p-0 pr-3 align-self-center">
                                <img src="/assets/images/team-2.jpg" alt="Person" class="person">
                            </div>
                            <div class="col-8 align-self-center text-left">
                                <h4>Emma White</h4>
                                <p>FINANCIAL ANALYST</p>
                                <ul class="navbar-nav social share-list ml-auto">
                                    <li class="nav-item">
                                        <a href="mailto:emma@avanstrade.com" class="nav-link"><i class="fas fa-envelope"></i></a>
                                    </li>
                                </ul>
                            </div>  
                        </div>
                    </div>                        
                    <div class="col-12 col-md-6 p-0">
                        <div class="row item">
                            <div class="col-4 p-0 pr-3 align-self-center">
                                <img src="/assets/images/team-3.jpg" alt="Person" class="person">
                            </div>
                            <div class="col-8 align-self-center text-left">
                                <h4>Michael Stevens</h4>
                                <p>CHIEF MARKETING </p>
                                <ul class="navbar-nav social share-list ml-auto">
                                    <li class="nav-item">
                                        <a href="mailto:stevens@avanstrade.com" class="nav-link"><i class="fas fa-envelope"></i></a>
                                    </li>
                                </ul>
                            </div>  
                        </div>
                        <div class="row item">
                            <div class="col-4 p-0 pr-3 align-self-center">
                                <img src="/assets/images/team-4.jpg" alt="Person" class="person">
                            </div>
                            <div class="col-8 align-self-center text-left">
                                <h4>Johnson Wright</h4>
                                <p>CEO & PRESIDENT</p>
                                <ul class="navbar-nav social share-list ml-auto">
                                    <li class="nav-item">
                                        <a href="mailto:johnson@avanstrade.com" class="nav-link"><i class="fas fa-envelope"></i></a>
                                    </li>
                                </ul>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
            <div data-aos="zoom-in" class="col-12 col-lg-4 align-self-end">
                <div class="quote">
                    <div class="quote-content">
                        <h4>President Speech</h4>
                        <p style="color: black;">Avanstrade.com traders trade on various cryptocurrency exchanges around the world.</p>
                        <p style="color: black;">It solves problems with liquidity and makes possible to trade in the large volumes of trading pairs with the highest volatility.</p>
                        <p style="color: black;">Thanks to working with various cryptocurrency exchanges, the company's profit continues to grow.</p>
                        <h5>X. Wright</h5>
                    </div>
                    <i class="quote-right fas fa-quote-right"></i>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Team end-->




        <!-- blog-area start -->
        <div class="blog-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h3 style="text-align:center; font-weight:bolder;">OUR LATEST NEWS & ARTICLES</h3>
                            <img src="/assets/images/line.html" alt="" />
                        </div>
                    </div>
                </div>
               <div class="cryptohopper-web-widget" data-id="5" data-news_count="5"></div>
               </div>

<!-- Payment icon -->
<section id="partners" class="section-4 partners" style="padding: 30px 0;">
    <div class="overflow-holder">
        <div class="container">
            <div class="swiper-container min-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide slide-center item">
                        <img src="/assets/ps/client-1.png" class="fit-image" alt="Perfect Money">
                    </div>
                    <div class="swiper-slide slide-center item">
                        <img src="/assets/ps/client-2.png" class="fit-image" alt="Payeer">
                    </div>
                    <div class="swiper-slide slide-center item">
                        <img src="/assets/ps/client-3.png" class="fit-image" alt="Bitcoin">
                    </div>
                    <div class="swiper-slide slide-center item">
                        <img src="/assets/ps/client-4.png" class="fit-image" alt="Litecoin">
                    </div>
                    <div class="swiper-slide slide-center item">
                        <img src="/assets/ps/client-5.png" class="fit-image" alt="Ethereum">
                    </div>
                    <div class="swiper-slide slide-center item">
                        <img src="/assets/ps/client-6.png" class="fit-image" alt="BitcoinCash">
                    </div>
                    <div class="swiper-slide slide-center item">
                        <img src="/assets/ps/client-7.png" class="fit-image" alt="Dash">
                    </div>
                    <div class="swiper-slide slide-center item">
                        <img src="/assets/ps/client-8.png" class="fit-image" alt="Dogecoin">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>       

@include('includes.footer-3')