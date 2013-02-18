<div class="span12">
    <div class="row-fluid">
        <div class="span3">
            <h4>Agregar Mas fotos</h4>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span5">
            <form action="<?php echo base_url() ?>admin/paginas/paginas_imagenes_save/" method="post" enctype="multipart/form-data">
                <input type="file" name="filesToUpload[]" id="filesToUpload" multiple=""  value="Agregar Foto">
                <input type="submit" value="subir" class="btn btn-primary"/>
                <input name="ID_Pagina" value="<?php echo $ID_Pagina ?>" type="hidden">
                <input name="tipo" value="foto_mas" type="hidden">
            </form>
        </div>
    </div>
    <br>
    <div class="row-fluid">
        <table class="table">
            <tr><th>Nombre Foto</th><th>Imagen</th><th>Agregar</th><th>Descripción</th><th>Borrar</th></tr>
            <?php foreach ($paginas_imagenes_array as $var): ?>
                <tr id="i_<?php echo $var['ImagenPagina'] ?>">
                    <td><?php echo $var['ID_Pagina'] . "_" . $var['ImagenPagina'] . ".jpg" ?></td>
                    <td>
                        <a rel="example_group" href="<?php echo base_url() . "upload/" . $var['ID_Pagina'] . "_" . $var['ImagenPagina'] . ".jpg" ?>"><img  class="last" width="50px" src="<?php echo base_url() . "upload/paginas/" . $var['ID_Pagina'] . "_" . $var['ImagenPagina'] . ".jpg" ?>"></a>
                    </td>
                    <td>
                        <form action="<?php echo base_url() ?>admin/paginas/paginas_imagenes_save/" method="post" enctype="multipart/form-data">
                            <input type="file" name="filesToUpload[]" id="filesToUpload" multiple=""  value="Agregar Foto">
                            <input type="submit" value="subir" class="btn btn-primary"/>
                            <input name="ID_Pagina" value="<?php echo $var['ID_Pagina'] ?>" type="hidden">
                            <input name="tipo" value="foto_comun" type="hidden">
                            <input name="foto_numero" value="<?php echo $var['ImagenPagina'] ?>" type="hidden" />
                        </form>
                    </td>
                    <td>
                        <form id="<?php echo $var['ImagenPagina'] ?>"  class="form-inline descripcion_form">
                            <input type="text"  class="input-xlarge" value="<?php echo $var['ImagenDescripcion'] ?>" name="descripcion" id="descrip_<?php echo $var['ImagenPagina'] ?>">&nbsp;&nbsp;
                            <a href="#" id="ok_button" class="btn-info btn" rel="<?php echo $var['ImagenPagina'] ?>">Ok</a>
                            <input type="hidden" id="ID_Pagina_<?php echo $var['ImagenPagina'] ?>" value="<?php echo $var['ID_Pagina'] ?>">
                        </form>
                    </td>
                    <td>
                        <a href= "<?php echo base_url() . "admin/paginas/paginas_imagenes_delete/?ID_Pagina=" . $var['ID_Pagina'] . "&ImagenPagina=" . $var['ImagenPagina'] ?>"   data-toggle="modal"><i class="icon-remove"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <input type="hidden" value="<?php echo base_url() ?>" id="base_url">
</div>