<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ejercicio3 extends CI_Controller {

    function __construct(){
        parent::__construct();
    }

                                            
	// Carga de página principal lista clientes
	public function index(){
        $data = $this->inicioCarga('Ejercicio 3','Ejercicio 3'); 
        $data['clientes'] = $this->creararreglo();
        $dataJson = $data['clientes'];
        $data['xmlDatos'] =  $this->crearxml($dataJson);
        $this->load->view('ejercicio3/respuestaxml',$data);        
        
    }


    //función que crea un arreglo con la información del cliente y las direcciones adicionales y la devuelve como un json
    public function creararreglo(){
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
    
 //método para formar xml
public function crearxml($arreglo){

    $doc = new DOMDocument('1.0');
    $doc->formatOutput = true;
 
    //Nodo clientes
    $raiz = $doc->createElement("clientes");
    $raiz = $doc->appendChild($raiz);

   
    //ciclo para extraer info de clientes
    foreach ($arreglo as $value) {

        //Nodo cliente
        $cliente = $doc->createElement('cliente');
        $cliente = $raiz->appendChild($cliente);

        //Nodo idCliente
        $idCliente = $doc->createElement('idCliente');
        $idCliente = $cliente->appendChild($idCliente);
        $textIdCliente = $doc->createTextNode($value['idCliente']);
        $textIdCliente = $idCliente->appendChild($textIdCliente);

        //Nodo identificador
        $identificador = $doc->createElement('identificador');
        $identificador = $cliente->appendChild($identificador);
        $textidentificador = $doc->createTextNode($value['identificador']);
        $textidentificador = $identificador->appendChild($textidentificador);

        //Nodo nombre
        $nombre = $doc->createElement('nombre');
        $nombre = $cliente->appendChild($nombre);
        $textnombre = $doc->createTextNode($value['nombre']);
        $textnombre = $nombre->appendChild($textnombre);

        //Nodo direccion
        $direccion = $doc->createElement('direccion');
        $direccion = $cliente->appendChild($direccion);
        $textdireccion = $doc->createTextNode($value['direccion']);
        $textdireccion = $direccion->appendChild($textdireccion);

        //Nodo contacto
        $contacto = $doc->createElement('contacto');
        $contacto = $cliente->appendChild($contacto);
        $textcontacto = $doc->createTextNode($value['contacto']);
        $textcontacto = $contacto->appendChild($textcontacto);

        //Nodo telefono
        $telefono = $doc->createElement('telefono');
        $telefono = $cliente->appendChild($telefono);
        $texttelefono = $doc->createTextNode($value['telefono']);
        $texttelefono = $telefono->appendChild($texttelefono);

        //Nodo idClestadoiente
        $estado = $doc->createElement('estado');
        $estado = $cliente->appendChild($estado);
        $textestado = $doc->createTextNode($value['estado']);
        $textestado = $estado->appendChild($textestado);

        //Nodo direccionesAdicionales
        $direccionesAdicionales = $doc->createElement('direccionesAdicionales');
        $direccionesAdicionales = $cliente->appendChild($direccionesAdicionales);
       
        //condicional para cuando un cliente tiene direcciones alternativas
        if(count($value['direccionesAdicionales']) > 0){

       //ciclo para extraer info de nodo direcciones adicionales
        foreach ($value['direccionesAdicionales'] as  $direc) {
            
            //Nodo direccionalternativa
            $direccionalternativa = $doc->createElement('direccionalternativa');
            $direccionalternativa = $direccionesAdicionales->appendChild($direccionalternativa);

            //Nodo idDireccion
            $idDireccion = $doc->createElement('idDireccion');
            $idDireccion = $direccionalternativa->appendChild($idDireccion);
            $textidDireccion = $doc->createTextNode($direc['idDireccion']);
            $textidDireccion = $idDireccion->appendChild($textidDireccion);

            //Nodo idCliente
            $idCliente = $doc->createElement('idCliente');
            $idCliente = $direccionalternativa->appendChild($idCliente);
            $textidCliente = $doc->createTextNode($direc['idCliente']);
            $textidCliente = $idCliente->appendChild($textidCliente);

            //Nodo direccionM
            $direccionM = $doc->createElement('direccionM');
            $direccionM = $direccionalternativa->appendChild($direccionM);
            $textdireccionM = $doc->createTextNode($direc['direccion']);
            $textdireccionM = $direccionM->appendChild($textdireccionM);

            //Nodo estadoD
            $estadoD = $doc->createElement('estadoD');
            $estadoD = $direccionalternativa->appendChild($estadoD);
            $textestadoD = $doc->createTextNode($direc['estado']);
            $textestadoD = $estadoD->appendChild($textestadoD);
        }
    }else{//condicional para cuando un cliente no tiene direcciones alternativas

        //Nodo direccionalternativa
        $direccionalternativa = $doc->createElement('direccionalternativa');
        $direccionalternativa = $direccionesAdicionales->appendChild($direccionalternativa);
    }  
   }
   
    //Retorna mensaje de creación exitosa con ubicación y tamaño de archivo xml
    return "Archivo clientes.xml creado exitosamente <br> en la ubicación C:\DescargasXML  -> tamaño : ". $doc->save("/DescargasXML/clientes.xml") . 'bytes <br><br>';
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