<div class="span12">
    <h4>Listado tipos páginas</h4>
    <hr>
    <a href="<?php echo base_url() . 'admin/tipopagina/form' ?>" class="btn btn-primary">Crear tipo página</a>
    <br>
    <br>
    <table class="table">
        <tr><th>ID</th><th>Tipo Página</th><th>Acción</th></tr>
        <?php foreach ($tipopagina_array as $var): ?>
            <tr id="<?php echo "cat_" . $var['ID_TipoPagina'] ?>">
                <td><?php echo $var['ID_TipoPagina'] ?></td>
                <td><?php echo $var['TipoPagina'] ?></td>
                <td>
                    <a href="<?php echo base_url() . "admin/tipopagina/form/" . $var['ID_TipoPagina'] ?>"><i class="icon-edit"></i></a>&nbsp;&nbsp;
                    <a  href= "<?php echo base_url() . "admin/tipopagina/delete/" . $var['ID_TipoPagina'] ?>" ><i class="icon-remove"></i></a>&nbsp;&nbsp;
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
    <input type="hidden" name="accion" value="guardar">
</div>
