<?php
  if (isset($_COOKIE["account"]))
    $user = $_COOKIE["account"];

  $link = mysqli_connect('localhost','root','root123456','group_07')or die ("無法開啟<br>");

  // 送出編碼的MySQL指令
  mysqli_query($link, 'SET CHARACTER SET utf8');
  mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

  if ($result = mysqli_query($link, "SELECT * FROM shopping_cart  where sc_member_account='$user'")) {
        while ($row = mysqli_fetch_assoc($result)) {
            $a['data'][] = array($row["sc_member_account"], $row["sc_product"], $row["sc_product_number"], $row["sc_product_id"], $row["sc_product_no"], $row["sc_product_number"], $row["sc_name"], $row["sc_phone"], $row["sc_delivery"], $row["sc_payment"], $row["sc_address"]);
      }
      mysqli_free_result($result); // 釋放佔用的記憶體
  }
  mysqli_close($link); // 關閉資料庫連結

  echo json_encode($a);

?>