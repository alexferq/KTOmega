<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ejercicio2 extends CI_Controller {

    function __construct(){
        parent::__construct();
    }

                                            

    // Carga de página principal lista clientes
    public function index(){
        $data = $this->inicioCarga('Ejercicio 2','Ejercicio 2'); 
        $data['clientes'] = $this->crearJson();
        $dataJson = json_encode($data['clientes']);
        $data['json'] = $dataJson;
        $this->load->view('ejercicio2/respuestajson',$data);
        echo "<script>console.log(" . json_encode($data['clientes']) . ");</script>";
        
    }


    //función que crea un arreglo con la información del cliente y las direcciones adicionales y la devuelve como un json
    public function crearJson(){
        $arreglo = array();
        $clientes = $this->ejercicio1_model->obtenerClientesTodos();
        foreach ($clientes->result() as $cliente) {
            $direcciones = $this->obtenerDirecciones($cliente->idCliente);
            
            $dato = array(
                'idCliente' => $cliente->idCliente,
                'identificador' => $cliente->identificador,
                'nombre' => $cliente->nombre,
                'direccion' => $cliente->direccion,
                'contacto' => $cliente->contacto,
                'telefono' => $cliente->telefono,
                'estado' => $cliente->estado,
                'direccionesAdicionales' => $direcciones
            );
            array_push($arreglo, $dato); 
        }
        return $arreglo; 
    }


   //función que devuelve un arreglo con todas las direcciones de un cliente
    public function obtenerDirecciones($id){
        $direcciones = $this->direccion_model->obtenerDireccionesTodas($id);
        $dirreArray = array();
        if($direcciones){
            foreach ($direcciones->result() as $direccion) {
                $var = array(
                    'idDireccion' => $direccion->idDireccion,
                    'idCliente' => $direccion->idCliente,
                    'direccion' => $direccion->direccion,
                    'estado' => $direccion->estado
                );
                array_push($dirreArray, $var); 
            }
        }
        return $dirreArray;
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