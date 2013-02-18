<div class="row-fluid">
    <div class="row-fluid">
        <h2><?php echo $empresa_nombre ?> </h2>
        <hr>
    </div>
</div> 
    <div class="span9">
        <div class="row-fluid">
            <h3>Agregar Publicidad</h3>
            <br>
        </div>
        <form action="<?php echo base_url() ?>admin/empresas/empresas_publicidad_save" method="post">
            <div class="row-fluid">
                <div class="offset1">
                    <ol>
                        <?php foreach ($publicidad_array as $var): ?>
                            <li   style="display: inline-block;width: 30%">
                                <label class="checkbox tips" data-placement="top" data-content="<?php echo $var['DetallePublicidad'] ?>">
                                    <input value="<?php echo $var['ID_TipoPublicidad'] ?>" name="ID_TipoPublicidad_<?php echo $var['ID_TipoPublicidad'] ?>" type="checkbox">
                                    <?php echo $var['TipoPublicidad']." ($".$var['Precio'].")" ?>
                                </label>
                            </li>
                        <?php endforeach; ?>
                    </ol>
                </div>      
            </div>
            <br>
            <div class="row-fluid">
                <div class="span6">
                    <input type="submit" class="btn btn-large btn-primary" value="Guardar">
                    <a class="btn btn-large btn-info" href="<?php echo base_url()."admin/empresas/empresas_publicidad_list/".$ID_Empresa ?>">Volver</a>
                    <input type="hidden" name="ID_Empresa" value="<?php echo $ID_Empresa ?>">
                </div>
            </div>
        </form>
    </div>
</div>

