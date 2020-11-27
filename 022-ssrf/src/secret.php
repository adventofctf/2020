<?php

function check_secret() {
    $ip = $_SERVER['REMOTE_ADDR'];

    if (strcmp($ip, "127.0.0.1")) {
        return "deny";
    } else {
        return "allow";
    }

    return "deny";
}

function get_flag() {
    return "NOVI{asking_for_a_friend}";
}

?>
