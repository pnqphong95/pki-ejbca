<?php
	//session_start();
	include('Crypt/RSA.php');
	include_once("../thuvien/hocphan.php");
	include_once("../php/session.php");
	include_once("../php/link.php");

	$_SESSION['key'] = $_POST['txtKhoabimat'];
	
	$hp = mysql_query("select * from hocphan where hp_id=".$_POST['hp_id']);
	$tthp = mysql_fetch_array($hp);
?>
<div class="wapper">
	<?php include_once("../php/banner.php"); ?>
	<div class="content">
		<div class="detail-a">	
			<?php //include_once("../php/menu.php"); ?>
			<div class="main_content">
				<div class="main_content_title">Danh sách điểm</div>
				<div class="main_content_menu">
					<span><b>Học phần: </b><input type="text" value="<?php echo $tthp['hp_ma']; ?>" size="10px" /></span>
					<span><b>Tên học phần: </b><input type="text" value="<?php echo $tthp['hp_ten']; ?>" size="35px" /></span>
				</div>
				<div class="main_content_data">
				<form action="" method="post">
					<table class="TableData table table-striped" id="tableID">
						<thead>
							<tr>
								<TH>STT</TH>
								<TH>Mã sinh viên</TH>
								<TH>Họ lót</TH>
								<TH>Tên</TH>
								<TH>Nữ</TH>
								<TH>Điểm 10</TH>			
							</tr>
						</thead>
						<tbody>
						<?php
							include_once("../thuvien/dulieu.php");
							$stt = 1;
							
							$file = fopen("C:\\xampp\\htdocs\\quanlydiem\\htql\\".$_POST['gv_id'].$_POST['hp_id'].".txt",'r');
							$string = '';
							while(!feof($file))
							{
							    $string .= fgets($file);
							}
							 
							fclose($file);
							$rsa = new Crypt_RSA();
							$rsa->loadKey($_POST['txtKhoabimat']);
							$dsdiem = $rsa->decrypt($string);
							$dssv = explode("@", $dsdiem);
							foreach ($dssv as $sv) {
								$svdiem = explode("-", $sv);
								echo "<tr>";
									echo "<td class='cotSTT'>$stt</td>";
									$stt++;
									echo "<td>".$svdiem[0]."</td>";
									echo "<td>".$svdiem[1]."</td>";
									echo "<td>".$svdiem[2]."</td>";
									if($svdiem[3]==1)
										echo "<td>X</td>";
									else
										echo "<td></td>";
									echo "<td>".$svdiem[4]."</td>";
								echo "</tr>";

							}
						?>
						</tbody>
					</table>
					<div align="center">
						<a href="pdf.php?gv_id=<?php echo $_POST['gv_id']; ?>&hp_id=<?php echo $_POST['hp_id']; ?>&key=<?php echo $_POST['txtKhoabimat']; ?>">Xuất PDF</a>
					</div>
				  </form>
				</div>
			</div>
		</div>
	</div>
	<?php include_once("../php/footer.php"); ?>
</div>