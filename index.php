<!DOCTYPE html>
<html>

<head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <title>Basic Web Scraping</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- TODO: Use webpack to generate css files with Tailwindcss -->
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
        <header>
                <h2>Basic Web Scraping</h2>
                <hr>
        </header>
        <main>
                <div>
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get">
                                <div>
                                        <label for="url">Type a URL (preferably in spanish):</label>
                                        <input type="text" id="url" name="url" placeholder="http(s)://www.domain.com" value="<?php if (isset($_GET['url'])) echo $_GET['url']  ?>"required>
                                </div>
                                <button type="submit">Get information</button>
                        </form=>
                        <div>
                                Description: Project to get source code (HTML) from a website and process it to clean information (no html tags, javascript, css code and some words) and get the most common words.
                                <a href="https://github.com/martin-stepwolf/basic-web-scraping" target="_blank" rel="noopener noreferrer">Source code</a> <br>
                                <strong>Note: This website does not collect information about you and your interaction (neither cookies nor database).</strong>
                        </div>
                </div=>
                <div>
                        <div>
                                <h4>Most common words</h4> <hr>
                                <ol id="most-common-words"></ol>
                                <h4>Most common tags</h4> <hr>
                                <ol id="most-common-tags"></ol>
                        </div=>
                        <div>
                                <h4>Information</h4> <hr>
                                <p id="info"></p>
                        </div>
                </div>
                <div>
                        <h3>Data</h3=>
                        <p id="text">
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