<div class="span12">
            <h4>Listado Categorias</h4>
            <hr>
            <a href="<?php echo base_url().'admin/categorias/form' ?>" class="btn btn-primary">Crear categoría</a>
            <br>
            <br>
            <table class="table">
                <tr><th>ID</th><th>Categoria</th><th>Acción</th></tr>
                <?php foreach($categorias_array as $var): ?>
                <tr id="<?php echo "cat_".$var['ID_Categorias'] ?>">
                    <td><?php echo $var['ID_Categorias'] ?></td>
                    <td><?php echo $var['Categoria'] ?></td>
                    <td>
                        <a href="<?php echo base_url()."admin/categorias/form/".$var['ID_Categorias'] ?>"><i class="icon-edit"></i></a>&nbsp;&nbsp;
                        <a  href= "<?php echo base_url()."admin/categorias/delete/".$var['ID_Categorias'] ?>" ><i class="icon-remove"></i></a>&nbsp;&nbsp;
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
        <input type="hidden" name="accion" value="guardar">
</div>
 