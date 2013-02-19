
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title><?php echo $title ; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $descripcion ;?>">
    <meta name="author" content="">


    <!-- Le styles asdasdas  nuevac  qweqwe gsdfsdfsdfs d sfdsfsdfs dsadasda sdas dasda PRUEBAAAAAAAAAAAAAAAAAA d fdfdsfsdfds ffsdfdsf sd
    <link href="boostrap/css/bootstrap.css" rel="stylesheet">
    <link href="boostrap/css/bootstrap-responsive.css" rel="stylesheet">-->



<!-- JQUERY CSS

  <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />-->
<!-- offline-->
  <link rel="stylesheet" href="<?php echo base_url() ?>css/jquery-ui-1.9.2.custom.css" />

<!--FIN JQUERY CSS -->
      <!-- Start VideoLightBox.com HEAD section -->
<link rel="stylesheet" href="<?php echo base_url() ?>js/engine/css/videolightbox.css" type="text/css" />
<style type="text/css">#videogallery a#videolb{display:none}</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>js/engine/css/overlay-minimal.css"/>

<!--        -------- START CSS STYLE ---------      -->
<link href="<?php echo base_url() ?>css/normalize.min.css" rel="stylesheet"> 
<link href="<?php echo base_url() ?>css/estilos.css" rel="stylesheet">
<link href="<?php echo base_url() ?>css/responsive.css" rel="stylesheet">
    
<!--        -------- END CSS STYLE ---------       -->


  </head>

  <body>
 
<div align="center" id="general"> 
<div class="nofixed" align="center"> <div id="menu2" align="center">
  <div align="center">
    <ul align="left">
     <img src="<?php echo base_url() ?>logo_nuevo.jpg" width="270px" height="110px" alt="SAN RAFAEL LATE" Title="San Rafael Late - Portal de Turismo de San Rafael">
      <li class="menuss"><span class="title">Descubrenos</span><br><span class="info">Toda la informacion sobre San Rafael</span>
<!-- ########## SUBMENU DESCUBRELA ######## -->
<div class="submenu" align="left">
<div><img src="<?php echo base_url() ?>imagenes/CTC.jpg" alt="" class=""></div>
<!-- SAN RAFAEL INFO -->
<div><ul class="">
 <li><h2><img src="<?php echo base_url() ?>iconos/info.jpg" class="ico" alt="Informacion San Rafael">Info San Rafael</h2></li>
  <li><a href="http://sanrafaellate.com.ar/san-rafael/San-Rafael.html" title="reseña Historia de San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta hostel San Rafael">Reseña Histotica</a></li>
  <li><a href="http://sanrafaellate.com.ar/san-rafael/san_rafael_demografia.html" tilte="informacion geografica de San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta hostel San Rafael">Geografia</a></li>
  <li><a href="http://sanrafaellate.com.ar/san_rafael_mapa.html" title="Mapa Interactivo de San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta hostel San Rafael">Mapa Interactivo Ciudad</a></li>
  <li><a href="http://sanrafaellate.com.ar/transporte/transportes.html" title="Guia de transporte Urbano de San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta hostel San Rafael">Guia de Transporte</a></li>
  <li><a href="http://sanrafaellate.com.ar/san-rafael/datos-utiles.html" title="Datos Utiles de San Rafael" ><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta hostel San Rafael">Telefonos de Utilidad</a></li>
 
</ul></div>|

<!-- MULTIMEDIA -->
<div><ul class="">
 <li><h2><img src="<?php echo base_url() ?>iconos/multimedia.jpg" class="ico" alt="Multimedia San Rafael">Multimedia</h2></li>
  <li><a href="http://sanrafaellate.com.ar/multimedia/galeriaFotos.html" title=" Fotos de San Rafael ..1 fotos mas que Mil Palabras"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta hostel San Rafael">Fotos</a></li>
  <li><a href="http://sanrafaellate.com.ar/multimedia/videos.html" title="Videos de San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta hostel San Rafael">videos</a></li>
  <li><a href="http://sanrafaellate.com.ar/multimedia/mapas-san-rafael.html" title="Mapas de San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta hostel San Rafael">Mapas</a></li>
  <li><a href="http://sanrafaellate.com.ar/multimedia/guias-san-rafael.html" title="Guias Turisticas Offline de San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta hostel San Rafael">Guias Offline</a></li>
  <li><a href="http://sanrafaellate.com.ar/multimedia/apps.html" title="Baje todas las Apps para tu visita en San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta hostel San Rafael">App Smartphone</a></li>
 
