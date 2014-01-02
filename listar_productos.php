<?php
session_start ();
include 'php/conexion.php';
$sql="select * from productos";
$sql;
$r=mysql_query("$sql");
$n=mysql_num_rows($r);
$m=mysql_num_fields($r);
if(isset($_GET['pagina'])){
$paginacion=$_GET['pagina']; 
}else{
$paginacion=1;
}
$fi=(10*$paginacion)-10;
$ff=10*$paginacion;
$paginas=ceil($n/10);
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
                <tr class="tr_listar">
                  <th>
                    Id
                  </th>
                  <th>
                    Imagen
                  </th>
                  <th>
                    Codigo
                  </th>
                  <th>
                    Nombre
                  </th>
                  <th>
                    Cantidad
                  </th>
                  <th>
                    Costo de salida
                  </th>
                  <th colspan="3">
                    Acciones
                  </th>
                </tr>
                <?php
                  for($fila=$fi;$fila<$ff;$fila++)
                  {if($fila<$n) { 
                    ?>
                    <tr class="tr_listar">
                      <td>
                        <?php
                        echo mysql_result($r,$fila,0);
                        ?>
                      </td>
                      <td>
                        <img src="fotos/<?php echo mysql_result($r,$fila,7); ?>" class="fotos_listar">
                      </td>
                      <td>
                        <?php
                        echo mysql_result($r,$fila,1);
                        ?>
                      </td>
                      <td>
                        <?php
                        echo mysql_result($r,$fila,2);
                        ?>
                      </td>
                      <td>
                        <?php
                        echo mysql_result($r,$fila,4);
                        ?>
                      </td>
                      <td>
                        <?php
                        echo mysql_result($r,$fila,6);
                        ?>
                      </td>
                      <td>
                         <form method="POST" action="consultar_producto.php">
                          <input type="hidden" name ="id" value="<?php echo mysql_result($r,$fila,0);?>">
                          <input type="submit" class="button_consultar" value=' '>
                         </form> 
                      </td>
                      <td>
                        <form method="POST" action="editar_producto.php">
                          <input type="hidden" name ="id" value="<?php echo mysql_result($r,$fila,0);?>">
                          <input type="submit" class="button_editar" value=''>
                         </form> 
                      </td>
                      <td>
                        <form method="POST" action="php/eliminar.php" name="cliente">
                          <input type="hidden" name ="tabla" value="productos">
                          <input type="hidden" name ="id" value="<?php echo mysql_result($r,$fila,0);?>">
                          <input type="submit" class="button_eliminar" value=' ' onClick="return confirmar()">
                        </form> 
                      </td>
                    </tr>
                    <?php
                  }}
                ?>
                <tr>
                  <td colspan="9">
                    <table width="100%" style="text-align:center; barckgorund-color:#fff;">
                      <tr>
                        <td width="33%">
                          <?php 
                            if($paginacion-1>0){
                              $paginaciona=$paginacion-1;
                          ?>
                          <a <?php echo "href='listar_productos.php?pagina=$paginaciona'"; ?>><?php echo $paginacion-1;?></a>
                          <?php
                            }else{
                              echo " ";
                            }
                          ?>
                          <a href="listar_productos.php"><?php echo $paginacion;?></a>
                          <?php 
                            if($paginacion+1<=$paginas){
                              $paginacionn=$paginacion+1;
                          ?>
                          <a <?php echo "href='listar_productos.php?pagina=$paginacionn'"; ?>><?php echo $paginacion+1;?></a>
                          <?php
                            }
                          ?>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
            </table>
			</fieldset>
			</br>
		</section>
	<footer	class="copyright">Copyright (c) 2013 de Danilo Leonel Fuertes. Todos los derechos reservados.
	</footer>
</body>
</html>