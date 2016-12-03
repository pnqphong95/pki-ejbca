<?php
	//session_start();
	include_once("../thuvien/dulieu.php");
	include_once("../php/session.php");
	include_once("../php/link.php");
?>

<div class="wapper">
	<? include_once("../php/banner.php"); ?>
	<div class="content">
		<div class="detail-n">
			<div class="main_content">
				<div class="main_content_title">Xem Điểm Học Phần</div>
				<? include_once("../php/header.php"); ?>				
				<div class="main_content_data">
				<form action="" method="GET">
					<input type="hidden" name="f" value="nhapdiem"/>
					<table class="TableData">
						<tr>
							<TH>STT</TH>
							<TH>MSCB</TH>
							<TH>Tên giảng viên</TH>
							<TH>Lớp HP</TH>
							<TH class="cotTenHP">Tên HP</TH>
							<TH>Danh sách điểm</TH>			
						</tr>
						<?php
							include_once("../thuvien/dulieu.php");
							$stt = 1;
							$select = "select DISTINCT gv_mscb, gv_ten, hp_ma, hp_ten, lhp_nhom from hocphan a, giangvien b, lophocphan c, quyenhocphan d
										where a.hp_id = c.hp_id = d.hp_id 
										and b.gv_id = c.gv_id = d.gv_id";
							$ds = mysql_query($select);
							if(@mysql_num_rows($ds)>0) 
							{
								while($row = @mysql_fetch_array($ds)) 
								{
									echo "<tr>";
									echo "<td class='cotSTT'>$stt</td>";
									$stt++;
									echo "<td>".$row["gv_mscb"]."</td>";
									echo "<td>".$row["gv_ten"]."</td>";
									echo "<td>".$row["hp_ma"].$row["lhp_nhom"]."</td>";
									echo "<td>".$row["hp_ten"]."</td>";
									echo "<td align='center'></td>";
									echo "</tr>";
								}
							}
						?>
					</table>
					<div align="center"><input type="submit" name="btnNhapDiem" class="btnDiem" id="btnNhapDiem" value="Nhập Điểm" /></div>
					</form>
				</div>
			</div>
		</div>
	</div>	
	<? include_once("../php/footer.php"); ?>
</div>