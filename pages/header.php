<?php
if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
    unset($_SESSION['dangky']);
}
?>


<div class="header ">
    <div class="logo-header pd-28">ChristianDior</div>
    <div class="account-links pd-28">
        <?php
        if (isset($_SESSION['dangky'])) {
        ?>
            <a href="./index.php?quanly=thongtintaikhoann&id=<?php echo $_SESSION['id_khachhang'] ?>" id="login"><?php echo $_SESSION['dangky']; ?></a>
            /
            <a href="index.php?dangxuat=1" id="regist">Đăng xuất</a>
        <?php
        } else {
        ?>

            <a class="dangnhap" href="./index.php?quanly=dangnhap" id="login">Đăng nhập</a>
            /
            <a class="dangki" href="./index.php?quanly=dangky" id="regist">Đăng ký</a>
        <?php
        }
        ?>

    </div>
    <label for="check-timkiem">
        <div class="ti-search icon-header "></div>
    </label>

    <a href="index.php?quanly=giohang" class="cart-shopping pd-28">
        <i class="ti-shopping-cart">
            <?php
            if (isset($_SESSION['cart'])) {
                $soluongsanpham = 0;
                foreach ($_SESSION['cart'] as $cart_item) {
                    $soluongsanpham += $cart_item['soluong'];
                }
            ?>(<?php echo $soluongsanpham ?>)
        <?php }
        ?>
        </i>

    </a>



</div>