</ul></div>
<div><h2><img src="<?php echo base_url() ?>iconos/video.jpg" class="ico" alt="video San Rafael">Video San Rafael</h2><div id="videogallery"><a rel="#voverlay" href="http://www.youtube.com/v/FqfSgDLMdio?autoplay=1&rel=0&enablejsapi=1&playerapiid=ytplayer" title="San Rafael - Mendoza"><img src="<?php echo base_url() ?>imagenes/1.png" alt="San Rafael - Mendoza" /><span></span></a></div></div>
<!-- TIEMPO -->
<div align="center"><div class="container">
<div class="clock">
<div id="Date"></div>

<ul>
  <li id="hours"> </li>
    <li id="point">:</li>
    <li id="min"> </li>
    <li id="point">:</li>
    <li id="sec"> </li>
</ul>

</div>
</div><!-- www.TuTiempo.net - Ancho:145px - Alto:106px -->
<div id="TT_vimEk1111SKjlQIK7AVDDDjzD6uKLnK2rdkdEsyoKEj"><h2><a href="http://www.tutiempo.net">Tutiempo.net</a></h2><a href="http://www.tutiempo.net/tiempo/San_Rafael_Aerodrome/SAMR.htm">El tiempo en San Rafael Aerodrome</a></div>
<script type="text/javascript" src="http://www.tutiempo.net/widget/eltiempo_vimEk1111SKjlQIK7AVDDDjzD6uKLnK2rdkdEsyoKEj"></script></div>
<div id="block_inf" ><div class="contac">
  
  <h3><img src="<?php echo base_url() ?>iconos/facebook.jpg" class="ico" alt="siguenos en Facebook"><a href="http://facebook.com/turismosanrafael">Siguenos en Facebook</a></h3>
</div>
<div class="contac">
  
  <h3><img src="<?php echo base_url() ?>iconos/twitter.jpg" class="ico" alt=""><a href="http://twitter.com/sanrafaellate">Siguenos en Twitter</a></h3>
</div>
<div class="contac">
  
  <h3><img src="<?php echo base_url() ?>iconos/contacto2.jpg" class="ico" alt=""><a href="http://sanrafaellate.com/contacto.html">Contactanos</a></h3>
</div>
<div class="contac">
  
  <h3><img src="<?php echo base_url() ?>iconos/opine.jpg" class="ico" alt=""><a href="http://sanrafaellate.com/opina.php">Dejenos su Opinion</a></h3>
</div>
<div class="telefonos"><img src="<?php echo base_url() ?>iconos/telefonos.jpg" class="ico" alt="">0260 4540127 / 154595557 </div>
  </div>
</div>
<!-- ##########SUBMENU FIN DESCUBRELA ######## -->
      </li>
      <li class="menuss" id="preptuviaje"><span class="title">Prepara Tu Viaje</span><br><span class="info">Todo lo que necesitas para armar tu Viaje a San Rafael </span>
<!-- ##########SUBMENU PREPARA TU VIAJE ######## -->
<div class="submenu" align="left" >
<!-- ALOJAMIENTOS --> 
<div id="alojamiento" class="border_rigth">
 
 <h2><img src="<?php echo base_url() ?>iconos/aloja.jpg" class="ico" alt="alojamientos San Rafael">Alojamientos</h2>
 <ul class="twocolum">
  <li><a href="http://sanrafaellate.com.ar/alojamiento/hoteles-san-rafael.html" title="Listado de Hoteles en San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta hoteles San Rafael">Hoteles</a></li>
  <li><a href="http://sanrafaellate.com.ar/alojamiento/cabanas-san-rafael.html" title="Cabañas en San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta Cabañas San Rafael">Cabañas</a></li>
  <li><a href="http://sanrafaellate.com.ar/alojamiento/apartHoteles-san-rafael.html" title="Apart Hoteles en San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta Aparthoteles San Rafael">Apart Hoteles</a></li>
  <li><a href="http://sanrafaellate.com.ar/alojamiento/hostel-san-rafael.html" title="Hostel en San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta hostel San Rafael">Hostel</a></li>
  <li><a href="http://sanrafaellate.com.ar/alojamiento/departamentos-casas-san-rafael.html" title="Departamentos en San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta Departamentos San Rafael">Departamentos</a></li>
  <li><a href="http://sanrafaellate.com.ar/alojamiento/chalets-san-rafael.html" title="Chalet en San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta Chalets San Rafael">Chalets</a></li>
  <li><a href="http://sanrafaellate.com.ar/alojamiento/casas-campo-san-rafael.html" title="Casas de campo San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta Casas de Campo San Rafael">Casas de Campo</a></li>
  <li><a href="http://sanrafaellate.com.ar/alojamiento/compejos-turisticos-san-rafael.htm" title="Complejos Turisticos San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta Complejos Turisticos San Rafael">Complejos Turisticos</a></li>
   <li><a href="http://sanrafaellate.com.ar/alojamiento/campings-san-rafael.html" title="Camping San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta Campings San Rafael">Campings</a></li>
    <li><a href="http://sanrafaellate.com.ar/alojamiento/hosterias-san-rafael.html" title="Hosterias y Hospedajes en San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta Hosterias San Rafae">Hosterias</a></li>
     <li><a href="http://sanrafaellate.com.ar/alojamiento/agroturismo-san-rafael.html" title="Agroturismo San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta Agroturismo San Rafae">Agroturismo</a></li>
