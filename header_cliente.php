<?php
if($_SESSION["tipo"]!=2){
  //administrador
header("Location:./index.html"); 
}
?>
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
		<div class="info_user">
			Empleado
		</br>
		<img src="images/admin.png">
		</br>
			<?php 
				echo $_SESSION["nombre"];
			?>
		</div>
	<nav>
		<ul>
			<li class="menu_principal"><a href="panel_cliente.php">Inicio</a></li>
			<li class="menu_principal">
				<a href="panel_administrador.php">Ventas</a>
				<ul>
					<li>
						<a href="registrar_venta.php">&nbsp;&nbsp;Registrar venta&nbsp;&nbsp;</a>
					</li>
					<li>
						<a href="listar_ventas.php">&nbsp;&nbsp;Listado de ventas&nbsp;&nbsp;</a>
					</li>
				</ul>
			</li>
			<li class="menu_principal"><a href="php/cerrar_sesion.php">Cerrar Sesión</a></li>
		</ul>
	</nav>
</header>