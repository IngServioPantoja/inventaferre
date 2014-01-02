<?php
include 'conexion.php';
$usuario=$_POST['usuario'];
$password=$_POST['password'];
$usuario=$usuario;
$password=$password;
$consulta = "select id,nombre,apellidos,tipo from usuarios where usuario='$usuario' AND password=md5('$password') limit 1";
$query = mysql_query ($consulta);
$fila=mysql_fetch_array($query, MYSQL_ASSOC);
$total=mysql_num_rows($query);
?>
<?php
if($total>0){
session_start ();
$_SESSION["id"]=$fila['id'];
$_SESSION["nombre"]=$fila["nombre"]." ".$fila["apellidos"];
$_SESSION["tipo"]=$fila["tipo"];
?>
<?php 
//1 para Administrador
//2 para Cliente
if($fila["tipo"]==1)
  { ?>
  <meta http-equiv='Refresh' content='0;url=../panel_administrador.php'>
     <?php
}
else if($fila["tipo"]==2)
  { ?>
  <meta http-equiv='Refresh' content='0;url=../panel_cliente.php'>
    <?php
}
else
{
?>
<meta http-equiv='Refresh' content='0;url=../usuario_incorrecto.php'>; 
<?php
}
?>
<?php
}else{
?>
<meta http-equiv='Refresh' content='0;url=../usuario_incorrecto.php'>;
<?php
}
?> 
<!DOCTYPE html>
<html lagn="es">
<head>
<meta charset='utf-8'>
<title>Ejemplo</title>
  <link rel='stylesheet' type='text/css' href='../css/style.css' />
  <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
</head>
<body>
  <header>
    <h1>Header</h1>
  </header>
  <nav>
    <ul>
      <li><a href="#">Menus</a></li>
      <li><a href="#">Menu2</a></li>
      <li><a href="#">Menu3</a></li>
      <li><a href="#">Menu4</a>
        <ul>
          <li>
            <a href="#">Menu41</a>
          </li>
          <li>
            <a href="#">Menu42</a>
          </li>
          <li>
            <a href="#">Menu43</a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <section class="contenedor">
    <section>
      <head>
        Acceso al sistema
      </head>
      <article>
        <fieldset>
          <legend>
            Estado
          </legend>
            <table>
              <tr>
                <td>
                  Bienvenido
                </td>
              </tr>
            </table>
        </fieldset>     
      </article>
    </section>
    <aside>aside
    </aside>
  </section>
  <footer>
    Footer
  </footer>
</body>
</html>
