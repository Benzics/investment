
<div class="dash_footer">
	<p>Copyright &copy; {{date('Y')}} {{config('app.name')}}</p><br>
	<p>Version 1.0</p>
	</div>
</div>
<!-- ConveyThis button: -->
<div id="conveythis-wrapper-main"><a href="https://www.conveythis.com" class="conveythis-no-translate notranslate" title="ConveyThis" >ConveyThis</a></div>
<script src="//s2.conveythis.com/javascriptClassic/1/conveythis.js"></script>
<script src="//s2.conveythis.com/javascriptClassic/1/translate.js"></script>
<script type="text/javascript">
document.addEventListener("DOMContentLoaded", function(e) {
conveythis.init({source_language_id: 703, languages: [{"id":"703","active":true},{"id":"704","active":false},{"id":"708","active":false},{"id":"709","active":false},{"id":"710","active":false},{"id":"711","active":false},{"id":"707","active":false},{"id":"712","active":false},{"id":"713","active":false},{"id":"714","active":false},{"id":"715","active":false},{"id":"716","active":false},{"id":"706","active":false},{"id":"717","active":false},{"id":"718","active":false},{"id":"806","active":false},{"id":"705","active":false},{"id":"719","active":false},{"id":"796","active":false},{"id":"798","active":false},{"id":"720","active":false},{"id":"723","active":false},{"id":"703","active":false},{"id":"724","active":false},{"id":"725","active":false},{"id":"722","active":false},{"id":"726","active":false},{"id":"727","active":false},{"id":"799","active":false},{"id":"728","active":false},{"id":"729","active":false},{"id":"730","active":false},{"id":"731","active":false},{"id":"732","active":false},{"id":"800","active":false},{"id":"733","active":false},{"id":"801","active":false},{"id":"734","active":false},{"id":"735","active":false},{"id":"736","active":false},{"id":"721","active":false},{"id":"802","active":false},{"id":"737","active":false},{"id":"738","active":false},{"id":"803","active":false},{"id":"775","active":false},{"id":"776","active":false},{"id":"797","active":false},{"id":"777","active":false},{"id":"778","active":false},{"id":"774","active":false},{"id":"779","active":false},{"id":"780","active":false},{"id":"781","active":false},{"id":"782","active":false},{"id":"783","active":false},{"id":"784","active":false},{"id":"785","active":false},{"id":"786","active":false},{"id":"787","active":false},{"id":"812","active":false},{"id":"811","active":false},{"id":"788","active":false},{"id":"789","active":false},{"id":"790","active":false},{"id":"813","active":false},{"id":"795","active":false},{"id":"794","active":false},{"id":"793","active":false},{"id":"792","active":false},{"id":"791","active":false},{"id":"810","active":false},{"id":"809","active":false},{"id":"773","active":false},{"id":"772","active":false},{"id":"808","active":false},{"id":"770","active":false},{"id":"769","active":false},{"id":"768","active":false},{"id":"767","active":false},{"id":"765","active":false},{"id":"807","active":false},{"id":"764","active":false},{"id":"763","active":false},{"id":"762","active":false},{"id":"766","active":false},{"id":"761","active":false},{"id":"760","active":false},{"id":"759","active":false},{"id":"758","active":false},{"id":"757","active":false},{"id":"755","active":false},{"id":"754","active":false},{"id":"753","active":false},{"id":"752","active":false},{"id":"751","active":false},{"id":"750","active":false},{"id":"749","active":false},{"id":"748","active":false},{"id":"805","active":false},{"id":"804","active":false},{"id":"746","active":false},{"id":"745","active":false},{"id":"744","active":false},{"id":"771","active":false},{"id":"756","active":false},{"id":"747","active":false},{"id":"743","active":false},{"id":"742","active":false},{"id":"814","active":false},{"id":"815","active":false},{"id":"739","active":false},{"id":"741","active":false},{"id":"740","active":false}]})
});
</script>
<!-- End ConveyThis button code. -->
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