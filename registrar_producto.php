<?php
session_start ();
include 'php/conexion.php';
$sql="select * from productos";
$sql;
$r=mysql_query("$sql");
$n=mysql_num_rows($r);
$m=mysql_num_fields($r);
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-language" content="es" />
	<meta http-equiv="content-type"     content="text/html; charset=utf-8" />
	<meta name="viewport" id="view"     content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1" />
	<link rel="stylesheet" href="css/style.css">
  <script src="js/jquery-1.7.1.min.js" type="text/javascript"></script> 
  <script src="js/modernizr-2.0.6.min.js" type="text/javascript"></script> 
  <script>
  function validar_costos()
  {
  var costo_entrada= document.ventas.costo_de_entrada.value;
  var costo_salida= document.ventas.costo_de_salida.value;
  if(costo_entrada>=costo_salida){
    //Costo entrada mayor a costo de salida
    costo_entrada=costo_salida-1;
  }
  document.ventas.costo_de_entrada.value=costo_entrada;
  document.ventas.costo_de_salida.value=cantidad*costo_unitario;
  }
  </script>
</head>
<body>
  <?php
  include 'header_admin.php';
  ?>
		<section class="contenido">
			<fieldset class="ft_crud">
				<legend>
					Productos
				</legend>
				<form action="php/agregar.php" name="ventas" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="tabla" value="productos"> 
            <table class="te_crud">
                <tr>
                  <th colspan="2">
                    Imagen
                  </th>
                </tr>
                <tr>
                  <td colspan="2">
                    <input type="file" name='imagen'/>
                  </td>
                </tr>
                <tr>
                  <th>
                    Codigo
                  </th>
                  <td>
                    <input type="text" name="codigo" required="required" class="input_sesion" placeholder="Codigo" pattern="[0-9]+">
                  </td>
                </tr>
                <tr>
                  <th>
                    Nombre
                  </th>
                  <td>
                    <input type="text" name="nombre" required="required" class="input_sesion" placeholder="Nombres" pattern="[a-z A-Z]+">
                  </td>
                </tr>
                <tr>
                  <th>
                    Descripcion
                  </th>
                  <td>
                    <textarea rows="5" cols="16" name="descripcion" required="required" class="input_sesion" placeholder="Descripcion"></textarea>
                  </td>
                </tr>
                <tr>
                  <th>
                    Cantidad
                  </th>
                  <td>
                    <input type="number" name="cantidad" step="1" required="required" class="input_sesion" placeholder="Cantidad" min="1" value="1">
                  </td>
                </tr>
                <tr>
                  <th>
                    Costo de entrada
                  </th>
                  <td>
                    <input type="number" name="costo_de_entrada" required="required" class="input_sesion" placeholder="Cantidad" min="1" value="1" onClick="validar_costos()">
                  </td>
                </tr>
                <tr>
                  <th>
                    Costo de salida
                  </th>
                  <td>
                    <input type="number" name="costo_de_salida" required="required" class="input_sesion" placeholder="Cantidad" min="1" value="2" onClick="validar_costos()">
                  </td>
                </tr>
            </table> 
            </br>
          <input type="submit" value="Registrarse" class="st_registrar">
          </br></br> 
        </form>
			</fieldset>
			</br>
		</section>
	<footer	class="copyright">Copyright (c) 2013 de Danilo Leonel Fuertes. Todos los derechos reservados.
	</footer>
</body>
</html>