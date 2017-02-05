<?php
	include_once("session.php");
	include_once("link.php");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div class="banner">
	<img class="Img" src="../images/banner.png" alt="" />
	<a class="btnThoat" href="logout.php" onClick="return confirm('Bạn có chắc muốn thoát hay không?');">
		<i class="fa fa-fw fa-power-off" style="font-size:18px;color:#FF0000"></i> Thoát
	</a>
	<?php
		if($mscb == "000111")
			echo "<a class='btnTrangChu' href='admin_index.php'><i class='fa fa-home' style='font-size:22px;color:#006AD5'></i> Trang chủ</a>";
		else
			echo "<a class='btnTrangChu' href='index.php'><i class='fa fa-home' style='font-size:22px;color:#006AD5'></i> Trang chủ</a>";
	?>
	<p class="divHienThi"><?php echo $hoten == "" ? "Lỗi" : $hoten; ?> (<?php echo $mscb == "" ? "Lỗi" : $mscb; ?>)</p>
</div>