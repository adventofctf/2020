<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>CTF 2</title>
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
                        <h1 class="display-2">Advent of CTF <span class="vim-caret">X</span></h1>
                        <div class="lead mb-3 text-mono text-warning">Your daily dose of CTF for December</div>


                    </div>
                </div>
            </div>
        </div>

        <div class="row">
<div class="card mb-6 mx-auto text-center bg-warning text-dark">
  <div class="card-body">
    <blockquote class="card-blockquote">
<pre>
<?php
libxml_disable_entity_loader (false);
$xmlfile = file_get_contents('php://input');

if ($xmlfile) {
?>

<?php
    $dom = new DOMDocument();
    $dom->loadXML($xmlfile, LIBXML_NOENT | LIBXML_DTDLOAD);
    $info = simplexml_import_dom($dom);

    echo htmlspecialchars( $info->asXML() );
}
?>
</pre>
      <footer>This is the result of your
        <cite title="Attack type">POST</cite>
      </footer>
    </blockquote>
  </div>
</div>

        </div>
  </body>
</html>
