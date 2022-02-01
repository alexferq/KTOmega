<?= $header?>
<?= $menu?>

<div style="height: 100vh;" class="container-fluid">
    <div class="row">
        <br><br>
        <!-- Código para mostrar mensajes -->
        <?php 
                    echo mostrarMensajesDirecciones($mensajeAccion);
                ?>
        <div style="padding-top: 3%;" class="offset-md-1 col-md-5">
                <center><h3><?= $titulo?></h3></center>
                <br><br>

<form action="http://localhost/KTOmega/ejercicio1/cargarDatosDireccion/<?= $id ?>" method="post" id="formularioDireID" accept-charset="utf-8"> 

<?php
    // Creación de arreglos para definir caracteristicas de inputs
     $identificacion = array(
        'name' => 'identificacion',
        'type' => 'text',
        'placeholder' => 'Escriba su identificación',
        'class' => 'form-control inputCliente',
        'id' => 'idIdentificacion',
        'value' => $cliente->result()[0]->identificador,
        'readonly' => 'true'
    );

    $nombre = array(
        'name' => 'nombre',
        'type' => 'text',
        'placeholder' => 'Escribe su nombre',
        'class' => 'form-control inputCliente',
        'id' => 'idnombre',
        'value' => $cliente->result()[0]->nombre,
        'readonly' => 'true' 
    );

    $direccion = array(
        'name' => 'direccion',
        'type' => 'text',
        'placeholder' => 'Escriba su dirección',
        'class' => 'form-control inputCliente',
        'id' => 'idDireccion',
        'value' => $cliente->result()[0]->direccion,
        'readonly' => 'true' 
    );

    $contacto = array(
        'name' => 'contacto',
        'type' => 'text',
        'placeholder' => 'Escriba su contacto',
        'class' => 'form-control inputCliente',
        'id' => 'idContacto',
        'value' => $cliente->result()[0]->contacto,
        'readonly' => 'true' 
    );

    $telefono = array(
        'name' => 'telefono',
        'type' => 'text',
        'placeholder' => 'Escriba su teléfono',
        'class' => 'form-control inputCliente',
        'id' => 'idTelefono',
        'value' => $cliente->result()[0]->telefono,
        'readonly' => 'true' 
    );

