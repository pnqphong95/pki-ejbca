<?php
	include_once("dulieu.php");
	function tenhocphan($mahp)
	{
		$select = "select hp_ten from hocphan where hp_ma='$mahp'";
		$ds = mysql_query($select);
		
		if(@mysql_num_rows($ds))
		{
			$row  = mysql_fetch_row($ds);
			return $row[0];
		}
		else return "";
	}
	
	function hocphanid($mahp)
	{
		$select = "select hp_id from hocphan where hp_ma='$mahp'";
		$ds = mysql_query($select);
		
		if(@mysql_num_rows($ds))
		{
			$row  = mysql_fetch_row($ds);
			return $row[0];
		}
		else return "";
	}
	
	function tensinhvien($mahp) {
		$select = "select sv_id from lophocphan a join hocphan b where b.hp_ma='$mahp'
					and a.hp_id = b.hp_id";
		$ds = mysql_query($select);
		if(@mysql_num_rows($ds))
		{
			$row  = mysql_fetch_row($ds);
			return $row[0];
		}
		else return "";
	}
?>