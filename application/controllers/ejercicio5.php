<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ejercicio5 extends CI_Controller {

    function __construct(){
        parent::__construct();
    }

                                            
	// Carga de página principal lista clientes
	public function index(){
        $data = $this->inicioCarga('Ejercicio 5','Ejercicio 5'); 
        $this->load->view('ejercicio5/pruebalogica',$data);
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