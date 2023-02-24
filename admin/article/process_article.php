<?php
    include '../../includes/Database.php';
    function uploadFile($file_name_from, $file_name_to) {
        move_uploaded_file($_FILES[$file_name_from]["tmp_name"], $file_name_to . basename($_FILES[$file_name_from]["name"]));
        return ($file_name_to . basename($_FILES[$file_name_from]["name"]));
    }
    function removeFile($file_old) {
        return unlink($file_old);
    }
    if (isset($_POST["delete"])) {
        $id = $_POST["delete"];
        $article_img = $db->getWithCondition("baiviet", array("ma_bviet" => $id))[0]["hinhanh"];
        if ($db->deleteWithCondition("baiviet", array("ma_bviet" => $id))) {
            removeFile($article_img);
            header("Location: article.php");
        }
        
    } else {
        if (isset($_POST['txtTitleName'], $_POST['txtMusicName'], $_POST['category_id'], $_POST['author_id'], $_POST['short_content'], $_POST['content'])) {
            $tieude = $_POST['txtTitleName'];
            $baihat = $_POST['txtMusicName'];
            $ma_tloai = $_POST['category_id'];
            $ma_tgia = $_POST['author_id'];
            $tomtat = $_POST['short_content'];
            $noidung = $_POST['content'];
            // $ngay_cap_nhat =  date("Y-m-d H:i:s" , time());
    
        } 
        if ($_POST["txtArticleId"]) {
            $txtArticleId = $_POST['txtArticleId'];
            if ($_FILES["img"]["name"]) {
                echo "Update with img";
                removeFile($_POST["img_old"]);
                $file_name = uploadFile("img", "../../public/images/article/");
                if ($db->updateWithCondition("baiviet", array('tieude' => $tieude,'ten_bhat' => $baihat,'ma_tloai' => $ma_tloai,'ma_tgia' => $ma_tgia,'tomtat' => $tomtat,'noidung' => $noidung, "hinhanh" => $file_name), array("ma_bviet"=> $txtArticleId))){
                    header("Location: article.php");
                }
            } else {
                if ($db->updateWithCondition("baiviet", array('tieude' => $tieude,'ten_bhat' => $baihat,'ma_tloai' => $ma_tloai,'ma_tgia' => $ma_tgia,'tomtat' => $tomtat,'noidung' => $noidung), array("ma_bviet" => $txtArticleId))){
                    header("Location: article.php");
                }
            }
        } else {
                                
            
            
            if (isset($_POST["img"])) {
                $file_name = uploadFile("img", "../../public/images/article/");
                if ($db->insertRecord("baiviet", array(
                                                    "tieude" => $tieude,
                                                    "ten_bhat" => $baihat,
                                                    "ma_tloai" => $ma_tloai,
                                                    "tomtat" => $tomtat,
                                                    "noidung" => $noidung,
                                                    "ma_tgia" => $ma_tgia,
                                                    "ngayviet" => $ngay_cap_nhat,
                                                    "hinhanh" => $file_name
                                                    ))) 
                {
                    header("Location: article.php");
                }
            } else {
                if ($db->insertRecord("baiviet", array(
                                                    "tieude" => $tieude,
                                                    "ten_bhat" => $baihat,
                                                    "ma_tloai" => $ma_tloai,
                                                    "tomtat" => $tomtat,
                                                    "noidung" => $noidung,
                                                    "ma_tgia" => $ma_tgia,
                                                    "ngayviet" => $ngay_cap_nhat,
                                                    ))) 
                {
                    header("Location: article.php");
                }
            }
    
    
        }
    }




?>