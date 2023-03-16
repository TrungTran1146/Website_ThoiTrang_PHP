<?php
$sql_lietke_anhtrangbia = "SELECT * FROM tbl_anhtrangbia ORDER BY thutu ASC"; // goi tat cả dữ liệu từ tbl danh mục theo thứ tự từ nhỏ đến lớn
$query_lietke_anhtrangbia = mysqli_query($mysqli, $sql_lietke_anhtrangbia);  //truy xuất dữ liệu vào 

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
    <h3>Liệt kê ảnh trang bìa </h3>

    <table class='lietke_menu' style="    margin-left: 25%;">
        <tr class="header_lietke">
            <td>ID</td>
            <td class="them_menu2" style="width: 300px;">Hình ảnh</td>
            <td>Tình trạng</td>
            <td class="them_menu4">Quản lý</td>
        </tr>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_array($query_lietke_anhtrangbia)) {
            $i++;
            //gán tất cả dữ liệu vào $row và i tăng dần
        ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><img src="modules/anhtrangbia/uploads/<?php echo $row['hinhanh'] ?>" width=100px></td>
                <td><?php if ($row['tinhtrang'] == 1) {
                        echo 'Kích hoạt';
                    } else {
                        echo 'Ẩn';
                    }

                    ?>
                </td>
                <td>

                    <a href="./modules/anhtrangbia/xuly.php?idanhtrangbia=<?php echo $row['id_anhtrangbia'] ?>"> <button class="btn1 ">Xóa</button></a> <a href="index.php?action=anhtrangbia&query=sua&idanhtrangbia=<?php echo $row['id_anhtrangbia'] ?>"><button class="btn1 ">Sửa</button></a>

                </td>
            </tr>
        <?php
        }
        ?>
        </form>
    </table>
</div>