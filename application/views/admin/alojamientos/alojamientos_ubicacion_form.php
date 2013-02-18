<div class="row-fluid">
    <div class="row-fluid">
        <h2><?php echo $nombre_alojamiento->Nombre ?> </h2>
        <hr>
    </div>
</div> 

<div class="row-fluid">
    <div class="span3">
        <div class="well sidebar-nav">
            <ul class="nav nav-list">
                <?php foreach ($alojamientos_menu_sidebar as $var): ?>
                    <li <?php echo $this->gf->comparar_general($var['tipo'],$menu_activo,"class='active'") ?>><a href="<?php echo base_url().$var['href']. $nombre_alojamiento->ID_Alojamiento."/?&pestania=".$var['tipo']   ?>"><?php echo $var['nombre'] ?></a></li>
                <?php endforeach;?>
            </ul>
        </div><!--/.well -->
    </div><!--/span-->
    <div class="span9">
        <div class="row-fluid">
            <h3>Agregar Ubicación</h3>
            <br>
        </div>
        <div class="row-fluid">
            <form class="form-horizontal" method="post" action="<?php echo base_url() ?>admin/alojamientos/alojamientos_ubicacion_save" enctype="multipart/form-data">
                 <div class="control-group">
                    <label class="control-label" >Dirección:</label>
                    <div class="controls">
                       <input type="text"  name="Direccion" id="Direccion" value="<?php echo $Direccion ?>" >
                        <a href="#" onclick="posicion()" class="btn btn-success">Buscar</a>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" >Coordenadas:</label>
                    <div class="controls">
                        <input type="text" name="Coordenadas" id="Coordenadas" value="<?php echo $Coordenadas ?>"  >
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <input type="submit" class="btn btn-primary" value="Guardar"  >
                    </div>
                </div>
                <input type="hidden" name="ID_Alojamiento" value="<?php echo $nombre_alojamiento->ID_Alojamiento ?>">
            </form>
        </div>
        <div id="map" align="center" style="width: 800px; height: 450px; "></div>    
    </div>
</div>
                

<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=ABQIAAAAHTiRdnf18YS9VpJkmeSyhBTxt8bDmcuMY2RDz1zwKk3UO1V6uRSXgsbPej969xits0R1bko5xtIfTQ" type="text/javascript"></script>
