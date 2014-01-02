<?php
session_start ();
include 'php/conexion.php';
$find="";
if(isset($_GET['pagina'])){
$paginacion=$_GET['pagina']; 
}else{
$paginacion=1;
}
if(isset($_POST['atributo'])){
	if($_POST['valor']==""){
		$sql="select nombre,costo_de_salida,imagen from productos";
	}else
	{
		$sql="select nombre,costo_de_salida,imagen from productos where ".$_POST['atributo']." like '%".$_POST['valor']."%' order by ".$_POST['atributo']." desc";
	}
}else{
$sql="select nombre,costo_de_salida,imagen from productos";
}
$sql;
$r=mysql_query("$sql");
$n=mysql_num_rows($r);
$m=mysql_num_fields($r);
$fi=(9*$paginacion)-9;
$ff=9*$paginacion;
$paginas=ceil($n/9);
if($n<=0){
$find="No se encontraton resultados";
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
	<header>
		<div>
			<img src="images/taladroizq.png">
		</div>
		<div>
			<h1>DSCIIF  INVENTAFERRE</h1>
		</div>
		<div>
			<img src="images/taladroder.png">
		</div>
	<nav>
		<ul>
			<li class="menu_principal"><a href="index.html">Inicio</a></li>
			<li class="menu_principal"><a href="catalogo.php?pagina=1">Catalogo de productos</a></li>
			<li class="menu_principal"><a href="que_es.html">¿Que es Inventaferre?</a></li>
		</ul>
	</nav>
	</header>
		<section class="contenido">
			<table class="tb_paginacion">
				<tr>
					<form action="catalogo.php?pagina=<?php echo $paginacion;?>" method="POST">
						<td width="10%">
							Busqueda
						</td>
						<td width="30%">
							Atributo: 
							<select name="atributo" required="required">
		                      <option value="Nombre">Nombre</option>
		                      <option value="Costo_de_salida">Costo</option>
		                    </select>
						</td>
						<td width="30%">
							Valor:
							<input type="text" name="valor">
						</td>
						<td width="30%">
							<input type="Submit" value="Buscar" class="ingresar">
						</td>
					</form>
				</tr>
			</table>

			<table class="te_panel">
				<tr>
					<td width="*">
						<?php echo $find;?>
						<ul class="li_productos">
							<?php
			                  for($fila=$fi;$fila<$ff;$fila++)
			                  {
			                  	if($fila<$n) { 
                 			 ?>
								<li>    
									<fieldset id="fi_producto" class="ft_crud" 
									<?php $background="background: url('fotos/".mysql_result($r,$fila,2)."')no-repeat; background-size: 100% 100%;"; ?>

									style="<?php echo $background; ?>">
									    <table class="te_producto">
							                <tr>
							                  <td class="td_prodcuto_desc">
							                    <?php
						                          echo mysql_result($r,$fila,0);
						                          ?>
							                   </br>
							                   <?php
						                          echo mysql_result($r,$fila,1);
						                          ?>
							                  </td>
							                </tr>
							            </table> 
								    </fieldset>
								</li>
							<?php
			                    }
			                  }
			                ?>
						</ul>
					</td>	
				</tr>
			</table>
			<table class="tb_paginacion">
				<tr>
					<td width="33%">
					<?php 
					if($paginacion-1>0){
						$paginaciona=$paginacion-1;
					?>
						<a <?php echo "href='catalogo.php?pagina=$paginaciona'"; ?>><?php echo $paginacion-1;?></a>
					<?php
					}else{
						echo " ";
					}
					?>
						<a href="catalogo.php"><?php echo $paginacion;?></a>
					<?php 
					if($paginacion+1<=$paginas){
						$paginacionn=$paginacion+1;
					?>
						<a <?php echo "href='catalogo.php?pagina=$paginacionn'"; ?>><?php echo $paginacion+1;?></a>
					<?php
					}
					?>
					</td>
				</tr>
				</table>
			</br>
		</section>
	<footer	class="copyright">Copyright (c) 2013 de Danilo Leonel Fuertes. Todos los derechos reservados.
	</footer>
</body>
</html>