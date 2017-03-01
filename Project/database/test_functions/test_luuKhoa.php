<?php

require_once('../khokhoa.php');
require_once('../../htql/libs/Crypt/RSA.php');

if(isset($_GET)) {
    $passkey = $_GET['passwordkey'];
    $rsa = new Crypt_RSA();
    extract($rsa->createKey());
    $success = luuKhoa($_GET['gv_mscb'], $publickey, $privatekey, $passkey);
    if($success) {
        echo "<p>Them thanh cong!</p>";
    } else {
        echo "<p>Them loi!</p>";
    }
}