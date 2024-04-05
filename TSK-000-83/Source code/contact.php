<?php

include 'header.php';
include 'config.php';
session_start();
?>


	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Contact Us</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.php">Contact</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Contact Area =================-->
	<section class="contact_area section_gap_bottom">
		<div class="container">
			<div id="mapBox" class="mapBox" data-lat="40.701083" data-lon="-74.1522848" data-zoom="13" data-info="Shah Faisal Colony Flyover, Faisal Cantonment, Karachi, Karachi City, Sindh, Pakistan"
			

			 data-mlat="40.701083" data-mlon="-74.1522848">
			 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3619.3139925216933!2d67.14924997424777!3d24.88726914418637!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb339999415e0c3%3A0x36742eee0fd9c291!2sAptech%20Metro%20Star%20Gate!5e0!3m2!1sen!2s!4v1692435098742!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
			<div class="row">
				<div class="col-lg-3">
					<div class="contact_info">
						<div class="info_item">
							<i class="lnr lnr-home"></i>
							<h6>Karachi, Pakistan</h6>
							<p>Aptech Metro Star Gate Center</p>
						</div>
						<div class="info_item">
							<i class="lnr lnr-phone-handset"></i>
							<h6><a href="#">+92 311877920944</a></h6>
							<p>Mon to Fri 9am to 9 pm</p>
						</div>
						<div class="info_item">
							<i class="lnr lnr-envelope"></i>
							<h6><a href="#">support@onlinecart.com</a></h6>
							<p>Send us your query anytime!</p>
						</div>
					</div>
				</div>
				<div class="col-lg-9">
				
					<form class="row contact_form" action="" method="post" id="contactForm" novalidate="novalidate">
						<div class="col-md-6">
							<div class="form-group" >
								<input type="text"  class="form-control" id="name" name="txtn" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" required>
						
								
							</div>
							<div class="form-group">
								
								<input type="email"  class="form-control" id="email" name="txte" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" required></input>
								
							</div>
							<div class="form-group">
								<input type="text"  class="form-control" id="subject" name="txts" placeholder="Enter Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" required>
								
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<textarea class="form-control" name="txtm" id="message" rows="1" placeholder="Enter Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" required></textarea>
								
							</div>
						</div>
						<div class="col-md-12 text-right">
							<button type="submit" value="submit" class="primary-btn" name="btninsert">Send Message</button>
						</div>
					</form>
                         
					<?php
                           

						   if(isset($_POST['btninsert']))
						   {
							$name=$_POST['txtn'];
							$email=$_POST['txte'];
							$subject=$_POST['txts'];
							$message=$_POST['txtm'];

                              $insert=mysqli_query($con,"insert into tblcontact values('$name','$email','$subject','$message')");
							  if($insert)
							  {
								echo
								'
								<br><br>
								<div class="alert alert-success" role="alert">
                                         *** Message Has Been Sent!***
                                            </div>
								';
							  }
							  else
							  {
								echo
								'
								<div class="alert alert-danger" role="alert">
                                         ### Message Not Sent ###
                                            </div>
								';
							  }

						   }
					?>



				</div>
			</div>
			
		</div>
	</section>
	<!--================Contact Area =================-->
	<?php
include 'footer.php';
?>
	