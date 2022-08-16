@include('includes.header-2')

 <!--=================================
    banner -->
    <section class="banner slider-02">
        <div class="swiper-container">
            <div class="swiper-wrapper h-700 h-sm-500">
                <div class="swiper-slide align-items-center d-flex responsive-overlap-md bg-overlay-black-30" style="background-image: url({{ asset('/assets/images/v2/03.jpg') }}); background-size: cover; background-position: center center;">
                    <div class="swipeinner container">
                        <div class="row justify-content-center">
                            <div class="col-xl-7 col-md-9 text-center">
                                <h1 data-swiper-animation="fadeInUp" data-duration="1s" data-delay="0.25s"><span class="text-stroke-white">Welcome To STAR </span> <span class="font-large">TRADES</span></h1>
                                <h6 data-swiper-animation="fadeInUp" data-duration="1s" data-delay="0.5s">A totally new way to grow your business</h6>
                                <a class="btn btn-dark btn-round text-white" data-swiper-animation="fadeInUp" data-duration="1s" data-delay="0.75s" href="{{url('/register')}}">
                                    Get Started Now<i class="fas fa-arrow-right pl-3"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide align-items-center d-flex responsive-overlap-md bg-overlay-black-30" style="background-image: url({{ asset('/assets/images/v2/04.jpg') }}); background-size: cover; background-position: center center;">
                    <div class="swipeinner container">
                        <div class="row justify-content-center">
                            <div class="col-xl-8 col-lg-10 text-center">
                                <h1 data-swiper-animation="fadeInUp" data-duration="1s" data-delay="0.25s"><span class="text-stroke-white">Earn Profit</span> <span class="font-large">Without Compromising</span></h1>
                                <h6 data-swiper-animation="fadeInUp" data-duration="1s" data-delay="0.5s">We support the growth of investment in promising innovations</h6>
                                <a class="btn btn-dark btn-round text-white" data-swiper-animation="fadeInUp" data-duration="1s" data-delay="0.75s" href="about-us">Read More<i class="fas fa-arrow-right pl-3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-button-prev"><i class="fas fa-arrow-left icon-btn"></i></div>
            <div class="swiper-button-next"><i class="fas fa-arrow-right icon-btn"></i></div>
        </div>
    </section>
    <!--=================================
banner -->

    <!--=================================
About -->
    <section class="space-ptb">
        <div class="container">
            <div class="row justify-content-center pb-4 pb-md-5">
                <div class="col-lg-12">
                    <div class="d-lg-flex align-items-center">
                        <div class="mr-4">
                            <p class="mb-0"></p>
                            <h3 class="display-3 font-weight-bold text-primary mb-0">EARN ACTIVELY</h3>
                        </div>
                        <div class="mr-3">
                            <h2 class="mb-3 mb-lg-0">1.5% Profit Return On Every Deposited Amount.</h2>
                        </div>
                        <div class="ml-auto">
                            <a href="{{url('/register')}}" class="btn btn-light-round btn-round w-space">Get Started<i class="fas fa-arrow-right pl-3"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <div class="feature-info feature-info-style-07">
                        <div class="feature-info-img">
                            <img class="img-fluid" src="{{ asset('/assets/images/v2/04.jpg') }}" alt="" />
                        </div>
                        <div class="feature-info-content">
                            <h4 class="feature-info-title mb-2">Mission and vision</h4>
                            <p>
                                We believe that the future of finance looks very different to how it looks today and we offer qualifying investors the opportunity to invest in the companies and products that are building the future of
                                finance.
                            </p>
                            <a href="mission-vision" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <div class="feature-info feature-info-style-07">
                        <div class="feature-info-img">
                            <img class="img-fluid" src="{{ asset('/assets/images/v2/02.jpg') }}" alt="" />
                        </div>
                        <div class="feature-info-content">
                            <h4 class="feature-info-title mb-2">Our Value</h4>
                            <p>Star Capital is a distinctive investment platform offering investors opportunities in the crypto markets.We emphasize on understanding our client’s requirement.</p>
                            <a href="about" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <div class="feature-info feature-info-style-07">
                        <div class="feature-info-img">
                            <img class="img-fluid" src="{{ asset('/assets/images/v2/03.jpg') }}" alt="" />
                        </div>
                        <div class="feature-info-content">
                            <h4 class="feature-info-title mb-2">Our aim</h4>
                            <p>Our aim is to utilize our expertise to create a platform where Non-miners and Tech novice can participate and benefit from the crypto market investments.</p>
                            <a href="dev" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="mb-4">
                        <div class="background-border-top"></div>
                        <div class="p-4">
                            <h4 class="text-primary">Quality Circle Program</h4>
                            <p class="mb-3">A unique of its kind initiative to impart financial awareness among people and to tell them about basic do’s and dont’s of financial management.</p>
                            <!--  <a class="btn btn-link text-dark" href="#">Become a Partner<i class="fas fa-arrow-right pl-3"></i></a>-->
                        </div>
                        <div class="p-4 bg-dark border-radius text-white">
                            <h4 class="text-white">Careers with us</h4>
                            <p>There’s always room for intelligent people who are excited about the Capital world and are continually looking forward to seeing what’s next.</p>
                            <!--<a class="btn btn-link text-primary" href="#">View Available Positions<i class="fas fa-arrow-right pl-3"></i></a>-->
                        </div>
                    </div>
                </div>
            </div>

            <!--=================================
