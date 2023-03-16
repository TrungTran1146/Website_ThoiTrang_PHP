<h1 style="text-align:center;"> TÀI KHOẢN CỦA BẠN </h1>


<div style="text-align:center;" class="thongtin">
    <div class="information-left ">
        <p style="margin-bottom: 2.5%; font-size: 40px ;font-weight: bold;">Thông tin địa chỉ </p>
        <div>
            <?php
            $sql_pro = "SELECT * FROM tbl_khackhang WHERE tbl_khackhang.id_khachhang = '$_GET[id]'  LIMIT 1"; //lấy tất cả sản phẩm dựa vào id 
            $query_pro = mysqli_query($mysqli, $sql_pro);
            while ($row_taikhoan = mysqli_fetch_array($query_pro)) {
            ?>
                <div style="text-align:center;" class="adress-1 ">
                    <p><?php echo $row_taikhoan['tenkhachhang'] ?></p>
                </div>
                <div class="adress-2">
                    <h4 style="color:black;"> Tên khách hàng: <?php echo $row_taikhoan['tenkhachhang'] ?> </h4>
                    <p style="margin-top: 30px;">Địa chỉ: <?php echo $row_taikhoan['diachi'] ?> </p>
                    <p>Điện thoại: <?php echo $row_taikhoan['dienthoai'] ?></p>
                    <p>Email: <?php echo $row_taikhoan['email'] ?></p>
                    <form action="./index.php?quanly=suathongtintaikhoann&id=<?php echo $row_taikhoan['id_khachhang'] ?>" method="POST">
                        <button name="suathongtin">Sửa thông tin tài khoản </button>
                    </form>
                </div>
        </div>
    <?php  } ?>
    </div>
</div>
</div>