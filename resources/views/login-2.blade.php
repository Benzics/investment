@include('includes.header-2')
<section class="space-ptb">
    <div class="container">

      
     

      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="section-title text-center">
            <h1>Login Here</h1>
          </div>
        </div>
      </div>

      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
      <div class="row justify-content-lg-around position-relative pt-5">
     
        <div class="col-md-12 pr-lg-5">
          <div class="p-4 p-md-5 bg-white shadow">
            <h3>Fill The Form</h3>






<form method="post" class="mt-4">
   @csrf


            
              <div class="form-group mb-3">
                <input type="email" required="" class="form-control" name="email" value='' placeholder="Email">
              </div>
              <div class="form-group mb-3">
                <input type="password" required="" class="form-control" name="password" value='' placeholder="Password">
              </div>
           
              <div class="form-group mb-4">
                 <a href="/contact">Forgot Password</a>
              </div>
              <div class="form-group mb-0">
                <button type="submit" class="btn btn-primary">Login Here<i class="fas fa-arrow-right pl-3"></i></button>
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

  @include('includes.footer-2')