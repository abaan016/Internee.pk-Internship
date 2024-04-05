<?php
include 'header.php';
include 'config.php';
?>


<?php
if(isset($_GET['A']) && isset($_GET['B']))
{
	$pid=$_GET['A'];
	$pprice=$_GET['B'];
	$ip=$_SERVER['REMOTE_ADDR'];

	$insert=mysqli_query($con,"insert into tblcart values('null','$pid','$pprice','$ip')");

	if($insert)
	{
		echo "<script>window.location.assign('index.php')</script>";
	}

}


?>
<style>
	.mag{
		height: 100;
		
	}
	
</style>

	<!-- start banner Area -->
	<section class="banner-area">
		<div class="container">
			<div class="row fullscreen align-items-center justify-content-start">
				<div class="col-lg-12">

					<div >
						<!-- single-slide -->
						<div class="row single-slide align-items-center d-flex">
							<div class="col-lg-5 col-md-6">
								<div class="banner-content">
									<h1>Shoes New <br>Collection!</h1>
									<p>Sporting goods stores stock the necessities for sports participants, whether it is baseball bats, hockey sticks, basketballs, golf clubs, ice skates, footballs, or hockey pucks.</p>
								
								</div>
							</div>
							<div class="col-lg-7">
								<div class="banner-img">
									<img class="img-fluid" src="img/banner-img.png" hight="75"  alt="">
								</div>
							</div>
						</div>
						<!-- single-slide -->
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- start features Area -->
	<section class="features-area section_gap">
		<div class="container">
			<div class="row features-inner">
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon1.png" alt="">
						</div>
						<h6>Free Delivery</h6>
						<p>Free Shipping on all order</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon2.png" alt="">
						</div>
						<h6>Return Policy</h6>
						<p>Free Shipping on all order</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon3.png" alt="">
						</div>
						<h6>24/7 Support</h6>
						<p>Free Shipping on all order</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon4.png" alt="">
						</div>
						<h6>Secure Payment</h6>
						<p>Free Shipping on all order</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end features Area -->

	<!-- Start category Area -->
	<section class="category-area">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 col-md-12">
					<div class="row">
						<div class="col-lg-8 col-md-8">
							<div class="single-deal">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="image/c1.jpg" alt="">
								<a href="image/c1.jpg" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">Sneaker for Sports</h6>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="single-deal">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="image/c2.jpg" alt="">
								<a href="image/c2.jpg" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">Sneaker for Sports</h6>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="single-deal">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="image/c3.jpg" alt="">
								<a href="image/c3.jpg" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">Product for Couple</h6>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-8 col-md-8">
							<div class="single-deal">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="image/c4.jpg" alt="">
								<a href="image/c4.jpg" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">Sneaker for Sports</h6>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single-deal">
						<div class="overlay"></div>
						<img class="img-fluid w-100 mag" src="image/c5.jpg" alt="">
						<a href="image/c5.jpg" class="img-pop-up" target="_blank">
							<div class="deal-details">
								<h6 class="deal-title">Sneaker for Sports</h6>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End category Area -->

	<!-- start product Area -->
	<section>
		<!-- single product slide -->
		<div class="single-product-slider">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 text-center">
						<div class="section-title">
							<h1>Latest Products</h1>
							<p>Experience unmatched speed and cushioning with the new RapidStride Pro. Engineered for runners who demand excellence.</p>
						</div>
					</div>
				</div>
				<div class="row">
					<!-- single product -->
					<?php
						$select=mysqli_query($con,"select *from tblproduct");
						foreach($select as $data)
						 {
							?>
							<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<img class="img-fluid" src="<?php echo "admin/Images/". $data['Pimage']?>" alt="">
							<div class="product-details">
								<h6><?php echo $data['Pname']?></h6>
								<div class="price">
									<h6><?php echo $data['Pprice']?></h6>	
									
								</div>
								<div class="prd-bottom">

									<a href="index.php?A=<?php echo $data['Pid']?>&B=<?php echo $data['Pprice']?> " class="social-info">
										<span class="ti-bag"></span>
										<p class="hover-text">Add To Cart</p>
									</a>
							
									<a href="single-product.php?A=<?php echo $data['Pid']?>" class="social-info">
										<span class="lnr lnr-move"></span>
										<p class="hover-text">view More</p>
									</a>
								</div>
							</div>
						</div>
					</div>					
							<?php
						 }
							
						
						?>
				</div>
			</div>
		</div>
		
	</section>
	<!-- end product Area -->

	<!-- Start exclusive deal Area -->
	<section class="exclusive-deal-area">
		<div class="container-fluid">
			<div class="row justify-content-center align-items-center">
				<div class="col-lg-6 no-padding exclusive-left">
					<div class="row clock_sec clockdiv" id="clockdiv">
						<div class="col-lg-12">
							<h1>Exclusive Hot Deal Ends Soon!</h1>
							<p>Who are in extremely love with eco friendly system.</p>
						</div>
						<div class="col-lg-12">
							<div class="row clock-wrap">
								<div class="col clockinner1 clockinner">
									<h1 class="days">150</h1>
									<span class="smalltext">Days</span>
								</div>
								<div class="col clockinner clockinner1">
									<h1 class="hours">23</h1>
									<span class="smalltext">Hours</span>
								</div>
								<div class="col clockinner clockinner1">
									<h1 class="minutes">47</h1>
									<span class="smalltext">Mins</span>
								</div>
								<div class="col clockinner clockinner1">
									<h1 class="seconds">59</h1>
									<span class="smalltext">Secs</span>
								</div>
							</div>
						</div>
					</div>
					<a href="index.php" class="primary-btn">Shop Now</a>
				</div>
				<div class="col-lg-6 no-padding exclusive-right">
					<div class="active-exclusive-product-slider">
						<?php
						$select=mysqli_query($con,"select *from tblproduct");
						foreach($select as $data)
						 {
							?>
							<div class="">
						<div class="single-product">
							<img class="img-fluid" src="<?php echo "admin/Images/". $data['Pimage']?>" alt="">
							<div class="product-details">
								<h6><?php echo $data['Pname']?></h6>
								<div class="price">
									<h6><?php echo $data['Pprice']?></h6>	
									
								</div>
								<div class="prd-bottom">

									<a href="index.php?A=<?php echo $data['Pid']?>&B=<?php echo $data['Pprice']?> " class="social-info">
										<span class="ti-bag"></span>
										<p class="hover-text">Add To Cart</p>
									</a>
							
									<a href="single-product.php?A=<?php echo $data['Pid']?>" class="social-info">
										<span class="lnr lnr-move"></span>
										<p class="hover-text">view More</p>
									</a>
								</div>
							</div>
						</div>
					</div>					
							<?php
						 }
							
						
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End exclusive deal Area -->

	
	

<?php
include 'footer.php';
?>