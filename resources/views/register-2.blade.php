@include('includes.header-2')
<section class="space-ptb">
    <div class="container">

       
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="section-title text-center">
            <h1>Register Here</h1>
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

            



<form method="post" name="regform" class="mt-4">
   @csrf

   <div class="form-group mb-3">
    <input type="text" class="form-control" name="g_id" value="{{ old('g_id', $ref) }}" placeholder="Reference ID(optional)" {{ ($ref) ? 'readonly' : ''}}>
  </div>
              <div class="form-group mb-3">
                <input type="text" class="form-control" required="" name="name" value="{{ old('name') }}" placeholder="Name">
              </div>
              <div class="form-group mb-3">
                <input type="email" class="form-control" required="" name="email" value="{{ old('email') }}" placeholder="Email">
              </div>

              <div class="form-group mb-3">
                <select name="gender" id="gender" class="form-control" required="">
                    <option value="male" @if(old('gender') == 'male' ) selected @endif>Male</option>
                    <option value="female" @if(old('gender') == 'female' ) selected @endif >Female</option>
                </select>
              </div>
              <div class="form-group mb-3">
                <input type="password" required="" class="form-control" name="password" value='' placeholder="Password">
              </div>
              <div class="form-group mb-3">
                <input type="password" required="" class="form-control" name="password_confirmation" value='' placeholder="Retype Password">
              </div>

                              <div class="form-group mb-3">
                <input type="tel" required="" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Mobile number">
              </div>
             
              <div class="form-group mb-4">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="customCheck1" name="agree" value="1">
                  <label class="custom-control-label small" for="customCheck1">I agree to talk about my investment with star-trades.ltd</label>
                </div>
              </div>
              <div class="form-group mb-0">
                <button type="submit" class="btn btn-primary">Register Here<i class="fas fa-arrow-right pl-3"></i></button>
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