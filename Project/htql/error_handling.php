<?php
    session_start();
    require_once('functions.php');
    require_once('render_view.php');

    // Handling error return from session
    if (isset($_SESSION["message"])) {
        $message = get_once_session('message');
    }

    if(isset($_SERVER['HTTP_REFERER'])) {
        $previous = $_SERVER['HTTP_REFERER'];
        header('Refresh: 3;url='.$previous);
    } else {
    ?>
        <script>
            setTimeout(function () {    
                window.history.go(-1);
            }, 3000);
        </script>
<?php
    }    
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Quản lý đào tạo - Trường Đại học Cần Thơ</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/custom.css">
        <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.min.css">

    </head>

    <body>	
        <div class="container-fluid">
            <?php include_once('template/header.php'); ?>

            <div class="content">
                <div class="content-body">
                    <div style="width:60%; margin:auto; text-align:center">
                        <?php if (isset($message)) { ?>
                            <div class="alert alert-<?php echo $message['status']; ?> alert-dismissable" id="error-msg-alert">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong><?php echo $message['message']; ?></strong>
                            </div>
                        <?php } ?>
                    </div>
                </div><!-- content body -->
            </div><!-- content -->					
        </div><!-- container fluid -->

        <!-- Script -->
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <script>
            
        </script>
    </body>	
</html>