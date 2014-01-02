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
  <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
  <script>
  function confirmar()
  {
    if(confirm('¿Esta seguro de que desea eliminar este registro?'))
    {
      return true;
    }
    else
    {
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
                  <th>
                    Id
                  </th>
                  <td>
                    <?php echo mysql_result($r,0,0); ?>
                  </td>
                </tr>
                <tr>
                  <th>
                    Codigo
                  </th>
                  <td>
                    <?php echo mysql_result($r,0,1); ?>
                  </td>
                </tr>
                <tr>
                  <th>
                    Nombre
                  </th>
                  <td>
                    <?php echo mysql_result($r,0,2); ?>
                  </td>
                </tr>
                <tr>
                  <th>
                    Descripcion
                  </th>
                  <td>
                    <?php echo mysql_result($r,0,3); ?>
                  </td>
                </tr>
                <tr>
                  <th>
                    Cantidad
                  </th>
                  <td>
                    <?php echo mysql_result($r,0,4); ?>
                  </td>
                </tr>
                <tr>
                  <th>
                    Costo de entrada
                  </th>
                  <td>
                    <?php echo mysql_result($r,0,5); ?>
                  </td>
                </tr>
                <tr>
                  <th>
                    Costo de salida
                  </th>
                  <td>
                    <?php echo mysql_result($r,0,6); ?>
                  </td>
                </tr>
            </table> 
            </br>
			</fieldset>
			</br>
		</section>
	<footer	class="copyright">Copyright (c) 2013 de Danilo Leonel Fuertes. Todos los derechos reservados.
	</footer>
</body>
</html>