<div class="span12">
    <div class="row-fluid">
        <h2>Alojamientos</h2>
        <hr>
    </div>
    <div class="row-fluid">
        <form method="get" action="<?php echo base_url() ?>admin/alojamientos/lists/">
            <div class="span3">
                Buscar por:
            </div>
            <div class="span3">
                <select name="campo">
                    <option value="ninguno">ninguno</option>
                    <option value="Nombre">Nombre Alojamiento</option>
                    <option value="Localidad">Localidad Alojamiento</option>
                </select>
            </div>
            <div class="span3">
                <input type="text" name="valor" value="" />
            </div>
            <div class="span3">
                <input type="submit" value="filtrar" class="btn btn-success btn-primary" />
            </div>
        </form>
    </div>
    <div class="row-fluid">
        <form method="get" action="<?php echo base_url() ?>admin/alojamientos/lists/">
            <div class="span3">
                Filtrar por:
            </div>
            <div class="span3">
                <select name="valor" id="tipo_alojamiento" class="form1">
                    <option value="" selected ="selected">Todos</option>
                    <?php foreach ($tipoalojamientos_array as $var): ?>
                        <option value="<?php echo $var['ID_TipoAlojamientos'] ?>" ><?php echo $var['TipoAlojamiento'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="span3 offset3">
                <input type="submit" value="filtrar" class="btn btn-success btn-primary" />
            </div>
            <input type="hidden" name="campo" value="tipoalojamientos.ID_TipoAlojamientos">
        </form>
    </div> 
    <div class="row-fluid">
        <form method="get" action="<?php echo base_url() ?>admin/alojamientos/form">
            <input type="submit" class="btn btn-primary" value="Agregar Alojamiento" />
        </form>
    </div>     
   <table class="table">
        <tr>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Localidad</th>
            <th>Responsable</th>
            <th>Email</th>
            <th>Imagen</th>
            <th>Acción</th>
        </tr>
        <?php foreach ($alojamientos_array as $var): ?>
            <tr class="success" >
                <td><?php echo $var['Nombre'] ?></td>
                <td><?php echo $var['Telefono'] ?></td>
                <td><?php echo $var['Localidad'] ?></td>
                <td><?php echo $var['Responsable'] ?></td>
                <td><?php echo $var['Email'] ?></td>
                <td> <img width="100px" height="100px" src="<?php echo base_url()."upload/alojamientos/thumb/".$var['ID_Alojamiento']."_1.jpg" ?>" /></td>
                <td>
                    <a href="<?php echo base_url()."admin/alojamientos/form/".$var['ID_Alojamiento'] ?>"><i class="icon-edit"></i>
                    </a>&nbsp;&nbsp;<a href="<?php echo base_url()."admin/alojamientos/form_view/".$var['ID_Alojamiento'] ?>/?pestania=info">
                        <i class="icon-align-justify"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>     




    <table>
        <tr><td><?php echo $this->pagination->create_links(); ?></td></tr>
    </table>
</div>
