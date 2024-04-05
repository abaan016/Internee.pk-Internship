<?php
include 'header.php';
include 'config.php';

?>
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>SignUp/Register</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="login.php">Login/Register</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Login Box Area =================-->
		<section class="login_box_area section_gap">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="login_box_img">
							<img class="img-fluid" src="img/login.jpg" alt="">
							<div class="hover">
								<h4>New to our website?</h4>
								<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
								<a class="primary-btn" href="signup.php">Create an Account</a>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="login_form_inner">
							<h3>SignUp Form</h3>
							<form class="row login_form" action="" method="post" id="contactForm">
							<div class="col-md-12 form-group">
									<input type="text" class="form-control required" id="name" name="txtn" placeholder="Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
								</div>
								<div class="col-md-12 form-group">
									<input type="email" class="form-control required" id="name" name="txte" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
								</div>
								<div class="col-md-12 form-group">
									<input type="password" class="form-control required" id="txtp" name="txtp" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
								</div>
								<div class="col-md-12 form-group">
									<input type="password" class="form-control required" id="txtcp" name="txtcp" placeholder="CPassword" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
								</div>
								<div class="col-md-12 form-group">
									<div class="creat_account">
										
										
									</div>
								</div>
								<div class="col-md-12 form-group">
									<input type="submit" value="SignUp"  name="btnsignup" class="btn primary-btn">
									
								</div>
							</form>
						</div>
					</div>
					<?php

								if(isset($_POST['btnsignup']))
								{
									$n=$_POST['txtn'];
									$e=$_POST['txte'];
									$pw=md5($_POST['txtp']);
									$cpw=md5($_POST['txtcp']);

									if($pw==$cpw)
									{
										$insert=mysqli_query($con,"insert into tblsignup values('null','$n','$e','$pw')");

										echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
										<strong>Account Have Been Create</strong> 
										<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
									</div>";
									
									echo '<meta http-equiv="refresh" content="3; url=login.php"';
									}
									else
									{
										echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
										<strong>Account Have Been Not Create</strong> 
										<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
									</div>";
									}
								}
								?>

				</div>
			</div>
		</section>
	<!--================End Login Box Area =================-->


<?php
include 'footer.php';
?>