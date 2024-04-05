<?php
include 'header.php';	
include 'config.php';
?>

<?php
if(isset($_GET['A']))
{
	$pid=$_GET['A'];
	$select=mysqli_query($con,"select * from tblproduct where Pid='$pid'");
	$fetch=mysqli_fetch_assoc($select);
}


?>
	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1><?php echo $fetch['Pname'] ?></h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
						<a href="single-product.php">product-details</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<div>
						<div class="single-prd-item">
						<img class="img-fluid" src="<?php echo "admin/Images/".$fetch['Pimage']?>" alt="">						</div>
						
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3><?php echo $fetch['Pname'] ?></h3>
						<h2><?php echo $fetch['Pprice'] ?></h2>
						
						<p><?php echo $fetch['Pdescription'] ?></p>
						
						<div class="card_area d-flex align-items-center">
							<a class="primary-btn" href="cart.php">Add to Cart</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->




<?php
include 'footer.php';
?>