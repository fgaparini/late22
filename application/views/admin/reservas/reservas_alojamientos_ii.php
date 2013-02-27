<div class="row-fluid">
    <div class="span12">
        <h3>Precio final reserva</h3>
        <hr>
        <div class="row-fluid">
            <div class="spa12">
                <button class="btn btn-large btn btn-warning disabled" type="button">Paso 1</button>
                <button class="btn btn-large btn btn btn-inverse" type="button">Paso 2</button>
                <button class="btn btn-large btn btn-warning disabled" type="button">Paso 3</button>
            </div>
        </div>
        <br>
        <div class="row-fluid">
            <div class="spa12">
                <b>Reserva Inmediata</b>
                <p>Verifique si son correctos los datos de estadia, y tarifas, selecione el metodo de pago para garantizar la reserva en cas de ser confirmada y complete formulario con sus datos personales y presione reservar, y su reserva quedara confirmada en el Acto! (forma Inmediata.)</p>
            </div>
        </div>
        <form method="post" action="<?php echo base_url() ?>admin/reservas/buscar_disponibilidad_iii/">
        <div class="row-fluid">
            <div class="span3">
                <div class="row-fluid">
                    <h4>Datos Alojamiento</h4>
                    <table class="table">
                        <tr>
                            <td>Nombre:</td>
                            <td><?php echo $nombre_alojamiento ?></td>
                        </tr>
                        <tr>
                            <td>Tipo:</td>
                            <td><?php echo $tipoalojamiento ?></td>
                        </tr>
                        <tr>
                            <td>Localidad:</td>
                            <td><?php echo $localidad ?></td>
                        </tr>
                        <tr>
                            <td>Dirección:</td>
                            <td><?php echo $direccion ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="span3">
                <div class="row-fluid">
                    <h4>Detalle reserva</h4>
                    <table class="table">
                        <tr>
                            <td>CheckIn:</td>
                            <td><?php echo $checkin ?></td>
                        </tr>
                        <tr>
                            <td>CheckOut:</td>
                            <td><?php echo $checkout ?></td>
                        </tr>
                        <tr>
                            <td>Cantidad noches:</td>
                            <td><?php echo $cantidad_dias ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="span6">
                <div class="row-fluid">
                    <h4>Detalle habitaciones y tarifas</h4>
                    <table class="table">
                        <tr>
                            <th>Habitacion</th>
                            <th>Cant.</th>
                            <th>Precio</th>
                            <th>Noches</th>
                            <th>Subtotal</th>
                        </tr>
                        <?php $total = 0 ?>
                        <?php for ($i = 1; $i <= $cantidad_habitaciones; $i++): ?>
                            <?php $subtotal = $cant_por_hab[$i] * $precio_hab[$i] ?>
                            <?php $total = $subtotal + $total ?>
                            <tr>
                                <td><?php echo $nombre_hab[$i] ?></td>
                                <td><?php echo $cant_por_hab[$i] ?></td>
                                <td><?php echo $precio_hab[$i] ?></td>
                                <td><?php echo $cantidad_dias ?></td>
                                <td>$<?php echo $subtotal ?></td>
                            </tr>
                        <?php endfor ?>
                        <tr>
                            <td>Total estadía </td>
                            <td><label id="total_estadia">$<?php echo $total ?></label></td>
                            <td>Descuento:</td>
                            <td><b>%</b> &nbsp;<input type="text" class="input-mini"  id="descuento" value="" name="descuento" /></td>
                            <td><button class="btn btn-small btn-primary"  onclick="aplicar_descuento()" type="button">Aplicar</button></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        
            <div class="row-fluid">
                <div class="span12">
                    <h4>Métodos de pago</h4>
                    <div class="row-fluid">
                        <?php if ($Anticipado): ?>
                            <div class="span4">
                                <label class="checkbox">
                                    <input onclick="js_metodo('anticipado')"  type="radio" name="metodo"  value="aticipado">
                                    Anticipado
                                </label>
                            </div>
                        <?php endif; ?>
                        <?php if ($AceptaSenia): ?>
                            <div class="span4">
                                <label class="checkbox">
                                    <input onclick="js_metodo('senia')" name="metodo" type="radio" value="senia">
                                    Seña
                                </label>
                            </div>
                        <?php endif ?>
                        <div class="span4">
                            <label class="checkbox">
                                <input onclick="js_metodo('garantia')" name="metodo" type="radio"  value="garantia">
                                Garantia targeta
                            </label>
                        </div>
                    </div>
                    <hr>
                </div>
                <div id="metod_div" style="display: none" class="row-fluid">
                    <h4>Pago</h4>
                    <div class="row-fluid">
                        <div class="offset1 span4">
                            <label><b>Total a pagar:</b></label><label id="total_pagar"></label>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="offset1 span4">
                            <label><b>Metodo de pago:</b></label>
                            <select name="metodo_pago">
                                <option value="banco">Banco (depósito, transferencia)</option>
                                <option value="tarjeta">Targeta online</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div id="garantia_div" style="display: none" class="row-fluid">
                    <div class="span4">
                        <div class="row-fluid">
                            <div class="control-group">
                                <label class="control-label" >Tipo tarjeta</label>
                                <div class="controls">
                                    <select name="tarjeta_tipo" >
                                        <option value="visa">Visa</option>
                                        <option value="american">American Express</option>
                                        <option value="master">Masterd CARD</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="control-group">
                                <label class="control-label" >Titular tarjeta</label>
                                <div class="controls">
                                    <input id="tarjeta_titular" name="tarjeta_titular" type="text" >
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="control-group">
                                <label class="control-label" >N° Tarjeta</label>
                                <div class="controls">
                                    <input id="tarjeta_numero" name="tarjeta_numero" type="text" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="row-fluid">
                            <div class="control-group">
                                <label class="control-label" >Fecha vencimiento</label>
                                <div class="controls">
                                    <input id="tarjeta_vencimiento" name="tarjeta_vencimiento" type="text" >
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="control-group">
                                <label class="control-label" >Código seguridad</label>
                                <div class="controls">
                                    <input id="tarjeta_codigo" name="tarjeta_codigo" type="text" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <h4>Datos personales</h4>
                    <div class="row-fluid">
                        <p>Rellena el siguiente formulario con tus datos, estos seran utilizados para realizar la reserva. </p>
                    </div>
                    <div class="row-fluid">
                        <div class="span4">
                            <div class="control-group">
                                <label class="control-label">Nombre</label>
                                <div class="controls">
                                    <input name="huesped_nombre" type="text" >
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Correo Electrónico(donde llega el vaucher)</label>
                                <div class="controls">
                                    <input name="huesped_correo" type="text" >
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Ciudad</label>
                                <div class="controls">
                                    <input name="huesped_ciudad" type="text" >
                                </div>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="control-group">
                                <label class="control-label">Apellido</label>
                                <div class="controls">
                                    <input name="huesped_apellido" type="text" >
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Telefono y/o celular (con código de area)</label>
                                <div class="controls">
                                    <input name="huesped_telefono" type="text" >
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Provincia</label>
                                <div class="controls">
                                    <input name="huesped_provincia" type="text" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="control-group">
                                <label class="control-label">Observaciones</label>
                                <div class="controls">
                                    <textarea name="hueped_observaciones" class="span7"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <h4>Verificar opciones de envio</h4>
                <div class="spa12">
                    <label class="checkbox">
                        <input name="envio_huesped" type="checkbox" value="1">
                        Enviar email Huesped 
                    </label>
                    <label class="checkbox">
                        <input name="envio_alojamiento" type="checkbox" value="1">
                        Enviar email Alojamiento
                    </label>
                </div>
            </div>
            <div class="row-fluid">
                <div class="offset10 span2">
                    <input value="Siguiente>>" class="btn btn-large btn-primary" type="submit">
                </div>
            </div>
            <input type="hidden" name="senia_total" id="total_senia" value="<?php echo $senia_total ?>" >
            <input type="hidden" name="total" id="total" value="<?php echo $total ?>" >
            <input type="hidden" name="nombre_alojamiento" value="<?php echo $nombre_alojamiento ?>">
            <input type="hidden" name="tipo_alojamiento" value="<?php echo $tipoalojamiento ?>" >
            <input type="hidden" name="localidad" value="<?php echo $localidad ?>" >
            <input type="hidden" name="direccion" value="<?php echo  $direccion ?>">
            <input type="hidden" name="checkin" value="<?php echo  $checkin ?>">
            <input type="hidden" name="checkout" value="<?php echo $checkout  ?>">
            <input type="hidden" name="cantidad_habitaciones" value="<?php echo $cantidad_habitaciones?>">  
           <?php for($i=1 ; $i<=$cantidad_habitaciones ; $i++ ): ?>
            <input type="hidden" value="<?php echo $id_habitacion[$i] ?>" name="id_habitacion_<?php echo $i; ?>">
            <input type="hidden" value="<?php echo $cant_por_hab[$i] ?>" name="cant_por_hab_<?php echo $i; ?>">
            <input type="hidden" value="<?php echo $precio_hab[$i] ?>" name="precio_hab_<?php echo $i; ?>">
            <input type="hidden" value="<?php echo $nombre_hab[$i] ?>" name="nombre_hab_<?php echo $i; ?>">
           <?php endfor; ?>
        </form>
    </div>
</div>
