<?php 

/**
* 
*/
class Dbhome extends CI_Model
{
	

function homeC ($Tipoalojar, $star, $end) {
$query= sprintf("Select i.Nombre, i.Descripcion,a.Url, a.ID_Alojamiento  FROM alojamientos a, informaciongeneral i 
WHERE i.ID_InformacionGeneral=a.ID_InformacionGeneral AND a.ID_TipoAlojamiento=%s AND a.DestaHome='1'
LIMIT %s, %s ",$Tipoalojar, $star, $end	);
$rows=$this->db->query($query);
$rows =$rows->result_array();

return $rows;
}

}


 ?>