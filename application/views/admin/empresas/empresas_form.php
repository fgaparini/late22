<div class="span12">
    <form class="form-horizontal" method="post" action="<?php echo base_url() ?>admin/empresas/save/" enctype="multipart/form-data">
        <div class="span12">
            <h4>Empresas</h4>
            <hr>
            <div class="control-group">
                <label class="control-label" >Empresa:</label>
                <div class="controls">
                    <input type="text" class="span10"  name="Empresa" value="<?php echo $Empresa ?>">
                </div>
                <br>
                <label class="control-label" >Dirección:</label>
                <div class="controls">
                    <input type="text" class="span10"  name="Direccion" value="<?php echo $Direccion ?>">
                </div>
                <br>
                <label class="control-label" >Url:</label>
                <div class="controls">
                    <input type="text" class="span10"  name="Url" value="<?php echo $Url ?>">
                </div>
                <br>
                <label class="control-label">Teléfono:</label>
                <div class="controls">
                    <input type="text" class="span10"  name="Telefono" value="<?php echo $Telefono ?>">
                </div>
                <br>
                <label class="control-label" >Mail:</label>
                <div class="controls">
                    <input type="text" class="span10"  name="Mail" value="<?php echo $Mail ?>">
                </div>
                <br>
                <label class="control-label" >Facebook:</label>
                <div class="controls">
                    <input type="text" class="span10"  name="Facebook" value="<?php echo $Facebook  ?>">
                </div>
                <br>
                <label class="control-label" >Web:</label>
                <div class="controls">
                    <input type="text" class="span10"  name="Web" value="<?php echo $Web  ?>">
                </div>
                <br>
                <label class="control-label" >Descripción:</label>
                <div class="controls">
                    <textarea class="ckeditor" rows="10" name="Descripcion"><?php echo $Descripcion ?></textarea>
                </div>
                <br>
                <label class="control-label" >Descripción Detallada:</label>
                <div class="controls">
                    <textarea class="ckeditor" rows="10" name="DescripcionDeta"><?php echo $DescripcionDeta ?></textarea>
                </div>
                <br>
                <label  class="control-label" >Tipo Empresa:</label>
                <div class="controls">
                    <select class="span10" name="ID_TipoEmpresa">
                        <?php foreach($tipo_empresas_array as $var): ?>
                        <option <?php echo $this->gf->comparar_general($var['ID_TipoEmpresa'],$ID_TipoEmpresa,"selected='selected'") ?> value="<?php echo $var['ID_TipoEmpresa'] ?>"><?php echo $var['TipoEmpresa'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <br>
                <?php if($accion=='crear'): ?>
                <div class="control-group">
                    <label class="control-label" >Agregar Fotos:</label>
                    <div class="controls">
                        <input  type="file" name="filesToUpload[]" id="filesToUpload" multiple="" onchange="makeFileList();">
                    </div>
                </div>
                <?php endif ?>
                <div class="offset8"><button class="btn btn-large btn-primary" type="submit" >Guardar</button>&nbsp;&nbsp;<a class="btn btn-large btn-info" href="<?php echo base_url()."empresas/lists" ?>">Volver</a></div>
            </div>
        </div>
        <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
        <input type="hidden" name="accion" value="<?php echo $accion ?>">
        <input type="hidden" name="ID_Empresa" value="<?php echo $ID_Empresa ?>">
    </form>
</div>
