<div class="span12">
    <form class="form-horizontal" method="post" action="<?php echo base_url() ?>admin/tipopublicidad/save/">
        <div class=" span12">
            <h4>Crear tipo publicidad</h4>
            <hr>
            <div class="control-group">
                <label class="control-label" >Tipo publicidad:</label>
                <div class="controls">
                    <input type="text" class="span4"   name="TipoPublicidad" value="<?php echo $TipoPublicidad ?>">
                </div>
                <br>
                <label class="control-label" >Detalle:</label>
                <div class="controls">
                    <input type="text" class="span4"  name="DetallePublicidad" value="<?php echo $DetallePublicidad ?>">
                </div>
                <br>
                <label class="control-label" >Precio:</label>
                <div class="controls">
                    <input type="text" class="span4" name="Precio" value="<?php echo $Precio ?>">
                </div>
                <br>
                <div class="offset4"><button class="btn btn-large btn-primary" type="submit" >Guardar</button>&nbsp;&nbsp;<a class="btn btn-large btn-info" href="<?php echo base_url() . "admin/tipopublicidad/lists" ?>">Volver</a></div>
            </div>
        </div>
        <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
        <input type="hidden" name="accion" value="<?php echo $accion ?>">
        <input type="hidden" name="ID_TipoPublicidad" value="<?php echo $ID_TipoPublicidad ?>">
    </form>
</div>
