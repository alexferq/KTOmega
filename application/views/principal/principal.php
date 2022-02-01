
<?= $header?>
<?= $menu?>

<div style="height: 100vh;" class="container-fluid">
    <div style="padding-top: 4%;" class="row">
       
       <div class="offset-md-2 col-md-8">
       <center><h3><?= $titulo?></h3></center>
       <br><br>
       <p>
           <span style="font-weight: bold;">EJERCICIO # 1</span> <br>
            Realizar a través del FrameWork CodeIgniter el mantenimiento CRUD de clientes. El diseño HTML del formulario, listados HTML queda a criterio del desarrollador.
            <br> Datos mínimos a utilizar: <span style="font-weight: bold; color:blue">identificador, Nombre, dirección, contacto, teléfono, Direcciones ***</span>.
            Adicionalmente confeccione una nueva tabla para almacenar el dato “direcciones”, siendo que el usuario pueda tener 1 o más direcciones para efectos del ejercicio basta que contengo dos registros asociados. Para efectos de los listados la intención del ejercicio es mostrar cómo se estructura y forma el JOIN de ambas tablas. 
            <br> La forma en cómo se visualiza la información de direcciones queda a discreción y creatividad del programador.
      </p>

      <p>
            <span style="font-weight: bold;">EJERCICIO # 2</span> <br>
            Sobre la información ingresada a la base de datos, realizar un script que retorne la información de la base de datos en formato JSON.
      </p>

      <p>
            <span style="font-weight: bold;">EJERCICIO # 3</span> <br>
            Sobre la información ingresada a la base de datos, realizar un script que retorne la información de la base de datos en formato XML.
      </p>

      <p>
            <span style="font-weight: bold;">EJERCICIO # 4</span> <br>
            Realizar una página HTML (puede ser dentro del mismo FrameWork o separada queda a discreción del desarrollador) donde muestre dos botones, la dinámica es: si presiono el botón #1 cambia el texto y color del botón #2, y presiono el botón #2, cambia el texto y color del botón #1. Queda a discreción del desarrollador el uso de JQUERY o JAVASCRIPT.
      </p>

      <p>
            <span style="font-weight: bold;">EJERCICIO # 5</span> <br>
            Realizar en javascript una función llamada  “juego de letras”, dicha función recibe una cadena de caracteres como parámetro;  procesa dicha string para mostrar en consola del navegador cada letra intercalada en minúsculas y mayúsculas.
“EsTa Es Mi PrUeBa En Omega” e indicar cuanto caracteres la conforman, es decir la longitud de la cadena recibida.
      </p>
       </div>
    </div>
</div>

<?= $footer?>