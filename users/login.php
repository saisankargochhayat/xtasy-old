<?php
 require '../portal/connectdb.php';

 require '../portal/loggedin.php';

 if(isset($_SESSION['xtid'])){
 	header('location:index.php');
 }

 else{

 function invalid(){
   echo "<div class=\"alert alert-warning alert-dismissible\" role=\"alert\">
 <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
 Invalid Username or Password</div>";
 }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="images/favicon.png">

	<title>LOGIN XTASY</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:300,200,100' rel='stylesheet' type='text/css'>

	<!-- Bootstrap core CSS -->
	<link href="js/bootstrap/dist/css/bootstrap.css" rel="stylesheet">

	<link rel="stylesheet" href="fonts/font-awesome-4/css/font-awesome.min.css">

	<!-- Custom styles for this template -->
	<link href="css/style.css" rel="stylesheet" />

</head>

<body class="texture">

<div id="cl-wrapper" class="login-container">

	<div class="middle-login">
		<div class="block-flat">
			<div class="header">
				<h3 class="text-center"><img class="logo-img" src="logo.png" alt="logo" height="150px" /></h3>
			</div>
			<div>
				<form  class="form-horizontal" action="login.php" method="POST">

					<div class="content">
            <?php
              if(isset($_GET['register']) && $_GET['register']=='success'){
                echo "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
   You have successfully registered.</div>";
              }
              if(isset($_GET['mail'])){
                if($_GET['mail']=='75ab8d4b6e92b3679481cc71be88f49b'){
                  echo "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
     Your mail has been verified.</div>";
                }elseif($_GET['mail']=='not_verified') {
                  echo "<div class=\"alert alert-warning\" role=\"alert\">Please check your email to verify your account.</div>";
                }
              }
              if(isset($_GET['changepassword'])){
                if($_GET['changepassword']=='success'){
                  echo "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
   Password Succesfully Changed</div>";
 }else{
   echo "<div class=\"alert alert-warning alert-dismissible\" role=\"alert\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
Password could not be changed</div>";
 }
              }
            ?>
						<h4 class="title">Login Access</h4>
					<?php if (isset($_POST['email']) && isset($_POST['password'])) {
						$email = $_POST['email'];
					$password = $_POST['password'];


						if(!empty($email)&&!empty($password)) {
							$password_hash = md5($password.$salt);

							$query = "SELECT xtasy_id,is_verified FROM tbl_student WHERE (email LIKE ? AND password LIKE ?)";
							$stmt = $conn->prepare($query);

	   						if($stmt->execute(array($email,$password_hash))){
							$query_num_rows= $stmt->rowCount();
								if($query_num_rows==0){
												invalid();
										}
								else if($query_num_rows==1){
										$user = $stmt->fetch();  #grabs user xtasyid
                    if($user['is_verified']){
  										ob_start();
  										$_SESSION['xtid']=$user['xtasy_id'];
  										header('location:index.php');
                    }else{
                      header('location:login.php?mail=not_verified');
                    }
									}

							}
								else {
									echo "There is a problem connecting to the server. Please try again later.";
								}


								} else{
                  echo "<div class=\"alert alert-warning alert-dismissible\" role=\"alert\">
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
   You must supply an email and password</div>";
								}
							}
									?>
							<div class="form-group">
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input type="email" placeholder="Email Id" id="username" class="form-control" name="email">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock"></i></span>
										<input type="password" placeholder="Password" id="password" class="form-control" name="password">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<div class="input-group">
										<div>Forgot Password? <a href="forgot.php">Click Here</a></div>
									</div>
								</div>
							</div>

					</div>
					<div class="foot">
						<a href="register.php"><button class="btn btn-default" data-dismiss="modal" type="button">Register</button></a>
						<button class="btn btn-primary" data-dismiss="modal" type="submit">Log me in</button>
					</div>
				</form>
			</div>
		</div>
		<div class="text-center out-links"><a href="#">&copy; 2016 TEAM XTASY</a></div>
	</div>

</div>

<script src="js/jquery.js"></script>
	<script type="text/javascript" src="js/behaviour/general.js"></script>

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
