<?php
require '../Data/dbConf.inc';
$mysqli = new mysqli(HOST_NAME, USER_NAME, DB_PASS);
$mysqli->select_db(DB_NAME);
$mysqli->set_charset(UTF8);

$PID = $_GET["PID"];
$KaikyuID = $_GET["KaikyuID"];
$FirstID = $_GET["FirstID"];
$SecondID = $_GET["SecondID"];
$ThirdID = $_GET["ThirdID"];
$DateText = $_GET["Date"];
$Name = $_GET["Name"];

echo $PID;
echo "<br>";
echo $KaikyuID;
echo "<br>";
echo $FirstID;
echo "<br>";
echo $SecondID;
echo "<br>";
echo $ThirdID;
echo "<br>";
echo $DateText;
echo "<br>";
echo $Name;
echo "<br>";

// $mysqli->query('UPDATE SaimokuPersonData SET CompletedDate = "'  . $DateText . '" WHERE PersonDataID = ' . $PID . ' AND KaikyuID = ' . $KaikyuID . ' AND FirstID = ' . $FirstID . ' AND SecondID = ' . $SecondID . ' AND ThirdID = ' . $ThirdID)->fetch_assoc();
$sql = 'UPDATE SaimokuPersonData SET CompletedDate = "'  . $DateText . '" WHERE PersonDataID = ' . $PID . ' AND KaikyuID = ' . $KaikyuID . ' AND FirstID = ' . $FirstID . ' AND SecondID = ' . $SecondID . ' AND ThirdID = ' . $ThirdID;
// $sql = 'UPDATE SaimokuPersonData SET CompletedDate = "2025-02-14" WHERE PersonDataID = ' . $PID . ' AND KaikyuID = ' . $KaikyuID . ' AND FirstID = ' . $FirstID . ' AND SecondID = ' . $SecondID . ' AND ThirdID = ' . $ThirdID;
echo $sql;
$mysqli->query($sql);

echo "<br>";

$sql2 = 'UPDATE SaimokuPersonData SET SyouninsyaName = "'  . $Name . '" WHERE PersonDataID = ' . $PID . ' AND KaikyuID = ' . $KaikyuID . ' AND FirstID = ' . $FirstID . ' AND SecondID = ' . $SecondID . ' AND ThirdID = ' . $ThirdID;
echo $sql2;
$mysqli->query($sql2);
