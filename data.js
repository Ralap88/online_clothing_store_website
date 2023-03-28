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
            url: "data.php",
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
      $('#sc_member_account').val(data[0]);
      $('#sc_product').val(data[1]);
      $('#sc_product_number').val(data[2]);
      $('#sc_product_id').val(data[3]);
      $('#sc_product_no').val(data[4]);
      $('#sc_name').val(data[5]);
      $('#sc_phone').val(data[6]);
      $('#sc_delivery').val(data[7]);
      $('#sc_payment').val(data[8]);
      $('#sc_address').val(data[9]);

      $("#stud_no_old").val(data[1]);
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

      $("#stud_no_old").val(data[1]);
      $("#oper").val("delete"); //刪除
      CRUD();
   });

   //送出表單 (儲存)
   $("#form1").validate({
      submitHandler: function(form) {
            CRUD();
      },
      rules: {
            sc_product: {
                  required: true,
            },
            sc_product_number: {
                  required: true
            },
            sc_product_id: {
                  required: true
            },
            sc_product_no: {
                  required: true
            }
      }
   });
   function CRUD() {
      $.ajax({
            url: "data.php",
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