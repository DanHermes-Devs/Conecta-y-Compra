<div style="width:100%; float:left; text-align:center; background:#179e59; padding:40px;">
    <p style="font-size:12px; color: #fff;">Conecta y Compra ©  Copyright 2017. All rights reserved.</p>
</div>
		
		</div>
    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
	<script src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
	
<script>
    if (screen.width < 700) {
        var $wHeight = 150;
    }
    else {
        var $wHeight = 300;
    }

jQuery(document).ready(function($) {
    $('#tiendaBanner').carousel({
            interval: 3000
    });
    $('#carousel-text').html($('#slide-content-0').html());

});



function c2goToSlide(number) {
   $("#tiendaBanner").carousel(number);
}
</script>

	
<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
$('.scrollto').click(function(){
    $('html, body').animate({
        scrollTop: $( $(this).attr('href') ).offset().top
    }, 500);
    return false;
});
});//]]> 


function delTienda(clicked_id)
{
	var form = "#form"+ clicked_id;
	var txt;
	 var r = confirm("La tienda será eliminada, ¿Desea continuar?");
	 if (r == true) {
		$.ajax({
            url : $(form).attr('action'),
            type: "POST",
            data : new FormData($(form)[0]),
            processData: false,
            contentType: false,
            success:function(data){
			location.reload();

            }
        });
	 } else {
		
	 } 
}

</script>