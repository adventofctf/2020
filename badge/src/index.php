<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Advent of CTF Badge</title>
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
                        <h1 class="display-2">Advent of CTF <span class="vim-caret">Badge</span></h1>
                        <div class="lead mb-3 text-mono text-warning">Your daily dose of CTF for December</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6 mx-auto"
                <div class="card text-center">
                    <div class="card-header">
                        Enter a flag for a badge
                    </div>
                    <div class="card-body">
                        <form class="form-inline my-2 my-lg-0" action="/badge.php" method="POST">
                            <div class="input-group mx-auto">
                                <input type="text" class="form-control" name="flag" placeholder="Flag" aria-label="Flag" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-info" type="submit">Go!</button>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="card-footer">
                        Made possible by NOVI Hogeschool, built by @credmp
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
