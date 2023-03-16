<div>
    <input type="checkbox" class="check-xemngay" name="check-xemngay" id="check-xemngay">
    <label for="check-xemngay" class="xemngay"></label>
    <?php
        // $sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_danhmuc.id_sanpham = '$_GET[id]' LIMIT 1";
        // $query_pro = mysqli_query($mysqli,$sql_pro);
        // while($row_pro = mysqli_fetch_array($query_pro)){
    ?> 
    <div class="main_xemngay">
        <div class="imgxemngay">
            <img src="./assets/img/Anh BTL be3.jpg" alt="">
        </div>
        <div  class="main_xemngay2">
            <p>Tên sản phẩm</p>
            <p>Tình trạng:<span>Còn hàng</span></p>
            Giá:<span class="giamuangay">1500000đ<span>1.200.000đ</span></span>
            <div class="luachon_xemngay">
                Size:
                <input type="radio" name="gender" value="mauao">S
                <input type="radio" name="gender" value="mauao">M
                <input type="radio" name="gender" value="mauao">L
                <input type="radio" name="gender" value="mauao">XL
                <input type="radio" name="gender" value="mauao">XXL
            </div><br>
            Chất liệu: Cotton chân cua, thêu.<br>
            Sản phẩm được vận chuyển từ 2-3 ngày.<br>
            Thiết kế và sản xuất bởi Hades Studio
            
            <div class="muangay_soluong">
                <p>Số lượng : </p>
                <div class="cart_spgiohang-sl">
                    <p class="ti-plus"></p>
                    <span class="cart_spgiohang-sl_stt">1</span>
                    <p class="ti-minus"></p>
                </div>
            </div>
            <a method="POST" href="./pages/main/themgiohang.php?idsanpham=<?php  ?>" class="muangay_themvaogio">thêm vào giỏ</a>
            
        </div>
        <label for="check-xemngay" class="search_modal-icon-btn ti-close"></label>
    </div>
    
</div>