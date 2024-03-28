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

        <!-- Hero -->
        <section id="home" class="hero d-flex justify-content-center align-items-center">
            <div style="background-color: var(--dark);" class="hero-sec-overlay"></div>

            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12 mb-5 mb-lg-0 mx-auto">
                        <div class="hero-section-text mt-5 text-center">
                            
                            <h3 class="hero-title text-white mt-4 mb-4"><a href="index.php" style="color: var(--white);">Home</a> / <a href="internships.php">About</a></h3>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- // Hero -->

        <!-- About -->
        <section id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12 p-2">
                        <div class="image-founder">
                            <img src="assets/images/founder.jpg" alt="" class="img-fluid">
                            <div class="content-founder">
                                <h2>Hammad Sheikh</h2>
                                <small>Founder</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 p-2">
                        <div class="image-founder">
                            <img src="assets/images/rayyan.jpg" alt="" class="img-fluid">
                            <div class="content-founder">
                                <h2>Rayyan Zain</h2>
                                <small>CMO</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <h2 class="fw-bold mt-3" style="color: var(--dark);">Welcome to Internee.pk</h2>
                        <p class="my-3">Our internship program is designed to give students the opportunity to work on meaningful projects
                            and tasks, while also receiving mentorship and guidance from experienced professionals in the field.
                            Our goal is to help interns develop the skills and knowledge they need to succeed in their careers,
                            while also building a strong network of talented individuals who may become valuable members of our
                            team in the future. If you're looking for a challenging and rewarding internship experience, we
                            invite you to explore our program and <a href="internships.html" class="fw-bold">Apply Today</a></p>
                            <a href="" class="button">Explore Internships</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- // About -->

        <!-- Team Work -->
        <section class="testimonials">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <h2>What Students are saying about internee.pk</h2>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-lg-10 mx-auto">


                        <?php
                        try {
                            $dbh = new PDO('mysql:host=localhost;dbname=db_internee.pk', 'root', '');
                            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            $stmt = $dbh->prepare("CALL fetchReviews()");
                            $stmt->execute();

                        ?>
                            <div id="testimonial-slider" class="owl-carousel">
                                <?php

                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <div class="item">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <p><q><?php echo $row["feedback"] ?></q></p>
                                                <h4><?php echo $row["Name"] ?></h4>
                                                <span><?php echo $row["location"] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }

                                ?>
                            </div>
                        <?php

                        } catch (PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }
                        ?>



                    </div>
                </div>
            </div>
        </section>
        <!-- // Team Work -->

        <!-- Footer -->
        <?php require("./components/footer.php") ?>    
        <!-- // Footer -->

    </main>

    <!-- JS Scripting -->
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