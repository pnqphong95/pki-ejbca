<?php
	//session_start();
	include_once("../thuvien/dulieu.php");
	include_once("../php/session.php");
	include_once("../php/link.php");
?>

<div class="wapper">
	<?php include_once("../php/banner.php"); ?>
	<div class="content">
		<div class="detail-n">
			<div class="main_content">
				<div class="main_content_title">Xem Điểm Học Phần</div>
				<?php include_once("../php/header.php"); ?>				
				<div class="main_content_data">
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
							
							$select = "select DISTINCT a.hp_id,hp_ma,hp_ten,b.gv_id,gv_mscb, gv_ten,lhp_nhom,gv_ten,qhp_quyen from hocphan a, giangvien b, lophocphan c, quyenhocphan d
										where a.hp_id = c.hp_id 
										and b.gv_id = c.gv_id
										and a.hp_id = d.hp_id";
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
									if($row['qhp_quyen']==0)
										echo "<td align='center'><a href='login.php?f=admin_xem&gv_id=".$row['gv_id']."&hp_id=".$row['hp_id']."'>Xem điểm</a></td>";
									else
										echo "<td align='center'>Chưa khóa</td>";
									echo "</tr>";
								}
							}
						?>
					</table>
					<!--<div align="center"><input type="submit" name="btnXemKhoa" class="btnDiem" id="btnXemKhoa" value="Xem khóa" /></div>-->
					<!--<form action="" method="POST">
					<input type="hidden" id="hp_id" name="hp_id" value=""/>
					<input type="hidden" id="gv_id" name="gv_id" value=""/>
					</form>-->
					<!--<form action="login.php?f=xuatpdf" method="POST">
						<input type="hidden" id="hp_id" name="hp_id" value=""/>
						<input type="hidden" id="gv_id" name="gv_id" value=""/>
					<div id="txt" style="width:500px; margin:20px auto 0; display:none;"><p style="font-size:16px;"><b>Khóa công khai</b></p>
						<textarea id="txtKhoabimat" name="txtKhoabimat" style="width:500px; height:150px; font-size:12px;">
						</textarea>
					</div>
					<div id="but" align="center" style="display:none;"><input type="submit" name="btnNhapDiem" class="btnDiem" id="btnNhapDiem" value="OK" /></div>
					</form>-->
				</div>
		</div>
	</div>	
	<?php include_once("../php/footer.php"); ?>
</div>