<?php
session_start ();
include 'php/conexion.php';
if (!empty($_POST['producto']))
{$producto=$_POST['producto'];}
else{$producto=0;}
if (!empty($_POST['cantidad']))
{$cantidad=$_POST['cantidad'];}
else{$cantidad=1;}
$sql_pr="select id,nombre,cantidad,costo_de_salida from productos where cantidad>0 order by nombre asc";
$query_pr=mysql_query("$sql_pr");
$filas_pr=mysql_num_rows($query_pr);
$cols_pr=mysql_num_fields($query_pr);
$costo_total=0;
$id_elegido=0;
$sql_fa="select codigo from facturas order by codigo desc limit 2";
$query_fa=mysql_query("$sql_fa");
mysql_result($query_fa,0,0);
$fa_codigo=mysql_result($query_fa,0,0)+1;
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-language" content="es" />
	<meta http-equiv="content-type"     content="text/html; charset=utf-8" />
	<meta name="viewport" id="view"     content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1" />
	<link rel="stylesheet" href="css/style.css">
  <script src="js/jquery-1.7.1.min.js" type="text/javascript"></script> 
  <script src="js/modernizr-2.0.6.min.js" type="text/javascript"></script> 
  <script>
  function actualizar_valor()
  {
  var cantidad= document.ventas_form.cantidad.value;
  var costo_unitario= document.ventas_form.costo_unitario.value;
  document.getElementById("valor_total").innerHTML=""+cantidad*costo_unitario;
  document.hidden_form.total.value=cantidad*costo_unitario;
  document.hidden_form.total_detalle.value=cantidad*costo_unitario;
  document.hidden_form.cantidad_detalle.value=cantidad;
  }
  </script>
</head>
<body>
  <?php
  if($_SESSION["tipo"]==1){
  include 'header_admin.php';
  }else{
    include 'header_cliente.php';
  }
  ?>
		<section class="contenido">
			<fieldset class="ft_crud">
				<legend>
					Venta
				</legend>
				<form action="registrar_venta.php" name="ventas_form" method="POST">
            <table>
              <tr>
                <th>
                  Factura
                </th>
                <th>
                  Producto
                </th>
                <th>
                  Cantidad
                </th>
                <th>
                  Valor unitario
                </th>
                <th>
                  Total
                </th>
              </tr>
              <tr>
                <td>
                  <span class="fa_codigo"> <?php echo $fa_codigo; ?> </span>
                </td>
                <td>
                <select onChange="submit()" name="producto" style="width:170px;">        
                <?php
                        for($fi_pr=0;$fi_pr<$filas_pr;$fi_pr++)
                            {
                ?>  
                <option value="<?php echo mysql_result($query_pr,$fi_pr,0); ?>"  <?php if(mysql_result($query_pr,$fi_pr,0)==$producto){?> selected <?php  $id_elegido=$fi_pr; 
                if($cantidad<=mysql_result($query_pr,$id_elegido,2)){
                    $costo_total=$cantidad*mysql_result($query_pr,$fi_pr,3);
                  }else{
                    echo mysql_result($query_pr,$id_elegido,2);
                    $costo_total=mysql_result($query_pr,$id_elegido,2)*mysql_result($query_pr,$fi_pr,3);
                  }
                }
                else{
                  if($fi_pr==0){
                   $costo_total=$cantidad*mysql_result($query_pr,0,3);}
                } ?> >
                  <?php echo mysql_result($query_pr,$fi_pr,1) ?>
                  </option>   
                <?php 
                            }
                ?>
                </td>
                <td>
                  <input type="number" value="<?php  
                  if($cantidad<=mysql_result($query_pr,$id_elegido,2)){
                    echo $cantidad;
                  }else{
                    echo $cantidad=mysql_result($query_pr,$id_elegido,2);
                  }
                    ?>" max="<?PHP echo mysql_result($query_pr,$id_elegido,2);?>" min="1" style="width:55px;" onChange="actualizar_valor()" name="cantidad">
                  <input type="hidden" name="costo_unitario" value="<?PHP echo mysql_result($query_pr,$id_elegido,3);?>">
                </td>
                <td>
                  <?PHP echo mysql_result($query_pr,$id_elegido,3);?>
                </td>
                <td>
                  <span id="valor_total"> 
                    <?php echo $costo_total; ?>
                  </span>
                </td>
                </select>
              </tr>
            </table> 
            </br>
            </form>
          <form action="php/registrar_venta.php" name="hidden_form" method="POST">
          <input type="hidden" name="codigo" value="<?PHP echo $fa_codigo;?>">
          <input type="hidden" name="total" value="<?PHP echo $costo_total;?>">
          <input type="hidden" name="producto_id" value="<?PHP echo mysql_result($query_pr,$id_elegido,0);?>">
          <input type="hidden" name="cantidad_detalle" value="<?PHP echo $cantidad;?>">
          <input type="hidden" name="total_detalle" value="<?PHP echo $costo_total;?>">
          <input type="submit" value="Registrar venta" class="st_registrar">
          </br></br> 
			    </form>
      </fieldset>
			</br>
		</section>
	<footer	class="copyright">Copyright (c) 2013 de Danilo Leonel Fuertes. Todos los derechos reservados.
	</footer>
</body>
</html>