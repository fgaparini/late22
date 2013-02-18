<form class="form-inline" method="post" action="<?php echo base_url() ?>admin/reservas/buscar_disponibilidad/">
    <div class="row-fluid">
        <div class="span12">
            <h2>Buscar Alojamiento</h2>
            <div class="row-fluid">
                <h4>Fechas</h4>
                <div class="row-fluid">
                    <div class="span3">
                        <input id="from" name="fecha_desde" type="text" placeholder="Desde" >
                    </div>
                    <div class="span3">
                        <input type="text" id="to" name="fecha_hasta" value="" placeholder="Hasta" />
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="row-fluid">
                    <h4>Cantidad Personas</h4>
                    <div class="row-fluid">
                        <div class="span3">
                            <select name="PaxMax">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <div class="row-fluid">
                <div class="span2">
                    <h4>Buscar por</h4>
                </div>
                <div class="span6">
                    <select name="campo" id="campo" onchange="mostrar_div()">
                        <option value="lugar" selected="selected">Lugar Alojamiento</option>
                        <option value="nombre">Nombre Alojamiento</option>
                    </select>
                </div>
            </div>
            <div id="nombre_alojamiento" style="display: none" class="row-fluid">
                <div class="span6 offset2">
                    <h4>Nombre Alojamiento</h4>
                    <div class="row-fluid">
                        <input type="text" name="nombre_alojamiento" id="alojamientos" value="" />
                    </div>
                </div>
            </div>
            <div id="lugar_alojamiento" class="row-fluid">
                <div class="span9 offset2">
                    <h4>Lugar Alojamiento</h4>
                    <div class="row-fluid">
                        <span class="span3">
                            <label class="input-large"><h5>País</h5></label>
                        </span>
                        <span class="span3">
                            <label class="input-large"><h5>Provincia</h5></label>
                        </span>
                        <span class="span3">
                            <label class="input-large"><h5>Ciudad</h5></label>
                        </span>
                        <span class="span3">
                            <label class="input-large"><h5>Localidad</h5></label>
                        </span>
                    </div>
                    <div class="row-fluid">
                        <div class="span3">
                            <select name="Pais" id="pais" onchange="llenar('provincia')">
                                <?php foreach ($paises_array as $var): ?>
                                    <option <?php echo $this->gf->comparar_general($var['CountryCode'], 'AR', 'selected="selected"') ?>  value="<?php echo $var['CountryCode'] ?>"><?php echo $var['CountryName'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="span3">
                            <select name="Provincia" id="provincia" onchange="llenar('ciudad')">
                                <option selected="selected" value="MZA">Mendoza</option>
                            </select>
                        </div>
                        <div class="span3">
                            <select name="Ciudad" id="ciudad" onchange="llenar('localidad')">
                                <option selected="selected" value="AFA">San Rafael</option>
                            </select>
                        </div>
                        <div class="span3">
                            <select name="Localidad" id="localidad">
                                <option selected="selected" value="1" >Valle Grande</option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="row-fluid">
                <div class="offset10">
                   <input type="submit" value="Buscar" class="btn btn-large btn-primary" /> 
                </div>
            </div>
            
            <input type="hidden" value="<?php echo base_url() ?>" id="base_url">
        </div>
        <br>
        <br>
        <br>
        <br>
    </div>

</form>

