<?php
include "header.php";
include "config.php";
?>
<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>
                                    <form class="user">
                                    <div class="col-md-12 form-group">
								<input type="email" class="form-control" id="name" name="txte" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="name" name="txtp" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="f-option2" name="selector">
									<label for="f-option2">Keep me logged in</label>
								</div>
							</div>
							<div class="col-md-12 form-group">
								<input type="submit" value="Login" name="btnlogins" class="btn primary-btn">
								<a href="#">Forgot Password?</a>
							</div>
                                    </form>
                                    <hr>
                                   
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div>
                                    <?php

if(isset($_POST['btnlogins']))
{
    $e=$_POST['txte'];
    $pw=md5($_POST['txtp']);

    $select=mysqli_query($con, "select * from tblsignup where Email='$e' and Password='$pw'");
    if(mysqli_num_rows($select))
    {
       
       
      
       echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
       <strong>Login is Successfully</strong> 
       <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
     </div>";
     
     echo '<meta http-equiv="Refresh" content="3; url=index.php"/>';
    }
   else
   {
       
       echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
       <strong>invalide login</strong> 
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

            </div>

        </div>

    </div>
    <?php
include "footer.php";


?>