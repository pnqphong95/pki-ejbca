<?php

function redirect_to($where, $time = 0)
{
	sleep($time);
	header("Location: " . $where);
	exit();
}

function get_once_session($var_name)
{
	$value = $_SESSION[$var_name];
	unset($_SESSION[$var_name]);
	return $value;
}