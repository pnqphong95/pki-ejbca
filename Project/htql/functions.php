<?php

function redirect_to($where)
{
	header("Location: " . $where);
	exit();
}