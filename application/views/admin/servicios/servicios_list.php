<div class="span12">
    <h4>Listado servicios</h4>
    <hr>
    <a href="<?php echo base_url() . 'admin/servicios/form' ?>" class="btn btn-primary">Crear servicio</a>
    <br>
    <br>
    <table class="table">
        <tr><th>ID</th><th>Servicio</th><th>Acción</th></tr>
        <?php foreach ($servicios_array as $var): ?>
            <tr id="<?php echo "cat_" . $var['ID_Servicio'] ?>">
                <td><?php echo $var['ID_Servicio'] ?></td>
                <td><?php echo $var['Servicio'] ?></td>
                <td>
                    <a href="<?php echo base_url() . "admin/servicios/form/" . $var['ID_Servicio'] ?>"><i class="icon-edit"></i></a>&nbsp;&nbsp;
                    <a  href= "<?php echo base_url() . "admin/servicios/delete/" . $var['ID_Servicio'] ?>" ><i class="icon-remove"></i></a>&nbsp;&nbsp;
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
    <input type="hidden" name="accion" value="guardar">
</div>
