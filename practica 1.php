<?php 
function limpiarDatos($datos){
	// Eliminamos los espacios en blanco al inicio y final de la cadena
	$datos = trim($datos);
	// Quitamos las barras / escapandolas con comillas
	$datos = stripslashes($datos);
	// Convertimos caracteres especiales en entidades HTML (&, "", '', <, >)
	$datos = htmlspecialchars($datos);
	return $datos;
}
function display_sourcecode($url){
	$lineas = file($url);
	$output = "";
	foreach ($lineas as $line_num => $linea) { 
		//recorremos todas las líneas HTML devueltas por la página
		$output.= "Line #{$line_num} : " . htmlspecialchars($linea) . "\n";
	}
       return $output;
}
//echo display_sourcecode("http://localhost/PracticasPHP/practicas/blog/");
//echo display_sourcecode("https://blog.aulaformativa.com/como-ver-codigo-fuente-de-una-pagina-web-haciendo-uso-de-un-script-php/");
$url = $_POST['url'];
$url = limpiarDatos($url);
//echo display_sourcecode($url);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="jquery-3.3.1.min.js"></script>    
    <body>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
					<input type="text" name="url" placeholder="Buscar">
					<button type="submit" class="icono fa fa-search" >Ver pagina</button>
                </form>
                <button  class="icono fa fa-search" id="botto">buttonn 2</button>
               
<p id="texto">
<?php
 echo  display_sourcecode($url);
?>
</p>
<script>
$("#botto").click(function(){
var texto = $("#texto").html();
$("#texto").remove("script");
$("#texto").html(texto);
console.log(texto);
});
</script>
</body>
</head>
</html>