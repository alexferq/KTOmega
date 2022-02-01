<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ejercicio1 extends CI_Controller {

    function __construct(){
        parent::__construct();
    }

                                            
                                                // Métodos sobre clientes


	// Carga de página principal lista clientes
	public function index(){
        $data = $this->inicioCarga('Lista de Clientes','Lista de Clientes');
        $data['clientes'] = $this->ejercicio1_model->obtenerClientes();  
        $data['mensajeAccion'] = $this->uri->segment(2);
        if(!$data['mensajeAccion']){
            $data['mensajeAccion'] = 0;
        }
        $this->load->view('ejercicio1/clientes',$data);
    }
    

    // función para habilitar vista para crear nuevo cliente
    public function nuevo(){
        $data = $this->inicioCarga('Creación de nuevo cliente','Crear nuevo Cliente');
        $this->load->view('ejercicio1/nuevocliente',$data);
    }


    // función para recibir datos del modulo nuevo cliente
    public function capturardatos(){
        //Carga de datos provenientes del formulario
		$data = array(
            'identificacion'  => $this->input->post('identificacion'),
			'nombre' => $this->input->post('nombre'),
            'direccion' => $this->input->post('direccion'),
            'contacto' => $this->input->post('contacto'),
            'telefono' => $this->input->post('telefono')
        );
        
        //Validación de campos
        $this->form_validation->set_rules('identificacion', 'identificacion', 'required');
        $this->form_validation->set_rules('nombre', 'nombre', 'required');
        $this->form_validation->set_rules('direccion', 'direccion', 'required');
        $this->form_validation->set_rules('contacto', 'contacto', 'required');
        $this->form_validation->set_rules('telefono', 'telefono', 'required');

        //Si las validaciones son correctas, crea el cliente
        if ($this->form_validation->run()) {
            $this->ejercicio1_model->crearCliente($data);
            $data = $this->inicioCarga('Lista de Clientes','Lista de Clientes');
            //La acción 1 muestra creación correcta.
            $accion = 1; 
            redirect(base_url().'ejercicio1/'.$accion);
        }else{ //Si no muestra el error en pagina crear cliente
            $data = $this->inicioCarga('Creación de nuevo cliente','Crear nuevo Cliente');
            $this->load->view('ejercicio1/nuevocliente',$data);
        }
    }


    //función para habilitar vista de editar clientes
    public function editar(){
        $data = $this->inicioCarga('Edición de cliente','Edicion de Cliente');
        $data['id'] = $this->uri->segment(2);
        $data['cliente'] = $this->ejercicio1_model->obtenerCliente($data['id']);
        $this->load->view('ejercicio1/editarcliente',$data);	
    }


    // función para recibir datos del modulo editar cliente
    public function actualizardatos(){
        //Carga de datos provenientes del formulario
        $data = array(
            'identificacion'  => $this->input->post('identificacion'),
			'nombre' => $this->input->post('nombre'),
            'direccion' => $this->input->post('direccion'),
            'contacto' => $this->input->post('contacto'),
            'telefono' => $this->input->post('telefono')
        );
        
            $data['id'] = $this->uri->segment(3);
            $this->ejercicio1_model->actualizarCliente($data);
            $data = $this->inicioCarga('Lista de Clientes','Lista de Clientes','editar');
            //La acción 2 muestra edición correcta.
            $accion = 2; 
            redirect(base_url().'ejercicio1/'.$accion);
       
    }


    //función para habilitar vista de mostrar información de cliente
    public function infoCliente(){
        $data = $this->inicioCarga('Información de cliente','Informacion de cliente');
        $data['id'] = $this->uri->segment(2);
        $data['mensajeAccion'] = $this->uri->segment(3);
        $data['cliente'] = $this->ejercicio1_model->obtenerCliente($data['id']);
        $data['direcciones'] = $this->direccion_model->obtenerDirecciones($data['id']);
        $this->load->view('ejercicio1/cliente',$data);	
    }
    


    //función para eliminar un cliente en especifico
    public function eliminar(){
        //La acción 3 muestra eliminación correcta.
        $accion = 3;
        $id = $this->uri->segment(2);
        $this->ejercicio1_model->eliminarCliente($id);
        $data = $this->inicioCarga('Lista de Clientes','Lista de Clientes','eliminar');  
        redirect(base_url().'ejercicio1/'.$accion);
    }



    // función que precarga los datos requeridos para el header, el menu y el footer
    public function inicioCarga($titulo,$pagina){
        $data = datosInicio($titulo, $pagina);
        $data['header'] = $this->load->view('plantillas/header',$data,TRUE);
        $data['footer'] = $this->load->view('plantillas/footer',$data,TRUE);
        $data['menu'] = $this->load->view('plantillas/menu','',TRUE);
        return $data;
    }



                                     // Métodos sobre direcciones


       //función para eliminar una dirección de un cliente en especifico
    public function eliminarDireccion(){
        //La acción 3 muestra eliminación correcta.
        $accion = 3;
        $id = $this->uri->segment(2);
        $idCliente = $this->uri->segment(3);
        $this->direccion_model->eliminarDireccion($id); 
        redirect(base_url().'cliente/'.$idCliente. '/' .$accion);
    }



    public function cargarDatosDireccion(){

        //Determina si se tiene guardar o editar
        $metodo = $this->input->post('accion');
        //determina el idCliente
        $idCliente = $this->uri->segment(3);

         //Carga de datos provenientes del formulario
		$data = array(
            'direccion'  => $this->input->post('direccionAdicional'),
            'id' => $this->input->post('direcIDName'),
            'idCliente' => $idCliente
        );

        //La acción 2 muestra edición correcta y acción  muestra creación correcta.
        //Valida si tiene que guardar o editar
        if($metodo == 1){
            $this->direccion_model->crearDireccion($data);
            $accion = 1; 
        }else{
            $this->direccion_model->actualizarDireccion($data);
            $accion = 2; 
        }
                
        redirect(base_url().'cliente/'.$idCliente . '/' .$accion);
    }

}

?>