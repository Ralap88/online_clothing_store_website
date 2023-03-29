<?php
    if (isset($_COOKIE["account"]))
    $user = $_COOKIE["account"];
?>
    <header id="header">
        <div class="container-fluid">
            <div id="logo" class="pull-left">
                <h1><a href="index.php" class="scrollto">Shop</a></h1>
            </div>
            <div class="c1">
                <form name="forml" method="post" action="search.php">
                    <input class='in' type="text" id="search_pd" name="search_pd"  placeholder="請輸入關鍵字" value="<?php echo"$_POST[search_pd]"?>">
                    <input class='btn-get-started' type='submit' value="查詢">
                </form>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li><a href="index.php">主頁</a></li>
                    <li><a href="index.php#about">關於我們</a></li>
                    <li><a href="cart1.php">購物車</a></li>
                    <li><a href="man.php">男裝</a></li>
                    <li><a href="woman.php">女裝</a></li>
                    <li class="menu-has-children"><a href="index.php">限時特價</a>
                        <ul>
                            <li><a href="index.php#summersale">夏日來臨</a></li>
                            <li><a href="index.php#wintersale">冬日出清</a></li>
                            <li><a href="index.php#springsale">春節特賣</a></li>
                        </ul>
                    </li>
                    <li><a href="index.php#contact">聯絡我們</a></li>
                    <li><a href="message.php">討論區</a></li>
                    <?php
                        if (isset($user)) {
                                include("open_database.php");

                                $sql = "SELECT * FROM admin where admin_account='$user'"; // 指定SQL查詢字串

                                // 送出編碼的MySQL指令
                                mysqli_query($link, 'SET CHARACTER SET utf8');
                                mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

                                // 送出查詢的SQL指令
                                if ($result = mysqli_query($link, $sql)) {
                                   if ($row = mysqli_fetch_assoc($result)) {
                                    echo '<li role="presentation"><a href="admin_control_home.php">管理</a></li>
                                            <li role="presentation"><a href="logout.php">管理員'.$user.'登出</a></li>';
                                   }
                                   else {
                                    echo '<li role="presentation"><a href="logout.php">會員'.$user.'登出</a></li>';
                                   }
                                   mysqli_free_result($result); // 釋放佔用的記憶體
                                }

                                mysqli_close($link); // 關閉資料庫連結
                        } 
                        else {
                            echo '<li role="presentation"><a href="signin.php">登錄</a></li>';
                        }
                   ?>
                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </header><!-- #header -->