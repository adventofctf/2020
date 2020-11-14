<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Advent of CTF</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="/apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    </head>
    <body>
       <div class="jumbotron bg-transparent mb-0 radius-0">
            <div class="container text-center">
                        <h1 class="display-2">Advent of CT<span class="vim-caret">F</span></h1>
                        <div class="lead mb-3 text-mono text-warning">Your daily dose of CTF for December</div>

                        <img class="mx-auto d-block" src="aoctf.png" alt="Advent of CTF coming soon"/>

<!--
                        <form action="/index.php" method="POST">
                            <div class="form-group">
                                <label for="flag">Flag</label>
                                <input type="text" class="form-control" id="flag" name="flag"  placeholder="Enter the flag">
                            </div>
                            <button type="submit" class="btn btn-warning">Submit</button>
                        </form>
-->
            </div>
        </div>
        <!-- Ceasar worked on this you know. Gx9JFKgVEIysZIAsITtkH19NK0MfLGx/sD== -->

        <?php
        if ($_POST["flag"] && $_POST["flag"] === "NOVI{HEY_1S_Th1S_@_Fla9?}") {
        ?>

            <div class="row">
                <div class="col-6 mx-auto"
                    <div class="card text-center">
                        <div class="card-header">
                            Yes!
                        </div>
                        <div class="card-body">
                            <p>
                                See how fun that was, lets do that every day! I created a whole bunch of challenges just like that.
                            </p>
                        </div>
                        <div class="card-footer">
                            Here come's December....
                        </div>
                    </div>
                </div>
            </div>

        <?php
        }
        ?>

        <div class="row">
            <div class="col-6 mx-auto"
                <div class="card text-center">
                    <div class="card-header">
                        Follow us on Twitter
                    </div>
                    <div class="card-body">
                        <ul class="social-network social-circle">
                            <li><a href="https://twitter.com/adventofctf/" class="icoTwitter" title="Twitter"><i class="fab fa-twitter"></i> @AdventOfCTF</a></li>
                            <li><a href="https://twitter.com/credmp/" class="icoTwitter" title="Twitter"><i class="fab fa-twitter"></i> @credmp - challenge creator</a></li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        The Advent of Code is brought to you by <a href="http://www.novi.nl">NOVI Hogeschool</a>.
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
