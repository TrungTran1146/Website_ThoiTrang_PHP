               <div class="cart">
                   <div class="cart_header">
                       <a href="./index.php">Trang chủ</a>
                   </div>
                   <?php
                    if (isset($_SESSION['dangky'])) {
                        echo 'Xin chào: ' . $_SESSION['dangky'];
                    }
                    ?>

                   <div class="cart_main">


                       <div class="cart_main--sp">
                           <h3>GIỎ HÀNG CỦA BẠN</h3>
                           <div class="cart_main--sp_ul">
                               <div>
                                   <?php
                                    if (isset($_SESSION['cart'])) {
                                        $i = 0;
                                        $tongtien = 0;
                                        $soluongsanpham = 0;


                                        foreach ($_SESSION['cart'] as $cart_item) {
                                            $thanhtien = $cart_item['soluong'] * $cart_item['giasp'];
                                            $tongtien += $thanhtien;
                                            $soluongsanpham += $cart_item['soluong'];
                                            $i++;

                                    ?>

                                           <div class="spgiohang_cart">
                                               <div class="cart_spgiohang-img" name="hinhanh">
                                                   <img src="./admin/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh'] ?>" alt="sp1" width="100%" height="auto">
                                               </div>
                                               <div class="cart_info-sp">
                                                   <a href="index.php?quanly=chitiet&idsanpham=<?php echo $cart_item['id'] ?>">
                                                       <p name="tensanpham"><?php echo $cart_item['tensanpham'] ?></p>
                                                   </a><!-- thêm chi link chi tiết sản phẩm -->
                                                   <!-- <p><input type="text" placeholder="Chọn Size" name="size"></p> -->
                                               </div>
                                               <div class="cart_spgiohang-sl">
                                                   <a href="./pages/main/themgiohang.php?cong=<?php echo $cart_item['id'] ?>" class="ti-plus"></a>
                                                   <span name="soluong" class="cart_spgiohang-sl_stt"><?php echo $cart_item['soluong'] ?></span>
                                                   <a href="./pages/main/themgiohang.php?tru=<?php echo $cart_item['id'] ?>" class="ti-minus"></a>
                                               </div>
                                               <div name="giasp" class="cart_spgiohang-monney"><?php echo number_format($cart_item['giasp']) . 'đ' ?></div>
                                               <div class="cart_spgiohang-thanhtien">
                                                   <p>Thành tiền</p>
                                                   <p class="color_red"><?php echo number_format($thanhtien) . 'đ' ?></p>
                                                   <a href="./pages/main/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>" class="color_red ti-trash"></a>
                                               </div>
                                           </div>

                                       <?php
                                        }
                                        ?>
                                       <div class="cart_main--sp_ul--heading">Bạn đang có <?php echo $soluongsanpham ?> sản phẩm trong giỏ hàng</div>

                               </div>
                               <div class="cart_main-footer">
                                   <div class="cart_ghichu">
                                       <p for="fnote">Ghi chú đơn hàng</p><br>
                                       <textarea type="text" id="fnote" name="fnote"></textarea>
                                   </div>
                                   <div class="cart_chinhsachdoitra">
                                       <ul>
                                           <h4>Chính sách Đổi/Trả</h4>
                                           <li>Sản phẩm được đổi 1 lần duy nhất, không hỗ trợ trả.</li>
                                           <li>Sản phẩm còn đủ tem mác, chưa qua sử dụng.</li>
                                           <li>Sản phẩm nguyên giá được đổi trong 30 ngày trên toàn hệ thống.</li>
                                           <li>Sản phẩm sale chỉ hỗ trợ đổi size (nếu cửa hàng còn) trong 7 ngày trên toàn hệ thống.</li>

                                       </ul>
                                   </div>
                               </div>

                           </div>

                       </div>

                       <div class="cart_main--sidebar">
                           <div>
                               <a href="./index.php" class="cart_main--sidebar_next">
                                   <p>Tiếp tục mua hàng →</p>
                               </a>
                           </div>
                           <div class="cart_main--sidebar_main">
                               <p class="cart_main--sidebar_main-1">Thông tin đơn hàng</p>
                               <p class="cart_main--sidebar_main-2">Tổng tiền: :<?php
                                                                                echo number_format($tongtien) . '₫';  ?></p>
                           <?php
                                    } else {
                            ?>
                               <div class="cart_main--sp_ul--heading">Giỏ hàng không có sản phẩm nào <img src="assets/img/download.png" alt=""></div>
                           <?php
                                    }
                            ?>

                           <div class="cart_main--sidebar_main-3">
                               <p>Bạn phải đăng nhập để thanh toán</p>
                               <?php
                                if (isset($_SESSION['dangky'])) {
                                ?>
                                   <!-- href="pages/main/thanhtoan.php" -->
                                   <a href="pages/main/thanhtoan.php" name="thanhtoan">THANH TOÁN</a>
                               <?php
                                } else {
                                ?>
                                   <a href="index.php?quanly=dangnhap">ĐĂNG NHẬP THANH TOÁN</a>
                               <?php
                                }
                                ?>
                           </div>
                           </div>
                       </div>

                       <div></div>
                   </div>
                   <div class="cart_thamkhaao">
                       <div class="cart_thamkhaao-1">
                           <h2>Có thể bạn sẽ thích</h2>
                           <p><a href="index.php?quanly=shopall">Xem thêm</a></p> <!-- thêm chi link sản phẩm mới -->
                       </div>
                       <div class="maincontent">

                           <?php
                            $sql_pro = "SELECT * FROM tbl_sanpham order by RAND() LIMIT 4 ";
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