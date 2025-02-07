<?php
ini_set('session.gc_probability', 1);
ini_set('session.gc_divisor', 1);
session_start();
require 'dbConf.inc';
$mysqli = new mysqli(HOST_NAME, USER_NAME, DB_PASS);
$mysqli->select_db(DB_NAME);
$mysqli->set_charset(UTF8);
if ($mysqli->connect_errno) {
    echo "データベースへの接続に失敗";
}
if ($_POST["count"] >= 1) {
    for ($i = 1; $i <= $_POST["count"]; $i++) {
        $rs = $mysqli->query('UPDATE TeamData SET TeamName="' . $_POST["$i"] . '" WHERE GroupID=' . $_SESSION["GID"] . ' AND deptID=' . $_POST["DID"] . ' AND TeamID=' . $i);
        if (!is_bool($rs)) {
            $rs->fetch_assoc();
        }
    }
}
$count = $_POST["count"];
$count++;
if (!empty($_POST["new"])) {
    $rs2 = $mysqli->query('INSERT INTO TeamData (GroupID, DeptID, TeamID, TeamName) VALUES (' . $_SESSION["GID"] . ', ' . $_POST["DID"] . ',  ' . $count . '," ' . $_POST["new"] . '")');
    if (!is_bool($rs2)) {
        $rs2->fetch_assoc();
    }
}

$mysqli->close();

header('Location:  ../HTML/TeamEdit.php?ID=' . $_POST["DID"]);
exit;
