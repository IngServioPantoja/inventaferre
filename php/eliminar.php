<?php
include 'conexion.php';
$id=$_POST["id"];
$tabla=$_POST["tabla"];
$delete="delete from $tabla where id='$id'";
$query = mysql_query ($delete)or die(mysql_error());
//Por integridad en caso de algun tipo de falla
$URL="../listar_".$tabla.".php";
?>
<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=<?php echo $URL; ?>" />
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
              Registro eliminado exitosamente
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





