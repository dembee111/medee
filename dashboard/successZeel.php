<?php require 'inc/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php require 'inc/sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <?php
  include '../Classes/Zeel.php';
  $zeel = new Zeel;
      ?>

    <!-- Main content -->
    <div class="content-wrapper" style="min-height: 442px;">
 <section class="content-header">
 <h1>Зээлийн баримтаа хэвлэнэ үү<small>Хэвлэх товчин дээр дарна уу.</small></h1>
</section> <!-- Main content -->
<section class="content">
 <!-- START ALERTS AND CALLOUTS -->
 <div class="row">
   <div class="col-md-12">
     <div class="box box-success">
       <div class="box-header">
         <i class="fa fa-barcode"></i>
         <h3 class="box-title"></h3>
       </div><!-- /.box-header -->
        <div class="box-body">
         <div class="callout callout-info">
            <h3>Зээлийн гэрээ амжиллтай үүслээ. Зээлийн дугаар: <?php echo $_SESSION['last']; ?></h3>
           <p>Хэвлэх товчин дээр дарж хэвлэж авна уу.</p>
         </div>
         <a class="btn btn-default" onclick="var w=window.open(this.href,'printer','height=600,width=800,scrollbars=no,resizable=no,left=100,top=0,screenX=300,screenY=300');w.focus();return false;" href="print.php?barimtid=<?php echo $_SESSION['last'];  ?>">
           <i class="fa fa fa-print"></i> Хэвлэх</a>

       </div><!-- /.box-body -->
     </div><!-- /.box -->
   </div><!-- /.col -->
 </div>
</section><!-- /.content -->
</div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <?php require 'inc/Footer.php'; ?>
