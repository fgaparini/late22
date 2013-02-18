
<div class="span12">
    <h4>Listado Publicidad</h4>
    <hr>
    <a href="<?php echo base_url() . 'admin/empresas/empresas_publicidad_form/' . $id_empresa ?>" class="btn btn-primary">Crear Publicidad</a>
    <br>
    <br>
    <table class="table">
        <tr><th>Tipo</th><th>Precio</th><th>Fecha</th><th>Estado</th><th>Meses</th><th>Detalle</th><th>Acción</th></tr> 
        <?php
        foreach ($publicidad_array as $var):
            $class = "";
            if ($var['Activo'] == 0)
                $class = "error";
            elseif ($var['Activo'] == 1)
                $class = "success";
            elseif ($var['Meses'] == 11)
                $class = "warning";
            ?>
            <tr class="<?php echo $class ?>">
                <td><?php echo $var['TipoPublicidad'] ?></td>
                <td><?php echo $var['Precio'] ?></td>
                <td><?php echo $var['FechaPublicidad'] ?></td>
                <td><?php echo $var['Activo'] ?></td>
                <td><?php echo $var['Meses'] ?></td>
                <td><?php echo $var['DetallePublicidad'] ?></td>
                <td><a onclick="confirmar(<?php echo $var['ID_Empresa'] ?>,<?php echo $var['ID_Publicidad'] ?>,'activar')" href="#"><i class="icon-check"></i></a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="confirmar(<?php echo $var['ID_Empresa'] ?>,<?php echo $var['ID_Publicidad'] ?>,'renovar')" ><i class="icon-retweet"></i></a></td>
            </tr>

        <?php endforeach; ?>
    </table>
    <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
    <input type="hidden" name="accion" value="guardar">
</div>