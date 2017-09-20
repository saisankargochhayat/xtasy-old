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
    <link rel="stylesheet" type="text/css" href="receipt.css">


    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:300,200,100' rel='stylesheet' type='text/css'>


    <!-- Bootstrap core CSS -->
    <link href="js/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="js/jquery.gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" href="fonts/font-awesome-4/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="js/jquery.select2/select2.css" />


    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <link type="text/css" rel="stylesheet" href="js/prettify/prettify.css" />


</head>
<body>
    <div class="container" id="pcont">
    <div class="cl-mcont">
      <div class="row" >
        <div class="col-sm-12 col-md-12">
          <div class="block-flat">
            <div class="header">
              <div id="msg"></div>
              <h2 class="text-center"><strong>Registration Details</strong><div class="pull-left"><img style="height:100px;" src="logo.png"></div><div class="pull-right"><img style="height:100px;" src="cet.jpg"></div></h2>
                <h5 class="text-center" >Team Xtasy, College Of Engineering And Technology, Bhubaneswar</h5>
                <br><br>
            </div>

        <div class="content">
              <div class="row">
                <div class="text-center"><h1 style="font-weight:bold;"><?php  echo strtoupper(getuserfield('xtasy_id')); ?></h1></div>
              </div>
              <div class="row">
                <div class="col-sm-2 col-xs-2"><h4>Name:</h4></div>
                <div class="col-sm-10 col-xs-10"><h4><?php  echo strtoupper(getuserfield('first_name'));echo " "; echo strtoupper(getuserfield('last_name'));  ?></h4></div>
              </div>

              <div class="row">
                <div class="col-sm-2 col-xs-2"><h4>Email:</h4></div>
                <div class="col-sm-6 col-xs-6"><h4><?php  echo getuserfield('email'); ?></h4></div>
              </div>

              <div class="row">
                <div class="col-sm-2 col-xs-2"><h4>College :</h4></div>
                <div class="col-sm-10 col-xs-10"><h4><?php  echo strtoupper(getuserfield('college_name')." ".getuserfield('dist')); ?></h4></div>
              </div>
              <div class="row">
                <div class="col-sm-2 col-xs-2"><h4>Mobile:</h4></div>
                <div class="col-sm-6 col-xs-6"><h4><?php  echo strtoupper(getuserfield('mobile')); ?></h4></div>
              </div>



      <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="content">
              <h3>Event Details</h3>
              <table>
                <tr>
                  <th>Event Name</th>
                  <th>Group Name</th>
                  <th>Leader Name</th>
                  <th>Price</th>
                </tr>
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
                    <tr>
                      <td><?php echo $row['event_name']?></td>
                      <?php
                        if($row['team']!=NULL){
                          $query="SELECT * FROM tbl_groups INNER JOIN tbl_student ON
                          tbl_groups.leader=tbl_student.id WHERE tbl_groups.id = :gid";
                          $stmpt = $conn->prepare($query);
                          $stmpt->bindParam(':gid',$row['team'],PDO::PARAM_INT);
                          if($stmpt->execute()){
                            $row1=$stmpt->fetch();
                            if($row1['leader']==$id){
                              echo "<td>".$row1['group_name']."</td>";
                              echo "<td>"."Self"."</td>";
                            }else{
                              echo "<td>".$row1['group_name']."</td>";
                              echo "<td>".$row1['first_name']." ".$row1['last_name']."</td>";
                            }
                          }else{
                            //echo "Cannot connect to db";
                          }
                        }else{
                          echo"<td>N/A</td>";
                          echo"<td>N/A</td>";
                        }
                      ?>
                      <td><?php echo 'Rs '.$row['fee']?></td>
                  </tr>
                <hr>
            <?php
                }
            ?>
            <hr>
            <?php if(getuserfield('college_name')!='COLLEGE OF ENGINEERING & TECHNOLOGY'){
              $total_fee = $total_fee+100?>
            <tr>
              <td></td>
              <td></td>
              <td><strong>Central Registration</strong></td>
              <td>
                <strong>Rs 100</strong>
              </td>
            </tr><?php } ?>
              <td></td>
              <td></td>
              <td>
                <strong>Total</strong>
              </td>
              <td>
                <strong><?php echo 'Rs '.$total_fee?></strong>
              </td>
            </tr>
          </table>
          </div>
          </div>
        </div></div>
    </div>
    <!--</div>-->

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

  <style type="text/css">
    .cl-mcont .row {
  margin-top: 0px;
}

.block-flat .content h4 {
    margin-top: 4px;
}
.block-flat .content h1 {
    margin-top: 4px;
}

  </style>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
      <script src="js/behaviour/voice-commands.js"></script>
  <script src="js/bootstrap/dist/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.flot/jquery.flot.js"></script>
  <script type="text/javascript" src="js/jquery.flot/jquery.flot.pie.js"></script>
  <script type="text/javascript" src="js/jquery.flot/jquery.flot.resize.js"></script>
  <script type="text/javascript" src="js/jquery.flot/jquery.flot.labels.js"></script>
  <body onload="window.print()" />
  </body>
</html>
<?php

}
else{
  header('Location:login.php');
}


?>
