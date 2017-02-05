<?php
	include_once("link.php");
 ?>
<div class="menu">
	<ul class="level1">
		<li><a href="index.php">Nhập Điểm Học Phần</a></li>
		<li><a href="xuatdiem.php">Khóa Điểm</a></li>
		<?php
			$select = "select gv_passchuky from giangvien where gv_mscb = '".$_SESSION['mscb']."'";
			$s = mysql_query($select);
			if(@mysql_num_rows($s)>0) {
				echo "<li><a href='taokhoa.php'>Tạo Khóa</a></li>";
			}
			else {
				echo "<li><div align='center' style='font-weight:bold; color:#C7C7C7;'>Tạo Khóa</div></a></li>";
			}
		?>		
	</ul>
</div>