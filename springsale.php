<?php
    include("open_database.php");
    // 資料庫查詢(送出查詢的SQL指令)

    if ($result = mysqli_query($link, "SELECT * FROM product where product_id = '5' order by product_no")) {
        $data3 = "";
        
        while ($row = mysqli_fetch_assoc($result)) {
            if("$row[product_category]"=="clothing")
                $a1='col-lg-4 col-md-6 springsale-item filter-springcloth wow fadeInUp';
            else if("$row[product_category]"=="shoes")
                $a1='col-lg-4 col-md-6 springsale-item filter-springshoe wow fadeInUp';
            else
                $a1='col-lg-4 col-md-6 springsale-item filter-springaccessories wow fadeInUp';

            $data3.="
            <div class='$a1'>
                <div class='springsale-wrap'>
                    <figure><img src='$row[product_path].jpg' class='img-fluid' alt=''/>
                        <a href='$row[product_path].jpg' data-lightbox='springsale' data-title='$row[product_category]' class='link-preview' title='Preview'/><i class='ion ion-eye'></i></a>
                        <a href='product5.php?product_no=$row[product_no]' class='link-details' title='More Details'><i class='ion ion-android-open'></i></a>
                    </figure>
                    <div class='springsale-info'>
                        <h4><a href='product5.php?product_no=$row[product_no]'>$row[product_name]</a></h4>
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
        
        
<section id="springsale" class="section-bg">
    <div class="container">
        <header class="section-header">
            <h3 class="section-title">春節特賣</h3>
        </header>
        <div class="row">
            <div class="col-lg-12">
                <ul id="springsale-flters">
                    <li data-filter="*" class="filter-active">全部</li>
                    <li data-filter=".filter-springcloth">服飾</li>
                    <li data-filter=".filter-springshoe">鞋子</li>
                    <li data-filter=".filter-springaccessories">配件</li>
                </ul>
            </div>
        </div>
        <div class="row springsale-container">
            <?php echo $data3;?>
        </div>
    </div>
</section><!-- #springsale -->