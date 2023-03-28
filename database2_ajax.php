<?php

      include("open_database.php");

      $arr_oper = array("insert" => "新增", "update" => "修改", "delete" => "刪除");
      $oper = $_POST['oper'];

      if ($oper == "query") {
            $sql = "select 'sc_product', 'sc_product_number', 'sc_product_id', 'sc_product_no', 'sc_name', 'sc_phone', 'sc_delivery', 'sc_payment',  'sc_address' from shopping_cart";
            if ($result = mysqli_query($link, $sql)) {
                  while ($row = mysqli_fetch_assoc($result)) {
                         $a['data'][] = array($row["sc_product"], $row["sc_product_number"], $row["sc_product_id"], $row["sc_product_no"], $row["sc_name"], $row["sc_phone"], $row["sc_delivery"], $row["sc_payment"], $row["sc_address"], "<button type='button' class='btn btn-warning btn-xs' id='btn_update'><i class='glyphicon glyphicon-pencil'></i>修改</button> <button type='button' class='btn btn-danger btn-xs' id='btn_delete'><i class='glyphicon glyphicon-remove'></i>刪除</button>");
                  }
                  mysqli_free_result($result); // 釋放佔用的記憶體
            }
            mysqli_close($link); // 關閉資料庫連結

            echo json_encode($a);
            exit;
      }

      if ($oper == "insert") {
            $sql = "insert into shopping_cart(sc_product,sc_product_number,sc_product_id,sc_product_no) values ('" . $_POST['sc_product'] . "','" . $_POST['sc_product_number'] . "','" . $_POST['sc_product_id'] . "','" . $_POST['sc_product_no'] ."')";
      }

      if ($oper == "update") {
            $sql = "update shopping_cart set sc_product='" . $_POST['sc_product'] . "',sc_product_number='" . $_POST['sc_product_number'] . "',sc_product_id='" . $_POST['sc_product_id'] . "',sc_product_no='" . $_POST['sc_product_no']  . "',sc_name='" . $_POST['sc_name']  . "',sc_phone='" . $_POST['sc_phone']  . "',sc_delivery='" . $_POST['sc_delivery']  . "',sc_payment='" . $_POST['sc_payment']  . "',sc_address='" . $_POST['sc_address'] . "' where sc_product_number='" . $_POST['stud_no_old'] . "'";
      }

      if ($oper == "delete") {
            $sql = "delete from shopping_cart where sc_product_number='" . $_POST['stud_no_old'] . "'";
      }

      if (strlen($sql) > 10) {
            if ($result = mysqli_query($link, $sql)) {
                  $a["code"] = 0;
                  $a["message"] = "資料" . $arr_oper[$oper] . "成功!";
            } else {
                  $a["code"] = mysqli_errno($link);
                  $a["message"] = "資料" . $arr_oper[$oper] . "失敗! <br> 錯誤訊息: " . mysqli_error($link);
            }
            mysqli_close($link); // 關閉資料庫連結

            echo json_encode($a);
            exit;
      }
?>