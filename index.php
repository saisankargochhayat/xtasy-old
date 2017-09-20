<?php

#we are giving the  data to index.php but actually it will be processed in login.inc.php
	require '/portal/loggedin.php';
	//require_once($_SERVER['DOCUMENT_ROOT'].'/portal/loggedin.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- FAVICON -->
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
		<link rel="icon" href="favicon.ico" type="image/x-icon">

		<!-- TITLE -->
		<title>Xtasy 2016 | College of Engineering & Technology, Bhubaneswar</title>

		<!-- DESCRIPTION -->
		<meta name="author" content=" " />
		<meta name="description" content="" />
		<meta name="keywords"  content="" />

		<!-- GOOGLE FONTS -->
		<link href='assets/css/googlefonts.css' rel='stylesheet' type='text/css'>

		<!-- STYLESHEETS -->
		<link href="assets/css/bootstrap.css" rel="stylesheet">
		<link href="assets/css/panel.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/flexslider.css" rel="stylesheet" >
		<link href="assets/css/animate.css" rel="stylesheet">
		<link href="assets/css/schedule.css" rel="stylesheet">
		<link href="assets/css/gridgallery.css" rel="stylesheet" type="text/css"  />
		<link href="assets/css/venobox.css" rel="stylesheet" type="text/css"/>
		<link href="assets/css/style.css" rel="stylesheet"/>
		<link href="assets/css/queries.css" rel="stylesheet"/>
			<script type="text/javascript" src="assets/js/jquery-1.11.0.min.js"></script>


	</head>

   <body id="top" data-spy="scroll" data-target=".header" data-offset="80" >

		<!--PRELOADER-->
		<div class="preloader">
		<div class="status"></div>
		</div>
		<!--/PRELOADER-->

		<!--HEADER-->
	  	<div class="header header-hide">
			<div class="container">
				<nav class="navbar navbar-default" role="navigation">
				   <div class="navbar-header">
					  <button type="button" class="navbar-toggle" data-toggle="collapse"
						 data-target="#example-navbar-collapse">
						 <span class="sr-only">Toggle navigation</span>
						 <span class="icon-bar"></span>
						 <span class="icon-bar"></span>
						 <span class="icon-bar"></span>
					  </button>
					   <a class="navbar-brand" data-scroll href="#sec_1" id="header-logo"><img src="assets/img/logo.png" alt="X"/>TASY</a>
				   </div>
				   <div class="collapse navbar-collapse" id="example-navbar-collapse">
					  <ul class="nav navbar-nav">
						<li><a data-scroll href="#intro">About</a></li>
						<!-- <li><a data-scroll href="#responsive">Schedule</a></li> -->
						<!-- <li><a data-scroll href="#team">Speakers</a></li> -->
						<li><a data-scroll href="#portfolio">Events</a></li>
						<!-- <li><a data-scroll href="#sponsers">Sponsors</a></li> -->
						<li><a data-scroll href="#contact">Contact</a></li>
						<?php if(loggedin()){
						  //$name=getuserfield('first_name');
						 	echo "<li><a href=\"users/index.php\">Profile</a></li>";
							echo "<li><a href=\"users/logout.php\">Logout</a></li>";
						}else{
						  echo "<li><a href=\"users/login.php\">Login</a></li>";
						  echo "<li><a href=\"users/register.php\">Register</a></li>";
						}?>
						<li class="hidden"><a href="#sec_1">Home</a></li>
					  </ul>
				   </div>
				</nav>
			</div>
		</div>
		<!--/HEADER-->

		<!--HOME-->
		<section id="sec_1" class="autoheight">
			<div class="home-bg"></div>
			<div class="col-lg-12 landing-text-pos align-center">
			  <img src="assets/img/logo-body.png" alt="Xtasy Logo"/><br><br>
				<h1 class="wow animated fadeInDown" data-wow-duration="1s" data-wow-delay="1s">The Annual Socio-Cultural Fest - 2016</h1>
				<hr id="title_hr"/>
				<p class="wow animated fadeInUp" data-wow-duration="1s" data-wow-delay="1s">College of Engineering & Technology, Bhubaneswar. 1-3 March 2016</p>
				<!-- <a class="learn-more-btn btn-effect wow animated fadeIn" data-wow-duration="0.5s" data-wow-delay="1.5s" data-scroll href="#swag">Register</a> -->
			</div>
		</section>
		<!--/HOME-->

		<!--ABOUT-->
        <section class="intro text-center section-padding" id="intro">
			<div class="container wow animated fadeInLeft animated" data-wow-duration="1s" data-wow-delay="0.5s">
				<div class="row">
					<div class="col-lg-8 align-center about">
						<h1 class="arrow">About Xtasy</h1>
						<hr>
						<p>Xtasy is the annual cultural festival of College of Engineering and Technology, Bhubaneshwar. Since it's inception in 1992, it has been a very faithful platform to the talented youngsters across India. Singing, Dancing, Fashion Parade, Drama, Rock Band Performance, Treasure Hunt and Out of Box Debating forum and numerous other exiting fun events, everyone gets a slice of the cake, and who can miss the celebrity nights. So this February book your dates and come be a part of this extravaganza. Show us what you've got and join us in our celebration.</p>
					</div>
				</div>
			</div>
        </section>
		<!--/ABOUT-->


        <!--FEATURES-->
        <section class="features text-center" id="features">
			<div class="row">
				<div id="grid-gallery" class="grid-gallery">
					<section class="grid-wrap">
						<div class="grid-gal">
							<figure class="block-hover 3d-gallery col-lg-3 col-sm-12">
								<a href="#"><img src="assets/img/gallery/gal-icn.png" alt="gal-hover">
									<span>GALLERY</span>
								</a>
							</figure>
						</div>
					</section>
					<!--grid wrap-->

					<!-- slideshow -->
					<section class="slideshow">
						<ul>
							<li>
								<figure>
									<img src="assets/img/gallery/1.jpg" alt="img01"/>
								</figure>
							</li>
							<li>
								<figure>
									<img src="assets/img/gallery/2.jpg" alt="img02"/>
								</figure>
							</li>
							<li>
								<figure>
									<img src="assets/img/gallery/3.jpg" alt="img03"/>
								</figure>
							</li>
							<li>
								<figure>
									<img src="assets/img/gallery/4.jpg" alt="img04"/>
								</figure>
							</li>
							<li>
								<figure>
									<img src="assets/img/gallery/5.jpg" alt="img05"/>
								</figure>
							</li>
							<li>
								<figure>
									<img src="assets/img/gallery/6.jpg" alt="img06"/>
								</figure>
							</li>
							<li>
								<figure>
									<img src="assets/img/gallery/7.jpg" alt="img07"/>
								</figure>
							</li>
							<li>
								<figure>
									<img src="assets/img/gallery/8.jpg" alt="img08"/>
								</figure>
							</li>
						</ul>
						<nav>
							<span class="nav-prev fa-chevron-left fa fa-2x "></span>
							<span class="nav-next fa-chevron-right fa fa-2x"></span>
							<span class="close nav-close"><i class="fa fa-times"></i></span>
						</nav>
					</section>
					<!-- /slideshow -->
				</div>
				<!-- /grid-gallery -->

				<div class="container col-lg-6 col-md-12 features-md">
						<div class="row">
							<div class="col-md-12">
								<div class="features-wrapper">
									<div class="col-md-4 wow animated fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s" style="margin-top:-30px; margin-bottom:-10px;">

											<img src="assets/img/testimonials/Harihar Dash.jpg" alt="Harihar Dash" class="img-circle img-responsive img-thumbnail" >


										<h2>Harihar Dash</h2><br>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis interdum.</p>
									</div>

									<div class="col-md-4 wow animated fadeInUp" data-wow-duration="1s" data-wow-delay="0.8s" style="margin-top:-30px; margin-bottom:-10px;">
										<img src="assets/img/testimonials/spunkband.jpg" alt="Spunk Band" class="img-circle img-responsive img-thumbnail" >
										<h2>Spunk Band</h2>
										<br>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis interdum.</p>
									</div>

									<div class="col-md-4 wow animated fadeInUp" data-wow-duration="1s" data-wow-delay="1.0s" style="margin-top:-30px; margin-bottom:-10px;">
										<img src="assets/img/testimonials/UA.jpg" alt="Underground Authority" class="img-circle img-responsive img-thumbnail"  width="200px" height="200px">
										<h2>Underground Authority</h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis interdum.</p>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>

				<!-- Vimoe Video-->
				<div class="grid-gal">
				  <figure class="block-hover vimeo-video col-lg-3 col-sm-12">
					<a class="venoboxvid" data-type="youtube"  href="https://youtu.be/1PWvdL48G8c" target="_self">
						<img src="assets/img/vdo-icn.png" alt="video_hover">
						<span>VIDEO</span>
					</a>
				  </figure>
				</div>

			</div><!--row ends here-->
        </section>
        <!--/FEATURES-->

		<!--SCHEDULE-->
        <section class="text-center section-padding" id="responsive" style="display:none">
			<div class="container wow animated fadeInLeft bottom-spacing">
				<div class="row">
					<div class="col-md-8 align-center wow animated fadeInLeft">
						<h1 class="arrow">Schedule</h1><hr>
						<p>Lorem ipsum dolor sit amet, alia honestatis an qui, ne soluta nemore eripuit sed. Falli exerci aperiam ut his, prompta feugiat usu minimum delicata.</p>
					</div>
				</div>
			</div>

			<div class="container-schedule container wow animated fadeInDown animated" data-wow-duration="1s" data-wow-delay="1s">
				<div id="tabs-ui" class="tabs">
					<nav>
						<ul>
							<li><a href="#section-1"><span>Day1</span></a></li>
							<li><a href="#section-2"><span>Day2</span></a></li>
							<li><a href="#section-3"><span>Day3</span></a></li>
							<!-- <li><a href="#section-4"><span>Day4</span></a></li>
							<li><a href="#section-5"><span>Day5</span></a></li> -->
						</ul>
					</nav>
					<div class="content">
						<section id="section-1">
							<div class="container">
								<div class="accordion">
									<div class="day">March 1, 2016</div>
									<div class="item clearfix">
										<div class="heading clearfix">
											<div class="time col-md-3 col-sm-12 col-xs-12">9:30am - 11:30am</div>
											<div class="e-title col-md-9 col-sm-12 col-xs-12">
												Welcome speech and Overview<br/>
												<span class="name">Andrew Yang - </span>
												<span class="speaker-designaition">CEO, Microsoft</span>
											</div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="content venue col-md-3 col-sm-12 col-xs-12">
												Venue: Auditorium 1
											</div>
											<div class="content details col-md-9 col-sm-12 col-xs-12">
											This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design.
											</div>
										</div>
									</div>

									<div class="item clearfix">
										<div class="heading">
											<div class="time col-md-3 col-sm-12 col-xs-12">11:30am - 1:00pm</div>
											<div class="e-title col-md-9 col-sm-12 col-xs-12">The Standardistas are lecturers in interactive design<br/><span class="name">Andrew Yang - </span><span class="speaker-designaition">CEO, Microsoft</span></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="content venue col-md-3 col-sm-12 col-xs-12">
												Venue: Auditorium 1
											</div>
											<div class="content details col-md-9 col-sm-12 col-xs-12">
											This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design.
											</div>
										</div>
									</div>

									<div class="item clearfix">
										<div class="heading">
											<div class="time col-md-3 col-sm-12 col-xs-12">1:00pm - 2:00pm</div>
											<div class="e-title col-md-9 col-sm-12 col-xs-12">Catered Lunch<br/><span class="name">Sponsered </span></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="content venue col-md-3 col-sm-12 col-xs-12">
												Venue: Auditorium 1
											</div>
											<div class="content details col-md-9 col-sm-12 col-xs-12">
											This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design.
											</div>
										</div>
									</div>

									<div class="item clearfix">
										<div class="heading">
											<div class="time col-md-3 col-sm-12 col-xs-12">3:00pm - 4:30pm</div>
											<div class="e-title col-md-9 col-sm-12 col-xs-12">Proin gravida nibh vel velit auctor aliquet<br/><span class="name">Mary Doe - </span><span class="speaker-designaition">Lead Designer, Microsoft</span></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="content venue col-md-3 col-sm-12 col-xs-12">
												Venue: Auditorium 1
											</div>
											<div class="content details col-md-9 col-sm-12 col-xs-12">
											This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design.
											</div>
										</div>
									</div>
								</div>
							</div><!--CONTAINER ENDS-->
						</section>
						<section id="section-2">
							<div class="container">
								<div class="accordion">
									<div class="day">March 2, 2016</div>
									<div class="item clearfix">
										<div class="heading clearfix">
											<div class="time col-md-3 col-sm-12 col-xs-12">9:30am - 11:30am</div>
											<div class="e-title col-md-9 col-sm-12 col-xs-12">Overview - Nisi elit consequat<br/><span class="name">Andrew Yang - </span><span class="speaker-designaition">CEO, Microsoft</span></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="content venue col-md-3 col-sm-12 col-xs-12">
												Venue: Auditorium 1
											</div>
											<div class="content details col-md-9 col-sm-12 col-xs-12">
											This is Photoshops version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design.
											</div>
										</div>
									</div>

									<div class="item clearfix">
										<div class="heading">
											<div class="time col-md-3 col-sm-12 col-xs-12">11:30am - 1:00pm</div>
											<div class="e-title col-md-9 col-sm-12 col-xs-12">Aenean sollicitudin quis bibendum auctor<br/><span class="name">Andrew Yang - </span><span class="speaker-designaition">CEO, Microsoft</span></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="content venue col-md-3 col-sm-12 col-xs-12">
												Venue: Auditorium 1
											</div>
											<div class="content details col-md-9 col-sm-12 col-xs-12">
											This is Photoshops version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design.
											</div>
										</div>
									</div>

									<div class="item clearfix">
										<div class="heading">
											<div class="time col-md-3 col-sm-12 col-xs-12">1:00pm - 2:00pm</div>
											<div class="e-title col-md-9 col-sm-12 col-xs-12">Catered Lunch<br/><span class="name">Sponsered </span></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="content venue col-md-3 col-sm-12 col-xs-12">
												Venue: Auditorium 1
											</div>
											<div class="content details col-md-9 col-sm-12 col-xs-12">
											This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design.
											</div>
										</div>
									</div>

									<div class="item clearfix">
										<div class="heading">
											<div class="time col-md-3 col-sm-12 col-xs-12">3:00pm - 4:30pm</div>
											<div class="e-title col-md-9 col-sm-12 col-xs-12">Sagittis sem nibh id elit<br/><span class="name">Mary Doe - </span><span class="speaker-designaition">Lead Designer, Microsoft</span></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="content venue col-md-3 col-sm-12 col-xs-12">
												Venue: Auditorium 1
											</div>
											<div class="content details col-md-9 col-sm-12 col-xs-12">
											This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design.
											</div>
										</div>
									</div>
								</div>
							</div>
						</section>
						<section id="section-3">
							<div class="container">
								<div class="accordion">
									<div class="day">March 3, 2016</div>
									<div class="item clearfix">
										<div class="heading clearfix">
											<div class="time col-md-3 col-sm-12 col-xs-12">9:30am - 11:30am</div>
											<div class="e-title col-md-9 col-sm-12 col-xs-12">Welcome speech and Overview<br/><span class="name">Andrew Yang - </span><span class="speaker-designaition">CEO, Microsoft</span></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="content venue col-md-3 col-sm-12 col-xs-12">
												Venue: Auditorium 1
											</div>
											<div class="content details col-md-9 col-sm-12 col-xs-12">
											This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design.
											</div>
										</div>
									</div>

									<div class="item clearfix">
										<div class="heading">
											<div class="time col-md-3 col-sm-12 col-xs-12">11:30am - 1:00pm</div>
											<div class="e-title col-md-9 col-sm-12 col-xs-12">The Standardistas are lecturers in interactive design<br/><span class="name">Andrew Yang - </span><span class="speaker-designaition">CEO, Microsoft</span></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="content venue col-md-3 col-sm-12 col-xs-12">
												Venue: Auditorium 1
											</div>
											<div class="content details col-md-9 col-sm-12 col-xs-12">
											This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design.
											</div>
										</div>
									</div>

									<div class="item clearfix">
										<div class="heading">
											<div class="time col-md-3 col-sm-12 col-xs-12">1:00pm - 2:00pm</div>
											<div class="e-title col-md-9 col-sm-12 col-xs-12">Catered Lunch<br/><span class="name">Sponsered </span></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="content venue col-md-3 col-sm-12 col-xs-12">
												Venue: Auditorium 1
											</div>
											<div class="content details col-md-9 col-sm-12 col-xs-12">
											This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design.
											</div>
										</div>
									</div>

									<div class="item clearfix">
										<div class="heading">
											<div class="time col-md-3 col-sm-12 col-xs-12">3:00pm - 4:30pm</div>
											<div class="e-title col-md-9 col-sm-12 col-xs-12">Proin gravida nibh vel velit auctor aliquet<br/><span class="name">Mary Doe - </span><span class="speaker-designaition">Lead Designer, Microsoft</span></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="content venue col-md-3 col-sm-12 col-xs-12">
												Venue: Auditorium 1
											</div>
											<div class="content details col-md-9 col-sm-12 col-xs-12">
											This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design.
											</div>
										</div>
									</div>
								</div>
							</div>
						</section>
						<!-- <section id="section-4">
							<div class="container">
								<div class="accordion">
									<div class="day">September 18, 2014</div>
									<div class="item clearfix">
										<div class="heading clearfix">
											<div class="time col-md-3 col-sm-12 col-xs-12">9:30am - 11:30am</div>
											<div class="e-title col-md-9 col-sm-12 col-xs-12">Overview - Nisi elit consequat<br/><span class="name">Andrew Yang - </span><span class="speaker-designaition">CEO, Microsoft</span></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="content venue col-md-3 col-sm-12 col-xs-12">
												Venue: Auditorium 1
											</div>
											<div class="content details col-md-9 col-sm-12 col-xs-12">
											This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design.
											</div>
										</div>
									</div>

									<div class="item clearfix">
										<div class="heading">
											<div class="time col-md-3 col-sm-12 col-xs-12">11:30am - 1:00pm</div>
											<div class="e-title col-md-9 col-sm-12 col-xs-12">Aenean sollicitudin quis bibendum auctor<br/><span class="name">Andrew Yang - </span><span class="speaker-designaition">CEO, Microsoft</span></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="content venue col-md-3 col-sm-12 col-xs-12">
												Venue: Auditorium 1
											</div>
											<div class="content details col-md-9 col-sm-12 col-xs-12">
											This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design.
											</div>
										</div>
									</div>

									<div class="item clearfix">
										<div class="heading">
											<div class="time col-md-3 col-sm-12 col-xs-12">1:00pm - 2:00pm</div>
											<div class="e-title col-md-9 col-sm-12 col-xs-12">Catered Lunch<br/><span class="name">Sponsered </span></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="content venue col-md-3 col-sm-12 col-xs-12">
												Venue: Auditorium 1
											</div>
											<div class="content details col-md-9 col-sm-12 col-xs-12">
											This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design.
											</div>
										</div>
									</div>

									<div class="item clearfix">
										<div class="heading">
											<div class="time col-md-3 col-sm-12 col-xs-12">3:00pm - 4:30pm</div>
											<div class="e-title col-md-9 col-sm-12 col-xs-12">Sagittis sem nibh id elit<br/><span class="name">Mary Doe - </span><span class="speaker-designaition">Lead Designer, Microsoft</span></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="content venue col-md-3 col-sm-12 col-xs-12">
												Venue: Auditorium 1
											</div>
											<div class="content details col-md-9 col-sm-12 col-xs-12">
											This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design.
											</div>
										</div>
									</div>
								</div>
							</div>
						</section>
						<section id="section-5">
							<div class="container">
								<div class="accordion">
									<div class="day">September 19, 2014</div>
									<div class="item clearfix">
										<div class="heading clearfix">
											<div class="time col-md-3 col-sm-12 col-xs-12">9:30am - 11:30am</div>
											<div class="e-title col-md-9 col-sm-12 col-xs-12">Welcome speech and Overview<br/><span class="name">Andrew Yang - </span><span class="speaker-designaition">CEO, Microsoft</span></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="content venue col-md-3 col-sm-12 col-xs-12">
												Venue: Auditorium 1
											</div>
											<div class="content details col-md-9 col-sm-12 col-xs-12">
											This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design.
											</div>
										</div>
									</div>

									<div class="item clearfix">
										<div class="heading">
											<div class="time col-md-3 col-sm-12 col-xs-12">11:30am - 1:00pm</div>
											<div class="e-title col-md-9 col-sm-12 col-xs-12">The Standardistas are lecturers in interactive design<br/><span class="name">Andrew Yang - </span><span class="speaker-designaition">CEO, Microsoft</span></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="content venue col-md-3 col-sm-12 col-xs-12">
												Venue: Auditorium 1
											</div>
											<div class="content details col-md-9 col-sm-12 col-xs-12">
											This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design.
											</div>
										</div>
									</div>

									<div class="item clearfix">
										<div class="heading">
											<div class="time col-md-3 col-sm-12 col-xs-12">1:00pm - 2:00pm</div>
											<div class="e-title col-md-9 col-sm-12 col-xs-12">Catered Lunch<br/><span class="name">Sponsered </span></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="content venue col-md-3 col-sm-12 col-xs-12">
												Venue: Auditorium 1
											</div>
											<div class="content details col-md-9 col-sm-12 col-xs-12">
											This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design.
											</div>
										</div>
									</div>

									<div class="item clearfix">
										<div class="heading">
											<div class="time col-md-3 col-sm-12 col-xs-12">3:00pm - 4:30pm</div>
											<div class="e-title col-md-9 col-sm-12 col-xs-12">Proin gravida nibh vel velit auctor aliquet<br/><span class="name">Mary Doe - </span><span class="speaker-designaition">Lead Designer, Microsoft</span></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="content venue col-md-3 col-sm-12 col-xs-12">
												Venue: Auditorium 1
											</div>
											<div class="content details col-md-9 col-sm-12 col-xs-12">
											This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design.
											</div>
										</div>
									</div>
								</div>
							</div>
						</section> -->
					</div><!-- /content -->
				</div><!-- /tabs -->
			</div>
        </section>


		<!-- Event social links and download-->
		<section class="event-download-social-link section-padding" style="display:none">
			<div class="col-lg-6 col-md-12 align-center">
				<a class="d-sch text-right" href="#" target="_blank">download schedule</a>
				<a class="fb " href="https://www.facebook.com/xtasycetbbsr" target="_blank">connect via facebook</a>
			</div>
		</section>

		<!--/SCHEDULE-->

        <!--SPEAKERS-->
        <section class="team text-center section-padding" id="team" style="display:none">
			<div class="container">
				<div class="row">
				  <div class="col-lg-8 wow animated fadeInUp align-center" data-wow-duration="1s" data-wow-delay="1s">
					<h1 class="arrow">Speakers</h1><hr>
					<p>Lorem ipsum dolor sit amet, alia honestatis an qui, ne soluta nemore eripuit sed. Falli exerci aperiam ut his, prompta feugiat usu minimum delicata.</p>
				  </div>
				</div>
				<div class="row">
					<div class="speakers-wrap">
							<ul class="slides">
								<li>
									<div class="col-md-4 col-sm-4 wow animated fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
										<div class="overlay-effect effects clearfix">
											<div class="img">
											  <img src="assets/img/team/team1.jpg" alt="Portfolio Item">
											  <div class="overlay">
												<button class="md-trigger expand" data-modal="modal-9"><i class="fa fa-search"></i><br>View More</button>
											  </div>
											</div>
										</div>
										<h2>Mark Anderson</h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ultricies nulla non metus pulvinar imperdiet.</p>
									</div>

									<div class="col-md-4 col-sm-4 wow animated fadeInUp" data-wow-duration="1s" data-wow-delay="0.7s">
										<div class="overlay-effect effects clearfix">
											<div class="img">
												<img src="assets/img/team/team2.jpg" alt="Portfolio Item">
												<div class="overlay">
													<button class="md-trigger expand" data-modal="modal-9"><i class="fa fa-search"></i><br>View More</button>
												</div>
											</div>
										</div>
										<h2>Mary Doe</h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ultricies nulla non metus pulvinar imperdiet.</p>
									</div>

									<div class="col-md-4 col-sm-4 wow animated fadeInUp" data-wow-duration="1s" data-wow-delay="0.9s">
										<div class="overlay-effect effects clearfix">
											<div class="img">
												<img src="assets/img/team/team3.jpg" alt="Portfolio Item">
												<div class="overlay">
													<button class="md-trigger expand" data-modal="modal-9"><i class="fa fa-search"></i><br>View More</button>
												</div>
											</div>
										</div>
										<h2>John Thomson</h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ultricies nulla non metus pulvinar imperdiet.</p>
									</div>
								</li>
								<!-- <li> Second Set of Speakers -->
								<!-- <li>
									<div class="col-md-4 col-sm-4 wow animated fadeInUp">
										<div class="overlay-effect effects clearfix">
										<div class="img">
										  <img src="assets/img/team/team1.jpg" alt="Portfolio Item">
										  <div class="overlay">
											<button class="md-trigger expand" data-modal="modal-9"><i class="fa fa-search"></i><br>View More</button>
										  </div>
										</div>
										</div>
										<h2>Mark Anderson</h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ultricies nulla non metus pulvinar imperdiet.</p>
									</div>
									<div class="col-md-4 col-sm-4 wow animated fadeInUp">
										<div class="overlay-effect effects clearfix">
											<div class="img">
											  <img src="assets/img/team/team2.jpg" alt="Portfolio Item">
											  <div class="overlay">
												<button class="md-trigger expand" data-modal="modal-9"><i class="fa fa-search"></i><br>View More</button>
											  </div>
											</div>
										</div>
										<h2>Mary Doe</h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ultricies nulla non metus pulvinar imperdiet.</p>
									</div>
									<div class="col-md-4 col-sm-4 wow animated fadeInUp">
										<div class="overlay-effect effects clearfix">
											<div class="img">
											  <img src="assets/img/team/team3.jpg" alt="Portfolio Item">
											  <div class="overlay">
												<button class="md-trigger expand" data-modal="modal-9"><i class="fa fa-search"></i><br>View More</button>
											  </div>
											</div>
										</div>
									  <h2>John Thomson</h2>
									  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ultricies nulla non metus pulvinar imperdiet.</p>
									</div>
								</li> -->
							</ul>
						</div>
				</div> <!--Row Ends Here-->
			</div>
			<!-- Example Speaker -->
			<div class="md-modal md-effect-9" id="modal-9">
				<div class="md-content">
					<div class="folio">
						<div class="avatar"></div>
						<div class="sp-name"><strong>Mark Anderson</strong><br/>Director, ABC</div>
						<div class="sp-dsc">
						This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.
							<blockquote>
							<p>Here is a long quotation here is a long quotation proin gravida nibh vel velit auctor aliquet aenean sollicitudin.</p>
							</blockquote>
						This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
						</div>
						<div class="sp-social">
							<ul>
								<li><a href="#" class="social-btn"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#" class="social-btn"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" class="social-btn"><i class="fa fa-dribbble"></i></a></li>
							</ul>
						</div>
						<button class="md-close"><i class="fa fa-times"></i></button>
					</div>
				</div>
			</div>
			<div class="md-overlay"></div>
			<!-- /Example Speaker -->
        </section>
		<!--/SPEAKER-->

		 <!--EVENTS-->
		<section id="portfolio" class="portfolio text-center section-padding">
			<div class="container">
				<div class="row">
				  <div class="col-md-12">
					<h1 class="arrow">Events</h1><hr><p>See what you get during Xtasy.</p>
				  </div>
				</div>
				<div class="row">
					<div class="pricing-wrap">
						<div id="portfolioSlider">
						<ul class="slides">
							<li>
								<div class="col-md-3 col-sm-6 col-xs-12 wow animated fadeInRight centered" data-wow-duration="1s" data-wow-delay="0.3s">
									<ul class="planContainer">
										<li class="title"><img src="assets/img/sections/dance.jpg" alt="Dance"/></li>
										<li class="price"><p>DANCE</p></li>
										<li>
											<ul class="options">
												<li><button class="md-trigger event-button evefont" data-modal="modal-12">DANCING FEET</button></li>
												<li><button class="md-trigger event-button evefont" data-modal="modal-13">BURN OUT</button></li>
												<!-- <li><button class="md-trigger event-button evefont" data-modal="modal-14">2x option 1</button></li> -->
												<!-- <li><button class="md-trigger event-button evefont" data-modal="modal-15">2x option 1</button></li> -->
												<li>Coming Soon</li>
										   </ul>
										</li>
										<br>
									</ul>
								</div>

								<div class="col-md-3 col-sm-6 col-xs-12 wow animated fadeInRight centered" data-wow-duration="1s" data-wow-delay="0.5s">
									<ul class="planContainer">
										<li class="title"><img src="assets/img/sections/music.jpg" alt="Music"/></li>
										<li class="price"><p class="bestPlanPrice">MUSIC</p></li>
										<li>
											<ul class="options">
												<li><button class="md-trigger event-button evefont" data-modal="modal-16">OVERDRIVE</button></li>
												<li><button class="md-trigger event-button evefont" data-modal="modal-17">GOONJ</button></li>
												<li><button class="md-trigger event-button evefont" data-modal="modal-18">SARGAM</button></li>
											</ul>
										</li>
										<br>
									</ul>
								</div>

								<div class="col-md-3 col-sm-6 col-xs-12 wow animated fadeInRight centered" data-wow-duration="1s" data-wow-delay="0.7s">
									<ul class="planContainer">
										<li class="title"><img src="assets/img/sections/drama.jpg" alt="Drama"/></li>
										<li class="price"><p>DRAMA</p></li>
										<li>
											<ul class="options">
												<li><button class="md-trigger event-button evefont" data-modal="modal-20">THEATRE PLAY</button></li>
												<li><button class="md-trigger event-button evefont" data-modal="modal-21">REFLEX</button></li>
												<li><button class="md-trigger event-button evefont" data-modal="modal-22">NUKKAD</button></li>
											 </ul>
										</li>
										<br>
									</ul>
								</div>
								<div class="col-md-3 col-sm-6 col-xs-12 wow animated fadeInRight centered" data-wow-duration="1s" data-wow-delay="0.9s">
									<ul class="planContainer">
										<li class="title"><img src="assets/img/sections/photography.jpg" alt="Photography"/></li>
										<li class="price"><p>PHOTOGRAPHY</p></li>
										<li>
											<ul class="options">
												<li><button class="md-trigger event-button evefont" data-modal="modal-24">TASVEER</button></li>
												<li>Coming Soon</li>
												<li>Coming Soon</li>
											 </ul>
										</li>
										<br>
									</ul>
								</div>
							</li>
							<li>
								<div class="col-md-3 col-sm-6 col-xs-12 animated fadeInRight centered">
									<ul class="planContainer">
										<li class="title"><img src="assets/img/sections/socials.jpg" alt="Socials"/></li>
										<li class="price"><p>SOCIALS</p></li>
										<li>
											<ul class="options">
												<li>Coming Soon</li>
												<li>Coming Soon</li>
												<li>Coming Soon</li>
											 </ul>
										</li>
										<br>
									</ul>
								</div>

								<div class="col-md-3 col-sm-6 col-xs-12 animated fadeInRight centered">
									<ul class="planContainer">
										<li class="title"><img src="assets/img/sections/informals.jpg" alt="Informals"/></li>
										<li class="price"><p class="bestPlanPrice">INFORMALS</p></li>
										<li>
											<ul class="options">
												<li>Coming Soon</li>
												<li>Coming Soon</li>
												<li>Coming Soon</li>
											 </ul>
										</li>
										<br>
									</ul>
								</div>

								<div class="col-md-3 col-sm-6 col-xs-12 animated fadeInRight centered">
									<ul class="planContainer">
										<li class="title"><img src="assets/img/sections/workshops.jpg" alt="Workshops" style="width:263px;height:197px;"/></li>
										<li class="price"><p>WORKSHOPS</p></li>
										<li>
											<ul class="options">
												<li>Coming Soon</li>
												<li>Coming Soon</li>
												<li>Coming Soon</li>
											</ul>
										</li>
										<br>
									</ul>
								</div>

								<div class="col-md-3 col-sm-6 col-xs-12 animated fadeInRight centered">
									<ul class="planContainer">
										<li class="title"><img src="assets/img/sections/pronites.jpg" alt="Pronights"/></li>
										<li class="price"><p>PRONIGHTS</p></li>
										<li>
											<ul class="options">
												<li>Coming Soon</li>
												<li>Coming Soon</li>
												<li>Coming Soon</li>
 											</ul>
										</li>
										<br>
									</ul>
								</div>
							</li>
						</ul>
					</div>
				</div>
				</div>
			</div>

			<div class="md-modal md-effect-9 " id="modal-16">
			<div class="md-content corrpad ">
					<div class="folio scrolleve">
					</div>
					<button class="md-close"><i class="fa fa-times"></i></button>
				</div>
			</div>

			<div class="md-modal md-effect-9" id="modal-17">
				<div class="md-content corrpad">
					<div class="folio scrolleve">
					</div>
					<button class="md-close"><i class="fa fa-times"></i></button>
				</div>
			</div>

			<div class="md-modal md-effect-9" id="modal-18">
				<div class="md-content corrpad">
					<div class="folio scrolleve">
					</div>
					<button class="md-close"><i class="fa fa-times"></i></button>
				</div>
			</div>

			<div class="md-modal md-effect-9" id="modal-20">
				<div class="md-content corrpad">
					<div class="folio scrolleve">
					</div>
					<button class="md-close"><i class="fa fa-times"></i></button>
				</div>
			</div>

			<div class="md-modal md-effect-9" id="modal-21">
				<div class="md-content corrpad">
					<div class="folio scrolleve">
					</div>
					<button class="md-close"><i class="fa fa-times"></i></button>
				</div>
			</div>

			<div class="md-modal md-effect-9" id="modal-22">
				<div class="md-content corrpad">
					<div class="folio scrolleve">
					</div>
					<button class="md-close"><i class="fa fa-times"></i></button>
				</div>
			</div>

			<div class="md-modal md-effect-9" id="modal-24">
				<div class="md-content corrpad">
					<div class="folio scrolleve">
					</div>
					<button class="md-close"><i class="fa fa-times"></i></button>
				</div>
			</div>

			<div class="md-modal md-effect-9" id="modal-12">
				<div class="md-content corrpad">
					<div class="folio scrolleve">
					</div>
					<button class="md-close"><i class="fa fa-times"></i></button>
				</div>
			</div>

			<div class="md-modal md-effect-9" id="modal-13">
				<div class="md-content corrpad">
					<div class="folio scrolleve">
					</div>
					<button class="md-close"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="md-overlay"></div>

        </section>
		<!--/EVENTS-->


       <!--SPONSORS-->
        <div id="sponsers" class="ignite-cta text-center section-padding" style="display:none">
			<div class="container">
				<div class="row">
					<div class="col-md-8 align-center wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
						<h1 class="arrow">Our Sponsors</h1><hr>
						<p>Lorem ipsum dolor sit amet, alia honestatis an qui, ne soluta nemore eripuit sed. Falli exerci aperiam ut his, prompta feugiat usu minimum delicata.</p>
					</div>
					<!-- Jssor Slider Begin -->
					<div id="slider1_container" style=" ">
						<div class="inner_carousal" data-u="slides" style="">
							<div><img alt="sp1" src="assets/img/sponsor/sp1.png" /></div>
							<div><img alt="sp2" src="assets/img/sponsor/sp2.png" /></div>
							<div><img alt="sp3" src="assets/img/sponsor/sp3.png" /></div>
							<div><img alt="sp4" src="assets/img/sponsor/sp4.png" /></div>
							<div><img alt="sp5" src="assets/img/sponsor/sp5.png" /></div>
							<div><img alt="sp6" src="assets/img/sponsor/sp6.png" /></div>
							<div><img alt="sp7" src="assets/img/sponsor/sp7.png" /></div>
						</div>
					</div>
					<!-- Jssor Slider End -->
				</div>
			</div>
		</div>
		 <!-- /SPONSORS -->

		<!--SUBSCRIBE-->
        <!-- <section class="subscribe text-center">
			<div class="subscribe-overlay"></div>
			<div class="container wow animated fadeInDown" data-wow-duration="1s" data-wow-delay="0.3s">
				<h1>Subscribe for newsletter</h1>
				<form action="notify-me.php" id="notifyMe" method="POST" class="center-block align-center col-lg-5 col-md-5 col-sm-10 col-xs-10">
					<div class="input-group col-lg-12 align-center">
					  <input type="text" class="form-control email-add" name="email" placeholder="Enter Email Address">
					  <button class="btn btn-default notify-button"><i class="fa fa-paper-plane"></i><span>Send</span></button>
					</div>
				</form>
			</div>
        </section> -->
		<!-- /SUBSCRIBE -->

		<!--CONTACT-->
        <section class="text-center section-padding contact-wrap" id="contact">
			<div class="container">
				<div class="row">
					<div class="col-md-8 wow animated fadeInLeft align-center" data-wow-duration="1s" data-wow-delay="0.3s">
						<h1 class="arrow">Contact Us</h1><hr>
						<p>We'd Love to Hear from You.</p>
					</div>
				</div>
				<div class="row contact-details">
					<div class="col-md-4 wow animated fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
						<div class="light-box box-hover">
							<h2><span>Address</span></h2>
							<p>College of Engineering & Technology,<br>Ghatikia,<br>Bhubaneswar</p>
						</div>
					</div>
					<div class="col-md-4 wow animated fadeInDown" data-wow-duration="1s" data-wow-delay="0.7s">
						<div class="light-box box-hover">
							<h2><span>Phone</span></h2>
							<p>+91 89 84 213431<br>+91 98 53 308575</p>
						</div>
					</div>
					<div class="col-md-4 wow animated fadeInDown" data-wow-duration="1s" data-wow-delay="0.9s">
						<div class="light-box box-hover">
							<h2><span>Email</span></h2>
							<p>xtasy@cetb.in</p>
						</div>
					</div>
				</div>
				<div class="row">
					<a id="get_directions" class="learn-more-btn btn-effect" href="https://goo.gl/maps/NoMNVrmJC912" target="newtab"><i class="fa fa-map-marker"></i><span>Get Directions</span></a>
				</div>
				<div class="row">
					<div class="col-md-12">
						<ul class="social-buttons">
							<li><a href="https://www.facebook.com/xtasycetbbsr" class="social-btn" target="newtab"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#" class="social-btn" target="newtab"><i class="fa fa-youtube"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
        </section>
		<!-- /CONTACT -->

		<!--FOOTER-->
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-xs-6 col-sm-6 pull-left">
							<button class="md-trigger " data-modal="modal-11">©2016 CET-B Xtasy</button>
					</div>
					<div class="col-md-6 col-xs-6 col-sm-6" id="footpow">
							Powered by<br><a href="http://www.newsyssolution.com/" target="newtab"><img src="assets/img/logo-footer.png" alt="Newsys Logo"/></a>
					</div>
					<div class="md-modal md-effect-9" id="modal-11">
						<div class="md-content padding-none">
							<div class="folio">
								<div class="sp-name disclaimer"><strong>Disclaimer</strong></div>
								<div class="sp-dsc disclaim-border" id="disclaim-link">
									The Annual Cultural Fest Of <a href="http://cet.edu.in/" target="newtab">College Of Engineering And Technology</a>: Xtasy. All rights reserved.All other trademarks and copyrights are the property of their respective owners.
	This site uses cookies. We respect your privacy.
								</div>
								<button class="md-close"><i class="fa fa-times"></i></button>
							</div>
						</div>
					</div>

					<div class="md-overlay"></div>
					<div id="go-top"><a data-scroll class"smoothscroll" title="Back to Top" href="#top"><center><i class="fa fa-chevron-up"></center></i></a></div>

				</div>
			</div>
        </footer>
		<!--
		<div class="show-panel"><i class="fa fa-cog"></i></div>
		<div class="panel">

			<div class="panel-container">
				<div class="options">
					<ul class="color-switch first">
					<p class="panel-head first">Corporate</p>

					<li><a href="../corporate/image"><span class="links">Static Background</span></a></li>
					<li><a href="../corporate/slider"><span class="links">Slider Background</span></a></li>
					<li><a href="../corporate/html5-video"><span class="links">Html5 Video</span></a></li>
					<li><a href="../corporate/youtube-video"><span class="tube">Youtube Video</span></a></li>

					<p class="panel-head first">Coming Soon</p>
					<li><a href="../corporate/quickregistration"><span class="links">Quick Register</span></a></li>
					<li><a href="../corporate/comingsoon-image"><span class="links">Static Image</span></a></li>
					<li><a href="../corporate/comingsoon-html5video"><span class="links">Html5 Video</span></a></li>
					<li><a href="../corporate/comingsoon-youtubevideo"><span class="tube">youtube video</span></a></li>

					</ul>
					<ul class="color-switch last">
					<p class="panel-head last">Music</p>
					<li><a class="active2"><span class="links">Xmas<sup class="new">new</sup></span></a></li>
					<li><a href="../music/image"><span class="links">Static Background</span></a></li>
					<li><a href="../music/slider"><span class="links">Slider Background</span></a></li>
					<li><a href="../music/html5video"><span class="links">Html5 Video</span></a></li>
					<li><a href="../music/youtube-video"><span class="tube">Youtube Video</span></a></li>

					<p class="panel-head last">Coming Soon</p>
					<li><a href="../music/quickregistration"><span class="links">Quick Register</span></a></li>
					<li><a href="../music/comingsoon-image"><span class="links">Static Image</span></a></li>
					<li><a href="../music/comingsoon-html5video"><span class="links">Html5 Video</span></a></li>
					<li><a href="../music/comingsoon-youtubevideo"><span class="tube">youtube video</span></a></li>

					</ul>
				</div>
			</div>
		</div>
	-->
		<!-- /FOOTER -->
		<!--SCRIPTS-->

		<script type="text/javascript" src="assets/js/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="assets/js/jquery-ui-1.10.4.min.js"></script>

		<!--VIMEO VIDEO-->
        <script type="text/javascript" src="assets/js/venobox.js"></script>

        <!--3D GALLERY-->
        <script type="text/javascript" src="assets/js/classie.grid.gallery.js"></script>
		<script type="text/javascript" src="assets/js/modernizr.gridgallery.js"></script>
		<script type="text/javascript" src="assets/js/cbpGridGallery.js"></script>

		<script type="text/javascript" src="assets/js/classie.js" ></script>
		<script type="text/javascript" src="assets/js/modalEffects.js" ></script>

	    <script type="text/javascript" src="assets/js/nlform.js" ></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js" ></script>

		<!-- TEAM SLIDER  -->
		<script type="text/javascript" src="assets/js/jquery.flexslider.js" ></script>

		<!-- SCHEDULE TABS  -->
        <script type="text/javascript" src="assets/js/modernizr.js" ></script>
		<script type="text/javascript" src="assets/js/cbpFWTabs.js" ></script>

		<!--SPONSOR SLIDER-->
		<script type="text/javascript" src="assets/js/jssor.core.js"></script>
		<script type="text/javascript" src="assets/js/jssor.utils.js"></script>
		<script type="text/javascript" src="assets/js/jssor.slider.js"></script>
		<!-- <script type="text/javascript" src="assets/js/sponsor_init.js"></script> -->

		<!-- SMOOTH SCROLL  -->
		<script type="text/javascript" src="assets/js/smooth-scroll.js"></script>

		<!-- NICE SCROLL  -->
		<script type="text/javascript" src="assets/js/jquery.nicescroll.js"></script>

		<!-- SUBSCRIPTION FORM  -->
		<script type="text/javascript" src="assets/js/notifyMe.js"></script>

		<script type="text/javascript" src="assets/js/jquery.placeholder.js"></script>

		<!-- ANIMATION  -->
		<script type="text/javascript" src="assets/js/wow.min.js"></script>
		<!--triangle-->
		<script type="text/javascript" src="assets/js/TweenLite.min.js"></script>
		<script type="text/javascript" src="assets/js/EasePack.min.js"></script>
		<script type="text/javascript" src="assets/js/rAF.js"></script>
		<script type="text/javascript" src="assets/js/canvas.js"></script>
		<!-- INITIALIZATION  -->
		<script type="text/javascript" src="assets/js/init.js"></script>

<!-- Group Registration-->


<script type="text/javascript" src="assets/js/we.js"></script>



    </body>
</html>
