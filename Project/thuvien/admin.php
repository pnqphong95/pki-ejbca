<?php
	include_once("dulieu.php");
	function tenhocphan($hpid)
	{
		$select = "select hp_ten from hocphan where hp_ma='$hpid'";
		$ds = mysql_query($select);
		
		if(@mysql_num_rows($ds))
		{
			$row  = mysql_fetch_row($ds);
			return $row[0];
		}
		else return "";
	}
	
	function hocphan($hpid)
	{
		$select = "select hp_ma from hocphan where hp_ma='$hpid'";
		$ds = mysql_query($select);
		
		if(@mysql_num_rows($ds))
		{
			$row  = mysql_fetch_row($ds);
			return $row[0];
		}
		else return "";
	}
?>