<?php require 'inc/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php require 'inc/Sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
 <h1>Тохиргоо

   <small>Компани нэмэх</small>
 </h1>
 <ol class="breadcrumb">
   <li><a href="index.php"><i class="fa fa-dashboard"></i> Эхлэл</a></li>
   <li><a href="standartZeel.php">Тохиргоо</a></li>
   <li class="active">Компани нэмэх</li>
 </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-6">
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Компани нэмэх</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="companyName">Компаниин нэр</label>
                  <input type="text" class="form-control" name="company_name" id="companyName" placeholder="Компаниин нэр оруулна уу!">
                </div>

                <div class="form-group">
                  <label for="databaseType">Датабазын төрөл</label>
                  <input type="text" class="form-control" readonly name="database_type" id="databaseType" value="localhost">
                </div>

                <div class="form-group">
                  <label for="databaseUser">Датабазын User</label>
                  <input type="text" class="form-control" readonly value="root" name="database_user" id="databaseUser" placeholder="Өгөгдлийн сангийн User оруулна уу!">
                </div>

                <div class="form-group">
                  <label for="databasePassword">Датабазын Нууц үг</label>
                  <input type="password" class="form-control" readonly name="database_password" id="databasePassword" placeholder="Хоосон оруулж болно">
                </div>

                <div class="form-group">
                  <label for="databaseName">Датабазын Нэр</label>
                  <input type="text" class="form-control" name="database_name" id="databaseName" placeholder="Заавал оруулна" >
                </div>

                <div class="form-group">
                  <label for="databaseAddress">Компанийн Хаяг</label>
                  <input type="text" class="form-control" name="company_address" id="databaseAddress" placeholder="Заавал оруулна">
                </div>

                <div class="form-group">
                  <label for="databasePhone">Компанийн Утас</label>
                  <input type="text" class="form-control" name="company_phone" id="databasePhone" placeholder="Заавал оруулна">
                </div>




              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          </div>
          </div>
        </section>
<!-- /.content -->
</div>

  <!-- Main Footer -->
  <?php require 'inc/Footer.php'; ?>
