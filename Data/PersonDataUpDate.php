<?php

require 'dbConf.inc';
$mysqli = new mysqli(HOST_NAME, USER_NAME, DB_PASS);
$mysqli->select_db(DB_NAME);
$mysqli->set_charset(UTF8);

$ID = $_POST["PID"];

if (!empty($_POST["Name"])) {
    $mysqli->query('UPDATE PersonData SET Name = "' . $_POST["Name"] . '" WHERE PersonDataID = ' . $ID);
    // $rs = $mysqli->query('UPDATE PersonData SET Name = "' . $_POST["Name"] . '" WHERE PersonDataID = ' . $ID);
    // if (!is_bool($rs)) {
    //     $rs->fetch_assoc();
    // }
}

if (!empty($_POST["NameKana"])) {
    $mysqli->query("UPDATE PersonData SET NameFurigana = '" . $_POST["NameKana"] . "' WHERE PersonDataID = " . $ID);
    // $rs = $mysqli->query("UPDATE PersonData SET NameFurigana = '" . $_POST["NameKana"] . "' WHERE PersonDataID = " . $ID);
    // if (!is_bool($rs)) {
    //     $rs->fetch_assoc();
    // }
}

if (!empty($_POST["Birthday"])) {
    $mysqli->query("UPDATE PersonData SET Birthday = '" . $_POST["Birthday"] . "' WHERE PersonDataID = " . $ID);
    // $rs = $mysqli->query("UPDATE PersonData SET Birthday = '" . $_POST["Birthday"] . "' WHERE PersonDataID = " . $ID);
    // if (!is_bool($rs)) {
    //     $rs->fetch_assoc();
    // }
}

if (!empty($_POST["Address"])) {
    $mysqli->query("UPDATE PersonData SET Address = '" . $_POST["Address"] . "' WHERE PersonDataID = " . $ID);
    // $rs = $mysqli->query("UPDATE PersonData SET Address = '" . $_POST["Address"] . "' WHERE PersonDataID = " . $ID);
    // if (!is_bool($rs)) {
    //     $rs->fetch_assoc();
    // }
}

if (!empty($_POST["FTel"]) && !empty($_POST["STel"]) && !empty($_POST["TTel"])) {
    $mysqli->query("UPDATE PersonData SET Tel = '" . $_POST["FTel"] . "-" . $_POST["STel"] . "-" . $_POST["TTel"] . "' WHERE PersonDataID = " . $ID);
    // $rs = $mysqli->query("UPDATE PersonData SET Tel = '" . $_POST["FirstTel"] . "-" . $_POST["SecondTel"] . "-" . $_POST["ThirdTel"] . "' WHERE PersonDataID = " . $ID);
    // if (!is_bool($rs)) {
    //     $rs->fetch_assoc();
    // }
}

if (!empty($_POST["StateDate"])) {
    $mysqli->query("UPDATE PersonData SET StateDate = '" . $_POST["StateDate"] . "' WHERE PersonDataID = " . $ID);
    // $rs = $mysqli->query("UPDATE PersonData SET StateDate = '" . $_POST["StateDate"] . "' WHERE PersonDataID = " . $ID);
    // if (!is_bool($rs)) {
    //     $rs->fetch_assoc();
    // }
}

if (!empty($_POST["StateField"])) {
    $mysqli->query("UPDATE PersonData SET StateField = '" . $_POST["StateField"] . "' WHERE PersonDataID = " . $ID);
    // $rs = $mysqli->query("UPDATE PersonData SET StateField = '" . $_POST["StateField"] . "' WHERE PersonDataID = " . $ID);
    // if (!is_bool($rs)) {
    //     $rs->fetch_assoc();
    // }
}

if (!empty($_POST["inBVS"])) {
    $mysqli->query("UPDATE PersonData SET inBVS = '" . $_POST["inBVS"] . "' WHERE PersonDataID = " . $ID);
    // $rs = $mysqli->query("UPDATE PersonData SET inBVS = '" . $_POST["inBVS"] . "' WHERE PersonDataID = " . $ID);
    // if (!is_bool($rs)) {
    //     $rs->fetch_assoc();
    // }
} else {
    $mysqli->query("UPDATE PersonData SET inBVS = NULL WHERE PersonDataID = " . $ID);
    // $rs = $mysqli->query("UPDATE PersonData SET inBVS = NULL WHERE PersonDataID = " . $ID);
    // if (!is_bool($rs)) {
    //     $rs->fetch_assoc();
    // }
}

