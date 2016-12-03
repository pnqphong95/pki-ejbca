<?php
	session_start();
?>
<!doctype html>
<html lang="en-US">
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>Quản lý đào tạo - Trường Đại học Cần Thơ</title>

	<? include_once("../php/link.php"); ?>
	<script language="javascript">
		function kiemtra() {
			var loi = "";
			if(document.getElementById("txtTenDangNhap").value == "") {
				loi += "Chưa nhập mã số cán bộ!\n";
			}
			if(document.getElementById("txtMatKhau").value == "") {
				loi += "Chưa nhập mật khẩu!\n";
			}
			if(loi == "") {
			return true;
			}
			else {
				alert(loi);
				return false;
			}
		};
	</script>
		
	<?php		
		include_once("../thuvien/giangvien.php");
		if(isset($_POST["btnDangNhap"])) 
		{
			$tendn = make_safe($_POST["txtTenDangNhap"]);
			$matkhau = make_safe($_POST["txtMatKhau"]);
			if(DangNhap($tendn, md5($matkhau)) == true)
			{
				 if($tendn == "000111")
				 {
				 	echo "<script>window.location='?f=admin_index';</script>";
				 }
				 else {
				 	echo "<script>window.location='?f=index';</script>";
				 }
			}
			else echo "<script>alert(Bạn đã nhập sai mã số cán bộ hoặc mật khẩu);</script>";
		}
	?>

</head>

<body>	
	<div class="wapper">
		<div class="banner"><img class="Img" src="../images/banner.png" alt="" /></div>
		<?php	
			if(!isset($_GET["f"])) {
		?>
		<div class="content-l">		
			<div class="divLogin">
				<h2><span class="fontawesome-lock"></span>Đăng nhập</h2>
				<form action="" method="POST">
					<div><input class="Input1" type="text" id="txtTenDangNhap" name="txtTenDangNhap" placeholder="Mã số đăng nhập" /></div>
					<div><input class="Input2" type="password" id="txtMatKhau" name="txtMatKhau" placeholder="Mật khẩu" /></div>
					<div align="center">
						<input class="Button" type="submit" id="btnDangNhap" name="btnDangNhap" value="Ðăng nhập" onClick="return kiemtra();" />
					</div>					
				</form>
			</div>					
		</div>	
		<?php
			include_once("../php/footer.php");
			}
			else {
				$page = $_GET["f"];
				include_once($page.".php");
			}
		?>		
	</div>
</body>	
</html>