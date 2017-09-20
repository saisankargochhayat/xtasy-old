<?php
require '../portal/connectdb.php';
require '../portal/loggedin.php';


if (loggedin()) {

?>
<!DOCTYPE html>
<html lang="en">
  <head>

		<!--/HEADER-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../favicon.ico">

    <title>Xtasy Profile</title>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:300,200,100' rel='stylesheet' type='text/css'>
    <!-- Bootstrap core CSS -->
    <link href="js/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="js/jquery.gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" href="fonts/font-awesome-4/css/font-awesome.min.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="js/jquery.nanoscroller/nanoscroller.css" />
    <link rel="stylesheet" type="text/css" href="js/jquery.easypiechart/jquery.easy-pie-chart.css" />
    <link rel="stylesheet" type="text/css" href="js/bootstrap.switch/bootstrap-switch.css" />
    <link rel="stylesheet" type="text/css" href="js/bootstrap.datetimepicker/css/bootstrap-datetimepicker.min.css" />
    <link rel="stylesheet" type="text/css" href="js/jquery.select2/select2.css" />
    <link rel="stylesheet" type="text/css" href="js/bootstrap.slider/css/slider.css" />
     <link rel="stylesheet" type="text/css" href="js/jquery.niftymodals/css/component.css" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <link type="text/css" rel="stylesheet" href="js/prettify/prettify.css" />

    </head>
<body>
		<div class="container-fluid" id="pcont">
			<div class="page-head">
				<h2>Hello <?php echo getuserfield('first_name')?>
          <a href="logout.php"><button type="button" class="btn btn-info btn-rad pull-right">Log Out</button></a></h2>
				<ol class="breadcrumb">
				  <li><a href="../">Home</a></li>
				  <li class="active">Dashboard</li>
				</ol>
			</div>
		<div class="cl-mcont">
			<div class="row">
				<div class="col-sm-12 col-md-12">
					<div class="block-flat">
						<div class="header">
              <div id="msg"></div>
							<h3>User Profile
                <a href="receipt.php" target="_blank"><button type="button" class="btn btn-primary btn-rad pull-right">Print Receipt</button></a><button type="button" class="btn btn-success btn-rad md-trigger pull-right" data-modal="form-new">
                  Edit</button><button type="button" class="btn btn-primary btn-rad md-trigger pull-right" data-modal="form-cpass">Change Password</button>
              </h3>
						</div>

       <!-- Modal popup Form -->
              <form action="edit.php" method="POST">
                <div class="md-modal colored-header custom-width md-effect-9" style="margin-top:100px;" id="form-new">

                    <div class="md-content">

                      <div class="modal-header">
                        <h4>Edit Fields<button type="button" class="close md-close pull-right" data-dismiss="modal" aria-hidden="true">&times;</button></h4>
                      </div>

                      <div class="modal-body form">
                        <div class="form-group">

                          <label>First Name</label> <input type="name" name="first_name" class="form-control" value="<?php echo getuserfield('first_name');?>">
                        </div>


                        <div class="row">
                          <div class="form-group col-md-12 no-margin">
                            <label>Last Name</label><input type="name" class="form-control" name="last_name" value="<?php echo getuserfield('last_name');?>">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-12 no-margin">
                            <label>Year of Study</label><br>

                            <label class="radio-inline">
                              <input type="radio" name="year" id="inlineRadio1" value="1st" <?php if(getuserfield('year')=='1st') echo "checked=\"checked\"" ?>> 1st Year
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="year" id="inlineRadio2" value="2nd" <?php if(getuserfield('year')=='2nd') echo "checked=\"checked\"" ?>> 2nd Year
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="year" id="inlineRadio3" value="3rd" <?php if(getuserfield('year')=='3rd') echo "checked=\"checked\"" ?>> 3rd Year
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="year" id="inlineRadio3" value="4th" <?php if(getuserfield('year')=='4th') echo "checked=\"checked\"" ?>> 4th Year
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="year" id="inlineRadio3" value="5th" <?php if(getuserfield('year')=='5th') echo "checked=\"checked\"" ?>> 5th Year
                            </label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-12 no-margin">
                            <label>College</label>
                            <select class="form-control" required value="Fill In Your College Name" name="college">
                                <option></option>
                                <?php
                                  require '../portal/connectdb.php';
                                  $query = "SELECT * FROM tbl_college";
                                  $stmt = $conn->prepare($query);
                                  if($query_run= $stmt->execute()){
                                    while($row = $stmt->fetch()){
                                      if($row['id']==getuserfield('college')){
                                  ?>
                                  <option value = <?php echo $row['id']?> selected="selected"><?php echo $row['college_name']." ".$row['dist'] ?></option>
                                <?php  }else{
                                  ?>
                                  <option value = <?php echo $row['id']?>><?php echo $row['college_name']." ".$row['dist'] ?></option>
                                <?php }}}  ?>
                            </select>
                          </div>
                        </div>
                       <div class="row">
                        <div class="col-sm-6 col-xs-6">
                          <label>Age:</label>
                            <input name = "age" type="number" required class="form-control" value="<?php echo getuserfield('age');?>"></input>
                              </div>


                        <div class="col-sm-6 col-xs-6">
                          <div style="padding-left:12px;" class="input-group">

                            <label>Gender:</label>
                            <br>
                              <span class="radio-inline">
                                <?php if(getuserfield('sex')=='male'){?>
                                  <input type="radio" name="sex" id="inlineRadio1" value="male" checked="checked"> Male
                                </span>
                                <span class="radio-inline">
                                  <input type="radio" name="sex" id="inlineRadio2" value="female"> Female
                                <?php }else{?>
                                  <input type="radio" name="sex" id="inlineRadio1" value="male"> Male
                                </span>
                                <span class="radio-inline">
                                  <input type="radio" name="sex" id="inlineRadio2" value="female" checked="checked"> Female
                                <?php } ?>
                              </span>
                                </div>
                              </div>
                            </div>
                        <div class="row">
                          <div class="form-group col-md-12 no-margin">
                            <!--<div class="g-recaptcha" data-sitekey="6LfmARYTAAAAAPM6nOiJIX9EIXtd16VXVeebjoGf"></div>-->
                          </div>
                        </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat md-close" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-flat md-close" name="submit" data-dismiss="modal">Submit</button>
                      </div>

                      </div>
                    </div>
                    <div class="md-overlay"></div>

                  </form>
                  <!-- End Of Modal -->
                  <!--Change password popup-->
                    <div class="md-modal colored-header custom-width md-effect-9" id="form-cpass">
                      <form id="forgotpass">
                        <div class="md-content">

                          <div class="modal-header">
                            <button type="button" id='closebutton' class="close md-close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4>Change Password</h4>
                          </div>
                          <div id='modalmsg'>
                          </div>
                          <div class="modal-body form" id="change-pass-form">
                            <div class="form-group">

                              <label>Current Password</label> <input type="password" name="currpass" class="form-control passinput">
                            </div>


                            <div class="row">
                              <div class="form-group col-md-12 no-margin">
                                <label>New Password</label><input type="password" name="newpass" class="form-control passinput" >
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-md-12 no-margin">
                                <label>Confirm New Password</label><input type="password" name="newpass1" class="form-control passinput" >
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-flat md-close" data-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary btn-flat" data-dismiss="modal" id='fpsubmit'>Submit</button>
                          </div>

                          </div>
                          </form>
                        </div>
                        <div class="md-overlay"></div>

                      <!--End of changepassword popup-->

				<div class="content">
              <div class="row">
                <div class="col-sm-2 col-xs-2">
                  <h4>Xtasy ID:</h4>
                </div>
                <div class="col-sm-6 col-xs-6">
                  <h4><?php  echo strtoupper(getuserfield('xtasy_id')); ?></h4>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-2 col-xs-2">
                  <h4>Name:</h4>
                </div>
                <div class="col-sm-6 col-xs-6">
                  <h4><?php  echo strtoupper(getuserfield('first_name'));echo " "; echo strtoupper(getuserfield('last_name'));  ?></h4>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-2 col-xs-2">
                  <h4>Email:</h4>
                </div>
                <div class="col-sm-6 col-xs-6">
                  <h4><?php  echo getuserfield('email'); ?></h4>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-2 col-xs-2">
                  <h4>College :</h4>
                </div>
                <div class="col-sm-6 col-xs-6">
                  <h4><?php  echo strtoupper(getuserfield('college_name')." ".getuserfield('dist')); ?></h4>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-2 col-xs-2">
                  <h4>Gender:</h4>
                </div>
                <div class="col-sm-6 col-xs-6">
                  <h4><?php  echo strtoupper(getuserfield('sex')); ?></h4>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-2 col-xs-2">
                  <h4>Mobile:</h4>
                </div>
                <div class="col-sm-6 col-xs-6">
                  <h4><?php  echo strtoupper(getuserfield('mobile')); ?></h4>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-2 col-xs-2">
                  <h4>Age:</h4>
                </div>
                <div class="col-sm-6 col-xs-6">
                  <h4><?php  echo strtoupper(getuserfield('age')); ?></h4>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-2 col-xs-2">
                  <h4>Year:</h4>
                </div>
                <div class="col-sm-6 col-xs-6">
                  <h4><?php  echo getuserfield('year'); ?></h4>
                </div>
              </div>
						</div>
					</div>
        </div></div>
    </div>
				<div class="cl-mcont" style="margin-top:-150px" >


      <div class="row">
        <div class="col-sm-12 col-md-12">
          <div class="block-flat">
            <div class="header row">
              <div class="col-sm-9 col-md-9">
                <h3><strong>You have Registered for the following Events : </strong></h3>
              </div>
              <div class="col-sm-3 col-md-3">
                <h3><strong>Price : </strong></h3>
              </div>
            </div>
            <div class="content">
            <?php
            $id=getuserid($_SESSION['xtid']);
              $query="SELECT * FROM tbl_participation INNER JOIN tbl_event ON
              tbl_participation.event_id=tbl_event.id WHERE  student_id = :sid";
              $stmpt = $conn->prepare($query);
        			$stmpt->bindParam(':sid',$id,PDO::PARAM_INT);
              $stmpt->execute();
              $total_fee=0;
              while($row=$stmpt->fetch()){
                $total_fee=$total_fee+$row['fee'];
              ?>
                  <div class="row">
                    <div class="col-sm-6 col-xs-6">
                      <h4><?php echo $row['event_name']?></h4>
                    </div>
                    <div class="col-sm-4 col-xs-4">
                      <h4><?php
                        if($row['team']!=NULL){
                          $query="SELECT * FROM tbl_groups INNER JOIN tbl_student ON
                          tbl_groups.leader=tbl_student.id WHERE tbl_groups.id = :gid";
                          $stmpt = $conn->prepare($query);
                          $stmpt->bindParam(':gid',$row['team'],PDO::PARAM_INT);
                          if($stmpt->execute()){
                            $row1=$stmpt->fetch();
                            if($row1['leader']==$id){
                              echo "You are the leader";
                            }else{
                              echo $row1['first_name']." ".$row1['last_name'];
                            }
                          }else{
                            echo "Cannot connect to db";
                          }
                        }
                      ?></h4>
                    </div>
                    <div class="col-sm-2 col-xs-2">
                      <h4><?php echo 'Rs '.$row['fee']?></h4>
                    </div>
                  </div>
            <?php
                }
            ?>
            <hr>
            <?php if(getuserfield('college_name')!='COLLEGE OF ENGINEERING & TECHNOLOGY'){
              $total_fee = $total_fee+100?>
            <div class="row">
              <div class="col-sm-6 col-xs-6">
                <h4></h4>
              </div>
              <div class="col-sm-4 col-xs-4">
                <h4>Central Registration</h4>
              </div>
              <div class="col-sm-2 col-xs-2">
                <h4><?php echo 'Rs 100'?></h4>
              </div>
            </div>
            <?php }?>
            <div class="row">
              <div class="col-sm-6 col-xs-6">
                <h4></h4>
              </div>
              <div class="col-sm-4 col-xs-4">
                <h4><strong>Total</strong> (To be paid at the Registration Desk)</h4>
              </div>
              <div class="col-sm-2 col-xs-2">
                <h4><strong><?php echo 'Rs '.$total_fee?></strong></h4>
              </div>
            </div>
            </div>
          </div>

						</div>
					</div>
				</div>
			</div>


    <!--</div>-->
  <style>
    .content > .row{
      margin: 0px;
    }
    #form-new{
      margin-top: 140px;
    }
    #form-cpass{
      margin-top: 40px;
    }
  </style>
  <script src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery.nanoscroller/jquery.nanoscroller.js"></script>
	<script type="text/javascript" src="js/jquery.sparkline/jquery.sparkline.min.js"></script>
	<script type="text/javascript" src="js/jquery.easypiechart/jquery.easy-pie-chart.js"></script>
	<script type="text/javascript" src="js/behaviour/general.js"></script>
  <script src="js/jquery.ui/jquery-ui.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.nestable/jquery.nestable.js"></script>
	<script type="text/javascript" src="js/bootstrap.switch/bootstrap-switch.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script src="js/jquery.select2/select2.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.slider/js/bootstrap-slider.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.gritter/js/jquery.gritter.js"></script>
   <script type="text/javascript" src="js/jquery.niftymodals/js/jquery.modalEffects.js"></script>
	<script type="text/javascript" src="js/prettify/run_prettify.js"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        //initialize the javascript
        App.init();
        $('.md-trigger').modalEffects();
        $('#fpsubmit').on('click',function(e){
          e.preventDefault();
          $.post('changepassword.php',$('#forgotpass').serialize(),function(data){
            console.log(data);
            if(JSON.parse(data)[0].passchanged=='success'){
              $('#msg').html("<div class=\"alert alert-success\" role=\"alert\">Password Succesfully Changed<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button></div>");
              $('#closebutton').click();
            }else{
              if(JSON.parse(data)[0].dberror=='true')
                $('#modalmsg').append("<div class=\"alert alert-danger\" role=\"alert\">There is some error. Please try later.<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button></div>");
              if(JSON.parse(data)[0].confirmpass=='false')
                $('#modalmsg').append("<div class=\"alert alert-danger\" role=\"alert\">The password you entered is wrong.<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button></div>");
              if(JSON.parse(data)[0].comparepass=='false')
                $('#modalmsg').append("<div class=\"alert alert-danger\" role=\"alert\">The new password do not match<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button></div>");
              if(JSON.parse(data)[0].newpass=='notset')
                $('#modalmsg').append("<div class=\"alert alert-danger\" role=\"alert\">Please enter the new password<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button></div>");
              if(JSON.parse(data)[0].currpass=='false')
                $('#modalmsg').append("<div class=\"alert alert-danger\" role=\"alert\">Please enter the current password<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button></div>");
            }
            $('.passinput').each(function(){
              this.value="";
            });
          });
        })
      });
    </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
      <script src="js/behaviour/voice-commands.js"></script>
  <script src="js/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.flot/jquery.flot.js"></script>
	<script type="text/javascript" src="js/jquery.flot/jquery.flot.pie.js"></script>
	<script type="text/javascript" src="js/jquery.flot/jquery.flot.resize.js"></script>
	<script type="text/javascript" src="js/jquery.flot/jquery.flot.labels.js"></script>
  </body>
</html>
<?php

}
else{
  header('Location:login.php');
}


?>
