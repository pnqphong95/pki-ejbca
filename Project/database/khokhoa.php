<?php
    require_once('db.inc');

    function getKhoaCongKhai($gv_mscb) {
        $select = "select a.khoa_congkhai from khokhoa a where gv_mscb = ".$gv_mscb;
		$ds = mysql_query($select);
		
		if(@mysql_num_rows($ds) > 0) {
			$row  = mysql_fetch_row($ds);
			return $row[0];
		}
	    return null;
    }

    function luuKhoa($gv_mscb, $publickey, $privatekey, $passkey) {
		$savequery = "insert into khokhoa(khoa_congkhai, khoa_bimat, khoa_matkhaukhoa, gv_mscb) values ('".$publickey."', '".$privatekey."', '".$passkey."', '".$gv_mscb."')";
		$result = mysql_query($savequery);
		return $result ? true : false;
	}

	function getKhoa($gv_mscb) {
		$select = "select * from khokhoa a where gv_mscb = ".$gv_mscb;
		$ds = mysql_query($select);
		
		if(@mysql_num_rows($ds) > 0) {
			$row  = mysql_fetch_assoc($ds);
			return $row;
		}
	    return null;
	}
?>