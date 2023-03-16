<?php
include("config/config.php");
$sqli = "SELECT * FROM tbl_khackhang,tbl_role where tbl_role.id_role  = tbl_khackhang.role_id order by `id_khachhang` ";
$query = mysqli_query($mysqli, $sqli);

?>
<style>
  table {
    /* font-family: arial, sans-serif; */
    border-collapse: collapse;
    width: 100%;
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
  <h2>Liệt kê thành viên</h2>
  <?php

  if ($_SESSION['role_id'] == 1) {
  ?>
    <a href="index.php?action=quanlythanhvien&query=them"><button class="btn1 btn-success">Thêm Thành Viên</button></a>
  <?php
  } else {
  }
  ?>
  <table class='lietkesp'>
    <tr class="header_lietke">
      <th>STT</th>
      <th>Họ và tên</th>
      <th>Địa chỉ</th>
      <th>Số điện thoại</th>
      <th>Email</th>
      <th>Quyền</th>
      <th colspan="2">Quản lý</th>
    </tr>

    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query)) {

      $i++;

      if ($row['role_id']  != 1 && $row['role_id'] != 4) {
    ?>
        <td><?php echo $i ?></td>
        <td><?php echo $row['tenkhachhang'] ?></td>
        <td><?php echo $row['diachi'] ?></td>
        <td><?php echo $row['dienthoai'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td><?php echo $row['name'] ?></td>
        <?php

        if ($_SESSION['role_id'] == 1) {
        ?>
          <td>
            <a href="modules/quanlythanhvien/xuly.php?idkhachhang=<?php echo $row['id_khachhang']; ?>"><button class="btn1 btn-danger">Xóa</button></a>
          </td>

        <?php
        } else {

        ?>
          <td width="80px">Ẩn</td>
        <?php } ?>
        <?php
        if ($_SESSION['role_id'] == 1) {
        ?>
          <td>
            <a href="?action=quanlythanhvien&query=sua&idkhachhang=<?php echo $row['id_khachhang'] ?> "><button class=" btn1 btn-warning">Sửa</button></a>
          </td>
        <?php
        } else {
        ?>
          <td width="80px">Ẩn</td>
        <?php } ?>
        </tr>

      <?php } ?>
    <?php
    }
    ?>

  </table>
</div>