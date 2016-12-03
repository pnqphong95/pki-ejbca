<?php
	include_once("../php/link.php");
	mysql_connect("localhost", "root", "") or die("Không th? k?t n?i v?i máy ch? proxy");
	mysql_select_db("luanvan");
	mysql_query("SET NAMES utf8");
?>