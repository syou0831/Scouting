<?php
require '../Data/dbConf.inc';
$mysqli = new mysqli(HOST_NAME, USER_NAME, DB_PASS);
$mysqli->select_db(DB_NAME);
$mysqli->set_charset(UTF8);
if ($mysqli->connect_errno) {
    echo "データベースへの接続に失敗";
}

$did = $_GET["ID"];

$NinBirthday = new DateTime();
$MaxBirthday = new DateTime();

$now = new DateTime('2025-03-31'); //現在日

$I = $now->modify('-3 month');

$Nendo = $now->modify('-3 month');
$Nendo = new DateTime($Nendo->format('Y-04-01')); //YYYY/04/01
$Nendo2 = new DateTime($Nendo->format('Y-m-d'));

$Birthday = new DateTime("2004-08-31"); //誕生日

$I = new DateTime('1970-04-01');

echo $Nendo->format('Y-m-d');

switch ($did) {
    case 1:
        $MaxBirthday = $Nendo->modify('-8 year');
        echo "ビーバー";
        break;
    case 2:
        $NinBirthday = $Nendo->modify('-9 year');
        $MaxBirthday = $Nendo2->modify('-11 year');
        echo "カブ";
        break;
    case 3:
        $NinBirthday = $Nendo->modify('-12 year');
        $MaxBirthday = $Nendo2->modify('-15 year');
        echo "ボーイ";
        break;
    case 4:
        $NinBirthday = $Nendo->modify('-16 year');
        $MaxBirthday = $Nendo2->modify('-18 year');
        echo "ベンチャー";
        break;
    case 5:
        $NinBirthday = $Nendo->modify('-19 year');
        echo "ローバー";
        break;
    default:
}

echo "<br>下限<br>";
echo $NinBirthday->format('Y-m-d');

echo "<br>上限<br>";
echo $MaxBirthday->format('Y-m-d');

echo "<br>AAA<br>";
echo $Nendo->format('Y-m-d');
