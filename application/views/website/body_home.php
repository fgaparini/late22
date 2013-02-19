<!--
====================================
BEGUIN CONTENIDOS
====================================
-->

 <div id="contenedor2">
    <!-- BEGUIN IMAGENES -->
    <div id="imagen_fondo"><img src="<?php echo base_url() ?>top.jpg" alt="" ></div>
    <!-- end IMAGENES-->  

    <!-- BEGUIN CONT GRAL-->

    <div id="cont_gral">
        <!-- BEGUIN CONT PPAL-->
        <div id="cont_ppal" align="left">

            <!-- BEGUIN TABS--> 
            <div id="tabs">
                <ul>
                    <li><a href= "#tabs-1" >Hoteles</a></li>
                    <li><a href= "#tabs-2" >cabañas</a></li>
                    <li><a href= "#tabs-3" >chalets</a></li>
                    <li><a href= "#tabs-4" >Excuriones</a></li>
                </ul>
                <div id="tabs-1">
                    <div id="alojar_tabs">
                        <?php foreach ($row1 as $var): ?>
                                                    
                                <div>
                                    <img src="<?php echo base_url() . "upload/alojamientos/thumb/" . $var['ID_Alojamiento'] . "_1.jpg" ?>" alt="Hotel <?php echo ucwords($var['Nombre']); ?> San Rafael">
                                    <h2><?php echo ucwords($var['Nombre']); ?></h2>
                                    <p><?php echo substr($var['Descripcion'],0,100) ?> </p>
                                    <span class="button"><a href="<?php echo base_url().$var['Url'] ?>" title="Hotel <?php echo ucwords($var['Nombre']); ?>- San Rafael - Ver Ficha Informacion">+ INFO</a> </span>
                                </div>
                       
                          <?php endforeach ?>
                    </div>
                </div>
                <div id="tabs-2">
                    <div id="alojar_tabs">
                        
                    <?php foreach ($row2 as $var): ?>
                            
                      
                                <div>
                                    <img src="<?php echo base_url() . "upload/alojamientos/thumb/" . $var['ID_Alojamiento'] . "_1.jpg" ?>" alt="Cabañas <?php echo ucwords($var['Nombre']); ?> San Rafael">
                                    <h2><?php echo ucwords($var['Nombre']); ?></h2>
                                    <p><?php echo substr($var['Descripcion'],0,100) ?> </p>
                                    <span class="button"><a href="<?php echo base_url().$var['Url'] ?>" title="Cabañas <?php echo ucwords($var['Nombre']); ?>- San Rafael - Ver Ficha Informacion">+ INFO</a> </span>
                               </div>
                       
                          <?php endforeach ?>
                    </div>
                </div>
                <div id="tabs-3">
                    <div id="alojar_tabs">
                        <?php foreach ($row3 as $var): ?>
                          
                                <div>
                                    <img src="<?php echo base_url() . "upload/alojamientos/thumb/" . $var['ID_Alojamiento'] . "_1.jpg" ?>" alt="Chalet <?php echo ucwords($var['Nombre']); ?> San Rafael">
                                    <h2><?php echo ucwords($var['Nombre']); ?></h2>
                                    <p><?php echo substr($var['Descripcion'],0,100) ?> </p>
                                    <span class="button"><a href="<?php echo base_url().$var['Url'] ?>" title="Chalet <?php echo ucwords($var['Nombre']); ?>- San Rafael - Ver Ficha Informacion">+ INFO</a> </span>
                             
                                </div>
                     
                        <?php endforeach ?>

                    </div>
                </div>
                <div id="tabs-4">
                    <div id="alojar_tabs">
                    
                          <?php foreach ($row4 as $var): ?>
                          
                                <div>
                                    <img src="<?php echo base_url() . "upload/empresas/thumb/" . $var['ID_Empresa'] . "_1.jpg" ?>" alt="<?php echo ucwords($var['Empresa']); ?> - Excursiones">
                                    <h2><?php echo ucwords($var['Empresa']); ?></h2>
                                    <p><?php echo substr($var['Descripcion'],0, 100) ?> </p>
                                    <span class="button"><a href="<?php echo base_url() .$var['Url'] ; ?>" Title="<?php echo ucwords($var['Empresa']); ?> San Rafael - Ficha Información">+ INFO</a> </span>
                                </div>
                     
                        <?php endforeach ?>
                       
                       

                    </div>
                </div>
            </div>
            <!-- BEGUIN fin tabs-->

            <!-- BEGUIN DESTACADOS-->
            <div id="destacamos">
                <h2>Destacamos..</h2>
                       <?php foreach ($row_p as $var): ?>
                <div>

                    <div class="imag"><img src="<?php echo base_url() . "upload/paginas/thumb/" . $var['ID_Pagina'] . "_1p.jpg" ?>" alt=""> </div>
                    <h3><a href="<?php echo base_url() .$var['Url'] ; ?>" title="<?php echo ucwords($var['TituloContenido']); ?> - San Rafael - Ver Info completa"><?php echo ucwords($var['TituloContenido']); ?></a></h3>
                    <p><?php echo substr(strip_tags($var['Contenido']),0, 200) ?>... <a href="<?php echo base_url() .$var['Url'] ; ?>" title="<?php echo ucwords($var['TituloContenido']); ?> - San Rafael - Ver Info completa">Seguir Leyendo</a>
                </div>
                  <?php endforeach ?>
            </div>
            <!-- FIN  DESTACADOS-->

        </div>
        <!-- fin PPAL-->

        <!-- BEGUIN ADS-->
        <div id="cont_ads"><p></p><p></p><img src="<?php echo base_url() ?>imagenes/publi_p.jpg" alt=""></div>
        <!-- END ADS-->
    </div>
    <!-- FIN CONT GRAL-->
    <p></p><br>  </div>
<!-- END CONTENEDOR-->
