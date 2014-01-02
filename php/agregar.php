<?php
include 'conexion.php';
if(!empty($_FILES['imagen']['name'])){
	
	if (!empty($_FILES['imagen']['name'])){$nameimagen = $_FILES['imagen']['name'];}else{$nameimagen="taladro";}
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
if(!empty($_POST['rpassword'])){
	unset($_POST['rpassword']);
	$_POST['password']=md5("".$_POST['password']);
}else{
	$_POST['imagen']="taladro.png";}
$cantidad_post = count($_POST);
$nombres_variables = array_keys($_POST); // obtiene los nombres de las varibles
$valores_variables = array_values($_POST);// obtiene los valores de las varibles
$valores="";
$atributos="";
// crea las variables y les asigna el valor en blanco para poder trabajar la sentencia SQL
for($i=1;$i<$cantidad_post;$i++)
{ 
$$nombres_variables[$i]=$valores_variables[$i]; 
if($i+1==$cantidad_post)
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
$actualizar="insert into $valores_variables[0] ($atributos) values($valores)";
$query = mysql_query ($actualizar)or die(mysql_error());
//Por integridad en caso de algun tipo de falla
?>

<div id="div_centro_centro">
			<div id="div_centro_centro_texto">
			  <p>Registro agregado exitosamente.</p>
			  
        </div>
			<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=../panel_administrador.php" />
		</div>






