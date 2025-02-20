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
    <link href="../css/PersonEdit.css" rel="stylesheet">
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
$ID = $_POST["PID"];
?>

<body>
    <header>
        <a href="index.php"><img src="../image/BS_logo.png" class="imageLogo"></a>
        <a href="../Data/LogoutData.php">ログアウト</a>
    </header>
    <div class="main">
        <h1>
            編集
        </h1>

        <div class="content">
            <?php
            $rs = $mysqli->query('SELECT * FROM PersonData WHERE PersonDataID = ' . $ID);
            $row = $rs->fetch_assoc();
            echo "<h2>基本情報</h2>";
            echo "<form method='POST' action='../HTML/PersonData.php'>
            <input type='hidden' name='PID' value='" . $ID . "'>
            <input type='submit' value='戻る'>
            </form>";
            echo "
            <form method='POST' action='../Data/PersonDataUpDate.php' onSubmit='return  CheckDelete()'>
                <Table Border='1'>
                <tr><td class='T_Title'>名前</td>
                <td><input type='text' name='Name' class='TextBoxMedium' value='" . $row["Name"] . "'></td></tr>
                <tr><td class='T_Title'>ふりがな</td>
                <td><input type='text' name='NameKana' class='TextBoxMedium' value='" . $row["NameFurigana"] . "'></td></tr>
                <tr><td class='T_Title'>誕生日</td>
                <td><input type='Date' name='Birthday' value='" . $row["Birthday"] . "'></td></tr>
                <tr><td class='T_Title'>住所</td>
                <td><input type='text' name='Address' class='TextBoxLong' value='" . $row["Address"] . "'></td><br></tr>
                <tr><td class='T_Title'>電話</td>
                <td><input type='text' name='FTel' class='TextBoxShort' value='" . preg_split("/[-]/", $row["Tel"])[0] . "'>-
                <input type='text' name='STel' class='TextBoxShort' value='" . preg_split("/[-]/", $row["Tel"])[1] . "'>-
                <input type='text' name='TTel' class='TextBoxShort' value='" . preg_split("/[-]/", $row["Tel"])[2] . "'></td></tr></Table>
                <h2>スカウト歴</h2><Table Border='1'>
                <tr><td class='T_Title'>誓いをたてた日</td>
                <td><input type='Date' name='StateDate' value='" . $row["StateDate"] . "'></td></tr>
                <tr><td class='T_Title'>場所</td>
                <td><input type='text' name='StateField' class='TextBoxLong' value='" . $row["StateField"] . "'></td></tr>
                
                </Table>";

            echo "<h2>入隊履歴</h2><Table Border='1'>
                <tr><td class='T_Title'>ビーバー隊</td>
                <td><input type='Date' name='inBVS' value='" . $row["inBVS"] . "'></td>
                <tr><td class='T_Title'>カブ隊</td>
                <td><input type='Date' name='inCS' value='" . $row["inCS"] . "'></td>
                <tr><td class='T_Title'>ボーイ隊</td>
                <td><input type='Date' name='inBS' value='" . $row["inBS"] . "'></td>
                <tr><td class='T_Title'>ベンチャー隊</td>
                <td><input type='Date' name='inVS' value='" . $row["inVS"] . "'></td>
                <tr><td class='T_Title'>ローバー隊</td>
                <td><input type='Date' name='inRS' value='" . $row["inRS"] . "'></td>
                </Table>";

            echo "<h2>進級履歴</h2><Table Border='1'>
                <tr><td class='T_Title'>見習い</td>
                <td><input type='Date' name='Minarai' value='" . $row["Minarai"] . "'></td>
                <tr><td class='T_Title'>初級</td>
                <td><input type='Date' name='Basic' value='" . $row["Basic"] . "'></td>
                <tr><td class='T_Title'>二級</td>
                <td><input type='Date' name='Second' value='" . $row["Second"] . "'></td>
                <tr><td class='T_Title'>一級</td>
                <td><input type='Date' name='First' value='" . $row["First"] . "'></td>
                <tr><td class='T_Title'>菊</td>
                <td><input type='Date' name='Kiku' value='" . $row["Kiku"] . "'></td>
                <tr><td class='T_Title'>隼</td>
                <td><input type='Date' name='Hayabusa' value='" . $row["Hayabusa"] . "'></td>
                <tr><td class='T_Title'>富士</td>
                <td><input type='Date' name='Fuji' value='" . $row["Fuji"] . "'></td>
                <tr><td class='T_Title'>信仰奨励章</td>
                <td><input type='Date' name='SinkouSyourei' value='" . $row["SinkouSyourei"] . "'></td>
                <tr><td class='T_Title'>宗教章</td>
                <td><input type='Date' name='Syukyou' value='" . $row["Syukyou"] . "'></td>
                <tr><td class='T_Title'>宗教</td>
                <td><input type='text' name='SyukyouName' value='" . $row["SyukyouName"] . "'></td></Table>
                <input type='hidden' name='PID' value=" . $row["PersonDataID"] . ">
                <input type='hidden' name='DID' value=" . $DID . ">
                <input type='submit' class='SubmitButton' value='確定'>
                </form>";
            ?>
        </div>
    </div>
    <script>
        function CheckDelete() {
            if (confirm('情報を更新します')) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</body>

</html>