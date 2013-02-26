<?php
class Cal_fecha extends CI_Model
{
    function list_fechas_rango($inicio,$fin)
    {
        $query=sprintf("select * from cal_fecha where fecha>='%s' and fecha<='%s'",$inicio,$fin);
        $rows = $this->db->query($query);
        $rows = $rows->result_array();
        return $rows;
    }
            
}
?>
