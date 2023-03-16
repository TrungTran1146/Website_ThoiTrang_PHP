<div>
    <?php
    if (isset($_GET['trang'])) { //khi inset trang
        $page = $_GET['trang']; //đặt $page = $ i ở số trang
    } else {
        $page = 1;
    }
    if ($page == '' || $page == 1) {     // khi trang 1 hoặc ko có số trang thì begin = 0
        $begin = 0;
    } else {
        $begin = ($page * 8) - 8;   // khi số khác thì lấy số trang nhân với 2 và trừ đi 2 sản phẩn trang trước vd đang lấy là mỗi trang 2 sp
    }

    //$sql_pro = "SELECT * FROM tbl_sanpham  DESC LIMIT $begin,2";
    $sql_pro = "SELECT * FROM tbl_sanpham ORDER BY id_sanpham DESC LIMIT $begin,8"; //lấy tất cả sản phẩm dựa vào id 
    $query_pro = mysqli_query($mysqli, $sql_pro);

    ?>

    <div class="headline">
        <h3>Tất cả các sản phẩm</h3>
    </div>
    <div class="home-sort">
        <span class="filter-sort">Trang: <?php echo $page ?></span>

    </div>
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
<div class="content-paging">
    <?php
    $sql_trang = mysqli_query($mysqli, "SELECT * FROM tbl_sanpham  "); // lấy tất cả dữ liệu sản phẩm từ tbl sản phẩm điêu kiện có id danh mục  trùng với id danh mục trong tbl sản phẩm
    $row_count = mysqli_num_rows($sql_trang);
    $trang = ceil($row_count / 8); //chia cho 2 này là lấy ví dụ mỗi trang có 2 sản phẩm
    // echo $trang;
    ?>
    <div class="filter-page">
        <!-- <a href="" class="filter-page-control fas ti-angle-left"></a> -->
        <?php
        for ($i = 1; $i <= $trang; $i++) {
        ?>
            <a <?php if ($i == $page) {
                    echo 'style="color: red;background-color: #ccc;"';
                } else {
                    '';
                } ?> href="index.php?quanly=shopall&trang=<?php echo $i ?>" class="filter-page-number"><?php echo $i ?></a>
            <!-- kia là điều kiện nếu bấm vào trang nào thì trang đó có css như kia còn không là rỗng còn kia là đường link điều kiên -->
        <?php
        }
        ?>

    </div>
</div>