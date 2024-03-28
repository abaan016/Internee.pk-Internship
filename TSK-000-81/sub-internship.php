<?php require("./components/config.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <!-- Links -->
    <?php require("./components/links.php") ?>
</head>
<body>
    
    <!-- Navbar -->
    <?php require("./components/header.php") ?>    
    <!-- // Navbar -->

    <main>
        <div class="container my-5">
            <div class="row my-5">
                <div class="col-lg-8 mx-auto text-center">
                    <h2>Featured Internships</h2>
                    <p>Grab your <a href="internships.php">Internships</a> on your favorite domain now..!</p>
                </div>
            </div>
            <!-- Cards -->
            <div class="row">
                <!-- Fetch Internships -->
                <?php
                if(isset($_GET['id'])) {
                    $gid = $_GET['id'];
                    try {
                        $dbh = new PDO('mysql:host=localhost;dbname=db_internee.pk', 'root', '');
                        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $stmt = $dbh->prepare("CALL Sub_Interns_fetch(:id)");
                        $stmt->bindParam(':id', $gid);
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                            <div class="col-lg-4 mt-2">
                                <div class="card">
                                    <div class="card-header d-flex">
                                        <img style="width: 160px; height: 160px; object-fit: cover; padding: 15px;" src="assets/internships/sub-logo/<?php echo $row["LogoImg"] ?>" class="img-fluid" alt="">
                                        <h3 class="mb-3 mt-5" style="color: var(--dark); font-size: 26px;"><?php echo $row["DomainName"] ?></h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="info">
                                            <span class="fw-bold"><i class="bi bi-geo-alt"></i> <?php echo $row["Location"] ?></span>
                                            <span class="badge ms-3" style="background-color: var(--gray); font-weight: 500; font-size: 15px;"><i class="bi bi-geo-alt"></i> <?php echo $row["JobType"] ?></span>
                                            <span class="badge ms-3" style="background-color: var(--gray); font-weight: 500; font-size: 15px;"><i class="bi bi-clock"></i> <?php echo $row["WorkType"] ?></span>
                                        </div>
                                        <hr style="color: var(--gray);">
                                        <div class="d-flex justify-content-end">
                                            <a href="<?php echo $row["ApplyLink"] ?>" class="btn" style="background-color: var(--secondary); color: var(--white);">Apply</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <?php
                        }
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                }
                ?>
            </div>
        </div>

        <!-- Footer -->
        <?php require("./components/footer.php") ?>    
        <!-- // Footer -->

    </main>

    <!-- JS Scripting -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $('#testimonial-slider').owlCarousel({
                loop: true,
                margin: 30,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    992: {
                        items: 3
                    }
                }
            });
        });
    </script>
</body>
</html>
