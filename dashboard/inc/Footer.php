<footer class="main-footer">
  <!-- To the right -->
  <div class="pull-right hidden-xs">
    Anything you want
  </div>
  <!-- Default to the left -->
  <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Create the tabs -->
  <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <!-- Home tab content -->
    <div class="tab-pane active" id="control-sidebar-home-tab">
      <h3 class="control-sidebar-heading">Recent Activity</h3>
      <ul class="control-sidebar-menu">
        <li>
          <a href="javascript:;">
            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

              <p>Will be 23 on April 24th</p>
            </div>
          </a>
        </li>
      </ul>
      <!-- /.control-sidebar-menu -->

      <h3 class="control-sidebar-heading">Tasks Progress</h3>
      <ul class="control-sidebar-menu">
        <li>
          <a href="javascript:;">
            <h4 class="control-sidebar-subheading">
              Custom Template Design
              <span class="pull-right-container">
                  <span class="label label-danger pull-right">70%</span>
                </span>
            </h4>

            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
            </div>
          </a>
        </li>
      </ul>
      <!-- /.control-sidebar-menu -->

    </div>
    <!-- /.tab-pane -->
    <!-- Stats tab content -->
    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
    <!-- /.tab-pane -->
    <!-- Settings tab content -->
    <div class="tab-pane" id="control-sidebar-settings-tab">
      <form method="post">
        <h3 class="control-sidebar-heading">General Settings</h3>

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Report panel usage
            <input type="checkbox" class="pull-right" checked>
          </label>

          <p>
            Some information about this general settings option
          </p>
        </div>
        <!-- /.form-group -->
      </form>
    </div>
    <!-- /.tab-pane -->
  </div>
</aside>
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->

<script src="jquery-number-divider/dist/number-divider.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>

<script src="toastr/build/toastr.min.js"></script>
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
$(document).ready(function(){
$(function(){
  $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : true
    })
})
})
</script>
<script>


