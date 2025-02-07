<?php
// ini_set('session.gc_maxlifetime', 30);
ini_set('session.gc_probability', 1);
ini_set('session.gc_divisor', 1);
session_start();
unset($_SESSION["eMessage"]);
$ID = $_POST["ID"];
$PASS = $_POST["PASS"];

require '../Data/dbConf.inc';
$mysqli = new mysqli(HOST_NAME, USER_NAME, DB_PASS);
$mysqli->select_db(DB_NAME);
$mysqli->set_charset(UTF8);

$row = $mysqli->query('SELECT Password FROM GroupData WHERE GroupID =' . $ID)->fetch_assoc();

if (password_verify($PASS, $row["Password"])) {
    $_SESSION["GID"] = $ID;
    header("Location: ../HTML/index.php");
    exit;
} else {
    $_SESSION["eMessage"] = "エラー";
    header("Location: ../HTML/Login.php");
    exit;
}