</ul> 
</div>
<!-- RESERVA ONLINE -->
<div id="buscador_a" class="border_rigth"><form action="Http://sanrafaellate.com.ar/buscar.php" id="balojar"><div id="bAlojar">
 <h2>Buscar Alojamiento</h2>
  <div class="fecha"><label for="in">Llegada</label><input type="text" value="fecha Llegada" id="in"></div>
  <div class="fecha"><label for="out">Salida</label><input type="text" value="Fecha Salida" id="out"></div><div><label for="tipo">Tipo alojamiento</label><br><select name="tipo" id="tipo"><option value="hotel">Hotel</option><option value="cabanas">Cabañas</option>  <option value="depto">Departmentos</option>   </select> <button>BUSCAR</button></div>
 
</div></form></div>  
<!-- SERVICIOS TURISTAS -->
<div class="border_rigth"><ul>
 <li><h2><img src="<?php echo base_url() ?>iconos/servicios.jpg" class="ico " alt="servicios turisticos">Servicios Turistas</h2></li>
  <li><a href="http://sanrafaellate.com.ar/gastronomia/donde-comer-san-rafael.html" title="Donde Comer en San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="donde comer san rafael">Donde Comer?</a></li>
  <li><a href="http://sanrafaellate.com.ar/transporte/alquiler-autos-san-rafael.html" title="Alquiler de Autos en San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta alquiler autos">Alquiler Autos</a></li>
  <li><a href="http://sanrafaellate.com.ar/excursiones/excursiones-san-rafael.html" title="Excursiones en San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñetas excursiones">Excursiones</a></li>
  <li><a href="http://sanrafaellate.com.ar/servicios/agencias-de-viajes.html" title="Agencias de Viaje para organizar su viaje en San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta agencias ">Agencias de Viaje</a></li>
  <li><a href="http://sanrafaellate.com.ar/servicios/buscador-rutas.html" title="Busque la mejor ruta de su ciudad a San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="">Buscador de Rutas</a></li>
</div>
<div class=""><ul>
 <li><h2><img src="<?php echo base_url() ?>iconos/no_te_pierdas.jpg" class="ico " alt="">No te PIerdas!</h2></li>
  <li><a href="http://sanrafaellate.com.ar/circuitos-turistico/canon-atuel.html" title="Conozca el imponente Cañon del Atuel"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta cañon del atuel San Rafael">Cañon del Atuel</a></li>
  <li><a href="http://sanrafaellate.com.ar/vinos/champanera-bianchi" title="Descubra La Champañera Bianchi"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta chanpañera San Rafael">Champañera Bianchi</a></li>
  <li><a href="http://sanrafaellate.com.ar/vinos/ruta-del-vino.html" title="Ruta del Vino de San Rafael , Bodegas , varietales,e tc"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta ruta del vino San Rafael">Ruta del Vino</a></li>
  <li><a href="http://sanrafaellate.com.ar/olivos/ruta-del-olivo.html" title="la Ruta del Olivo de San Rafael, Fabricas, Plantaciones, etc."><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta ruta del olivo San Rafael">Ruta del Olivos</a></li>
  <li><a href="http://sanrafaellate.com.ar/turismo-aventura/" title="Descubri la mejor Aventura en San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta hostel San Rafael">Turismo Aventura</a></li>
 
</ul></div>
  </div>

<!-- ##########SUBMENU FIN PREPARA ######## -->
      </li>
      <li class="menuss"><span class="title">Circuitos</span><br><span class="info">Conoce los circuitos turistico de San Rafael </span>
