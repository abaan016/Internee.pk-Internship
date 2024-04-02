<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Authentication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-2 fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Web</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link btn -btn-sm bg-success text-white ms-3 p-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn -btn-sm bg-primary text-white ms-3 p-2" data-bs-toggle="modal" data-bs-target="#registerModal">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar -->

    <!-- Content -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6 mx-auto mt-5">
                <h1 class="my-5 display-4 fw-bold">Welcome Here...</h1>
            </div>
        </div>
    </div>
    <!-- Content -->


    <!-- register Modal -->
    <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-primary" id="staticBackdropLabel">Register Account</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="login-register.php" method="post" class="form-group p-3">
                        <input type="text" name="fullname" required class="form-control" placeholder="Enter Full Name">
                        <input type="email" name="email" required class="form-control mt-3" placeholder="Enter Email">
                        <input type="password" name="password" required class="form-control my-3" placeholder="Enter Password">

                        <button class="btn bg-primary text-white fw-bold form-control" type="submit" name="register">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- register Modal -->

    <!-- login Modal -->
    <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-success" id="staticBackdropLabel">Login</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="login-register.php" method="post" class="form-group p-3">
                        <input type="email" name="email" required class="form-control" placeholder="Enter Email">
                        <input type="password" name="password" required class="form-control my-3" placeholder="Enter Password">
                        <a href="reset-password.php">Forgot Password</a>

                        <button class="btn bg-success text-white fw-bold form-control mt-3" type="submit" name="login">login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- login Modal -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>