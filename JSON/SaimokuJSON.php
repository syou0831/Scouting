<?php
require '../Data/dbConf.inc';
$mysqli = new mysqli(HOST_NAME, USER_NAME, DB_PASS);
$mysqli->select_db(DB_NAME);
$mysqli->set_charset(UTF8);

$PID = $_GET["PID"];
$KID = $_GET["KID"];

$rs = $mysqli->query("SELECT DISTINCT * FROM SaimokuData
JOIN SaimokuPersonData
ON SaimokuData.KaikyuID = SaimokuPersonData.KaikyuID AND SaimokuData.FirstID = SaimokuPersonData.FirstID AND SaimokuData.SecondID = SaimokuPersonData.SecondID AND SaimokuData.ThirdID = SaimokuPersonData.ThirdID
WHERE PersonID = " . $PID);

while ($row = $rs->fetch_assoc()) {
    $Data[] = array(
        'KaikyuID' => $row["KaikyuID"],
        'KaikyuTheme' => $row["KaikyuTheme"],
        'FirstID' => $row["FirstID"],
        'SecondID' => $row["SecondID"],
        'ThirdID' => $row["ThirdID"],
        'GenreText' => $row["GenreText"],
        'DaimokuText' => $row["DaimokuText"],
        'CompletedDate' => $row["CompletedDate"],
        'SyouninsyaName' => $row["SyouninsyaName"],
    );
}

header('Content-Type: application/json');
echo json_encode($Data);
