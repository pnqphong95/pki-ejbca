<?php
	session_start();
	include_once("../php/link.php");
	include_once("../thuvien/dulieu.php");
	include_once("../thuvien/khoa.php");
	include('Crypt/RSA.php');
	
	if (isset($_GET)) {
		$khoacongkhai = getKhoaCongKhai($_SESSION["mscb"]);

		if ($khoacongkhai == "") {
			$rsa = new Crypt_RSA();
			extract($rsa->createKey());
			
		} else {
			$privatekey = "Bạn đã sinh khóa rồi, nếu mất khóa bạn có thể chọn sửa khóa bên dưới";
			$publickey = $khoacongkhai;
		}
	}

	if(isset($_POST["btnLuu"])) 
	{
		$pass = md5($_POST["txtChungChi"]);
		if ($khoacongkhai == "") {
			$ds= mysql_query("insert into khoa (khoa_congkhai, khoa_ngayhethan, gv_id)
				values (".$_POST['key'].", DATE_ADD(now(), INTERVAL 1 YEAR), ".$_SESSION['mscb'].")");
		}
		
		$file = fopen($DOCUMENT_ROOT.$_SESSION['gvid'].".txt",'w');
		fwrite($file,$_POST['key']);
	}
?>
<div class="wapper">
	<?php include_once("../php/banner.php"); ?>
	<div class="content">
		<div class="detail-n">	
			<?php include_once("../php/menu.php"); ?>
			<div class="main_content">
				<div class="main_content_title">Tạo Khóa</div>
				<form action="taokhoa.php" method="post">
				<div class="main_content_menu tao_khoa">
					<div><p style="font-size:16px;">Khóa bí mật</p>
						<textarea style="width:500px; height:260px; font-size:12px;"><?php echo $privatekey;?></textarea>
					</div>
					<div style="margin-top:20px;"><p style="font-size:16px;">Khóa công khai</p>
						<textarea id="key" name="key" style="width:500px; height:120px; font-size:12px;"><?php echo $publickey; ?></textarea>
					</div>
					<div align="center">
						<input style="margin-top:20px; width:200px;" type="password" id="txtChungChi" class="Input3" name="txtChungChi" placeholder="Nhập mật khẩu cho khóa" />
						<input type="submit" name="btnLuu" class="btnDiem" id="btnLuu" value="Lưu khóa"/>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
	<?php include_once("../php/footer.php"); ?>
</div>