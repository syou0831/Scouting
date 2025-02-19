<?php
// ini_set('session.gc_maxlifetime', 30);
ini_set('display_errors', "On");
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
    <link href="../css/PersonData.css" rel="stylesheet">
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
$PID = $_POST["PID"];
if (!empty($_GET["ID"])) {
    $PID = $_GET["ID"];
}
$DID = $_POST["DID"];
?>

<body>
    <header>
        <a href="index.php"><img src="../image/BS_logo.png" class="imageLogo"></a>
        <a href="../Data/LogoutData.php">ログアウト</a>
    </header>
    <div class="main">
        <h1>
            個人情報
        </h1>

        <div class="content">
            <?php
            echo
            "<form method='POST' action='./PersonEdit.php'>
                <input type='hidden' name='PID' value='{$PID}'>
                <input type='submit' value='編集'>
            </form>";

            echo "<h2>基本情報</h2><table>";
            $rs = $mysqli->query('SELECT * FROM PersonData WHERE PersonDataID = ' . $PID);
            $row = $rs->fetch_assoc();
            echo "<tr><td class='T_Title'>所属</td><td>日本ボーイスカウト東京連盟北多摩地区小平第5団</td></tr>";
            echo "<tr><td class='T_Title'>ID</td><td>" . $row["PersonID"] . "</td></tr>";
            echo "<tr><td class='T_Title'>名前(ガナ)</td><td>" . $row["NameFurigana"] . "</td></tr>";
            echo "<tr><td class='T_Title'>名前</td><td>" . $row["Name"] . "</td></tr>";
            echo "<tr><td class='T_Title'>誕生日</td><td>" . $row["Birthday"] . "</td></tr>";
            echo "<tr><td class='T_Title'>住所</td><td>" . $row["Address"] . "</td></tr>";
            echo "<tr><td class='T_Title'>Tel</td><td>" . $row["Tel"] . "</td></tr>";

            $url = "../Data/qr_encode.php?data=" . $row["Name"];
            echo "<tr><td class='T_Title'>QRコード</td><td><img src='" . $url . "' div='QRCode'></tr></td>";

            echo "</table>";

            echo "<h2>スカウト歴</h2><table>";

            echo "<tr><td class='T_Title'>誓いをたてた日</td><td>" . $row["StateDate"] . "</td></tr>";
            echo "<tr><td class='T_Title'>誓いをたてた場所</td><td>" . $row["StateField"] . "</td></tr>";
            echo "</table>";

            echo "<h2>入隊</h2><table>";
            echo "<tr><td class='T_Title'>ビーバー隊</td><td>" . $row["inBVS"] . "</td></tr>";
            echo "<tr><td class='T_Title'>カブ隊</td><td>" . $row["inCS"] . "</td></tr>";
            echo "<tr><td class='T_Title'>ボーイ隊</td><td>" . $row["inBS"] . "</td></tr>";
            echo "<tr><td class='T_Title'>ベンチャー隊</td><td>" . $row["inVS"] . "</td></tr>";
            echo "<tr><td class='T_Title'>ローバー隊</td><td>" . $row["inRS"] . "</td></tr>";
            echo "</table>";

            echo "<h2>進級</h2><table>";
            echo "<tr><td class='T_Title'>見習い</td><td>" . $row["Minarai"] . "</td></tr>";
            echo "<tr><td class='T_Title'>初級</td><td>" . $row["Basic"] . "</td></tr>";
            echo "<tr><td class='T_Title'>二級</td><td>" . $row["Second"] . "</td></tr>";
            echo "<tr><td class='T_Title'>一級</td><td>" . $row["First"] . "</td></tr>";
            echo "<tr><td class='T_Title'>菊</td><td>" . $row["Kiku"] . "</td></tr>";
            echo "<tr><td class='T_Title'>隼</td><td>" . $row["Hayabusa"] . "</td></tr>";
            echo "<tr><td class='T_Title'>富士</td><td>" . $row["Fuji"] . "</td></tr>";
            echo "<tr><td class='T_Title'>信仰奨励章</td><td>" . $row["SinkouSyourei"] . "</td></tr>";
            echo "<tr><td class='T_Title'>宗教章</td><td>" . $row["Syukyou"] . "</td></tr>";
            echo "<tr><td class='T_Title'>宗教</td><td>" . $row["SyukyouName"] . "</td></tr>";
            echo "</table>";
            $mysqli->close();
            ?>

        </div>
    </div>
</body>

</html>