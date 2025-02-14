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
            $rs = $mysqli->query('SELECT * FROM GroupData WHERE GroupID =' . $_SESSION["GID"]);
            $row = $rs->fetch_assoc();
            echo $row["Prefecture"] . "連盟" . $row["Area"] . "地区" . $row["City"] . "第" . $row["GroupNum"] . "団 : メンバー追加";
            ?>
        </h1>

        <div class="content">
            <?php
            echo "<form method='POST' action='../Data/PersonAddData.php' onSubmit='return  CheckDelete()'>";
            echo "
                <h2>基本情報</h2><Table Border='1'>
                <tr><td class='T_Title'>名前</td>
                <td><input type='text' name='Name' class='TextBoxMedium'></td></tr>
                <tr><td class='T_Title'>ふりがな</td>
                <td><input type='text' name='NameKana' class='TextBoxMedium'></td></tr>
                <tr><td class='T_Title'>誕生日</td>
                <td><input type='Date' name='Birthday' value=''></td></tr>
                <tr><td class='T_Title'>住所</td>
                <td><input type='text' name='Address' class='TextBoxLong'></td></tr>
                <tr><td class='T_Title'>電話</td>
                <td><input type='text' name='FirstTel' class='TextBoxShort'>-
                <input type='text' name='SecondTel' class='TextBoxShort'>-
                <input type='text' name='ThirdTel' class='TextBoxShort'></td></tr>
                <tr><td class='T_Title'>性別</td>
                <td>
                <select name='sex'>
                <option value='男'>男</option>
                <option value='女'>女</option>
                </select>
                </td></tr>
                <tr><td class='T_Title'>入団日</td>
                <td><input type='Date' name='StateDate'></td></tr>";
            echo "
                </Table>
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