<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	include_once("dulieu.php");
	function XacNhan($key) {
		$sql = "select gv_id from giangvien where gv_passchuky = '$key'";
		$ds = mysql_query($sql);
		if(@mysql_num_rows($ds) > 0) {
			$sqlSelect = "select hp_id, qhp_quyen from quyenhocphan where gv_id = ".$rows["gv_id"];
			$dsSelect = mysql_query($sqlSelect);
			$_SESSION["quyen".$i]= 0;
			return true;
		}
		else return false;
	}
	function Get_Gvid($mscb)
	{
		$sql = "select gv_id from giangvien where gv_mscb = '".$mscb."'";
		$ds = mysql_query($sql);
		if(@mysql_num_rows($ds))
		{
			$row  = mysql_fetch_row($ds);
			return $row[0];
		}
		else return "";
	}
	function Get_hpid($mahp)
	{
		$sql = "select hp_id from hocphan where hp_ma = '".$mahp."'";
		$ds2 = mysql_query($sql);
		if(@mysql_num_rows($ds))
		{
			$row  = mysql_fetch_row($ds);
			return $row[0];
		}
		else return "";
	}
?>