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
                    <li <?php echo $this->gf->comparar_general($var['tipo'], $menu_activo, "class='active'") ?>><a href="<?php echo base_url() . $var['href'] . $nombre_alojamiento->ID_Alojamiento . "/?&pestania=" . $var['tipo'] ?>"><?php echo $var['nombre'] ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div><!--/.well -->
    </div><!--/span-->

    <div class="span9">
        <div class="row-fluid">
            <h3>Agregar Habitación</h3>
            <br>
        </div>
        <div class="row-fluid">
            <div class="row-fluid">
                <h4>Agregar mas fotos</h4>
            </div>
            <div class="span5">
                <form action="<?php echo base_url() ?>admin/alojamientos/alojamientos_habitaciones_imagenes_save/" method="post" enctype="multipart/form-data">
                    <input type="file" name="filesToUpload[]" id="filesToUpload" multiple="" onchange="" value="Agregar Foto">
                    <input type="submit" value="subir" class="btn btn-primary"/>
                    <input name="ID_Habitacion" value="<?php echo $id_habitacion ?>" type="hidden">
                    <input name="ID_Alojamiento" value="<?php echo $nombre_alojamiento->ID_Alojamiento ?>" type="hidden" />
                    <input name="tipo" value="foto_mas" type="hidden">
                </form>
            </div>
            <table class="table">
                <tr><th>Nombre Foto</th><th>Imagen</th><th>Agregar</th><th>Borrar</th></tr>
                <?php foreach ($imageneshab_array as $var): ?>
                    <tr id="<?php echo "ah_" . $var['NombreImagenHab'] ?>">
                        <td><?php echo $var['ID_Habitacion'] . "_" . $var['NombreImagenHab'] . ".jpg" ?></td>
                        <td><a rel="example_group" href="<?php echo base_url() . "upload/habitaciones/" . $var['ID_Habitacion'] . "_" . $var['NombreImagenHab'] . ".jpg" ?>"><img class="last"  width="50px" src="<?php echo base_url() . "upload/habitaciones/" . $var['ID_Habitacion'] . "_" . $var['NombreImagenHab'] . ".jpg" ?>"></a></td>
                        <td>
                            <form action="<?php echo base_url() ?>admin/alojamientos/alojamientos_habitaciones_imagenes_save/" method="post" enctype="multipart/form-data">
                                <input type="file" name="filesToUpload[]" id="filesToUpload" multiple="" onchange="makeFileList();" value="Agregar Foto">
                                <input type="submit" value="subir" class="btn btn-primary"/>
                                <input name="ID_Habitacion" value="<?php echo $var['ID_Habitacion'] ?>" type="hidden">
                                <input name="tipo" value="foto_comun" type="hidden">
                                <input name="foto_numero" value="<?php echo $var['NombreImagenHab'] ?>" type="hidden" />
                                <input name="ID_Alojamiento" value="<?php echo $nombre_alojamiento->ID_Alojamiento ?>" type="hidden" />
                            </form>
                        </td>
                        <td>
                            <form id="<?php echo $var['NombreImagenHab'] ?>"  class="form-inline descripcion_form">
                                <input type="text"  class="input-xlarge" value="<?php echo $var['ImagenDescripcion'] ?>" name="descripcion" id="descrip_<?php echo $var['NombreImagenHab'] ?>">&nbsp;&nbsp;
                                <a href="#" id="ok_button" class="btn-info btn" rel="<?php echo $var['NombreImagenHab'] ?>">Ok</a>
                                <input type="hidden" id="ID_Habitacion_<?php echo $var['NombreImagenHab'] ?>" value="<?php echo $var['ID_Habitacion'] ?>">
                            </form>
                        </td>
                        <td>
                            <a href= "#myModal" onclick="habitaciones_imagenes_delete('<?php echo $var['ID_Habitacion'] ?>','<?php echo $var['NombreImagenHab'] ?>')"  data-toggle="modal"><i class="icon-remove"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Eliminar </h3>
    </div>
    <div class="modal-body">
        <p>¿Esta seguro que desea eliminar?</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
        <button id="eliminar" class="btn btn-danger">Eliminar</button>
    </div>
</div>
<input id="base_url" value="<?php echo base_url() ?>" type="hidden">





