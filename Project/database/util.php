<?php
    function make_safe($str) {
        $str = stripslashes($str);
        $str = mysql_real_escape_string(trim($str));
        return $str;
    }
?>