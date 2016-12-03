<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	include_once("../php/link.php");	
	include_once("../thuvien/giangvien.php");
	include_once("../thuvien/hocphan.php");
	include_once("../thuvien/mahoa.php");

	if(isset($_POST["btnDongY"]))
	{
		$key = md5($_POST["txtChungChi"]);
		if(XacNhan($key) == true) 
		{
			echo "<script> alert('Pass hợp lệ!'); </script>";
		}
		else {
			echo "<script> alert('Pass không hợp lệ! Vui lòng nhập lại!'); </script>";
		}
	}
?>
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-address-card-o"></i> Pass chứng thực</h4>
        </div>
		<form action="" method="post">
			<div class="modal-body">
				<!--<input type="text" id="hiddenValue" />-->
			  <input type="password" id="txtChungChi" class="Input3" name="txtChungChi" placeholder="Nhập pass" />
			</div>
			<div class="modal-footer">
			  <button type="submit" class="btn btn-default" name="btnDongY" id="btnDongY">Đồng ý</button>
			  <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
			</div>
		</form>
      </div>
      
    </div>
  </div>
  
</div>