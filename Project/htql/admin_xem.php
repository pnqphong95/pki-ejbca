<?php
	//session_start();
	include('Crypt/RSA.php');
	include_once("../thuvien/hocphan.php");
	include_once("../php/session.php");
	include_once("../php/link.php");

	//$_SESSION['gv_id'] = $_POST['gv_id'];
	//$_SESSION['hp_id'] = $_POST['hp_id'];
	
	$hp = mysql_query("select hp_ma, hp_ten from hocphan where hp_id=".$_GET['hp_id']);
	$tthp = @mysql_fetch_array($hp);
			
	if(isset($_GET["check"]))
	{
		$lay_khoa = mysql_query("select * from giangvien where gv_id = '".$_GET['gv_id']."'");
		$khoa = mysql_fetch_array($lay_khoa);
		//echo "12345".$khoa['gv_khoacongkhai'];
		
		$file1 = fopen("C:\\xampp\\htdocs\\quanlydiem\\htql\\khoa".$_GET['gv_id'].".txt",'r');
		$key = '';
		while(!feof($file1))
		{
			$key .= fgets($file1);
		}
		 
		fclose($file1);
		
		//echo $key;
		
		$file = fopen("C:\\xampp\\htdocs\\quanlydiem\\htql\\".$_GET['gv_id'].$_GET['hp_id'].".txt",'r');
		$string = '';
		while(!feof($file))
		{
			$string .= fgets($file);
		}
		 
		fclose($file);
		$rsa = new Crypt_RSA();
		$rsa->loadKey($khoa['gv_khoacongkhai']);
		$dsdiem = $rsa->decrypt($string);
		
		$filediem = "";
		$dsdiem_csdl = mysql_query("select * from sinhvien a, lophocphan b where a.sv_id = b.sv_id and b.gv_id = '".$_GET['gv_id']."' and b.hp_id = '".$_GET['hp_id']."'");
		$k = 1;
		while($sv = mysql_fetch_array($dsdiem_csdl)){
			if($k == 1)
				$filediem .= $sv['sv_mssv']."-".$sv['sv_holot']."-".$sv['sv_ten']."-".$sv['sv_nu']."-".$sv['lhp_diem'];
			else
				$filediem .= "@".$sv['sv_mssv']."-".$sv['sv_holot']."-".$sv['sv_ten']."-".$sv['sv_nu']."-".$sv['lhp_diem'];
			$k++;
		}
		
		if($dsdiem == $filediem)
			echo "<script>alert('Dữ liệu toàn vẹn!')</script>";
		else
			echo "<script>alert('Dữ liệu đã bị thay đổi!')</script>";
		//echo "12345".$dsdiem;
	}				
?>
<div class="wapper">
	<?php include_once("../php/banner.php"); ?>
	<div class="content">
		<div class="detail-n">	
			<div class="main_content">
				<div class="main_content_title">Danh sách điểm cho sinh viên (Điểm 10)</div>
				<div class="main_content_menu">
					<span><b>Học phần: </b><input type="text" value="<?php echo $tthp['hp_ma']; ?>" size="10px" /></span>
					<span><b>Tên học phần: </b><input type="text" value="<?php echo $tthp['hp_ten']; ?>" size="35px" /></span>
				</div>
				<div class="main_content_data">
				<form action="" method="post">
					<table class="TableData">
						<tr>
							<TH>STT</TH>
							<TH>Mã sinh viên</TH>
							<TH>Họ lót</TH>
							<TH>Tên</TH>
							<TH>Nữ</TH>
							<TH>Điểm 10</TH>			
						</tr>
						<?php
							include_once("../thuvien/dulieu.php");
							$stt = 1;
							$select = mysql_query("select * from sinhvien a, lophocphan b where a.sv_id = b.sv_id and b.gv_id = '".$_GET['gv_id']."' and b.hp_id = '".$_GET['hp_id']."' ");
							//$ds = @mysql_query($select);
							if(@mysql_num_rows($select)>0) 
							{
								//$_SESSION["tongsosinhvien"]= @mysql_num_rows($select);
								
								while($row=mysql_fetch_array($select)) 
								{
									//$_SESSION["sv".($stt-1)]=$row["sv_mssv"];
									echo "<tr>";
									echo "<td class='cotSTT'>$stt</td>";
									$stt++;
									echo "<td>".$row["sv_mssv"]."</td>";
									echo "<td>".$row["sv_holot"]."</td>";
									echo "<td>".$row["sv_ten"]."</td>";
									echo "<td>".$row["sv_nu"]."</td>";
									echo "<td class='cotDiem'>".$row["lhp_diem"]."</td>";
									echo "</tr>";
								}								
							}
						?>
					</table>
					<div align="center"><a href="login.php?f=admin_xem&check=ok&gv_id=<?php echo $_GET['gv_id']; ?>&hp_id=<?php echo $_GET['hp_id']; ?>">Kiểm tra</a></div>
					<!--<input type="submit" name="btnkiemtra" class="btnDiem" id="btnkiemtra" onclick="chungthuc(".$row['gv_id'].",".$row['hp_id'].")" value="Kiểm tra" />-->
				  </form>
				  <!--<form action="login.php?f=xuatpdf" method="POST">
						<input type="hidden" id="hp_id" name="hp_id" value=""/>
						<input type="hidden" id="gv_id" name="gv_id" value=""/>
					<div id="txt" style="width:500px; margin:20px auto 0; display:none;"><p style="font-size:16px;"><b>Khóa công khai</b></p>
						<textarea id="txtKhoabimat" name="txtKhoabimat" style="width:500px; height:150px; font-size:12px;"></textarea>
					</div>
					<div id="but" align="center" style="display:none;"><input type="submit" name="btnNhapDiem" class="btnDiem" id="btnNhapDiem" value="OK" /></div>
					</form>-->
				</div>
				<script type="text/javascript">
					function chungthuc(gv_id,hp_id){
						$('#txt').show();
						$('#but').show();
						$('#hp_id').val(hp_id);
						$('#gv_id').val(gv_id);
					}
				</script>
				</div>
			</div>
		</div>
	</div>
</div>