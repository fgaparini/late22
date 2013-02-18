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
                    <li <?php echo $this->gf->comparar_general($var['tipo'],$menu_activo,"class='active'") ?>><a href="<?php echo base_url().$var['href']. $nombre_alojamiento->ID_Alojamiento."/?&pestania=".$var['tipo']  ?>"><?php echo $var['nombre'] ?></a></li>
                <?php endforeach;?>
            </ul>
        </div><!--/.well -->
    </div><!--/span-->

    <div class="span9">
        <div class="row-fluid">
            <h3>Agregar Imagenes</h3>
            <br>
        </div>
            <form method="post" action="<?php echo base_url() ?>admin/alojamientos/alojamientos_imagenes_save" enctype="multipart/form-data">
            <div class="row-fluid">
                <div class="span2">
                    <div class="fluid-grid">
                        <input  type="file" name="filesToUpload[]" id="filesToUpload" multiple="" onchange="makeFileList();">
                    </div>
                    <br>
                    <div class="fluid-grid">
                        <input type="submit" value="Guardar" class="btn btn-large btn-primary">
                    </div>
                </div>
                <div class="span2 offset4">
                    <a class=" btn btn-large btn-primary  btn-info" href="<?php echo base_url()."admin/alojamientos/form_view/".$nombre_alojamiento->ID_Alojamiento ?>">Volver</a>
                </div>
            </div>
          <input type="hidden" name="ID_Alojamiento" value="<?php echo $nombre_alojamiento->ID_Alojamiento ?>" >
          <input type="hidden" name="tipo" value="muchas_fotos" />
        </form>
    </div>
</div>