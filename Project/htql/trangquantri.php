<?php
    session_start();
    require_once('functions.php');
    require_once('render_view.php');

    if (!isset($_SESSION['gv_mscb']) or !isset($_SESSION['gv_hoten'])) {
        session_unset();
        session_destroy();
        redirect_to('login.php');
    }

    if (isset($_SESSION['gv_admin'])) {
        if (!$_SESSION['gv_admin']) {
            redirect_to('trangchu.php');
        }
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
            <div id="header">
                <div id="banner">
                    <a id="btn-logout" href="dangxuat.php">Thoát</a>
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
            <div class="content">
                <div class="menu">
                    <a class="btn btn-primary btn-md" href="trangchu.php">Lớp học phần giảng dạy</a>
                    <?php
                        if (isset($_SESSION['gv_admin'])) {
                            if ($_SESSION['gv_admin']) {
                                echo '<a class="btn btn-primary btn-md" href="">Danh sách tất cả lớp học phần</a>';
                            }
                        }
                    ?>
                    <a class="btn btn-primary btn-md" href="khoa.php">Khóa của tôi</a>
                </div> <!-- menu -->
                <div class="content-body">
                    <div class="bang">
                        <div class="tieude">
                            <strong>Danh sách lớp học phần</strong>
                        </div> <!-- tieu de bang -->
                        <div class="noidung">
                            <table id="ds-hocphan" class="table table-striped table-bordered table-hover table-responsive" >
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã lớp HP</th>
                                        <th>Tên HP</th>
                                        <th>Bảng điểm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        view_dsLopHocPhan(); 
                                    ?>
                                </tbody>
                            </table>
                        </div> <!-- noi dung bang -->
                        <div class="chan">
                        </div> <!-- chan bang -->
                    </div> <!-- bang -->
                </div><!-- content body -->
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
                    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Tất cả"]],
                    "columnDefs": [{
                        "searchable": false,
                        "targets": 0
                    }],
                    "order": [[ 1, 'asc' ]]
                });
            
                dshocphan.on( 'order.dt search.dt', function () {
                    dshocphan.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                        cell.innerHTML = i+1;
                    });
                }).draw();
                
                 
            });
        </script>
    </body>	
</html>