?>
//aqui
        <div class="col-md-12 formularioDatos">
                 <!-- Primer parametro palabra que se muestra en la etiqueta
                    Segundo parametro, es el nombre del control al que pertenece -->
                <?= form_label('Identificación:','identificacion')?>
                <?= form_input($identificacion) ?>
        </div>

        <div class="col-md-12 formularioDatos">
                <?= form_label('Nombre:','nombre')?>
                <?= form_input($nombre) ?>
        </div>

        <div class="col-md-12 formularioDatos">
                
                <?= form_label('Dirección:','direccion')?>
                <?= form_input($direccion) ?>
        </div>

        <div class="col-md-12 formularioDatos">
                <?= form_label('Contacto:','contacto')?>
                <?= form_input($contacto) ?>
        </div>

        <div class="col-md-12 formularioDatos">
                <?= form_label('Teléfono:','telefono') ?>
                <?= form_input($telefono) ?>
        </div>

        <div class="col-md-12 formularioDatos">
            <a class="btn btn-warning btn-lg" href="<?= base_url()?>ejercicio1"><span style="color: white;">Atras</span></a>
        </div>        

        </div>

         <div style="padding-top: 3%;" class="col-md-5">
                <center><h3>Direcciones adicionales</h3></center>
                <br><br>

                <div class="Datos">
                    <table style="width: 100%;">
                    <tr>
                        <th style="text-align: center;">Dirección</th>
                        <th style="text-align: center;">Acciones</th>
                    </tr>
            
                    <!-- If para evaluar si existen datos en la BD -->
                    <?php if($direcciones){
                    foreach ($direcciones->result() as $direccion) {?>
                    <tr style="width: 30%;">
                        <td style="text-align: center;width: 60%;"> <input class="input-lg" style="width: 100%;" name="direccion" value="<?= $direccion->direccion?>" type="text"></td>
                        <td style="text-align: center;width: 40%;">
                            <a class="btn btn-success" type="button" style="margin-right: 3%;" onclick="mostrarFormulario(2,<?= $direccion->idDireccion?>,'<?= $direccion->direccion?>')">Editar</a> 
                            <a class="btn btn-danger" href="<?= base_url()?>eliminardireccion/<?= $direccion->idDireccion?>/<?= $id ?>">Eliminar</a>
                        </td>
                    </tr>

                     <!-- Si no existen muestra la tabla en blanco -->
                    <?php  }  
                         }else{
                    ?>

                    <tr style="width: 30%;">
                        <td style="text-align: center;width: 60%;"></td>
                        <td style="text-align: center;width: 40%;"></td>
                    </tr>

                    <?php  } ?>
                    <!-- Fin del else -->
                </table>

                <br><br>
               <center><button id="botonMostrarFormulario" type="button" onclick="mostrarFormulario(1,0,'')" class="btn btn-info" href="">Agregar Nuevo</button></center>

               <div  id="editarGuardarDire">
                    <div class="col-md-12 formularioDatos">
                        <label for="">Dirección</label>
                        <input id="direccionAdicionalID" type="text" name="direccionAdicional" placeholder='Escriba la dirección' class='form-control inputCliente'>
                        <input id="direcID" type="hidden" name="direcIDName"  class='form-control inputCliente'>
                        <input id="accionID" type="hidden" name="accion"  class='form-control inputCliente'>
                        <br>
                        <button class="btn btn-primary" type="submit" name="btnSubmit" id="btnSubmitID">Guardar</button>
                        <button class="btn btn-warning" type="button" onclick="cancelar()">Cancelar</button>
                    </div>
               </div>
               <br><br>
               <!-- Div donde se mostrara el mensaje de error de validación -->
               <div id="CodigoMensajeAlertaDireID">

               </div>
        </div>
        </div>

        </form> 
    </div>
</div>

<script>
    //función para mostrar formulario y desplegar información si es editar
   function mostrarFormulario(opcion, id, direccion){
    document.getElementById('accionID').value = opcion;
    document.getElementById('botonMostrarFormulario').style.display = 'none';
    document.getElementById('editarGuardarDire').style.display = 'block';
       if(opcion == 2){
        document.getElementById('direcID').value = id;
        document.getElementById('direccionAdicionalID').value = direccion;
       }
       
   }

   //función cancelar, limpia campos
   function cancelar(){
    document.getElementById('accionID').value = '';
    document.getElementById('botonMostrarFormulario').style.display = 'block';
    document.getElementById('editarGuardarDire').style.display = 'none';
    document.getElementById('direcID').value = '';
    document.getElementById('direccionAdicionalID').value = '';
   }

   //funcion para agregar evento al submit
   document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("formularioDireID").addEventListener('submit', validarFormularioDire); 
    });


    //función de validación de campos
    function validarFormularioDire(evento) {
        evento.preventDefault();
        var direccionAdicionalID = document.getElementById('direccionAdicionalID').value;

        if(direccionAdicionalID == undefined || direccionAdicionalID.length == 0 || direccionAdicionalID.length == '') {
            crearAlertaDire('El campo direccion adicional es requerido');
            return;
        }
        
        this.submit();
    }


    //Función para crear mensaje de alerta
    function crearAlertaDire(mensaje){
        var alerta = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <center><h6> <strong>Mensaje!!!</strong></h6></center>
                    <center><span style="font-weight: bold;">${mensaje}.</span></center>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>`;

        const data = document.getElementById("CodigoMensajeAlertaDireID");
        data.innerHTML = alerta;
    }
</script>
<?= $footer?>