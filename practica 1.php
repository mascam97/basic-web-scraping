<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Recolección y Análisis de datos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">   
    <link rel="stylesheet" href="css/estilo.css">
    <script src="jquery-3.3.1.min.js"></script>    

      
    <div class="page-header">
        <h1>Recolección y Análisis de datos</h1>
    </div>


    <body>	
	<meta charset=”utf-8″>
        <div class="esp jumbotron row">
                <div class="col-6"> 
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
					<input type="text" name="url" class="form-control"  placeholder="Buscar">
					<button type="submit" class="btnX icono fa fa-search">Obtener codigo fuente</button>
                </form>
	        <button class="btnX limpiar_codigo">Limpiar codigo</button>
        </div>
                <div class="col-6">
                        <button class="btnX ver_top">Ver top 10 palabras mas repetidas !</button>
                        <label id="top"></label>
                </div> 
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
        var newstringreplaced = $("#texto").text().replace(/</gi, "++#<"); 
var arregloDeSubCadenas = newstringreplaced.split("++#");
       var contenido_total="";
        for(var a=1; a<arregloDeSubCadenas.length ; a++){
                if((arregloDeSubCadenas[a].indexOf("<style") == -1) && (arregloDeSubCadenas[a].indexOf("<script") == -1)) {
                        contenido_total += arregloDeSubCadenas[a];
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
		continuar = false;
		var contenido_total3="";
		for(var a=1; a<contenido_total2.length ; a++){
                if(contenido_total2[a]=="img"){
                        continuar = false;
                }
                if(contenido_total2[a]==";"){
                        continuar = true;
                        continue;
                }
                if(continuar==true){
                        contenido_total3 += contenido_total2[a];
                }
        }
		
		var contenido_total4="";
		for(var a=1; a<contenido_total3.length ; a++){
                if(contenido_total3[a]=="&"){
                        continuar = false;
                }
                if(contenido_total3[a]==";"){
                        continuar = true;
                        continue;
                }
                if(continuar==true){
                        contenido_total4 += contenido_total3[a];
                }
        }
		
        $("#texto").text(contenido_total4);
		
		
});
$(".ver_top").click(function(){
	
		
        function Determinar_top(arreglo){
        var Palabras = new Array();
        for(var a = 0; a<arreglo.length; a++){
                if(Palabras.indexOf(a)==-1){
                        if(Palabras[arreglo[a]]>=1)
                        Palabras[arreglo[a]]++;                
                        else
                        Palabras[arreglo[a]] = 1;
                }
        }
        Palabras.sort();
		

		
        var Palabras_top= [];
       Object.keys(Palabras).forEach(function(e){
                Palabras_top.push({ palabra: e, repetidos: Palabras[e] },);
        });
        Palabras_top.sort(function (a, b) {
                return b.repetidos - a.repetidos;
        });
       console.log(Palabras_top);
        var Palabras_top_10= [];
        for(var a=0; a<10; a++){
                Palabras_top_10.push(Palabras_top[a]);
        }
        return Palabras_top_10;
      }
var sim = /\s+/gi; 
minusculas = $("#texto").text().toLowerCase();
var texto= minusculas.trim().replace(sim, ' ').split(' ');

var Palabras_top_10=Determinar_top(texto);
var contenido = '<table><tr><th>Palabra</th><th>Repeticiones</th></tr>';
Palabras_top_10.forEach(function(palabra) {
        contenido += "<tr><th>"+palabra["palabra"]+"</th><th>"+palabra["repetidos"]+"</th></tr>";
});
contenido += "</table>";
$("#top").html(contenido);
});
</script>
</body>
</head>
</html 
