<?php

session_start();
include('../../admin/config/config.php');
$id_khachhang = $_SESSION['id_khachhang'];
$code_order = rand(0, 9999);
$updata_time = date('Y-m-d H:i:s');
$insert_cart = "INSERT INTO tbl_giohang(id_khachhang,code_cart,cart_status,stime) VALUE('" . $id_khachhang . "','" . $code_order . "',1,'" . $updata_time . "')"; //laf 1 khi ddown hanfg mowis nhat
$cart_query = mysqli_query($mysqli, $insert_cart);
if ($cart_query) { //neeus isset thanh cong
	//them gio hang chi tiet
	foreach ($_SESSION['cart'] as $key => $value) {

		$id_sanpham = $value['id'];
		$soluong = $value['soluong'];

		//lay id va so luong tu gio hang 
		$insert_order_details = "INSERT INTO tbl_cart_details(id_sanpham,code_cart,soluongmua) VALUE('" . $id_sanpham . "','" . $code_order . "','" . $soluong . "')";
		mysqli_query($mysqli, $insert_order_details); //luu vao bang tbl_cart_details
	}
}
unset($_SESSION['cart']); //khi thanh toan thanh cong thi xoa bo gio hang
header('Location:../../index.php?quanly=ketqua');
