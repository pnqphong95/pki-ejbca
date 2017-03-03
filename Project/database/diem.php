<?php
    require_once('db.inc');
    require_once('util.php');
    require_once('../htql/libs/Crypt/Hash.php');
    require_once('../htql/libs/Crypt/RSA.php');

    function getBangDiem($lhp_id) {
        $query = "select a.bangdiem_id, a.lhp_id, a.sv_mssv, b.lop_malop, b.sv_ho, b.sv_ten, b.sv_nu, a.diemso
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

    function khoaBangDiem($bangdiem_ids, $privatekey, $publickey) {
        $success = array();
        $hash = new Crypt_Hash('sha1');
        $hash->setKey($_SESSION['symmetric_key']);
        $rsa = new Crypt_RSA();
        $rsa->loadKey($privatekey);
        $content = "";
        foreach ($bangdiem_ids as $id) {
            $content = "";
            $bangdiem = getBangDiem($id);
            foreach ($bangdiem as $diem) {
                $content .= $diem['lhp_id']."-".$diem['sv_mssv']."-".$diem['diemso']."*";
            }
            $content = rtrim($content,"*");
            $signature = $hash->hash($content);
            $ciphertext = $rsa->encrypt($content." ".$signature);
            $query = "update lophocphan 
                set lhp_bangdiemkhoa='".base64_encode($ciphertext)."',
                    lhp_dakhoa=1 where lhp_id=".$id;
            $result = mysql_query($query);
            if ($result) {
                array_push($success, $id);
            }
        }
        return $success;
    }
?>