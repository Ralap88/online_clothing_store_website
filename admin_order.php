<?php
      include("open_database.php");
      $arr_oper = array("insert" => "新增", "update" => "修改", "delete" => "刪除");
      $oper = $_POST['oper'];

      if ($oper == "query") {
            $sql = "select * from order";
            if ($result = mysqli_query($link, $sql)) {
                  while ($row = mysqli_fetch_assoc($result)) {
                        $a['data'][] = array($row["o_member_account"], 
                               $row["o_product"], 
                               $row["o_product_number"], 
                               $row["o_product_id"],
                               $row["o_product_no"],
                               $row["o_name"],
                               $row["o_phone"],
                               $row["o_delivery"],
                               $row["o_payment"],
                               $row["o_address"],
                               "<button type='button' class='btn btn-warning btn-xs' id='btn_update'><i class='glyphicon glyphicon-pencil'></i>修改</button> 
                               <button type='button' class='btn btn-danger btn-xs' id='btn_delete'><i class='glyphicon glyphicon-remove'></i>刪除</button>");
                  }
                  mysqli_free_result($result); // 釋放佔用的記憶體
            }
            mysqli_close($link); // 關閉資料庫連結

            echo json_encode($a);
            exit;
      }

      if ($oper == "insert") 
      {
            $sql = "insert into order(o_member_account,o_product,o_product_number,o_product_id,o_product_no,o_name,o_phone,o_delivery,o_payment,o_address)
                    values ('" . $_POST['o_member_account'] . "',
                            '" . $_POST['o_product'] . "',
                            '" . $_POST['o_product_number'] . "',
                            '" . $_POST['o_product_id'] . "',
                            '" . $_POST['o_product_no'] . "',
                            '" . $_POST['o_name'] . "',
                            '" . $_POST['o_phone'] . "',
                            '" . $_POST['o_delivery'] . "',
                            '" . $_POST['o_payment'] . "',
                            '" . $_POST['o_address'] . "'
                      )";
      }

      if ($oper == "update") {
            $sql = "update order set o_member_account = '" . $_POST['o_member_account'] . "',
                    o_product = '" . $_POST['o_product'] . "',
                    o_product_number = '" . $_POST['o_product_number'] . "',
                    o_product_id = '" . $_POST['o_product_id'] . "',
                    o_product_no = '" . $_POST['o_product_no'] . "',
                    o_name = '" . $_POST['o_name'] . "',
                    o_phone = '" . $_POST['o_phone'] . "',
                    o_delivery = '" . $_POST['o_delivery'] . "',
                    o_payment = '" . $_POST['o_payment'] . "',
                    o_address = '" . $_POST['o_address'] . "'
                    where o_member_account = '" . $_POST['o_member_account_old'] . "'";
      }

      if ($oper == "delete") {
            $sql = "delete from order where o_member_account ='" . $_POST['o_member_account_old'] . "'";
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