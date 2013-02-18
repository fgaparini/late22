<div class="span12">
    <h1>Reservas</h1>
    <form method="get" action="<?php echo base_url() ?>admin/reservas/lists/">
        <div class="row-fluid">
           <div class="span3">
               Buscar por:
           </div>
            <div class="span3">
                <select name="campo">
                   <option value="ninguno">ninguno</option>
                   <option value="NombreHuesped">nombre huesped</option>
                   <option value="Localizador">localizador</option>
               </select>
            </div>
           <div class="span3">
               <input type="text" name="valor" value="" />
           </div>
       </div>
    <input type="submit" value="enviar" class="btn btn-success btn-primary" />
    </form>
    <table class="table">
        <tr><th><a href="<?php echo base_url()?>admin/reservas/lists/?order=localizador">Localizador</a></th><th><a href="<?php echo base_url()?>reservas/lists/?order=Checkin">CheckIn</a>-<a href="<?php echo base_url()?>reservas/lists/?order=Checkout">CheckOut</a></th><th><a href="<?php echo base_url()?>reservas/lists/?order=NombreHuesped">Nombre</a>-<a href="<?php echo base_url() ?>reservas/lists/?order=ApellidoHuesped">Apellido</a></th><th><a href="<?php echo base_url() ?>reservas/lists/?order=Nombre">Alojamiento</a></th><th>Total Reserva</th><th><a href="<?php echo base_url() ?>reservas/lists/?order=estado_pago">Estado Pago</a></th><th><a href="<?php echo base_url() ?>reservas/lists/?order=fecha_reserva_dat" >Venc. Pago</a></th><th><a href="<?php base_url() ?>reservas/lists/?order=metodo_pago">Met. Pago</a></th></tr>
        <?php foreach ($reservas_array as $var): ?>
            <tr class="success" ><td><?php echo $var['localizador'] ?></td><td><a href=""></a><?php echo $var['Checkin']." , ".$var['Checkout'] ?></td><td><?php echo $var['NombreHuesped'].", ".$var['ApellidoHuesped'] ?></td><td><?php echo $var['Nombre'] ?></td><td><?php echo $var['costo_total'] ?></td><td><?php echo $var['estado_pago'] ?></td><td><?php echo $var['fecha_reserva_dat'] ?></td><td><?php echo $var['metodo_pago'] ?></td></tr>
        <?php endforeach; ?>
    </table>
    
    <table>
        <tr><td><?php echo $this->pagination->create_links(); ?></td></tr>
    </table>
</div>
