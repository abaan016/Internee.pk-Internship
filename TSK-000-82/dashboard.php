<?php

require("config.php");

session_start();

if (isset($_SESSION['e']) && isset($_SESSION['p'])) {

?>

    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>User Dashboard</title>
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
                            <a class="nav-link btn -btn-sm bg-primary text-white ms-3 p-2" href="logout.php">Log out</a>
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
                    <h1 class="my-5 display-4 fw-bold">Welcome <span class="badge bg-success text-white"><?php echo $_SESSION['n'] ?></span></h1>
                </div>
            </div>
        </div>
        <!-- Content -->



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>

    </html>

<?php
} else {
    header("refresh:0.2,url='index.php'");
}
?>