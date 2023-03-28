<?php
    if (isset($_COOKIE["account"]))
      $user = $_COOKIE["account"];
?>
<!DOCTYPE php>
<html>

<head>
    <title>Message board</title>
    <?php include("link.php"); ?>
</head>
<body>
    <?php include("main_header.php"); ?>
    <section id="cloth"  class="section-bg wow fadeInUp">
        <div class="container">
            <header class="section-header">
                <h3 class="section-title">討論區</h3>
            </header>
                <div  style="text-align:center;">
                    <?php
                        $link = mysqli_connect('localhost','root','root123456','group_07')or die ("無法開啟<br>");

                        // 送出編碼的MySQL指令
                        mysqli_query($link, 'SET CHARACTER SET utf8');
                        mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

                        //資料庫新增存檔
                        if (isset($_POST['user_name']) && isset($_POST['message']))
                        {
                            $result = mysqli_query($link, "SELECT * FROM comment ");
                            $total_records=mysqli_num_rows($result)+1;
                            $sql = "insert into comment values ('" . $_POST['user_name']. "','" . $_POST['message'] . "')";

                            if ($result = mysqli_query($link, $sql)) // 送出查詢的SQL指令
                            {
                                $msg = "<span style='color:#0000FF'>資料新增成功!</span>";
                            }
                            else {
                                $msg = "<span style='color:#FF0000'>資料新增失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" . mysqli_error($link) . "</span>";
                            }

                        }

                        if ( $result = mysqli_query($link, "SELECT * FROM comment") ) { 
                            echo "<h4>共". mysqli_num_rows($result) . "則回應</h4>";

                            $total_records=mysqli_num_rows($result); //總筆數
                            $total_page= ceil($total_records / 10) ; //計算頁數

                            if (!isset($_GET["page"])){ //假如$_GET["page"]未設置
                                $page=1; //則在此設定起始頁數
                            } else {
                                $page = intval($_GET["page"]);//確認頁數只能夠是數值資料
                            }
                            mysqli_data_seek($result, ($page-1)*10); //指標移至該頁第一筆記錄
                            echo "<table align='center'>";
                            for($j=1;$j<$total_records;$j++){
                                $row = mysqli_fetch_assoc($result);
                                echo "<tr align='center'>";
                                echo "<td><h4>$row[comment_name]</h4> </td><td></td><td><h5>&nbsp;&nbsp $row[comment_detail]</h5></td>";
                                echo "</tr>";   
                            }
                        }
                        //顯示頁碼超連結
                        echo "<tr align='center'><td colspan='3'>";

                        for($i=1;$i<=$total_page;$i++) 
                        {
                            if (!isset($_GET["page"])){ //假如$_GET["page"]未設置
                                $page=1; //則在此設定起始頁數
                            } else {
                                $page = intval($_GET["page"]);//確認頁數只能夠是數值資料
                            }
                            if ($i==$page) echo "$i&nbsp;&nbsp;" ;
                            else echo "<a href='".$_SERVER['PHP_SELF'] ."?page=$i'> $i </a>&nbsp;&nbsp;"; 
                        }

                        echo "</td></tr>";
                        echo "</table>";   
                        
                        mysqli_free_result($result); // 釋放佔用的記憶體
                        
                        mysqli_close($link); // 關閉資料庫連結  
                    ?>
                </div>
                  <?php
                        if (isset($user)) {
                            $a1="";
                        } else {
                            $a1="signin.php";
                        }
                   ?>

                <div style="text-align:center;" >
                    <h4>你的回應</h4>
                    <form name="MyForm1" action="<?php echo $a1?>" method="POST"  >
                        <div class="reply">
                            <input type="text" placeholder="姓名" name="user_name" >
                        </div>
                        <p></p>
                        <div class="reply">
                            <textarea placeholder="訊息" name="message" ></textarea>
                        </div>
                        <div class="reply">
                            <button type="submit" align="center" class="btn-get-started" >傳送</button>
                        </div>
                    </form>
                </div>  
        </div>
    </section>
    <?php include("footer.php"); ?>
</body>
</html>