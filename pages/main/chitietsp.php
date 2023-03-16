<div>
	<div id="product">
		<div id="backtoshop">
			<a href="./index.php" class="ti-angle-left">back to new arrivals</a>
		</div>
	</div>
	<div style="width:100%">
		<?php
		$sql_sanpham = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$_GET[idsanpham]' AND tinhtrang=1  LIMIT 1";
		$query_sanpham = mysqli_query($mysqli, $sql_sanpham);
		$giaspkm = 0;
		while ($row_sanpham = mysqli_fetch_array($query_sanpham)) {
			if ($row_sanpham['km'] > 0) {
				$giaspkm = $row_sanpham['giasp'] - ($row_sanpham['giasp'] * ($row_sanpham['km'] / 100));
			};
		?>
			<div class="product-detail-wapper">
				<div class="detail-wapper-info">
					<div class="detail-left-img">
						<div class="detail-left-big-img">
							<img src="./admin/modules/quanlysp/uploads/<?php echo $row_sanpham['hinhanh'] ?>" alt="">
						</div>
					</div>
					<div class="detail-right-info">
						<div class="detail-right-info-name">
							<h1><?php echo $row_sanpham['tensanpham'] ?></h1>
							<p>MSP: <?php echo $row_sanpham['masp'] ?></p>
						</div>
						<div class="detail-right-info-price">
							<p><?php if ($row_sanpham['km'] > 0) {
									echo number_format($giaspkm) . 'vnd';
								} else {
									echo number_format($row_sanpham['giasp']) . 'vnd';
								} ?><span><?php if ($row_sanpham['km'] > 0) {
												echo number_format($row_sanpham['giasp']) . 'vnd';
											} else {
											} ?></span></p>
						</div>

						<div class="selector-actions">

							<div class="wrap-addcart clearfix">
								<div>
									<form method="POST" action="./pages/main/themgiohang.php?idsanpham=<?php echo $row_sanpham['id_sanpham'] ?>">
										<button type="submit" id="add-to-cart" title='thêm vào giỏ' name="themgiohang" class="giohang add-to-cartProduct button btn-addtocart addtocart-modal"><a>thêm vào giỏ</a></button>
									</form>

								</div>
							</div>
						</div>
						<div class="product-description">
							<div class="description-content">
								<div class="description-productdetail">
									<p>Sản phẩm được&nbsp;vận chuyển từ 2-3 ngày.</p>
									<p><?php echo $row_sanpham['tomtat'] ?></p>

								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
			<div class="splienquan">
				<h1>Sản phẩm liên quan<h1>
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