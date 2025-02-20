<?php
// ini_set('session.gc_maxlifetime', 30);
ini_set('session.gc_probability', 1);
ini_set('session.gc_divisor', 1);

ini_set("session.cookie_httponly", 1);
ini_set("session.cookie_secure", 1);
ini_set("session.use_strict_mode", 1);

session_start();
session_regenerate_id(true);
unset($_SESSION["eMessage"]);
$ID = $_POST["ID"];
$PASS = $_POST["PASS"];

require '../Data/dbConf.inc';
$mysqli = new mysqli(HOST_NAME, USER_NAME, DB_PASS);
$mysqli->select_db(DB_NAME);
$mysqli->set_charset(UTF8);

$rs = $mysqli->query('SELECT Password, GroupID FROM PersonData WHERE PersonID = "' . $ID . '"');

$row = $rs->fetch_assoc();

if (password_verify($PASS, $row["Password"])) {
    $_SESSION["GID"] = $row["GroupID"];
    header("Location: ../HTML/index.php");
    exit;
} else {
    $_SESSION["eMessage"] = "エラー";
    header("Location: ../HTML/Login.php");
    exit;
}
