<div id="header">
    <div id="banner">
        <?php
            if (isset($_SESSION['gv_mscb']) and isset($_SESSION['gv_hoten'])) {
                echo '<a id="btn-logout" href="dangxuat.php">Thoát</a>';
            }
        ?>
        
        <a id="btn-homepage" href="trangchu.php" title="Trang chủ">Trang chủ</a>
        <span id="user-login">
        <?php
            if (isset($_SESSION['gv_mscb']) and isset($_SESSION['gv_hoten'])) {
                echo $_SESSION['gv_hoten'].' ('.$_SESSION['gv_mscb'].')';
            }
        ?>
        </span> 
    </div>
</div>