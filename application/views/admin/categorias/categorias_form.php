<div class="span12">
    <form class="form-horizontal" method="post" action="<?php echo base_url() ?>admin/categorias/save/">
        <div class="span12">
            <h4>Crear Categoria</h4>
            <hr>
            <div class="control-group">
                <label class="control-label" >Categoría:</label>
                <div class="controls">
                    <input type="text" class="span10"  name="Categoria" value="<?php echo $Categoria ?>">
                </div>
                <br>
                <div class="offset8"><button class="btn btn-large btn-primary" type="submit" >Guardar</button>&nbsp;&nbsp;<a class="btn btn-large btn-info" href="<?php echo base_url() . "admin/categorias/lists" ?>">Volver</a></div>
            </div>
        </div>
        <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
        <input type="hidden" name="accion" value="<?php echo $accion ?>">
        <input type="hidden" name="ID_Categorias" value="<?php echo $ID_Categorias ?>">
    </form>
</div>
