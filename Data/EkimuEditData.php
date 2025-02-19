<?php
// ini_set('session.gc_maxlifetime', SESSION_TIME);
ini_set('session.gc_probability', 1);
ini_set('session.gc_divisor', 1);
session_start();
if (empty($_SESSION["GID"])) {
    header("Location: ../HTML/Login.php");
}

require '../Data/dbConf.inc';
$mysqli = new mysqli(HOST_NAME, USER_NAME, DB_PASS);
$mysqli->select_db(DB_NAME);
$mysqli->set_charset(UTF8);
if ($mysqli->connect_errno) {
    echo "データベースへの接続に失敗";
}

$GID = $_SESSION["GID"];
$DID = $_POST["DeptID"];
$TID = $_POST["TeamID"];
$EID = $_POST["count"];
$Name = $_POST["Name"];

$rs = $mysqli->query("SELECT * FROM EkimuData WHERE GroupID = " . $GID . " AND DeptID = " . $DID . " AND EkimuID =" . $EID);
if (empty($rs->fetch_assoc())) {
    // echo "新規";
    $rs = $mysqli->query('INSERT INTO EkimuData (GroupID, DeptID, EkimuID, EkimuName) VALUE (' . $GID . ', ' . $DID . ' , ' . $EID . ', "' . $Name . '")');
    if (!is_bool($rs)) {
        $rs->fetch_assoc();
    }
} else {
    // echo "更新";
    $rs = $mysqli->query('UPDATE EkimuData SET EkimuName = "' . $Name . '" WHERE GroupID = ' . $GID . ' AND TeamID = ' . $TID . ' AND EkimuID = ' . $EID);
    if (!is_bool($rs)) {
        $rs->fetch_assoc();
    }
}

$mysqli->close();

header('Location:  ../HTML/EkimuEdit.php?ID=' . $DID);
exit;
