<?php

if($_SERVER["SERVER_NAME"] == 'localhost'){
    //docker
    define( 'HOST_NAME','mysql');
    define( 'USER_NAME', 'user1');
    define( 'DB_PASS', 'user1password');
    define( 'DB_NAME', 'scouting');
    define( 'UTF8', 'utf-8');
} else {
    //lolipop
    define( 'HOST_NAME','mysql310.phy.lolipop.lan');
    define( 'USER_NAME', 'LAA1607031');
    define( 'DB_PASS', 'password');
    define( 'DB_NAME', 'LAA1607031-webshop');
    define( 'UTF8', 'utf8');
}

define( 'SESSION_TIME', '30');
?>
