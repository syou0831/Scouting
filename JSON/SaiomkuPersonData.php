<?php

session_start();
if (empty($_SESSION["GID"])) {
    header("Location: ../HTML/Login.php");
}

require '../Data/dbConf.inc';
$mysqli = new mysqli(HOST_NAME, USER_NAME, DB_PASS);
$mysqli->select_db(DB_NAME);
$mysqli->set_charset(UTF8);

$rs = $mysqli->query("SELECT * FROM SaimokuData
JOIN SaimokuPersonData
ON SaimokuData.KaikyuID = SaimokuPersonData.KaikyuID AND SaimokuData.FirstID = SaimokuPersonData.FirstID AND SaimokuData.SecondID = SaimokuPersonData.SecondID AND SaimokuData.ThirdID = SaimokuPersonData.ThirdID
WHERE PersonID = " . $_GET["PID"]);
