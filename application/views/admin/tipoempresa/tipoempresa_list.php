<div class="span12">
    <h4>Listado tipos empresas</h4>
    <hr>
    <a href="<?php echo base_url() . 'admin/tipoempresa/form' ?>" class="btn btn-primary">Crear tipo empresa</a>
    <br>
    <br>
    <table class="table">
        <tr><th>ID</th><th>Tipo Empresa</th><th>Acción</th></tr>
        <?php foreach ($tipoempresa_array as $var): ?>
            <tr id="<?php echo "cat_" . $var['ID_TipoEmpresa'] ?>">
                <td><?php echo $var['ID_TipoEmpresa'] ?></td>
                <td><?php echo $var['TipoEmpresa'] ?></td>
                <td>
                    <a href="<?php echo base_url() . "admin/tipoempresa/form/" . $var['ID_TipoEmpresa'] ?>"><i class="icon-edit"></i></a>&nbsp;&nbsp;
                    <a  href= "<?php echo base_url() . "admin/tipoempresa/delete/" . $var['ID_TipoEmpresa'] ?>" ><i class="icon-remove"></i></a>&nbsp;&nbsp;
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
    <input type="hidden" name="accion" value="guardar">
</div>
