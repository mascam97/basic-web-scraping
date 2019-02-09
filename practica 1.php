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

    <script src="bootstrap.js"></script> 
      
    <div class="page-header">
        <h1>Recolección y Análisis de datos</h1>
    </div>


    <body>	
	<meta charset="utf-8">
    <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" align="center">
          <div class="modal-content">
            <div class="modal-header" align="center" style="background-color: #fc5d5d"  ><font face="Anton" color=white size="4px">Top 10 palabras mas repetidas</font>       
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div >
    <div class="container">
            <label id="top"></label>
  
        </div>
          </div>
        </div>
        </div>
        <div class="esp jumbotron row">
                <div class="col-12"> 
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
					<input type="text" name="url" class="form-control"  placeholder="Buscar">
					<button type="submit" class="btnX icono fa fa-search">Obtener codigo fuente</button>
                </form>
                <button class="btnX limpiar_codigo">Limpiar codigo</button><button class="btnX ver_top" data-toggle="modal" data-target="#miModal">Ver top 10 palabras mas repetidas</button>
                
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
        $(".ver_top").hide();

$(".limpiar_codigo").click(function(){
        var newstringreplaced = $("#texto").text().replace(/</gi, "++#<"); 
var arregloDeSubCadenas = newstringreplaced.split("++#");
       var contenido_total="";
        for(var a=1; a<arregloDeSubCadenas.length ; a++){
                if((arregloDeSubCadenas[a-1].indexOf("<style") == -1) && (arregloDeSubCadenas[a-1].indexOf("<script") == -1)) {
                        if(arregloDeSubCadenas[a].indexOf("</") == 0)
                        contenido_total += arregloDeSubCadenas[a-1];
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
        $("#texto").text(contenido_total2);$('.ver_top').show();	
		
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
var contenido = "<table border='2cm'><tr><th><strong>Palabra</strong></th><th><strong>Repeticiones</strong></th></tr>";
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
