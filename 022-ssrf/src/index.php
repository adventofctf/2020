<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Advent of CTF 22</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <style>
         .row-margin-05 { margin-top: 0.5em; }
         .row-margin-10 { margin-top: 1.0em; }
         .row-margin-20 { margin-top: 2.0em; }
         .row-margin-30 { margin-top: 3.0em; }
        </style>
    </head>
    <body>

        <div class="jumbotron bg-transparent mb-0 radius-0">
            <div class="container fluid">
                <div class="row">
                    <div class="col-xl-6 mx-auto">
                        <h1 class="display-2">Advent of CTF <span class="vim-caret">22</span></h1>
                        <div class="lead mb-3 text-mono text-warning">Your daily dose of CTF for December</div>


                        <div class="row">
                            <div class="col-xl-12 mx-auto">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <h2>The big reveal</h2>
                                    </div>
                                    <div class="card-body">
                                        <?php
                                        if (!isset($_GET["image"])) {
                                        ?>
                                            <a href="/index.php?image=cat.jpg">Is this santa?</a>
                                        <?php
                                        } else {
                                            $path = $_GET["image"];
                                            if (strpos($path,"secret") !== false) {
                                                $path="cat.jpg";
                                            }
                                            $image = file_get_contents($path);
                                            echo '<img src="data:image/jpeg;base64,'.base64_encode($image).'" width="100%"/>';

                                        }
                                        ?>
                                    </div>
                                    <div class="card-footer text-center">
                                        Almost there
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-margin-30">
                            <div class="card mb-3 bg-dark text-white">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src="/logo.png">
                                        </div>
                                        <div class="col-md-9 offset-md-1 align-middle">
                                            <p class="text-center">
                                                <span class="align-middle">
                                                    The Advent of CTF is brought to you by <a href="http://www.novi.nl">NOVI Hogeschool</a>. It is built by <a href="https://twitter.com/credmp/" class="icoTwitter" title="Twitter"><i class="fab fa-twitter"></i> @credmp</a>. If you are looking for a Dutch Cyber Security Bachelor degree or bootcamp, <a href="https://www.novi.nl">check us out</a>.
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </body>
</html>
