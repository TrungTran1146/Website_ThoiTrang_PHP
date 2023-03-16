<div class="main-slider">
    <?php
    $sql_anhtrangbia = "SELECT * FROM tbl_anhtrangbia WHERE tinhtrang=1";
    $query_anhtrangbia = mysqli_query($mysqli, $sql_anhtrangbia);
    while ($row_anhtrangbia = mysqli_fetch_array($query_anhtrangbia)) {
    ?>
        <a href="#"><img class="mySlider" src="./admin/modules/anhtrangbia/uploads/<?php echo $row_anhtrangbia['hinhanh'] ?>" height=auto width=100%></a>
        <!-- <a href="#"><img class="mySlider" src="./assets/img/Anh BTL to1.jpg" height = auto width = 100%></a> -->
    <?php } ?>
</div>
<script>
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlider");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {
            myIndex = 1
        }
        x[myIndex - 1].style.display = "block";
        setTimeout(carousel, 2000); // Change image every 2 seconds
    }
</script>
<div class="main-content">

    <div class="content-section">
        <h2 class="phuonganhheader">New Arrivals</h2>
        <a href="index.php?quanly=shopall" class="section-sub-heading">Xem Thêm</a>
        <div class="maincontent">
            <?php
            $sql_pro = "SELECT * FROM tbl_sanpham WHERE tinhtrang=1 LIMIT 12 ";
            $query_pro = mysqli_query($mysqli, $sql_pro);
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

    </div>
</div>