<?php

    if (isset($_COOKIE["account"])){
      $user = $_COOKIE["account"];
    }
    else{
        header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . "/group_07/signin.php");
        exit;
    }
?>
<!DOCTYPE html>
<php>

	<head>
		<title>Cart</title>
		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<meta content="" name="keywords">
		<meta content="" name="description">
		<!-- Favicons -->
		<link href="img/favicon.ico" rel="icon">
		<link href="img/apple-touch-icon.ico" rel="apple-touch-icon">
		<!-- Google Fonts -->
		<link href="css/css.css" rel="stylesheet">
		<!-- Bootstrap CSS File -->
		<link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<!-- Libraries CSS Files -->
		<link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="lib/animate/animate.min.css" rel="stylesheet">
		<link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
		<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
		<link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
		<!-- Main Stylesheet File -->
		<link href="css/style.css" rel="stylesheet">
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="//cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" rel="stylesheet">

        <script src="//code.jquery.com/jquery-3.3.1.js"></script>
        <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="//cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
        <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
        <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_zh_TW.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

        <script src="data.js"></script>
        <style>
            body {
                font-family: "微軟正黑體";
            }

            .error {
                color: #D82424;
                font-weight: normal;
                display: inline;
                padding: 1px;
            }
        </style>
    </head>

    <body>


    <?php include("main_header.php"); ?>
    <!--==========================
                Cart
    ============================-->
    <section id="cart" class="section-bg">
    	<div class="container">
    		<header class="section-header">
    			<h3>購物車</h3>
    		</header>
    		<div class="row">
                <div class="col-md-6 text-center">
                    <form class="form-horizontal form-inline" name="form1" id="form1" method="post">
                        付款方式（1.貨到付款 2.信用卡）
                        送貨方式（1.宅配 2.超商取貨）
                        <input type="hidden" name="oper" id="oper" value="insert">
                        <input type="hidden" name="stud_no_old" id="stud_no_old" value="">
                        <table id="edit" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                     <th class="text-center">姓名</th>
                                     <th class="text-center">產品</th>
                                     <th class="text-center">品名</th>
                                     <th class="text-center">類別</th>
                                     <th class="text-center">品項</th>
                                     <th class="text-center">姓名</th>
                                     <th class="text-center">電話</th>
                                     <th class="text-center">送貨</th>
                                     <th class="text-center">付款</th>
                                     <th class="text-center">地址</th>
                                     <th class="text-center">修改</th>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <input type="text" id="sc_member_account" name="sc_member_account" style="width:50px">
                                    </td>
                                    <td class="text-center">
                                        <input type="text" id="sc_product" name="sc_product"style="width:50px">
                                    </td>
                                    <td class="text-center">
                                        <input type="text" id="sc_product_number" name="sc_product_number" style="width:50px">
                                    </td>
                                    <td class="text-center">
                                        <input type="text" id="sc_product_id" name="sc_product_id" style="width:50px">
                                    </td>
                                    <td class="text-center">
                                        <input type="text" id="sc_product_no" name="sc_product_no" style="width:50px">
                                    </td>
                                    <td class="text-center">
                                        <input type="text" id="sc_name" name="sc_name" style="width:100px">
                                    </td>
                                    <td class="text-center">
                                        <input type="text" id="sc_phone" name="sc_phone" style="width:100px">
                                    </td>
                                    <td class="text-center">
                                        <input type="text" id="sc_delivery" name="sc_delivery" style="width:50px">
                                    </td>
                                    <td class="text-center">
                                        <input type="text" id="sc_payment" name="sc_payment" style="width:50px">
                                    </td>
                                    <td class="text-center">
                                        <input type="text" id="sc_address" name="sc_address" style="width:200px">
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-primary btn-xs" id="btn-save">存檔</button>
                                        <button type="reset" class="btn btn-danger btn-xs" id="btn-cancel">取消</button>
                                    </td>
                                </tr>
                            </thead>
                            <button type='submit' class='btn btn-warning btn-xs' id='btn-order' onclick="self.location.href='order.php'">送出訂單</button>
                        </table>
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                             <th class="text-center">姓名</th>
                             <th class="text-center">產品</th>
                             <th class="text-center">品名</th>
                             <th class="text-center">類別</th>
                             <th class="text-center">品項</th>
                             <th class="text-center">姓名</th>
                             <th class="text-center">電話</th>
                             <th class="text-center">送貨方式</th>
                             <th class="text-center">付款方式</th>
                             <th class="text-center">地址</th>
                             <th class="text-center">修改/刪除</th>
                         </tr>
                     </thead>
                 </table>
                 
             </div>
             <div class="col-md-2"></div>
         </div>

    </section>

     <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 footer-info">
                        <h3>Shop</h3>
                        <p>在這裡，有我們的用心</p>
                        <p>在這裡，你能找到自己的美</p>
                        <p>在這裡，你能實現你的夢</p>
                    </div>
                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>相關連結</h4>
                        <ul>
                            <li><i class="ion-ios-arrow-right"></i> <a href="#intro">主頁</a></li>
                            <li><i class="ion-ios-arrow-right"></i> <a href="#about">關於我們</a></li>
                            <li><i class="ion-ios-arrow-right"></i> <a href="#">隱私條例</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 footer-contact">
                    <h4>聯絡我們</h4>
                        <p>
                            彰化縣 <br>
                            彰化市，進德路1號<br>
                            台灣 <br>
                            <strong>電話:</strong> +886 04 723 2105<br>
                            <strong>Email:</strong> services@cc2.ncue.edu.tw<br>
                        </p>
                        <div class="social-links">
                            <a href="https://www.facebook.com/groups/101190690086697/" class="facebook"><i class="fa fa-facebook"></i></a>
                            <a href="https://www.ncue.edu.tw" class="linkedin"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 footer-newsletter">
                        <h4>電子報</h4>
                        <p>訂閱我們，不錯過任何最新訊息!</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </footer><!-- #footer -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <!-- JavaScript Libraries -->
    <!-- <script src="lib/jquery/jquery.min.js"></script> -->
    <script src="lib/jquery/jquery-migrate.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/superfish/hoverIntent.js"></script>
    <script src="lib/superfish/superfish.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/touchSwipe/jquery.touchSwipe.min.js"></script> 
    <!-- Contact Form JavaScript File -->
    <script src="contactform/contactform.js"></script>
    <!-- Template Main Javascript File -->
    <script src="js/main.js"></script>
    </body>

</html>