<?php
include 'header.php';
include 'config.php';

?>
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Login/Register</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="signup.php">Login/Register</a>
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
						<h3>Log in to enter</h3>
						<form class="row login_form" action="" method="post" id="contactForm" >
							<div class="col-md-12 form-group">
								<input type="email" class="form-control required" id="name" name="txte" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control required" id="name" name="txtp" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
								
								</div>
							</div>
							<div class="col-md-12 form-group">
								<input type="submit" value="Login" name="btnlogin" class="btn primary-btn">
							
							</div>
						</form>
					</div>
                    <?php

	                         if(isset($_POST['btnlogin']))
	                         {
	                         	$e=$_POST['txte'];
	                         	$pw=md5($_POST['txtp']);

	                         	$select=mysqli_query($con, "select * from tblsignup where Email='$e' and Password='$pw'");
	                         	if(mysqli_num_rows($select))
	                         	{
									if($e=='admin@gmail.com')
									{
										echo "<script>window.location.assign('admin/index.php')</script>";
									}
									else
									{
										echo "<script>window.location.assign('customer/index.php')</script>";
									}
									
									
	                         	  
									
	                         	}
								
	                         
	                         }
	                         ?>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->


<?php
include 'footer.php';
?>