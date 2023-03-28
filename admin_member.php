<?php
include("open_database.php");

$arr_oper = array("insert" => "新增", "update" => "修改", "delete" => "刪除");
$oper = $_POST['oper'];

if ($oper == "query") {
      $sql = "select * from member_profile";
      if ($result = mysqli_query($link, $sql)) {
            while ($row = mysqli_fetch_assoc($result)) {
                  $a['data'][] = array($row["mp_name"],
                         $row["mp_gender"],
                         $row["mp_contact"],
                         $row["mp_email"],
                         $row["mp_address"],
                         $row["mp_account"],
                         $row["mp_password"],
                         $row["mp_ans_to_Q1"],
                         $row["mp_ans_to_Q2"],
                         $row["mp_ans_to_Q3"],
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
      $sql = "insert into member_profile(mp_name,mp_gender,mp_contact,mp_email,mp_address,mp_account,mp_password,
              mp_ans_to_Q1,mp_ans_to_Q2,mp_ans_to_Q3) 
              values ('" . $_POST['mp_name'] . "',
                      '" . $_POST['mp_gender'] . "',
                      '" . $_POST['mp_contact'] . "',
                      '" . $_POST['mp_email'] . "',
                      '" . $_POST['mp_address'] . "',
                      '" . $_POST['mp_account'] . "',
                      '" . $_POST['mp_password'] . "',
                      '" . $_POST['mp_ans_to_Q1'] . "',
                      '" . $_POST['mp_ans_to_Q2'] . "',
                      '" . $_POST['mp_ans_to_Q3'] . "'
                )";
}

if ($oper == "update") {
      $sql = "update member_profile set mp_name = '" . $_POST['mp_name'] . "',
              mp_gender = '" . $_POST['mp_gender'] . "',
              mp_contact = '" . $_POST['mp_contact'] . "',
              mp_email = '" . $_POST['mp_email'] . "',
              mp_address = '" . $_POST['mp_address'] . "',
              mp_account = '" . $_POST['mp_account'] . "',
              mp_password = '" . $_POST['mp_password'] . "',
              mp_ans_to_Q1 = '" . $_POST['mp_ans_to_Q1'] . "',
              mp_ans_to_Q2 = '" . $_POST['mp_ans_to_Q2'] . "',
              mp_ans_to_Q3 = '" . $_POST['mp_ans_to_Q3'] . "' where mp_account ='" . $_POST['mp_account_old'] . "'";
}

if ($oper == "delete") {
      $sql = "delete from member_profile where mp_account ='" . $_POST['mp_account_old'] . "'";
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