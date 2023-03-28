<!DOCTYPE php>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" rel="stylesheet">

    <script src="//code.jquery.com/jquery-3.3.1.js"></script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_zh_TW.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    
    <script src="js/admin_order.js"></script>
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
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 text-center">
            <form class="form-horizontal form-inline" name="form1" id="form1" method="post">
                <input type="hidden" name="oper" id="oper" value="insert">
                <input type="hidden" name="o_member_account_old" id="o_member_account_old" value="">
                <table id="edit" class="table table-striped table-bordered">
                    <thead>
                        <td class="btn"><button onclick="self.location.href='admin_control_home.php'">回到首頁</button></td>
                        <tr>
                            <th class="text-center">會員帳號</th>
                            <th class="text-center">商品名稱</th>
                            <th class="text-center">訂購數量</th>
                            <th class="text-center">商品分類</th>
                            <th class="text-center">商品編號</th>
                            <th class="text-center">姓名</th>
                            <th class="text-center">聯絡方式</th>
                            <th class="text-center">送貨方式</th>
                            <th class="text-center">付款方式</th>
                            <th class="text-center">地址</th>
                            <th class="text-center">存檔/取消</th></th>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <input type="text" id="o_member_account" name="o_member_account" style="width:50px">
                            </td>
                            <td class="text-center">
                                <input type="text" id="o_product" name="o_product" style="width:50px">
                            </td>
                            <td class="text-center">
                                <input type="text" id="o_product_number" name="o_product_number" style="width:50px">
                            </td>
                            <td class="text-center">
                                <input type="text" id="o_product_id" name="o_product_id" style="width:50px">
                            </td>
                            <td class="text-center">
                                <input type="text" id="o_product_no" name="o_product_no" style="width:50px">
                            </td>
                            <td class="text-center">
                                <input type="text" id="o_name" name="o_name" style="width:50px">
                            </td>
                            <td class="text-center">
                                <input type="text" id="o_phone" name="o_phone" style="width:50px">
                            </td>
                            <td class="text-center">
                                <input type="text" id="o_delivery" name="o_delivery" style="width:50px">
                            </td>
                            <td class="text-center">
                                <input type="text" id="o_payment" name="o_payment" style="width:50px">
                            </td>
                            <td class="text-center">
                                <input type="text" id="o_address" name="o_address" style="width:50px">
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary btn-xs" id="btn-save"><i class="glyphicon glyphicon-save"></i>存檔</button>
                                <button type="reset" class="btn btn-danger btn-xs" id="btn-cancel">取消</button>
                            </td>
                        </tr>
                    </thead>
                </table>
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">會員帳號</th>
                            <th class="text-center">商品名稱</th>
                            <th class="text-center">訂購數量</th>
                            <th class="text-center">商品分類</th>
                            <th class="text-center">商品編號</th>
                            <th class="text-center">姓名</th>
                            <th class="text-center">聯絡方式</th>
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
</body>

</html>