<?php
    include("open_database.php");
    // 資料庫查詢(送出查詢的SQL指令)
    $product_keyword = $_POST['search_pd'];//固定以term傳送查詢條件
    if ($result = mysqli_query($link, "SELECT * FROM product where product_name like '%$product_keyword%'")) {
        $flag='0';
        if($product_keyword==""){
            $flag='1';
            $total_records=mysqli_num_rows($result);
            $total_page=ceil($total_records/9);
            mysqli_data_seek($result,($_GET['page']-1)*9);
            for($j=1;$j<=9;$j++){
                if($row = mysqli_fetch_assoc($result)){
                    $data2.="
                    <div class='col-lg-4 col-md-6 mans-item filter-accessory wow fadeInUp'>
                        <div class='mans-wrap'>
                            <figure><img src='$row[product_path].jpg' class='img-fluid' alt=''/>
                                <a href='$row[product_path].jpg' data-lightbox='mans' data-title='$row[product_category]' class='link-preview' title='Preview'/><i class='ion ion-eye'></i></a>
                                <a href='product.php?product_number=$row[product_number]' class='link-details' title='More Details'><i class='ion ion-android-open'></i></a>
                            </figure>
                            <div class='mans-info'>
                                <h4><a href='product.php?product_number=$row[product_number]'>$row[product_name]</a></h4>
                                <p>NT.$row[product_price]</p>
                            </div>
                        </div>
                    </div>
                    ";
                }
            }
            mysqli_free_result($result); // 釋放佔用的記憶體
            $data .="<tr align='center'><td colspan='3'>";
            for($i=1;$i<=$total_page;$i++){
                if($i==$_GET['page']){
                    $data.="$i&nbsp;&nbsp;";
                }
                else{
                    $data.="<a href='".$_SERVER['PHP_SELF']."?page=$i' >$i</a>&nbsp;&nbsp;";
                }
            }
        }
        else{
            $data2 = "";
            while ($row = mysqli_fetch_assoc($result)) {

                $flag='1';
                $data2.="
                <div class='col-lg-4 col-md-6 mans-item filter-accessory wow fadeInUp'>
                    <div class='mans-wrap'>
                        <figure><img src='$row[product_path].jpg' class='img-fluid' alt=''/>
                            <a href='$row[product_path].jpg' data-lightbox='mans' data-title='$row[product_category]' class='link-preview' title='Preview'/><i class='ion ion-eye'></i></a>
                            <a href='product.php?product_number=$row[product_number]' class='link-details' title='More Details'><i class='ion ion-android-open'></i></a>
                        </figure>
                        <div class='mans-info'>
                            <h4><a href='product.php?product_number=$row[product_number]'>$row[product_name]</a></h4>
                            <p>NT.$row[product_price]</p>
                        </div>
                    </div>
                </div>
                ";
            }
            mysqli_free_result($result); // 釋放佔用的記憶體
        }
    }
    mysqli_close($link); // 關閉資料庫連結
?>



<!DOCTYPE php>
<html>

<head>
    <title>Search</title>
    <?php include("link.php"); ?>
    
</head>

<body>
    <?php include("header.php"); ?>
    <!--==========================search ============================-->
    <section id="mans" class="section-bg">
        <div class="container">
            <header class="section-header">
                <h3 class="section-title">搜尋結果</h3>
            </header>
            <div class="row mans-container" >
                <?php echo $data2;?> 
            </div>
            <div align="center">
                <?php
                if($flag!='1')
                    echo"<h4>查無此結果</h4>";
                ?>
            </div>
            <div align="center">
                <?php echo $data;?>
            </div>
        </div>
    </section><!-- #man's -->
    <?php include("footer.php"); ?>
</body>

</html>