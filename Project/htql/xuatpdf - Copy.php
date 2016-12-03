<?php
	//session_start();
	include('Crypt/RSA.php');
	include_once("../thuvien/hocphan.php");
	include_once("../php/session.php");
	include_once("../php/link.php");
	
	$hp = mysql_query("select * from hocphan where hp_id=".$_GET['hp_id']);
	$tthp = mysql_fetch_array($hp);
?>
<div class="wapper">
	<? include_once("../php/banner.php"); ?>
	<div class="content">
		<div class="detail-n">	
			<? //include_once("../php/menu.php"); ?>
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
							
							//$diem = mysql_query("select * from filediem where hp_id='".$_GET['hp_id']."' and gv_id='".$_GET['gv_id']."'");
							//$filediem = mysql_fetch_array($diem);
							//echo stripcslashes($filediem['fd_noidung']);
							//$string = str_replace("\'", "'", $filediem['fd_noidung']);
							$file = fopen("C:\\xampp\\htdocs\\quanlydiem\\htql\\".$_GET['gv_id'].$_GET['hp_id'].".txt",'r');
							$string = '';
							while(!feof($file))
							{
							    $string .= fgets($file);
							}
							 
							fclose($file);
							$rsa = new Crypt_RSA();
							$rsa->loadKey('-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCqGKukO1De7zhZj6+H0qtjTkVxwTCpvKe4eCZ0
FPqri0cb2JZfXJ/DgYSF6vUpwmJG8wVQZKjeGcjDOL5UlsuusFncCzWBQ7RKNUSesmQRMSGkVb1/
3j+skZ6UtW+5u09lHNsj6tQ51s1SPrCBkedbNf0Tp0GbMJDyR4e9T04ZZwIDAQAB
-----END PUBLIC KEY-----');
//echo $rsa->decrypt(stripcslashes($filediem['fd_noidung']));
							//echo $rsa->decrypt($string);
							$dsdiem = $rsa->decrypt($string);
							//print_r(explode("@", $dsdiem));
							$dssv = explode("@", $dsdiem);
							foreach ($dssv as $sv) {
								$svdiem = explode("-", $sv);
								//print_r(explode("-", $sv));
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

							/*$ds = @mysql_query($select);
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
									echo "<td class='cotDiem'>
											<input type='text' name='txtDiem".$row["sv_mssv"]."' class='txtDiem' value='".$row["lhp_diem"]."' />
										</td>";
									echo "</tr>";
								}							
							}*/
						?>
						</tbody>
					</table>
					<div align="center">
						<a href="pdf.php?gv_id=<?php echo $_GET['gv_id']; ?>&hp_id=<?php echo $_GET['hp_id']; ?>">Xuất PDF</a>
					</div>
				  </form>
				</div>
			</div>
		</div>
	</div>
	<? include_once("../php/footer.php"); ?>
</div>