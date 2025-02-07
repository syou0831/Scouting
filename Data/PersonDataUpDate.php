<?php
require 'dbConf.inc';
$mysqli = new mysqli(HOST_NAME, USER_NAME, DB_PASS);
$mysqli->select_db(DB_NAME);
$mysqli->set_charset(UTF8);
if ($mysqli->connect_errno) {
}

$ID = $_POST["PID"];

if (!empty($_POST["Name"])) {
    $rs = $mysqli->query('UPDATE PersonData SET Name = "' . $_POST["Name"] . '" WHERE PersonID = ' . $ID);
    if (!is_bool($rs)) {
        $rs->fetch_assoc();
    }
}

if (!empty($_POST["NameKana"])) {
    $rs = $mysqli->query("UPDATE PersonData SET NameFurigana = '" . $_POST["NameKana"] . "' WHERE PersonID = " . $ID);
    if (!is_bool($rs)) {
        $rs->fetch_assoc();
    }
}

if (!empty($_POST["Birthday"])) {
    $rs = $mysqli->query("UPDATE PersonData SET Birthday = '" . $_POST["Birthday"] . "' WHERE PersonID = " . $ID);
    if (!is_bool($rs)) {
        $rs->fetch_assoc();
    }
}

if (!empty($_POST["Address"])) {
    $rs = $mysqli->query("UPDATE PersonData SET Address = '" . $_POST["Address"] . "' WHERE PersonID = " . $ID);
    if (!is_bool($rs)) {
        $rs->fetch_assoc();
    }
}

if (!empty($_POST["FirstTel"]) && !empty($_POST["SecondTel"]) && !empty($_POST["ThirdTel"])) {
    $rs = $mysqli->query("UPDATE PersonData SET Tel = '" . $_POST["FirstTel"] . "-" . $_POST["SecondTel"] . "-" . $_POST["ThirdTel"] . "' WHERE PersonID = " . $ID);
    if (!is_bool($rs)) {
        $rs->fetch_assoc();
    }
}

if (!empty($_POST["StateDate"])) {
    $rs = $mysqli->query("UPDATE PersonData SET StateDate = '" . $_POST["StateDate"] . "' WHERE PersonID = " . $ID);
    if (!is_bool($rs)) {
        $rs->fetch_assoc();
    }
}

if (!empty($_POST["StateField"])) {
    $rs = $mysqli->query("UPDATE PersonData SET StateField = '" . $_POST["StateField"] . "' WHERE PersonID = " . $ID);
    if (!is_bool($rs)) {
        $rs->fetch_assoc();
    }
}

if (!empty($_POST["inBVS"])) {
    $rs = $mysqli->query("UPDATE PersonData SET inBVS = '" . $_POST["inBVS"] . "' WHERE PersonID = " . $ID);
    if (!is_bool($rs)) {
        $rs->fetch_assoc();
    }
} else {
    $rs = $mysqli->query("UPDATE PersonData SET inBVS = NULL WHERE PersonID = " . $ID);
    if (!is_bool($rs)) {
        $rs->fetch_assoc();
    }
}

if (!empty($_POST["inCS"])) {
    $rs = $mysqli->query("UPDATE PersonData SET inCS = '" . $_POST["inCS"] . "' WHERE PersonID = " . $ID);
    if (!is_bool($rs)) {
        $rs->fetch_assoc();
    }
} else {
    $rs = $mysqli->query("UPDATE PersonData SET inCS = NULL WHERE PersonID = " . $ID);
    if (!is_bool($rs)) {
        $rs->fetch_assoc();
    }
}

if (!empty($_POST["inBS"])) {
    $rs = $mysqli->query("UPDATE PersonData SET inBS = '" . $_POST["inBS"] . "' WHERE PersonID = " . $ID);
    if (!is_bool($rs)) {
        $rs->fetch_assoc();
    }
} else {
    $rs = $mysqli->query("UPDATE PersonData SET inBS = NULL WHERE PersonID = " . $ID);
    if (!is_bool($rs)) {
        $rs->fetch_assoc();
    }
}

if (!empty($_POST["inVS"])) {
    $rs = $mysqli->query("UPDATE PersonData SET inVS = '" . $_POST["inVS"] . "' WHERE PersonID = " . $ID);
    if (!is_bool($rs)) {
        $rs->fetch_assoc();
    }
} else {
    $rs = $mysqli->query("UPDATE PersonData SET inVS = NULL WHERE PersonID = " . $ID);
    if (!is_bool($rs)) {
        $rs->fetch_assoc();
    }
}

if (!empty($_POST["inRS"])) {
    $rs = $mysqli->query("UPDATE PersonData SET inRS = '" . $_POST["inRS"] . "' WHERE PersonID = " . $ID);
    if (!is_bool($rs)) {
        $rs->fetch_assoc();
    }
} else {
    $rs = $mysqli->query("UPDATE PersonData SET inRS = NULL WHERE PersonID = " . $ID);
    if (!is_bool($rs)) {
        $rs->fetch_assoc();
    }
}

