<?php
include("open_database.php");

$arr_oper = array("insert" => "新增", "update" => "修改", "delete" => "刪除");
$oper = $_POST['oper'];

if ($oper == "query") {
      $sql = "select * from comment";
      if ($result = mysqli_query($link, $sql)) {
            while ($row = mysqli_fetch_assoc($result)) {
                  $a['data'][] = array($row["comment_name"], 
                         $row["comment_detail"],
                         "<button type='button' class='btn btn-warning btn-xs' id='btn_update'><i class='glyphicon glyphicon-pencil'></i>修改</button> 
                         <button type='button' class='btn btn-danger btn-xs' id='btn_delete'><i class='glyphicon glyphicon-remove'></i>刪除</button>");
            }
            mysqli_free_result($result); // 釋放佔用的記憶體
      }
      mysqli_close($link); // 關閉資料庫連結

      echo json_encode($a);
      exit;
}

if ($oper == "insert") {
      $sql = "insert into comment(comment_name,comment_detail) 
              values ('" . $_POST['comment_name'] . "',
                      '" . $_POST['comment_detail'] . "'                      
                )";
}

if ($oper == "update") {
      $sql = "update comment set comment_name ='" . $_POST['comment_name'] . "',comment_detail = '" . $_POST['comment_detail'] . "' where comment_name ='" . $_POST['comment_name_old'] . "'";
}

if ($oper == "delete") {
      $sql = "delete from comment where comment_name ='" . $_POST['comment_name_old'] . "'";
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