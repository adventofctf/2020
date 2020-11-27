<?php
error_reporting(0);

ini_set('display_errors', 0);
ini_set('open_basedir', '/var/www/html:/tmp');

# Make sure no evil things are passed in the URL
$file = 'filters.php';
$func = isset($_GET['function'])?$_GET['function']:'filters';
call_user_func($func,$_GET);
include($file);

# Save the name for later
session_start();
if ($_POST["name"]){
    $_SESSION["name"] = $_POST["name"];
}

header("Location: /index.php");
exit();
?>

