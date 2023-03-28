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
            url: "admin_member.php",
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
      $('#mp_name').val(data[0]);
      $('#mp_gender').val(data[1]); 
      $('#mp_contact').val(data[2]);
      $('#mp_email').val(data[3]);
      $('#mp_address').val(data[4]);
      $('#mp_account').val(data[5]);
      $('#mp_password').val(data[6]);
      $('#mp_ans_to_Q1').val(data[7]);
      $('#mp_ans_to_Q2').val(data[8]);
      $('#mp_ans_to_Q3').val(data[9]);

      $("#mp_account_old").val(data[5]);
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

      $("#mp_account_old").val(data[5]);
      $("#oper").val("delete"); //刪除
      CRUD();
   });

   //送出表單 (儲存)
   $("#form1").validate({
      submitHandler: function(form) {
            CRUD();
      },
      rules: {
            mp_name: {
                  required: true
            },
            mp_gender: {
                  required: true
            },
            mp_contact: {
                  required: true
            },
            mp_email: {
                  required: true
            },
            mp_address: {
                  required: true
            },
            mp_account: {
                  required: true
            },
            mp_password: {
                  required: true
            },
            mp_ans_to_Q1: {
                  required: true
            },
            mp_ans_to_Q2: {
                  required: true
            },
            mp_ans_to_Q3: {
                  required: true
            }
      }
   });
   function CRUD() {
      $.ajax({
            url: "admin_member.php",
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