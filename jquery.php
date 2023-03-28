<link rel="stylesheet" href="js/bootstrap.min">
<script src="js/bootstrap.min"></script>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
<!--中文錯誤訊息-->
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_zh_TW.js "></script>
<script>
    $(document).ready(function($) {
            //for select
            $.validator.addMethod("notEqualsto", function(value, element, arg) {
                return arg != value;
            }, "您尚未選擇!");

            $("#form1").validate({
                submitHandler: function(form) {
                    // alert("success!");
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
                    birthday: {

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
                    birthday: {
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
