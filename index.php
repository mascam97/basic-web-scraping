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
                                <div class="modal-header" align="center">
                                        <font face="Anton" color=white size="4px">See the Top 10 repeated Words!</font>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <div class="container">
                                <table border='2cm'>
                                        <thead>
                                                <th><strong>Word</strong></th>
                                                <th><strong>Times</strong></th>
                                        </thead>
                                        <tbody id="top"></tbody>
                                </table>
                                </div>
                        </div>
                </div>
        </div>
        <div class="esp jumbotron row">
                <div class="col-12">
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get">
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
                if (isset($_GET['url'])){
                        $url = $_GET['url'];
                        echo display_sourcecode($url);
                }
                ?>
        </p>
        <br>
        <footer>
                <p>
                        <a href="https://github.com/martin-stepwolf/basic-web-scraping" target="_blank" rel="noopener noreferrer">Source code</a>
                </p>
        </footer>
        <script src="js/functions.js"></script>
        <script src="js/index.js"></script>
</body>

</html>