<?= $header ?>
<?= $menu ?>
<div style="height: 100vh;" class="container-fluid">
    <div class="row">
        <div style="margin-top: 3%;" class="row offset-md-1 col-md-10">
                    <center><h4>
                        <?= $titulo?>
                    </h4></center>

            <div style="padding-top:12%; padding-bottom:10%; text-align:left" class="col-md-6">
                <div class="col-md-12 formularioDatos">
                    <label style="font-size: 1.5rem; font-weight:bold" for="">Texto de Prueba</label>
                    <input style="font-size:1.4rem; margin-bottom:2%" id="cadenatextoID" type="text" placeholder='Ingrese la cadena de texto que desea probar' class='form-control inputCliente'>
                    <a id="limpiarID" style="font-size: 1.3rem;" href="">Limpiar</a>
                    <br><br><br><br>
                <span id="respuestaPruebaID" style="font-size: 1.2rem; font-weight: bold"></span>
                </div>
               
            </div>


            <div style="padding-top:14%; text-align:left" class="col-md-6">
                <button id="btnPLOmega" type="button" class="btn btn-primary btn-lg">
                    Iniciar Prueba
                </button>
            </div>
        </div>
    </div>
</div>


<script>   
    //Método para proporcionar eventos onclick
    document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("btnPLOmega").addEventListener('click', juegodeletras); 
    document.getElementById("limpiarID").addEventListener('click', limpiar); 
    });

    //función para modificar elementos cuando se presiona botón 1
    function juegodeletras(){
        var cadena = document.getElementById('cadenatextoID').value;
        var caracteres = cadena.replace(/\s+/g, '');
        var condicional = 0;
        var nuevaCadena = "";
        for(var i = 0; i<cadena.length; i++){
            if(isLetter(cadena[i]) != null){
                if(condicional%2 == 0){
                    nuevaCadena += cadena[i].toUpperCase();
                }else{
                    nuevaCadena += cadena[i].toLowerCase();
                }
                condicional++;
            }else{
                nuevaCadena += cadena[i];
            }
            
        }
        console.log(nuevaCadena)
        console.log('La cantidad de caractéres de la cadena recibida es: ' + cadena.length)
        console.log('La cantidad de caractéres de la cadena recibida sin contar espacios en blanco es:' + caracteres.length)
        var respuesta = `${nuevaCadena} </BR> La cantidad de caractéres de la cadena recibida es: ${cadena.length}
        </BR> La cantidad de caractéres de la cadena recibida sin contar espacios en blanco es: ${caracteres.length}`
        document.getElementById('respuestaPruebaID').innerHTML= respuesta;
    };  

    function isLetter(caracter) {
        return caracter.match(/[a-z]/i);
    }


    function limpiar(){
        document.getElementById('respuestaPruebaID').innerHTML= '';
        document.getElementById('cadenatextoID').value= '';
    }
 

</script>
<?= $footer ?>