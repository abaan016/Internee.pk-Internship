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
                            
                            <h4 class="hero-title text-white mt-4 mb-4"><a href="index.php" style="color: var(--white);">Home</a> / <a href="contact.php">Contact us</a></h4>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- // Hero -->

        <!-- Contact Content -->
        <header class="container my-5">
      <div class="row d-flex justify-content-center">
         <div class="col-lg-12 animate__animated animate__fadeInDown animate__delay-1s" data-aos="fade-down"
            data-aos-duration="1000">
            <p class="text-center display-5 fw-bolder pt-5">
               Shoot us a note!
            </p>
         </div>
         <div class="col-lg-12 py-3 animate__animated animate__fadeIn animate__delay-1s" data-aos="fade-up"
            data-aos-duration="1000">
            <p class="text-center fs-5 fw-lighter">
               We try our best to get back to you within 24 hours.
            </p>
         </div>
         <div class="container-fluid px-5 py-5">
            <div class="row flex-row align-content-center">
               <div class="col-lg-6 py-3 animate__animated animate__fadeInDown animate__delay-1s" data-aos="fade-down"
                  data-aos-duration="1000" style="position: relative;">
                  <div style="overflow: hidden;">
                     <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d924244.0619641689!2d66.59499551729773!3d25.192146526892635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33e06651d4bbf%3A0x9cf92f44555a0c23!2sKarachi%2C%20Karachi%20City%2C%20Sindh!5e0!3m2!1sen!2s!4v1690560441133!5m2!1sen!2s"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                  </div>
               </div>

               <div class="col-lg-6 animate__animated animate__fadeInRight animate__delay-1s" data-aos="fade-right"
                  data-aos-duration="1000">
                  <div class="text-left">
                     <form class="row g-5">
                        <div class="col-lg-12">
                           <label for="validationDefault01" class="form-label py-2 fw-light">Full Name</label>
                           <input type="text" class="form-control p-3 bg-light fw-bold" id="validationDefault01"
                              style="color: #979696;" placeholder="First Name" required name="name">
                        </div>
                        <div class="col-lg-6">
                           <label for="validationDefault03" class="form-label py-2 fw-light">Email</label>
                           <input type="email" class="form-control p-3 bg-light fw-bold" id="validationDefault03"
                              style="color: #979696;" placeholder="Email" required name="email">
                        </div>
                        <div class="col-lg-6">
                           <label for="validationDefault04" class="form-label py-2 fw-light">Phone</label>
                           <input type="text" class="form-control p-3 bg-light fw-bold" id="validationDefault04"
                              style="color: #979696;" placeholder="Phone Number" required name="phone">
                        </div>
                        <div class="col-lg-12">
                           <label for="validationDefault07" class="form-label py-2 fw-light">Message</label>
                           <textarea class="form-control h-100 bg-light fw-bold" style="color: #979696;"
                              placeholder="Message" id="floatingTextarea" required name="msg"></textarea>
                        </div>
                        <div
                           class="col-lg-12 d-flex justify-content-center animate__animated animate__fadeInLeft animate__delay-1s"
                           data-aos="fade-right" data-aos-duration="1000">
                           <button class="btn button mt-3" type="submit" name="SendMsg">Send</button>
                        </div>
                     </form>
                     <!-- ...Php  -->
                     <?php
                     if(isset($_POST["SendMsg"]))
                     {
                        $name = $_POST["name"];
                        $email = $_POST["email"];
                        $phone = $_POST["phone"];
                        $message = $_POST["msg"];

                        $query = "INSERT INTO `tbl_contact` (`Name`, `Email`, `Phone`, `Message`) 
                        VALUES ('$name','$email','$phone','$message')";
                        $result = mysqli_query($conn, $query);

                        if($result) {
                           echo '<script>alert("Message Sent ✔")</script>';
                           header("refresh:2.0,URl=index.php");
                        } else {
                              echo '<script>alert("sending failed")</script>';
                        }
                     }
                     ?>
                     <!-- ...Php  -->
                  </div>
               </div>
            </div>
         </div>
      </div>
   </header>
        <!-- // Contact Content -->

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