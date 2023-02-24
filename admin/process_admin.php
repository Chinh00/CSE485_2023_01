<?php
    session_start();
    if (isset($_SESSION["isLogin"])) {
        if ($_SESSION["isLogin"] == 1) {
            unset($_SESSION["isLogin"]);
            header("Location: ../../../../BTTH01_CSE485/index.php");
        } else {
            header("Location: ../../../../BTTH01_CSE485/index.php");
        }  
    }
    else {
        header("Location: ../../../../BTTH01_CSE485/index.php");
    }

?>