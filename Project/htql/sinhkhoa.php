<?php
    session_start();
    require_once('functions.php');
    require_once('../database/khokhoa.php');
    require_once('libs/Crypt/RSA.php');
    require_once('libs/Crypt/AES.php');
    require_once('../database/util.php');

    if (!isset($_SESSION['gv_mscb']) or !isset($_SESSION['gv_hoten'])) {
        session_unset();
        session_destroy();
        redirect_to('dangnhap.php');
    }

    if (isset($_POST['createkey'])) {
        $selectquery = "select * from khokhoa where gv_mscb=".$_SESSION['gv_mscb'];
		if (@mysql_num_rows($ds) > 0) {
			$_SESSION["message"] = "Khóa của bạn đã được tạo. Không thể tạo lại";
		} else {
            $rsa = new Crypt_RSA();
            extract($rsa->createKey());
            $aes = new Crypt_AES();
            $aes->setKey($_SESSION['symmetric_key']);
            $passkey = $aes->encrypt($_POST['passwordkey']);
            $success = luuKhoa($_SESSION['gv_mscb'], $publickey, $privatekey, $passkey);
            if (!$success) {
                $_SESSION["message"] = "Tạo khóa bị lỗi. Hãy thử lại";
            }
        }
        redirect_to('khoa.php');
    }

?>