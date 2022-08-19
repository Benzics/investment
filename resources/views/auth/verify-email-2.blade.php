@include('includes.header-2')

<section class="space-ptb">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="section-title text-center">
            <h1>Verify Email</h1>
          </div>
        </div>
      </div>
      <div class="row justify-content-lg-around position-relative pt-5">
        @if(session('message')) <div class="alert alert-success">{{session('message')}}</div> @endif
        <div class="col-md-12 pr-lg-5">
          <div class="p-4 p-md-5 bg-white shadow">
            <h3>Please verify your email.</h3>
                <p>
                    An email verification link was sent to your email when you registered. Please verify your email by clicking the link.
                  <br>
                  <br>

                
                </p>

                <form action="/email/verification-notification" method="post">
                    @csrf
                <button type="submit" class="btn btn-primary btn-block" style="width: 100%">Resend Email for Verification</button>
            </form>
          </div>
        </div>
        <div class="contact-bg-logo">
          <i class="fas fa-comment"></i>
        </div>
      </div>
    </div>
  </section>

@include('includes.footer-2')