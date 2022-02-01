<?php
if(! defined('BASEPATH'))  exit('No direct script access allowed');
class Ejercicio1_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //Método para crear un nuevo cliente
    public function crearCliente($data){
        $this->db->insert('clientes',array('identificador'=>$data['identificacion'],'nombre'=>$data['nombre'],'direccion'=>$data['direccion'],'contacto '=>$data['contacto'],'telefono'=>$data['telefono']));
    }

    //Método para obtener toda la lista de clientes activos
    public function obtenerClientes(){
        $query = "select * from clientes where estado = 1";
        $list = $this->db->query($query);
        if($list->num_rows() > 0) return $list;
        else return false;
    }


      //Método para obtener toda la lista de clientes activos e inactivos
      public function obtenerClientesTodos(){
        $query = "select * from clientes";
        $list = $this->db->query($query);
        if($list->num_rows() > 0) return $list;
        else return false;
    }


    //Método para obtener cliente activos por id
    public function obtenerCliente($id){
        $query = "select * from clientes where estado = 1 and idCliente = $id";
        $cliente = $this->db->query($query);
        if($cliente->num_rows() > 0) return $cliente;
        else return false;
    }

    //Método para actualizar info de cliente específico
    public function actualizarCliente($data){
        $datos = array(
			'identificador' => $data['identificacion'],
            'nombre' => $data['nombre'],
            'direccion' => $data['direccion'],
            'contacto' => $data['contacto'],
            'telefono' => $data['telefono']
        );
        $this->db->where('idCliente ',$data['id']);
        $query = $this->db->update('clientes',$datos);
    }


    //Método para eliminar cliente específico
    public function eliminarCliente($id){
        $query = "update clientes set estado = 0 where idCliente = $id";
        $this->db->query($query);
    }

}

?>