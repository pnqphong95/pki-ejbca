<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div class="banner">
	<a class="btnThoat" href="?f=logout" onClick="return confirm('Bạn có chắc muốn thoát hay không?');">
		<i class="fa fa-fw fa-power-off" style="font-size:18px;color:#FF0000"></i> Thoát
	</a>
	<?php
		if($mscb == "000111")
			echo "<a class='btnTrangChu' href='?f=admin_index'><i class='fa fa-home' style='font-size:22px;color:#006AD5'></i> Trang chủ</a>";
		else
			echo "<a class='btnTrangChu' href='?f=index'><i class='fa fa-home' style='font-size:22px;color:#006AD5'></i> Trang chủ</a>";
	?>
	<p class="divHienThi"><?php echo $hoten == "" ? "Lỗi" : $hoten; ?> (<?php echo $mscb == "" ? "Lỗi" : $mscb; ?>)</p>
</div>