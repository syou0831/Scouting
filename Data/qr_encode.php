<?php
// ini_set('display_errors', "On");
require '../Data/phpqrcode/qrlib.php';

$now = new DateTime();

// QRコードにする内容
$text = $_GET["data"] . ":" . date_format($now, 'Y-m-d');

// 画像をブラウザに出力
header('Content-Type: image/png');
QRcode::png($text);
