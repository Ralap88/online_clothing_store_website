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
            url: "datatable2_ajax.php",
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
      $('#o_member_account').val(data[0]);
      $('#o_product').val(data[1]); 
      $('#o_product_number').val(data[2]);
      $('#o_product_id').val(data[3]);
      $('#o_product_no').val(data[4]);
      $('#o_name').val(data[5]);
      $('#o_phone').val(data[6]);
      $('#o_delivery').val(data[7]);
      $('#o_payment').val(data[8]);
      $('#o_address').val(data[9]);

      $('#o_member_account_old').val(data[0]);
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

      $("#o_member_account_old").val(data[0]);
      $("#oper").val("delete"); //刪除
      CRUD();
   });

   //送出表單 (儲存)
   $("#form1").validate({
      submitHandler: function(form) {
            CRUD();
      },
      rules: {
            o_member_account: {
                  required: true
            },
            o_product: {
                  required: true
            },
            o_product_number: {
                  required: true
            },
            o_product_id: {
                  required: true
            },
            o_product_no: {
                  required: true
            },
            o_name: {
                  required: true
            },
            o_phone: {
                  required: true
            },
            o_delivery: {
                  required: true
            },
            o_payment: {
                  required: true
            },
            o_address: {
                  required: true
            }
      }
   });
   function CRUD() {
      $.ajax({
            url: "datatable2_ajax.php",
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