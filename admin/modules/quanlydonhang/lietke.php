<style>
  table {
    /* font-family: arial, sans-serif; */
    border-collapse: collapse;
    /* width: 100%; */
  }

  td,
  th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }

  tr:nth-child(even) {
    background-color: #dddddd;
  }
</style>
<div class="quanlymenu">
  <h3>Liệt kê đơn hàng </h3>

  <?php
  //lấy tất cả từ giỏ hàng và kahchs hàng điều kiện 2 id bằng nhau 
  $sql_lietke_dh = "SELECT * FROM tbl_giohang,tbl_khackhang WHERE tbl_giohang.id_khachhang=tbl_khackhang.id_khachhang ORDER BY tbl_giohang.id_giohang DESC";
  $query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
  ?>
  <table class='lietkesp'>
    <tr class="header_lietke">
      <th>Id</th>
      <th>Mã đơn</th>
      <th>Tên khách hàng</th>
      <th>Địa chỉ</th>
      <th>Email</th>
      <th>Số điện thoại</th>
      <th>Thời gian</th>
      <th>Tình trạng</th>
      <th>Chi tiết đơn</th>

    </tr>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_dh)) {
      $i++;
    ?>
      <tr>
        <th><?php echo $i ?></th>
        <th><?php echo $row['code_cart'] ?></th>
        <th><?php echo $row['tenkhachhang'] ?></th>
        <th><?php echo $row['diachi'] ?></th>
        <th><?php echo $row['email'] ?></th>
        <th><?php echo $row['dienthoai'] ?></th>
        <th><?php echo $row['stime'] ?></th>
        <th>
          <?php if ($row['cart_status'] == 1) {
            echo '<a class="inputdonhang" href="modules/quanlydonhang/xuly.php?code=' . $row['code_cart'] . '">Đơn hàng mới</a>';
          } else {
            echo 'Đã gửi';
          } // nếu ấn vào 
          ?>
        </th>
        <th>
          <a class="inputdonhang" href="index.php?action=quanlydonhang&query=xemdonhang&code=<?php echo $row['code_cart'] ?>">Xem đơn hàng</a>
        </th>
        <!-- xem sản phẩm dựa vào mã đơn hàng -->

      </tr>
    <?php
    }
    ?>

  </table>

</div>