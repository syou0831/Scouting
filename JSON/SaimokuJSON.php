<?php
require '../Data/dbConf.inc';
$mysqli = new mysqli(HOST_NAME, USER_NAME, DB_PASS);
$mysqli->select_db(DB_NAME);
$mysqli->set_charset(UTF8);

$rs = $mysqli->query("SELECT * FROM SaimokuData");

while ($row = $re->fetch_assoc()) {
    $Data[] = array(
        'KaikyuID' => $row["KaikyuID"],
        'KaikyuTheme' => $row["KaikyuTheme"],
        'FirstID' => $row["FirstID"],
        'SecondID' => $row["SecondID"],
        'ThirdID' => $row["ThirdID"],
        'GenreText' => $row["GenreText"],
        'DaimokuText' => $row["DaimokuText"],
    );
}

$rs->free();
$mysqli->close();

header('Content-Type: application/json');
echo json_encode($Data);
