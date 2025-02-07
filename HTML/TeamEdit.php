<?php
// ini_set('session.gc_maxlifetime', 30);
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
?>

<body>
    <header>
        <a href="index.php"><img src="../image/BS_logo.png" class="imageLogo"></a>
        <a href="../Data/LogoutData.php">ログアウト</a>
    </header>
    <div class="main">
        <h1>
            <?php
            $rs = $mysqli->query('SELECT DeptName FROM DeptData WHERE DeptID = ' . $_GET["ID"])->fetch_assoc();
            echo $rs["DeptName"] . " : 班の編集"
            ?>
        </h1>

        <div class="content">
            <?php
            $count = 0;
            $rs = $mysqli->query("SELECT * FROM TeamData WHERE GroupID = " . $_SESSION["GID"] . " AND DeptID = " . $_GET["ID"] . " ORDER BY TeamID ASC");
            echo "<form method='POST' action='../Data/TeamEditData.php'><table>";
            echo "<tr><td>班名</td></tr>";
            while ($row = $rs->fetch_assoc()) {
                echo "<tr><td><input type='text' name='{$row["TeamID"]}' value='{$row["TeamName"]}'></td></tr>";
                $count += 1;
            }
            echo "<tr><td><input type='text' name='new'></td></tr>";
            echo "</table>
            <input type='hidden' name='DID' value=" . $_GET["ID"] . ">
            <input type='hidden' name='count' value=" . $count . ">
            <input type='submit' value='編集確定'></from>";
            ?>
        </div>
    </div>
</body>

</html>