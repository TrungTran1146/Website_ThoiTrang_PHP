<div class="main">
    <div>

        <?php
        if (isset($_GET['quanly'])) {
            $tam = $_GET['quanly'];
        } else {
            $tam = '';
        }
        if ($tam == 'danhmuc') {
            include('./pages/main/danhmuc.php');
        } elseif ($tam == 'sanpham') {
            include('./pages/main/sanpham.php');
        } elseif ($tam == 'giohang') {
            include('./pages/main/giohang.php');
        } elseif ($tam == 'dangky') {
            include('./pages/main/dangky.php');
        } elseif ($tam == 'thanhtoan') {
            include('./pages/main/thanhtoan.php');
        } elseif ($tam == 'dangnhap') {
            include('./pages/main/dangnhap.php');
        } elseif ($tam == 'timkiem') {
            include('./pages/main/timkiem.php');
        } elseif ($tam == 'ketqua') {
            include('./pages/main/ketquathanhtoan.php');
        } elseif ($tam == 'shopall') {
            include('./pages/main/all.php');
        } elseif ($tam == 'sale') {
            include('./pages/main/sale.php');
        } elseif ($tam == 'chitiet') {
            include('./pages/main/chitietsp.php');
        } elseif ($tam == 'thongtintaikhoann') {
            include('./pages/main/thongtintaikhoan.php');
        } elseif ($tam == 'suathongtintaikhoann') {
            include('./pages/main/suataikhoan.php');
        } else {
            include('./pages/main/index.php');
        }

        ?>


        <?php
        include('./pages/footermodal/footer.php');
        ?>

        <div class="clear"></div>

    </div>
    <div class="clear"></div>

    <?php
    include('./pages/footermodal/modal.php');
    ?>
    <div class="modal">

    </div>