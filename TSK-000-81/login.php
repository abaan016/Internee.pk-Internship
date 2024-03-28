<?php require("./components/config.php");

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login - <?php echo $title ?></title>
    <!-- Links -->
    <?php require("./components/links.php") ?>

<style>

.row {
    height: 100vh;
    display: flex;
    align-items: center; 
    justify-content: center; 
}

</style>

</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-4 mx-auto">
                <div class="card p-3" style="border: none; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                    <img src="assets/images/logo.png" class="img-fluid text-center" width="280px" alt="">
                    <div class="card-body">
                        <form method="post" class="form-group">
                            <input type="email" class="form-control mt-3" name="email" placeholder=" Username or Email">
                            <input type="password" class="form-control my-3" name="password" placeholder="Password ">
                            <div class="d-flex justify-content-end">
                                <button class="button" type="submit" name="btnlogin">Sign in</button>
                            </div>
                            <a href="">Forgot Password</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <!-- Login Php -->
    <?php
    if(isset($_POST['btnlogin'])) {
        if(isset($_POST['email']) && isset($_POST['password'])) {
            $useremail = $_POST['email'];
            $userpass = $_POST['password'];

            $query = "CALL userAuth()";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);

            if($row) {
                $_SESSION['id'] = $row['UserId'];
                $_SESSION['r'] = $row['UserRole'];
                $_SESSION['n'] = $row['FullName'];
                $_SESSION['e'] = $row['Email'];      
                $_SESSION['p'] = $row['UserPass'];

                echo "<script>alert('You are Logged in'); window.location='./admin/index.php';</script>";
            } 
            else {
                echo "<script>alert('Invalid email or password');</script>";
            }
        }
    }
    ?>
    
</body>
</html>