<!-- Footer -->
<footer>

    <!-- Footer [content] -->
    <section id="footer" class="odd footer offers">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-3 footer-left">

                    <!-- Navbar Brand-->
                    <a class="navbar-brand" href="index.html">
                        <span class="brand">
                            <span class="featured">
                                <span class="first">Invest With Us !</span>
                            </span>
                            <span class="last"></span>
                        </span>
                        
                        <!-- 
                            Custom Logo
                            <img src="/assets/images/logo.svg" alt="NEXGEN">
                        -->
                    </a>
                    <p>We provide a unique opportunity to make profits online, based on our innovative developments that allow us to conduct risk-free bot trading on the largest cryptocurrency and stock exchanges.<br></p>
                    <ul class="navbar-nav">
                    <!--    <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-phone-alt mr-2"></i>
                                +44 1633 9315 71
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-envelope mr-2"></i>
                                support@avancetrade.com
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-map-marker-alt mr-2"></i>
                               94 Bowden Street, Coogee,  New South Wales, Australia.
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/assets/images/crt.png" class="mt-4 btn outline-button ">CERTIFICATE</a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-lg-9 p-0 footer-right">
                    <div class="row items">
                        <div class="col-12 col-lg-4 item">
                            <div class="card">
                                <h4>About</h4>
                                <a href="index3898.html?a=cust&amp;page=about"><i class="icon-arrow-right"></i>About Company</a>
                                <a href="index56ca.html?a=news"><i class="icon-arrow-right"></i>News & Update</a>
                                <a href="index38cd.html?a=faq"><i class="icon-arrow-right"></i>FAQ</a>
                                
                            </div>
                        </div>
                    <!--    <div class="col-12 col-lg-4 item">
                            <div class="card">
                                <h4>Live Transactions</h4>
                                <a href="/?a=paidout"><i class="icon-arrow-right"></i>Paidout</a>
                                <a href="/?a=last10"><i class="icon-arrow-right"></i>Last 10 Investors</a>
                                <a href="/?a=refs10"><i class="icon-arrow-right"></i>Top 20 Referrers</a>
                                
                            </div>
                        </div> -->
                        <div class="col-12 col-lg-4 item">
                            <div class="card">
                                <h4>Support</h4>
                                <a href="index15a0.html?a=support"><i class="icon-arrow-right"></i>Contact Us</a>
                                <a href="indexa972.html?a=rules"><i class="icon-arrow-right"></i>Terms of Use</a>
                                <a href="#"><i class="icon-arrow-right"></i>Live Chat Available</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Copyright -->
    <section id="copyright" class="p-3 odd copyright">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 p-3 text-center text-lg-left">
                    <p>avancetrade.com.</p>
                    <!--
                        Suggestion: Replace the text above with a description of your website.
                     -->
                </div>
                <div class="col-12 col-md-6 p-3 text-center text-lg-right">
                    <p>© <?= date('Y') ?> Avanstrade.com. All Rights Reserved </p>
                </div>
            </div>
        </div>
    </section>

</footer>



<!-- Modal [sign] -->
<div id="sign" class="p-0 modal fade" role="dialog" aria-labelledby="sign" aria-hidden="true">
    <div class="modal-dialog modal-dialog-slideout" role="document">
        <div class="modal-content full">
            <div class="modal-header" data-dismiss="modal">
                <i class="icon-close fas fa-arrow-right"></i>
            </div>
            <div class="modal-body">
                <form action="{{ url('/login') }}" class="row"><input type="hidden" name="form_id" value="16808769807125"><input type="hidden" name="form_token" value="d8f5636f44f7ac973f1b83d42e7e1cbb"><input type="hidden" name="form_id" value="16029599377750"><input type="hidden" name="form_token" value="41afd04a7264a2739d5c25895ab5de61">
                    <div class="col-12 p-0 align-self-center">
                        <div class="row">
                            <div class="col-12 p-0 pb-3">
                                <h2>Sign In</h2>
                                <p>Don't have an account? <a href="#" class="primary-color" data-toggle="modal" data-target="#register">Register now</a>.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 p-0 input-group">
                                <input type="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="col-12 p-0 input-group">
                                <input type="password" class="form-control" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 p-0 input-group align-self-center">
                                <button class="btn primary-button">SIGN IN</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal [register] -->
