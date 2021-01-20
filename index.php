<!DOCTYPE html>
<html>

<head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <title>Basic Web Scraping</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap-v4.js"></script>
</head>

<body>
        <header class="text-center  bg-light">
                <h2>Basic Web Scraping</h2>
                <hr>
        </header>
        <main class="container">
                <div class="row align-center">
                        <form class="col-12 col-md-6" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get">
                                Type a URL: <input type="text" name="url" placeholder="http(s)://www.domain.com" value="<?php if (isset($_GET['url'])) echo $_GET['url']  ?>"required>
                                <button type="submit" class="btn btn-primary" onclick="$('#look_top').hide();">Get source code</button>
                        </form>
                        <div class="col-12 col-md-6">
                                <button class="btn btn-success" id="clean_data" >Clear data</button>
                                <button class="btn btn-secondary" id="look_top" data-toggle="modal" data-target="#miModal">Look most common words</button>
                        </div>
                </div>
                <div class="row">
                        <h3 class="col-12 text-center">Data</h3>
                        <p class="col-12 alert alert-success" id="text">
                                <?php
                                function display_sourcecode($url)
                                {
                                        $lines = file($url);
                                        $output = "";
                                        foreach ($lines as $line_num => $line) {
                                                // this gets all the lines
                                                $output .= htmlspecialchars($line);
                                        }
                                        return $output;
                                }
                                if (isset($_GET['url'])){
                                        $url = $_GET['url'];
                                        echo display_sourcecode($url);
                                }
                                ?>
                        </p>
                </div>
        </main>
        <footer class="text-center">
                <p>
                        <a href="https://github.com/martin-stepwolf/basic-web-scraping" target="_blank" rel="noopener noreferrer">Source code</a>
                </p>
        </footer>
        <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document" align="center">
                        <div class="modal-content">
                                <div class="modal-header" align="center">
                                        <h5 class="modal-title" id="exampleModalLabel">Top 10 most common words!</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <div class="table-responsive">
                                        <table class="table table-striped table-secondary">
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
        <script src="js/functions.js"></script>
        <script src="js/index.js"></script>
</body>

</html>