<?= $header ?>
<?= $menu ?>
<div style="height: 100vh;" class="container-fluid">
    <div class="row">
        <div style="margin-top: 3%;" class="row offset-md-1 col-md-10">
                    <center><h4>
                        <?= $titulo?>
                    </h4></center>

            <div style="padding-top:12%; padding-bottom:10%; text-align:center" class="col-md-6">
                <p id="textoID">Texto de Ejemplo </p>
            </div>


            <div style="padding-top:10%; padding-bottom:5%; text-align:center" class="col-md-6">
                        <button id="boton1ID" type="button" class="btn btn-primary btn-lg">
                            Botón 1
                        </button>
                            <br><br><br>
                        <button id="boton2ID" type="button" class="btn btn-primary btn-lg">
                            Botón 2
                        </button>
            </div>
        </div>
    </div>
</div>


<script>   
    //Método para proporcionar eventos onclick
    document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("boton1ID").addEventListener('click', cambioAccion1); 
    document.getElementById("boton2ID").addEventListener('click', cambioAccion2); 
    });

    //función para modificar elementos cuando se presiona botón 1
    function cambioAccion1(){
        document.getElementById('textoID').style.color ="#3B3DC0";
        document.getElementById('boton1ID').style.background ="#070518";
        document.getElementById('boton2ID').style.background ="#3B3DC0";
        document.getElementById('textoID').innerHTML='Se presiono el botón 1';
    };  

    //función para modificar elementos cuando se presiona botón 2
    function cambioAccion2(){
        document.getElementById('textoID').style.color ="#97931A";
        document.getElementById('boton1ID').style.background ="#97931A";
        document.getElementById('boton2ID').style.background ="#070518";
        document.getElementById('textoID').innerHTML='Ahora se presiono el botón 2...';
    }; 

</script>
<?= $footer ?>