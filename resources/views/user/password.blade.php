@include('includes.user.header')


<div class="white section round">
    <form action="" method="POST" class="validate" autocomplete="off" id="c_pass">
        @csrf

<p>If you notice any suspicious activity, we recommend changing your password.</p>
    <div class="row">
    <div class="col-6 col-m-6 col-sm-12" style="padding: 10px 0">
        <input type="password" name="old_password" placeholder="Current Password" value="" style="width:100%" required class="padding round">
 
    </div>
    <div class="col-6 col-m-6 col-sm-12" style="padding: 10px 0">
        <input type="password" name="new_password" placeholder="New password" style="width:100%" required class="padding round">    
        
    </div>
    <div class="col-12 col-m-12 col-sm-12" style="padding: 10px 0">
        <input type="submit" value="Submit" class="btn padding round default" style="border:0">

    </div>
    </div>
        
        
    </div>
</form>
</div>	

@include('includes.user.footer')