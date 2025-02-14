<?php
require '../Data/dbConf.inc';
$mysqli = new mysqli(HOST_NAME, USER_NAME, DB_PASS);
$mysqli->select_db(DB_NAME);
$mysqli->set_charset(UTF8);

$PID = $_GET["PID"];
$PASS = $_GET["PASS"];

$response;

$rs = $mysqli->query('SELECT Password, PersonDataID FROM PersonData WHERE PersonID = "' . $PID . '"');
$row = $rs->fetch_assoc();

$response = password_verify($PASS, $row["Password"]);

$Data[] = array(
    'PID' => $PID,
    'PASS' => $PASS,
    'ID' => $row["PersonDataID"],
    'response' => $response
);

// echo password_hash("password", PASSWORD_DEFAULT);

header('Content-Type: application/json');
echo json_encode($Data);
