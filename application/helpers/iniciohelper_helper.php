<?php
 
    //función para crear datos de inicio
    function datosInicio($titulo, $nombre){
        $data['annio'] = getdate()['year'];
        $data['titulo'] = $titulo;
        $data['nombrepagina'] = $nombre;
        return $data;
    }


    //funcion para escoger tipo de respuesta para mensaje en clientes
    function mostrarMensajes($codigoMensaje){
        switch ($codigoMensaje) {
            case 0:
                $respuesta = ''; 
              break;
            case 1:
                $respuesta = crearMensaje('Cliente Creado Correctamente.');
              break;
            case 2:
                $respuesta = crearMensaje('Cliente Editado Correctamente.');
              break;
            case 3:
                $respuesta = crearMensaje('Cliente Eliminado Correctamente.');
              break;
        }

        return $respuesta;
    }


    //funcion para escoger tipo de respuesta para mensaje en direcciones
    function mostrarMensajesDirecciones($codigoMensaje){
      switch ($codigoMensaje) {
          case 0:
              $respuesta = ''; 
            break;
          case 1:
              $respuesta = crearMensaje('Dirección Creada Correctamente.');
            break;
          case 2:
              $respuesta = crearMensaje('Dirección Editada Correctamente.');
            break;
          case 3:
              $respuesta = crearMensaje('Dirección Eliminada Correctamente.');
            break;
      }

      return $respuesta;
  }


    //función para crear alerta que se mostrara en vista
    function crearMensaje($mensaje){
        $respuesta = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                      <center><h6> <strong>Mensaje!!!</strong></h6></center>
                      <center><span style="font-weight: bold;">' .$mensaje .'</span></center>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        
        return $respuesta;
    }
?>