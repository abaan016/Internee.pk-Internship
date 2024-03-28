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

                    <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                        <div class="hero-section-text mt-5">
                            <h6 class="text-white">Are you looking for your dream Internship ?</h6>

                            <h1 class="hero-title text-white mt-4 mb-4">Join <span style="color: var(--primary);">Internee.pk</span> now..!</h1>
                            <p style="color: var(--white); ">Pakistan's Virtual Internship Platform Powered By <a href="#" style="font-weight: bold; color: rgb(208, 228, 255);">TechvioChats</a></p>

                            <a href="#" style="color: var(--white); border: 2px solid var(--white);" class="button">Browse Internships</a>
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
        <section class="container team-work">
            <div class="row">
                <div class="col-lg-6">
                    <div class="team-desc">
                        <h2>Launching tech careers with internships, exposure, and networking.</h2>
                        <p class="team-desc">Internee.pk kickstart student's tech careers with first internships, providing industry exposure,
                            practical skills, and networking opportunities, paving the way for their success in the tech
                            industry.</p>
                    </div>
                    <div class="team-counter d-flex mt-5">
                        <div class="registered-users">
                            <p>5000+</p>
                            <span>Registered users</span>
                        </div>
                        <div class="opening-interns ms-5">
                            <p>35+</p>
                            <span>Opening Internships</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="image-thumb">
                        <img src="assets/images/people-working-as-team-company.jpg" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </section>
        <!-- // Team Work -->

        <!-- Internships -->
        <section id="internships">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 mx-auto text-center">
                        <h1 class="display-4 fw-bold mb-2">Recent Internships</h1>
                        <p><strong>Internships came after every two months</strong> Grab your internships on your favourite
                            domain to boost up yourself in the field of Computer technology</p>
                    </div>
                </div>
                <div class="row mt-5">
                    <!--  Fetch Internships -->
                    <?php

                    $ref = "CALL newInternships();";
                    $check = mysqli_query($conn, $ref);

                    if ($check) {
                        while ($row = mysqli_fetch_assoc($check)) { ?>

                            <div class="col-lg-4 mt-2">
                                <div class="card">
                                    <img src="assets/internships/<?php echo $row["CoverImg"] ?>" alt="">
                                    <div class="card-body">
                                        <h3 class="mb-3" style="color: var(--dark); font-size: 26px;"><?php echo $row["Category"] ?></h3>
                                        <div class="info">
                                            <span><i class="bi bi-geo-alt"></i> <?php echo $row["Type"] ?></span>
                                            <span class="ms-5"><i class="bi bi-clock"></i> <?php echo $row["Duration"] ?> month</span>
                                        </div>
                                        <hr style="color: var(--gray);">
                                        <div class="d-flex justify-content-end">
                                            <a href="sub-internship.php?id=<?php echo $row["Id"] ?>" class="btn">Explore</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    <?php }
                    }

                    ?>

                </div>
            </div>
        </section>
        <!-- // Internships -->

        <!-- Testimonials -->
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
        <!-- // Testimonials -->

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