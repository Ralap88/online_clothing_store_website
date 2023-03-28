<?php
    include("open_database.php");
    // 資料庫查詢(送出查詢的SQL指令)
    if ($result = mysqli_query($link, "SELECT * FROM product where product_id = '4' order by product_no")) {
        $data2 = "";
        while ($row = mysqli_fetch_assoc($result)) {
            if("$row[product_category]"=="clothing")
                $a1='col-lg-4 col-md-6 wintersale-item filter-wintercloth wow fadeInUp';
            else if("$row[product_category]"=="shoes")
                $a1='col-lg-4 col-md-6 wintersale-item filter-wintershoe wow fadeInUp';
            else
                $a1='col-lg-4 col-md-6 wintersale-item filter-winteraccessories wow fadeInUp';
            
            $data2.="
            <div class='$a1'>
                <div class='wintersale-wrap'>
                    <figure><img src='$row[product_path].jpg' class='img-fluid' alt=''/>
                        <a href='$row[product_path].jpg' data-lightbox='wintersale' data-title='$row[product_category]' class='link-preview' title='Preview'/><i class='ion ion-eye'></i></a>
                        <a href='product4.php?product_no=$row[product_no]' class='link-details' title='More Details'><i class='ion ion-android-open'></i></a>
                    </figure>
                    <div class='wintersale-info'>
                        <h4><a href='product4.php?product_no=$row[product_no]'>$row[product_name]</a></h4>
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
<section id="wintersale" class="section-bg">
    <div class="container">
        <header class="section-header">
            <h3 class="section-title">冬日出清</h3>
        </header>
        <div class="row">
            <div class="col-lg-12">
                <ul id="wintersale-flters">
                    <li data-filter="*" class="filter-active">全部</li>
                    <li data-filter=".filter-wintercloth">服飾</li>
                    <li data-filter=".filter-wintershoe">鞋子</li>
                    <li data-filter=".filter-winteraccessories">配件</li>
                </ul>
            </div>
        </div>
        <div class="row wintersale-container">
            <?php echo $data2;?>
        </div>
    </div>
</section><!-- #wintersales -->

