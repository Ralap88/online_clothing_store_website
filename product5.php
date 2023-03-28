<?php
    $link = mysqli_connect('localhost','root','root123456','group_07')or die ("無法開啟<br>");
    $idd=$_GET['product_id'];
    $num=$_GET['product_no'];

    // 送出編碼的MySQL指令
    mysqli_query($link, 'SET CHARACTER SET utf8');
    mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

    // // 資料庫查詢(送出查詢的SQL指令)
    if ($result = mysqli_query($link, "SELECT * FROM product where product_no='$num' and product_id='5'")) {
        $data = "";
        
        while ($row = mysqli_fetch_assoc($result)) {
           
                $data .="
                    <div class=''>
                    <div><img src='$row[product_path].jpg' style='float: left;' width='300' height='350'></div>
                        <div class='container'>
                            <div class='row'>
                                <div class='col-lg-9 ml-lg-auto'>
                                    <span class='font-weight-bold'><a href='man.php'>春節特賣</a></span>
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
                ";
            
        }
        mysqli_free_result($result); // 釋放佔用的記憶體
    }
    mysqli_close($link); // 關閉資料庫連結
?>

<!DOCTYPE php>
<html>

<head>
    <title>Shop</title>
    <?php include("link.php"); ?>
    <script language="javascript">
        function Sendnum() {
　           alert("訂單已送出");
        }
    </script>
</head>

<body>
    <?php include("main_header.php"); ?>
    <section id="cloth" class="section-bg wow fadeInUp">
        <div class="container">
            <header class="section-header">
                <h3>春節特賣</h3>
            </header>
            <?php echo $data;?>
        </div>
    </section><!-- #cloth -->
    <?php include("footer.php"); ?>
</body>

</html>