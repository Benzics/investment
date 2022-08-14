@include('includes.user.header')

<div class="white section round">

	<link rel="stylesheet" href="https://globaloptionsfxtrade.com/css/intlTelInput.css">
<script type= "text/javascript" src = "https://globaloptionsfxtrade.com/js/countries.js"></script>
<form action="" method="POST" class="validate form" id="edit_profile">
    @csrf
	<h4>Personal Information</h4><hr>
		<input type="hidden" name="userid" id="userid" value="">
    	<div class="row">
        <div class="col-6 col-m-6 col-sm-12">
			<label><strong>Full name <span class="text-red">*</span></strong></label>
			<input type="text" placeholder="Full Name" required name="name" value="{{ old('name', $user->name) }}" style="width:100%;" class="round">
        </div>
        <div class="col-6 col-m-6 col-sm-12">
			<label><strong>Phone <span class="text-red">*</span></strong></label>
			<input type="text" placeholder="Phone" required name="phone" value="{{ old('phone', $profile->phone) }}" style="width:100%;" class="round">
			
        </div>
		<div class="col-6 col-m-6 col-sm-12">
			<label><strong>Country</strong></label>
			
			<input type="text" placeholder="Country" name="country" value="{{ old('country', $profile->country) }}" class="round" style="width:100%;">
		</div>
        <div class="col-6 col-m-6 col-sm-12">
			<label><strong>Zip Code</strong></label>
			<input type="text" placeholder="Zip Code" name="zip" value="{{ old('zip', $profile->zip) }}" style="width:100%;" class="round">
        </div>
        <div class="col-6 col-m-6 col-sm-12">
			<label><strong>Email</strong></label>
			<input type="email" placeholder="Email" name="email" value="{{ old('email', $user->email) }}" style="width:100%;" disabled="disabled">
			
        </div>
      
		<div class="col-6 col-m-6">
			<label class="bold">Gender<span class="text-red">*</span></label>
        	<select name="gender" id="gender" style="width:100%">
                <option {{old('gender') == "male"? 'selected' : ''}} id="male">Male</option>
                <option {{old('gender') == "female"? 'selected' : ''}} id="female">Female</option>
            </select>
        </div>
		<div class="col-12 col-m-12 col-sm-12">
			<label><strong>Address</strong></label>
			<input type="text" placeholder="Address" name="address" value="{{ old('address', $profile->address) }}" class="round" style="width:100%;">
		</div>
        <div class="col-12 col-m-12 col-sm-12">
        	<input type="submit" name="edit" value="Save" class="btn round default">
        </div>
        </div>
            
			
	</form>
</div>

@include('includes.user.footer')