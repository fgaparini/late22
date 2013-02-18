<div class="span12">
    <form class="form-horizontal" method="post" action="<?php echo base_url() ?>admin/paginas/save/">
        <div class="span12">
            <h4>Páginas Web</h4>
            <hr>
            <div class="control-group">
                <label class="control-label" >Url:</label>
                <div class="controls">
                    <input type="text" class="span10"  name="Url" value="<?php echo $Url ?>">
                </div>
                <br>
                <label class="control-label" >Meta Título:</label>
                <div class="controls">
                    <input type="text" class="span10"  name="MetaTitulo" value="<?php echo $MetaTitulo ?>">
                </div>
                <br>
                <label class="control-label" >Meta Descripción:</label>
                <div class="controls">
                    <input type="text" class="span10"  name="MetaDescripcion" value="<?php echo $MetaDescripcion ?>">
                </div>
                <br>
                <label class="control-label">Keywords:</label>
                <div class="controls">
                    <input type="text" class="span10"  name="Keywords" value="<?php echo $Keywords ?>">
                </div>
                <br>
                <label class="control-label" >Título Contenido:</label>
                <div class="controls">
                    <input type="text" class="span10"  name="TituloContenido" value="<?php echo $TituloContenido ?>">
                </div>
                <br>
                <label class="control-label" >Subtítulo:</label>
                <div class="controls">
                    <input type="text" class="span10"  name="Subtitulo" value="<?php echo $Subtitulo ?>">
                </div>
                <br>
                <label class="control-label" >Contenido:</label>
                <div class="controls">
                    <textarea class="ckeditor" rows="10" name="Contenido"><?php echo $Contenido ?></textarea>
                </div>
                <br>
                <label class="control-label" >Tipo página:</label>
                <div class="controls">
                    <select name="ID_TipoPagina">
                        <?php foreach ($tipo_paginas_array as $var): ?>
                            <option <?php echo $this->gf->comparar_general($var['ID_TipoPagina'],$ID_TipoPagina,"selected='selected'") ?> value="<?php echo $var['ID_TipoPagina'] ?>"><?php echo $var['TipoPagina'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <br>
                <div class="offset8"><button class="btn btn-large btn-primary" type="submit" >Guardar</button>&nbsp;&nbsp;<a class="btn btn-large btn-info" href="<?php echo base_url() . "admin/paginas/lists" ?>">Volver</a></div>
            </div>
        </div>
        <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
        <input type="hidden" name="accion" value="<?php echo $accion ?>">
        <input type="hidden" name="ID_Pagina" value="<?php echo $ID_Pagina ?>">
    </form>
</div>
