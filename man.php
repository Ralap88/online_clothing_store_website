<?php
    $link = mysqli_connect('localhost','root','root123456','group_07')or die ("無法開啟<br>");

    // 送出編碼的MySQL指令
    mysqli_query($link, 'SET CHARACTER SET utf8');
    mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

    // // 資料庫查詢(送出查詢的SQL指令)

    if ($result = mysqli_query($link, "SELECT * FROM product where product_id = '1' order by product_no")) {
        $data = "";

        while ($row = mysqli_fetch_assoc($result)) {
            if("$row[product_category]"=="clothing")
                $a1='col-lg-4 col-md-6 mans-item filter-clothing wow fadeInUp';
            else if("$row[product_category]"=="shoes")
                $a1='col-lg-4 col-md-6 mans-item filter-shoes wow fadeInUp';
            else
                $a1='col-lg-4 col-md-6 mans-item filter-accessory wow fadeInUp';
            
            $data.="
                <div class='$a1'>
                    <div class='mans-wrap'>
                        <figure><img src='$row[product_path].jpg' class='img-fluid' alt=''/>
                            <a href='$row[product_path].jpg' data-lightbox='mans' data-title='$row[product_category]' class='link-preview' title='Preview'/><i class='ion ion-eye'></i></a>
                            <a href='product1.php?product_no=$row[product_no]' class='link-details' title='More Details'><i class='ion ion-android-open'></i></a>
                        </figure>
                        <div class='mans-info'>
                            <h4><a href='product1.php?product_no=$row[product_no]'>$row[product_name]</a></h4>
                            <p>NT.$row[product_price]</p>
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
    <title>Shop man's</title>
    <?php include("link.php"); ?>
</head>

<body>
    <?php include("main_header.php"); ?>
    <section id="mans" class="section-bg">
        <div class="container">
            <header class="section-header">
                <h3 class="section-title">男裝</h3>
            </header>
            <div class="row">
                <div class="col-lg-12">
                    <ul id="mans-flters">
                        <li data-filter="*" class="filter-active">全部</li>
                        <li data-filter=".filter-clothing">服飾</li>
                        <li data-filter=".filter-shoes">鞋子</li>
                        <li data-filter=".filter-accessory">配件</li>
                    </ul>
                </div>
            </div>
            <div class="row mans-container">
                <?php echo $data;?>
            </div>
        </div>
    </section><!-- #man's -->
    <?php include("footer.php"); ?>
</body>
</html>