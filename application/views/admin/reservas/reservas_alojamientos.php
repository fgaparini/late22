<div class="row-fluid">
    <div class="span12">
        <h3>Habitaciones disponibles</h3>
        <?php $min_dispo = 999; ?>
<!-- ###################################### foreach con informacion del alojamiento ################################# -->
        <?php foreach ($alojamientos_array as $key_alo => $info_alo): ?>
        <form method="post" action="<?php echo base_url()."admin/reservas/buscar_disponibilidad_ii/" ?>">
                <div class="alojar"><div class="row-fluid ">
                        <div class="span1" >
                            <img style="float: left" class="img-rounded" src="<?php echo base_url() . "upload/alojamientos/thumb/" . $info_alo['id_alojamiento'] . "_1_p.jpg" ?>" />
                        </div>
                        <div class="span11">
                            <h2></h2>  
                            <div class="row-fluid">
                                <div class="span3">
                                    <span><b>Tipo:&nbsp;</b><?php echo $info_alo['tipoalojamiento'] ?></span>  
                                </div>
                                <div class="span3">
                                    <span><b>Ubicación:&nbsp;</b><?php echo $info_alo['localidad'] ?></span>  
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span11">
                                    <div class="row-fluid">
                                        <div class="span11">
                                            <span><b>Descripción:&nbsp;</b></span>
                                        </div>
                                        <div class="row-fluid">
                                            <div class="span11">
                                                <?php echo $info_alo['descripcion'] ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <div><b>Opciones</b></div>
                        </div>
                    </div>
<!-- ###################################### foreach con informacion de  habitaciones ################################# -->
                       <?php $count_habitaciones=0 ?>
                       <?php foreach ($info_alo['habitacion'] as $key_hab => $info_hab): ?>
                            <?php $count_habitaciones++; ?>
                            <div class="row-fluid">
                            <div class="span11 offset1">
                                <b><?php echo $info_hab['nombrehab'] ?></b>
                                <input type="text" name="<?php echo "id_habitacion"."_".$count_habitaciones ?>" value="<?php echo $info_hab['id_habitacion'] ?>">
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span11 offset1">
                                <table class="table">
                                    <tr>
                                        <?php $precio_final = 0; ?>
<!-- ###################################### foreach con informacion del calendario ################################# -->                                       
                                        <?php foreach ($info_hab['fechas'] as $key_fe => $info_fe): ?>
                                            <?php
                                            $array_f = explode('-', $info_fe['fecha']);
                                            $fecha_chica = $array_f[2] . "/" . $array_f[1];
                                            ?>
                                            <td style="border: 1px #ccc solid;"><span><?php echo $fecha_chica ?></span></td>     
                                        <?php endforeach; ?>
                                         
                                        <td>
                                            <b>Cant. Hab.</b>
                                        </td>
                                        <td>
                                            <b>Precio</b>
                                        </td>
                                    </tr>
                                    <tr>
                                            <?php foreach ($info_hab['fechas'] as $key_fe => $info_fe): ?>
                                            <?php
                                            
                                            
                                            if ($info_fe['tarifa_oferta'] > 0) {
                                                $precio_final = $info_fe['tarifa_oferta'] + $precio_final;
                                                $precio = $info_fe['tarifa_oferta'];
                                                $style = "background-color: #C6E746";
                                            } else {
                                                $precio_final = $info_fe['tarifa_normal'] + $precio_final;
                                                $precio = $info_fe['tarifa_normal'];
                                                $style = "background-color: #FFF";
                                            }
                                            $min_dispo = $info_fe['min_disponible'];
                                           
                                            ?>


                                            <td  style="border: 1px #ccc solid; <?php echo $style ?>">
                                                <span><?php echo $precio ?></span>
                                            </td>
                                        <?php endforeach; ?> 
                                        <td>
                                            <select id="option_<?php echo $info_hab['id_habitacion']  ?>" onchange="multiplicar_precio('<?php echo $info_hab['id_habitacion'] ?>','<?php echo $precio_final ?>')" name="cantidad_por_habitacion_<?php echo $count_habitaciones ?>" class="input-mini" type="text">
                                            <?php for ($i = 0; $i <= $min_dispo; $i++): ?>
                                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                            <?php endfor; ?>
                                            </select>
                                        </td>
                                        <td>
                                            <?php 
                                            
                                            ?>
                                            <b><label id="label_precio_<?php echo $info_hab['id_habitacion'] ?>"  ><?php echo $precio_final ?></label></b>
                                            <input type="text" value="<?php echo $precio_final ?>" name="precio_habitacion_<?php echo $count_habitaciones  ?>">
                                        </td>
                                    </tr>

                                </table>
                                
                            </div>
                             
                        </div>
                <?php endforeach; ?>
                <div class="offset9">
                    <input class="btn-primary btn-large btn" type="submit" value="Reservar">
                    <br>
                    <br>
                </div>
                
                </div>
                <input type="text" name="cant_habitaciones" value="<?php echo count($info_alo['habitacion']) ?>">
                <input type="text" name="id_alojamiento" value="<?php echo $info_alo['id_alojamiento']  ?>">
                <input type="text" name="checkin" value="<?php echo  $info_alo['fecha_desde']   ?>">
                <input type="text" name="checkout" value="<?php echo $info_alo['fecha_hasta']   ?>">
                <input type="text" name="cant_dias" value="<?php echo count($info_hab['fechas']) ?>"> 
            </form>