if (!empty($_POST["inCS"])) {
    $mysqli->query("UPDATE PersonData SET inCS = '" . $_POST["inCS"] . "' WHERE PersonDataID = " . $ID);
    // $rs = $mysqli->query("UPDATE PersonData SET inCS = '" . $_POST["inCS"] . "' WHERE PersonDataID = " . $ID);
    // if (!is_bool($rs)) {
    //     $rs->fetch_assoc();
    // }
} else {
    $mysqli->query("UPDATE PersonData SET inCS = NULL WHERE PersonDataID = " . $ID);
    // $rs = $mysqli->query("UPDATE PersonData SET inCS = NULL WHERE PersonDataID = " . $ID);
    // if (!is_bool($rs)) {
    //     $rs->fetch_assoc();
    // }
}

if (!empty($_POST["inBS"])) {
    $mysqli->query("UPDATE PersonData SET inBS = '" . $_POST["inBS"] . "' WHERE PersonDataID = " . $ID);
    // $rs = $mysqli->query("UPDATE PersonData SET inBS = '" . $_POST["inBS"] . "' WHERE PersonDataID = " . $ID);
    // if (!is_bool($rs)) {
    //     $rs->fetch_assoc();
    // }
} else {
    $mysqli->query("UPDATE PersonData SET inBS = NULL WHERE PersonDataID = " . $ID);
    // $rs = $mysqli->query("UPDATE PersonData SET inBS = NULL WHERE PersonDataID = " . $ID);
    // if (!is_bool($rs)) {
    //     $rs->fetch_assoc();
    // }
}

if (!empty($_POST["inVS"])) {
    $mysqli->query("UPDATE PersonData SET inVS = '" . $_POST["inVS"] . "' WHERE PersonDataID = " . $ID);
    // $rs = $mysqli->query("UPDATE PersonData SET inVS = '" . $_POST["inVS"] . "' WHERE PersonDataID = " . $ID);
    // if (!is_bool($rs)) {
    //     $rs->fetch_assoc();
    // }
} else {
    $mysqli->query("UPDATE PersonData SET inVS = NULL WHERE PersonDataID = " . $ID);
    // $rs = $mysqli->query("UPDATE PersonData SET inVS = NULL WHERE PersonDataID = " . $ID);
    // if (!is_bool($rs)) {
    //     $rs->fetch_assoc();
    // }
}

if (!empty($_POST["inRS"])) {
    $mysqli->query("UPDATE PersonData SET inRS = '" . $_POST["inRS"] . "' WHERE PersonDataID = " . $ID);
    // $rs = $mysqli->query("UPDATE PersonData SET inRS = '" . $_POST["inRS"] . "' WHERE PersonDataID = " . $ID);
    // if (!is_bool($rs)) {
    //     $rs->fetch_assoc();
    // }
} else {
    $mysqli->query("UPDATE PersonData SET inRS = NULL WHERE PersonDataID = " . $ID);
    // $rs = $mysqli->query("UPDATE PersonData SET inRS = NULL WHERE PersonDataID = " . $ID);
    // if (!is_bool($rs)) {
    //     $rs->fetch_assoc();
    // }
}

if (!empty($_POST["Minarai"])) {
    $mysqli->query("UPDATE PersonData SET Minarai = '" . $_POST["Minarai"] . "' WHERE PersonDataID = " . $ID);
    // $rs = $mysqli->query("UPDATE PersonData SET Minarai = '" . $_POST["Minarai"] . "' WHERE PersonDataID = " . $ID);
    // if (!is_bool($rs)) {
    //     $rs->fetch_assoc();
    // }
} else {
    $mysqli->query("UPDATE PersonData SET Minarai = NULL WHERE PersonDataID = " . $ID);
    // $rs = $mysqli->query("UPDATE PersonData SET Minarai = NULL WHERE PersonDataID = " . $ID);
    // if (!is_bool($rs)) {
    //     $rs->fetch_assoc();
    // }
}

