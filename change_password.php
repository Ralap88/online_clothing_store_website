<?php 
   include("open_database.php");

    $sql = "select * from member_profile";

    if(isset($_POST['account']) && isset($_POST['pwd']))
    {
        if ($result = mysqli_query($link, $sql))
        {
            $flag_account = 'true';
            $flag_password = 'true';
            while ($row = mysqli_fetch_assoc($result)) 
            {
                if(($_POST['account'] == $row['mp_account']) && ($_POST['pwd'] == $row['mp_password']))
                {
                    //jump to changing page
                    header("Location:change_password2.php");
                    exit;//確保重定向後，後續程式碼不會被執行
                }
                else if($_POST['account'] == $row['mp_account'])
                    $flag_account = 'false';
                else if($_POST['pwd'] == $row['mp_password'])
                    $flag_password = 'false';
            }
            if($flag_account == 'true')
                echo "<script>alert('帳號不存在，請輸入正確的帳號，謝謝!')</script>";
            else if($flag_password == 'true')
                echo "<script>alert('密碼錯誤，請輸入正確的密碼，謝謝!')</script>";
            mysqli_free_result($result); // 釋放佔用的記憶體
        }  
    }
    mysqli_close($link); // 關閉資料庫連結
?>

<!DOCTYPE php>
<html>

<head>
    <title>Change Password</title>
    <?php include("link.php"); ?>
    <?php include("jquery.php"); ?>
    <script>
        $(document).ready(function($) {
            //for select
            $.validator.addMethod("notEqualsto", function(value, element, arg) {
                return arg != value;
        }, "您尚未選擇!");

        $("#form1").validate({
        submitHandler: function(form) {
            form.submit();
        },
        rules: {
            account: {
                required: true,
                minlength: 5,
                maxlength: 20
            },
            pwd: {
                required: true,
                minlength: 6,
                maxlength: 20
            },
            pwd2: {
                required: true,
                equalTo: "#pwd"
            },
        },
        messages: {
            account: {
                required: "(必填欄位!)",
                minlength: "最少要5個字",
                maxlength: "最長20個字"
            },
            pwd: {
                required: "(必填欄位!)",
                minlength: "最少要6個字",
                maxlength: "最長20個字"
            },
            pwd2: {
                equalTo: "兩次密碼不相符"
            }
        }
    });
});
</script>
    <style type="text/css">
        .error {
            color: white;
            font-weight: normal;
            font-family: "微軟正黑體";
            display: inline;
            padding: 1px;
    }
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

<body>
    <!--==========================Header============================-->
    <?php include("main_header.php"); ?>

    <section id=register style="background-image: url('img/signin-bg.jpg');">
        <div class="container">

            <div class="form">
                <div class="section-header">
                    <h3>會員修改密碼</h3>
                </div>
                <h>確認身分</h>
                <form class="contactForm" action="" method="post" role="form" id="form1">
                    <!----account----->
                    <div class="form-group">
                        <div class="title"><label class="col-sm-4 control-label" for="account">
                            <b>帳號</b></label></div>
                        <div class="form-row">
                            <input type="text" class="form-control col-sm-4" id="account" name="account" placeholder="3~20字"required></div>
                    </div>
                    <!----password----->
                    <div class="form-group">
                        <div class="title"><label class="col-sm-4 control-label" for="pwd">
                            <b>密碼</label></div>     
                        <div class="form-row">
                            <input type="password" class="form-control col-sm-4" name="pwd" id="pwd" placeholder="6~20字"required> 
                        </div>
                    </div>
                    <!----confirm password----->
                    <div class="form-group">
                        <div class="title"><label class="col-sm-4 control-label" for="pwd2">
                            <b>確認密碼
                            </label></div>
                        <div class="form-row">
                            <input type="password" class="form-control col-sm-4" name="pwd2" id="pwd2" required>
                        </div>
                    </div>
                    <div class="form-col text-center">
                        <td class="btn"><button type="submit">確認</button></td>
                        <td class="btn"><button onclick="self.location.href='index.php#intro'">取消</button></td>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <?php include("footer.php"); ?>
</body>
</html>