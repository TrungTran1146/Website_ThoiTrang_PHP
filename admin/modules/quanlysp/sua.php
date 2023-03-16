<?php
$sql_sua_sp = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$_GET[idsanpham]' LIMIT 1";
$query_sua_sp = mysqli_query($mysqli, $sql_sua_sp);

?>
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
    <h3>Sửa sản phẩm</h3>
    <table class='them_menu'>
        <?php
        while ($row = mysqli_fetch_array($query_sua_sp)) {
        ?>

            <form method="POST" action="./modules/quanlysp/xuly.php?idsanpham=<?php echo $_GET['idsanpham'] ?>" enctype="multipart/form-data"> <!-- muon gui hinh anh qua post pha them enctype -->
                <tr>
                    <td class="them_menu1">Tên Sản Phẩm</td>
                    <td class="them_menu2"><input type="text" value="<?php echo $row['tensanpham'] ?>" name="tensanpham"></td>
                </tr>
                <tr>
                    <td class="them_menu1">Mã sp</td>
                    <td class="them_menu2"><input type="text" value="<?php echo $row['masp'] ?>" name="masp"></td>
                </tr>
                <tr>
                    <td class="them_menu1">Khuyến mãi %</td>
                    <td class="them_menu2"><input type="number" value="<?php echo $row['km'] ?>" name="km"></td>
                </tr>
                <tr>
                    <td class="them_menu1">Giá sp</td>
                    <td class="them_menu2"><input type="number" value="<?php echo $row['giasp'] ?>" name="giasp"></td>
                </tr>
                <tr>
                    <td class="them_menu1">Giá gốc Khuyến mãi</td>
                    <td class="them_menu2"><input type="number" value="<?php echo $row['giagockm'] ?>" name="giagockm"></td>
                </tr>
                <tr>
                    <td class="them_menu1">Số lượng</td>
                    <td class="them_menu2"><input type="number" value="<?php echo $row['soluong'] ?>" name="soluong"></td>
                </tr>
                <tr>
                    <td class="them_menu1">Hình ảnh</td>
                    <td class="them_menu2">
                        <input type="file" name="hinhanh">
                        <img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width=100px>
                    </td>
                </tr>

                <tr>
                    <td class="them_menu1">Tóm tắt</td>
                    <td class="them_menu2"><textarea rows="5" name="tomtat"><?php echo $row['tomtat'] ?> </textarea></td>
                </tr>
                <!-- <tr>
            <td>Nội dung</td>
            <td><textarea rows="5"  name="noidung"><?php echo $row['noidung'] ?></textarea></td>
        </tr> -->
                <tr>
                    <td class="them_menu1">Danh muc san pham</td>
                    <td class="them_menu2">
                        <select name="danhmuc">
                            <?php
                            $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                            $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                            while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                                if ($row_danhmuc['id_danhmuc'] == $row['id_danhmuc']) {
                            ?>
                                    <option selected value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                                <?php
                                } else {
                                ?>
                                    <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>

                            <?php
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="them_menu1">Tình trạng</td>
                    <td class="them_menu1">
                        <select name="tinhtrang">
                            <?php
                            if ($row['tinhtrang'] == 1) {
                            ?>
                                <option value="1" selected>Còn hàng</option>
                                <option value="0">Hết</option>
                            <?php
                            } else {
                            ?>
                                <option value="1">Còn hàng</option>
                                <option value="0" selected>Hết</option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr class="them_menu3">

                    <td colspan='2'><input type="submit" name='suasanpham' value='Sửa sản phẩm'></td>
                </tr>
            </form>
        <?php
        }
        ?>
    </table>
</div>