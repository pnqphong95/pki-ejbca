<?php
    include_once("dulieu.php");
    function getKhoaCongKhai($gv_mscb) {
        $select = "select khoa_congkhai from khoa a, giangvien b"
            ." where a.khoa_ngayhethen > now()" 
            ."  and a.gv_id = b.gv_id"
            ."  and b.gv_mscb = ".$gv_mscb;
		$ds = mysql_query($select);
		
		if(@mysql_num_rows($ds) > 0) {
			$row  = mysql_fetch_row($ds);
			return $row[0]["khoa_congkhai"];
		}
	    return "";
    }
?>