<div class="span12">
    <h4>Listado tipo publicidad</h4>
    <hr>
    <a href="<?php echo base_url() . 'admin/tipopublicidad/form' ?>" class="btn btn-primary">Crear tipo publicidad</a>
    <br>
    <br>
    <table class="table">
        <tr><th>ID</th><th>Tipo Publicidad</th><th>Detalle</th><th>Precio</th><th>Acción</th></tr>
        <?php foreach ($tipopublicidad_array as $var): ?>
            <tr id="<?php echo "cat_" . $var['ID_TipoPublicidad'] ?>">
                <td><?php echo $var['ID_TipoPublicidad'] ?></td>
                <td><?php echo $var['TipoPublicidad'] ?></td>
                <td><?php echo $var['DetallePublicidad'] ?></td>
                <td><?php echo $var['Precio'] ?></td>
                <td>
                    <a href="<?php echo base_url() . "admin/tipopublicidad/form/" . $var['ID_TipoPublicidad'] ?>"><i class="icon-edit"></i></a>&nbsp;&nbsp;
                    <a  href= "<?php echo base_url() . "admin/tipopublicidad/delete/" . $var['ID_TipoPublicidad'] ?>" ><i class="icon-remove"></i></a>&nbsp;&nbsp;
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
    <input type="hidden" name="accion" value="guardar">
</div>
