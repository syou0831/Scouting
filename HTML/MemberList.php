<?php
// ini_set('session.gc_maxlifetime', 30);
ini_set('session.gc_probability', 1);
ini_set('session.gc_divisor', 1);
session_start();
if (empty($_SESSION["GID"])) {
    header("Location: ../HTML/Login.php");
}
unset($_SESSION["PID"]);
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
    <link href="../css/memberList.css" rel="stylesheet">
    <title>モバイル進級手帳</title>
</head>

<?php
require '../Data/dbConf.inc';
$mysqli = new mysqli(HOST_NAME, USER_NAME, DB_PASS);
$mysqli->select_db(DB_NAME);
$mysqli->set_charset(UTF8);
//隊ID
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
            $row = $rs->fetch_assoc();
            echo $row["DeptName"] . " : 名簿";

            ?>
        </h1>

        <div class="content">
            <?php
            echo "<a href='./TeamMemberEdit.php?ID={$DID}'><button>メンバーの編集</button></a>";
            echo "<a href='./TeamEdit.php?ID={$DID}'><button>班の編集</button></a>";
            echo "<a href='./EkimuEdit.php?ID={$DID}'><button>役務の編集</button></a>";
            $rs = $mysqli->query('SELECT TeamID, TeamName FROM TeamData WHERE DeptID =' . $DID . ' AND GroupID = ' . $_SESSION["GID"]);
            while ($row = $rs->fetch_assoc()) {
                $rs2 = $mysqli->query('SELECT PersonData.PersonID, PersonData.Name, PersonData.Sex, TeamMemberData.EkimuID, EkimuData.EkimuName 
                                        FROM PersonData
                                        JOIN TeamMemberData
                                        ON PersonData.PersonID = TeamMemberData.PersonID
                                        JOIN EkimuData
                                        ON TeamMemberData.GroupID = EkimuData.GroupID & TeamMemberData.DeptID = EkimuData.DeptID & TeamMemberData.TeamID = EkimuData.TeamID & TeamMemberData.EkimuID = EkimuData.EkimuID
                                        WHERE TeamMemberData.DeptID =' . $DID . ' AND PersonData.GroupID = ' . $_SESSION["GID"] . ' AND TeamMemberData.TeamID = ' . $row["TeamID"]);
                echo "<table>";
                echo "<thead><tr><th colspan='4' >";
                echo $row["TeamName"];
                echo "</th></tr></thead><tbody>";
                while ($row2 = $rs2->fetch_assoc()) {
                    echo "<tr><td class='T_Name'>" . $row2["Name"] . "</td>
                        <td class='T_Sex'>" . $row2["Sex"] . "</td>
                        <td class='T_Yakumu'>" . $row2["EkimuName"] . "</td>
                        <td class='T_Button'>
                        <form method='POST' action='./PersonData.php'>
                        <input type='hidden' name='PID' value=" . $row2["PersonID"] . ">
                        <input type='hidden' name='DID' value=" . $DID . ">
                        <input type='submit' value='詳細'>
            </form>
                        </td></tr>";
                }
            }
            echo "</tbody></table>";
            $mysqli->close();
            ?>
        </div>
    </div>
</body>

</html>