if (!empty($_POST["Minarai"])) {
    $rs = $mysqli->query("UPDATE PersonData SET Minarai = '" . $_POST["Minarai"] . "' WHERE PersonID = " . $ID);
    if (!is_bool($rs)) {
        $rs->fetch_assoc();
    }
} else {
    $rs = $mysqli->query("UPDATE PersonData SET Minarai = NULL WHERE PersonID = " . $ID);
    if (!is_bool($rs)) {
        $rs->fetch_assoc();
    }
}

if (!empty($_POST["Basic"])) {
    $rs = $mysqli->query("UPDATE PersonData SET Basic = '" . $_POST["Basic"] . "' WHERE PersonID = " . $ID);
    if (!is_bool($rs)) {
        $rs->fetch_assoc();
    }
} else {
    $rs = $mysqli->query("UPDATE PersonData SET Basic = NULL WHERE PersonID = " . $ID);
    if (!is_bool($rs)) {
        $rs->fetch_assoc();
    }
}

if (!empty($_POST["Second"])) {
    $rs = $mysqli->query("UPDATE PersonData SET Second = '" . $_POST["Second"] . "' WHERE PersonID = " . $ID);
    if (!is_bool($rs)) {
        $rs->fetch_assoc();
    }
} else {
    $rs = $mysqli->query("UPDATE PersonData SET Second = NULL WHERE PersonID = " . $ID);
    if (!is_bool($rs)) {
        $rs->fetch_assoc();
    }
}

if (!empty($_POST["First"])) {
    $rs = $mysqli->query("UPDATE PersonData SET First = '" . $_POST["First"] . "' WHERE PersonID = " . $ID);
    if (!is_bool($rs)) {
        $rs->fetch_assoc();
    }
} else {
    $rs = $mysqli->query("UPDATE PersonData SET First = NULL WHERE PersonID = " . $ID);
    if (!is_bool($rs)) {
        $rs->fetch_assoc();
    }
}

if (!empty($_POST["Kiku"])) {
    $rs = $mysqli->query("UPDATE PersonData SET Kiku = '" . $_POST["Kiku"] . "' WHERE PersonID = " . $ID);
    if (!is_bool($rs)) {
        $rs->fetch_assoc();
    }
} else {
    $rs = $mysqli->query("UPDATE PersonData SET Kiku = NULL WHERE PersonID = " . $ID);
    if (!is_bool($rs)) {
        $rs->fetch_assoc();
    }
}

if (!empty($_POST["Hayabusa"])) {
    $rs = $mysqli->query("UPDATE PersonData SET Hayabusa = '" . $_POST["Hayabusa"] . "' WHERE PersonID = " . $ID);
    if (!is_bool($rs)) {
        $rs->fetch_assoc();
    }
} else {
    $rs = $mysqli->query("UPDATE PersonData SET Hayabusa = NULL WHERE PersonID = " . $ID);
    if (!is_bool($rs)) {
        $rs->fetch_assoc();
    }
}

if (!empty($_POST["Fuji"])) {
    $rs = $mysqli->query("UPDATE PersonData SET Fuji = '" . $_POST["Fuji"] . "' WHERE PersonID = " . $ID);
    if (!is_bool($rs)) {
        $rs->fetch_assoc();
    }
} else {
    $rs = $mysqli->query("UPDATE PersonData SET Fuji = NULL WHERE PersonID = " . $ID);
    if (!is_bool($rs)) {
        $rs->fetch_assoc();
    }
}

if (!empty($_POST["SinkouSyourei"])) {
    $rs = $mysqli->query("UPDATE PersonData SET SinkouSyourei = '" . $_POST["SinkouSyourei"] . "' WHERE PersonID = " . $ID);
    if (!is_bool($rs)) {
        $rs->fetch_assoc();
    }
} else {
    $rs = $mysqli->query("UPDATE PersonData SET SinkouSyourei = NULL WHERE PersonID = " . $ID);
    if (!is_bool($rs)) {
        $rs->fetch_assoc();
    }
}

if (!empty($_POST["Syukyou"])) {
    $rs = $mysqli->query("UPDATE PersonData SET Syukyouame = '" . $_POST["Syukyouame"] . "' WHERE PersonID = " . $ID);
    if (!is_bool($rs)) {
        $rs->fetch_assoc();
    }
} else {
    $rs = $mysqli->query("UPDATE PersonData SET Syukyouame = NULL WHERE PersonID = " . $ID);
    if (!is_bool($rs)) {
        $rs->fetch_assoc();
    }
}

if (!empty($_POST["SyukyouName"])) {
    $rs = $mysqli->query("UPDATE PersonData SET SyukyouName = '" . $_POST["SyukyouName"] . "' WHERE PersonID = " . $ID);
    if (!is_bool($rs)) {
        $rs->fetch_assoc();
    }
} else {
    $rs = $mysqli->query("UPDATE PersonData SET SyukyouName = NULL WHERE PersonID =" . $ID);
    if (!is_bool($rs)) {
        $rs->fetch_assoc();
    }
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