<div class="submenu" align="left">
  <div id="circuitos">
    <div>
      <img src="<?php echo base_url() ?>imagenes/valleGrande.jpg" alt="Valle Grande San Rafael">
      <h3><a href="http://sanrafaellate.com.ar/circuitos-turistico/valle-grande.html" title="Descubri Valle Grande San Rafael">Valle Grande</a></h3>
    </div>
    <div>
      <img src="<?php echo base_url() ?>imagenes/losReyunos.jpg" alt="Los Reyunos San Rafael">
      <h3><a href="http://sanrafaellate.com.ar/circuitos-turistico/los-reyunos.html" title="Descubre el Imponente Lago Los Reyunos">Los Reyunos</a></h3>
    </div>
    <div>
      <img src="<?php echo base_url() ?>imagenes/nihuil1.jpg" alt="El Nihuil San Rafael">
      <h3><a href="http://sanrafaellate.com.ar/circuitos-turistico/e-nihiul.html" title="Playa, arena , relax en el Nihiul .. Descubrelo">El Nihuil</a></h3>
    </div>
    <div>
      <img src="<?php echo base_url() ?>imagenes/villa25mayo.jpg" alt="villa 25 de mayo San Rafael">
      <h3><a href="http://sanrafaellate.com.ar/circuitos-turistico/villa-25-mayo.html" title="Patrimonia de La humanidad , UNICO museo Viviente del Mundo">Villa 25 de Mayo</a></h3>
    </div>
    <div>
      <img src="<?php echo base_url() ?>imagenes/ciudad.jpg" alt="Ciudad de San Rafael">
      <h3><a href="http://sanrafaellate.com.ar/circuitos-turistico/ciudad-san-rafael.html" title="descubre todo lo que podes hacer en la Ciudad">Ciudad y Vinos</a></h3>
    </div>
    <div>
      <img src="<?php echo base_url() ?>imagenes/sosneado.jpg" alt="El sosneado San Rafael">
      <h3><a href="http://sanrafaellate.com.ar/circuitos-turistico/el-sosneado.html" title="El Sosneado Relax, tranquilidad y Aventura">El Sosneado</a></h3>
    </div>
      <div>
      <img src="<?php echo base_url() ?>imagenes/lasLenas.jpg" alt="las leñas San Rafael">
      <h3><a href="http://sanrafaellate.com.ar/circuitos-turistico/las-lenas.html" title="Las Leñas, el mejor centro de Esqui Argentina.">Las Leñas</a></h3>
    </div>
      <div>
      <img src="<?php echo base_url() ?>imagenes/canonAtuel.jpg" alt="Cañon del atuel San Rafael">
      <h3><a href="http://sanrafaellate.com.ar/circuitos-turistico/canon-atuel.html" title="El Imponente Cañon de Atuel">cañon del Atuel</a></h3>
    </div>
    
  </div>
</div>
      </li>
      <li class="menuss"><span class="title">Que Hacer?</span><br><span class="info">
      Turismo Aventura, Vino y Bodegas, Olivos..Disfruta! </span>

<div class="submenu" align="left">
<!-- turismo aventura--> 
<div id="tAventura" class="border_rigth">
 
 <h2><img src="<?php echo base_url() ?>iconos/taventura.jpg" class="ico" alt="alojamientos San Rafael">Turismo Aventura</h2>
 <ul class="twocolum">
  <li><a href="http://sanrafaellate.com.ar/turismo-aventura/rafting-san-rafael.html" title="Rafting en San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta Rafting San Rafael">Rafting</a></li>
  <li><a href="http://sanrafaellate.com.ar/turismo-aventura/rapel-san-rafael.html" title="Rapel en San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta Rapel San Rafael">Rapel</a></li>
  <li><a href="http://sanrafaellate.com.ar/turismo-aventura/kayak-san-rafael.html" title="kayak en San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta kayak San Rafael"> Kayak</a></li>
  <li><a href="http://sanrafaellate.com.ar/turismo-aventura/doky-san-rafael.html" title="Doky en San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta doky San Rafael">Doky</a></li>
  <li><a href="http://sanrafaellate.com.ar/turismo-aventura/cabalgata-san-rafael.html" title="Cabalgatas en San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta cabalgatas San Rafael">Cabalgatas</a></li>
  <li><a href="http://sanrafaellate.com.ar/turismo-aventura/caminatas-san-rafael.html" title="Caminatas en San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta caminatas San Rafael">Caminatas</a></li>
  <li><a href="http://sanrafaellate.com.ar/turismo-aventura/aventura4x4-san-rafael.html" title="Aventura 4x4 en San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta aventura 4x4 San Rafael">Aventura 4x4</a></li>
  <li><a href="http://sanrafaellate.com.ar/turismo-aventura/parapente-san-rafael.html" title="Parapente en San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta parapente San Rafael">Parapente</a></li>
   <li><a href="http://sanrafaellate.com.ar/turismo-aventura/catamaran-san-rafael.html" title="catamaran en San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta catamaran San Rafael">Catamaran</a></li>
    <li><a href="http://sanrafaellate.com.ar/turismo-aventura/buceo-san-rafael.html" title="buceo en San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta buceo San Rafae">Buceo</a></li>
     <li><a href="http://sanrafaellate.com.ar/turismo-aventura/pesca-san-rafael.html" title="pesca en San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta pesca San Rafae">Pesca</a></li>
