<?php

class Principal extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('upload');
    }

    function index()
    {
        $data['title']='Home | late.com';
        $data['css']=array('css/tid_base');
        $data['views']=array('includes/header','includes/sidebar','includes/body','includes/footer');
        
        //Generar consulta de sidebar
        $this->load->view('templates/general',$data);
    }
    
    
    
}


?>