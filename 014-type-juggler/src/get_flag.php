<?php

ini_set('display_errors', 0);

include("flag.php");

if (isset($_POST["password"], $_POST["verifier"])) {
    $password = $_POST["password"];
    $verifier = $_POST["verifier"];

    $hash = sha1($password + $secret_salt);
    $reference = substr($hash, 0, 7);

    if ($verifier === $reference) {
        echo $flag;
        die();
    }
}

header("Location: /index.php?error=That was not right.");
exit();

?>
