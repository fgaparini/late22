<div class="span12">
        <div class="span12">
            <h4>Listado Páginas</h4>
            <hr>
            <a href="<?php echo base_url().'admin/empresas/form/' ?>" class="btn btn-primary">Crear Empresa</a>
            <br>
            <br>
            <table class="table">
                <tr><th>ID</th><th>Empresa</th><th>Dirección</th><th>Teléfono</th><th>Tipo Empresa</th><th>Acción</th></tr>
                <?php foreach($empresas_array as $var): ?>
                <tr id="<?php echo "em_".$var['ID_Empresa'] ?>">
                    <td><?php echo $var['ID_Empresa'] ?></td>
                    <td><?php echo $var['Empresa'] ?></td>
                    <td><?php echo $var['Direccion'] ?></td>
                    <td><?php echo $var['Telefono'] ?></td>
                    <td><?php echo $var['TipoEmpresa'] ?></td>
                    <td>
                        <a href="<?php echo base_url()."admin/empresas/form/".$var['ID_Empresa'] ?>"><i class="icon-edit"></i></a>&nbsp;&nbsp;
                        <a data-toggle="modal" href= "#myModal" onclick="empresas_delete('<?php echo $var['ID_Empresa'] ?>')"><i class="icon-remove"></i></a>&nbsp;&nbsp;
                        <a data-toggle="modal" href= "<?php echo base_url()."admin/empresas/empresas_publicidad_list/".$var['ID_Empresa'] ?>"><i class="icon-globe"></i></a>&nbsp;&nbsp;
                        <a data-toggle="modal" href= "<?php echo base_url()."admin/empresas/empresas_imagenes_list/".$var['ID_Empresa'] ?>"><i class="icon-picture"></i></a>&nbsp;&nbsp;
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
        <input type="hidden" name="accion" value="guardar">
</div>
 <!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-header">
   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
   <h3 id="myModalLabel">Eliminar </h3>
 </div>
 <div class="modal-body">
   <p>¿Esta seguro que desea eliminar?</p>
 </div>
 <div class="modal-footer">
   <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
   <button id="eliminar" class="btn btn-danger">Eliminar</button>
 </div>
</div>
<input id="base_url" value="<?php echo base_url()?>" type="hidden">