<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	include_once("../thuvien/hocphan.php");
	include_once("../php/session.php");
	include_once("../php/link.php");
	$tenhp = "";
	$mahp = $_GET['mahp'];
	if(isset($_GET['mahp']))
	{
		$tenhp = tenhocphan($_GET['mahp']);
		$hpid = hocphanid($_GET['mahp']);
		$sv_id = tensinhvien($_GET['mahp']);
	}

	$quyen = mysql_query("select * from quyenhocphan where hp_id='".$hpid."' and gv_id='".$_SESSION['gvid']."'");
	$q = mysql_fetch_array($quyen);

	if(isset($_POST["btnLuu"])) 
	{
		//if($_SESSION["quyen".$i] == 1)
		//{
			//$diem = $_POST["txtDiem"];
			$rows = $_SESSION["tongsosinhvien"];
			/* ----echo "<script>alert('".$rows."');</script>";---*/
			for($i=0;$i<$rows;$i++)
			{	
				$mssv = $_SESSION["sv".$i];
				$diem = $_POST["txtDiem".$mssv];
				$caulenhcapnhat = "update lophocphan set lhp_diem=$diem where sv_id=(select a.sv_id from sinhvien a where sv_mssv='".$mssv."')";
				/*--echo "<script>alert('".$caulenhcapnhat."');</script>";--*/
				mysql_query($caulenhcapnhat);	
			}
			echo "<script><meta http-equiv=\"refresh\" content=\"number\"></script>";
		/*} 
		else if($_SESSION["quyen".$i] == 0) {
			echo "<script> alert('Đã hết thời gian cập nhật!'); </script>";
			$sql = "update giangvien set gv_quyen='".$quyen.$i."' where gv_id ='".$mscb."'";
		}*/
	}					
?>
<div class="wapper">
	<?php include_once("../php/banner.php"); ?>
	<div class="content">
		<div class="detail-n">	
			<?php include_once("../php/menu.php"); ?>
			<div class="main_content">
				<div class="main_content_title">Nhập điểm cho sinh viên (Điểm 10)</div>
				<div class="main_content_menu">
					<span><b>Học phần: </b><input type="text" value="<?php echo $tenhp; ?>" size="35px" /></span>
					<span><b>Tên học phần: </b><input type="text" value="<?php echo $mahp; ?>" size="10px" /></span>
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
							<TH>Lớp</TH>
							<TH>Điểm 10</TH>			
						</tr>
						<?php
							include_once("../thuvien/dulieu.php");
							$stt = 1;
							$select = "select DISTINCT sv_mssv,sv_holot,sv_ten,sv_nu,lop_ten,lhp_diem 
										from sinhvien a join lop b join lophocphan c join hocphan d
										where a.lop_id = b.lop_id 
										and a.sv_id = c.sv_id
										and c.hp_id IN (select d.hp_id from hocphan where d.hp_ten='".$tenhp."')
										and gv_id = (select gv_id from giangvien where gv_mscb='".$mscb."')";
							$ds = @mysql_query($select);
							if(@mysql_num_rows($ds)>0) 
							{
								$_SESSION["tongsosinhvien"]= @mysql_num_rows($ds);
								
								while($row=mysql_fetch_array($ds)) 
								{
									$_SESSION["sv".($stt-1)]=$row["sv_mssv"];
									echo "<tr>";
									echo "<td class='cotSTT'>$stt</td>";
									$stt++;
									echo "<td>".$row["sv_mssv"]."</td>";
									echo "<td>".$row["sv_holot"]."</td>";
									echo "<td>".$row["sv_ten"]."</td>";
									echo "<td>".$row["sv_nu"]."</td>";
									echo "<td>".$row["lop_ten"]."</td>";
									if($q['qhp_quyen']==0)
										echo "<td class='cotDiem'>
												<input disabled type='text' name='txtDiem".$row["sv_mssv"]."' class='txtDiem' value='".$row["lhp_diem"]."' />
											</td>";
									else
										echo "<td class='cotDiem'>
												<input type='text' name='txtDiem".$row["sv_mssv"]."' class='txtDiem' value='".$row["lhp_diem"]."' />
											</td>";
									echo "</tr>";
								}								
							}
						?>
					</table>
					<div align="center" style="margin-top:10px;">
						<?php if($q['qhp_quyen']==1){ ?>
							<input type="submit" name="btnLuu" class="btnDiem" id="btnLuu" value="Lưu Điểm" />
						<?php }else echo "<span style='color:#ff0000; font-size:16px;'>Đã hết thời gian cập nhật!</span>";?>

					</div>
				  </form>
				</div>
			</div>
		</div>
	</div>
	<?php include_once("../php/footer.php"); ?>
</div>