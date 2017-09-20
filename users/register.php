<?php

require '../portal/connectdb.php';
require '../portal/loggedin.php';

if(!loggedin()){


?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="images/favicon.png">


	<title>XTASY CETB</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:300,200,100' rel='stylesheet' type='text/css'>

	<!-- Bootstrap core CSS -->
	<link href="js/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
	<script src='https://www.google.com/recaptcha/api.js'></script>

	<link rel="stylesheet" href="fonts/font-awesome-4/css/font-awesome.min.css">


	<!-- Custom styles for this template -->
	<link href="css/style.css" rel="stylesheet" />

</head>

<body class="texture" >

	<div id="cl-wrapper" class="sign-up-container">

				<div class="middle-sign-up">
						<div class="block-flat">
						<div class="header">
						<h3 class="text-center"><img class="logo-img" src="logo.png" alt="logo" height="150px" /><h3>
						</div>
				<div>
					<form style="margin-bottom: 0px !important;" class="form-horizontal" action="register.php" method="POST" parsley-validate novalidate>
					<div class="content">
						<h5 class="title text-center"><strong>Register</strong></h5>
              			<hr/>
           <?php
					 require 'class.phpmailer.php';

           if(isset($_POST['submit'])&&isset($_POST['fname'])&&isset($_POST['lname'])&&isset($_POST['email'])&&isset($_POST['mobile'])&&isset($_POST['password1'])&&isset($_POST['password2'])&&isset($_POST['college'])&&isset($_POST['age'])&&isset($_POST['sex'])&&isset($_POST['year'])){
			 $fname = $_POST['fname'];
			 $lname = $_POST['lname'];
			 $email = $_POST['email'];
			 $mobile = $_POST['mobile'];
			 $password1 = $_POST['password1'];
			 $password2 = $_POST['password2'];
			 $college = $_POST['college'];
			 $age = $_POST['age'];
			 $sex = $_POST['sex'];
			 $year=$_POST['year'];
			$password_hash = md5($password1.$salt);

		if (!empty($fname)&&!empty($lname)&&!empty($email)&&!empty($mobile)&&!empty($password1)&&!empty($password2))
			{
				if($password1!=$password2)
				{
					echo 'Passwords do not match';
				}
			else
				{
					if(strlen($mobile)!=10){
						echo 'Please Enter a valid Mobile Number';
					}else{
					$query = "SELECT email FROM tbl_student WHERE email LIKE ?";
					$stmt = $conn->prepare($query);
					$stmt->execute(array($email));
					$query_num_rows= $stmt->rowCount();
					if($query_num_rows==1)
					{
						echo "The email id ".$email." has already been registered.";
					}
					else
					{
						$query2= "INSERT INTO tbl_student(xtasy_id, first_name, last_name, email, mobile, password, college, age, sex, year, create_date) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
						$stmt=$conn->prepare($query2);
						if($stmt->execute(array('xtas',$fname,$lname,$email,$mobile,$password_hash,$college,$age,$sex,$year,date("Y/m/d")))){
							$userid = $conn->lastInsertId(); #This piece returns us the id initialized
						#echo $userid."<br>";
							$xtasyid = "XT".$userid; #this appends the id to it
							$sql = "UPDATE tbl_student SET xtasy_id=? WHERE id=?";
							$stmt=$conn->prepare($sql);
							$x=$stmt->execute(array($xtasyid,$userid));
							if($x)
							{
								$token=md5($salt.$xtasyid);
								$verifylink = "http://xtasy.cetb.in/users/verifyemail.php?account=$email&token=".$token;

								$mail = new PHPMailer;
								// Set PHPMailer to use the sendmail transport
								$mail->isSendmail();
								//Set who the message is to be sent from
								$mail->setFrom('xtasy@cetb.in', 'CET B');
								//Set who the message is to be sent to
								$mail->addAddress( $email, $fname);
								//Set the subject line
								$mail->Subject = 'Xtasy 2k16 Registration';
								//Set the body
								$mail->Body = 'Hello '.$fname.', <br><br>
								Greetings from XTASY Team.<br><br>
								Thank you for registering. Team Xtasy welcomes you to the  Socio-Cultural Festival of College of Engineering and Technology, Bhubaneswar XTASY 2016.
								Here is your Xtasy ID-'.$xtasyid.'. You have to register all your events online against this ID.<br><br>
								Here is your verification link to verify your account <a href="'.$verifylink.'">'.$verifylink.'</a><br><br>
								For further details you can visit our Website.<br><br>
								Website:http://xtasy.cetb.in/<br>
								Facebook:https://www.facebook.com/xtasycetbbsr<br>
								Email: xtasy@cetb.in<br>
								';
								//send the message, check for errors
								if (!$mail->send()) {
								    echo "Mailer Error: " . $mail->ErrorInfo;
								} else {
								    echo "Message sent!";
								}
								#this will prevent them from performing F5 F5 and submitting multiple times
								//echo $verifylink;
								//header('Location:login.php?register=success&mail=not_verified');
							}
							else
							{
							echo "SORRY We couldn't register you in at this point of time.";
						}
					}
				}
				}
			}
		}
			else
			{
			echo 'Fields cannot be empty!';
			}


		}
		?>

							<div class="form-group">
								<div class="col-sm-12">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="text" placeholder="First Name" required id="firstname" class="form-control" name="fname" required>
								</div>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								<input type="text" placeholder="Last Name" required id="lastname" class="form-control" name="lname" required>
									</div>

							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								<input type="text" placeholder="Mobile Number" required class="form-control" name="mobile" required>
									</div>

							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
								<input type="email" name="email" parsley-trigger="change" parsley-error-container="#email-error" required placeholder="E-mail" class="form-control" required>
								</div><div id="email-error"></div>
								</div></div>
							<div class="form-group">
								<div class="col-sm-6 col-xs-6">
								<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock"></i></span>
										<input id="pass1" type="password" parsley-error-container="#password-error" placeholder="Password" name="password1" required class="form-control">
								</div><div id="password-error"></div>


								</div>
							<div class="col-sm-6 col-xs-6">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
									<input parsley-equalto="#pass1" type="password" parsley-error-container="#confirmation-error"required placeholder="Confirm Password" name="password2" class="form-control">
								</div>
                  					<div id="confirmation-error"></div>
								</div>
							<div class="col-sm-6 col-xs-6">
								<div class="input-group"  required>

								<label>Age: </label><br>
										<input type="number" required class="form-control" name="age"></input>
										</div>
									</div>
							<div class="col-sm-6 col-xs-6">
								<div style="padding-left:12px;" class="input-group" required>

									<label>Gender:</label>
									<br>
										<span class="radio-inline">
											  <input type="radio" name="sex" id="inlineRadio1" value="male"> Male
											</span>
											<span class="radio-inline">
											  <input type="radio" name="sex" id="inlineRadio2" value="female"> Female
										</span>
											</div>
										</div>
							<div class="col-sm-12 col-xs-12">
									<div class="input-group" >
									<label>College:</label>
										<select class="form-control" required value="Fill In Your College Name" name="college">
											  <option></option>
												<?php
					                require '../portal/connectdb.php';
					                $query = "SELECT * FROM tbl_college";
					                $stmt = $conn->prepare($query);
					                if($query_run= $stmt->execute()){
					                  while($row = $stmt->fetch()){
					                ?>
					                <option value = <?php echo $row['id']?>><?php echo $row['college_name']." ".$row['dist'] ?></option>
					              <?php  } }  ?>
										</select>
									</div>
									<div id="select-error"></div>
									</div>
							<div class="input-group" style="padding-left:14px;">
								<label>Year Of Study:</label><br>
										<label class="radio-inline">
										  <input type="radio" name="year" id="inlineRadio1" value="1st"> 1st Year
										</label>
										<label class="radio-inline">
										  <input type="radio" name="year" id="inlineRadio2" value="2nd"> 2nd Year
										</label>
										<label class="radio-inline">
										  <input type="radio" name="year" id="inlineRadio3" value="3rd"> 3rd Year
										</label>
										<label class="radio-inline">
										  <input type="radio" name="year" id="inlineRadio3" value="4th" required> 4th Year
										</label>
										<label class="radio-inline">
										  <input type="radio" name="year" id="inlineRadio3" value="5th" required> 5th Year
										</label>
								</div>
								</div>
				         	<div class="form-group">
				         		<div class="col-sm-4">
				         		<!-- <div class="g-recaptcha" data-sitekey="6LfmARYTAAAAAPM6nOiJIX9EIXtd16VXVeebjoGf"></div> -->
				         		</div>

				         		</div>
							<div class="col-sm-12 col-xs-12"></div>

  							<button class="btn btn-block btn-success btn-rad btn-lg" type="submit" name="submit">Sign Up</button>
					</div>
			  		</form>
				</div>
	</div>
		<div class="text-center bottom out-links"><a href="#">&copy; 2016 TEAM XTASY</a></div>
	</div>

</div>


  <script src="js/jquery.js"></script>
  <script src="js/jquery.parsley/parsley.js" type="text/javascript"></script>
  <script src="js/behaviour/general.js" type="text/javascript"></script>

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
	header('location:index.php');
}




?>
