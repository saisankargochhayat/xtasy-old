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

	<link rel="stylesheet" href="fonts/font-awesome-4/css/font-awesome.min.css">
	<script src='https://www.google.com/recaptcha/api.js'></script>


	<!-- Custom styles for this template -->
	<link href="css/style.css" rel="stylesheet" />

</head>

<body class="texture">

<div id="cl-wrapper" class="forgotpassword-container">

	<div class="middle">
		<div class="block-flat">
			<div class="header">
				<h3 class="text-center"><img class="logo-img pull-center" src="logo.png" alt="logo" height="150px" /><h3>
			</div>
			<div>
				<form class="form-horizontal" action="forgot.php" method="POST" parsley-validate novalidate>
					<div class="content">
						<h5 class="title text-center"><strong>Forgot your password?</strong></h5>
            <p class="text-center">Don't worry, we'll send you an email to reset your password.</p>
              <hr/>
							<?php
							require '../portal/connectdb.php';
							require 'class.phpmailer.php';
							if (isset($_POST['email']))
							{
								$email = $_POST['email'];

								if(isset($_POST['g-recaptcha-response']))
												$captcha=$_POST['g-recaptcha-response'];
									if(!$captcha){
													echo '<h2>Please check the the captcha form.</h2>';
													//exit;
												}
								$response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfooxUTAAAAAF1Nps-yv4a0UgKNrzqRg59xUjam&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
							if($response['success'] == false)
								{
									//echo '<h2>You are spammer ! Get the hell out</h2>';
								}

							else
								{


								if(!empty($email))
							{
								$query = "SELECT xtasy_id,first_name FROM tbl_student WHERE email = :email";
								$stmt = $conn->prepare($query);
								$stmt->bindParam(':email',$email,PDO::PARAM_STR);
								if($stmt->execute())
								{
									$query_num_rows=$stmt->rowCount();
									if($query_num_rows==0)
										{
												echo "<div class=\"alert alert-danger\" role=\"alert\">No such user found</div>";
										}
									else
										{
											$row = $stmt->fetch();
											$user_id = $row['xtasy_id'];
											echo "<div class=\"alert alert-success\" role=\"alert\">A password reset link has been sent to your email.</div>";
											echo "xtasy.cetb.in/passwordreset/index.php?account=".$email."&token=".md5($user_id.$salt);
											//$name=$row['name'];
											$mail = new PHPMailer;
											// Set PHPMailer to use the sendmail transport
											$mail->isSendmail();
											//Set who the message is to be sent from
											$mail->setFrom('xtasy@cetb.in', 'CET B');
											//Set who the message is to be sent to
											$mail->addAddress($email,'Xtasy User');
											//Set the subject line
											$mail->Subject = 'Forgot password reset link';
											//Set the body
											$mail->Body = "Here is your password reset link <br>"."xtasy.cetb.in/passwordreset/index.php?account=$email&token=".md5($user_id.$salt);
											//send the message, check for errors
											if (!$mail->send()) {
											    echo "Mailer Error: " . $mail->ErrorInfo;
											} else {
											    echo "Message sent!";
											}
										}
								}
							}
							else{
								echo "<div class=\"alert alert-danger\" role=\"alert\">...</div>";
							}
						}
					}
						?>



							<div class="form-group">
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
										<input type="email" name="email" parsley-trigger="change" parsley-error-container="#email-error" required placeholder="Your Email" class="form-control">
									</div>
                  <div id="email-error"></div>
								</div>
							</div>

                          <div class="form-group col-md-12 no-margin">
                            <div class="g-recaptcha text-center" data-sitekey="6LfmARYTAAAAAPM6nOiJIX9EIXtd16VXVeebjoGf"></div>
                          </div>


             <p class="spacer text-center">Don't remember your email? <a href="#">Contact Support</a>.</p>

            <button id="pass" class="btn btn-block btn-primary btn-rad btn-lg" type="submit">Reset Password</button>

					</div>
			  </form>
			</div>
		</div>
		<div class="text-center out-links"><a href="#">&copy; 2016 TEAM XTASY</a></div>

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


</script>


</body>
</html>