</ul> 
</div>

 
<!-- CAMINOS DEL VINO -->
<div class="border_rigth"><ul>
 <li><h2><img src="<?php echo base_url() ?>iconos/vinos.jpg" class="ico " alt="Caminos del Vino">Caminos Del Vino</h2></li>
  <li><a href="http://sanrafaellate.com.ar/vinos/bodegas-san-rafael.html" title="conozca Bodegas en San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="bodegas San Rafel">Bodegas</a></li>
  <li><a href="http://sanrafaellate.com.ar/vinos/vinos.html" title="Toda la informacion sobre Vinos"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="Informacion de Vinos San Rafael ">Informacion de Vinos</a></li>
  <li><h2><img src="<?php echo base_url() ?>iconos/olivos.jpg" class="ico " alt="Caminos del Vino">Caminos Del Olivo</h2></li>
  <li><a href="http://sanrafaellate.com.ar/olivos/fabricas.html" title="fabricas de olivos en San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="fabricas de Productos Olivos">Fabricas</a></li>
  <li><a href="http://sanrafaellate.com.ar/olivos/olivos.html" title="Olivos en San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="Informacion sobre olivos">Informacion sobre Olivos</a></li>
  
</ul></div>  
 <!-- ACTIVIDADES !-->
<div class=""><ul>
 <li><h2><img src="<?php echo base_url() ?>iconos/actividades.jpg" class="ico " alt="">Actividades</h2></li>
  <li><a href="http://sanrafaellate.com.ar/actividades/festivales-san-rafael.html" title="Festivales de San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta festivales San Rafael">Festivales</a></li>
  <li><a href="http://sanrafaellate.com.ar/actividades/museos-cultura-san-afael.html" title="Listado de Museos y casas de cultura San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta Museos y casas Cultura San Rafael">Museos y Cultura</a></li>
  <li><a href="http://sanrafaellate.com.ar/actividades/congresos-convenciones-san-rafael.html" title="Centro de Congresos y convenciones San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta congresos San Rafael">Congresos y convenciones</a></li>
  <li><a href="http://sanrafaellate.com.ar/actividades/regionales-san-rafael.html" title="Regionales y Artesanias San Rafael"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta regionales San Rafael">Regionales</a></li>
  <li><a href="http://sanrafaellate.com.ar/actividades/deportes-san rafael.html"><img src="<?php echo base_url() ?>vineta2.jpg" class="ico" alt="viñeta depostes San Rafael">Deportes</a></li>
 
</ul></div>
<div id="agenda">
<h2><img src="<?php echo base_url() ?>iconos/agenda.jpg" class="ico " alt="">Agenda Eventos</h2>
  <div>
    <div class="fecha_ag">
      <p>17/01</p>
    </div>
    <div class="info_ag">
      <h3>Encuetro GEEK</h3>
      <p>entro gde geek en SAn Rafael</p>
    </div>
  </div>
  <div>
    <div class="fecha_ag">
      <p>22/01</p>
    </div>
    <div class="info_ag">
      <h3>Tango en Plaza</h3>
      <p>Parejas de tango en plaza San Martin</p>
    </div>
  </div>
  <div>
    <div class="fecha_ag">
      <p>23/01</p>
    </div>
    <div class="info_ag">
      <h3>Fiesta Vendimia</h3>
      <p>fiesta de la vendimia en San rafael</p>
    </div>
  </div>
</div>

  </div>
  <!-- FIN AGENDA-->
      </li>
    
    </ul>
  </div>
 </div>
 </div> 
 <!-- FIN MENU-->