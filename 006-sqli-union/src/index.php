<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Advent of CTF 6</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="/apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    </head>
    <body>
        <div class="jumbotron bg-transparent mb-0 radius-0">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 mx-auto">
                        <h1 class="display-2">Advent of CTF <span class="vim-caret">6</span></h1>
                        <div class="lead mb-3 text-mono text-warning">Your daily dose of CTF for December</div>
                    </div>
                </div>
            </div>
        </div>

            <div class="row">
                <div class="col-xl-6 mx-auto"
                    <div class="card text-center">
                        <div class="card-header">
                            <nav class="navbar navbar-expand-lg navbar-light bg-warning">
                                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                                        data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false"
                                        aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <a class="navbar-brand" href="#!">Santabase</a>

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

                                if ($result = $mysql->query("SELECT * FROM secrets WHERE description like '%$search%' or proof like '%$search%'")) {
                            ?>
                                <table class="table table-hover table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>id</th>
                                            <th style="width:50%">Description</th>
                                            <th>Proof</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        while($row = $result->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?= $row["id"] ?> </td>
                                                <td><?= substr_replace($row["description"], '--------', 5) ?> </td>
                                                <td><?= substr_replace($row["proof"], '-------', 5) ?> </td>
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
                                    echo("Error description: " . $mysql->error);
                                }
                                } else {

                                ?>

                                    <p>Hello little elf! Please search for the secret you want to know</p>
                                    <?php
                                    }
                                    ?>
                        </div>
                        <div class="card-footer">
                            In order to comply with the law, only the first 5 characters of each secret is shown.
                        </div>
                    </div>
                </div>
            </div>

    </body>
</html>

