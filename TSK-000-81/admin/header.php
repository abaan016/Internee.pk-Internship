<!-- Config -->
<?php require("../components/config.php"); 

session_start();

if(isset( $_SESSION['e']) && isset( $_SESSION['p'])){

?>

<nav class="sb-topnav navbar navbar-expand text-white" style="background-color: var(--dark);">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3 fw-bold" style="color: var(--primary);" href="index.html">internee.pk</a>
            <!-- Sidebar Toggle-->
            <a id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></a>
            <!-- Navbar-->
            <ul class="navbar-nav  ms-auto me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="assets/img/profile.png" class="img-fluid" width="30px" alt=""> <span style="font-size: 16px;"><?php echo $_SESSION["n"] ?></span></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <?php 
}
else{
    header("refresh:0.2,url='../login.php'");
}
?>