<?php

require_once "../dulieu.php";
require_once "../khoa.php";

if(isset($_GET["mscb"])) {
  $publickey = getKhoaCongKhai($_GET["mscb"]);
  if($publickey !== null) {
      echo "<p>Tim thay nguoi dung trong CSDL!</p>";
      var_dump($publickey);
  } else {
      echo "<p>Khong tim thay nguoi dung trong CSDL!</p>";
  }
}
