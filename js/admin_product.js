var tbl;
$(function() {
   //查詢
   tbl = $('#example').DataTable({
      "scrollX": false,
      "scrollY": false,
      "scrollCollapse": false, //當筆數小於scrillY高度時,自動縮小
      "displayLength": 10,
      "paginate": true, //是否分頁
      "lengthChange": true,
      "ajax": {
            url: "datatable3_ajax.php",
            data: function(d) {
                  return $('#form1').serialize() + "&oper=query";
            },
            type: 'POST',
            dataType: 'json'
      },
      "dom": 'frtip'
   });

   //修改
   $('tbody').on('click', '#btn_update', function() {
      var data = tbl.row($(this).closest('tr')).data();
      $('#product_number').val(data[0]);
      $('#product_id').val(data[1]);
      $('#product_category').val(data[2]); 
      $('#product_no').val(data[3]);
      $('#product_name').val(data[4]);
      $('#product_price').val(data[5]);
      $('#product_introduction').val(data[6]);
      $('#product_path').val(data[7]);
   
      $('#product_number_old').val(data[0]);
      $("#oper").val("update");
   });

   //取消
   $('tbody').on('click', '#btn_cancel', function() {
      $("#oper").val("insert");
   });

   //刪除
   $('tbody').on('click', '#btn_delete', function() {
      var data = tbl.row($(this).closest('tr')).data();
      if (!confirm('是否確定要刪除?'))
            return false;

      $("#product_number_old").val(data[0]);
      $("#oper").val("delete"); //刪除
      CRUD();
   });

   //送出表單 (儲存)
   $("#form1").validate({
      submitHandler: function(form) {
            CRUD();
      },
      rules: {
            product_number: {
                  required: true
            },
            product_id: {
                  required: true
            },
            product_category: {
                  required: true
            },
            product_no: {
                  required: true
            },
            product_name: {
                  required: true
            },
            product_price: {
                  required: true
            },
            product_introduction: {
                  required: true
            },
            product_path: {
                  required: true
            }
      }
   });
   function CRUD() {
      $.ajax({
            url: "datatable3_ajax.php",
            data: $("#form1").serialize(),
            type: 'POST',
            dataType: "json",
            success: function(JData) {
                  if (JData.code)
                        toastr["error"](JData.message);
                  else {
                         $("#oper").val("insert");
                        toastr["success"](JData.message);
                        tbl.ajax.reload();
                  }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                  console.log(xhr.responseText);
                  alert(xhr.responseText);
            }
      });
   }
});