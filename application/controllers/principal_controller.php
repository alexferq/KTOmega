<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal_controller extends CI_Controller {

    function __construct(){
		parent::__construct();
    }

	
	public function index()
	{
     $data = $this->inicioCarga('Pagina Principal Prueba de Aplicación de Conocimientos','Prueba Tecnica Omega');
     $this->load->view('principal/principal',$data);
        	
  }
  

  //función para mostrar vista de acerca de 
  public function acercade()
	{
     $data = $this->inicioCarga('Acerca de','Acerca de'); 
     $this->load->view('acercade/acercade',$data);
        	
  }



    // función que precarga los datos requeridos para el header, el menu y el footer
    public function inicioCarga($titulo,$pagina){
      $data = datosInicio($titulo, $pagina);
      $data['header'] = $this->load->view('plantillas/header',$data,TRUE);
      $data['footer'] = $this->load->view('plantillas/footer',$data,TRUE);
      $data['menu'] = $this->load->view('plantillas/menu','',TRUE);
      return $data;
  }
  

}

?>