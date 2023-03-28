<?php
    include("open_database.php");
    $sql = "select * from member_profile";
    if(isset($_POST['gender']))
        $gender = $_POST['gender'];
    $array_sex = array(1 => "男", 2 => "女");

    //資料庫新增存檔
    if(isset($_POST['name']) && isset($_POST['gender']) && isset($_POST['phone']) && isset($_POST['email'])&& isset($_POST['address']) && isset($_POST['account'])&& isset($_POST['pwd'])&& isset($_POST['q1'])&& isset($_POST['q2'])&& isset($_POST['q3'])) 
    {
        if ($result = mysqli_query($link, $sql)) 
        {
            $flag = 'true';
            while ($row = mysqli_fetch_assoc($result)) 
            {
                if($row["mp_account"] == $_POST['account'])
                {
                    $flag = 'false';
                    echo "<script>alert('帳號已經存在，請輸入不一樣的帳號，謝謝!')</script>";
                }
            }
            if($flag == 'true')
            {
                $sql = "insert into member_profile values('" . $_POST['name'] . "','" . $array_sex[$gender] . "','" . $_POST['phone'] . "','" . $_POST['email'] . "','" . $_POST['address'] . "','" . $_POST['account'] . "','" . $_POST['pwd'] . "','" . $_POST['q1'] . "','" . $_POST['q2'] . "','" . $_POST['q3'] . "')";
                echo "<script>alert('註冊成功，購物愉快!')</script>";
            }
        }      
    }
    if ($result = mysqli_query($link, $sql)) // 送出查詢的SQL指令
    {
        $msg = "<span style='color:#0000FF'>資料新增成功!</span>";
    } else {
        $msg = "<span style='color:#FF0000'>資料新增失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" . mysqli_error($link) . "</span>";
    }
    mysqli_close($link); // 關閉資料庫連結
?>
<!DOCTYPE php>
<html>

<head>
    <title>Shop Register</title>
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
            name: {
                required: true,
                minlength: 3,
                maxlength: 20
            },
            gender: {
                required: true,
            },
            address: {

            },
            phone: {

            },
            email: {
                required: true,
                email: true
            },
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
            agree: {
                required: true
            }
        },
        messages: {
            name: {
                required: "(必填欄位!)",
                minlength: "最少要3個字",
                maxlength: "最長20個字"
            },
            gender: {
                required: "(必填欄位!)"
            },
            address: {
                required: "(必填欄位!)"

            },
            phone: {
                required: "(必填欄位!)"

            },
            email: {
                required: "(必填欄位!)",
                email: "請輸入正確的電子信箱"
            },
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
            },
            agree: {
                required: "(必填欄位!)"
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
                    <h3>會員註冊</h3>
                </div>
                <h>基本資料</h>
                <form class="contactForm" action="" method="post" role="form" id="form1">
                    <!--name-->        
                    <div class="form-group">
                        <div class="title"><label for = "name" class="col-sm-4 control-label" >
                            <b>姓名</b></label></div>
                        <div class="form-row">
                            <input type="text" id="name" class="form-control col-sm-4"  name="name" placeholder="3~20字"required></div>
                    </div>
                    <!----gender----->
                    <div class="form-group">
                        <div class="title"><label class="col-sm-4 control-label">
                            <b>性別
                            </label></div>
                        <div class="form-row">
                            <input type="radio" class="radio-inline col-sm-1" id="gender1" name="gender" value="1">
                            <b>男</b>
                            <input type="radio" class="radio-inline col-sm-1" id="gender2" name="gender" value="2">
                            <b>女</b>
                            <label for="gender" class="error"></label>
                        </div>
                    </div>
            <!----address----->
                    <div class="form-group">
                        <div class="title"><label class="col-sm-4 control-label" for="address">
                            <b>地址
                            </label></div>
                        <div class="form-row">
                            <input type="text" class="form-control col-sm-4" name="address" id="address" placeholder="5~20字"required>
                        </div>
                    </div>
            <!----phone number----->
                    <div class="form-group">
                        <div class="title"><label class="col-sm-4 control-label" for="phone">
                            <b>聯絡方式
                            </label></div>
                        <div class="form-row">
                            <input type="text" class="form-control col-sm-4" name="phone" id="phone" placeholder="4~10字"required>
                        </div>
                    </div>
                    <!----Email----->
                    <div class="form-group">
                        <div class="title"><label class="col-sm-4 control-label" for="email">
                            <b>E-mail
                            </label></div>
                        <div class="form-row">
                            <input type="text" class="form-control col-sm-4" id="email" name="email"required>
                        </div>
                    </div>
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
                    <!----question 1----->
                    <br><h>遺失密碼時，需要回答的問題 :</h>
                    <div class="form-group">
                        <div class="title"><label class="col-sm-4 control-label" for="q1">
                            <b>問題1 : 出生的城市?
                            </label></div>
                        <div class="form-row">
                            <input type="text" class="form-control col-sm-4" id="q1" name="q1" placeholder="2~15字"required>
                        </div>
                    </div>
                    <!----question 2----->
                    <div class="form-group">
                        <div class="title"><label class="col-sm-4 control-label" for="q2">
                            <b>問題2 : 最喜歡的歌手?
                            </label></div>
                        <div class="form-row">
                            <input type="text" class="form-control col-sm-4" id="q2" name="q2" placeholder="2~15字"required>
                        </div>
                    </div>
                    <!----question 3----->
                    <div class="form-group">
                        <div class="title"><label class="col-sm-4 control-label" for="q3">
                            <b>問題3 : 最喜歡的顏色?
                            </label></div>
                        <div class="form-row">
                            <input type="text" class="form-control col-sm-4" id="q3" name="q3" placeholder="2~15字"required>
                        </div>
                    </div>
                    <!----member agreement----->
                    <div class="form-group">
                        <div class="title"><label class="col-sm-4 control-label" for="password">
                                會員條款
                            </label></div>
                        <div class="form-row">
                            <textarea name="agreee" class="form-control" style="overflow:scroll;overflow-x:hidden">會員合約1. 除本文件所約定之內容外，已經公佈或將來可能公佈之使用辦法、規範、處理原則、政策、及相關服務說明等，均為會員合約的一部份；會員除須同意並遵守本文件所約定之內容外，並應同意並遵守該等已經公佈及將來可能公佈之使用辦法、規範、處理原則、政策、及相關服務說明。2. 得隨時修改會員合約之約定內容，包括修改已經公佈及將來可能公佈之使用規範、辦法、處理原則、政策、及相關服務說明等；修改後之內容，除另有說明者外，自公告時起生效。自生效日起，如會員繼續使用本服務，即視為會員已閱讀、暸解、並同意修改後的所有內容；如會員不同意修改後之內容，得終止合約，且不因此而對會員負任何賠償或補償之責任。</textarea></div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="agree" name="agree" required><b>我同意相關服務條款</b>
                                </label>
                                <label class="error" for="agree"></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-col text-center">
                        <td class="btn"><button type="submit">送出</button></td>
                        <td class="btn"><button type="reset">重填</button></td>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <?php include("footer.php"); ?>
</body>
</html>