@include('includes.user.header')

<div class="white section round">
	<div class="center">
	<div id="imgArea" style="width:100px" class="circle">
		<img src="" style="width:100px" class="circle"><span></span>
    	<div class="progressBar">
    		<div class="bar"></div>
    		<div class="percent">0%</div>
    	</div>
    </div>
		
		<h2> </h2>
	<button class="round white text-grey dashedbtn" id="myBtn">+ Upload a photo</button></div>
	<h6 class="text-grey center padding">Your photo will be displayed in direct messages, public chats and rankings.</h6><hr>
	<h6>Account Data (<a href="{{url('/user/edit-profile')}}">Edit</a>)</h6><hr>
	<div style="overflow-y: auto;">
	<table style="width:100%" class="striped">
        <tr><td><strong>Full Name:</strong> </td>
        <td>{{ucwords($user->name)}}</td></tr>

		<tr><td><strong>Gender:</strong> </td>
			<td>{{$profile->gender}}</td></tr>
		<tr><td><strong>Country:</strong> </td>
			<td>{{$profile->country}}</td></tr>
        <tr><td><strong>Address:</strong> </td>
        <td>{{$profile->address}}</td></tr>
        <tr><td><strong>Zip Code:</strong> </td>
        <td>{{$profile->zip}}</td></tr>
        <tr><td><strong>Email:</strong> </td>
        <td>{{$user->email}}</td></tr>
        <tr><td><strong>Mobile Phone:</strong> </td>
        <td>{{$profile->phone}}</td></tr>
      
		</table>
    </div>
</div>


<script>
    $(document).on('change', '#image_upload_file', function () {
    var progressBar = $('.progressBar'), bar = $('.progressBar .bar'), percent = $('.progressBar .percent');
    
    document.getElementById('myModal').style.display = "none";
    $('#image_upload_form').ajaxForm({
        beforeSend: function() {
            progressBar.fadeIn();
            var percentVal = '0%';
            bar.width(percentVal)
            percent.html(percentVal);
        },
        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal)
            percent.html(percentVal);
        },
        success: function(html, statusText, xhr, $form) {	
            console.log(html);	
            js_string = JSON.stringify(html);
            obj =  $.parseJSON(js_string); 	

            if(obj.status){		
                var percentVal = '100%';
                bar.width(percentVal)
                percent.html(percentVal);
                $("#imgArea>img").prop('src',"{{url('storage')}}"+'/'+obj.image_small);		
            } else {
                alert(obj.error);
            }
        },
        complete: function(xhr) {
            progressBar.fadeOut();			
        }	
    }).submit();		
    
    });
    </script>
    <div id="myModal" class="modal padding">
    
      <!-- Modal content -->
      <div class="modal-content-small">
      <div class="modal-body center">
        <span class="close text-grey">&times;</span><br>
        <h3>Your profile photo</h3>
        <br>
    <div class="danger">
    <ul class="bullet">
        <li>photos of an explicitly sexual or pornographic nature</li>
        <li>images aimed at inciting ethnic or racial hatred or aggression</li>
        <li>photos involving persons under 18 years of age</li>
        <li>third-party copyright protected photos</li>
        <li>images larger than 5 MB and in a format other than JPG, GIF or PNG</li>
    </ul></div><br>
    Your face must be clearly visible on the photo.<br>
    All photos and videos uploaded by you must comply with these requirements, otherwise they can be removed.
    </div>
    <form enctype="multipart/form-data" action="{{url('/user/image-upload')}}" method="post" name="image_upload_form" id="image_upload_form">
        @csrf
    <div class="modal-footer center lightgrey padding">
        <a class="btn default border2 round" id="imgChange" style="width:200px">
        <input type="hidden" name="user" value="">
        <input type="file" accept="image/*" name="image_upload_file" id="image_upload_file">Select a Photo</a>
      </div>
    </form>
    </div>
    
    </div>
    <script src="{{ asset('/assets/js/iziModal.min.js')}}"></script>

    <script>
        // Get the modal
        var modal = document.getElementById('myModal');
        
        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");
        
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        
        // When the user clicks on the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }
        
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        </script>
@include('includes.user.footer')