<div class="span12">
        <div class="span12">
            <h4>Listado Agenda</h4>
            <hr>
            <a href="<?php echo base_url().'admin/agendas/form' ?>" class="btn btn-primary">Crear agenda</a>
            <br>
            <br>
            <table class="table">
                <tr><th>ID</th><th>Título</th><th>Fecha</th><th>Acción</th></tr>
                <?php foreach($agendas_array as $var): ?>
                <tr id="<?php echo "ag_".$var['ID_Agenda'] ?>">
                    <td><?php echo $var['ID_Agenda'] ?></td>
                    <td><?php echo $var['Titulo'] ?></td>
                    <td><?php echo $this->gf->html_mysql($var['Fecha']) ?></td>
                    <td>
                        <a href="<?php echo base_url()."admin/agendas/form/".$var['ID_Agenda'] ?>"><i class="icon-edit"></i></a>&nbsp;&nbsp;
                        <a  href= "<?php echo base_url()."admin/agendas/delete/".$var['ID_Agenda'] ?>" ><i class="icon-remove"></i></a>&nbsp;&nbsp;
                        <a href="<?php echo base_url()."admin/agendas/view/".$var['ID_Agenda'] ?>"><i class="icon-align-justify" ></i></a>&nbsp;&nbsp;
                        <a href="<?php echo base_url()."admin/agendas/agendas_imagenes_list/".$var['ID_Agenda'] ?>"><i class="icon-picture" ></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
        <input type="hidden" name="accion" value="guardar">
</div>
 