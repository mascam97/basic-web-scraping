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
					Url de la pagina <input type="text" name="url" placeholder="Pagina" id="pagina"><br>
                                        <button class="">Ver codigo de la pagina</button>
                                        </div>

<p id="texto">
</p>
<script>
$("button").click(function(){
	$.get($("#pagina").val(), function(data){
        arregloDeSubCadenas = data.split("<");
        var contenido_total="";
        for(var a=1; a<arregloDeSubCadenas.length ; a++){
                if((arregloDeSubCadenas[a].indexOf("html") == -1) && (arregloDeSubCadenas[a].indexOf("style") == -1) &&(arregloDeSubCadenas[a].indexOf("script") == -1)) {
                contenido_total += "<"+ arregloDeSubCadenas[a];
                }
                var espacio = "";
                arregloDeSubCadenas2 = contenido_total.split(espacio);
        var contenido_total2="";
        }
        var continuar = 0;
        var continuar2  =0;
        for(var a=1; a<arregloDeSubCadenas2.length ; a++){
                if(arregloDeSubCadenas2[a]=="<"){
                continuar = 0;
                continuar2 = 0;
                }
                if(arregloDeSubCadenas2[a]==">"){
                continuar = 1;
                continuar2=1;
                }
                if(continuar==1){
                if(continuar2==1){
                contenido_total2 += arregloDeSubCadenas2[a+1];
                continuar == 0;
                }else{
                contenido_total2 += arregloDeSubCadenas2[a];                        
                continuar2 == 0;
                }
                }
                }
                $("#texto").text(contenido_total2);
        });
});
</script>
</body>
</head>
</html>