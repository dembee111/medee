
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo User::get('company_name'); ?></p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <?php
    if (!isset($_POST['search']) || $_POST['search'] == null) {
        // echo "<script>window.location = '../dashboard/index.php';</script>";


     }
     else{
       $regexp = '/^\p{Cyrillic}{2}\d{8}+$/u';

       if(preg_match($regexp, $_POST['search'])){

              $search = $_POST['search'];
              require '../Classes/Zeel.php';
              $zeel = new Zeel();
              $zeel->search($search);
            }else{
                echo "<script>window.location = '../dashboard/index.php';</script>";
            }
     }
     ?>
    <!-- search form (Optional) -->
    <form action="" method="POST" id="searchform"   class="sidebar-form">
      <div class="input-group">
        <input type="text" id="search" name="search" class="form-control" placeholder="Регистрийн дугаар" maxlength="10">
        <span class="input-group-btn">
            <button type="submit" id="search-btn"  class="btn btn-flat"><i class="fa fa-plus"></i>
            </button>
          </span>
      </div>
    </form>


    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">HEADER</li>
      <!-- Optionally, you can add icons to the links -->
      <li class="active"><a href="index.php"><i class="fa fa-link"></i> <span>Эхлэл</span></a></li>
      <li><a href="#"><i class="fa fa-link"></i> <span>Хар дэвтэр</span></a></li>
      <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Зээл</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="standartZeel.php">Хэвийн зээл</a></li>
          <li><a href="#">Хугацаа хэтэрсэн зээл</a></li>
          <li><a href="#">Муу зээл</a></li>
          <li><a href="#">Хураагдсан</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Гүйлгээ</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#">Орлого</a></li>
          <li><a href="#">Зарлага</a></li>
          <li><a href="#">Зардал</a></li>
          <li><a href="#">Шилжүүлэлт</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Тайлан</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#">Кассын тайлан</a></li>
          <li><a href="#">Хугацаат тайлан</a></li>
          <li><a href="#">Үр дүнгийн тайлан</a></li>
        </ul>
      </li>

      <li><a href="#"><i class="fa fa-link"></i> <span>Хар жагсаалт</span></a></li>
      <li><a href="#"><i class="fa fa-link"></i> <span>Мессеж</span></a></li>
      <li><a href="#"><i class="fa fa-link"></i> <span>Засварын түүх</span></a></li>
      <?php if (User::get('role_id') == '1') { ?>
      <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Компанийн тохиргоо</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">

            <li><a href="company_insert.php">Компани үүсгэх</a></li>
            <li><a href="company_list.php">Компани жагсаалт</a></li>
            <li><a href="#">Үр дүнгийн тайлан</a></li>


        </ul>
      </li>
      <?php  } ?>
    </ul>


    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
<?php  ?>
