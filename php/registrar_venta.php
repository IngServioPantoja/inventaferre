<?php
include 'conexion.php';
$cantidad_post = count($_POST);
$nombres_variables = array_keys($_POST); // obtiene los nombres de las varibles
$valores_variables = array_values($_POST);// obtiene los valores de las varibles
$valores="";
$atributos="";
for($i=0;$i<2;$i++)
{ 
$$nombres_variables[$i]=$valores_variables[$i]; 
if($i+1==2)
{
$valores=$valores."'".$$nombres_variables[$i]."'";
$atributos=$atributos."$nombres_variables[$i]";
}
else
{
$valores=$valores."'".$$nombres_variables[$i]."',";
$atributos=$atributos."$nombres_variables[$i],";
}
}
$sql_factura="insert into facturas ($atributos) values($valores)";
$query_factura = mysql_query ($sql_factura)or die(mysql_error());
$id=mysql_insert_id();
$_POST['factura_id']=$id;
$cantidad_post = count($_POST);
$nombres_variables_detalle = array_keys($_POST); // obtiene los nombres de las varibles
$valores_variables_detalle = array_values($_POST);// obtiene los valores de las varibles
$valores_detalle="";
$atributos_detalle="";
//segunda secuencia para el detalle de la factura
for($i=2;$i<$cantidad_post;$i++)
{ 
$$nombres_variables_detalle[$i]=$valores_variables_detalle[$i]; 
if($i+1==$cantidad_post)
{
$valores_detalle=$valores_detalle."'".$$nombres_variables_detalle[$i]."'";
$atributos_detalle=$atributos_detalle."$nombres_variables_detalle[$i]";
}
else
{
$valores_detalle=$valores_detalle."'".$$nombres_variables_detalle[$i]."',";
$atributos_detalle=$atributos_detalle."$nombres_variables_detalle[$i],";
}
}
$sql_detalle="insert into detalles_factura ($atributos_detalle) values($valores_detalle)";
$query_detalle = mysql_query ($sql_detalle)or die(mysql_error());

$sql_resta="update productos set cantidad=cantidad-".$_POST['cantidad_detalle']." where id=".$_POST['producto_id'];

$query_resta = mysql_query ($sql_resta)or die(mysql_error());
$URL="../registrar_venta.php";
?>
<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=<?php echo $URL; ?>" />
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-language" content="es" />
  <meta http-equiv="content-type"     content="text/html; charset=utf-8" />
  <meta name="viewport" id="view"     content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <header>
    <div>
      <img src="../images/taladroizq.png">
    </div>
    <div>
      <h1>DSCIIF  INVENTAFERRE</h1>
    </div>
    <div>
      <img src="../images/taladroder.png">
    </div>
  <nav>
    <ul>
      <li class="menu_principal"><a href="#">Inicio</a></li>
      <li class="menu_principal">
        <a href="#">Usuarios</a>
        <ul>
          <li>
            <a href="listar_usuarios.php">Listar</a>
          </li>
          <li>
            <a href="registrar_usuario.php">Agregar</a>
          </li>
        </ul>
      </li>
      <li class="menu_principal">
        <a href="#">Productos</a>
        <ul>
          <li>
            <a href="listar_productos.php">Listar</a>
          </li>
          <li>
            <a href="registrar_producto.php">Agregar</a>
          </li>
        </ul>
      </li>
      <li class="menu_principal"><a href="index.html">Cerrar Sesión</a></li>
    </ul>
  </nav>
  </header>
    <section class="contenido">
      <table class="te_panel">
        <tr>
          <td width="*">
            <div>
              Venta registrada exitosamente
            </div>
          </td> 
        </tr>
      </table>
      </br>
    </section>
  <footer class="copyright">Copyright (c) 2013 de Danilo Leonel Fuertes. Todos los derechos reservados.
  </footer>
</body>
</html>