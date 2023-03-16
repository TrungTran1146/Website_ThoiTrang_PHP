<div class="main-footer">


    <div class="one-1">
        <H4>THÔNG TIN LIÊN HỆ </H4><br><br>
        <div>
            <?php
            $sql_lienhe = "SELECT * FROM tbl_lienhe ORDER BY id_lienhe ASC";
            $query_lienhe = mysqli_query($mysqli, $sql_lienhe);
            while ($row_lienhe = mysqli_fetch_array($query_lienhe)) {
            ?>
                <ul class="one12">
                    <li><?php echo $row_lienhe['lienhe'] ?></li>

                </ul>
            <?php } ?>
        </div>
    </div>

</div>
</div>