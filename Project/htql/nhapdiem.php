<?php
    session_start();
    require_once('functions.php');
    require_once('render_view.php');
    if (isset($_GET['id'])) {
        $bangdiem = getThongTinBangDiem($_GET['id']);
        if ($bangdiem['lhp_dakhoa']) {
            if (!$_SESSION['gv_admin']) {
                $message = array(
                    "status" => "warning",
                    "message" => "Bảng điểm đã khóa. Không thể nhập điểm"
                );
                $_SESSION["message"] = $message;
                redirect_to("error_handling.php");
            }
        }
    }

    if (isset($_POST['save-diem'])) {
        if (isset($_POST['bangdiem'])) {
            $bangdiem = $_POST['bangdiem'];
            $result = saveBangDiem($bangdiem);
            if ($result and isset($_POST['lhp_id'])) {
                $message = array(
                    "status" => "success",
                    "message" => "Lưu bảng điểm thành công. Bạn có thể khóa điểm."
                );
                $_SESSION["message"] = $message;
                redirect_to("bangdiem.php?id=".$_POST['lhp_id']);
            } else {
                $$message = array(
                    "status" => "danger",
                    "message" => "Lưu bảng điểm không thành công"
                );
                $_SESSION["message"] = $message;
                redirect_to("nhapdiem.php?id=".$_POST['lhp_id']);
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
        <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.min.css">

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
                    <form id="formhp" role="form" action="nhapdiem.php" method="post">
                        <div class="bang">
                            <div class="tieude">
                                <strong>Nhập điểm học phần</strong>
                            </div> <!-- tieu de bang -->
                            <div class="noidung">
                                <?php if (isset($message)) { ?>
                                    <div class="alert alert-<?php echo $message['status']; ?> alert-dismissable" id="error-msg-alert">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong><?php echo $message['message']; ?></strong>
                                    </div>
                                <?php } ?>
                                <?php
                                    if (isset($_GET['id'])) {
                                         echo '<input type="hidden" name="lhp_id" value="'.$_GET['id'].'">';
                                         echo '';
                                    }
                                ?>
                                <table id="bangdiem" class="table table-striped table-bordered table-hover table-responsive">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>MSSV</th>
                                            <th>Mã lớp</th>
                                            <th>Họ lót</th>
                                            <th>Tên</th>
                                            <th>Nữ</th>
                                            <th>Điểm số</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if (isset($_GET['id'])) {
                                                view_NhapDiem($_GET['id']);
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div> <!-- noi dung bang -->
                            <div class="chan">
                                <input type="submit" class="btn btn-default btn-sm" name="save-diem" value="Lưu điểm">
                            </div> <!-- chan bang -->
                        </div> <!-- bang -->
                    </form>
                </div><!-- content body -->
            </div><!-- content -->					
        </div><!-- container fluid -->

        <!-- Script -->
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap.min.js"></script>
        <script src="js/myscript.js"></script>

        <script>
            $(document).ready( function () {

                // Script bang diem sinh vien
                var bangdiem = $('#bangdiem').DataTable({
                    "info": false,
                    "pagingType": "full_numbers",
                    "language": {
                        "lengthMenu": "Hiển thị _MENU_ sinh viên mỗi trang",
                        "zeroRecords": "Không tìm thấy sinh viên nào",
                        "info": "Trang _PAGE_ / _PAGES_",
                        "paginate": {
                            "first": "Đầu",
                            "last": "Cuối",
                            "previous": "Trước",
                            "next": "Sau"
                        },
                        "search": "Tìm kiếm:"
                    },
                    "lengthMenu": [[-1, 5, 10, 25, 50], ["Tất cả", 5, 10, 25, 50]],
                    "columnDefs": [{
                        "searchable": false,
                        "orderable": false,
                        "targets": 0
                    }],
                    "order": [[ 1, 'asc' ]]
                });
            
                bangdiem.on( 'order.dt search.dt', function () {
                    bangdiem.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                        cell.innerHTML = i+1;
                    });
                }).draw();
                
                 
            });
        </script>
    </body>	
</html>