<div class="row-fluid">
    <div class="span12">
        <h3>Habitaciones disponibles</h3>
        <?php $min_dispo = 5; ?>
        <?php foreach ($alojamientos_array as $key_alo => $info_alo): ?>
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
                <?php foreach ($info_alo['habitacion'] as $key_hab => $info_hab): ?>
                    <div class="row-fluid">
                        <div class="span11 offset1">
                            <b><?php echo $info_hab['nombrehab'] ?></b>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span11 offset1">
                            <table class="table">
                                <tr>
                                    <?php $precio_final=0; ?>
                                    <?php foreach ($info_hab['fechas'] as $key_fe => $info_fe): ?>
                                        <?php
                                        $array_f = explode('-', $info_fe['fecha']);
                                        $fecha_chica = $array_f[2] . "/" . $array_f[1];
                                        
                                        if($info_fe['tarifa_oferta']>0)
                                            $precio_final = $info_fe['tarifa_oferta'] + $precio_final;
                                        else
                                            $precio_final = $info_fe['tarifa_normal'] + $precio_final;
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
                                    <?php
                                    $style = "";
                                    if ($info_fe['tarifa_oferta'] > 0) {
                                        $precio = $info_fe['tarifa_oferta'];
                                        $style = "background-color: #C6E746";
                                    } 
                                    else 
                                    {
                                        $precio = $info_fe['tarifa_normal'];
                                        $style = "background-color: #FFF";
                                    }
                                    

                                    $min_dispo = $info_fe['min_disponible'];
                                    ?>
                                    <?php foreach ($info_hab['fechas'] as $key_fe => $info_fe): ?>
                                        <td  style="border: 1px #ccc solid; <?php echo $style ?>"><span><?php echo $precio ?></span></td>
                                    <?php endforeach; ?>
                                    <td>
                                         <select class="input-mini" type="text">
                                            <?php for ($i = 0; $i <= $min_dispo; $i++): ?>
                                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                            <?php endfor; ?>
                                         </select>
                                    </td>
                                    <td>
                                        <b><?php echo $precio_final ?></b>
                                    </td>
                                </tr>
                                
                            </table>
                        </div>

                    </div>
    <?php endforeach; ?>
            </div>

            <?php endforeach; ?>
    </div>
</div>
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

