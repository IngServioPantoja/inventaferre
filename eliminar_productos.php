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
</head>
<body>
	<?php
	include 'header_admin.php';
	?>
		<section class="contenido">
			<fieldset class="ft_crud">
				<legend>
					Eliminar producto
				</legend>
				<form action="eliminar_producto.php" name="cliente" method="POST">
            <table class="te_crud">
                <tr>
                  <th>
                    <input type="text" name="codigo" required="required" class="input_sesion" placeholder="Codigo" pattern="[0-9]+" value="">
                  </th>
                </tr>
            </table> 
            </br>
          <input type="submit" value="Buscar" class="st_registrar" onClick="return validar()">
          </br></br> 
        </form>
			</fieldset>
			</br>
		</section>
	<footer	class="copyright">Copyright (c) 2013 de Danilo Leonel Fuertes. Todos los derechos reservados.
	</footer>
</body>
</html>