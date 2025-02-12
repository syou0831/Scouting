<?php
session_start();
require 'dbConf.inc';
$mysqli = new mysqli(HOST_NAME, USER_NAME, DB_PASS);
$mysqli->select_db(DB_NAME);
$mysqli->set_charset(UTF8);
if ($mysqli->connect_errno) {
}

$GID = $_SESSION["GID"];
$DID = $_POST["DID"];
$TID = $_POST["Team"];
$PID = $_POST["PersonID"];
$Ekimu = $_POST["Ekimu"];

$rs = $mysqli->query('SELECT * FROM TeamMemberData WHERE GroupID = " . $GID . " AND DeptID = ' . $DID . ' AND PersonID = ' . $PID);
$row = $rs->fetch_assoc();

if (empty($row)) {
    $mysqli->query('INSERT INTO TeamMemberData  (GroupID, DeptID, TeamID, PersonID, EkimuID)
                    VALUE (' . $GID . ' , ' . $DID . ' , ' . $TID . ' , ' . $PID . ' , ' . $Ekimu . ')');
    echo "インサート";
} else {
    $mysqli->query('UPDATE TeamMemberData SET TeamID = ' . $TID . ' WHERE PersonID = ' . $PID . ' AND DeptID = ' . $DID);
    $mysqli->query('UPDATE TeamMemberData SET EkimuID = ' . $Ekimu . ' WHERE PersonID = ' . $PID);
    echo "アップデート";
}

// header("Location:  ../HTML/TeamMemberEdit.php?ID=" . $DID);
// exit;
