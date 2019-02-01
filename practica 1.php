<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery-3.3.1.min.js"></script>    
    <body>
        <div class="jumbotron">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
					<input type="text" name="url" placeholder="Buscar">
					<button type="submit" class="icono fa fa-search">Obtener codigo fuente</button>
                </form>
	        <button class="limpiar_codigo">Limpiar codigo</button>
        </div>
        <p id="texto">
        <?php
function display_sourcecode($url){
	$lineas = file($url);
	$output = "";
	foreach ($lineas as $line_num => $linea) { 
		//recorremos todas las líneas HTML devueltas por la página
		$output.= htmlspecialchars($linea);
	}
       return $output;
}
$url = $_POST['url'];
echo display_sourcecode($url);
?>

        </p>
<script>
$(".limpiar_codigo").click(function(){
	arregloDeSubCadenas = $("#texto").text().split("<");
        var contenido_total="";
        for(var a=1; a<arregloDeSubCadenas.length ; a++){
                if((arregloDeSubCadenas[a].indexOf("html") == -1) && (arregloDeSubCadenas[a].indexOf("style") == -1) &&(arregloDeSubCadenas[a].indexOf("script") == -1)) {
                        contenido_total += "<"+ arregloDeSubCadenas[a];
                }
        var espacio = "";
        arregloDeSubCadenas2 = contenido_total.split(espacio);
        var contenido_total2="";
        }
        var continuar = false;
        for(var a=1; a<arregloDeSubCadenas2.length ; a++){
                if(arregloDeSubCadenas2[a]=="<"){
                        continuar = false;
                }
                if(arregloDeSubCadenas2[a]==">"){
                        continuar = true;
                        continue;
                }
                if(continuar==true){
                        contenido_total2 += arregloDeSubCadenas2[a];
                }
        }
        $("#texto").text(contenido_total2);
        });
</script>
</body>
</head>
</html>
