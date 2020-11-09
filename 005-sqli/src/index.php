
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Advent of CTF 5</title>
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
                    <div class="col-xl-6">
                        <h1 class="display-2">Advent of CTF <span class="vim-caret">5</span></h1>
                        <div class="lead mb-3 text-mono text-warning">Your daily dose of CTF for December</div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $loggedin=false;
        if ($_POST["username"] !== null && $_POST["password"] !== null) {
            $username = $_POST["username"];
            $password = $_POST["password"];

            $mysql = new mysqli("127.0.0.1", "admin", "novi!", "testdb");
            if ($mysql->connect_errno) {
                printf("Connect failed: %s\n", $mysqli->connect_error);
                exit();
            }

            if ($result = $mysql->query("SELECT count(*) FROM users WHERE username='$username' AND password='$password'")) {
                $row = $result->fetch_row();
                $result->close();

                if ($row[0] == 1) {
                    $loggedin=true;
        ?>
            <div class="row">
                <div class="col-6 mx-auto"
                    <div class="card text-center">
                        <div class="card-header">
                            FLAG
                        </div>
                        <div class="card-body">
                            <p>
                                Using user input in a query directly can have such horrible consequences! Never trust your end user.
                            </p>
                        </div>
                        <div class="card-footer">
                            <div class="alert alert-warning" role="alert">
                                <span class="badge badge-warning">FLAG</span>
                                NOVI{th3_classics_with_a_7wis7}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php
                  } // count
        } // query
        else {
            echo("Error description: " . $mysql->error);
        }
        }
        ?>

        <?php
        if ($loggedin === false) {
        ?>
        <div class="row">
            <div class="col-4 mx-auto">
                <div class="card text-center">
                    <div class="card-header">
                        Administrator Login
                    </div>
                    <div class="card-body">

                        <form action="/index.php" method="post">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username"  placeholder="Enter username" required>
                                <label for="pasword">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                            </div>
                            <button type="submit" class="btn btn-warning">Submit</button>
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        A classic, with a twist.
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        ?>

    </body>
</html>

