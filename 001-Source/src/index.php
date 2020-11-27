<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Advent of CTF 1</title>
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

        <!--[if lt IE 8]>
            <p class="browserupgrade">
            You are using an <strong>outdated</strong> browser. Please
            <a href="http://browsehappy.com/">upgrade your browser</a> to improve
            your experience.
            </p>
        <![endif]-->
        <div class="jumbotron bg-transparent mb-0 radius-0">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 mx-auto">
                        <h1 class="display-2">Advent of CTF <span class="vim-caret">1</span></h1>
                        <div class="lead mb-3 text-mono text-warning">Your daily dose of CTF for December</div>
                        <div class="text-darkgrey text-mono my-2">
                            Every day up to Christmas will feature 1 new CTF challenge for you to solve. Join others in competing for the top spot on the leaderboard!
                        </div>

                        <p class="mt-5 text-grey text-spacey">
                            We start off with an easy flag, just to get you familiar with the CTF system. Can you find the flag?
                        </p>

                        <div class="row">
                            <div class="col-xl-12 mx-auto">
                                <div class="card text-center">
                                    <div class="card-header">
                                        Login
                                    </div>
                                    <div class="card-body">
                                        <?php
                                        if ($_GET["password"] === "advent_of_ctf_is_here") {
                                        ?>
                                            <p>
                                                Here is a flag: NOVI{L3T_7H3_M0NTH_0F_FUN_START}
                                            </p>
                                            <p>
                                                Enter the flag on the <a href="https://ctfd.adventofctf.com">score board</a> to grab your points! If you want to brag about owning the challenges on social media go grab your badge, using the flag, on the <a href="https://badges.adventofctf.com">badge page</a>.
                                        <?php
                                        } else {
                                        ?>
                                            <form action="/index.php" method="GET">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="password" name="password"  placeholder="Enter Santa's Password">
                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-warning">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="card-footer">
                                        Santa is a huge fan of Star Wars, did you know that?
                                    </div>
                                </div>
                            </div>
                            <div class="row row-margin-30">
                                <div class="card mb-3 text-center bg-dark text-white">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <img src="/logo.png">
                                            </div>
                                            <div class="col-md-9 offset-md-1 align-middle">
                                                <p class="text-center">
                                                    <span class="align-middle">
                                                        The Advent of CTF is brought to you by <a href="http://www.novi.nl">NOVI Hogeschool</a>. It is built by <a href="https://twitter.com/credmp/" class="icoTwitter" title="Twitter"><i class="fab fa-twitter"></i> @credmp</a>. If you are looking for a Dutch Cyber Security Bachelor degree or bootcamp, <a href="https://www.novi.nl">check us out</a>. (Dutch follows) Als je al weet dat je een opleiding wilt volgen, neem dan <a href="https://app.hubspot.com/meetings/novi/hbo-cs">contact op met Valerie</a>.
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
        </div>
        <!-- This is an odd encoded thing right? YWR2ZW50X29mX2N0Zl9pc19oZXJl -->

    </body>
</html>
