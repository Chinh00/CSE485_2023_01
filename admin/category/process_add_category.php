<?php
    include '../../includes/Database.php';
    function removeFile($file_old) {
        return unlink($file_old);
    }
    if (isset($_POST["txtCatName"])) {
        $txtCatName = $_POST["txtCatName"] ;
        
        if (isset($_POST["txtCatId"])) {
            if ($db->updateWithCondition("theloai", array("ten_tloai" => $txtCatName), array("ma_tloai" => $_POST["txtCatId"]))) {
                header("Location: category.php");
            }
        } else {
            if ($db->insertRecord("theloai", array("ten_tloai" => $txtCatName))){
                header("Location: category.php");
            }
        }
        
    }

    if ($_POST["delete"]) {
        $id = $_POST["delete"];
        $article_imgs = $db->getWithCondition("baiviet", array("ma_tloai" => $id));
        foreach($article_imgs as $key => $val) {
            removeFile($val["hinhanh"]);
        }
        $db->deleteWithCondition("baiviet", array("ma_tloai" => $id));
        $db->deleteWithCondition("theloai", array("ma_tloai" => $id));
        header("Location: category.php");
        
    }
?>