<div id="register" class="p-0 modal fade" role="dialog" aria-labelledby="register" aria-hidden="true">
    <div class="modal-dialog modal-dialog-slideout" role="document">
        <div class="modal-content full">
            <div class="modal-header" data-dismiss="modal">
                <i class="icon-close fas fa-arrow-right"></i>
            </div>
            <div class="modal-body">
                <form action="{{ url('/register') }}" class="row"><input type="hidden" name="form_id" value="16808769807125"><input type="hidden" name="form_token" value="d8f5636f44f7ac973f1b83d42e7e1cbb"><input type="hidden" name="form_id" value="16029599377750"><input type="hidden" name="form_token" value="41afd04a7264a2739d5c25895ab5de61">
                    <div class="col-12 p-0 align-self-center">
                        <div class="row">
                            <div class="col-12 p-0 pb-3">
                                <h2>Register</h2>
                                <p>Have an account? <a href="#" class="primary-color" data-toggle="modal" data-target="#sign">Sign In</a>.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 p-0 input-group">
                                <input type="text" class="form-control" placeholder="Name" required>
                            </div>
                            <div class="col-12 p-0 input-group">
                                <input type="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="col-12 p-0 input-group">
                                <input type="password" class="form-control" placeholder="Password" required>
                            </div>
                            <div class="col-12 p-0 input-group">
                                <input type="password" class="form-control" placeholder="Confirm Password" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 p-0 input-group align-self-center">
                                <button class="btn primary-button">REGISTER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal [map] -->
<div id="map" class="p-0 modal fade" role="dialog" aria-labelledby="map" aria-hidden="true">
    <div class="modal-dialog modal-dialog-slideout" role="document">
        <div class="modal-content full">
            <div class="modal-header absolute" data-dismiss="modal">
                <i class="icon-close fas fa-arrow-right"></i>
            </div>
            <div class="modal-body p-0">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2970.123073808986!2d12.490042215441486!3d41.89021017922119!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132f61b6532013ad%3A0x28f1c82e908503c4!2sColiseu!5e0!3m2!1spt-BR!2sbr!4v1594148229878!5m2!1spt-BR!2sbr" width="600" height="450" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
</div>

<!-- Modal [responsive menu] -->
<div id="menu" class="p-0 modal fade" role="dialog" aria-labelledby="menu" aria-hidden="true">
    <div class="modal-dialog modal-dialog-slideout" role="document">
        <div class="modal-content full">
            <div class="modal-header" data-dismiss="modal">
                <i class="icon-close fas fa-arrow-right"></i>
            </div>
            <div class="menu modal-body">
                <div class="row w-100">
                    <div class="items p-0 col-12 text-center">
                        <!-- Append [navbar] -->
                    </div>
                    <div class="contacts p-0 col-12 text-center">
                        <!-- Append [navbar] -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scroll [to top] -->
<div id="scroll-to-top" class="scroll-to-top">
    <a href="#header" class="smooth-anchor">
        <i class="fas fa-arrow-up"></i>
    </a>
</div>        


<!-- ==============================================
Vendor Scripts
=============================================== -->
<script src="https://www.google.com/recaptcha/api.js?render=6Lf-NwEVAAAAAPo_wwOYxFW18D9_EKvwxJxeyUx7"></script>
<script src="/assets/js/vendor/jquery.easing.min.js"></script>
<script src="/assets/js/vendor/jquery.inview.min.js"></script>
<script src="/assets/js/vendor/popper.min.js"></script>
<script src="/assets/js/vendor/bootstrap.min.js"></script>
<script src="/assets/js/vendor/ponyfill.min.js"></script>
<script src="/assets/js/vendor/slider.min.js"></script>
<script src="/assets/js/vendor/animation.min.js"></script>
<script src="/assets/js/vendor/progress-radial.min.js"></script>
<script src="/assets/js/vendor/bricklayer.min.js"></script>
<script src="/assets/js/vendor/gallery.min.js"></script>
<script src="/assets/js/vendor/shuffle.min.js"></script>
<script src="/assets/js/vendor/cookie-notice.min.js"></script>
<script src="/assets/js/vendor/particles.min.js"></script>
<script src="/assets/js/main.js"></script>

<script src="https://www.cryptohopper.com/widgets/js/script"></script>

</body>

</html>

