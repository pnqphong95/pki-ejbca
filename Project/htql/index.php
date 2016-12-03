<?php
	//session_start();
	include_once("../thuvien/dulieu.php");
	include_once("../php/session.php");
	include_once("../php/link.php");
?>

<div class="wapper">
	<?php include_once("../php/banner.php"); ?>
	<div class="content">
		<div class="detail">
			<?php include_once("../php/menu.php"); ?>
			<div class="main_content">
				<div class="main_content_title">Nhập Điểm Học Phần</div>
				<?php include_once("../php/header.php"); ?>				
				<div class="main_content_data">
				<form action="" method="GET">
					<input type="hidden" name="f" value="nhapdiem"/>
					<table class="TableData">
						<tr>
							<TH>STT</TH>
							<TH>Mã HP</TH>
							<TH>Nhóm HP</TH>
							<TH>Lớp HP</TH>
							<TH class="cotTenHP">Tên HP</TH>
							<TH>Chọn lớp</TH>			
						</tr>
						<?php
							include_once("../thuvien/dulieu.php");
							$stt = 1;
							$select = "select DISTINCT hp_ma,hp_ten,lhp_nhom,gv_ten from hocphan a join giangvien b join lophocphan c 
										where a.hp_id = c.hp_id 
										and b.gv_id = c.gv_id
										and gv_ten = (select gv_ten from giangvien where gv_mscb='".$mscb."')";
							$ds = mysql_query($select);
							if(@mysql_num_rows($ds)>0) 
							{
								while($row = @mysql_fetch_array($ds)) 
								{
									echo "<tr>";
									echo "<td class='cotSTT'>$stt</td>";
									$stt++;
									echo "<td>".$row["hp_ma"]."</td>";
									echo "<td>".$row["lhp_nhom"]."</td>";
									echo "<td>".$row["hp_ma"].$row["lhp_nhom"]."</td>";
									echo "<td>".$row["hp_ten"]."</td>";
									echo "<td align='center'><input type='radio' id='".$row["hp_ma"]."' name='mahp' value='".$row["hp_ma"]."'/></td>";
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
	<?php include_once("../php/footer.php"); ?>
</div>