if (!empty($_POST["Basic"])) {
    $mysqli->query("UPDATE PersonData SET Basic = '" . $_POST["Basic"] . "' WHERE PersonDataID = " . $ID);
    // $rs = $mysqli->query("UPDATE PersonData SET Basic = '" . $_POST["Basic"] . "' WHERE PersonDataID = " . $ID);
    // if (!is_bool($rs)) {
    //     $rs->fetch_assoc();
    // }
} else {
    $mysqli->query("UPDATE PersonData SET Basic = NULL WHERE PersonDataID = " . $ID);
    // $rs = $mysqli->query("UPDATE PersonData SET Basic = NULL WHERE PersonDataID = " . $ID);
    // if (!is_bool($rs)) {
    //     $rs->fetch_assoc();
    // }
}

if (!empty($_POST["Second"])) {
    $mysqli->query("UPDATE PersonData SET Second = '" . $_POST["Second"] . "' WHERE PersonDataID = " . $ID);
    // $rs = $mysqli->query("UPDATE PersonData SET Second = '" . $_POST["Second"] . "' WHERE PersonDataID = " . $ID);
    // if (!is_bool($rs)) {
    //     $rs->fetch_assoc();
    // }
} else {
    $mysqli->query("UPDATE PersonData SET Second = NULL WHERE PersonDataID = " . $ID);
    // $rs = $mysqli->query("UPDATE PersonData SET Second = NULL WHERE PersonDataID = " . $ID);
    // if (!is_bool($rs)) {
    //     $rs->fetch_assoc();
    // }
}

if (!empty($_POST["First"])) {
    $mysqli->query("UPDATE PersonData SET First = '" . $_POST["First"] . "' WHERE PersonDataID = " . $ID);
    // $rs = $mysqli->query("UPDATE PersonData SET First = '" . $_POST["First"] . "' WHERE PersonDataID = " . $ID);
    // if (!is_bool($rs)) {
    //     $rs->fetch_assoc();
    // }
} else {
    $mysqli->query("UPDATE PersonData SET First = NULL WHERE PersonDataID = " . $ID);
    // $rs = $mysqli->query("UPDATE PersonData SET First = NULL WHERE PersonDataID = " . $ID);
    // if (!is_bool($rs)) {
    //     $rs->fetch_assoc();
    // }
}

if (!empty($_POST["Kiku"])) {
    $mysqli->query("UPDATE PersonData SET Kiku = '" . $_POST["Kiku"] . "' WHERE PersonDataID = " . $ID);
    // $rs = $mysqli->query("UPDATE PersonData SET Kiku = '" . $_POST["Kiku"] . "' WHERE PersonDataID = " . $ID);
    // if (!is_bool($rs)) {
    //     $rs->fetch_assoc();
    // }
} else {
    $mysqli->query("UPDATE PersonData SET Kiku = NULL WHERE PersonDataID = " . $ID);
    // $rs = $mysqli->query("UPDATE PersonData SET Kiku = NULL WHERE PersonDataID = " . $ID);
    // if (!is_bool($rs)) {
    //     $rs->fetch_assoc();
    // }
}

if (!empty($_POST["Hayabusa"])) {
    $mysqli->query("UPDATE PersonData SET Hayabusa = '" . $_POST["Hayabusa"] . "' WHERE PersonDataID = " . $ID);
    // $rs = $mysqli->query("UPDATE PersonData SET Hayabusa = '" . $_POST["Hayabusa"] . "' WHERE PersonDataID = " . $ID);
    // if (!is_bool($rs)) {
    //     $rs->fetch_assoc();
    // }
} else {
    $mysqli->query("UPDATE PersonData SET Hayabusa = NULL WHERE PersonDataID = " . $ID);
    // $rs = $mysqli->query("UPDATE PersonData SET Hayabusa = NULL WHERE PersonDataID = " . $ID);
    // if (!is_bool($rs)) {
    //     $rs->fetch_assoc();
    // }
}

if (!empty($_POST["Fuji"])) {
    $mysqli->query("UPDATE PersonData SET Fuji = '" . $_POST["Fuji"] . "' WHERE PersonDataID = " . $ID);
    // $rs = $mysqli->query("UPDATE PersonData SET Fuji = '" . $_POST["Fuji"] . "' WHERE PersonDataID = " . $ID);
    // if (!is_bool($rs)) {
    //     $rs->fetch_assoc();
    // }
} else {
    $mysqli->query("UPDATE PersonData SET Fuji = NULL WHERE PersonDataID = " . $ID);
    // $rs = $mysqli->query("UPDATE PersonData SET Fuji = NULL WHERE PersonDataID = " . $ID);
    // if (!is_bool($rs)) {
    //     $rs->fetch_assoc();
    // }
}

