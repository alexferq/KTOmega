<?= $header?>
<?= $menu?>

<div style="min-height: 100vh;" class="container-fluid">
    <div class="row">
        <div style="padding-top: 3%;" class="offset-md-2 col-md-8">
                <center><h3><?= $titulo?></h3></center>
                <br><br><br>
                 
                <?php 
                    echo mostrarMensajes($mensajeAccion);
                ?>

                

            <div class="Datos">
                    <table style="width: 100%;">
                    <tr>
                        <th style="text-align: center;">Nombre</th>
                        <th style="text-align: center;">Identificación</th>
                        <th style="text-align: center;">Acciones</th>
                    </tr>
            
                    <!-- If para evaluar si existen datos en la BD -->
                    <?php if($clientes){
                    foreach ($clientes->result() as $cliente) {?>
                    <tr style="width: 30%;">
                        <td style="text-align: center;width: 40%;"><?= $cliente->nombre?></td>
                        <td style="text-align: center;width: 30%;"><?= $cliente->identificador ?></td>
                        <td style="text-align: center;width: 30%;">
                            <a class="btn btn-info" href="<?= base_url()?>cliente/<?= $cliente->idCliente?>/0">Ver</a>
                            <a class="btn btn-success" style="margin-left: 3%;" href="<?= base_url()?>editarcliente/<?= $cliente->idCliente?>">Editar</a>
                            <a class="btn btn-danger" style="margin-left: 3%;" href="<?= base_url()?>eliminarcliente/<?= $cliente->idCliente?>">Eliminar</a>
                        </td>
                    </tr>

                     <!-- Si no existen muestra la tabla en blanco -->
                    <?php  }  
                         }else{
                    ?>

                    <tr style="width: 30%;">
                        <td style="text-align: center;width: 40%;"></td>
                        <td style="text-align: center;width: 30%;"></td>
                        <td style="text-align: center;width: 30%;"></td>
                    </tr>

                    <?php  } ?>
                    <!-- Fin del else -->
                </table>

                <br><br>
               <center><a class="btn btn-primary  btn-lg" href="<?= base_url()?>nuevocliente">Agregar Nuevo</a></center>
        </div>
       
                
        </div>
    </div>
</div>

<?php
   
?>
<?= $footer?>