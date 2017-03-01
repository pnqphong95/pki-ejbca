<?php
    require_once('../database/lophocphan.php');
    require_once('../database/diem.php');
    require_once('../database/khokhoa.php');

    // Hien thi toan bo lop hoc phan
    // Bo sung label bang diem co toan ven hay khong
    function view_dsLopHocPhan() {
        $nhapdiem = '';
        $xemdiem = '';
        $controlsdiem = '';
        $dslophocphan = getDSLopHocPhan();
        foreach ($dslophocphan as $lophp) {
            if ($lophp['lhp_dakhoa'] == 0) {
                $nhapdiem = '<a class="btn btn-dakhoa btn-xs btn-myblock" disabled>
                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span><strong> Sửa</strong></a>';
                $xemdiem = '<a class="btn btn-dakhoa btn-xs btn-myblock" disabled>
                <span class="	glyphicon glyphicon-list-alt" aria-hidden="true"></span><strong> Xem</strong></a>';
            } else {
                $nhapdiem = '<a class="btn btn-success btn-xs btn-myblock" href="bangdiem.php?id='.$lophp['lhp_id'].'&do=nhap">
                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span><strong> Sửa</strong></a>';
                $xemdiem = '<a class="btn btn-primary btn-xs btn-myblock" href="bangdiem.php?id='.$lophp['lhp_id'].'">
                <span class="	glyphicon glyphicon-list-alt" aria-hidden="true"></span><strong> Xem</strong></a>';
            }
            $controlsdiem = '<div class="btn-group btn-block">'.$nhapdiem.$xemdiem.'</div>';
            echo '<tr>
                <td></td>
                <td>'.$lophp['hp_mahp'].'-'.sprintf("%02d", $lophp['lhp_nhom']).'</td>
                <td>'.$lophp['hp_tenhp'].'</td>
                <td>'.$controlsdiem.'</td></tr>';
        }
    }

    // Hien thi danh sach hoc phan cua giang vien
    // Bo sung label bang diem co toan ven hay khong
    function view_dsLopHocPhanByMSCB($mscb) {
        $khoadiem = '';
        $nhapdiem = '';
        $xemdiem = '';
        $controlsdiem = '';
        $disablecheckbox = '';
        $dslophocphan = getDSLopHocPhanByMSCB($mscb);
        foreach ($dslophocphan as $lophp) {
            if ($lophp['lhp_dakhoa'] == 0) {
                $khoadiem = '<a class="btn btn-warning btn-xs btn-myblock" href="bangdiem.php?id='.$lophp['lhp_id'].'&do=khoa">
                <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span><strong> Khóa</strong></a>';
                $nhapdiem = '<a class="btn btn-success btn-xs btn-myblock" href="bangdiem.php?id='.$lophp['lhp_id'].'&do=nhap">
                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span><strong> Nhập</strong></a>';
                $xemdiem = '<a class="btn btn-primary btn-xs btn-myblock" href="bangdiem.php?id='.$lophp['lhp_id'].'">
                <span class="	glyphicon glyphicon-list-alt" aria-hidden="true"></span><strong> Xem</strong></a>';
                $disablecheckbox = '';
            } else {
                $khoadiem = '<a class="btn btn-dakhoa btn-xs btn-myblock" disabled>
                    <span class="glyphicon glyphicon-lock" aria-hidden="true"></span><strong> Đã khóa</strong></a>';
                $nhapdiem = '<a class="btn btn-dakhoa btn-xs btn-myblock" disabled>
                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span><strong> Nhập</strong></a>';
                $xemdiem = '<a class="btn btn-primary btn-xs btn-myblock" href="bangdiem.php?id='.$lophp['lhp_id'].'">
                <span class="	glyphicon glyphicon-list-alt" aria-hidden="true"></span><strong> Xem</strong></a>';
                $disablecheckbox = 'disabled';
            }
            $controlsdiem = '<div class="btn-group btn-block">'.$khoadiem.$nhapdiem.$xemdiem.'</div>';
            echo '<tr>
                <td><div class="checkbox"><input type="checkbox" name="locklist[]" value="'.$lophp['lhp_id'].'" '.$disablecheckbox.'></div></td>
                <td></td>
                <td>'.$lophp['hp_mahp'].'-'.sprintf("%02d", $lophp['lhp_nhom']).'</td>
                <td>'.$lophp['hp_tenhp'].' nhóm '.$lophp['lhp_nhom'].'</td>
                <td>'.$controlsdiem.'</td></tr>';
        }
    }

    // Hien thi bang diem
    function view_BangDiem($lhp_id) {
        $list = getBangDiem($lhp_id);
        $is_female = '';
        foreach ($list as $diemsv) {
            $is_female = $diemsv['sv_nu'] == 1 ? 'N' : '';
            echo '<tr>
                <td></td>
                <td>'.$diemsv['sv_mssv'].'</td>
                <td>'.$diemsv['lop_malop'].'</td>
                <td>'.$diemsv['sv_ho'].'</td>
                <td>'.$diemsv['sv_ten'].'</td>
                <td>'.$is_female.'</td>
                <td>'.$diemsv['diemso'].'</td></tr>';
        }
    }

    // Hien thi bang diem de nhap
    function view_NhapDiem($lhp_id) {
        $list = getBangDiem($lhp_id);
        $is_female = '';
        foreach ($list as $diemsv) {
            $is_female = $diemsv['sv_nu'] == 1 ? 'N' : '';
            echo '<tr>
                <td></td>
                <td>'.$diemsv['sv_mssv'].'</td>
                <td>'.$diemsv['lop_malop'].'</td>
                <td>'.$diemsv['sv_ho'].'</td>
                <td>'.$diemsv['sv_ten'].'</td>
                <td>'.$is_female.'</td>
                <td><input type="text" class="form-control" name="bangdiem['.$diemsv['bangdiem_id'].']" value="'.$diemsv['diemso'].'">
                </td></tr>';
        }
    }
?>