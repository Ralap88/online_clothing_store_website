<!DOCTYPE php>
<html>

<head>
    <title>Admin Control Home</title>
    <?php include("link.php"); ?>

    <style>
    #title{
        font-size: 15px;
        text-align: center;
    }
    body{
        color: #605050;
    }
    h{
        font-weight: bolder;
        font-size: 24px;
        text-align: center;
    }
    </style>
</head>
<body>
    <?php include("main_header.php"); ?>

    <section id=register style="background-image: url('img/signin-bg.jpg');">
        <div class="container">

            <div class="form">
                <div class="section-header">
                    <h3>管理員首頁</h3>
                </div>
                <h>控制項目</h>
                <form class="contactForm" action="" method="post" role="form" id="form1">
                    <!----account----->
                    <div class="form-group">
                        <div class="title">
                            <td class="btn"><button onclick="self.location.href='admin_control_member.php'">會員資料</button></td>
                            <td class="btn"><button onclick="self.location.href='admin_control_order.php'">訂單資料</button></td>
                            <td class="btn"><button onclick="self.location.href='admin_control_product.php'">商品資料</button></td>
                            <td class="btn"><button onclick="self.location.href='admin_control_comment.php'">留言區資料</button></td>
                        </div>
                        
                    </div>
                    
                </form>
            </div>
        </div>
    </section>
    <?php include("footer.php"); ?>
</body>
</html>