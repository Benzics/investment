@include('includes.header-2')


<!--=================================
    Contat Form -->
    <section class="space-ptb">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <div class="section-title text-center">
                <h1>Contact us</h1>
                <p>Feel free to drop us a message.</p>
              </div>
            </div>
          </div>
          <div class="row justify-content-lg-around position-relative pt-5">
            <div class="col-lg-4 col-md-5 mb-4">
              <div class="is-sticky">
                <h4 class="mb-4">Let’s talk about your investment and how we can make it happen.</h4>
                <h5 class="text-light">This is the beginning of creating the life that you want to live.</h5>
              </div>
            </div>
            <div class="col-lg-7 col-md-7 pr-lg-5">
              <div class="p-4 p-md-5 bg-white shadow">
                @if ($errors->any())
                    <div class="alert alert-danger mb-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success') !== null)
                
                    <div class="alert alert-success mb-3">
                        {{ session('success') }}
                    </div>
                
                @endif
                <h3>Need assistance? please fill the form</h3>
                
  
  <form method="post" name="mainform" class="mt-4">
        @csrf
  
              
                  <div class="form-group mb-3">
                    <input type="text" required class="form-control" name="name" value="{{old('name')}}" placeholder="Name">
                  </div>
                  <div class="form-group mb-3">
                    <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Email">
                  </div>
                 
                  <div class="form-group mb-4">
                    <textarea class="form-control" name="text" placeholder="Enquiry Description" rows="5">{{old('text')}}</textarea>
                  </div>
                  
                  <div class="form-group mb-0">
                    <button type="submit" class="btn btn-primary">Send Message<i class="fas fa-arrow-right pl-3"></i></button>
                  </div>
                </form>
                            </div>
            </div>
            <div class="contact-bg-logo">
              <i class="fas fa-comment"></i>
            </div>
          </div>
        </div>
      </section>
      <!--=================================
      Contat Form  -->

@include('includes.footer-2')