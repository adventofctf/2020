<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Advent of CTF 7</title>
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
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 mx-auto">
                        <h1 class="display-2">Advent of CTF <span class="vim-caret">7</span></h1>
                        <div class="lead mb-3 text-mono text-warning">Your daily dose of CTF for December</div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6 mx-auto">
                    <div class="card text-center">
                        <div class="card-header">
                            <nav class="navbar navbar-expand-lg navbar-light bg-warning">
                                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                                        data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false"
                                        aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <a class="navbar-brand" href="#!">naughty list</a>

                                <form class="form-inline my-2 my-lg-0" actions="/index.php" method="post">
                                    <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search">
                                </form>
                            </nav>
                        </div>
                        <div class="card-body">

                            <?php
                            if ($_POST["search"]) {
                                $search = $_POST["search"];

                                $mysql = new mysqli("127.0.0.1", "admin", "novi!", "testdb");
                                if ($mysql->connect_errno) {
                                    printf("Connect failed: %s\n", $mysqli->connect_error);
                                    exit();
                                }

                                if ($result = $mysql->query("select badthing from naughty where username='$search'")) {
                            ?>
                                <table class="table table-hover table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th style="width:50%">Why?</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        while($row = $result->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?= $row["badthing"] ?> </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>


                                <?php
                                $result->close();
                                } // query
                                else {
                                    //echo("Error description: " . $mysql->error);
                                }
                                }
                                ?>
                        </div>
                        <div class="card-footer">
                            Enter the <b>username</b> of the person on the <b>naughty</b> list and you will get a present.
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

    </body>
</html>