if (!empty($_POST["SinkouSyourei"])) {
    $mysqli->query("UPDATE PersonData SET SinkouSyourei = '" . $_POST["SinkouSyourei"] . "' WHERE PersonDataID = " . $ID);
    // $rs = $mysqli->query("UPDATE PersonData SET SinkouSyourei = '" . $_POST["SinkouSyourei"] . "' WHERE PersonDataID = " . $ID);
    // if (!is_bool($rs)) {
    //     $rs->fetch_assoc();
    // }
} else {
    $mysqli->query("UPDATE PersonData SET SinkouSyourei = NULL WHERE PersonDataID = " . $ID);
    // $rs = $mysqli->query("UPDATE PersonData SET SinkouSyourei = NULL WHERE PersonDataID = " . $ID);
    // if (!is_bool($rs)) {
    //     $rs->fetch_assoc();
    // }
}

if (!empty($_POST["Syukyou"])) {
    $mysqli->query("UPDATE PersonData SET Syukyou = '" . $_POST["Syukyou"] . "' WHERE PersonDataID = " . $ID);
    // $rs = $mysqli->query("UPDATE PersonData SET Syukyouame = '" . $_POST["Syukyouame"] . "' WHERE PersonDataID = " . $ID);
    // if (!is_bool($rs)) {
    //     $rs->fetch_assoc();
    // }
} else {
    $mysqli->query("UPDATE PersonData SET Syukyou = NULL WHERE PersonDataID = " . $ID);
}

if (!empty($_POST["SyukyouName"])) {
    $mysqli->query("UPDATE PersonData SET SyukyouName = '" . $_POST["SyukyouName"] . "' WHERE PersonDataID = " . $ID);
} else {
    $mysqli->query("UPDATE PersonData SET SyukyouName = NULL WHERE PersonDataID =" . $ID);
    // $rs = $mysqli->query("UPDATE PersonData SET SyukyouName = NULL WHERE PersonDataID =" . $ID);
    // if (!is_bool($rs)) {
    //     $rs->fetch_assoc();
    // }
}




// if (is_bool($rs)) {
//     // var_dump($mysqli->error);
// } else {
//     $rs->fetch_assoc();
// }

// CSLeaderState = '" . $_POST["Name"] . "',
// CSLeaderEnd = '" . $_POST["Name"] . "',
// CSSubLeaderState = '" . $_POST["Name"] . "',
// CSSubLeaderEnd = '" . $_POST["Name"] . "',
// BSLeaderState = '" . $_POST["Name"] . "',
// BSLeaderEnd = '" . $_POST["Name"] . "',
// BSSubLeaderState = '" . $_POST["Name"] . "',
// BSSubLeaderEnd = '" . $_POST["Name"] . "',
// BSJouhanState = '" . $_POST["Name"] . "',
// BSJouhanEnd = '" . $_POST["Name"] . "',
// BSTaitukiState = '" . $_POST["Name"] . "',
// BSTaitukiEnd = '" . $_POST["Name"] . "',
// TaiSankaCount = TaiSankaCount + 1,
// HanSankaCount = HanSankaCount + 1,
// HikingCount = HikingCount + 1,
// CampCount = CampCount + 1,
// CampHakusu = CampHakusu + 1,
// VolunteerName = '" . $_POST["Name"] . "',
// VolunteerState = '" . $_POST["Name"] . "',
// VolunteerEnd = '" . $_POST["Name"] . "',
// OverseasEventName = '" . $_POST["Name"] . "',
// OverseasEventState = '" . $_POST["Name"] . "',
// OverseasEventEnd = '" . $_POST["Name"] . "',
// EventName = '" . $_POST["Name"] . "',
// EventState = '" . $_POST["Name"] . "',
// EventEnd = '" . $_POST["Name"] . "'
// ");



$mysqli->close();

header('Location:  ../HTML/index.php');
exit;
