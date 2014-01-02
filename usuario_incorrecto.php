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
			<li class="menu_principal"><a href="#">Inicio</a></li>
			<li class="menu_principal"><a href="#">¿Que es Inventaferre?</a></li>
			<li class="menu_principal"><a href="#">Menu4</a>
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
	</header>
		<section class="contenido">
			<table>
				<tr>
					<td width="20%">
						<form action="php/validar_sesion.php" name="cliente" method="POST">
						<table class="tb_acceso">
							<tr>
								<td class="td_acceso">
									Acceso usuario
								</td>
							</tr>
							<tr>
								<td>
									<table class="tb_inputs">
										<tr>
											<td>
												Usuario
											</td>
											<td>
												<input type="text" name="usuario" required="required" placeholder="Usuario">
											</td>
										</tr>
										<tr>
											<td>
												Contraseña
											</td>
											<td>
												<input type="password" name="password" required="required" placeholder="Contraseña">
											</td>
										</tr>
										<tr>
											<td colspan="2">
												<input type="submit" value="Ingresar" class="ingresar">
											</td>
										</tr>
										<tr>
											<td colspan="2">
												Usuario o contraseña incorrectos
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</form>	
					</td>
					<td width="*">
						<div>
							<img src="images/inicial.jpg">
						</div>
					</td>	
				</tr>
			</table>
			</br>
		</section>
	<footer	class="copyright">Copyright (c) 2013 de Danilo Leonel Fuertes. Todos los derechos reservados.
	</footer>
</body>
</html>