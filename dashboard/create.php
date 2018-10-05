<?php require 'inc/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php require 'inc/sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Зээл
        <small>Зээл үүсгэх</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>
     <?php include '../Classes/Zeel.php';
           $zeel = new Zeel();


      ?>

    <!-- Main content -->
    <section class="content">
          <div class="box box-primary">
              <form id="addcreditform" method="POST" enctype="multipart/form-data"  action="../Classes/zeelProcess.php">
                  <div class="box-body">
                      <div class="row">

      					            <div class="col-md-2">

                              <div class="form-group">
                                  <label>Гэрээний</label>
                                  <input type="text" readonly name="id" class="form-control" placeholder="Дугаар" maxlength="30">
                              </div>

                          </div>
                          <!-- /.col -->
                          <div class="col-md-2">
                              <div class="form-group">
                                   <label>Регистр <span class="text-red">*</span> </label>
                    								 <div class="input-group">
                    									           <input type="text" id="register_number" readonly name="register_number" class="form-control" value="<?php echo Session::get('emptyRegister'); ?>" maxlength="10">
                                                 <span class="text-danger"></span>
                    									<div class="input-group-btn">
                    									  <button type="button" class="btn bg-green history_btn" data-toggle="tooltip" title="Зээлийн түүх"><i class="fa fa-fw fa-history"></i></button>
                    									</div>
      									<!-- /btn-group -->
      								</div>
      								<!-- <input type="hidden" name="agoregister" value=""> -->
                              </div>
                          </div>
                          <!-- /.col -->
                          <div class="col-md-2">
                              <div class="form-group">
                                  <label>Овог <span class="text-red">*</span></label>
                                  <input type="text" name="obog" id="obog" value="" class="form-control" placeholder="Овог" maxlength="30">
                                  <span class="text-danger"></span>
                              </div>
                              <!-- /.form-group -->
                          </div>
                          <!-- /.col -->
                          <div class="col-md-2">
                              <div class="form-group">
                                  <label>Нэр <span class="text-red">*</span> </label>
                                  <input type="text" name="ner" id="ner" value="" class="form-control" placeholder="Нэр" maxlength="30">
                                  <span class="text-danger"></span>
                              </div>
                              <!-- /.form-group -->
                          </div>
                          <!-- /.col -->
                          <div class="col-md-2">
                              <div class="form-group">
                                  <label>Гар утас <span class="text-red">*</span> </label>
                                  <input type="text" name="dugaar" id="dugaar"  value="" class="form-control" placeholder="Дугаар" maxlength="8" >
                                  <span class="text-danger"></span>
                              </div>
                              <!-- /.form-group -->
                          </div>
                          <!-- /.col -->
                          <div class="col-md-2">
                              <div class="form-group">
                                  <label>Нэмэлт утас</label>
                                  <input type="text" id="nemelt_utas" name="nemelt_utas" class="form-control findphone ui-autocomplete-input" placeholder="Утас" maxlength="40" autocomplete="off">
                                  <span class="text-danger"></span>
                              </div>
                              <!-- /.form-group -->
                          </div>
                          <!-- /.col -->
                      </div>
                      <!-- /.row -->
                      <div class="row">
      					<div class="col-md-3">
      							<div class="form-group">
      								<div class="input-group">
      									<span class="input-group-addon"><i class="fa fa-folder-open"></i></span>
                        <select class="form-control" id="creditcategoryid" name="zturul_id" title="Зээлийн ангилал сонгох">
      									<option id="op2" value="">Ангилал сонгох</option>
                          <?php
                          $result = $zeel->zturul();
                          if(mysqli_num_rows($result) > 0){

                            while($result1 = mysqli_fetch_assoc($result)){ ?>
                              <option value="<?php echo $result1['zturul_id']; ?>"><?php echo $result1['zturul_name']; ?></option>
                          <?php  } }else{ echo "no result"; } ?>
                                      </select>
                                  </div>
                              </div>
                          </div>
                          <!-- /.col -->
                          <div class="col-md-6">
                              <div class="form-group">
                                  <div class="input-group">
                                      <input type="text" id="hayg" name="hayg" class="form-control findaddress ui-autocomplete-input" placeholder="Хаяг" maxlength="150" autocomplete="off"><span class="input-group-addon">150</span></div>
                              </div>
                          </div>
                          <!-- /.col -->
                          <div class="col-md-3">
      					             <div class="btn-group pull-right">
      						            <button type="button" class="btn btn-primary camera_btn">
                                <i class="fa fa-camera"></i> Камер</button>

                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                <i class="fa fa-user-plus"></i> Хамтран</button>

                                  <input type="hidden" class="friendid" id="hamttai" name="hamtran_id" class="form-control" value="">

                          </div>
      					            </div>
                          <!-- /.col -->
                      </div>
                      <!-- /.row -->
                      <div id="dynamicform" style="display:none;">
      									<div class="row">
      	                <div class="col-md-5">
                            <div class="form-group">
                              <label>Төрөл <span class="text-red">*</span>
                              </label>
                              <textarea name="delgerengui" id="delgerengui" class="form-control" rows="4"
                              placeholder="Дэлгэрэнгүй бичнэ үү ..." maxlength="200"></textarea>
                              <span class="text-danger"></span>
                            </div>

              </div>
          <div class="col-md-7">
              <div class="row">
                <div class="col-md-4">
          			<div class="form-group">
                  <label>Огноо</label>
          				<div class="input-group" data-toggle="tooltip" data-original-title="Эхлэх огноо">
          					<span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
          					<input type="text" name="startdate" style="color: #000; cursor: cell;"
          					class="form-control singledatepicker"
          					required="" value="<?php echo date("Y-m-d"); ?>" id="datepicker"
          					readonly="readonly">
          				</div>
          			</div>
          			</div>

      			<div class="col-md-4">
      				<div class="form-group">
                <label>Хоног</label>
      					<div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sun-o">
                </i>
              </span>
                <select class="form-control" name="honog_id" id="getdayid" title="Хоног сонгох">


                </select>
                <span class="text-danger"></span>
              </div>
      		</div>
      	</div>
      	<div class="col-md-4">
      		<div class="form-group"> <label>Хүү</label>
      			<div  class="input-group">
              <input type="text"
                      name="honog_huu" id="loan_khuu" class="form-control bignumber auto"
                     data-v-min="0" data-v-max="30"
                      data-m-dec="2" data-toggle="tooltip"
                    title="Хоногт харгалзах хүү" value=""
                    placeholder="0.00" maxlength="3">


      			</div>
      		</div>
      	</div>


      </div>
      <div class="row">
      	<div class="col-md-4">
      		<div class="form-group"> <label>Үнэлгээ 1</label>
      			<div class="input-group">
              <input type="text" id="foo1" name="unelgee" class="form-control bignumber auto" placeholder="0.00" data-v-min="0" data-v-max="1000000000" data-m-dec="2" maxlength="10">
              <span class="input-group-addon">₮</span>
            </div>
      		</div>

      	</div>
      	<div class="col-md-4">
      		<div class="form-group"><label>Зээлийн хэмжээ</label>
      			<div class="input-group">
              <input type="text" id="foo" name="creditzeel" class="form-control" data-v-min="0" data-v-max="1000000000" data-m-dec="2" data-toggle="tooltip" title="Нийт зээлийн хэмжээ" placeholder="0.00" maxlength="10" value="">
              <span class="input-group-addon">₮</span>
              <span class="text-danger"></span>
            </div>
      		</div>
      	</div>
      	<!-- /.col -->			</div>
      <!-- /.row -->
      <div class="row">
      	<div class="col-md-12">
          <div class="form-group">
      	  <div class="table-responsive">
      		<table class="table" style="font-size: 20px;">
      		  <tbody>
            <tr>
      			<th style="width:25%">Дуусах өдөр:</th>
      			<td style="width:25%">
               <input type="text" readonly id="enddate" name="enddate" class="form-control" value=""/>
            </td>
      			<th style="width:25%">Хүү:</th>
      			<td style="width:25%"  >
               <input type="number" readonly id="sumkhuu" name="tuluh_huu" class="form-control" value=""/>

            </td>

            </td>
      		  </tr>
      		</tbody>
        </table>
        	</div>
      	  </div>
      	</div>
      </div>
      <!-- /.row -->
          </div>
      </div>

      </div>
                      <!-- /.row -->
      				<div class="row">
      				<div class="col-md-12">
      				<div id="photos"></div>
      				</div>
      				</div>
                  </div>

                  <div class="form group">
                  <input type="hidden" id="company_id" name="company_id" value="<?php echo User::get('company_id'); ?>">
                  <input type="hidden" id="branch_id" name="branch_id" value="<?php echo User::get('branch_id'); ?>">
                  <input type="hidden" id="user_id" name="user_id" value="<?php echo User::get('user_id'); ?>">
                  <input type="hidden" id="role_id" name="role_id" value="<?php echo User::get('role_id'); ?>">

                  <input type="hidden" id="photo_id" name="photo_id" value="1">
                </div>
                  <!-- /.box-body -->
                  <div class="form-group box-footer">
                      <button type="submit" name="submit" class="btn btn-primary" id="submitbtn">
                        <i class="fa fa-fw fa-play"></i> Гэрээ байгуулах</button>
                  </div>
              </form>
      		<div class="mainoverlay" style="display: none;"><i class="fa fa-refresh fa-spin"></i></div>
          </div>
          <!-- /.box -->
      </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Хамтран зээлдэгчийн мэдээлэл</h4>
      </div>

      <form id="hamtranForm" action="../Classes/ajaxProcess.php" method="post">
      <div class="modal-body">

          <label for="">Зээлдэгчийн овог</label>
          <input type="text" id="hamtran_lastname" name="hamtran_lastname" placeholder="Хамтран зээлдэгчийн овог" class="form-control" />
          <br>
          <label for="">Зээлдэгчийн нэр</label>
          <input type="text" id="hamtran_firstname" name="hamtran_firstname" placeholder="Хамтран зээлдэгчийн нэр" class="form-control" />
          <br>
          <label for="">Зээлдэгчийн регистрийн дугаар</label>
          <input type="text" id="hamtran_register" name="hamtran_register" placeholder="Хамтран зээлдэгчийн регистрийн дугаар" class="form-control"  />
          <br>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Оруулах</button>
        <button type="button" class="btn btn-default"  data-dismiss="modal">Хаах</button>
      </div>
      </form>
    </div>

  </div>
</div>
  <!-- Main Footer -->
  <?php require 'inc/Footer.php'; ?>
