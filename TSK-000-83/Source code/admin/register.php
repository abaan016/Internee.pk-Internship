
<?php
include "header.php";
include "config.php";

?>
<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user">
                            <div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="txtn" placeholder="Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
							</div>
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="name" name="txte" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="txtp" name="txtp" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							</div>
                            <div class="col-md-12 form-group">
								<input type="password" class="form-control" id="txtcp" name="txtcp" placeholder="CPassword" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="f-option2" name="selector">
									<label for="f-option2">Keep me logged in</label>
								</div>
							</div>
							<div class="col-md-12 form-group">
								<input type="submit" value="SignUp"  name="btnsignup" class="btn primary-btn">
								<a href="#">Forgot Password?</a>
						
                            </form>
                            <hr>
                           
                            <div class="text-center">
                                <a class="small" href="logins.php">Already have an account? Login!</a>
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
								   
								  echo '<meta http-equiv="refresh" content="3; url=logins.php"';
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
            </div>
        </div>

    </div>
    <?php
include "footer.php";


?>