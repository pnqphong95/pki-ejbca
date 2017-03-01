<?php
    require_once('db.inc');
    require_once('util.php');

    function getThongTinBangDiem($lhp_id) {
        $query = "select a.hp_mahp, c.hp_tenhp, a.lhp_nhom, a.gv_mscb, b.gv_hoten, a.lhp_dakhoa
            from lophocphan a, giangvien b, hocphan c
            where a.gv_mscb = b.gv_mscb
                and a.hp_mahp = c.hp_mahp
                and a.lhp_id = '$lhp_id'";
        $result = mysql_query($query);
        if(mysql_num_rows($result) == 1) {
            $thongtinbangdiem = mysql_fetch_assoc($result);
            return $thongtinbangdiem;
        }
        return false;
    }

    function getDSLopHocPhanByMSCB($gv_mscb) {
        $query = "select a.lhp_id, a.hp_mahp, b.hp_tenhp, a.lhp_nhom, a.lhp_dakhoa from lophocphan a, hocphan b
            where a.hp_mahp = b.hp_mahp
                and a.gv_mscb = '$gv_mscb'";
        $result = mysql_query($query);
        $listhp = array();
        while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
            $listhp[] = $row;
        }
        return $listhp;
    } 

    function getDSLopHocPhan() {
        $query = "select a.lhp_id, a.hp_mahp, b.hp_tenhp, a.lhp_nhom, a.lhp_dakhoa from lophocphan a, hocphan b
            where a.hp_mahp = b.hp_mahp";
        $result = mysql_query($query);
        $listhp = array();
        while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
            $listhp[] = $row;
        }
        return $listhp;
    } 
?>