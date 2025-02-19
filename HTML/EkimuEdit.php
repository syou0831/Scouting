<?php
// ini_set('session.gc_maxlifetime', SESSION_TIME);
ini_set('session.gc_probability', 1);
ini_set('session.gc_divisor', 1);
session_start();
if (empty($_SESSION["GID"])) {
    header("Location: ../HTML/Login.php");
}
?>
<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="../image/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../image/favicon.ico" type="image/x-icon">

    <link href="../css/reset.css" rel="stylesheet">
    <link href="../css/common.css" rel="stylesheet">
    <title>モバイル進級手帳</title>
</head>

<?php
require '../Data/dbConf.inc';
$mysqli = new mysqli(HOST_NAME, USER_NAME, DB_PASS);
$mysqli->select_db(DB_NAME);
$mysqli->set_charset(UTF8);
if ($mysqli->connect_errno) {
    echo "データベースへの接続に失敗";
}

$GID = $_SESSION["GID"];
$DID = $_GET["ID"];
?>

<body>
    <header>
        <a href="index.php"><img src="../image/BS_logo.png" class="imageLogo"></a>
        <a href="../Data/LogoutData.php">ログアウト</a>
    </header>
    <div class="main">
        <h1>
            <?php
            $rs = $mysqli->query('SELECT * FROM DeptData WHERE DeptID = ' . $DID);
            echo $rs->fetch_assoc()["DeptName"];
            echo " : 役務編集";
            ?>
        </h1>

        <div class="content">
            <?php
            $rs = $mysqli->query('SELECT * FROM TeamData WHERE GroupID = ' . $GID . ' AND DeptID = ' . $DID);
            echo "<table>";
            // while ($row = $rs->fetch_assoc()) {
            $count = 1;
            $TeamID = 1;
            // echo "<tr><th colspan='2'>" . $row["TeamName"] . "</th></tr>";
            $rs2 = $mysqli->query('SELECT * FROM EkimuData WHERE GroupID =' . $GID . ' AND DeptID =' . $DID);
            while ($row2 = $rs2->fetch_assoc()) {
                echo "<tr><form method='POST' action='../Data/EkimuEditData.php'>";
                echo "<input type='hidden' name='count' value='" . $count . "'>";
                echo "<input type='hidden' name='DeptID' value='" . $DID . "'>";
                // echo "<input type='hidden' name='TeamID' value='" . $row["TeamID"] . "'>";
                $count += 1;
                echo "<td><input type='text' name='Name' value='" . $row2["EkimuName"] . "'></td>";
                echo "<td><input type='submit' value='反映'></td></form></tr>";
            }

            echo "<tr><form method='POST' action='../Data/EkimuEditData.php'>";
            echo "<input type='hidden' name='count' value='" . $count . "'>";
            echo "<input type='hidden' name='DeptID' value='" . $DID . "'>";
            echo "<input type='hidden' name='TeamID' value='" . $row["TeamID"] . "'>";
            echo "<td><input type='text' name='Name' value=''></td>";
            echo "<td><input type='submit' value='反映'></td></tr></form>";
            // }
            echo "</table>";
            ?>
        </div>
    </div>
</body>

</html>