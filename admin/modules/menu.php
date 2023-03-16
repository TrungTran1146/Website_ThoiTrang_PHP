<div class="sidebar1">
    <div class="sanpham">
        <a href="index.php">Thống kê</a>
    </div>
    <div class="sanpham">
        <a class="ti-angle-down" class="ti-angle-right">Quản lý sản phẩm</a>
        <div class="sanpham1">
            <a href="index.php?action=quanlymenu&query=them">Thêm menu</a>
            <a href="index.php?action=quanlysp&query=them">Thêm sản phẩm</a>
            <a href="index.php?action=quanlysp&query=lieke">Danh sách sản phẩm</a>
        </div>
    </div>
    <a href="index.php?action=quanlydonhang&query=lietke">Quản lý đơn hàng</a>
    <?php
    if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
        unset($_SESSION['dangnhap']);
        header('Location:../index.php');
    }
    ?>
    <?php

    if ($_SESSION['role_id'] == 1) {
        //admin
    ?>


        <div class="sanpham">
            <a>Quản lý trang chủ</a>
            <div class="sanpham1">
                <a href="index.php?action=quanlylienhe&query=them">Thêm liên hệ</a>
                <a href="index.php?action=anhtrangbia&query=them">Ảnh trang bìa</a>
            </div>
        </div>
        <div class="sanpham">
            <a href="index.php?action=quanlythanhvien&query=lietke">Quản lý thành viên</a>
        </div>
    <?php
        // Quản lý
    } else {
    ?>


        <div class="sanpham">
            <a>Quản lý trang chủ</a>
            <div class="sanpham1">
                <a href="index.php?action=quanlylienhe&query=them">Thêm liên hệ</a>

                <a href="index.php?action=anhtrangbia&query=them">Ảnh trang bìa</a>
            </div>
        </div>

    <?php
        // Nhân viên
    }
    ?>



    <p><a href="index.php?dangxuat=1">Đăng xuất <?php if (isset($_SESSION['dangnhap'])) {
                                                    echo $_SESSION['dangnhap'];
                                                } ?></a></p>
</div>
<!-- <ul  class='menu'>
    <li><a href="index.php?action=quanlymenu&query=them">Quản lí menu</a></li>
    <li><a href="index.php?action=quanlysp&query=them">Quản lí sản phẩm</a></li>
    <li><a href="index.php?action=quanlydonhang&query=lietke">Quản lí đơn hàng</a></li>
</ul> -->