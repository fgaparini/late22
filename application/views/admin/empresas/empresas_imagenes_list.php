<div class="span12">
    <div class="row-fluid">
        <div class="span3">
            <h4>Agregar Mas fotos</h4>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span5">
            <form action="<?php echo base_url() ?>admin/empresas/empresas_imagenes_save/" method="post" enctype="multipart/form-data">
                <input type="file" name="filesToUpload[]" id="filesToUpload" multiple="" onchange="makeFileList();" value="Agregar Foto">
                <input type="submit" value="subir" class="btn btn-primary"/>
                <input name="ID_Empresa" value="<?php echo $ID_Empresa ?>" type="hidden">
                <input name="tipo" value="foto_mas" type="hidden">
            </form>
        </div>
    </div>
    <br>
    <div class="row-fluid">
        <table class="table">
            <tr><th>Nombre Foto</th><th>Imagen</th><th>Agregar</th><th>Descripción</th><th>Borrar</th></tr>
            <?php foreach ($empresas_imagenes_array as $var): ?>
                <tr id="i_<?php echo $var['ImagenEmpresa'] ?>">
                    <td><?php echo $var['ID_Empresa'] . "_" . $var['ImagenEmpresa'] . ".jpg" ?></td>
                    <td>
                        <a rel="example_group" href="<?php echo base_url() . "upload/" . $var['ID_Empresa'] . "_" . $var['ImagenEmpresa'] . ".jpg" ?>"><img  class="last" width="50px" src="<?php echo base_url() . "upload/empresas/" . $var['ID_Empresa'] . "_" . $var['ImagenEmpresa'] . ".jpg" ?>"></a>
                    </td>
                    <td>
                        <form action="<?php echo base_url() ?>admin/empresas/empresas_imagenes_save/" method="post" enctype="multipart/form-data">
                            <input type="file" name="filesToUpload[]" id="filesToUpload" multiple=""  value="Agregar Foto">
                            <input type="submit" value="subir" class="btn btn-primary"/>
                            <input name="ID_Empresa" value="<?php echo $var['ID_Empresa'] ?>" type="hidden">
                            <input name="tipo" value="foto_comun" type="hidden">
                            <input name="foto_numero" value="<?php echo $var['ImagenEmpresa'] ?>" type="hidden" />
                        </form>
                    </td>
                    <td>
                        <form id="<?php echo $var['ImagenEmpresa'] ?>"  class="form-inline descripcion_form">
                            <input type="text"  class="input-xlarge" value="<?php echo $var['ImagenDescripcion'] ?>" name="descripcion" id="descrip_<?php echo $var['ImagenEmpresa'] ?>">&nbsp;&nbsp;
                            <a href="#" id="ok_button" class="btn-info btn" rel="<?php echo $var['ImagenEmpresa'] ?>">Ok</a>
                            <input type="hidden" id="ID_Empresa_<?php echo $var['ImagenEmpresa'] ?>" value="<?php echo $var['ID_Empresa'] ?>">
                        </form>
                    </td>
                    <td>
                        <a href= "<?php echo base_url() . "admin/empresas/empresas_imagenes_delete/?ID_Empresa=" . $var['ID_Empresa'] . "&ImagenEmpresa=" . $var['ImagenEmpresa'] ?>"   data-toggle="modal"><i class="icon-remove"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <input type="hidden" value="<?php echo base_url() ?>" id="base_url">
</div>