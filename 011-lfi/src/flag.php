<?php
if(!defined('MyConst')) {
   die('Direct access not permitted');
}
?>

<h4>Why does Egische keep showing up?</h4>
<?php

if ($_COOKIE["zerooneone"]) {
    $data = json_decode(base64_decode($_COOKIE["zerooneone"]), true);
}

if (false) {
?>
    <p>
        The dark secret on this page is: NOVI{LFI_and_st1ll_you_f0und_it}
    </p>
<?
} else {
?>
    <p>
        You are on the right page, but you cannot see what you want.
    </p>
<?php
}
?>
