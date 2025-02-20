<?php
// ini_set('session.gc_maxlifetime', 30);
ini_set('session.gc_probability', 1);
ini_set('session.gc_divisor', 1);
session_start();
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
?>

<body>
    <header>
        <a href="index.php"><img src="../image/BS_logo.png" class="imageLogo"></a>
    </header>
    <div class="main">
        <h1>
            ログイン
        </h1>

        <div class="content">
            <form method="POST" action="../Data/LoginData.php" id="loginForm">
                <input name="ID" type="text" placeholder="USER ID" required><br><br>
                <input name="PASS" type="password" placeholder="PASSWORD" required><br>
                <br>
                <?php
                if (!empty($_SESSION["eMessage"])) {
                    echo "<p style='color: red;'>" . htmlspecialchars($_SESSION["eMessage"], ENT_QUOTES, 'UTF-8') . "</p>";
                    unset($_SESSION["eMessage"]);
                }
                ?>
                <input type="submit" value="ログイン">
            </form>
        </div>
    </div>
</body>

</html>