<div>
    <?php
    if (isset($_GET['action']) && $_GET['query']) {
        $tam = $_GET['action'];
        $query = $_GET['query'];
    } else {
        $tam = '';
        $query = '';
    }
    if ($tam == 'quanlymenu' && $query == 'them') {
        include('./modules/quanlymenu/them.php');
        include('./modules/quanlymenu/lietke.php');
    } elseif ($tam == 'quanlymenu' && $query == 'sua') {
        include('./modules/quanlymenu/sua.php');
    } elseif ($tam == 'quanlysp' && $query == 'them') {
        include('./modules/quanlysp/them.php');
    } elseif ($tam == 'quanlysp' && $query == 'lieke') {
        include('./modules/quanlysp/lietke.php');
    } elseif ($tam == 'quanlysp' && $query == 'sua') {
        include('./modules/quanlysp/sua.php');
    } elseif ($tam == 'quanlydonhang' && $query == 'lietke') {
        include('./modules/quanlydonhang/lietke.php');
    } elseif ($tam == 'quanlydonhang' && $query == 'xemdonhang') {
        include('./modules/quanlydonhang/xemdonhang.php');
    } elseif ($tam == 'quanlydonhang' && $query == 'xuly') {
        include('./modules/quanlydonhang/xuly.php');
    } elseif ($tam == 'quanlylienhe' && $query == 'them') {
        include('./modules/quanlylienhe/them.php');
        include('./modules/quanlylienhe/lietke.php');
    } elseif ($tam == 'quanlylienhe' && $query == 'sua') {
        include('./modules/quanlylienhe/sua.php');
    } elseif ($tam == 'anhtrangbia' && $query == 'them') {
        include('./modules/anhtrangbia/them.php');
        include('./modules/anhtrangbia/lietke.php');
    } elseif ($tam == 'anhtrangbia' && $query == 'sua') {
        include('./modules/anhtrangbia/sua.php');
    } elseif ($tam == 'quanlythanhvien' && $query == 'lietke') {
        include("modules/quanlythanhvien/lietke.php");
    } elseif ($tam == 'quanlythanhvien' && $query == 'sua') {
        include("modules/quanlythanhvien/sua.php");
    } elseif ($tam == 'quanlythanhvien' && $query == 'them') {
        include("modules/quanlythanhvien/them.php");
    } else {
        include('./modules/dashboard.php');
    }
    ?>
</div>