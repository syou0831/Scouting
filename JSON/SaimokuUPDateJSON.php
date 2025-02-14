<?php
require '../Data/dbConf.inc';
$mysqli = new mysqli(HOST_NAME, USER_NAME, DB_PASS);
$mysqli->select_db(DB_NAME);
$mysqli->set_charset(UTF8);

$PID = $_GET["PersonID"];
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

// $Date = 

// $mysqli->query('UPDATE SaimokuPersonData SET CompletedDate = "'  . $Date . '" WHERE PersonDataID = ' . $PID . ' AND KaikyuID = ' . $KaikyuID . ' AND FirstID = ' . $FirstID . ' AND SecondID = ' . $SecondID . ' AND ThirdID = ' . $ThirdID);
// $mysqli->query('UPDATE SaimokuPersonData SET SyouninsyaName = "'  . $Name . '" WHERE PersonDataID = ' . $PID . ' AND KaikyuID = ' . $KaikyuID . ' AND FirstID = ' . $FirstID . ' AND SecondID = ' . $SecondID . ' AND ThirdID = ' . $ThirdID);
