<?php
	include_once("../php/link.php");
	include_once("../php/session.php");
 ?>
<div class="menu">
	<ul class="level1">
		<li><a href="?f=index">Nhập Điểm Học Phần</a></li>
		<li><a href="?f=xuatdiem">Khóa Điểm</a></li>
		<?php
			$select = "select gv_passchuky from giangvien where gv_mscb = '".$_SESSION['mscb']."'";
			$s = mysql_query($select);
			if(@mysql_num_rows($s)>0) {
				echo "<li><a href='?f=taokhoa'>Tạo Khóa</a></li>";
			}
			else {
				echo "<li><div align='center' style='font-weight:bold; color:#C7C7C7;'>Tạo Khóa</div></a></li>";
			}
		?>		
	</ul>
</div>