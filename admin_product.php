<?php
include("open_database.php");
$arr_oper = array("insert" => "新增", "update" => "修改", "delete" => "刪除");
$oper = $_POST['oper'];

if ($oper == "query") {
      $sql = "select * from product";
      if ($result = mysqli_query($link, $sql)) {
            while ($row = mysqli_fetch_assoc($result)) {
                  $a['data'][] = array($row["product_number"],
                         $row["product_id"],
                         $row["product_category"],
                         $row["product_no"],
                         $row["product_name"],
                         $row["product_price"],
                         $row["product_introduction"],
                         $row["product_path"],
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
      $sql = "insert into member_profile(product_number,product_id,product_category,product_no,product_name,product_price,product_introduction,product_path) 
              values ('" . $_POST['product_number'] . "',
                      '" . $_POST['product_id'] . "',
                      '" . $_POST['product_category'] . "',
                      '" . $_POST['product_no'] . "',
                      '" . $_POST['product_name'] . "',
                      '" . $_POST['product_price'] . "',
                      '" . $_POST['product_introduction'] . "',
                      '" . $_POST['product_path'] . "'
                )";
}

if ($oper == "update") {
      $sql = "update member_profile set product_number = '" . $_POST['product_number'] . "',
              product_id = '" . $_POST['product_id'] . "',
              product_category = '" . $_POST['product_category'] . "',
              product_no = '" . $_POST['product_no'] . "',
              product_name = '" . $_POST['product_name'] . "',
              product_price = '" . $_POST['product_price'] . "',
              product_introduction = '" . $_POST['product_introduction'] . "',
              product_path = '" . $_POST['product_path'] . "'where product_number ='" . $_POST['product_number_old'] . "'";
}

if ($oper == "delete") {
      $sql = "delete from member_profile where product_number ='" . $_POST['product_number_old'] . "'";
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