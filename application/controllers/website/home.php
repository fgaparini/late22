<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("website/dbhome");
	}

	public function index()
	{
//TABS ALOJAMIENTOS
		$data['row1']=$this->dbhome->homeC("1","0","6");
		$data['row2']=$this->dbhome->homeC("2","0","6");
		$data['row3']=$this->dbhome->homeC("3","0","6");
//TABS EXCURSIONES
		$query2= "Select Empresa,ID_Empresa, Descripcion, Url  FROM empresas 
		ORDER BY RAND() LIMIT 0, 6 ";
		$rows4=$this->db->query($query2);
		$rows4 =$rows4->result_array();
		
//DESTACAMOS PAGINAS 
		$query3= "Select *  FROM paginas p, tipopagina t Where p.ID_TipoPagina=t.ID_TipoPagina ORDER BY ID_Pagina DESC LIMIT 0, 4 ";
		$rows5=$this->db->query($query3);
		$rows_p =$rows5->result_array();
		$data['row_p']=$rows_p;


//PASAR DATOS	
		$data['row4']=$rows4;
		$data['body']="website/body_home";
		$data['title']="Turismo San Rafael Mendoza | San Rafael Late | !";
		$data['descripcion']="HOLA LOCOS";
		$this->load->view('templates/website/template_home', $data);

	}





}

/* End of file home.php */
/* Location: ./application/controllers/home.php */