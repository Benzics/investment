@include('includes.user.header')

<h1>Write Testimony</h1>
<form method="POST">
    @csrf
                <textarea name="testimony" placeholder="Testimony" required style="width:100%;height:200px" class="w3-input w3-border"></textarea>
                <input name="testimony_add" type="submit" class="btn text-shadow default" value="Submit">
    </form>
    
@include('includes.user.footer')