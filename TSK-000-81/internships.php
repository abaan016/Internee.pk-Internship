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
                            
                            <h4 class="hero-title text-white mt-4 mb-4"><a href="index.php" style="color: var(--white);">Home</a> / <a href="internships.php">Internships</a></h4>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- // Hero -->

        <!-- Internships -->
        <section id="internships">
            <div class="container">
                <div class="row">
                    <!--  Fetch Internships -->
                    <?php
                    
                    $query = "CALL FetchInternships();";
                    $result = mysqli_query($conn, $query);

                    if($result)
                    {
                        while($row =mysqli_fetch_assoc($result))
                        {?>

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
                                    <a href="sub-internship.php?id=<?php echo $row["Id"] ?>" class="btn"> Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php }
                    }else{
                        echo '<h3 class="my-3" style="color: var(--dark); font-size: 26px;">No Internships Found</h3>';
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
                        <div id="testimonial-slider" class="owl-carousel">

                            <div class="item">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <p><q>internee.pk is the best, most comprehensive 21st-century innovation for those students who are looking for internships and upgrading their skillsets. Their projects are tough but market valued.</q></p>
                                        <h4>Fariya Zaid</h4>
                                        <span>Location</span>
                                    </div>
                                </div>
                            </div>
                        </div>
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