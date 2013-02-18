<div class="span12">
    <ul class="nav nav-tabs" id="myTab">
        <li class="active"><a id="info" href="#home">Información Gral.</a></li>
        <li><a href="#profile" id="metodos">Métodos de Pago</a></li>
        <li><a href="#messages" id="imagenes">Imagenes</a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="home">
            <form class="form-horizontal" method="post" action="<?php echo base_url() ?>admin/alojamientos/save/">
                <div class="span6">
                    <h4>Información General</h4>
                    <hr>
                    <div class="control-group">
                        <label class="control-label" >Nombre:</label>
                        <div class="controls">
                            <input type="text" name="Nombre">
                        </div>
                        <br>
                        <label class="control-label" >Tipo Alojamiento:</label>
                        <div class="controls">
                            <select name="ID_TipoAlojamiento">
                                <?php foreach ($tipoalojamientos_array as $var): ?>
                                    <option value="<?php echo $var['ID_TipoAlojamientos'] ?>" ><?php echo $var['TipoAlojamiento'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <br>
                        <label class="control-label" >Categoría:</label>
                        <div class="controls">
                            <select name="ID_Categorias">
                                <?php foreach ($categorias_array as $var): ?>
                                    <option value="<?php echo $var['ID_Categorias'] ?>" ><?php echo $var['Categoria'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <br>
                        <label class="control-label" >Dirección:</label>
                        <div class="controls">
                            <input type="text" name="Direccion">
                        </div>
                        <br>
                        <label class="control-label">Teléfono:</label>
                        <div class="controls">
                            <input type="text" name="Telefono">
                        </div>
                        <br>
                        <label class="control-label" >Email:</label>
                        <div class="controls">
                            <input type="text" name="Email">
                        </div>
                        <br>
                        <label class="control-label" >Responsable:</label>
                        <div class="controls">
                            <input type="text" name="Responsable">
                        </div>
                        <br>
                        <label class="control-label" >Descripción:</label>
                        <div class="controls">
                            <textarea rows="3" name="Descripcion"></textarea>
                        </div>
                        <br>
                        <label class="control-label" >Coordenadas:</label>
                        <div class="controls">
                            <input type="text" name="Coordenadas">
                        </div>
                        <br>
                        <label class="control-label" >País:</label>
                        <div class="controls">
                            <select name="Pais" id="pais" onchange="llenar('provincia')">
                                <?php foreach ($paises_array as $var): ?>
                                    <option value="<?php echo $var['CountryCode'] ?>"><?php echo $var['CountryName'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <br>
                        <label class="control-label" >Provincia:</label>
                        <div class="controls">
                            <select name="Provincia" id="provincia" onchange="llenar('ciudad')">
                                <option selected="selected" value="MZA">Mendoza</option>
                            </select>
                        </div>
                        <br>
                        <label class="control-label" >Ciudad:</label>
                        <div class="controls">
                            <select name="Ciudad" id="ciudad" onchange="llenar('localidad')">
                                <option selected="selected" value="AFA">San Rafael</option>
                            </select>
                        </div>
                        <br>
                        <label class="control-label" >Localidad:</label>
                        <div class="controls">
                            <select name="Localidad" id="localidad">
                                <option selected="selected" value="1">Valle Grande</option>
                            </select>
                        </div>
                        <br>
                        <label class="control-label" >Restaurant:</label>
                        <div class="controls">
                            <select name="Restaurant">
                                <option value="si" selected="selected">Si</option>
                                <option value="no" selected="selected">No</option>
                            </select>
                        </div>
                        <br>
                        <label class="control-label" >Información Restaurant:</label>
                        <div class="controls">
                            <textarea rows="3" name="InformacionRestaurant"></textarea>
                        </div>
                        <br>
                        <label class="control-label" >Checkin:</label>
                        <div class="controls">
                            <input type="text" name="Checkin">
                        </div>
                        <br>
                        <label class="control-label" >Checkout:</label>
                        <div class="controls">
                            <input type="text" name="Checkout">
                        </div>
                        <br>
                        <label class="control-label" >Politica de Cancelación:</label>
                        <div class="controls">
                            <textarea rows="3" name="PoliticaCancelacion"></textarea>
                        </div>
                        <br>
                        <label class="control-label" >Días Política:</label>
                        <div class="controls">
                            <textarea rows="3" name="DiasPolitica"></textarea>
                        </div>
                        <br>
                    </div>
                </div>
            </form>
        </div>
        <div class="tab-pane" id="profile">
            <form class="form-horizontal" method="post" action="<?php echo base_url() ?>admin/alojamientos/save/">
                <h4>Métodos de Pago</h4>
                <hr>
                <div class="control-group">
                    <label class="control-label" >Checkin:</label>
                    <div class="controls">
                        <input type="text" name="Checkin">
                    </div>
                    <br>
                    <label class="control-label" >Checkout:</label>
                    <div class="controls">
                        <input type="text" name="Checkout">
                    </div>
                    <br>
                    <label class="control-label" >Politica de Cancelación:</label>
                    <div class="controls">
                        <textarea rows="3" name="PoliticaCancelacion"></textarea>
                    </div>
                    <br>
                    <label class="control-label" >Días Política:</label>
                    <div class="controls">
                        <textarea rows="3" name="DiasPolitica"></textarea>
                    </div>
                    <br>
                    <label class="control-label" >Seña:</label>
                    <div class="controls">
                        <input type="text" name="Senia">
                    </div>
                    <br>
                    <label class="control-label" >Garantía Debooking:</label>
                    <div class="controls">
                        <input type="text" name="GarantiaDebooking">
                    </div>
                    <br>
                    <label class="control-label">Anticipado:</label>
                    <div class="controls">
                        <input type="text" name="Anticipado">
                    </div>
                    <br>
                    <label class="control-label" >Comisión Seña:</label>
                    <div class="controls">
                        <input type="text" name="ComisionSenia">
                    </div>
                    <br>
                    <label class="control-label" >Acepta Seña:</label>
                    <div class="controls">
                        <input type="text" name="AceptaSenia">
                    </div>
                    <br>
                    <label class="control-label" >Comisión:</label>
                    <div class="controls">
                        <input type="text" name="Comision">
                    </div>
                    <br>
                    <label class="control-label" >Mejor Precio:</label>
                    <div class="controls">
                        <select name="MejorPrecio">
                            <option value="si" selected="selected">Si</option>
                            <option value="no" selected="selected">No</option>
                        </select>
                    </div>
                    <br>
                </div>
                <div class="clear"></div>
                <div class="offset6"><button class="btn btn-large btn-primary" type="submit" class="btn">Guardar</button></div>
            </form>
        </div>
    </div>
</div>
<div class="tab-pane" id="messages">mensajes</div>
<div class="tab-pane" id="settings">setting</div>
</div>
</div>
