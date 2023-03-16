<?php

include('../../config/config.php'); //truyền dữ liệu về mysql

//gọi tên danh mục avf thứ tự từ bên trang thêm sang


$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanh = time() . '_' . $hinhanh;

$thutu = $_POST['thutu'];

$tinhtrang = $_POST['tinhtrang'];

//su li hinh anh


//bắt đầu truyền về mysq/
if (isset($_POST['themanhtrangbia'])) {
    //them
    $sql_them = "INSERT INTO tbl_anhtrangbia(hinhanh,thutu,tinhtrang) VALUE('" . $hinhanh . "','" . $thutu . "','" . $tinhtrang . "')";
    mysqli_query($mysqli, $sql_them);
    move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);
    header('location:../../index.php?action=anhtrangbia&query=them'); //quay lại trang them.php
} elseif (isset($_POST['suaanhtrangbia'])) {
    //sua
    if (!empty($_FILES['hinhanh']['name'])) {
        move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);

        $sql_update = "UPDATE tbl_anhtrangbia SET hinhanh='" . $hinhanh . "',thutu='" . $thutu . "',tinhtrang='" . $tinhtrang . "' WHERE id_anhtrangbia='$_GET[idanhtrangbia]'";
        // update xong mowis sua hinh anh
        $sql = "SELECT * FROM tbl_anhtrangbia WHERE id_anhtrangbia = '$_GET[idanhtrangbia]' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);
        while ($row = mysqli_fetch_array($query)) {
            unlink('./uploads/' . $row['hinhanh']);
        }
    } else {
        $sql_update = "UPDATE tbl_anhtrangbia SET thutu='" . $thutu . "',tinhtrang='" . $tinhtrang . "' WHERE id_anhtrangbia='$_GET[idanhtrangbia]'";
    }
    mysqli_query($mysqli, $sql_update);
    header('location:../../index.php?action=anhtrangbia&query=them'); //quay lại trang them.php
} else {
    //xoa
    $id = $_GET['idanhtrangbia'];
    $sql = "SELECT * FROM tbl_anhtrangbia WHERE id_anhtrangbia = '$id' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($query)) {
        unlink('uploads/' . $row['hinhanh']);
    }
    $sql_xoa = "DELETE FROM tbl_anhtrangbia WHERE id_anhtrangbia='" . $id . "'";
    mysqli_query($mysqli, $sql_xoa);
    header('location:../../index.php?action=anhtrangbia&query=them');
}
