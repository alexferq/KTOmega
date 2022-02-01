<?= $header?>
<?= $menu?>

<div style="height: 100vh;" class="container-fluid">
    <div class="row">
        <div style="padding-top: 3%;" class="offset-md-2 col-md-8">
                <center><h3><?= $titulo?></h3></center>
                <br><br>

                <!-- Div donde se mostrara el mensaje de error de validación -->
                <div id="CodigoMensajeAlertaID">

                </div>
         
                <!-- Inicio de formulario de manera manual -->
<form action="http://localhost/KTOmega/ejercicio1/actualizardatos/<?= $id ?>" method="post" id="formularioID" accept-charset="utf-8"> 
<?php

    // Creación de arreglos para definir caracteristicas de inputs
     $identificacion = array(
        'name' => 'identificacion',
        'type' => 'text',
        'placeholder' => 'Escriba su identificación',
        'class' => 'form-control inputCliente',
        'id' => 'idIdentificacion',
        'value' => form_error("identificacion") !=false ? set_value("identificacion") : $cliente->result()[0]->identificador
        
    );

    $nombre = array(
        'name' => 'nombre',
        'type' => 'text',
        'placeholder' => 'Escribe su nombre',
        'class' => 'form-control inputCliente',
        'id' => 'idnombre',
        'value' => form_error("nombre") !=false ? set_value("nombre") : $cliente->result()[0]->nombre 
    );

    $direccion = array(
        'name' => 'direccion',
        'type' => 'text',
        'placeholder' => 'Escriba su dirección',
        'class' => 'form-control inputCliente',
        'id' => 'idDireccion',
        'value' => form_error("direccion") !=false ? set_value("direccion") : $cliente->result()[0]->direccion 
    );

    $contacto = array(
        'name' => 'contacto',
        'type' => 'text',
        'placeholder' => 'Escriba su contacto',
        'class' => 'form-control inputCliente',
        'id' => 'idContacto',
        'value' => form_error("contacto") !=false ? set_value("contacto") :  $cliente->result()[0]->contacto 
    );

    $telefono = array(
        'name' => 'telefono',
        'type' => 'text',
        'placeholder' => 'Escriba su teléfono',
        'class' => 'form-control inputCliente',
        'id' => 'idTelefono',
        'value' => form_error("telefono") !=false ? set_value("telefono") : $cliente->result()[0]->telefono 
    );


?>

<div class="container-fluid">
    <div style="padding-top: 3%;" class="row">
        
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
        <input type="submit" value="Editar Información" class='btn btn-primary btn-lg'>
        
    </form> 
    <!-- Fin de formulario -->

            <a class="btn btn-warning btn-lg" style="margin-left: 2%;" href="<?= base_url()?>ejercicio1"><span style="color: white;">Atras</span></a>
        </div>

    </div>
</div>
        </div>
    </div>
</div>


<script>

    //funcion para agregar evento al submit
    document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("formularioID").addEventListener('submit', validarFormulario); 
    });


    //función de validación de campos
    function validarFormulario(evento) {
        evento.preventDefault();
        var identificacion = document.getElementById('idIdentificacion').value;
        var nombre = document.getElementById('idnombre').value;
        var direccion = document.getElementById('idDireccion').value;
        var contacto = document.getElementById('idContacto').value;
        var telefono = document.getElementById('idTelefono').value;

        if(identificacion == undefined || identificacion.length == 0 || identificacion.length == '') {
            crearAlerta('El campo identificación es requerido');
            return;
        }
        if (nombre == undefined || nombre.length == 0 || nombre.length == '') {
            crearAlerta('El campo nombre es requerido');
            return;
        }
        if (direccion == undefined || direccion.length == 0 || direccion.length == '') {
            crearAlerta('El campo dirección es requerido');
            return;
        }
        if (contacto == undefined || contacto.length == 0 || contacto.length == '') {
            crearAlerta('El campo contacto es requerido');
            return;
        }
        if (telefono == undefined || telefono.length == 0 || telefono.length == '') {
            crearAlerta('El campo teléfono es requerido');
            return;
        }
        this.submit();
    }


    //Función para crear mensaje de alerta
    function crearAlerta(mensaje){
        var alerta = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <center><h6> <strong>Mensaje!!!</strong></h6></center>
                    <center><span style="font-weight: bold;">${mensaje}.</span></center>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>`;

        const data = document.getElementById("CodigoMensajeAlertaID");
        data.innerHTML = alerta;
    }
</script>

<?= $footer?>