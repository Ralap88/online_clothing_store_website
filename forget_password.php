<?php 
    include("open_database.php");

    $sql = "select * from member_profile";

    if(isset($_POST['account']) && isset($_POST['q1']) && isset($_POST['q2']) && isset($_POST['q3']))
    {   
        if ($result = mysqli_query($link, $sql))
        {
            $flag_account = 'true';
            $qq1 = 'true';
            $qq2 = 'true';
            $qq3 = 'true';
            while ($row = mysqli_fetch_assoc($result)) 
            {
                if(($_POST['account'] == $row["mp_account"]) && ($_POST['q1'] == $row["mp_ans_to_Q1"]) && ($_POST['q2'] == $row["mp_ans_to_Q2"]) && ($_POST['q3'] == $row["mp_ans_to_Q3"]))
                {
                    $flag_account = 'false';
                    $qq1 = 'false';
                    $qq2 = 'false';
                    $qq3 = 'false';
                    $answer = "你的密碼是 : '" . $row['mp_password'] . "'";
                }
                if($_POST['account'] == $row["mp_account"])
                    $flag_account = 'false';
                if($_POST['q1'] == $row["mp_ans_to_Q1"])
                    $qq1 = 'false';
                if($_POST['q2'] == $row["mp_ans_to_Q2"])
                    $qq2 = 'false';
                if($_POST['q3'] == $row["mp_ans_to_Q3"])
                    $qq3 = 'false';
            }
            if($qq1 == 'true')
                $msg1 = "第一題回答錯誤，請輸入正確的答案，謝謝!";
            if($qq2 == 'true')
                $msg2 = "第二題回答錯誤，請輸入正確的答案，謝謝!";
            if($qq3 == 'true')
                $msg3 = "第三題回答錯誤，請輸入正確的答案，謝謝!";
            if($flag_account == 'true'){
                $msg1 = "";
                $msg2 = "";
                $msg3 = "";
                echo "<script>alert('帳號不存在，請輸入正確的帳號，謝謝!')</script>";
            }
            
        }  
    }
    if ($result = mysqli_query($link, $sql)) // 送出查詢的SQL指令
    {
        $msg = "<span style='color:#0000FF'>資料更改成功!</span>";
    } else {
        $msg = "<span style='color:#FF0000'>資料更改失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" . mysqli_error($link) . "</span>";
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
    <?php include("main_header.php"); ?>

    <section id=register style="background-image: url('img/signin-bg.jpg');">
        <div class="container">

            <div class="form">
                <div class="section-header">
                    <h3>會員忘記密碼</h3>
                </div>
                <h>確認身分</h>
                <form class="contactForm" action="" method="post" role="form" id="form1">
                    <!----account----->
                    <div class="form-group">
                        <div class="title"><label class="col-sm-4 control-label" for="account">
                            <b>帳號</b></label></div>
                        <div class="form-row">
                            <input type="text" class="form-control col-sm-4" id="account" name="account" placeholder="3~20字"required value ="<?php if(isset($flag_account) && isset($_POST['account'])) echo $_POST['account']; ?>"></div>
                    </div>
                    <!----question 1----->
                    <br><h>註冊會員時填寫的問題，請回答 :</h>
                    <div class="form-group">
                        <div class="title"><label class="col-sm-4 control-label" for="q1">
                            <b>問題1 : 出生的城市?
                            </label></div>
                        <div class="form-row">
                            <input type="text" class="form-control col-sm-4" id="q1" name="q1" placeholder="2~15字"required value ="<?php if(!isset($msg1) && isset($_POST['q1'])) echo $_POST['q1']; ?>">
                            <?php if(isset($msg1)) echo $msg1;?>
                        </div>
                    </div>
                    <!----question 2----->
                    <div class="form-group">
                        <div class="title"><label class="col-sm-4 control-label" for="q2">
                            <b>問題2 : 最喜歡的歌手?
                            </label></div>
                        <div class="form-row">
                            <input type="text" class="form-control col-sm-4" id="q2" name="q2" placeholder="2~15字"required value ="<?php if(!isset($msg2) && isset($_POST['q2'])) echo $_POST['q2']; ?>">
                            <?php if(isset($msg2)) echo $msg2;?>
                        </div>
                    </div>
                    <!----question 3----->
                    <div class="form-group">
                        <div class="title"><label class="col-sm-4 control-label" for="q3">
                            <b>問題3 : 最喜歡的顏色?
                            </label></div>
                        <div class="form-row">
                            <input type="text" class="form-control col-sm-4" id="q3" name="q3" placeholder="2~15字"required value ="<?php if(!isset($msg3) && isset($_POST['q3'])) echo $_POST['q3']; ?>">
                            <?php if(isset($msg3)) echo $msg3;?>
                        </div>
                    </div>
                    <div class="form-col text-center">
                        <td class="btn"><button type="submit">確認</button></td>
                        <td class="btn"><button onclick="self.location.href='index.php#intro'">取消</button></td>
                    </div>
                    <div class="form-col text-center">
                        <?php if(isset($answer)) echo $answer;?>
                    </div>
                    
                </form>
            </div>
        </div>
    </section>
    <?php include("footer.php"); ?>
</body>
</html>