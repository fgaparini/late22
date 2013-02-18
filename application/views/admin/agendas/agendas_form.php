<div class="span12">
    <form class="form-horizontal" method="post" action="<?php echo base_url() ?>admin/agendas/save/">
        <div class="span12">
            <h4>Crear Evento</h4>
            <hr>
            <div class="control-group">
                <label class="control-label" >Título:</label>
                <div class="controls">
                    <input type="text" class="span10"  name="Titulo" value="<?php echo $Titulo ?>">
                </div>
                <br>
                 <label class="control-label" >Fecha:</label>
                <div class="controls">
                    <input type="text" id="datepicker"  name="Fecha" value="<?php echo $Fecha ?>">
                </div>
                <br>
                <label class="control-label" >Descripción:</label>
                <div class="controls">
                    <textarea class="ckeditor" rows="10" name="Descripcion"><?php echo $Descripcion ?></textarea>
                </div>
                <br>
                <div class="offset8"><button class="btn btn-large btn-primary" type="submit" >Guardar</button>&nbsp;&nbsp;<a class="btn btn-large btn-info" href="<?php echo base_url() . "admin/agendas/lists" ?>">Volver</a></div>
            </div>
        </div>
        <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
        <input type="hidden" name="accion" value="<?php echo $accion ?>">
        <input type="hidden" name="ID_Agenda" value="<?php echo $ID_Agenda ?>">
    </form>
</div>
