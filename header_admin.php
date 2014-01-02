<?php
if($_SESSION["tipo"]!=1){
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
			Administrador
		</br>
		<img src="images/admin.png">
		</br>
			<?php 
				echo $_SESSION["nombre"];
			?>
		</div>
	<nav>
		<ul>
			<li class="menu_principal"><a href="panel_administrador.php">Inicio</a></li>
			<li class="menu_principal">
				<a href="listar_usuarios.php">Usuarios</a>
				<ul>
					<li>
						<a href="agregar_usuario.php">Registrar</a>
					</li>
					<li>
						<a href="listar_usuarios.php">Listar</a>
					</li>
				</ul>
			</li>
			<li class="menu_principal">
				<a href="#">Inventario</a>
				<ul>
					<li>
						<a href="registrar_producto.php">Agregar</a>
					</li>
					<li>
						<a href="listar_productos.php">Listar</a>
					</li>
					<li>
						<a href="actualizar_productos.php">Actualizar</a>
					</li>
					<li>
						<a href="eliminar_productos.php">Eliminar</a>
					</li>
				</ul>
			</li>
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