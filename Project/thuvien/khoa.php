<?php
    include_once("dulieu.php");
    function getKhoaCongKhai($gv_mscb) {
        $select = "select a.khoa_congkhai from khoa a, giangvien b where a.khoa_ngayhethan > now() and a.gv_id = b.gv_id and b.gv_mscb = ".$gv_mscb;
		$ds = mysql_query($select);
		
		if(@mysql_num_rows($ds) > 0) {
			$row  = mysql_fetch_row($ds);
			return $row[0];
		}
	    return "";
    }

	function luuKhoa($gv_mscb, $key) {
		$query = "select gv_id from giangvien where gv_mscb = ".$gv_mscb;
		$ds = mysql_query($query);
		if(@mysql_num_rows($ds) > 0) {
			$id  = mysql_fetch_row($ds);
		}
		$savequery = "insert into khoa(khoa_congkhai, khoa_ngayhethan, gv_id) values ('".$key."',DATE_ADD(now(), INTERVAL 1 YEAR),'".$id[0]."')";
		$result = mysql_query($savequery);
		return $result ? $key : false;
	}
?>