<div class="span12">
    <h4>Listado tipos alojamientos</h4>
    <hr>
    <a href="<?php echo base_url() . 'admin/tipoalojamiento/form' ?>" class="btn btn-primary">Crear tipo alojamiento</a>
    <br>
    <br>
    <table class="table">
        <tr><th>ID</th><th>Tipo Alojamiento</th><th>Acción</th></tr>
        <?php foreach ($tipoalojamiento_array as $var): ?>
            <tr id="<?php echo "cat_" . $var['ID_TipoAlojamiento'] ?>">
                <td><?php echo $var['ID_TipoAlojamiento'] ?></td>
                <td><?php echo $var['TipoAlojamiento'] ?></td>
                <td>
                    <a href="<?php echo base_url() . "admin/tipoalojamiento/form/" . $var['ID_TipoAlojamiento'] ?>"><i class="icon-edit"></i></a>&nbsp;&nbsp;
                    <a  href= "<?php echo base_url() . "admin/tipoalojamiento/delete/" . $var['ID_TipoAlojamiento'] ?>" ><i class="icon-remove"></i></a>&nbsp;&nbsp;
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
    <input type="hidden" name="accion" value="guardar">
</div>
