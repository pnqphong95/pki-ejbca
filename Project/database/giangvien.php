<?php
    require_once('db.inc');
    require_once('util.php');

    function authenticate($mscb, $matkhau) {
        $gv_mscb = make_safe($mscb);
        $gv_matkhau = md5(make_safe($matkhau));
        $query = "select gv_mscb, gv_hoten, gv_admin from giangvien
            where gv_mscb = '$gv_mscb' and gv_matkhau = '$gv_matkhau'";
        $listgv = mysql_query($query);
        if(mysql_num_rows($listgv) == 1) {
            $gv = mysql_fetch_array($listgv);
            $_SESSION['symmetric_key'] = 'htql@CtU';
            $_SESSION['gv_mscb'] = $gv['gv_mscb'];
            $_SESSION['gv_hoten'] = $gv['gv_hoten'];
            $_SESSION['gv_admin'] = $gv['gv_admin'] == 1 ? true : false; 
            return true;
        } else {
            return false;
        }
    } 
?>