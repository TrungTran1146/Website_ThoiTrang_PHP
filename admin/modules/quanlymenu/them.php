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
    <h3>thêm menu</h3>
    <table class='them_menu'>
        <form method="POST" action="./modules/quanlymenu/xuly.php">
            <tr>
                <td class="them_menu1">Thêm tên MENU</td>
                <td class="them_menu2"><input type="text" name="tendanhmuc" value="" placeholder="Tên Menu"></td>
            </tr>
            <tr>
                <td class="them_menu1">Thứ tự</td>
                <td class="them_menu2"><input type="number" name="thutu" value="Thứ Tự"></td>
            </tr>
            <tr class="them_menu3">

                <td colspan='2'><input type="submit" name='themdanhmuc' value='Thêm danh mục menu'></td>
            </tr>
        </form>
    </table>
</div>