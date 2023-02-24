<?php
include 'includes/Database.php';

session_start();
showData($_SESSION);

if (isset($_POST["username"], $_POST["password"])) {
    $uname = $_POST["username"];
    $upass = $_POST["password"];
    

    if ($db->getWithCondition("users", array("username" => $uname, "password" => $upass))) {
        $_SESSION["isLogin"] = 1;
        $_SESSION["role"] = "admin";
        header("Location: admin");

    } else {
        header("Location: login.php");
    }
} else {
    if (isset($_SESSION["isLogin"])) {
        unset($_SESSION["isLogin"]);
        header("Location: index.php");
    } else {
        header("Location: index.php");
    }
}

?>