<?php
    session_start();
    require_once('functions.php');
    require_once('../database/khokhoa.php');
    require_once('render_view.php');

    if (!isset($_SESSION['gv_mscb']) or !isset($_SESSION['gv_hoten'])) {
        session_unset();
        session_destroy();
        redirect_to('dangnhap.php');
    }

?>


<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Quản lý đào tạo - Trường Đại học Cần Thơ</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/custom.css">

    </head>

    <body>	
        <div class="container-fluid">
            <?php include_once('template/header.php'); ?>

            <div class="content">
                <div class="menu">
                    <a class="btn btn-primary btn-md" href="trangchu.php">Lớp học phần giảng dạy</a>
                    <?php
                        if (isset($_SESSION['gv_admin'])) {
                            if ($_SESSION['gv_admin']) {
                                echo '<a class="btn btn-primary btn-md" href="trangquantri.php">Danh sách tất cả lớp học phần</a>';
                            }
                        }
                    ?>
                    <a class="btn btn-primary btn-md" href="">Khóa của tôi</a>
                    <a class="btn btn-default btn-md" href="javascript:history.back()">Quay lại</a>
                </div> <!-- menu -->
                <div class="content-body">
                    <div class="bang">
                        <div class="tieude">
                            <strong>Khóa của tôi</strong>
                        </div> <!-- tieu de bang -->
                        <div class="noidung">
                             <div style="width: 60%;margin: auto;text-align:center">
                                <?php
                                        if (isset($_SESSION['message'])) {
                                            $message = get_once_session('message');
                                ?>
                                            <div class="alert alert-danger alert-dismissable" id="error-msg-alert">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong><?php echo $message; ?></strong>
                                            </div>
                                <?php   }
                                    $khoaCongKhai = getKhoaCongKhai($_SESSION["gv_mscb"]);
                                    if ($khoaCongKhai == null) {
                                ?>
                                        <strong>Bạn chưa tạo khóa. Hãy nhập mật khẩu khóa để tạo khóa ngay !</strong><hr>
                                        <form id="createkey-form" class="form-inline" role="form" action="sinhkhoa.php" method="POST">
                                            <div class="input-group">
                                                <label for="password-key" class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></label>
                                                <input id="password-key" type="password" class="form-control input-md" name="passwordkey" placeholder="Nhập mật khẩu khóa" required>    
                                            </div>
                                            <input type="submit" class="btn btn-info" name="createkey" value="Tạo khóa">
                                            <input type="reset" class="btn btn-default" value="Nhập lại">
                                        </form>
                                <?php
                                    } else {
                                ?>
                                        <div class="form-group">
                                            <label for="public-key"><h4>Khóa công khai: </h4></label>
                                            <textarea class="form-control" rows="8" id="public-key" disabled><?php echo $khoaCongKhai ?></textarea>
                                        </div><hr>
                                        <div class="form-group">
                                            <label for="downloadkey-form"><h4>Khóa bí mật: </h4></label><br>
                                            <form id="downloadkey-form" class="form-inline" role="form" action="taikhoa.php" method="POST">
                                                <div class="input-group">
                                                    <label for="password-key" class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></label>
                                                    <input id="password-key" type="password" class="form-control input-md" name="passwordkey" placeholder="Nhập mật khẩu khóa" required>    
                                                </div>
                                                <input id="downloadkey" type="submit" class="btn btn-info" name="downloadkey" value="Tải khóa bí mật">
                                                <input type="reset" class="btn btn-default" value="Nhập lại">
                                            </form>
                                            <strong>Khóa bí mật được lưu trên hệ thống. Nhập mật mã khóa để tải file khóa</strong>
                                        </div><hr>
                                        <a class="btn btn-primary" href="capkhoa.php">Cấp lại khóa</a>
                                <?php
                                    }
                                ?>
                             </div>
                        </div> <!-- noi dung bang -->
                    </div> <!-- bang -->
                </div><!-- content body -->
            </div><!-- content -->					
        </div><!-- container fluid -->

        <!-- Script -->
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <script>
            $(document).ready( function () {
                $("#downloadkey").click(function() {
                    $("#downloadkey-form").submit();
                    $("#downloadkey-form").reset();
                });   
            });
        </script>
    </body>	
</html>