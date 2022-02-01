<?= $header?>
<?= $menu?>

<div style="height: 100vh;" class="container-fluid">
    <div class="row">
        <div style="padding-top: 3%;" class="offset-md-2 col-md-8">
                <center><h3><?= $titulo?></h3></center>
                <br><br>

                <?php if(validation_errors()){ ?>
                <div class="alert alert-danger" role="alert">
                         <?= validation_errors() ?>
                </div>
                <?php } ?>

                <?= form_open('/ejercicio1/capturardatos')?>
<?php

    // Creación de arreglos para definir caracteristicas de inputs
     $identificacion = array(
        'name' => 'identificacion',
        'type' => 'text',
        'placeholder' => 'Escriba su identificación',
        'class' => 'form-control inputCliente',
        'id' => 'idIdentificacion',
        'value' => set_value("identificacion")
    );

    $nombre = array(
        'name' => 'nombre',
        'type' => 'text',
        'placeholder' => 'Escribe su nombre',
        'class' => 'form-control inputCliente',
        'id' => 'idnombre',
        'value' => set_value("nombre")
    );

    $direccion = array(
        'name' => 'direccion',
        'type' => 'text',
        'placeholder' => 'Escriba su dirección',
        'class' => 'form-control inputCliente',
        'id' => 'idDireccion',
        'value' => set_value("direccion")
    );

    $contacto = array(
        'name' => 'contacto',
        'type' => 'text',
        'placeholder' => 'Escriba su contacto',
        'class' => 'form-control inputCliente',
        'id' => 'idContacto',
        'value' => set_value("contacto")
    );

    $telefono = array(
        'name' => 'telefono',
        'type' => 'text',
        'placeholder' => 'Escriba su teléfono',
        'class' => 'form-control inputCliente',
        'id' => 'idTelefono',
        'value' => set_value("telefono")
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
                <?= form_submit('','Agregar Cliente',"class='btn btn-primary btn-lg'")?>
            <?= form_close()?>

            <a class="btn btn-warning btn-lg" style="margin-left: 2%;" href="<?= base_url()?>ejercicio1"><span style="color: white;">Atras</span></a>
        </div>

    </div>
</div>
        </div>
    </div>
</div>

<?= $footer?>