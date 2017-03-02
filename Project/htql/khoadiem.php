<?php
    session_start();
    require_once('functions.php');
    require_once('render_view.php');
    require_once('../database/khokhoa.php');
    require_once('libs/Crypt/AES.php');
    $khokhoa = getKhoa($_SESSION["gv_mscb"]);
    
    // redirect user to create key gui if user has not key.
    if ($khokhoa == null) {
        redirect_to('khoa.php');
    } 
    
    $locklist = array();

    // excute when receiving a list transcript id
    if (isset($_POST['lock-selected'])) {
        $locklist = $_POST['locklist'];
    
    // execute when receiving a transcript id
    } elseif (isset($_GET['id'])) {
        if (is_array($_GET['id'])) {
            $locklist = $_GET['id'];
        } else {
            $locklist = array($_GET['id']);
        }
    
    // confirm key to lock transcript
    } elseif (isset($_POST['confirmkey'])) {

        // get transcript list from post method
        $confirm_transcript = array();
        if (isset($_POST['transcriptid'])) {
            $confirm_transcript = $_POST['transcriptid'];
            foreach ($confirm_transcript as $value) {
                $bangdiem = getThongTinBangDiem($value);

                // check if at least one transcript was locked then reselect other transcript in homepage
                if ($bangdiem['lhp_dakhoa']) {
                    $message = array(
                        "status" => "danger",
                        "message" => "Bảng điểm ".$bangdiem['hp_tenhp']." nhóm ".$bangdiem['lhp_nhom'].". Chọn lại bảng điểm khác."
                    );
                    $_SESSION["message"] = $message;
                    redirect_to("trangchu.php");
                }
            }
        }

        // check if user choose type password key method
        if (isset($_POST['passwordkey']) and $_POST['passwordkey'] != "") {
            $aes = new Crypt_AES();
            $aes->setKey($_SESSION['symmetric_key']);
            $passkeydb = $aes->decrypt($khokhoa['khoa_matkhaukhoa']);
            $passkey = $_POST['passwordkey'];
            if ($passkey == $passkeydb) {
                // khoadiem($bangdiem, $khoabimat)
            } else {
                $message = array(
                    "status" => "danger",
                    "message" => "Sai mật khẩu khóa. Khóa điểm không thành công."
                );
                $_SESSION["message"] = $message;
                redirect_to("khoadiem.php?".http_build_query(array('id' => $confirm_transcript)));
            }

        // check if user choose upload file key method
        } elseif (isset($_FILES['mykey'])) {
            if ($_FILES['mykey']['error'] > 0)
            {
                 $message = array(
                    "status" => "danger",
                    "message" => "File khóa tải lên lỗi. Khóa điểm không thành công."
                );
                $_SESSION["message"] = $message;
                redirect_to("khoadiem.php?".http_build_query(array('id' => $confirm_transcript)));
            } else {
                $privatekey = file_get_contents($_FILES["mykey"]["tmp_name"]);
                if ($khokhoa['khoa_bimat'] == $privatekey) {
                    // khoadiem($bangdiem, $khoabimat)
                } else {
                    $message = array(
                        "status" => "danger",
                        "message" => "File khóa sai. Khóa điểm không thành công."
                    );
                    $_SESSION["message"] = $message;
                    redirect_to("khoadiem.php?".http_build_query(array('id' => $confirm_transcript)));
                }
            }
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
                    <a class="btn btn-primary btn-md" href="khoa.php">Khóa của tôi</a>
                    <a class="btn btn-default btn-md" href="javascript:history.back()">Quay lại</a>
                </div> <!-- menu -->
                <div class="content-body">
                    <div class="bang">
                        <div class="tieude">
                            <strong>Xác nhận khóa điểm</strong>
                        </div> <!-- tieu de bang -->
                        <div class="noidung">
                             <div style="width: 60%;margin: auto;text-align:center">
                                <?php if (isset($message)) { ?>
                                    <div class="alert alert-<?php echo $message['status']; ?> alert-dismissable" id="error-msg-alert">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong><?php echo $message['message']; ?></strong>
                                    </div>
                                <?php } ?>
                                <?php if (isset($locklist) and sizeof($locklist) > 0) {?>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="2" style="text-align:center">Lớp học phần sẽ khóa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                    foreach ($locklist as $value) {
                                                        $bangdiem_lhp = getThongTinBangDiem($value);
                                            ?>
                                            <tr>
                                                <td><?php echo $bangdiem_lhp['hp_mahp'].'-'.sprintf("%02d", $bangdiem_lhp['lhp_nhom']); ?></td>
                                                <td><?php echo $bangdiem_lhp['hp_tenhp'].' nhóm '.$bangdiem_lhp['lhp_nhom']; ?></td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                <?php } ?>
                                <strong style="color: red;">Khóa bí mật được lưu trên hệ thống. Nhập mật mã hoặc chọn tải khóa lên để khóa điểm</strong><hr>
                                <form id="keyconfirm-form" class="form-inline" role="form"  action="khoadiem.php" method="POST" enctype="multipart/form-data">
                                    <div class="input-group">
                                        <?php if (isset($locklist) and sizeof($locklist) > 0) {
                                                foreach ($locklist as $value) { ?>
                                                    <input type="hidden" name="transcriptid[]" value="<?php echo $value?>">
                                        <?php }}?>
                                        <label for="password-key" class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></label>
                                        <input id="password-key" type="password" class="form-control input-md" name="passwordkey" placeholder="Nhập mật khẩu khóa bí mật">
                                        <span class="input-group-btn">
                                            <button id="get_key" type="button" class="btn btn-default">Tải khóa lên</button>
                                        </span>
                                    </div>
                                    <input type="file" id="mykey" name="mykey" style="display:none">
                                    <input id="confirmkey" type="submit" class="btn btn-primary" name="confirmkey" value="Khóa điểm">
                                </form>
                                <strong id="customfileupload">No file selected</strong>
                             </div>
                        </div> <!-- noi dung bang -->
                    </div> <!-- bang -->
                </div><!-- content body -->
            </div><!-- content -->					
        </div><!-- container fluid -->

        <!-- Script -->
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.validate.js"></script>
        <script src="js/jquery.tooltipster.min.js"></script>

        <script>
            $(document).ready( function () {
                $( "#get_key" ).click(function() {
                    $( "#mykey" ).click();
                });

                $('input[type=file]').change(function (e) {
                    $('#customfileupload').html($(this).val());
                });

                // Script hien thi tooltip thong bao loi
                $('#keyconfirm-form input[type="password"]').tooltipster({ 
                    trigger: 'custom', // default is 'hover' which is no good here
                    onlyone: false,    // allow multiple tips to be open at a time
                    position: 'top',  // display the tips to the right of the element
                    theme: 'tooltipster-noir',
                    timer: 1500
                });

                // Script kiem tra form hop le
                $('#keyconfirm-form').validate({
                    onkeyup: false,
                    rules: {
                        passwordkey: {
                            required: function(element) {
                                var upload_file = $("#customfileupload").text();
                                return upload_file == "No file selected";
                            }
                        },
                        mykey: {
                            required: function(element) {
                                var password_key = $("#password-key").text();
                                alert(password_key);
                                return password_key == "";
                            }
                        }
                    },
                    messages: {
                        passwordkey: "Phải nhập mật khẩu hoặc tải khóa lên",
                        mykey: "Phải nhập mật khẩu hoặc tải khóa lên"
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