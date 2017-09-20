<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Panel</title>
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
	<link rel="stylesheet" type="text/css" href="js/jquery.datatables/bootstrap-adapter/css/datatables.css" />
  <link href="css/style.css" rel="stylesheet" />

  </head>

  <body>
	   <div class="container-fluid" id="pcont">
  			<div class="page-head">
  				<h2>Admin Panel</h2>
          <h2 class="pull-right">Total Registrations : <?php require '../portal/loggedin.php'; echo gettotalreg();?></h2>
  				<ol class="breadcrumb">
  				  <li><a href="../">Xtasy</a></li>
  				  <li class="active">Event Details</li>
  				  <li><a href="user.php">User Details</a></li>
  			</div>
  		<div class="cl-mcont">
  			<div class="row">
  				<div class="col-md-12">
  					<div class="block-flat">
  						<div class="header">
  							<h3>Event Registration Details</h3>
  					</div>
              <select onchange="changeFunction(this.value);">
                <option value = 0>All</option>
              <?php
                require '../portal/connectdb.php';
                $query = "SELECT event_name,id FROM tbl_event";
                $stmt = $conn->prepare($query);
                if($query_run= $stmt->execute()){
                  while($row = $stmt->fetch()){
                ?>
                <option value = <?php echo $row['id']?>><?php echo $row['event_name'] ?></option>
              <?php  } }  ?>
            </select>
              <div id="loadcontent">
              </div>
  					</div>
  				</div>
  			</div>
        <div class="row">
  				<div class="col-md-12">
  					<div class="block-flat">
  						<div class="header">
  							<h3>Total Registrations</h3>
  						</div>
  						<div class="content">
  							<div class="table-responsive">
  								<table class="table table-bordered" id="datatable" >
  									<thead>
  										<tr>
  											<th>Event Name</th>
  											<th>Total Registrations</th>
  										</tr>
  									</thead>
  									<tbody>
                      <?php
                      require '../portal/connectdb.php';
                      $query = " SELECT tbl_event.event_name AS name,
                      COUNT(tbl_event.id) AS n FROM `tbl_participation` INNER
                      JOIN tbl_event WHERE tbl_participation.event_id =
                      tbl_event.id GROUP BY event_id";
                      $stmt = $conn->prepare($query);
                      if($query_run= $stmt->execute()){
                        while($row = $stmt->fetch()){
                      ?>
                        <tr>
                          <td><?php echo $row['name']?></td>
                          <td><?php echo $row['n']?></td>
                        </tr>
                      <?php } }?>
  									</tbody>
  								</table>
  							</div>
  						</div>
  					</div>
  				</div>
  			</div>

  		  </div>
		</div>


  <script src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery.nanoscroller/jquery.nanoscroller.js"></script>
	<script type="text/javascript" src="js/jquery.sparkline/jquery.sparkline.min.js"></script>
	<script type="text/javascript" src="js/jquery.easypiechart/jquery.easy-pie-chart.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
	<script type="text/javascript" src="js/behaviour/general.js"></script>
  <script src="js/jquery.ui/jquery-ui.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.nestable/jquery.nestable.js"></script>
	<script type="text/javascript" src="js/bootstrap.switch/bootstrap-switch.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
  <script src="js/jquery.select2/select2.min.js" type="text/javascript"></script>
  <script src="js/bootstrap.slider/js/bootstrap-slider.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.gritter/js/jquery.gritter.js"></script>
	<script type="text/javascript" src="js/jquery.datatables/jquery.datatables.min.js"></script>
	<script type="text/javascript" src="js/jquery.datatables/bootstrap-adapter/js/datatables.js"></script>

  <script type="text/javascript">
    //Add dataTable Functions
    $(document).ready(function(){
      //initialize the javascript
      App.init();
      App.dataTables();


      var value =0;
        //console.log(value);
        $.get('data.php?event_id='+value).success(function(data){
        //console.log(data);
        $('#loadcontent').empty();
        $('#loadcontent').append(data);
      });
      $.get('csv_export.php?event_id='+value);
        $('.dataTables_filter input').addClass('form-control').attr('placeholder','Search');
        $('.dataTables_length select').addClass('form-control');
    });
  </script>

  <script>
  function changeFunction(value){
    console.log(value);
    $.get('data.php?event_id='+value).success(function(data){
      console.log(data);
      $('#loadcontent').empty();
      $('#loadcontent').append(data);
    })
    $.get('csv_export.php?event_id='+value);
  };

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
