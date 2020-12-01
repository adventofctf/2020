<?php
if ($_POST["username"] && !$_COOKIE["authenticated"]){
    $cookie = base64_encode(json_encode(["guest"=>"true","admin"=>"false"]));
    setcookie("authenticated", $cookie , time() + (86400 * 30), "/", "02.adventofctf.com", true);
} else if ($_COOKIE["authenticated"]) {
   $cookie = $_COOKIE["authenticated"]; 
}
?>

<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Advent of CTF 2</title>
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
                        <h1 class="display-2">Advent of CTF <span class="vim-caret">2</span></h1>
                        <div class="lead mb-3 text-mono text-warning">Your daily dose of CTF for December</div>


                    </div>
                </div>
<?php

if ($cookie) {
    $data = json_decode(base64_decode($cookie), true);
?>

    <div class="row">
        <div class="col-xl-6 mx-auto">
            <div class="card text-center">
                <div class="card-header">
                    Show me the flag....
                </div>

                <div class="card-body">
                    <?php

                    if ($data["guest"] === "false" && $data["admin"] === "true") {
                    ?>
                    <p>
                        <span class="badge badge-warning">FLAG</span>
                        NOVI{cookies_are_bad_for_auth}
                    </p>
                    <?php
                    } else {
                    ?>
                        I'm sorry Guest, I can not do that.
                    <?php
                    }
                    ?>
                </div>
                <div class="card-footer">
                    "Whoop Whoop" - @GevuldeCookie
                </div>
            </div>
        </div>
    </div>
<?php
} else {
?>
        <div class="row">
            <div class="col-xl-6 mx-auto">
                <div class="card text-center">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">

                        <form action="/index.php" method="POST">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username"  placeholder="Enter username">
                                <label for="pasword">Password</label>
                                <input type="password" class="form-control" id="password" name="password"  placeholder="Enter password">
                            </div>
                            <button type="submit" class="btn btn-warning">Submit</button>
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        Do not try too hard
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-margin-30">
            <div class="col-xl-6 mx-auto">
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

<?php
}
?>
            </div>
        </div>
    </body>
</html>
