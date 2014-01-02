<?php
session_start ();
include 'php/conexion.php';
if(isset($_POST['id'])){$id=$_POST['id']; $id=$id;$codigo=0;
}else{
$codigo=$_POST['codigo'];$codigo=$codigo;$id=0;}
$sql="select * from productos where id=$id or codigo=$codigo";
$sql;
$r=mysql_query("$sql");
$n=mysql_num_rows($r);
$m=mysql_num_fields($r);
if($n==0){
  header("Location:".$_SERVER['HTTP_REFERER']);  
}
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
					Productos
				</legend>
				<form action="php/editar.php" name="cliente" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="tabla" value="productos"> 
          <input type="hidden" name="id" value="<?php echo mysql_result($r,0,0); ?>"> 
            <table class="te_crud">
                <tr>
                  <th colspan="2">
                    Imagen
                  </th>
                </tr>
                <tr>
                  <th colspan="2" class="td_img_consultar">
                    <img src="fotos/<?php echo mysql_result($r,0,7); ?>" class="img_consultar">
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
                    <input type="text" name="codigo" required="required" class="input_sesion" placeholder="Codigo" pattern="[0-9]+" value="<?php echo mysql_result($r,0,1); ?>">
                  </td>
                </tr>
                <tr>
                  <th>
                    Nombre
                  </th>
                  <td>
                    <input type="text" name="nombre" required="required" class="input_sesion" placeholder="Nombres" pattern="[a-z A-Z]+" value="<?php echo mysql_result($r,0,2); ?>">
                  </td>
                </tr>
                <tr>
                  <th>
                    Descripcion
                  </th>
                  <td>
                    <textarea rows="5" cols="16" name="descripcion" required="required" class="input_sesion" placeholder="Descripcion" ><?php echo mysql_result($r,0,3); ?></textarea>
                  </td>
                </tr>
                <tr>
                  <th>
                    Cantidad
                  </th>
                  <td>
                    <input type="number" name="cantidad" step="1" required="required" class="input_sesion" placeholder="Cantidad" min="1" value="<?php echo mysql_result($r,0,4); ?>">
                  </td>
                </tr>
                <tr>
                  <th>
                    Costo de entrada
                  </th>
                  <td>
                    <input type="number" name="costo de entrada" required="required" class="input_sesion" placeholder="Cantidad" min="1" value="<?php echo mysql_result($r,0,5); ?>">
                  </td>
                </tr>
                <tr>
                  <th>
                    Costo de salida
                  </th>
                  <td>
                    <input type="number" name="costo de salida" required="required" class="input_sesion" placeholder="Cantidad" min="1" value="<?php echo mysql_result($r,0,6); ?>">
                  </td>
                </tr>
            </table> 
            </br>
          <input type="submit" value="Editar" class="st_registrar" onClick="return validar()">
          </br></br> 
        </form>
			</fieldset>
			</br>
		</section>
	<footer	class="copyright">Copyright (c) 2013 de Danilo Leonel Fuertes. Todos los derechos reservados.
	</footer>
</body>
</html>