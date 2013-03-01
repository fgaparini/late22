
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="keywords" content="san rafael,">
        <meta name="author" content="">
    </head>
    <body>
        <div style='font-style:normal; font: Arial; font-weight: normal; font-size:10px'>
            <div style='font-style:normal;font-size: 12px; font-family: Arial '>
                <span style='font-style:normal; font: Arial;  '>
                    <p>---------- <span style='font-size:16px'>VOUCHER DE RESERVA DBHOTEL - RESERVA A CONFIRMAR </span> ---------------<br />
                        <br/>
                </span>
                <div style='width:575px; font-family:arial; font-size:12px; color:#666'>Estimados</b><strong> <?php echo $tipo_Hotel . " " . $nombre_Hotel . ", " . $responsable ?></strong>, <br>
                    <br />
                    Le informamos que se realizo una <strong>RESERVA PENDIENTE DE CONFIRMACION </strong>a su alojamiento atraves de nuestro Motor de Reservas <strong>DBHOTEL_V3</strong> en su web.<br>
                    <br>
                    La reserva <strong>RESERVA PENDIENTE DE CONFIRMACION </strong> es debido a que no cuenta con disponibilidad en DBHOTEL en caso de tener lugar  Ingrese a su panel de control  y  <strong>Confirme</strong>
                    <span style='font-style:normal; font: Arial;  '><strong> la reserva. <br>
                            <br>
                            En Caso contrario ingrese y haga la cancelacion de la misma.<br>
                        </strong><br/>
                        </b>
                    </span>    
                </div>
                <table width='575' border='0'>
                    <tr>
                        <td align='center'>
                            <span class=''>
                                <a href='http://debooking.com.ar/hoteleros.php'>
                                    <b style='font-size:14px'>Ingresar al Panel Control &gt;&gt;<br /></b>
                                </a>
                            </span>
                            <b style='font-size:12px'>(o  tambien escribiendo en el navegador http://debooking.net/hoteleros)
                            </b>
                        </td>
                    </tr>
                </table>
                <span ><br />
                    <b style='font-size:14px;'>Nº RESERVA: <?php echo $localizador ?></b><br />
                    <br />
                </span>
                <table width='575' border='1' cellpadding='0' cellspacing='0' style='border-color:#428FCE; font-size:12px'>
                    <tr>
                        <td width='571' height='' bgcolor=''><table width='100%' border='0'  style=' font-size:12px'>
                                <tr>
                                    <td width='234' height='' valign='top' bgcolor='' style='padding-left:10px;'><p class=''><span style='color:#5B8AB9;'><b>DATOS HUESPED </b></span><br />
                                            <br />
                                            <span style='color:#666666'>
                                                <b>Nombre</b>:<?php echo $nombre ?> <br />
                                                <br />
                                                <b>Apellido</b>:. <?php echo $apellido ?><br />
                                                <br />
                                                <b>Telefono</b>: <?php echo $telefono ?>
                                            </span>
                                        </p>
                                        <p class='style7'>
                                            <span style='color:#666666'>
                                                <strong>Email</strong>: <?php echo $email ?><br />
                                                <br />
                                                <b>Ciudad</b>: <?php echo $ciudad ?><br />
                                            </span>
                                            <span style='color:#666666'><br />
                                                <b>Provincia</b>: <?php echo $provincia ?><br />
                                                <span class='style5'>
                                                    <br />
                                                </span>
                                            </span>
                                        </p>
                                    </td>
                                    <td width='331' valign='top' bgcolor=''>
                                        <span class='style4'>
                                            <span class='style7'><span style='color:#5B8AB9'><b>DATOS DE LA ESTADIA</b></span><br />
                                                <span style='color:#666666'><br />
                                                    <b>Check In</b>: <?php echo $fecha1 ?><br />
                                                    <br />
                                                    <b>Check Out:</b> <?php echo $fecha2 ?><br />
                                                    <br />
                                                    <b>Cantidad de Dias de Estadia:</b><?php echo $cant_dias ?> <br />
                                                    <br />
                                                    <b>Cantidad de Pasajeros:</b><?php echo $cant_paxs ?><br />
                                                    <br />
                                                    <span style='color:#00C; font-size:14px'>
                                                        <strong>Total Estadia: <?php echo $total_estadia ?> </strong>
                                                    </span>
                                                    <br />
                                                    <br />
                                                    <strong>Forma de Pago Seleccionada :</strong> <?php echo $pago3 ?>
                                                </span>
                                            </span>
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <br />
                <br />
                <table width='575' border='1' cellpadding='0' cellspacing='0' style='border-color:#428FCE'>
                    <tr>
                        <td width='575' height='85' valign='top' bgcolor='#F0F0FF'>
                            <table width='100%' border='0' cellpadding='0' cellspacing='0'>
                                <tr>
                                    <td height='34' valign='top' bgcolor='#F1F5FA' style='padding-left:10px'>
                                        <span style='color:#5B8AB9;'>
                                            <b>
                                                <br />
                                                OBSERVACIONES DEL CLIENTE<br />
                                                <br />
                                            </b>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td height='34' align='left' valign='top' bgcolor='#F1F5FA'>
                                        <span style='font-size:11pt;color:#666666 ;padding-left:10px'>
                                            <?php echo $consulta ?>
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <br />
                <span class='style7'>
                    <span class='style5'>
                        <span class='style5'>
                            <br />
                            <span class='style4'>
                                <span class='style7'>
                                    <b>
                                    </b>
                                </span>
                            </span>
                        </span>
                    </span>
                </span>
                <table width='575' border='1' cellpadding='0' cellspacing='0' style='border-color:#428FCE;' >
                    <tr>
                        <td width='575' height='216' valign='top' bgcolor=''>
                            <table width='100%' border='0' cellpadding='0' cellspacing='0'>
                                <tr>
                                    <td height='34' valign='top' bgcolor='' style='padding-left:10px;'>
                                        <br />
                                        <span class='style5'>
                                            <span class='style7'>
                                                <span style='color:#5B8AB9;'>
                                                    <b>DETALLES HABITACION/CABAÑAS/DEPTOS Y COSTOS</b>
                                                    <br />
                                                </span>
                                            </span>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td height='170' valign='top' bgcolor='' style='padding-left:10px;font-size:12px'>
                                        <br />
                         <!-- foreach --><table>
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
                                                <td><b>%</b> &nbsp;</td>
                                                
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <br>
                <br />
                <div style='width:575px; font-family:arial; font-size:12px; color:#666'>
                    <p><span style='font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#009'><strong>Consultas o Sugerencias</strong></span><br />
                        Para cualquier tipo de consultas entre en su <strong><a href='http://debooking.com.ar/hoteleros'>Panel de Usuario</a></strong> <strong>DEBOOKING</strong> y vaya a la seccion Atencion a Clientes o comuniquese via email al <a href='mailto:hoteleros@debooking.com.ar?Subjet= Consulta DBHOTEL'>hotel@debooking.com.ar </a> o llamandonos a los telefonos (54) (0260) 4540127 (TELEFAX) de 9hs a 20hs o al (54) (0260) 154595557 de 9 a 20hs o por Skype a <strong>Debooking</strong> o A nuestro soporte online <a href='http://debooking.com.ar/soporte2 /'>http://debooking.net/soporte2/ </a></p>
                </div>
                <div style='width:575px' align='center'> 
                    <p>------------------------------------------------------      
                        <span style=' font-size: 16px; font: Arial; color: #FF0080 '>
                            <strong>DBHOTEL</strong>
                        </span> (Version 3 ) ----------------------------------------------------<br>
                        Motor de Reservas para  Webs de Alojamientos<br>
                        -----------------------------------------------------------------------------------------------------------------------------------------------<br />
                    </p> 
                </div> 

                <div style='width:575px;'>
                    <b>
                        <img src='http://debooking.com.ar/imagenes/debooking.jpg' width='174' height='57' />
                    </b>
                    <p>
                    <spam style=' font-size: 10px; font: Arial; color:#666 '>
                        <b>Plataforma de Comercializacion de Alojamientos</b>
                    </spam>
                    <spam style=' font-size: 10px; font: Arial;  '><br />
                        <strong>Producto de DESTINOS INTERACTIVOS</strong><br />
                        <b>Telefax</b>: 0260 - 4540127 (de 9 a 20 hs lunes a viernes)<br />
                        <b>Celulares:</b>0260 - 154595557( de 9 a 20 hs ).<br />
                        <strong>Oficinas Centrales  :</strong> Coronel Plaza 390<br />
                        <b>San Rafael &bull; Mendoza &bull; Argentina</b></spam>
                    <br />
                    <a href='http://www.debooking.net'>www.debooking.net </a><br />
                    <a href='http://www.destinosinteractivos.com'>www.destinosinteractivos.com</a><br />
                    </p>
                </div>
            </div>   
        </div>
    </body>