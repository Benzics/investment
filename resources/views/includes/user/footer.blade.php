
<div class="dash_footer">
	<p>Copyright &copy; {{date('Y')}} {{config('app.name')}}</p><br>
	<p>Version 1.0</p>
	</div>
</div>

<script>
    if ($(window).width() > 992) {
        boxPosition = $(".udex-sidebar").offset().top;
        $(window).scroll(function(){
           var isFixed = $(".udex-sidebar").css("position") === "fixed";
           if($(window).scrollTop() > boxPosition && !isFixed){
                    $(".udex-sidebar").css({position:"fixed", top: "0px"});
           }else if($(window).scrollTop() < boxPosition){
                $(".udex-sidebar").css({position:"absolute", top: "auto"});
           }
        });
    }
    </script>
</body>
</html>