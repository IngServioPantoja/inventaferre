<?php
include 'conexion.php';
if(!empty($_FILES['imagen']['name'])){
if (!empty($_FILES['imagen']['name'])){$nameimagen = $_FILES['imagen']['name'];}else{$nameimagen="";}
if (!empty($_FILES['imagen']['tmp_name'])){$tmpimagen = $_FILES['imagen']['tmp_name'];}else{$tmpimagen="";}
if (!empty($_GET['imagen'])){$imagen=$_GET['imagen'];}else{$imagen="fotos/taladro.png";}
$extimagen = pathinfo($nameimagen);
$nameimagen = str_replace(" ", "_", $nameimagen);
$ext = array("JPG","jpg","png","gif");
$urlnueva = "../fotos/".$nameimagen;

if(is_uploaded_file($tmpimagen)) {
    if (in_array($extimagen['extension'],$ext)) {
    copy ($tmpimagen,$urlnueva);
    
    } else {
    }
  }
  $_POST['imagen']="$nameimagen";
}
$cantidad_post = count($_POST);
$nombres_variables = array_keys($_POST); // obtiene los nombres de las varibles
$valores_variables = array_values($_POST);// obtiene los valores de las varibles
$atributos="";
// crea las variables y les asigna el valor
for($i=1;$i<$cantidad_post;$i++)
{ 
$$nombres_variables[$i]=$valores_variables[$i]; 
if($i+1==$cantidad_post)
{
$atributos=$atributos."$nombres_variables[$i]='$valores_variables[$i]' where id='$valores_variables[1]'";
}
else
{
$atributos=$atributos."$nombres_variables[$i]='$valores_variables[$i]',";
}
}
$actualizar="update $valores_variables[0] set $atributos";
$query = mysql_query ($actualizar)or die(mysql_error());
//Por integridad en caso de algun tipo de falla
$URL="../listar_".$valores_variables[0].".php";
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
              Registro editado exitosamente
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