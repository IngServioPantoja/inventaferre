<?php
session_start ();
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-language" content="es" />
	<meta http-equiv="content-type"     content="text/html; charset=utf-8" />
	<meta name="viewport" id="view"     content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1" />
	<link rel="stylesheet" href="css/style.css">
  <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
  <script>
  function validar_contrasena()
  { var password=document.getElementsByName('password')[0].value;
    var rpassword=document.getElementsByName('rpassword')[0].value;
    if(password==rpassword){
      return true;
    }
    else{
      alert("Las contraseñas no coinciden");
      return false;
    } 
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
				<form action="php/agregar.php" name="cliente" method="POST">
          <input type="hidden" name="tabla" value="usuarios"> 
          <input type="hidden" name="tipo" value="2"> 
            <table class="te_crud">
                <tr>
                  <th>
                    Identificación
                  </th>
                  <td>
                    <input type="text" name="identificacion" required="required" class="input_sesion" placeholder="Identificación" pattern="[0-9]+">
                  </td>
                </tr>

                <tr>
                  <th>
                    Nombres
                  </th>
                  <td>
                    <input type="text" name="nombre" required="required" class="input_sesion" placeholder="Nombres" pattern="[a-z A-Z]+">
                  </td>
                </tr>
                <tr>
                  <th>
                    Apellidos
                  </th>
                  <td>
                    <input type="text" name="apellidos" required="required" class="input_sesion" placeholder="Apellidos" pattern="[a-z A-Z]+">
                  </td>
                </tr>
                <tr>
                  <th>
                    Usuario
                  </th>
                  <td>
                    <input type="text" name="usuario" required="required" class="input_sesion" placeholder="Usuario">
                  </td>
                </tr>
                <tr>
                  <th>
                    Contraseña
                  </th>
                  <td>
                    <input type="password" name="password" required="required" class="input_sesion" placeholder="Contraseña">
                  </td>
                </tr>
                <tr>
                  <th>
                    Repetir contraseña
                  </th>
                  <td>
                    <input type="password" name="rpassword" required="required" class="input_sesion" placeholder="Repita contraseña">
                  </td>
                </tr>
            </table> 
            </br>
          <input type="submit" value="Registrarse" class="st_registrar" onClick="return validar_contrasena()">
          </br></br> 
        </form>
			</fieldset>
			</br>
		</section>
	<footer	class="copyright">Copyright (c) 2013 de Danilo Leonel Fuertes. Todos los derechos reservados.
	</footer>
</body>
</html>