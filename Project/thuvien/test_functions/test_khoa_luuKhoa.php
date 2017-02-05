<?php

require_once "../dulieu.php";
require_once "../khoa.php";

if(isset($_GET["mscb"]) and isset($_GET["key"])) {
  $result = luuKhoa($_GET["mscb"], $_GET["key"]);
  echo $result;
}
