<?php
    session_start();
    require_once('functions.php');
    require_once('render_view.php');

    if (!isset($_SESSION['gv_mscb']) or !isset($_SESSION['gv_hoten'])) {
        session_unset();
        session_destroy();
        redirect_to('dangnhap.php');
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
                    <a class="btn btn-primary btn-md" href="">Lớp học phần giảng dạy</a>
                    <?php
                        if (isset($_SESSION['gv_admin'])) {
                            if ($_SESSION['gv_admin']) {
                                echo '<a class="btn btn-primary btn-md" href="trangquantri.php">Danh sách tất cả lớp học phần</a>';
                            }
                        }
                    ?>
                    <a class="btn btn-primary btn-md" href="khoa.php">Khóa của tôi</a>
                </div> <!-- menu -->
                <div class="content-body">
                    <form id="formhp" role="form" action="khoadiem.php" method="post">
                        <div class="bang">
                            <div class="tieude">
                                <strong>Danh sách lớp học phần</strong>
                            </div> <!-- tieu de bang -->
                            <div class="noidung">
                                <table id="ds-hocphan" class="table table-striped table-bordered table-hover table-responsive" >
                                    <thead>
                                        <tr>
                                            <th><span class="checkbox"><input type="checkbox" id="checkall"></span></th>
                                            <th>STT</th>
                                            <th>Mã lớp HP</th>
                                            <th>Tên HP</th>
                                            <th>Bảng điểm</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if (isset($_SESSION['gv_mscb'])) {
                                                view_dsLopHocPhanByMSCB($_SESSION['gv_mscb']);
                                            } 
                                        ?>
                                    </tbody>
                                </table>
                            </div> <!-- noi dung bang -->
                            <div class="chan">
                                <input type="submit" class="btn btn-default btn-sm" name="lock-selected" value="Khóa điểm nhanh">
                            </div> <!-- chan bang -->
                        </div> <!-- bang -->
                    </form>
                </div><!-- content body -->
                <?php if (isset($message)) { ?>
                    <div style="width: 60%;margin: auto;text-align:center">
                        <div class="alert alert-<?php echo $message['status']; ?> alert-dismissable" id="error-msg-alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong><?php echo $message['message']; ?></strong>
                        </div>
                    </div>
                <?php } ?>
            </div><!-- content -->				
        </div><!-- container fluid -->

        <!-- Script -->
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap.min.js"></script> 

        <script>
            $(document).ready( function () {

                // Script bang danh sach lop hoc phan
                var dshocphan = $('#ds-hocphan').DataTable({
                    "ordering": false,
                    "pagingType": "full_numbers",
                    "language": {
                        "lengthMenu": "Hiển thị _MENU_ lớp mỗi trang",
                        "zeroRecords": "Không tìm thấy lớp học phần",
                        "info": "Trang _PAGE_ / _PAGES_",
                        "paginate": {
                            "first": "Đầu",
                            "last": "Cuối",
                            "previous": "Trước",
                            "next": "Sau"
                        },
                        "search": "Tìm kiếm:",
                        "infoFiltered": "(lọc từ _MAX_ lớp học phần)",
                         "infoEmpty":      "Hiển thị  từ 0 đến 0 trong 0 lớp học phần",
                    },
                    "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Tất cả"]],
                    "columnDefs": [{
                        "searchable": false,
                        "targets": [0, 1]
                    }],
                    "order": [[ 1, 'asc' ]]
                });
            
                dshocphan.on( 'order.dt search.dt', function () {
                    dshocphan.column(1, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                        cell.innerHTML = i+1;
                    });
                }).draw();
                
                 
            });
        </script>
    </body>	
</html>