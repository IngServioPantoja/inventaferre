<?php
session_start ();
include 'php/conexion.php';
if(isset($_POST['id'])){$id=$_POST['id']; 
}else{
$id=0;
}
$sql="select * from usuarios where id=$id limit 1";
$r=mysql_query("$sql");
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-language" content="es" />
	<meta http-equiv="content-type"     content="text/html; charset=utf-8" />
	<meta name="viewport" id="view"     content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1" />
	<link rel="stylesheet" href="css/style.css">
  <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
</head>
<body>
<?php
include 'header_admin.php';
?>
		<section class="contenido">
			<fieldset class="ft_crud">
				<legend>
					Usuario
				</legend>
				<form action="php/editar.php" name="cliente" method="POST">
          <input type="hidden" name="tabla" value="usuarios"> 
          <input type="hidden" name="id" value="<?php echo $id; ?>"> 
          <input type="hidden" name="tipo" value="1"> 
            <table class="te_crud">
                <tr>
                  <th>
                    Identificación
                  </th>
                  <td>
                    <?php echo mysql_result($r,0,1); ?>
                  </td>
                </tr>

                <tr>
                  <th>
                    Nombres
                  </th>
                  <td>
                    <?php echo mysql_result($r,0,2); ?>
                  </td>
                </tr>
                <tr>
                  <th>
                    Apellidos
                  </th>
                  <td>
                    <?php echo mysql_result($r,0,3); ?>
                  </td>
                </tr>
                <tr>
                  <th>
                    Usuario
                  </th>
                  <td>
                    <?php echo mysql_result($r,0,4); ?>
                  </td>
                </tr>
            </table> 
            </br>
        </form>
			</fieldset>
			</br>
		</section>
	<footer	class="copyright">Copyright (c) 2013 de Danilo Leonel Fuertes. Todos los derechos reservados.
	</footer>
</body>
</html>