<div class="row-fluid">
    <div class="row-fluid">
        <h2><?php echo $nombre_alojamiento->Nombre ?> </h2>
        <hr>
    </div>
</div> 

<div class="row-fluid">
    <div class="span3">
        <div class="well sidebar-nav">
            <ul class="nav nav-list">
                <?php foreach ($alojamientos_menu_sidebar as $var): ?>
                    <li <?php echo $this->gf->comparar_general($var['tipo'],$menu_activo,"class='active'") ?>><a href="<?php echo base_url().$var['href']. $nombre_alojamiento->ID_Alojamiento."/?&pestania=".$var['tipo']   ?>"><?php echo $var['nombre'] ?></a></li>
                <?php endforeach;?>
            </ul>
        </div><!--/.well -->
    </div><!--/span-->

    <div class="span9">
        <div class="row-fluid">
            <h3>Agregar Cliente</h3>
            <br>
        </div>
        <form class="form-horizontal" method="post" action="<?php echo base_url() ?>admin/alojamientos/alojamientos_clientes_save">
            <div class="control-group">
                <label class="control-label" >Usuario:</label>
                <div class="controls">
                    <input type="text" name="Usuario" value="<?php echo$Usuario ?>"  >
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" >Contraseña:</label>
                <div class="controls">
                    <input type="text"  name="Clave" value="<?php echo $Clave ?>" >
                </div>
            </div>
             <div class="control-group">
                <label class="control-label" >Nombre Cliente:</label>
                <div class="controls">
                    <input type="text"  name="NombreCliente" value="<?php echo $NombreCliente ?>" >
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" >Apellido Cliente:</label>
                <div class="controls">
                    <input type="text"  name="ApellidoCliente" value="<?php echo $ApellidoCliente ?>" >
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" >Email Cliente:</label>
                <div class="controls">
                    <input type="text"  name="EmailCliente" value="<?php echo $EmailCliente ?>" >
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" >Cargo:</label>
                <div class="controls">
                    <input type="text"  name="Cargo" value="<?php echo $Cargo ?>" >
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <input type="submit" class="btn btn-large btn-primary" value="Guardar">
                </div>
            </div>
            <input type="hidden" name="ID_Alojamiento" value="<?php echo $nombre_alojamiento->ID_Alojamiento ?>">
            <input type="hidden" name="ID_Cliente" value="<?php echo $ID_Cliente ?>">
            <input type="hidden" name="accion" value="<?php echo  $accion ?>">
        </form>
    </div>
</div>

