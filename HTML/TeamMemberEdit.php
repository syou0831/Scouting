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
$DID = $_GET["ID"];

$NinBirthday = new DateTime();
$MaxBirthday = new DateTime();

$now = new DateTime('2025-03-31'); //現在日

$Nendo = $now->modify('-3 month');
$Nendo = new DateTime($Nendo->format('Y-04-01')); //YYYY/04/01
$Nendo2 = new DateTime($Nendo->format('Y-m-d'));

$I = new DateTime('1970-04-01');

echo $Nendo->format('Y-m-d');

switch ($DID) {
    case 1:
        $MaxBirthday = $Nendo->modify('-8 year');
        break;
    case 2:
        $NinBirthday = $Nendo->modify('-8 year');
        $MaxBirthday = $Nendo2->modify('-11 year');
        break;
    case 3:
        $NinBirthday = $Nendo->modify('-11 year');
        $MaxBirthday = $Nendo2->modify('-15 year');
        break;
    case 4:
        $NinBirthday = $Nendo->modify('-15 year');
        $MaxBirthday = $Nendo2->modify('-18 year');
        break;
    case 5:
        $NinBirthday = $Nendo->modify('-18 year');
        $MaxBirthday = $Nendo2->modify('-26 year');
        break;
    default:
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
            $rs = $mysqli->query('SELECT * FROM DeptData WHERE DeptID = ' . $DID);
            $row = $rs->fetch_assoc();
            echo $row["DeptName"] . " : メンバー編集";
            ?>
        </h1>

        <div class="content">
            <?php
            $rs = $mysqli->query('SELECT Name, Birthday, PersonDataID, Sex
                                    FROM PersonData 
                                    WHERE Birthday < "' . $NinBirthday->format('Y-03-31') . '" AND Birthday > "' . $MaxBirthday->format('Y-m-d') . '" AND GroupID = ' . $_SESSION["GID"]);
            echo "<table>";
            while ($row = $rs->fetch_assoc()) {
                $rs2 = $mysqli->query('SELECT * FROM EkimuData');
                echo "<form method='POST' action='../Data/TeamMemberEditData.php'>";

                echo "<tr><td>" . $row["Name"] . "</td>";

                echo "<td><select name='Team' size='1'>";
                $rs3 = $mysqli->query('SELECT TeamID, TeamName FROM TeamData WHERE DeptID =' . $DID . ' AND GroupID = ' . $_SESSION["GID"]);



                echo "<option disabled selected>班の選択</option>";
                while ($row3 = $rs3->fetch_assoc()) {
                    echo "<option value='" . $row3["TeamID"] . "'>" . $row3["TeamName"] . "</option>";
                }
                echo "</select></td>";

                echo "<td><select name='Ekimu' size='1'>";
                $rs2 = $mysqli->query('SELECT * FROM EkimuData WHERE GroupID = ' . $_SESSION["GID"] . ' AND DeptID = ' . $DID);
                echo "<option disabled selected>役務の選択</option>";
                while ($row2 = $rs2->fetch_assoc()) {
                    echo "<option value='" . $row2["EkimuID"] . "'>" . $row2["EkimuName"] . "</option>";
                }
                echo "</select></td>";

                echo "<input type='hidden' name='PersonDataID' value=' " . $row["PersonDataID"] . "'>
                <input type='hidden' name='DID' value=' " . $DID . "'>
                <td><input type='submit' value='反映'></td></tr></form>";
            }
            echo "</table>";
            ?>
        </div>
    </div>
</body>

</html>