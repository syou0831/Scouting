<?php
require '../Data/dbConf.inc';
$mysqli = new mysqli(HOST_NAME, USER_NAME, DB_PASS);
$mysqli->select_db(DB_NAME);
$mysqli->set_charset(UTF8);

$PID = $_GET["PID"];

$rs = $mysqli->query("SELECT DISTINCT * FROM SaimokuData
JOIN SaimokuPersonData
ON SaimokuData.KaikyuID = SaimokuPersonData.KaikyuID AND SaimokuData.FirstID = SaimokuPersonData.FirstID AND SaimokuData.SecondID = SaimokuPersonData.SecondID AND SaimokuData.ThirdID = SaimokuPersonData.ThirdID
WHERE PersonDataID = " . $PID);

while ($row = $rs->fetch_assoc()) {
    if ($row["CompletedDate"] == null) {
        $row["CompletedDate"] = "";
    }

    if ($row["SyouninsyaName"] == null) {
        $row["SyouninsyaName"] = "";
    }

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
