<?php
	session_start();
	include('Crypt/RSA.php');
	include_once("../thuvien/dulieu.php");
	include_once("../php/link.php");


	if(isset($_POST["btnXuatDiem"]))
	{
		$key = md5($_POST["txtChungChi"]);
		if(XacNhan($key) == true) 
		{

	if(isset($_POST['btnXuatDiem']))
	{
		$rsa = new Crypt_RSA();
		//extract($rsa->createKey());
		$selecthp = "select DISTINCT a.hp_id,hp_ma,hp_ten,lhp_nhom,gv_ten,qhp_quyen from hocphan a, giangvien b, lophocphan c, quyenhocphan d
					where a.hp_id = c.hp_id 
					and b.gv_id = c.gv_id
					and a.hp_id = d.hp_id
					and gv_mscb='".$_SESSION["mscb"]."'";
		$dshp = mysql_query($selecthp);
		$n = mysql_num_rows($dshp);
		for($i=1; $i<=$n; $i++){
			if(isset($_POST['checkbox'.$i])){
				mysql_query("update quyenhocphan set qhp_quyen = 0 where gv_id = '".$_SESSION['gvid']."' and hp_id = '".$_POST['checkbox'.$i]."' ");

				$filediem = "";
				$dsdiem = mysql_query("select * from sinhvien a, lophocphan b where a.sv_id = b.sv_id and b.gv_id = '".$_SESSION['gvid']."' and b.hp_id = '".$_POST['checkbox'.$i]."' ");
				$k = 1;
				while($sv = mysql_fetch_array($dsdiem)){
					if($k == 1)
						$filediem .= $sv['sv_mssv']."-".$sv['sv_holot']."-".$sv['sv_ten']."-".$sv['sv_nu']."-".$sv['lhp_diem'];
					else
						$filediem .= "@".$sv['sv_mssv']."-".$sv['sv_holot']."-".$sv['sv_ten']."-".$sv['sv_nu']."-".$sv['lhp_diem'];
					$k++;
				}
				
		//echo "12345".$_POST['txtKhoabimat'];
$rsa->loadKey($_POST['txtKhoabimat']);
$ciphertext = $rsa->encrypt($filediem);
//echo "INSERT INTO filediem VALUES('','".$ciphertext."','".$_POST['checkbox'.$i]."','".$_SESSION['gvid']."')";
				//mysql_query("INSERT INTO filediem VALUES('','".Addslashes($ciphertext)."','".$_POST['checkbox'.$i]."','".$_SESSION['gvid']."')");
				//mysql_query("INSERT INTO filediem VALUES('','".htmlspecialchars($ciphertext)."','".$_POST['checkbox'.$i]."','".$_SESSION['gvid']."')");
$file = fopen("C:\\xampp\\htdocs\\quanlydiem\\htql\\".$_SESSION['gvid'].$_POST['checkbox'.$i].".txt",'w');
fwrite($file,$ciphertext);
				
			}
		}
	}
		echo "<script> alert('Mật khẩu hợp lệ!'); </script>";
	}
		else {
			echo "<script> alert('Mật khẩu không hợp lệ! Vui lòng nhập lại!'); </script>";
		}
	}
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
				<form action="xuatdiem.php" method="POST">
					<input type="hidden" name="f" value="xuatdiem"/>
					<table class="TableData">
						<tr>
							<TH>STT</TH>
							<TH>Mã HP</TH>
							<TH>Nhóm HP</TH>
							<TH class="cotTenHP">Tên HP</TH>
							<TH>Quyền ND</TH>
							<TH>Chọn lớp</TH>			
						</tr>
						<?php
							include_once("../thuvien/dulieu.php");
							$stt = 1;
							$select = "select DISTINCT a.hp_id,hp_ma,hp_ten,lhp_nhom,gv_ten,qhp_quyen from hocphan a, giangvien b, lophocphan c, quyenhocphan d
										where a.hp_id = c.hp_id 
										and b.gv_id = c.gv_id
										and a.hp_id = d.hp_id
										and gv_mscb='".$mscb."'";			
							$ds = mysql_query($select);
							if(@mysql_num_rows($ds)>0) 
							{
								//$_SESSION["tongmahp"]= @mysql_num_rows($ds);
								while($row = @mysql_fetch_array($ds)) 
								{
									//$_SESSION["hp".($stt-1)]=$row["hp_ma"];
									echo "<tr>";
									echo "<td class='cotSTT'>$stt</td>";
									
									echo "<td>".$row["hp_ma"]."</td>";
									echo "<td>".$row["lhp_nhom"]."</td>";
									echo "<td>".$row["hp_ten"]."</td>";
									if( $row["qhp_quyen"] == 1)
									{
										echo "<td align='center'><img id='btnClock' src='../images/unlock.png' /></td>";
									}
									else {
										echo "<td align='center'><img src='../images/lock.png' /></td>";
									}
									if( $row["qhp_quyen"] == 0)
										echo "<td align='center'><input type='checkbox' id='checkbox".$stt."' name='checkbox".$stt."' value='".$row["hp_id"]."' disabled/></td>";
									else
										echo "<td align='center'><input type='checkbox' id='checkbox".$stt."' name='checkbox".$stt."' value='".$row["hp_id"]."'/></td>";
									echo "</tr>";
									$stt++;
								}
							}
						?>
					</table>
					<div style="width:500px; margin:20px auto 0;"><p style="font-size:16px;">Khóa bí mật</p>
						<textarea id="txtKhoabimat" name="txtKhoabimat" style="width:500px; height:150px; font-size:12px;"></textarea>
					</div>
					<div align="center">
						<input style="margin-top:20px; width:200px;" type="password" id="txtChungChi" class="Input3" name="txtChungChi" placeholder="Nhập mật khẩu chứng thực" />
						<input type="submit" name="btnXuatDiem" class="btnDiem" id="btnXuatDiem" value="Khóa điểm"/>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php include_once("../php/footer.php"); ?>	
</div>