
<!-- BEGUIN FOTTER-->
<div id="footer2" align="center">
  
<div class="fotterTop" ><div align="right">
  
<div class="" align="right">
<div class="follows" title=>Siguenos en:</div>
<div class="icofacebook imagico" title="Siguenos en Facebbok"  rel="facebook.com/turismosanrafael"></div><div title="Siguenos en Twitter" class="icotwitter imagico" rel="twitter.com/sanrafaellate"></div><div class="icogoogle imagico" title="Siguenos en Google Plus"  rel="gplus.to/sanrafaellate"></div><div class="icopinterest imagico" title="Siguenos en Pinterest" ></div>
</div></div>
</div>


 <div class="footerBottom" align="left">
<div class="imag"><img src="<?php echo base_url() ?>logo_nuevo.jpg" alt=""></div>
<div>
  <ul>
    <h3>No te Pierdas..</h3>
    <li><a href="#">Caminos del Vino</a></li>
    <li><a href="#">Cañon del Atuel</a></li>
    <li><a href="#">Los Reyunos</a></li>
    <li><a href="#"></a></li>
  </ul>
</div>
<div>
  <ul>
    <h3>Prepara tu Viaje</h3>
    <li><a href="#">Alojamientos</a></li>
    <li><a href="#">Excursiones</a></li>
    <li><a href="#">Agencias de Viaje</a></li>
    <li><a href="#">Calcula tu Ruta</a></li>
  </ul>
</div>
<div>
  <ul>
    <h3>Circuitos</h3>
    <li><a href="#">Valle Grande</a></li>
    <li><a href="#">Los Reyunos</a></li>
    <li><a href="#">Las Leñas</a></li>
    <li><a href="#">25 de Mayo</a></li>
    <li><a href="#">Ciudad</a></li>
  </ul>
</div>
<div>
  <ul>
    <h3>Servicios Turisticos</h3>
    <li><a href="#">Valle Grande</a></li>
    <li><a href="#">Los Reyunos</a></li>
    <li><a href="#">Las Leñas</a></li>
    <li><a href="#">25 de Mayo</a></li>
    <li><a href="#">Ciudad</a></li>
  </ul>
</div>
<div>Diseñado por :</div>
<div>

</div> 

 </div>
 <div class="footerBottom2" align="center">
 <div>
  <span class="title">© 2013 SAN RAFAEL LATE </span>
<span><a href="http://sanrafaellate.com.ar/staff.html">Staff</a></span>
<span><a href="http://sanrafaellate.com.ar/publicidad.html">Publicidad</a></span>
<span><a href="http://sanrafaellate.com.ar/opina.php">¿Sugerencias?</a></span>
<span><a href="http://sanrafaellate.com.ar/mapa-sitio.html">Mapa Sitio</a></span>
<span><a href="http://sanrafaellate.com/contacto.html">Contacto</a></span>
</div>
</div>
 <!-- FIN FOOTER-->


</div>

<!-- =================| SCRIPTS |============== -->

<!-- jQuery JS -->

<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
  <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>

<!-- offline -->
<script src="<?php echo base_url() ?>js/jquery-ui/js/jquery-1.8.3.js"></script>
  <script src="<?php echo base_url() ?>js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>

<!-- RELOJ -->

<script type="text/javascript">
$(function() {

// ---------------------REJOJ-----------------------------------------
// Create two variable with the names of the months and days in an array
var monthNames = [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "diciembre" ]; 
var dayNames= ["domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado"]

// Create a newDate() object
var newDate = new Date();
// Extract the current date from Date object
newDate.setDate(newDate.getDate());
// Output the day, date, month and year    
$('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

setInterval( function() {
  // Create a newDate() object and extract the seconds of the current time on the visitor's
  var seconds = new Date().getSeconds();
  // Add a leading zero to seconds value
  $("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
  },1000);
  
setInterval( function() {
  // Create a newDate() object and extract the minutes of the current time on the visitor's
  var minutes = new Date().getMinutes();
  // Add a leading zero to the minutes value
  $("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
    },1000);
  
setInterval( function() {
  // Create a newDate() object and extract the hours of the current time on the visitor's
  var hours = new Date().getHours();
  // Add a leading zero to the hours value
  $("#hours").html(( hours < 10 ? "0" : "" ) + hours);
    }, 1000);
  
 });

//TABS ---------------------------------------------->
 $(  "#tabs"  ).tabs();


 // MENU ----------------------------------------
//SUBMENU DISPLAY
$(".submenu").css({display: "none"});
//HOVER MENU
$('#menu2 li:has(div.submenu)').hover(
    function(e)
   {
       $(this).find('div').fadeIn();
  },
     function(e)
      {
     $(this).find('div').fadeOut("fast");
      }
 );


// HOVER UI DATEPICKER

$('#ui-datepicker-div').live('mouseover',function(e){$('li#preptuviaje:has(div.submenu)').find('div').show();});
//  <<<<< --------  >>>>>  //

//SCROLL MENU 
 $(window).scroll(function() {           
    if($(this).scrollTop() >= 80){
    
        
            $( "#menu2" ).addClass("fixed");
           
            
    }else{              
            $( "#menu2" ).removeClass("fixed");
    }
    
});
// fin MENU ----------------------------------------

$('.imagico').click( function() {
  
var hrefs=$(this).attr('rel');
window.location= "http://"+hrefs;



});


var dates = $( "#in, #out" ).datepicker({ 
dateFormat: "dd/mm/yy",
changeMonth: false,
numberOfMonths: 2,
onSelect: function( selectedDate ) {
var option = this.id == "in" ? "minDate" : "maxDate",
instance = $( this ).data( "datepicker" ),
date = $.datepicker.parseDate(
instance.settings.dateFormat ||
$.datepicker._defaults.dateFormat,
selectedDate, instance.settings );
dates.not( this ).datepicker( "option", option, date );
$('#out').focus();
}

});

</script>

<!-- VIDEO LIGHTBOX -->
      <script src="<?php echo base_url() ?>js/engine/js/jquery.tools.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url() ?>js/engine/js/swfobject.js" type="text/javascript"></script>
      <!-- make all links with the 'rel' attribute open overlays -->
      <script src="<?php echo base_url() ?>js/engine/js/videolightbox.js" type="text/javascript"></script>
      <script type="text/javascript">

      function onYouTubePlayerReady(playerId) { 
      ytplayer = document.getElementById("video_overlay"); 
      ytplayer.setVolume(100); 
      } 

</script> 



 

</body>
</html>
