<?php include_once("../php/link.php"); ?>
<div class="main_content_menu">
	<span><b>Hoạt động đào tạo: </b>Chính quy</span>
	<span><b>Năm học: </b>
		<select class="slChon">
			<?php 
				$i=2016;
				do{ 
			?>
			<option value=”<?php echo $i; ?>”><?php echo $i; ?> - <?php echo ($i+1); ?> </option>
			<?php 
					$i--;
				}while($i>2010);
			?>

		</select>
	</span>
	<span><b>Học kỳ: </b>
		<select class="slChon">
			<option value="01">1</option>
			<option value="02">2</option>
		</select>
	</span>	
	<input type="submit" class="btnLietKe" id="btnLietKe" value="Liệt kê" />
</div>
