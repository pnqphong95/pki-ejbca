<?php
	mysql_connect("localhost", "root", "") or die("Không thể kết nối đến cơ sở dữ liệu ".mysql_error());
	mysql_select_db("htql");
	mysql_query("SET NAMES utf8");
?>