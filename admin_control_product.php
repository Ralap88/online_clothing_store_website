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
    <script src="js/admin_product.js"></script>
    <include >
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
                <input type="hidden" name="product_number_old" id="product_number_old" value="">
                <table id="edit" class="table table-striped table-bordered">
                    <thead>
                        <td class="btn"><button onclick="self.location.href='admin_control_home.php'">回到首頁</button></td>
                        <tr>
                            <th class="text-center">總編號</th>
                            <th class="text-center">商品分類</th>
                            <th class="text-center">商品種類</th>
                            <th class="text-center">商品編號</th>
                            <th class="text-center">商品名稱</th>
                            <th class="text-center">價錢</th>
                            <th class="text-center">商品介紹</th>
                            <th class="text-center">商品圖片路徑</th>
                            <th class="text-center">存檔/取消</th></th>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <input type="text" id="product_number" name="product_number">
                            </td>
                            <td class="text-center">
                                <input type="text" id="product_id" name="product_id">
                            </td>
                            <td class="text-center">
                                <input type="text" id="product_category" name="product_category">
                            </td>
                            <td class="text-center">
                                <input type="text" id="product_no" name="product_no">
                            </td>
                            <td class="text-center">
                                <input type="text" id="product_name" name="product_name">
                            </td>
                            <td class="text-center">
                                <input type="text" id="product_price" name="product_price">
                            </td>
                            <td class="text-center">
                                <input type="text" id="product_introduction" name="product_introduction">
                            </td>
                            <td class="text-center">
                                <input type="text" id="product_path" name="product_path">
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
                            <th class="text-center">總編號</th>
                            <th class="text-center">商品分類</th>
                            <th class="text-center">商品種類</th>
                            <th class="text-center">商品編號</th>
                            <th class="text-center">商品名稱</th>
                            <th class="text-center">價錢</th>
                            <th class="text-center">商品介紹</th>
                            <th class="text-center">商品圖片路徑</th>
                            <th class="text-center">修改/刪除</th>
                        </tr>
                    </thead>
                </table>
        </div>
        <div class="col-md-2"></div>
    </div>
</body>
</html>