$(document).ready(function(){

$('input[name=unelgee]').bind("keyup change", function(e) {
  $('input[name=unelgee]').css("background-color", "#d6d6c2");

})
$('input[name=creditzeel]').bind("keyup change", function(e) {
    $('input[name=creditzeel]').css("background-color", "#d6d6c2")
    calculator();
})

//------Энэ id өөрчлөгдөхөд----------үлдсэн формыг нээнэ---

  $('#creditcategoryid').change(function(){
  var selectedOption = $('#creditcategoryid option:selected');
if(selectedOption.text()=="Ангилал сонгох"){
  $('#dynamicform').hide();
}else{
  $('#dynamicform').show();

}
});



//-------Зээлийн төрөл сонгоход--З/Төрлөөс хамаарч гарч ирэх хоногууд

$("#creditcategoryid").on('change', function(){
  var zturul_id = $(this).val();

    $.ajax({
      url:"../Classes/ajaxProcess.php",
      type:"POST",
      data:{'zturul_id' : zturul_id},
      dataType: 'json',
      success: function(data){
        $('#getdayid').html(data);


      },
      error:function(){
        alert('Error accur....!!!');
      }
    });
});
//----зээлийн хугацаанаас хамаарах хүү, болон хоног тооцох
$("#getdayid").on('change', function(){
  addDays();

  var honog_id = $(this).val();

  $.ajax({
    url:"../Classes/ajaxProcess.php",
    type:"POST",
    data:{'honog_id' : honog_id},
    success: function(data){
      $('#loan_khuu').val(data);
      calculator();

    },
    error:function(){
      alert('bolohgui bnaa');
    }
  });
  });

  function addDays() {
    var firstdate = $('#datepicker').val();
    var days = parseInt(too($("#getdayid").val()));
    var result = new Date(firstdate);
    result.setDate(result.getDate() + days);
    var dateMsg = result.getFullYear() + '/' + (result.getMonth() + 1) + '/' + result.getDate();
    $('#enddate').val(dateMsg);
}

function too(value)
{
  if(value=="1" || value=="8" || value=="11" || value=="14" ||value=="20" || value=="17" ){

    return "7";
  }
  else if(value=="2" || value=="9" || value=="12" || value=="15" ||value=="18"|| value=="21")
  {
    return "10";
  }
  else if(value =="5" || value=="7"){
    return "30";

  }
  else {
    return "14";
  }
}
function calculator() {
    var loan_khuu = define_conf($('#loan_khuu').val());
    var money = define_conf($('input[name=creditzeel]').val());
    var m = money * loan_khuu / 100;
    $('#sumkhuu').val(m);

}


function define_conf(value) {
    if (value === undefined || value === null || value == '') {
        return 0;
    } else {
        return parseFloat(value.replace(/,/g, ''));
    }
}
//-----Value empty validation------------



//---Ajax zeels ----------------




   $('#addcreditform').submit(function(e){
     e.preventDefault();

     var form_url = $(this).attr("action");
     var request_method = $(this).attr("method");
     var formData = $(this).serialize();

     var register_number = $('#register_number').val();
     var register_length = $('#register_number').val().length;
     var dugaar = $('#dugaar').val();
     var obog = $('#obog').val();
     var ner = $('#ner').val();
     var foo = $('#foo').val();

     if(register_number == ''){

             toastr.warning('Регистрийн дугаараа оруулна уу');

     }else if(register_length <= 9){

            toastr.warning('10-н оронтой байх ёстой');
     }

     else if(obog == '')
     {
         toastr.warning('Овогоо оруулна уу');
     }
     else if(!obog.match(/^[абвгдеёжзийклмноөпрстуүфхцчшщьыъэюяАБВГДЕЁЖЗИЙКЛМНОӨПРСТУҮФХЦЧШЩЬЫЪЭЮЯ]+$/))
     {
         toastr.warning('Та криллээр бичнэ үү');
     }
     else if(ner == '')
     {
         toastr.warning('Нэрээ оруулна уу');
     }
     else if(!ner.match(/^[абвгдеёжзийклмноөпрстуүфхцчшщьыъэюяАБВГДЕЁЖЗИЙКЛМНОӨПРСТУҮФХЦЧШЩЬЫЪЭЮЯ]+$/))
     {
         toastr.warning('Та криллээр бичнэ үү');
     }

     else if(dugaar == '' )
     {
         toastr.warning('Утасны дугаараа оруулна уу');
     }

      else if(!dugaar.match(/^[0-9]+$/))
      {
          // $('#dugaar').css({'background':'#FFEDEF', 'border':'solid 1px red'});
          toastr.warning('Зөвхөн тоон тэмдэгт байх ёстой!!');
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
     else if( foo == '')
     {
         toastr.warning('Зээлийн хэмжээг оруулна уу');
     }
     // else if(!foo.match(/^[0-9]+$/)){
     //     toastr.warning('Зөвхөн тоон тэмдэгт байх ёстой');
     // }
     else{
       $.ajax({
         url: form_url,
         type: request_method,
         data:formData,
         dataType: false,

         success:function(response){
           //
           // if(response.status == 'success')
           //   {
           //     window.location.href = response.redirect_url;
           //   }

           window.location = '../dashboard/successZeel.php';
           

         }
       });
     }

   });


   $('#hamtranForm').submit(function(e){
     e.preventDefault();

     var form_url = $(this).attr("action");
     var request_method = $(this).attr("method");
     var formData = $(this).serialize();

     var hamtran_lastname = $('#hamtran_lastname').val();
     var hamtran_firstname = $('#hamtran_firstname').val();
     var hamtran_register = $('#hamtran_register').val();


     if(hamtran_lastname == ''){

             toastr.warning('Хамтран зээлдэгчийн овгийг оруулна уу');

     }else if(hamtran_firstname == ''){

            toastr.warning('Хамтран зээлдэгчийн нэрийг оруулна уу');
     }
     else if(hamtran_register == ''){

            toastr.warning('Хамтран зээлдэгчийн регистрийг оруулна уу');
     }

     else{
       $.ajax({
         url: form_url,
         type: request_method,
         data:formData,
         dataType: false,

         success:function(data){

           $('#hamttai').val(data);
           // console.log(data);
           toastr.success('Амжилттай зээл үүслээ!');

         },
         error:function(){
           toastr.danger('Амжилтгүй боллоо');
         }
       });
     }

   });

   //*------toastr options-----------
     toastr.options = {
       "closeButton": true,
       "debug": true,
       "newestOnTop": false,
       "progressBar": true,
       "positionClass": "toast-top-right",
       "preventDuplicates": false,
       "showDuration": "300",
       "hideDuration": "1000",
       "timeOut": "5000",
       "extendedTimeOut": "1000",
       "showEasing": "swing",
       "hideEasing": "linear",
       "showMethod": "fadeIn",
       "hideMethod": "fadeOut"
      }



});
</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
   Both of these plugins are recommended to enhance the
   user experience. -->
</body>
</html>
