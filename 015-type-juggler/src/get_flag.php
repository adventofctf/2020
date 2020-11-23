<?php

ini_set('display_errors', 0);

include("flag.php");

if (isset($_POST["flag"])) {
    $f = $_POST["flag"];

    if (strcmp($f, $flag) == 0 || sha1($flag) == sha1($f)) {
        echo $flag;
        die();
    }
}

header("Location: /index.php?error=Wrong flag");
exit();

?>
