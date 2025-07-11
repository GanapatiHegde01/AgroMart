<?php

session_start();
$user_id = 0;
if (isset($_SESSION['cid'])) {
    # code...
    $user_id = $_SESSION['cid'];
    //   header("location:Login/loginform.html");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/" />

    <!-- title -->
    <title>About</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png" />
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet" />
    <!-- fontawesome -->
    <link rel="stylesheet" href="assets/css/all.min.css" />
    <!-- bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
    <!-- owl carousel -->
    <link rel="stylesheet" href="assets/css/owl.carousel.css" />
    <!-- magnific popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css" />
    <!-- animate css -->
    <link rel="stylesheet" href="assets/css/animate.css" />
    <!-- mean menu css -->
    <link rel="stylesheet" href="assets/css/meanmenu.min.css" />
    <!-- main style -->
    <link rel="stylesheet" href="assets/css/main.css" />
    <!-- responsive -->
    <link rel="stylesheet" href="assets/css/responsive.css" />
</head>

<body>
    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

    <!-- header -->
    <div class="top-header-area" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="index.php">
                                <img src="assets/img/logo.png" alt="" />
                            </a>
                        </div>
                        <!-- logo -->

                        <!-- menu start -->
                        <?php include 'sidebar.php'; ?>
                        <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                        <div class="mobile-menu"></div>
                        <!-- menu end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->

    <!-- search area -->
    <div class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="close-btn"><i class="fas fa-window-close"></i></span>
                    <div class="search-bar">
                        <div class="search-bar-tablecell">
                            <h3>Search For:</h3>
                            <input type="text" placeholder="Keywords" />
                            <button type="submit">
                                Search <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end search arewa -->

    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>We sell agriculture related products</p>
                        <h1>About Us</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- featured section -->
    <div class="feature-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="featured-text">
                        <h2 class="pb-3">
                            Why <span class="orange-text">AgroMart</span>
                        </h2>
                        <div class="row">
                            <div class="col-lg-16 col-md-12 mb-6 mb-md-10">
                                <p><b> Welcome to AgroMart, your trusted partner in agriculture! At AgroMart, we are
                                        passionate about providing top-quality products and valuable information to
                                        support farmers, gardeners, and agricultural enthusiasts. Our mission is to
                                        empower you with the best tools, seeds, plants, and fertilizers to help you
                                        achieve a successful and sustainable farming experience.
                                    </b></p>
                                <br><br><br>
                            </div>

                            <div class="col-lg-6 col-md-6 mb-4 mb-md-5">
                                <div class="list-box d-flex">
                                    <div class="list-icon">
                                        <i class="fas fa-shipping-fast"></i>
                                    </div>
                                    <div class="content">
                                        <h3>Free Shipping</h3>
                                        <p>
                                            We provide Free shipping on every order.


                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 mb-5 mb-md-5">
                                <div class="list-box d-flex">
                                    <div class="list-icon">
                                        <i class="fas fa-money-bill-alt"></i>
                                    </div>
                                    <div class="content">
                                        <h3>Transparent Pricing</h3>
                                        <p>
                                            We provide Transparent and reasonable pricing.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 mb-5 mb-md-5">
                                <div class="list-box d-flex">
                                    <div class="list-icon">
                                        <i class="fas fa-leaf"></i>
                                    </div>
                                    <div class="content">
                                        <h3>Good Quality</h3>
                                        <p>
                                            We provide very good quality seeds and plants.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="list-box d-flex">
                                    <div class="list-icon">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <div class="content">
                                        <h3>Timely Delivery</h3>
                                        <p>
                                            We deliver your product on time at the desired location.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end featured section -->

    <!-- shop banner -->
    <!-- <section class="shop-banner">
        <div class="container">
            <h3>
                December sale is on! <br />
                with big <span class="orange-text">Discount...</span>
            </h3>
            <div class="sale-percent">
                <span>Sale! <br />
                    Upto</span>50% <span>off</span>
            </div>
            <a href="shop.html" class="cart-btn btn-lg">Shop Now</a>
        </div>
    </section> -->
    <!-- end shop banner -->

    <!-- team section -->
    <!-- <div class="mt-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3>Our <span class="orange-text">Team</span></h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Aliquid, fuga quas itaque eveniet beatae optio.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-team-item">
                        <div class="team-bg team-bg-1"></div>
                        <h4>Jimmy Doe <span>Farmer</span></h4>
                        <ul class="social-link-team">
                            <li>
                                <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-team-item">
                        <div class="team-bg team-bg-2"></div>
                        <h4>Marry Doe <span>Farmer</span></h4>
                        <ul class="social-link-team">
                            <li>
                                <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                    <div class="single-team-item">
                        <div class="team-bg team-bg-3"></div>
                        <h4>Simon Joe <span>Farmer</span></h4>
                        <ul class="social-link-team">
                            <li>
                                <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- end team section -->

    <!-- testimonail-section -->
    <!-- <div class="testimonail-section mt-80 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-center">
                    <div class="testimonial-sliders">
                        <div class="single-testimonial-slider">
                            <div class="client-avater">
                                <img src="assets/img/avaters/avatar1.png" alt="" />
                            </div>
                            <div class="client-meta">
                                <h3>Saira Hakim <span>Local shop owner</span></h3>
                                <p class="testimonial-body">
                                    " Sed ut perspiciatis unde omnis iste natus error veritatis
                                    et quasi architecto beatae vitae dict eaque ipsa quae ab
                                    illo inventore Sed ut perspiciatis unde omnis iste natus
                                    error sit voluptatem accusantium "
                                </p>
                                <div class="last-icon">
                                    <i class="fas fa-quote-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="single-testimonial-slider">
                            <div class="client-avater">
                                <img src="assets/img/avaters/avatar2.png" alt="" />
                            </div>
                            <div class="client-meta">
                                <h3>David Niph <span>Local shop owner</span></h3>
                                <p class="testimonial-body">
                                    " Sed ut perspiciatis unde omnis iste natus error veritatis
                                    et quasi architecto beatae vitae dict eaque ipsa quae ab
                                    illo inventore Sed ut perspiciatis unde omnis iste natus
                                    error sit voluptatem accusantium "
                                </p>
                                <div class="last-icon">
                                    <i class="fas fa-quote-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="single-testimonial-slider">
                            <div class="client-avater">
                                <img src="assets/img/avaters/avatar3.png" alt="" />
                            </div>
                            <div class="client-meta">
                                <h3>Jacob Sikim <span>Local shop owner</span></h3>
                                <p class="testimonial-body">
                                    " Sed ut perspiciatis unde omnis iste natus error veritatis
                                    et quasi architecto beatae vitae dict eaque ipsa quae ab
                                    illo inventore Sed ut perspiciatis unde omnis iste natus
                                    error sit voluptatem accusantium "
                                </p>
                                <div class="last-icon">
                                    <i class="fas fa-quote-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- end testimonail-section -->

    <!-- logo carousel -->
    <!-- <div class="logo-carousel-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="logo-carousel-inner">
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/1.png" alt="" />
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/2.png" alt="" />
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/3.png" alt="" />
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/4.png" alt="" />
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/5.png" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- end logo carousel -->

    <!-- footer -->
    <?php
    include 'footer.php';
    ?>
    <!-- end copyright -->

    <!-- jquery -->
    <script src="assets/js/jquery-1.11.3.min.js"></script>
    <!-- bootstrap -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- count down -->
    <script src="assets/js/jquery.countdown.js"></script>
    <!-- isotope -->
    <script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
    <!-- waypoints -->
    <script src="assets/js/waypoints.js"></script>
    <!-- owl carousel -->
    <script src="assets/js/owl.carousel.min.js"></script>
    <!-- magnific popup -->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- mean menu -->
    <script src="assets/js/jquery.meanmenu.min.js"></script>
    <!-- sticker js -->
    <script src="assets/js/sticker.js"></script>
    <!-- main js -->
    <script src="assets/js/main.js"></script>
</body>

</html>