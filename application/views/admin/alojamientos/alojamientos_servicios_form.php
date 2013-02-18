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
                    <li <?php echo $this->gf->comparar_general($var['tipo'],$menu_activo,"class='active'") ?>><a href="<?php echo base_url().$var['href']. $nombre_alojamiento->ID_Alojamiento."/?&pestania=".$var['tipo']  ?>"><?php echo $var['nombre'] ?></a></li>
                <?php endforeach;?>
            </ul>
        </div><!--/.well -->
    </div><!--/span-->

    <div class="span9">
        <div class="row-fluid">
            <h3>Agregar Servicio</h3>
            <br>
        </div>
        <form action="<?php echo base_url() ?>admin/alojamientos/servicios_save" method="post">
            <div class="row-fluid">
                <div class="offset1">
                    <ol>
                        <?php foreach ($servicios_array as $var): ?>
                            <li style="display: inline-block;width: 20%">
                                <label class="checkbox">
                                    <input <?php echo $var['checked'] ?>  value="<?php echo $var['ID_Servicio'] ?>" name="<?php echo $var['ID_Servicio'] ?>" type="checkbox">
                                    <?php echo $var['Servicio'] ?>
                                </label>
                            </li>
                        <?php endforeach; ?>
                    </ol>
                </div>      
            </div>
            <br>
            <div class="row-fluid">
                <div class="span2">
                    <input type="submit" class="btn btn-large btn-primary" value="Guardar">
                    <input type="hidden" name="ID_Alojamiento" value="<?php echo $nombre_alojamiento->ID_Alojamiento ?>">
                </div>
            </div>
        </form>
    </div>
</div>

