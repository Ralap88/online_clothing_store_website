<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title></title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <link href="//cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <script src="//code.jquery.com/jquery-3.3.1.js"></script>
  <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="//cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
  <script>
    $(function() {
        $('#example').DataTable({
            "ajax": 'datatable0_ajax.php'
        });
    });
    function display_alert()
    {
    alert("送出訂單!!")
    self.location.href='index.php';
    }
  </script>
</head>

<body>
   <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6 text-center">
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
                 <th class="text-center">付款方式（1.貨到付款 2.信用卡）</th>
                 <th class="text-center">地址</th>
            </tr>
            </thead>
       </table>
<input type ="button" onclick="history.back()" value="回到上一頁"></input>
<button type="submit" onclick="display_alert()">送出訂單</button>
     </div>
     <div class="col-md-3"></div>
  </div>
</body>
</html>