<?php
    session_start();
    require_once('functions.php');
    require_once('../database/giangvien.php');

    // Handling login form submit 
    if(isset($_POST["submit_login"])) {
        $gv_mscb = $_POST["userid"];
        $gv_matkhau = $_POST["password"];
        if (authenticate($gv_mscb, $gv_matkhau) == true) {
            redirect_to("trangchu.php");
        } else {
            $_SESSION["message"] = 'Sai mã số đăng nhập hoặc mật khẩu.';
        }
    }

    // Handling error return from session
    if (isset($_SESSION["message"])) {
        $message = get_once_session('message');
    }

?>


<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Quản lý đào tạo - Trường Đại học Cần Thơ</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/custom.css"> 
        <link rel="stylesheet" type="text/css" href="css/tooltipster.css">
        <link rel="stylesheet" type="text/css" href="css/tooltipster-theme/tooltipster-noir.css">
    </head>

    <body>	
        <div class="container-fluid">
            <?php include_once('template/header.php'); ?>

            <div id="loginbox">
                <div class="panel panel-primary"> 
                    
                    <div class="panel-heading">
                        <div id="heading_cb">
                        </div>
                    </div><!-- Login box heading -->
                    
                    <div class="panel-body">

                        
                        <form id="loginform" class="form-horizontal" role="form" action="dangnhap.php" method="POST">
                                
                            <div style="margin-bottom: 30px" class="input-group">
                                <label for="login-userid" class="input-group-addon"><i class="glyphicon glyphicon-user"></i></label>
                                <input id="login-userid" type="text" class="form-control input-lg" name="userid" placeholder="Mã số đăng nhập">
                            </div>

                            <div style="margin-bottom: 30px" class="input-group">
                                <label for="login-password" class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></label>
                                <input id="login-password" type="password" class="form-control input-lg" name="password" placeholder="Mật khẩu">
                            </div>
                                
                            <div style="margin-top:10px" class="form-group">
                                <div class="col-sm-12 controls">
                                    <input id="btn-login" type="submit" class="btn btn-primary btn-lg" name="submit_login" value="Đăng nhập">
                                </div>
                            </div>
                        </form><!-- login form -->
                        
                        <?php if (isset($message)) { ?>
                            <div class="alert alert-danger alert-dismissable" id="error-msg-alert">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong><?php echo $message; ?></strong>
                            </div>
                        <?php } ?>

                    </div><!-- login box body -->
                </div><!-- login panel -->
            </div><!-- login box -->					
        </div><!-- container -->

        <!-- Script -->
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
	    <script src="js/jquery.validate.js"></script>
        <script src="js/jquery.tooltipster.min.js"></script>
        
        <script>
            $(document).ready( function () {

                // Script hien thi tooltip thong bao loi
                $('#loginform input[type="text"], input[type="password"]').tooltipster({ 
                    trigger: 'custom', // default is 'hover' which is no good here
                    onlyone: false,    // allow multiple tips to be open at a time
                    position: 'right',  // display the tips to the right of the element
                    theme: 'tooltipster-noir',
                    timer: 1500
                });

                // Script kiem tra form hop le
                $('#loginform').validate({
                    onkeyup: false,
                    rules: {
                        userid: {
                            required: true,
                            maxlength: 10
                        },
                        password: "required"
                    },
                    messages: {
                        userid: {
                            required: "Bạn phải nhập mã số đăng nhập",
                            maxlength: "Mã số đăng nhập tối đã 10 ký tự"
                        },
                        password: "Bạn phải nhập mật khẩu"
                    },
                    errorPlacement: function (error, element) {
                        $(element).tooltipster('update', $(error).text());
                        $(element).tooltipster('show');
                    },
                    success: function (label, element) {
                        $(element).tooltipster('hide');
                    },
                    submitHandler: function (form) {
                        form.submit();
                    }
                });

                // Script auto close alert
                $("#error-msg-alert").fadeTo(2000, 500).slideUp(500, function(){
                    $("#error-msg-alert").slideUp(500);
                });
            });
        </script>
    </body>	
</html>