<?php
session_start();
require 'dbConf.inc';
$mysqli = new mysqli(HOST_NAME, USER_NAME, DB_PASS);
$mysqli->select_db(DB_NAME);
$mysqli->set_charset(UTF8);
if ($mysqli->connect_errno) {
}


$Name = $_POST["Name"];
$NameKana = $_POST["NameKana"];
$BirthdayA = $_POST["Birthday"];
$Address = $_POST["Address"];
$Tel = $_POST["FirstTel"] . "-" . $_POST["SecondTel"] . "-" . $_POST["ThirdTel"];
$Sex = $_POST["sex"];
$StateDate = $_POST["StateDate"];

$rs = $mysqli->query("INSERT INTO PersonData
(Password, GroupID, Name, NameFurigana, Birthday, Address, Tel, sex, StateDate,Adult) 
VALUES 
('
" . '$2y$10$Sc096WybgnpW9bThcbjX6eAqrwwlGIgCtosSJCecW5PvLk0aWDC6u' . "',
" . $_SESSION["GID"] . ",
'" . $Name . "',
'" . $NameKana . "',
'" . $BirthdayA . "',
'" . $Address . "',
'" . $Tel . "',
'" . $Sex . "',
'" . $StateDate . "',
'" . $Adult . "'
)");

$rs = $mysqli->query("SELECT Max(PersonID) AS PersonID FROM personData")->fetch_array();
$rs2 = $mysqli->query("SELECT * FROM SaimokuData");

while ($row = $rs2->fetch_assoc()) {
    $mysqli->query("INSERT INTO SaimokuPersonData (PersonID, KaikyuID, FirstID, SecondID, ThirdID) 
                        VALUE 
        (" . $rs["PersonID"] . "," .
        $row["KaikyuID"] . "," .
        $row["FirstID"] . "," .
        $row["SecondID"] . "," .
        $row["ThirdID"] . ")");
}
$mysqli->close();

header('Location:  ../HTML/PersonAdd.php');
exit;
