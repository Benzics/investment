<footer class="footer space-pt">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="footer-contact-info">
                    <a href="index"><img class="img-fluid mb-4" src="{{ asset(setting('site-logo-2')) }}" alt="logo" /></a>
                    <p class="mb-2 mb-sm-4">
                        We provide a unique opportunity to make profits online, based on our innovative developments that allow us to conduct risk-free bot trading on the largest cryptocurrency and stock exchanges.
                    </p>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 mt-4 mt-md-0 pl-lg-5">
                <h5 class="text-primary mb-2 mb-sm-4">QUICK LINKS</h5>
                <div class="footer-link">
                    <ul class="list-unstyled mb-0">
                     
                        {{-- <li><a href="?a=partner">Partnership</a></li>
                        <li><a href="?a=privacy-policy">Privacy Policy</a></li> --}}
                        <li><a href="{{url('/login')}}">Login</a></li>
                        <li><a href="{{url('/register')}}">Sign Up</a></li>
                    </ul>
                    <ul class="list-unstyled mb-0">
                        <li><a href="{{url('/about')}}">About Us</a></li>
                      
                        <li><a href="{{url('/faqs')}}">FAQs</a></li>
                        <li><a href="{{url('/terms')}}">Terms & Conditions</a></li>
                        <li><a href="{{url('/contact')}}">Contact Us</a></li>
                      
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="footer-contact-info">
                    <a href="/"><img class="img-fluid mb-4" src="{{asset(setting('site-logo-3'))}}" alt="logo" /></a>
                    <p class="mb-2 mb-sm-4">{{setting('address')}}
</p>
                    <h4 class="mb-2 mb-sm-4 font-weight-bold"><a href="#">+vip members</a></h4>
                    <a class="text-dark" href="#">{{setting('support-mail')}}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom mt-3 mt-md-5 py-4">
        <div class="container">
            <div class="row">
        
                <div class="col-lg-4 text-center text-lg-right">
                    <p class="mb-0">©Copyright {{date('Y')}} <a href="{{url('/')}}">{{setting('site-name')}}</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--=================================
footer-->

<!--=================================
Javascript -->

<!-- JS Global Compulsory (Do not remove)-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha512-bnIvzh6FU75ZKxp0GXLH9bewza/OIw6dLVh9ICg0gogclmYGguQJWl8U30WpbsGTqbIiAwxTsbe76DErLq5EDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha512-Ah5hWYPzDsVHf9i2EejFBFrG2ZAPmpu4ZJtW4MfSgpZacn+M9QHDt+Hd/wL1tEkk1UgbzqepJr6KnhZjFKB+0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="{{asset('/assets/js/v2/jquery.appear.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js" integrity="sha512-E9ezH29tutgGF9ZEFg43IK/1B0rRriQm5oHCG5HyrJHAInBnZPOgoRcnsinWZ+/QcVRiatdpXrdBZQhzpbz7Rw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper-animation@1.3.0/build/SwiperAnimation.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-countto/1.1.0/jquery.countTo.min.js" integrity="sha512-ZbM86dAmjIe3nPA2k8j3G//NO/zBYNnZ8wi+yUKh8VH24CHr0aDhDHoEM4IvGl+Sz6ga7ONnGBDxS+BTVJ+K2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

{{-- <script src="js/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="js/shuffle/shuffle.min.js"></script> --}}

<!-- Template Scripts (Do not remove)-->
<script src="{{asset('/assets/js/v2/custom.js')}}"></script>

<!-- Earning notification start -->
{{-- <script type="text/javascript" src="css/alert/js/jquery.fake-notification.min.js"></script> --}}

<script>
    var count_particles, stats, update;
    stats = new Stats();
    stats.setMode(0);
    stats.domElement.style.position = "absolute";
    stats.domElement.style.left = "0px";
    stats.domElement.style.top = "0px";
    document.body.appendChild(stats.domElement);
    count_particles = document.querySelector(".js-count-particles");
    update = function () {
        stats.begin();
        stats.end();
        if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
            count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
        }
        requestAnimationFrame(update);
    };
    requestAnimationFrame(update);
</script>
</div>
</section>

</body>
<script src="//code.tidio.co/0tgmwp8dp5hnqcngevbr1qwyar4lcyi3.js" async></script>
</html>