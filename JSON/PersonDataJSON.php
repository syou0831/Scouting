<?php
require '../Data/dbConf.inc';
$mysqli = new mysqli(HOST_NAME, USER_NAME, DB_PASS);
$mysqli->select_db(DB_NAME);
$mysqli->set_charset(UTF8);

$rs = $mysqli->query("SELECT Name, NameFurigana, Birthday, Address, Tel, Sex FROM PersonData WHERE PersonID = 1");
$row = $rs->fetch_assoc();

$rs2 = $mysqli->query("SELECT * FROM GroupData WHERE GroupID = 1");
$row2 = $rs2->fetch_assoc();

$Data[] = array(
    'Name' => $row["Name"],
    'NameFurigana' => $row["NameFurigana"],
    'Birthday' => $row["Birthday"],
    'Address' => $row["Address"],
    'Tel' => $row["Tel"],
    'Sex' => $row["Sex"],
    'Prefecture' => $row["Prefecture"],
    'Area' => $row["Area"],
    'City' => $row["City"],
    'GroupNum' => $row["GroupNum"]
);

$rs->free();
$mysqli->close();

header('Content-Type: application/json');
echo json_encode($Data);
