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
                    <li <?php echo $this->gf->comparar_general($var['tipo'], $menu_activo, "class='active'") ?>><a href="<?php echo base_url() . $var['href'] . $nombre_alojamiento->ID_Alojamiento."/?&pestania=".$var['tipo']  ?>"><?php echo $var['nombre'] ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div><!--/.well -->
    </div><!--/span-->

    <div class="span9">
        <div class="row-fluid">
            <h3>Agregar Habitación</h3>
            <br>
        </div>
        <div class="row-fluid">
            <form class="form-horizontal" method="post" action="<?php echo base_url() ?>admin/alojamientos/alojamientos_habitaciones_save" enctype="multipart/form-data">
                <div class="control-group">
                    <label class="control-label" >Nombre:</label>
                    <div class="controls">
                        <input type="text" name="NombreHab" value="<?php echo $NombreHab ?>"  >
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" >Descripción:</label>
                    <div class="controls">
                        <textarea rows="3" name="DescripcionHab"><?php echo $DescripcionHab ?></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" >Desayuno:</label>
                    <div class="controls">
                        <select name="ID_Desayuno">
                            <?php foreach ($tipo_desayunos_array as $var): ?>
                                <option <?php echo $this->gf->comparar_general($var['ID_Desayuno'],$ID_Desayuno,'selected="selected"') ?> value="<?php echo $var['ID_Desayuno'] ?>"><?php echo $var['Desayuno'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" >Máximo:</label>
                    <div class="controls">
                        <input type="text"  name="PaxMax" value="<?php echo $PaxMax ?>" >
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" >Máximo Adultos:</label>
                    <div class="controls">
                        <input type="text"  name="PaxAdulto" value="<?php echo $PaxAdulto ?>" >
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" >Máximo Niño:</label>
                    <div class="controls">
                        <input type="text"  name="PaxNinio" value="<?php echo $PaxNinio ?>" >
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" >Tipo Habitación:</label>
                    <div class="controls">
                        <select name="ID_TipoHabitacion">
                            <?php foreach ($tipo_alojamientos_array as $var): ?>
                                <option <?php echo $this->gf->comparar_general($var['ID_TipoHabitacion'],$ID_TipoHabitacion,'selected="selected"') ?> value="<?php echo $var['ID_TipoHabitacion'] ?>" ><?php echo $var['TipoHabitacion'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" >Unidad Alojativa:</label>
                    <div class="controls">
                        <select name="UnidadAlojativa">
                            <option <?php echo $this->gf->comparar_general($UnidadAlojativa,'habitacion','selected') ?> value="habitacion">Habitación</option>
                            <option <?php echo $this->gf->comparar_general($UnidadAlojativa,'depto','selected') ?>  value="depto">Departamento</option>
                            <option <?php echo $this->gf->comparar_general($UnidadAlojativa,'cabaña','selected') ?>  value="cabaña">Cabaña</option>
                            <option <?php echo $this->gf->comparar_general($UnidadAlojativa,'chalet','selected') ?>  value="chalet">Chalet</option>
                            <option <?php echo $this->gf->comparar_general($UnidadAlojativa,'casa','selected') ?>  value="casa">Casa</option>
                        </select>
                    </div>
                </div>
                <?php if($accion=='crear'): ?>
                <div class="control-group">
                    <label class="control-label" >Agregar Fotos:</label>
                    <div class="controls">
                        <input  type="file" name="filesToUpload[]" id="filesToUpload" multiple="" onchange="makeFileList();">
                    </div>
                </div>
                <?php endif ?>
                <div class="control-group">
                    <div class="controls">
                        <input type="submit" class="btn btn-large btn-primary" value="Guardar">
                    </div>
                </div>
                <input type="hidden" name="ID_Alojamiento" value="<?php echo $nombre_alojamiento->ID_Alojamiento ?>">
                <input type="hidden" name="ID_Habitacion" value="<?php echo $ID_Habitacion ?>">
                <input type="hidden" name="accion" value="<?php echo $accion ?>" >
                <input type="hidden" name="tipo" value="muchas_fotos" />
            </form>
        </div>
    </div>
</div>









