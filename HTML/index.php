<?php
ini_set('display_errors', "On");
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

$KaikyuText;
if (!empty($_GET["Kaikyu"])) {
    $KaikyuText = "";
    $KaikyuList = $_GET["Kaikyu"];
    foreach ($KaikyuList as $text) {
        $KaikyuText = $KaikyuText . $text . " IS NOT NULL AND ";
    }
}

$DeptText;
if (!empty($_GET["Dept"])) {
    $DeptText = "";

    $DeptList = $_GET["Dept"];
    foreach ($DeptList as $text) {

        // echo $text;
        $NinBirthday = new DateTime();
        $MaxBirthday = new DateTime('1900-01-01');

        $now = new DateTime(); //現在日

        $Nendo = $now->modify('-3 month');
        $Nendo = new DateTime($Nendo->format('Y-04-01')); //YYYY/04/01
        $Nendo2 = new DateTime($Nendo->format('Y-m-d'));


        switch ($text) {
            case "1":
                echo "BVS";
                $MaxBirthday = $Nendo->modify('-8 year');
                break;
            case "2":
                echo "CS";
                $NinBirthday = $Nendo->modify('-8 year');
                $MaxBirthday = $Nendo2->modify('-11 year');
                break;
            case "3":
                $NinBirthday = $Nendo->modify('-11 year');
                $MaxBirthday = $Nendo2->modify('-15 year');
                break;
            case "4":
                $NinBirthday = $Nendo->modify('-15 year');
                $MaxBirthday = $Nendo2->modify('-18 year');
                break;
            case "5":
                $NinBirthday = $Nendo->modify('-18 year');
                $MaxBirthday = $Nendo2->modify('-26 year');
                break;
            default:
                $NinBirthday = $Nendo->modify('-26 year');
        }

        $DeptText = $DeptText .
            "(Birthday BETWEEN '" . $MaxBirthday->format('Y-m-d') . "' AND '" . $NinBirthday->format('Y-m-d') . "') OR ";
    }
    $DeptText = substr($DeptText, 0, -3) . " AND";
}
?>

<body>
    <header>
        <a href="index.php"><img src="../image/BS_logo.png" class="imageLogo"></a>
        <a href="PersonAdd.php">メンバーの追加</a><br>
        <a href="TeamEdit.php">班の編集</a><br>
        <a href="TeamMemberEdit.php">班割の編集</a><br>
        <a href="../Data/LogoutData.php">ログアウト</a>
    </header>
    <div class="main">
        <h1>
            ホーム
        </h1>
        <div class="content">
            <div class="serchBox">
                <form method="GET">
                    <h3>隊</h3>
                    <label><input type="checkbox" name="Dept[]" value="1">BVS</label>
                    <label><input type="checkbox" name="Dept[]" value="2">CS</label>
                    <label><input type="checkbox" name="Dept[]" value="3">BS</label>
                    <label><input type="checkbox" name="Dept[]" value="4">VS</label>
                    <label><input type="checkbox" name="Dept[]" value="5">RS</label>
                    <label><input type="checkbox" name="Dept[]" value="6">リーダー</label>
                    <h3>階級</h3>
                    <label><input type="checkbox" name="Kaikyu[]" value="Minarai">見習い</label>
                    <label><input type="checkbox" name="Kaikyu[]" value="Basic">初級</label>
                    <label><input type="checkbox" name="Kaikyu[]" value="Second">二級</label>
                    <label><input type="checkbox" name="Kaikyu[]" value="First">一級</label>
                    <label><input type="checkbox" name="Kaikyu[]" value="Kiku">菊</label>
                    <label><input type="checkbox" name="Kaikyu[]" value="Hayabusa">隼</label>
                    <label><input type="checkbox" name="Kaikyu[]" value="Fuji">富士</label>
                    <br>
                    <input type="submit" value="検索">
                </form>
                <?php
                ?>
            </div>

            <table>
                <tr>
                    <th>名前</th>
                </tr>
                <?php
                if (!empty($DeptText)) {
                    echo $DeptText;
                    $rs = $mysqli->query('SELECT PersonDataID, Name FROM PersonData WHERE ' . $DeptText . ' GroupID = ' . $_SESSION["GID"] . ' ORDER BY Birthday');
                } else if (!empty($KaikyuText)) {
                    echo $KaikyuText;
                    $rs = $mysqli->query('SELECT PersonDataID, Name FROM PersonData WHERE ' . $KaikyuText . ' GroupID = ' . $_SESSION["GID"] . ' ORDER BY Birthday');
                } else {
                    $rs = $mysqli->query('SELECT PersonDataID, Name FROM PersonData WHERE GroupID = ' . $_SESSION["GID"] . ' ORDER BY Birthday');
                }
                $bool = false;
                while ($row = $rs->fetch_assoc()) {
                    echo '<tr><td>' . $row["Name"] . '</td><td>
                    <form method="POST" action="../HTML/PersonData.php?PID=' . $row["PersonDataID"] . '">
                        <input type="hidden" name="PID" value="' . $row["PersonDataID"] . '">
                        <input type="submit" value="詳細">
                    </form>
                    </td></tr>';
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>