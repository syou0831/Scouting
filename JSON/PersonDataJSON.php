<?php
require '../Data/dbConf.inc';
$mysqli = new mysqli(HOST_NAME, USER_NAME, DB_PASS);
$mysqli->select_db(DB_NAME);
$mysqli->set_charset(UTF8);

$PID = $_GET["PID"];

$rs = $mysqli->query("SELECT GroupID, Name, NameFurigana, Birthday, Address, Tel, Sex FROM PersonData WHERE PersonDataID = " . $PID);
$row = $rs->fetch_assoc();

$rs2 = $mysqli->query("SELECT * FROM GroupData WHERE GroupID = " . $row["GroupID"]);
$row2 = $rs2->fetch_assoc();

$Data[] = array(
    'Name' => $row["Name"],
    'NameFurigana' => $row["NameFurigana"],
    'Birthday' => $row["Birthday"],
    'Address' => $row["Address"],
    'Tel' => $row["Tel"],
    'Sex' => $row["Sex"],
    'Prefecture' => $row2["Prefecture"],
    'Area' => $row2["Area"],
    'City' => $row2["City"],
    'GroupNum' => $row2["GroupNum"]
);

$rs->free();
$mysqli->close();

header('Content-Type: application/json');
echo json_encode($Data);
