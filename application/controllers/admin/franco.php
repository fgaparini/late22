<?php

class Franco extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    function prueba()
    {
//Hola planeta tierra
        $rows = $this->db->query('select * from alojamientos');
        $rows = $rows->result_array();
        $data['sql']=$rows;
        $data['views']=array('includes/header','franco','includes/footer');
        $this->load->view('templates/general',$data);
    }


}
?>
