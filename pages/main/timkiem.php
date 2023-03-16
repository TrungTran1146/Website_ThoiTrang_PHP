<?php


if (isset($_POST['timkiem'])) {
    $tukhoa = $_POST['tukhoa'];
}
$sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.tensanpham LIKE '%" . $tukhoa . "%'  ";
$query_pro = mysqli_query($mysqli, $sql_pro);

?>
<div class="headline">
    <h3>Tìm kiếm : <?php echo $_POST['tukhoa']; ?></h3>
</div>
<div class="maincontent">
    <?php
    $giaspkm = 0;
    while ($row_pro = mysqli_fetch_array($query_pro)) {
        if ($row_pro['km'] > 0) {
            $giaspkm = $row_pro['giasp'] - ($row_pro['giasp'] * ($row_pro['km'] / 100));
        };
    ?>

        <ul>
            <div class="maincontent-item">
                <div class="maincontent-top">

                    <?php
                    if ($row_pro['km'] == 0) {
                    } else {
                    ?>
                        <div class="khuyenmai"><?php echo number_format($row_pro['km']) . '%' ?></div>
                    <?php
                    }
                    ?>
                    <div class="maiconten-top1">

                        <a href="index.php?quanly=chitiet&idsanpham=<?php echo $row_pro['id_sanpham'] ?>" class="maincontent-img">
                            <img src="./admin/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh'] ?>">
                        </a>
                        <button type="submit" title='chi tiet' class="muangay" name="chitiet"><a href="index.php?quanly=chitiet&idsanpham=<?php echo $row_pro['id_sanpham'] ?>">Chi tiết</a></button>
                        <form method="POST" action="./pages/main/themgiohang.php?idsanpham=<?php echo $row_pro['id_sanpham'] ?>">
                            <button type="submit" title='thêm vào giỏ' name="themgiohang" class="giohang"><a>thêm vào giỏ</a></button>
                        </form>
                    </div>
                </div>
                <div class="maincontent-info">
                    <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>" class="maincontent-name"><?php echo $row_pro['tensanpham'] ?></a>
                    <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>" class="maincontent-gia"><?php if ($row_pro['km'] > 0) {
                                                                                                                            echo number_format($giaspkm) . 'vnd';
                                                                                                                        } else {
                                                                                                                            echo number_format($row_pro['giasp']) . 'vnd';
                                                                                                                        } ?>
                        <span><?php if ($row_pro['km'] > 0) {
                                    echo number_format($row_pro['giasp']) . 'vnd';
                                } else {
                                }
                                ?>
                        </span></a>
                </div>
            </div>
        </ul>
    <?php
    }
    ?>

</div>