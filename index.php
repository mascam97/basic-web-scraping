<!DOCTYPE html>
<html>

<head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <title>Basic Web Scraping</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap-v4.js"></script>
</head>

<body>
        <h1 class="page-header">Basic Web Scraping</h1>
        <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document" align="center">
                        <div class="modal-content">
                                <div class="modal-header" align="center" style="background-color: #fc5d5d">
                                        <font face="Anton" color=white size="4px">See the Top 10 repeated Words!</font>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <div class="container">
                                        <label id="top"></label>
                                </div>
                        </div>
                </div>
        </div>
        <div class="esp jumbotron row">
                <div class="col-12">
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                                <input type="text" name="url" class="form-control" placeholder="Type the URL(page in spanish)">
                                <button type="submit" class="btnX icono fa fa-search" onclick="$('.look_top').hide();">Obtain source code</button>
                        </form>
                        <button class="btnY clean_code">Clear code</button>
                        <button class="btnY look_top" data-toggle="modal" data-target="#miModal">See the Top 10 repeated Words!</button>
                </div>
        </div>
        <p id="text">
                <?php
                function display_sourcecode($url)
                {
                        $lineas = file($url);
                        $output = "";
                        foreach ($lineas as $line_num => $linea) {
                                // this gets all the lines
                                $output .= htmlspecialchars($linea);
                        }
                        return $output;
                }
                $url = $_POST['url'];
                echo display_sourcecode($url);
                ?>

        </p>
        <script>
                $(".look_top").hide();

                $(".clean_code").click(function() {
                        var newstringreplaced = $("#text").text().replace(/</gi, "++#<");
                        newstringreplaced = newstringreplaced.replace(/[í]/g, "i");
                        newstringreplaced = newstringreplaced.replace(/[ó]/g, "o");
                        newstringreplaced = newstringreplaced.replace(/[é]/g, "e");
                        newstringreplaced = newstringreplaced.replace(/[ü]/g, "u");
                        newstringreplaced = newstringreplaced.replace(/[â]/g, "a");
                        newstringreplaced = newstringreplaced.replace(/[ä]/g, "a");
                        newstringreplaced = newstringreplaced.replace(/[à]/g, "a");
                        newstringreplaced = newstringreplaced.replace(/[å]/g, "a");
                        newstringreplaced = newstringreplaced.replace(/[ê]/g, "e");
                        newstringreplaced = newstringreplaced.replace(/[ë]/g, "e");
                        newstringreplaced = newstringreplaced.replace(/[è]/g, "e");
                        newstringreplaced = newstringreplaced.replace(/[ï]/g, "ò");
                        newstringreplaced = newstringreplaced.replace(/[î]/g, "i");
                        newstringreplaced = newstringreplaced.replace(/[ì]/g, "i");
                        newstringreplaced = newstringreplaced.replace(/[Ä]/g, "A");
                        newstringreplaced = newstringreplaced.replace(/[Å]/g, "A");
                        newstringreplaced = newstringreplaced.replace(/[É]/g, "E");
                        newstringreplaced = newstringreplaced.replace(/[æ]/g, " ");
                        newstringreplaced = newstringreplaced.replace(/[á]/g, "a");
                        newstringreplaced = newstringreplaced.replace(/[ô]/g, "o");
                        newstringreplaced = newstringreplaced.replace(/[ö]/g, "o");
                        newstringreplaced = newstringreplaced.replace(/[ò]/g, "o");
                        newstringreplaced = newstringreplaced.replace(/[û]/g, "u");
                        newstringreplaced = newstringreplaced.replace(/[ù]/g, "u");
                        newstringreplaced = newstringreplaced.replace(/[ú]/g, "u");
                        newstringreplaced = newstringreplaced.replace(/[ÿ]/g, "y");
                        newstringreplaced = newstringreplaced.replace(/[Ö]/g, "O");
                        newstringreplaced = newstringreplaced.replace(/[Ü]/g, "U");
                        newstringreplaced = newstringreplaced.replace(/[ø]/g, "o");
                        newstringreplaced = newstringreplaced.replace(/[£]/g, " ");
                        newstringreplaced = newstringreplaced.replace(/[Ø]/g, "O");
                        newstringreplaced = newstringreplaced.replace(/[×]/g, "x");
                        newstringreplaced = newstringreplaced.replace(/[ƒ]/g, "f");
                        newstringreplaced = newstringreplaced.replace(/[Á]/g, "A");
                        newstringreplaced = newstringreplaced.replace(/[Í]/g, "I");
                        newstringreplaced = newstringreplaced.replace(/[Ó]/g, "O");
                        newstringreplaced = newstringreplaced.replace(/[Ú]/g, "U");
                        newstringreplaced = newstringreplaced.replace(/[Ë]/g, "E");
                        newstringreplaced = newstringreplaced.replace(/[Ï]/g, "I");
                        newstringreplaced = newstringreplaced.replace(/[Ü]/g, "U");

                        var substring_array = newstringreplaced.split("++#");
                        var total_content = "";
                        for (var a = 1; a < substring_array.length; a++) {
                                if ((substring_array[a - 1].indexOf("<style") == -1) && (substring_array[a - 1].indexOf("<script") == -1)) {
                                        if (substring_array[a].indexOf("</") == 0)
                                                total_content += " " + substring_array[a - 1];
                                }
                                var space = "";
                                var lowcases = total_content.toLowerCase();

                                substring_array2 = lowcases.split(space);
                                var total_content2 = "";
                        }

                        var omitted_characters = ['.', ',', '(', ')', '»', '«', ':', ';', '?', '/', '!', '|', '=', '+', '¿', '[', ']', '-', '_', '~', '&', '1', '2', '3', '4', '5', '6', '7', '8', '9', '0', '?', '#', '¡', '@', '"', '>', '<', "'", '...', '●', '%', '*', '+', '^', '`', '{', '}', 'Ç', '¶'];
                        var carry_on = false;
                        for (var a = 1; a < substring_array2.length; a++) {
                                if (substring_array2[a] == "<") {
                                        carry_on = false;
                                }
                                if (substring_array2[a] == ">") {
                                        carry_on = true;
                                        continue;
                                }
                                if (carry_on == true) {
                                        for (var b = 0; b < omitted_characters.length; b++)
                                                if (substring_array2[a].indexOf(omitted_characters[b]) != -1)
                                                        substring_array2[a] = " ";
                                        total_content2 += substring_array2[a];
                                }
                        }
                        space = " ";
                        substring_array3 = total_content2.split(space);
                        var total_content3 = "";
                        var omitted_words = ['de', 'la', 'en', 'el', '&nsbp', 'y', 'e', 'ni', 'que', 'tanto', 'como',
                                'ni', 'siquiera', 'no', 'solo', 'sino', 'tambien', 'pero', 'aunque', 'al', 'contrario', 'en', 'cambio',
                                'sin', 'a', 'de', 'obstante', 'o', 'bien', 'sea', 'decir', 'esto', 'porque', 'ya', 'dado', 'debido', 'puesto',
                                'como', 'si', 'con', 'tal', 'aunque', 'aun', 'pesar', 'fin', 'consiguiente', 'ende', 'tan', 'apenas', 'yo', 'mi',
                                'nos', 'me', 'nos', 'nosotros', 'nosotras', 'conmigo', 'te', 'ti', 'tu', 'os', 'usted', 'ustedes', 'vos',
                                'vosotras', 'vosotros', 'contigo', 'el', 'ella', 'ello', 'ellos', 'las', 'lo', 'los', 'aquellas', 'aquellos',
                                'aquel', 'aquella', 'aquello', 'esas', 'esa', 'ese', 'esas', 'esos', 'eso', 'esotro', 'esotra', 'esta', 'estas',
                                'este', 'estos', 'este', 'esto', 'mia', 'mias', 'mio', 'mios', 'nuestra', 'alguien', 'algunas', 'algunos',
                                'ultimas', 'ultimos', 'asi', 'se', 'uno', 'mas', 'un', 'ser', 'para', 'mas', 'es', 'por', 'una', 'puede', 'del', 'su', 'son', 'fue', 'sus', 'ha'
                        ];
                        var carry_on = false;
                        for (var a = 1; a < substring_array3.length; a++) {
                                for (var b = 0; b < omitted_words.length; b++) {
                                        if (substring_array3[a] == omitted_words[b])
                                                substring_array3[a] = " ";
                                }
                                total_content3 += " " + substring_array3[a];
                        }
                        $("#text").text(total_content3);
                        $('.look_top').show();
                });
                $(".look_top").click(function() {

                        function GetTop10(arreglo) {
                                var words = new Array();
                                for (var a = 0; a < arreglo.length; a++) {
                                        if (words.indexOf(a) == -1) {
                                                if (words[arreglo[a]] >= 1)
                                                        words[arreglo[a]]++;
                                                else
                                                        words[arreglo[a]] = 1;
                                        }
                                }
                                words.sort();

                                var words_top = [];
                                Object.keys(words).forEach(function(e) {
                                        words_top.push({
                                                word: e,
                                                times: words[e]
                                        }, );
                                });
                                words_top.sort(function(a, b) {
                                        return b.times - a.times;
                                });
                                console.log(words_top);
                                var top_10_words = [];
                                for (var a = 0; a < 10; a++) {
                                        top_10_words.push(words_top[a]);
                                }
                                return top_10_words;
                        }
                        var sim = /\s+/gi;
                        var text = $("#text").text().trim().replace(sim, ' ').split(' ');

                        var top_10_words = GetTop10(text);
                        var contenido = "<table border='2cm'><tr><th><strong>Word</strong></th><th><strong>Times</strong></th></tr>";
                        top_10_words.forEach(function(word) {
                                contenido += "<tr><th>" + word["word"] + "</th><th>" + word["times"] + "</th></tr>";
                        });
                        contenido += "</table>";
                        $("#top").html(contenido);
                });
        </script>
        <br>
        <footer>
                <p style="color:#00231a; font-style:bold; text-decoration:none;">
                School project refactored by <a href="https://www.martin-stepwolf.com/" target="_blank">martin-stepwolf</a> |
                <a href="https://github.com/martin-stepwolf/basic-web-scraping" target="_blank" rel="noopener noreferrer">Source code</a>
                </p>
        </footer>
</body>

</html>