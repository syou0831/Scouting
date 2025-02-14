<?php
// ini_set('session.gc_maxlifetime', 30);
ini_set('session.gc_probability', 1);
ini_set('session.gc_divisor', 1);
session_start();
if (empty($_SESSION["GID"])) {
    $_SESSION["eMessage"] = "セッション切れ";
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
    <link href="../css/index.css" rel="stylesheet">
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
            ホーム
        </h1>

        <div class="content">
            <?php
            $rs = $mysqli->query('SELECT * FROM DeptData');
            $bool = false;
            while ($row = $rs->fetch_assoc()) {
                echo "<a href='MemberList.php?ID=" . $row["DeptID"] . "'><Button class='custom-button'>";
                echo "<img src='../image/" . $row["imageName"] . ".png'>";
                echo $row["DeptName"];
                echo    "</Button></a>";
                if ($bool) {
                    echo "<br>";
                    $bool = false;
                } else {
                    $bool = true;
                }
            }
            echo "<a href='PersonAdd.php'><Button class='custom-button'>";
            echo "<img src='../image/.png'>";
            echo "所属メンバーの編集";
            echo    "</Button></a>";
            ?>
        </div>
    </div>
</body>

</html>