<?php endforeach; ?>
    </div>
</div>



<!-- ###################################### aparte ################################# -->


































<div class="row-fluid">
    <div class="span12">
        <h2>Habitaciones disponibles</h2>
        <hr>
<?php foreach ($alojamientos_array as $key_alo => $info_alo): ?>
            <div class="row-fluid" style="background-color: #00b3ee">
                <b>Nombre:&nbsp;</b><?php echo $info_alo['nombre'] ?><br>
                <b>Descripción:&nbsp;</b><?php echo $info_alo['descripcion'] ?><br>
                <b>Tipo:&nbsp;</b><?php echo $info_alo['tipoalojamiento'] ?><br>
                <b>Lugar:&nbsp;</b><?php echo $info_alo['pais'] . " > " . $info_alo['provincia'] . " > " . $info_alo['ciudad'] . " > " . $info_alo['localidad'] ?> <br>       
            <?php foreach ($info_alo['habitacion'] as $key_hab => $info_hab): ?>
                    <div class=" offset1 span10" style="background-color: #2b81af">
                        <b>Habitación:&nbsp;</b><?php echo $info_hab['nombrehab'] ?><br>
                        <b>Calendario:</b><br>
                        <div style="background-color: #57a957" class="offset1 span8">
                    <?php
                    foreach ($info_hab['fechas'] as $key_fe => $info_fe):
                        //pasar fecha
                        $array_f = explode('-', $info_fe['fecha']);
                        $fecha_chica = $array_f[2] . "/" . $array_f[1];
                        //fijarse si es oferta o no

                        if ($info_fe['tarifa_oferta'] > 0)
                            $precio = $info_fe['tarifa_oferta'] . "*";
                        else
                            $precio = $info_fe['tarifa_normal'];

                        if ($info_fe['cant_disponible'] == '0') {
                            echo "[" . $fecha_chica . "($" . $precio . ")-<b>" . $info_fe['cant_disponible'] . "</b>]";
                        } else {
                            echo "[" . $fecha_chica . "($" . $precio . ")-" . $info_fe['cant_disponible'] . "]";
                        }

                        echo $info_fe['min_disponible'];
                        ?>

                            <?php endforeach; ?>
                        </div>
                    </div>
                        <?php endforeach; ?>
            </div>     
            <br>
                    <?php endforeach; ?>
    </div>
</div>

