
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Shop Sign In</title>
    <?php include("link.php"); ?>
    <?php include("jquery.php"); 
    ?>
    <script>
    function sendRequest() 
    {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText == 1) {
                document.getElementById('show_msg').innerHTML = 'success!!!!';
            }
            else {
                document.getElementById('show_msg').innerHTML = 'wrong!';
            }
        }
    };
    var url='check_account_ajax.php?account=' + document.form1.account.value + '&pwd=' + document.form1.pwd.value+'&timeStamp='+new Date().getTime();
    xhttp.open('GET',url,true);//建立XMLHttpRequest連線要求
    xhttp.send();
   }

   </script>
</head>
<body>
  <?php include("main_header.php"); ?>

    <section id=signin style="background-image: url('img/signin-bg.jpg');">
        <div class="container">
            <div class="form">
                <div class="section-header">
                    <h3>會員登錄</h3>
                </div>
                <form action="" role="form" class="contactForm" id="form1" name="form1">
                    <div class="form-group">
                        <div class="text-center"><label class="col-sm-4 control-label" for="account">
                                <b>帳號</b>
                            </label></div>
                        <div class="text-center">
                            <span style="margin-left: 1; font-size:12pt"><input type="text" name="account" id="account" class="col-sm-8"  placeholder="4~10字" maxLength="12" onkeyup="sendRequest()">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="text-center"><label class="col-sm-4 control-label" for="pwd">
                                <b>密碼</b>
                            </label></div>
                        <div class="text-center">
                            <input type='password' name='pwd' id='pwd' class="col-sm-8" maxLength='12' placeholder="6~12字" onkeyup="sendRequest()">
                        </div>
                    </div>
                    <div class="form-col text-center">
                        <td class="text-center"><button type="submit">確定送出</button></td>
                        <td class="text-center"><button type="reset">取消重設</button></td>
                        <td class="text-center"><button onclick="self.location.href='change_password.php'">更改密碼</td>
                        <td class="text-center"><button onclick="self.location.href='forget_password.php'">忘記密碼</td>
                        <td class="text-center"><button onclick="self.location.href='register.php'">會員註冊</td>
                    </div>
                    <center>message: <span id='show_msg' style="color:red"></span></center>
                </form>
            </div>
        </div>
    </section>
    <?php include("footer.php"); ?>
</body>

</html>