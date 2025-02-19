<?php
ini_set('display_errors', "On");
require '../Data/phpqrcode/qrlib.php';

// QRコードにする内容
$text = 'Test';

// 画像をブラウザに出力
header('Content-Type: image/png');
QRcode::png($text);
