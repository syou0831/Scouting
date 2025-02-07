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

if (is_bool($rs)) {
    // var_dump($mysqli->error);
} else {
    $rs->fetch_assoc();
}

// $rs2 = $mysqli->query("SELECT MAX(PersonID) FROM PersonData");

// $row2 = $rs2->fetch_assoc();

// $rs3 = $mysqli->query("INSERT INTO TeamMemberData
// (GroupID, DeptID, TeamID, PersonID, EkimuID)
// VALUES 
// (" . $_SESSION["GID"] . ",
// " . $ID . ",
// " . $_POST["Team"] . ",
// " . $row2["MAX(PersonID)"] . ",
// " . $_POST["Ekimu"] . "
// )
// ");
// if (is_bool($rs3)) {
// } else {
//     $rs3->fetch_assoc();
// }

$mysqli->close();

header('Location:  ../HTML/PersonAdd.php');
exit;
