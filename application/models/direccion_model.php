<?php
if(! defined('BASEPATH'))  exit('No direct script access allowed');
class Direccion_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //Método para crear una nueva dirección
    public function crearDireccion($data){
        $this->db->insert('direcciones',array('idCliente'=>$data['idCliente'],'direccion'=>$data['direccion']));
    }


    //Método para obtener toda la lista de direcciones activas de un cliente
    public function obtenerDirecciones($id){
        $query = "select * from direcciones where estado = 1 and idCliente = $id";
        $list = $this->db->query($query);
        if($list->num_rows() > 0) return $list;
        else return false;
    }


    //Método para obtener toda la lista de direcciones activas e inactivas de un cliente
    public function obtenerDireccionesTodas($id){
        $query = "select * from direcciones where idCliente = $id";
        $list = $this->db->query($query);
        if($list->num_rows() > 0) return $list;
        else return false;
    }


    //Método para actualizar info de una dirección en específico
    public function actualizarDireccion($data){
        $direccion = $data['direccion'];
        $idDireccion = $data['id'];
        $query = "update direcciones set direccion = '$direccion' where idDireccion = $idDireccion";
        $this->db->query($query);
    }


     //Método para eliminar dirección específico
     public function eliminarDireccion($id){
        $query = "update direcciones set estado = 0 where idDireccion = $id";
        $this->db->query($query);
    }

}

?>