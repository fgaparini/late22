<div class="span12">
    <form class="form-horizontal" method="post" action="<?php echo base_url() ?>admin/tipoempresa/save/">
        <div class="span12">
            <h4>Crear tipo empresa</h4>
            <hr>
            <div class="control-group">
                <label class="control-label" >Tipo Empresa:</label>
                <div class="controls">
                    <input type="text" class="span10"  name="TipoEmpresa" value="<?php echo $TipoEmpresa ?>">
                </div>
                <br>
                <div class="offset8"><button class="btn btn-large btn-primary" type="submit" >Guardar</button>&nbsp;&nbsp;<a class="btn btn-large btn-info" href="<?php echo base_url() . "admin/tipoempresa/lists" ?>">Volver</a></div>
            </div>
        </div>
        <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
        <input type="hidden" name="accion" value="<?php echo $accion ?>">
        <input type="hidden" name="ID_TipoEmpresa" value="<?php echo $ID_TipoEmpresa ?>">
    </form>
</div>
