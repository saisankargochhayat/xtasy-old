<?php

require '../../portal/connectdb.php';
if(isset($_GET['token'])&&$_GET['account']){
$token = $_GET['token'];
$email = $_GET['account'];
}


// Token Check 1st

	$sql5 = "SELECT xtasy_id FROM tbl_student WHERE email = ?";
			$stmt = $conn->prepare($sql5);
			$stmt->execute(array($email));
			$abc = $stmt->fetch();
			if($token == md5($abc['xtasy_id'].$salt)){


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="images/favicon.png">

	<title>Password reset</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:300,200,100' rel='stylesheet' type='text/css'>

	<!-- Bootstrap core CSS -->
	<link href="../js/bootstrap/dist/css/bootstrap.css" rel="stylesheet">

	<link rel="stylesheet" href="../fonts/font-awesome-4/css/font-awesome.min.css">

	<!-- Custom styles for this template -->
	<link href="../css/style.css" rel="stylesheet" />

</head>

<body class="texture">

<div id="cl-wrapper" class="login-container">

	<div class="middle-login">
		<div class="block-flat">
			<div class="header">
				<h3 class="text-center"><img class="logo-img" src="../logo.png" alt="logo" height="150px" /></h3>
			</div>
			<div>
				<form style="margin-top: 20px !important;" class="form-horizontal" action="check.php" method="POST">

					<div class="content">
						<?php
						if(isset($_GET['confirmpassword'])){
							if($_GET['confirmpassword']=='failed'){
								echo "<div class=\"alert alert-success alert-danger\" role=\"alert\">
								<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
								 Passwords don't match</div>";
							 }
						 }
						?>
						<h4 class="title">Change Password</h4>
						<div class="form-group hidden">
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input type="text" class="form-control"  name="token" value="<?php echo $token ?>">
									</div>
								</div>
							</div>
						<div class="form-group hidden">
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input type="email" class="form-control"  name="email" value="<?php echo $email ?>">
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock"></i></span>
										<input type="password" placeholder="Password" id="password" required="Enter both fields"class="form-control" name="password">
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock"></i></span>
										<input type="password" placeholder="Password" id="password" required="Enter both fields" class="form-control" name="password2">
									</div>
								</div>
							</div>

					</div>
					<div class="foot text-center">
						<input type="submit" >

					</div>
				</form>
			</div>
		</div>
		<div class="text-center out-links"><a href="#">&copy; 2016 TEAM XTASY</a></div>
	</div>

</div>

<script src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/behaviour/general.js"></script>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
  <script src="../js/behaviour/voice-commands.js"></script>
  <script src="../js/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/jquery.flot/jquery.flot.js"></script>
<script type="text/javascript" src="../js/jquery.flot/jquery.flot.pie.js"></script>
<script type="text/javascript" src="../js/jquery.flot/jquery.flot.resize.js"></script>
<script type="text/javascript" src="../js/jquery.flot/jquery.flot.labels.js"></script>
</body>
</html>

<?php
			}

			else{
				echo "Do not try to fuck us !! We are not fools !";
			}
?>
