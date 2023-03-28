<?php
include("open_database.php");

// 送出查詢的SQL指令
$term = trim(strip_tags($_GET['term']));//固定以term傳送查詢條件
$sql = "SELECT * FROM product where product_name like '%$term%'" ;
if ( $result = mysqli_query($link, $sql) ) {
  while( $row = mysqli_fetch_assoc($result) ){
    $name[]=$row["product_name"]; //將資料存入陣列
  }
  mysqli_free_result($result); // 釋放佔用的記憶體
}
mysqli_close($link); // 關閉資料庫連結
echo json_encode($name); //回傳JSON格式資料

?>