
     var me = $(this);

     $.ajax({
       url: "",
       type:'post',
       data:me.serialize(),
       dataType: 'json',
       success:function(response){

           if($('#register_number').val() == ''){
                   toastr.warning('Регистрийн дугаараа оруулна уу');
           }
           else if($('#obog').val() == '')
           {
               toastr.warning('Овогоо оруулна уу');
           }
           else if($('#ner').val() == '')
           {
               toastr.warning('Нэрээ оруулна уу');
           }
           else if($('#dugaar').val() == '')
           {
               toastr.warning('Утасны дугаараа оруулна уу');
           }
           else if($('#creditcategoryid').val() == '')
           {
               toastr.warning('Зээлийн төрлөө сонгоно уу');
           }
           else if($('#delgerengui').val() == '')
           {
               toastr.warning('Зээлийн дэлгэрэнгүйг оруулна уу');
           }
           else if($('#getdayid').val() == '')
           {
               toastr.warning('Зээлийн хугацааг сонгоно уу');
           }
           else if($('#foo').val() == '')
           {
               toastr.warning('Зээлийн хэмжээг оруулна уу');
           }
           else if(response.status == 'success')
           {
             window.location.href = response.redirect_url;
           }
       }
     });


     $('#addcreditform').submit(function(e){
          e.preventDefault();


         var register_number = $('#register_number').val();
         var obog = $('#obog').val();
         var ner = $('#ner').val();
         var dugaar = $('#dugaar').val();
         var nemelt_utas = $('#nemelt_utas').val();
         var creditcategoryid = $('#creditcategoryid').val();
         var hayg = $('#hayg').val();
         var delgerengui = $('#delgerengui').val();
         var startdate = $('#datepicker').val();
         var honog_id = $('#getdayid').val();
         var honog_huu = $('#loan_khuu').val();
         var unelgee = $('#foo1').val();
         var creditzeel = $('#foo').val();
         var enddate = $('#enddate').val();
         var tuluh_huu = $('#sumhkuu').val();
         var company_id = $('#company_id').val();
         var user_id = $('#user_id').val();
         var worker_id = $('#worker_id').val();
         var hamtran_id = $('#hamtran_id').val();
         var photo_id = $('#photo_id').val();

         $.ajax({
           url: "Classes/zeelProcess.php",
           type:
         })


        });
