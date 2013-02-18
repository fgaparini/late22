<div class="span12">
            <h4>Listado Páginas</h4>
            <hr>
            <a href="<?php echo base_url().'admin/paginas/form' ?>" class="btn btn-primary">Crear página</a>
            <br>
            <br>
            <table class="table">
                <tr><th>ID</th><th>Título</th><th>Url</th><th>Keywords</th><th>TipoPagina</th><th>Acción</th></tr>
                <?php foreach($paginas_array as $var): ?>
                <tr id="<?php echo "pa_".$var['ID_Pagina'] ?>">
                    <td><?php echo $var['ID_Pagina'] ?></td>
                    <td><?php echo $var['TituloContenido'] ?></td>
                    <td><?php echo $var['Url'] ?></td>
                    <td><?php echo $var['Keywords'] ?></td>
                    <td><?php echo $var['TipoPagina'] ?></td>
                    <td>
                        <a href="<?php echo base_url()."admin/paginas/form/".$var['ID_Pagina'] ?>"><i class="icon-edit"></i></a>&nbsp;&nbsp;
                        <a data-toggle="modal" href= "#myModal" onclick="paginas_delete('<?php echo $var['ID_Pagina'] ?>')"><i class="icon-remove"></i></a>&nbsp;&nbsp;
                        <a  href="<?php echo base_url()."admin/paginas/paginas_imagenes_list/".$var['ID_Pagina'] ?>" <i class="icon-picture"></i></a>&nbsp;&nbsp;
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