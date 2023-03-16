<?php
$sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);

?>
<div class="sidebar">
    <a href="./index.php" class="header-slb"><img src="./assets/img/logo.png" alt="logo" height=auto width=60%></a>
    <ul>
        <li><a class="gachchan" href="index.php?quanly=shopall">Tất cả sản phẩm</a></li>
        <li><a class="gachchan" href="index.php?quanly=sale">Khuyến mãi</a></li>
        <?php
        while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
        ?>
            <li><a class="gachchan" href="index.php?quanly=danhmuc&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a></li>

        <?php
        }
        ?>
    </ul>
</div>