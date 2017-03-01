<?php

    if (isset($_POST['downloadkey'])) {
        session_start();
        require_once('functions.php');
        require_once('libs/Crypt/AES.php');
        require_once('../database/khokhoa.php');
        $aes = new Crypt_AES();
        $aes->setKey($_SESSION['symmetric_key']);
        $khokhoa = getKhoa($_SESSION['gv_mscb']);
        $passkeydb = $aes->decrypt($khokhoa['khoa_matkhaukhoa']);
        $passkey = $_POST['passwordkey'];
        if ($passkey == $passkeydb) {
            $privatekey = $khokhoa['khoa_bimat'];
            header('Content-Disposition: attachment; filename="privatekey_'.$khokhoa['gv_mscb'].'"');
            header('Content-Type: text/plain');
            header('Content-Length: '.strlen($privatekey));
            header('Connection: close');

            echo $privatekey;
        } else {
            $_SESSION['message'] = "Mật khẩu khóa không đúng";
            redirect_to('khoa.php');
        }
    }

    