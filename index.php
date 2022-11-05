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

<body class="min-h-screen bg-gray-100">
        <header class="p-4 bg-gray-200 text-gray-800">
                <h2 class="capitalize text-2xl font-bold text-center">Basic Web Scraping</h2>
        </header>
        <main class="my-2 container mx-auto">
                <div class="p-2 border-2 border-gray-400 text-gray-900 shadow-lg">
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get">
                                <label class="p-2" for="url">Type a URL (preferably in spanish):</label>
                                <input class="placeholder-gray-600 text-green-600 border-2 p-2 w-full sm:w-96 focus:shadow-outline" type="text" id="url" name="url" placeholder="http(s)://www.domain.com" value="<?php if (isset($_GET['url'])) echo $_GET['url']  ?>" required>
                                <button class="bg-blue-700 hover:bg-blue-600 text-blue-200 py-2 px-5 rounded w-full sm:w-48" type="submit">Get information</button>
                        </form>
                        <p class="text-sm text-gray-900">
                                Description: Project to get source code (HTML) from a website and process it to clean information (no html tags, javascript, css code and some words) and get the most common words.
                                <a href="https://github.com/mascam97/basic-web-scraping" target="_blank" rel="noopener noreferrer">Source code</a> <br>
                                <strong class="text-gray-800">Note: This website does not collect information about you and your interaction (neither cookies nor database).</strong>
                        </p>
                </div>
                <div class="mt-2 flex flex-wrap">
                        <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6  pr-2">
                                <div class="p-2 border-2 border-gray-400 bg-blue-200 text-blue-800">
                                        <h4 class="text-lg font-semibold">Most common words</h4>
                                        <ol class="capitalize list-disc pl-4" id="most-common-words"></ol>
                                </div>
                                <div class="p-2 mt-2 border-2 border-gray-400  bg-red-200 text-red-800">
                                        <h4 class="text-lg font-semibold">Most common tags</h4>
                                        <ol class="list-disc pl-4" id="most-common-tags"></ol>
                                </div>
                        </div>
                        <div class="w-full sm:w-1/2 md:w-2/3 lg:w-3/4 xl:w-5/6 ">
                                <div class="p-2 mt-2 border-2 border-gray-400 bg-green-200 text-green-800">
                                        <h4 class="text-lg font-semibold">Information</h4>
                                        <hr>
                                        <p class="tracking-wide leading-relaxed text-justify" id="info"></p>
                                </div>
                        </div>
                        <div class="w-full">
                                <div class="p-2 mt-2 border-2 border-gray-400 bg-gray-200 text-gray-800">
                                        <h3 class="text-lg font-semibold">Data</h3>
                                        <p class="tracking-wide leading-relaxed text-justify" id="text">
                                                <?php
                                                if (isset($_GET['url'])) {
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
                        </div>
                </div>
        </main>
        <script type="module" src="js/index.js"></script>
</body>

</html>