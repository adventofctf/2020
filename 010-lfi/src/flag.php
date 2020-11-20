<?php
?>

<h4>Why does Egische keep showing up?</h4>
<?php

if ($_COOKIE["zeroten"]) {
    $data = json_decode(base64_decode($_COOKIE["zeroten"]), true);
}

if ($role === "d033e22ae348aeb5660fc2140aec35850c4da997") {
?>
    <p>
        The dark secret on this page is: NOVI{LFI_1s_ask1ng_f0r_tr0bl3}
    </p>
<?
} else {
?>
    <p>
        You are on the right page, but you cannot see what you want yet. Go get promoted!
    </p>
<?php
}
?>
