<!DOCTYPE html>
<html>

<head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <title>Basic Web Scraping</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
        <header class="text-center  bg-light">
                <h2>Basic Web Scraping</h2>
                <hr>
        </header>
        <main class="container">
                <div class="row align-center">
                        <form class="col-12 col-md-6" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get">
                                <div class="form-group">
                                        <label for="url">Type a URL (preferably in spanish):</label>
                                        <input type="text" class="form-control" id="url" name="url" placeholder="http(s)://www.domain.com" value="<?php if (isset($_GET['url'])) echo $_GET['url']  ?>"required>
                                </div>
                                <button type="submit" class="btn btn-primary">Get information</button>
                        </form>
                        <div class="col-12 col-md-6">
                                Description: Project to get source code (HTML) from a website and process it to clean information (no html tags, javascript, css code and some words) and get the most common words.
                                <a href="https://github.com/martin-stepwolf/basic-web-scraping" target="_blank" rel="noopener noreferrer">Source code</a> <br>
                                <strong>Note: This website does not collect information about you and your interaction (neither cookies nor database).</strong>
                        </div>
                </div>
                <div class="row">
                        <div class="col-12 col-md-4">
                                <h4>Most common words</h4> <hr>
                                <ol class="list-group"  id="most-common-words"></ol>
                                <h4>Most common tags</h4> <hr>
                                <ol class="list-group"  id="most-common-tags"></ol>
                        </div>
                        <div class="col-12 col-md-8">
                                <h4>Information</h4> <hr>
                                <p id="info" class="alert alert-success"></p>
                        </div>
                </div>
                <div class="row">
                        <h3 class="col-12 text-center">Data</h3>
                        <p class="col-12 alert alert-secondary" id="text">
                                <?php
                                if (isset($_GET['url'])){
                                        $lines = file($_GET['url']);
                                        $output = "";
                                        foreach ($lines as $line_num => $line) {
                                                // this gets all the lines
                                                $output .= $line;
                                        }
                                        echo htmlspecialchars($output);
                                }
                                ?>
                        </p>
                </div>
        </main>
        <script type="module" src="js/index.js"></script>
</body>

</html>