About -->

<section class="space-ptb">
    <div class="container">
         <div class="row justify-content-center">
         <div class="col-lg-9">
               <div class="section-title text-center">
              <h2>Choose the plan that works for you</h2>
                 <p>Our pricing works for enterprises of all sizes.</p>
               </div>
              </div>
            </div>
            <div class="row">
          <div class="col-md-4 pb-4 pb-md-0">
                <div class="pricing">
                <h4 class="pricing-title">AMATEUR</h4>
                
                <span class="pricing-price">
                   <sup></sup>
                  <strong>1.5%</strong>
                  Daily for 7 Days
                 </span>
                  <ul class="list-unstyled pricing-list">
                       <li>Minimum: $200</li>
                 <li>Maximum: $49,999</li>
                   <li>7 Days Duration</li>
                    <li>7% Referral Commission</li>
                    <li>Instant Withdrawal</li>
                   <li>24/7 Support</li>
                </ul>
                 <a href="?a=signup" class="btn btn-light-round btn-round">Select Plan<i class="fas fa-arrow-right pl-3"></i></a>
             </div>
             </div>
           
          <div class="col-md-4">
                <div class="pricing">
                 <h4 class="pricing-title">PROFESSIONAL</h4>
            
                 <span class="pricing-price">
                  <sup></sup>
               <strong>2%</strong>
                   Daily for 7 Days
                 </span>
                  <ul class="list-unstyled pricing-list">
                      <li>Minimum: $50,000</li>
                <li>Maximum: $99,999</li>
                <li>7 Days Duration</li>
                <li>7% Referral Commission</li>
                  <li>Instant Withdrawal</li>
                    <li>24/7 Support</li>
                 </ul>
                 <a href="?a=signup " class="btn btn-light-round btn-round">Select Plan<i class="fas fa-arrow-right pl-3"></i></a>
                </div>
              </div>
            <div class="col-md-4 pb-4 pb-md-0">
                <div class="pricing active">
                 <h4 class="pricing-title">VIP</h4>
                  
                <span class="pricing-price">
                   <sup></sup>
                  <strong>4%</strong>
                   Daily for 20 Days
                  </span>
                <ul class="list-unstyled pricing-list">
                    <li>Minimum: $100,000</li>
                     <li>Maximum: Unlimited</li>
                    <li>20 Days Duration</li>
                    <li>7% Referral Commission</li>
                  <li>Instant Withdrawal</li>
                    <li>24/7 Support</li>
                 </ul>
                 <a href="?a=signup" class="btn btn-light-round btn-round">Select Plan<i class="fas fa-arrow-right pl-3"></i></a>
              </div>
             </div>
           </div>
       </div>
        </section>
       <section class="space-pb">
           <div class="container">
               <div class="row justify-content-center">
                   <div class="col-xl-9 col-lg-10">
                       <div class="section-title text-center">
                           <h2>Invest in the future of finance</h2>
                           <p>Invest in the disruption of a multi-trillion dollar industry the smart way.</p>
                       </div>
                   </div>
               </div>
               <div class="row">
                   <div class="col-lg-4 col-md-6 mb-4">
                       <div class="feature-info feature-info-style-02">
                           <div class="feature-info-icon">
                               <i class="flaticon-data mr-4"></i>
                               <h5 class="mb-0 feature-info-title">GLOBAL INVESTOR REACH</h5>
                           </div>
                           <div class="feature-info-content">
                               <p class="mb-0">We have an active, growing community of over 15,000 investors from more than 150 countries. Blockchain knows no borders.</p>
                               <!--<a href="service-detail.html" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>-->
                           </div>
                           <div class="feature-info-bg-img" style="background-image: url({{asset('/assets/images/v2/feature/01.jpg')}});"></div>
                       </div>
                   </div>
                   <div class="col-lg-4 col-md-6 mb-4">
                       <div class="feature-info feature-info-style-02">
                           <div class="feature-info-icon">
                               <i class="flaticon-author mr-4"></i>
                               <h5 class="mb-0 feature-info-title">INVEST SECURELY</h5>
                           </div>
                           <div class="feature-info-content">
                               <p class="mb-0">
                                   We use bank-grade security procedures including secure socket layers, two factor authentication and are registered with our Monetary Authority to run a securities business and transfer funds in
                                   secure, dedicated client money accounts.
                               </p>
                               <!--  <a href="service-detail.html" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>-->
                           </div>
                           <div class="feature-info-bg-img" style="background-image: url({{asset('/assets/images/v2/feature/02.jpg')}});"></div>
                       </div>
                   </div>
                   <div class="col-lg-4 col-md-6 mb-4">
                       <div class="feature-info feature-info-style-02">
                           <div class="feature-info-icon">
                               <i class="flaticon-icon-149196 mr-4"></i>
                               <h5 class="mb-0 feature-info-title">INVEST WITH PROTECTION</h5>
                           </div>
                           <div class="feature-info-content">
                               <p class="mb-0">Receive professional grade protections through our unique pooled investment structure so your investments can grow in a tax-efficient way.</p>
                               <!--  <a href="service-detail.html" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>-->
                           </div>
                           <div class="feature-info-bg-img" style="background-image: url({{asset('/assets/images/v2/feature/03.jpg')}});"></div>
                       </div>
                   </div>
                   <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                       <div class="feature-info feature-info-style-02">
                           <div class="feature-info-icon">
                               <i class="flaticon-chart mr-4"></i>
                               <h5 class="mb-0 feature-info-title">INVEST WITH SPECIALISTS</h5>
                           </div>
                           <div class="feature-info-content">
                               <p class="mb-0">We are the largest global online investment community of professional investors all investing in financial innovation and technology.</p>
                               <!--<a href="service-detail.html" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>-->
                           </div>
                           <div class="feature-info-bg-img" style="background-image: url({{asset('/assets/images/v2/feature/04.jpg')}});"></div>
                       </div>
                   </div>
                   <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                       <div class="feature-info feature-info-style-02">
                           <div class="feature-info-icon">
                               <i class="flaticon-design mr-4"></i>
                               <h5 class="mb-0 feature-info-title">ONGOING INVESTOR RELATIONS</h5>
                           </div>
                           <div class="feature-info-content">
                               <p class="mb-0">Investors and businesses can easily keep-in-touch online throughout the investment lifecycle and store all documentation in one place.</p>
                               <!--<a href="service-detail.html" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>-->
                           </div>
                           <div class="feature-info-bg-img" style="background-image: url({{asset('/assets/images/v2/feature/05.jpg')}});"></div>
                       </div>
                   </div>
                   <div class="col-lg-4 col-md-6">
                       <div class="feature-info feature-info-style-02">
                           <div class="feature-info-icon">
                               <i class="flaticon-group mr-4"></i>
                               <h5 class="mb-0 feature-info-title">NATIVELY DIGITAL</h5>
                           </div>
                           <div class="feature-info-content">
                               <p class="mb-0">We are the digital alternative to traditional asset management - borderless, hyper-efficient and usable from any smartphone. No paperwork required.</p>
                               <!--<a href="service-detail.html" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>-->
                           </div>
                           <div class="feature-info-bg-img" style="background-image: url({{asset('/assets/images/v2/feature/06.jpg')}});"></div>
                       </div>
                   </div>
               </div>
               <div class="row mt-5">
                   <div class="col-12 d-md-flex justify-content-center align-items-center">
                       <!--<p class="mb-3 mb-md-0 mx-0 mx-md-3">Start now! Your big opportunity may be right where you are!</p>-->
                       <!--<a href="#" class="btn btn-primary-round btn-round mx-0 mx-md-3">See All Services<i class="fas fa-arrow-right pl-3"></i></a>-->
                   </div>
               </div>
           </div>
       </section>
       <!--=================================
