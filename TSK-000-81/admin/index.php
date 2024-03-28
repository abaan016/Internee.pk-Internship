<!-- Config -->
<?php require("../components/config.php");

session_start();

if (isset($_SESSION['e']) && isset($_SESSION['p'])) {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - <?php echo $title ?></title>
        <!-- Links -->
        <?php require("links.php") ?>

    </head>

    <body class="sb-nav-fixed">
        <!-- Header -->
        <?php require("header.php") ?>

        <div id="layoutSidenav">
            <!-- Sidebar -->
            <?php require("sidebar.php") ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4" style="color: var(--dark); font-size: 32px;">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"><?php if ($_SESSION["r"] == 1) {
                                                                    echo 'Admin';
                                                                } ?></li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-4 col-md-6">
                                <div class="card mb-4">
                                    <div class="card p-3" style="border: none;">
                                        <h5><i class="fa-solid fa-network-wired" style="color: var(--secondary);"></i> Internships</h5>
                                        <div class="text-end mt-2 mb-0">
                                            <?php
                                            $query = "SELECT COUNT(`Id`) AS total_internships FROM `internships`;";
                                            $result = mysqli_query($conn, $query);

                                            if ($result) {
                                                $row = mysqli_fetch_assoc($result);
                                                $total_internships = $row['total_internships'];
                                            ?>
                                                <p class="lead fw-bold"><span class="text-muted">Total</span> <?php echo $total_internships; ?></p>
                                            <?php
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card mb-4">
                                    <div class="card p-3" style="border: none;">
                                        <h5><i class="fa-solid fa-user" style="color: var(--secondary);"></i> Users</h5>
                                        <div class="text-end mt-2 mb-0">
                                            <?php
                                            $query = "SELECT COUNT(`UserId`) AS total_users FROM `users`;";
                                            $result = mysqli_query($conn, $query);

                                            if ($result) {
                                                $row = mysqli_fetch_assoc($result);
                                                $total_users = $row['total_users'];
                                            ?>
                                                <p class="lead fw-bold"><span class="text-muted">Total</span> <?php echo $total_users; ?></p>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card mb-4">
                                    <div class="card p-3" style="border: none;">
                                        <h5><i class="fa-solid fa-users" style="color: var(--secondary);"></i> Internees</h5>
                                        <div class="text-end mt-2 mb-0">
                                            <?php
                                            $query = "SELECT COUNT(`Internee_Id`) AS total_internees FROM `tbl_internees`;";
                                            $result = mysqli_query($conn, $query);

                                            if ($result) {
                                                $row = mysqli_fetch_assoc($result);
                                                $total_internees = $row['total_internees'];
                                            ?>
                                                <p class="lead fw-bold"><span class="text-muted">Total</span> <?php echo $total_internees; ?></p>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Internees Table -->
                            <div class="col-lg-6">
                                <div class="card mb-4 overflow-scroll">
                                    <div class="card-header">
                                        <i class="fas fa-table me-1"></i>
                                        Enrolled internees
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Intern_Category</th>
                                                    <th>Education</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $query = "CALL fetchInternees()";
                                                $result = mysqli_query($conn, $query);

                                                if ($result) {
                                                    while ($row = mysqli_fetch_assoc($result)) { ?>

                                                        <tr>
                                                            <td><?php echo $row["Name"] ?></td>
                                                            <td><?php echo $row["Email"] ?></td>
                                                            <td><?php echo $row["Phone"] ?></td>
                                                            <td><?php echo $row["Category"] ?></td>
                                                            <td><?php echo $row["Education"] ?></td>
                                                            <td><?php echo $row["Start_date"] ?></td>
                                                            <td><?php echo $row["End_date"] ?></td>
                                                            <td>
                                                                <?php
                                                                if ($row["Intern_status"] == 0) {
                                                                    echo '<span class="badge bg-danger text-white">In progress</span>';
                                                                } else {
                                                                    echo '<span class="badge bg-success text-white">Completed</span>';
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <a href="edit.php?id=<?php echo $row["Internee_Id"] ?>"><i class="fa-solid fa-square-pen"></i></a>
                                                                <a href="del-internee.php?id=<?php echo $row["Internee_Id"] ?>" class="ms-4"><i class="fa-solid fa-trash"></i></a>
                                                            </td>
                                                        </tr>

                                                <?php }
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- FeedBacks -->
                            <div class="col-lg-6">
                                <div class="card mb-4 overflow-scroll">
                                    <div class="card-header">
                                        <i class="fas fa-table me-1"></i>
                                        Internee Reviews
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Name</th>
                                                    <th>Location</th>
                                                    <th>Feedback</th>
                                                    <th>Date</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                try {
                                                    $dbh = new PDO('mysql:host=localhost;dbname=db_internee.pk', 'root', '');
                                                    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                                    $stmt = $dbh->prepare("CALL fetchReviews()");
                                                    $stmt->execute();

                                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                ?>

                                                        <tr>
                                                            <td><?php echo $row["Id"] ?></td>
                                                            <td><?php echo $row["Name"] ?></td>
                                                            <td><?php echo $row["location"] ?></td>
                                                            <td><?php echo $row["feedback"] ?></td>
                                                            <td><?php echo $row["Review_date"] ?></td>
                                                            <td>
                                                                <a href="del-rev.php?id=<?php echo $row["Id"] ?>" class="ms-4"><i class="fa-solid fa-trash"></i></a>
                                                            </td>
                                                        </tr>

                                                <?php
                                                    }
                                                } catch (PDOException $e) {
                                                    echo "Error: " . $e->getMessage();
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </main>

            </div>
        </div>

    </body>

    </html>

<?php
} else {
    header("refresh:0.2,url='../login.php'");
}
?>