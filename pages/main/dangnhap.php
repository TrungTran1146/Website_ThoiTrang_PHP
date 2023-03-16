<?php
if (isset($_POST['dangnhap'])) {
    $email = $_POST['email'];
    $matkhau = md5($_POST['password']);
    $sql = "SELECT * FROM tbl_khackhang WHERE email='" . $email . "' AND matkhau='" . $matkhau . "' LIMIT 1";
    $row = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($row);
    if ($count > 0) {
        $row_data = mysqli_fetch_array($row);
        $_SESSION['dangky'] = $row_data['tenkhachhang'];
        $_SESSION['id_khachhang'] = $row_data['id_khachhang']; //laays id khach hang de thanh toan
        $_SESSION['role_id'] = $row_data['role_id'];

        $_SESSION['email'] = $row_data['email'];
        if ($_SESSION['role_id'] == 4) {
            header("Location:index.php");
        } else {
            header("Location:admin/index.php");
        }
    } else {
        echo '<script>alert("Tài khoản hoặc Mật khẩu không đúng,vui lòng nhập lại.");</script>';
    }
}
?>

<form action="" method="POST">
    <div class="login-dkdn">
        <h2> Đăng nhập </h2>
        <a>
            Email <span style="color:red">*</span>
        </a><br>
        <input type="text " name="email"><br>
        <a>
            Password<span style="color:red">*</span>
        </a><br>
        <input type="password" name="password"><br>
        <button name="dangnhap">Đăng nhập </button>
        <!-- <a href="#"> Quên mật khẩu? </a> -->
        <i>hoặc </i>
        <a href="./index.php?quanly=dangky"> Đăng kí </a>
        <div><a href="./index.php"> ← Quay lại trang chủ </a></div><br>
    </div>
</form>