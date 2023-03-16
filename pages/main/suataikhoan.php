<?php
if (isset($_POST['sua'])) {
    $tenkhachhang = $_POST['hoten'];
    $diachi = $_POST['diachi'];
    $dienthoai = $_POST['dienthoai'];
    $email = $_POST['email'];
    $matkhau = md5($_POST['matkhau']);
    $sql_update = "UPDATE tbl_khackhang SET tenkhachhang='" . $tenkhachhang . "',diachi='" . $diachi . "',dienthoai='" . $dienthoai . "',email='" . $email . "',matkhau='" . $matkhau . "' WHERE id_khachhang='$_GET[id]'";
    mysqli_query($mysqli, $sql_update);
    header('location:./index.php');
}

?>
<?php
$sql_sua_cs = "SELECT * FROM tbl_khackhang WHERE tbl_khackhang.id_khachhang = '$_GET[id]'  LIMIT 1";
$query_sua_cs = mysqli_query($mysqli, $sql_sua_cs);
while ($row = mysqli_fetch_array($query_sua_cs)) {
?>
    <form action="#" method="POST">
        <div class="login-dkdn">
            <h2>Sửa thông tin tài khoản </h2>
            <input type="text" placeholder="<?php echo $row['tenkhachhang'] ?>" name="hoten"><br>
            <input type="text" placeholder="<?php echo $row['diachi'] ?>" name="diachi"><br>
            <input type="text" placeholder="<?php echo $row['dienthoai'] ?>" name="dienthoai"><br>
            <input type="text" placeholder="<?php echo $row['email'] ?>" name="email"><br>
            <input type="password" placeholder="<?php echo $row['matkhau'] ?>" name="matkhau"><br>
            <button name="sua">Sửa</button>
            <div><a href="./index.php">
                    <p> ← Quay lại trang chủ</p>
                </a></div>
        </div>
    </form>
<?php } ?>