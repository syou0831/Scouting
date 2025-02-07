<?php
session_start();
unset($_SESSION["GID"]);
header("Location: ../HTML/Login.php");