Category -->

<div class="container">
    <div class="row">
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
            <div class="tradingview-widget-container__widget"></div>
            <div class="tradingview-widget-copyright">
                <a href="https://www.tradingview.com/markets/cryptocurrencies/prices-all/" rel="noopener" target="_blank"><span class="blue-text">Cryptocurrency Markets</span></a> by TradingView
            </div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
                {
                    "width": "100%",
                    "height": "900",
                    "defaultColumn": "overview",
                    "screener_type": "crypto_mkt",
                    "displayCurrency": "USD",
                    "colorTheme": "light",
                    "locale": "en",
                    "isTransparent": false
                }
            </script>
        </div>
        <!-- TradingView Widget END -->
    </div>
</div>

 <!--=================================
    BLog -->

                <!-- blog-area start -->
                <div class="blog-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-title text-center">
                                    <h2>OUR LATEST NEWS & ARTICLES</h2>
                                    {{-- <img src="assets/images/line.png" alt="" /> --}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <a
                                style="pointer-events: none;"
                                class="fx-widget"
                                data-widget="newsfeed"
                                data-lang="en"
                                data-post-date-color="#999"
                                data-post-description-color="#333333"
                                data-post-title-color="#333333"
                                data-widget-bg-color="#FFF"
                                data-show-image
                                data-width="100%"
                                data-height="400"
                                data-show-date
                                data-title-font-size="18"
                                data-intro-font-size="16"
                                data-show-upper-intro
                                data-category="news"
                                data-section="all"
                                data-base-url="https://www.fxempire.com"
                                data-url="//www.fxempire.com"
                                href="https://www.fxempire.com/"
                                rel="nofollow"
                                style="font-family: Helvetica; font-size: 16px; line-height: 1.5; text-decoration: none; pointer-events: none;"
                            >
                                <span style="color: #999999; display: inline-block; visibility: hidden; margin-top: 10px; font-size: 12px;">Powered By </span>
                                <img style="width: 87px; height: 14px; visibility: hidden;" src="https://www.fxempire.com/logo-full.svg" alt="FX Empire logo" />
                            </a>
                            <script async charset="utf-8" src="https://widgets.fxempire.com/widget.js"></script>
                        </div>
                    </div>
                </div>
                <!-- blog-area end -->

                <!--=================================
footer-->

@include('includes.footer-2')
