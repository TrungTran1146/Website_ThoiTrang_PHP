<?php

    include('../../config/config.php'); //truyền dữ liệu về mysql

    //gọi tên danh mục avf thứ tự từ bên trang thêm sang
    $lienhe = $_POST['lienhe'];
    $thutu = $_POST['thutu'];
    //bắt đầu truyền về mysq/
    if(isset($_POST['themlienhe'])){
        //them
        $sql_them = "INSERT INTO tbl_lienhe(lienhe,thutu) VALUE('".$lienhe."','".$thutu."')";
        mysqli_query($mysqli,$sql_them);
        header('location:../../index.php?action=quanlylienhe&query=them'); //quay lại trang them.php
    }
    elseif(isset($_POST['sualienhe'])){
        //sua
        $sql_update = "UPDATE tbl_lienhe SET lienhe='".$lienhe."',thutu='".$thutu."' WHERE id_lienhe='$_GET[idlienhe]'";
        mysqli_query($mysqli,$sql_update);
        header('location:../../index.php?action=quanlylienhe&query=them'); //quay lại trang them.php
    }
    else{
        //xóa
        $id=$_GET['idlienhe'];
        $sql_xoa = "DELETE FROM tbl_lienhe WHERE id_lienhe='".$id."'";
        mysqli_query($mysqli,$sql_xoa);
         header('location:../../index.php?action=quanlylienhe&query=them');
    }


?>