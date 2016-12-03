<?php
	include_once("dulieu.php");
	function TimTaiKhoan($tendangnhap) {
		$ds = mysql_query("select * from giangvien where gv_mscb = '$tendangnhap'");
		if(mysql_num_rows($ds) > 0) return $tendangnhap;
		else return false;
	}
	
	function make_safe($a) {
		 $a = mysql_real_escape_string(trim($a));
		 return $a;
	}
	
	function DangNhap($tendangnhap, $matkhau) {
		$sql = "select gv_ten, gv_mscb, gv_id from giangvien
				where gv_mscb = '$tendangnhap'
				and gv_matkhau = '$matkhau'";
		$ds = mysql_query($sql);
		if(mysql_num_rows($ds) > 0) 
		{		
			if(isset($row["gv_id"]))
			{
				$sqlSelect = "select hp_id, qhp_quyen from quyenhocphan where gv_id = ".$rows["gv_id"];
				$dsSelect = mysql_query($sqlSelect);
				$_SESSION["tongquyen"] = mysql_num_rows($dsSelect);
				$rows = $_SESSION["tongquyen"];
				$quyen = $rows["qhp_quyen"];
				for($i=0; $i<=$rows; $i++)
				{
					$quyen = $rows["qhp_quyen".$i];
					$_SESSION["quyen".$i] = $quyen;
				}
			}	
			$hoten = "";
			$mscb = "";
			//list($quyen, $hoten, $mscb) = mysql_fetch_array($ds);
			$rows = mysql_fetch_array($ds);
			$hoten  =  $rows["gv_ten"];
			$mscb  =  $rows["gv_mscb"];		
			
			$_SESSION["hoten"] = $hoten;
			$_SESSION["mscb"] = $mscb;
			$_SESSION['gvid'] = $rows["gv_id"];
			return true;			
		}
		else {
			$_SESSION["hoten"] = null;
			$_SESSION["mscb"] = null;
			return "";
		}
	}
?>