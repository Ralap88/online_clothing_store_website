<?php
   $user = trim($_GET["account"]);
   $id = trim($_GET["pwd"]);
   include("open_database.php");

   $sql = "SELECT * FROM member_profile where mp_account='$user' and mp_password='$id'"; // 指定SQL查詢字串
   $s = "SELECT * FROM admin where admin_account='$user' and admin_password='$id'"; // 指定SQL查詢字串

   // 送出編碼的MySQL指令
   mysqli_query($link, 'SET CHARACTER SET utf8');
   mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

   // 送出查詢的SQL指令
   if (($result = mysqli_query($link, $sql)) && ($sult = mysqli_query($link, $s))) {
      if (($row = mysqli_fetch_assoc($result)) || ($r = mysqli_fetch_assoc($sult))) {
         echo "1";//帳號已存在
   		setcookie("account", $user , time()+33600); 
      }
      else {
         echo "0";//帳號不存在
      }
      mysqli_free_result($result); // 釋放佔用的記憶體
   }

   mysqli_close($link); // 關閉資料庫連結
?>