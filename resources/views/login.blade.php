@include('includes.header')

<div class="banner-area center">
    <div class="area">
        <div class="bodycontainer">
            <h1 class="tlt text-white" style="margin: 20px 0;">USER <span class="text-default">LOGIN</span></h1>
            <div class="banner-title">
               <span class="decor-equal"></span>
            </div>
            <div  style="margin: 20px 0;">
                <a href="{{ url('/')}}">HOME</a> / LOGIN
            </div>
        </div>
        <div id="particles-js"></div>
        
    </div>
    </div>
        <div class="smallcontainer padding">
        <form action="" method="post">
            @csrf
            <div class="title_container">
                  <h4>Login Authentication</h4>
                  <span class="decor_default"></span>
            </div>

            <div class="">
                @if ($errors->any())
                    <div class="danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
                        <input type="text" placeholder="Email" required name="email" value="{{old('email')}}" style="width:100%" class="margintb round">
    
                <input type="password" placeholder="Password" required name="password" style="width:100%" class="margintb round">
                <div class="row margintb">
                    <a href="fpass" class="right">Forgot password?</a>
                    <input type="checkbox" name="remember" value="1" id="label"><label for="check"> Remember Me</label>
                </div>
                <input type="submit" value="Login" class="btn round default"><br><br>
               <br><br>
        </form>
        
        </div>

@include('includes.footer')