<?php require 'inc/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php require 'inc/Sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Page Header
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->

      <h4>Хэрэглэгчийн нэр: <?php echo User::get('username'); ?></h4>
      <br>
      <h4>Салбарын нэр: <?php echo User::get('branch_name'); ?></h4>
      <br>
      <h4>Компанийн нэр: <?php echo User::get('company_name'); ?></h4>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <?php require 'inc/Footer.php'; ?>
