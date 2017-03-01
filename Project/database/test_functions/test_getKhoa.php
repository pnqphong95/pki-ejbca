<?php

require_once('../khokhoa.php');
require_once('../../htql/libs/Crypt/AES.php');

if(isset($_GET)) {
    $gv_mscb = $_GET['gv_mscb'];
    $khokhoa = getKhoa($gv_mscb);
    $aes = new Crypt_AES();
    $aes->setKey('htql@CtU');
    echo $aes->decrypt($khokhoa['khoa_matkhaukhoa']);
}