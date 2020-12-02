<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Advent of CTF 3</title>
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
                        <h1 class="display-2">Advent of CTF <span class="vim-caret">3</span></h1>
                        <div class="lead mb-3 text-mono text-warning">Your daily dose of CTF for December</div>


                    </div>
                </div>
            </div>
        </div>
<?php
if ($_GET["password"] == base64_encode($_GET["username"] . '-NOVI')) {
?>

    <div class="row">
        <div class="col-6 mx-auto">
            <div class="card text-center">
                <div class="card-header">
                    FLAG
                </div>
                <div class="card-body">
                    <p>
                        Having javascript check credentials is not very safe.
                    </p>
                    <p>
                        Be sure to grab your points and the badge for social media!
                    </p>
                </div>
                <div class="card-footer">
                    <div class="alert alert-warning" role="alert">
                        <span class="badge badge-warning">FLAG</span>
                        NOVI{javascript_is_not_s@fe}
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
else {
?>
        <div class="row">
            <div class="col-4 mx-auto">
                <div class="card text-center">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">

                        <form action="/index.php" onsubmit='checkPass(); return false'>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username"  placeholder="Enter username">
                                <label for="pasword">Password</label>
                                <input type="password" class="form-control" id="password"  placeholder="Enter password">
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


        <script type='text/javascript' src='login.js'></script>


<?php
}
?>
  </body>
</html>
