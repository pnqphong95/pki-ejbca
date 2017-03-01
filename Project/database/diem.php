<?php
    require_once('db.inc');
    require_once('util.php');

    function getBangDiem($lhp_id) {
        $query = "select a.bangdiem_id, a.sv_mssv, b.lop_malop, b.sv_ho, b.sv_ten, b.sv_nu, a.diemso
            from bangdiem a, sinhvien b
            where a.sv_mssv = b.sv_mssv
                and a.lhp_id = '$lhp_id'";
        $result = mysql_query($query);
        $bangdiem = array();
        while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
            $bangdiem[] = $row;
        }
        return $bangdiem;
    }

    function saveBangDiem($bangdiem) {
        $ids = "";
        $query = "update bangdiem set diemso = case bangdiem_id ";
        foreach ($bangdiem as $key => $value) {
            $query .= "when {$key} then {$value} ";
            $ids .= $key.",";
        }
        $ids = rtrim($ids,",");
        $query .= "end ";
        $query .= "where bangdiem_id in (".$ids.")";
        $result = mysql_query($query);
        return $result;
    }
?>