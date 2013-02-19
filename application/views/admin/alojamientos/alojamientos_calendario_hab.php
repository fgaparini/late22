<div class="row-fluid">
    <div class="row-fluid">
        <h2><?php echo $nombre_alojamiento->Nombre ?> </h2>
        <hr>
    </div>
</div> 

<?php $id_habitacion=$_GET['id_habitacion']; 

echo "<script>
    var id_habitacion = ".$id_habitacion.";
</script>"
?>



<div class="row-fluid">

    <div class="span12">
        <div class="row-fluid">
            <div class="span7">
                <h3>Agregar Disponibilidad</h3>
            </div>
            <div class="span3">
                <a href="<?php echo base_url()."admin/alojamientos/form_view/".$nombre_alojamiento->ID_Alojamiento."/?pestania=habitaciones" ?>" class="btn btn-large btn-primary"> << Volver </a>
            </div>
            <br>
        </div>
        <div class="row-fluid">
            <?php
            //Encabezado calendario
            include("application/views/admin/calendario/conexion.inc");
            include("application/views/admin/calendario/lecparam.inc");
            include("application/views/admin/calendario/fungen.inc");
            include("application/views/admin/calendario/actualiz.inc");
            include("application/views/admin/calendario/caldacab.inc");

            //Contenido
            include("application/views/admin/calendario/calini.inc");
            include("application/views/admin/calendario/calfilt.inc");
            include("application/views/admin/calendario/caldesdi.inc");
            include("application/views/admin/calendario/caldias.inc");
            include("application/views/admin/calendario/calcant.inc");
            include("application/views/admin/calendario/caltari.inc");
            include("application/views/admin/calendario/calesmi.inc");
            include("application/views/admin/calendario/calbloq.inc");
            include("application/views/admin/calendario/calactu.inc");
            include("application/views/admin/calendario/calbotac.inc");
            include("application/views/admin/calendario/calfin.inc");
            ?>
        </div>
    </div>
</div>















