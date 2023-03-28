<?php
    include("open_database.php");
    $num=$_GET['product_number'];

    // 資料庫查詢(送出查詢的SQL指令)
    if ($result = mysqli_query($link, "SELECT * FROM product where product_number='$num' ")) {
        
        while ($row = mysqli_fetch_assoc($result)) {
                if($row['product_id']=='1') $title="男裝";
                else  if($row['product_id']=='2') $title="女裝";
                else  if($row['product_id']=='3') $title='夏日來臨';
                else  if($row['product_id']=='4') $title='冬日出清';
                else  if($row['product_id']=='5') $title='春節特賣';
                $data .="
                    <div class=''>
                        <div><img src='$row[product_path].jpg' style='float: left;' width='300' height='350'></div>
                            <div class='container'>
                                <div class='row'>
                                    <div class='col-lg-9 ml-lg-auto'>
                                        <span class='font-weight-bold'><a href='man.php'>$title</a></span>
                                        <h2>$row[product_name]</h2>
                                        <p>$row[product_introduction]<p>
                                        <div class='col text-center'>
                                            <p></p>
                                            <div class='row'>
                                                <label for=''>數量 </label>
                                                <input type='button' value='-' class='qtyminus' field='quantity' />
                                                <input type='text' name='quantity' value='0' class='qty' />
                                                <input type='button' value='+' class='qtyplus' field='quantity' />
                                            </div>
                                            <p></p>
                                            <button type='button' class='btn btn-danger text-center' onclick='Sendnum()'>訂購</button>
                                        </div>
                                        <h2>NT.$row[product_price]</h2>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                ";
            
        }
        mysqli_free_result($result); // 釋放佔用的記憶體
    }
    mysqli_close($link); // 關閉資料庫連結
?>

<!DOCTYPE html>
<html>

<head>
    <title>Shop</title>
    <?php include("link.php"); ?>
    <script language="javascript">
        function Sendnum() {
　           alert("訂單已送出");
            <?php 
                $link = mysqli_connect('localhost','root','root123456','group_07')or die ("無法開啟<br>");

                // 送出編碼的MySQL指令
                mysqli_query($link, 'SET CHARACTER SET utf8');
                mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

                $sql = "insert into shopping_cart(sc_product,sc_product_number,sc_product_id,sc_product_no) values ('" . $name . "','" . $quantity . "','" . $idd . "','" . $num ."')";

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
        }
    </script>
</head>

<body>
    <?php include("main_header.php"); ?>
    <section id="cloth" class="section-bg wow fadeInUp">
        <div class="container">
            <header class="section-header">
                <h3><?php echo $title;?></h3>
            </header>
            <?php echo $data;?>
        </div>
    </section><!-- #cloth -->
    <?php include("footer.php"); ?>
</body>

</html>