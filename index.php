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
    <title>AgroMart</title>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
    <!-- <div class="search-area">
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
    </div> -->
    <!-- end search area -->

    <!-- hero area -->
    <div class="hero-area hero-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 offset-lg-2 text-center">
                    <div class="hero-text">
                        <div class="hero-text-tablecell">
                            <p class="subtitle">AgroMart</p>
                            <h1>Welcome To AgroMart</h1>
                            <h4 style="color: white;">Your go-to store for all agricultural needs, from plants and seeds
                                to tools and
                                fertilizers.</h4>
                            <div class=" hero-btns">
                                <a href="Events.php" class="boxed-btn">Shop</a>
                                <a href="guide.php" class="bordered-btn">Help</a>

                            </div>
                            <br>
                            <br>
                            <h4 style="color:white">We only trade in Bulk-orders!</h4>
                            <br><br>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- end hero area -->

    <!-- features list section -->
    <div class="list-section pt-80 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="list-box d-flex align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <div class="content">
                            <h3>Free Shipping</h3>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="list-box d-flex align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-phone-volume"></i>
                        </div>
                        <div class="content">
                            <h3>24/7 Support</h3>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="list-box d-flex justify-content-start align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-sync"></i>
                        </div>
                        <div class="content">
                            <h3>Refund</h3>
                            <p>Get refund within 3 days!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end features list section -->
    <!-- product section -->
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Products</span> </h3>
                        <!-- <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Aliquid, fuga quas itaque eveniet beatae optio.
                        </p> -->
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $qry = "SELECT * FROM `product_category`";
                $res = mysqli_query($con, $qry);
                while ($row = mysqli_fetch_assoc($res)) {
                    $fetch_src = FETCH_SRC;

                ?>

                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">

                            <div class="product-image">
                                <a href="procat.php?id=<?php echo  $row['Eid']  ?>"><img src=<?php echo $fetch_src . $row['Eimage'] ?> alt="" /></a>
                            </div>
                            <h6><?php echo $row['Ename']
                                ?></h6>
                            <p class="text"><?php echo $row['Edescription']
                                            ?></p>
                            <a href="procat.php?id=<?php echo  $row['Eid']  ?>" class="cart-btn"><i class="fas fa-book"></i>
                                View</a>
                        </div>

                    </div>


                <?php }
                ?>
            </div>
        </div>

        <!-- <div class="col-lg-4 col-md-6 text-center">
          <div class="single-product-item">
            <div class="product-image">
              <a href="single-product.html"><img src="assets/img/products/product-img-2.jpg" alt="" /></a>
            </div>
            <h3>Berry</h3>
            <p class="product-price"><span>Per Kg</span> 70$</p>
            <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
          </div>
        </div> -->
        <!-- <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0 text-center">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="single-product.html"><img src="assets/img/products/product-img-3.jpg" alt="" /></a>
                        </div>
                        <h3>Lemon</h3>
                        <p class="product-price"><span>Per Kg</span> 35$</p>
                        <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                    </div>
                </div> -->

    </div>
    </div>
    <!-- end product section -->

    <!-- cart banner section -->
    <!-- <section class="cart-banner pt-100 pb-100">
            <div class="container">
                <div class="row clearfix"> -->
    <!--Image Column-->
    <!-- <div class="image-column col-lg-6">
                        <div class="image">
                            <div class="price-box">
                                <div class="inner-price">
                                    <span class="price">
                                        <strong>30%</strong> <br />
                                        off per kg
                                    </span>
                                </div>
                            </div>
                            <img src="assets/img/a.jpg" alt="" />
                        </div>
                    </div> -->
    <!--Content Column-->
    <!-- <div class="content-column col-lg-6">
            <h3><span class="orange-text">Deal</span> of the month</h3>
            <h4>Hikan Strwaberry</h4>
            <div class="text">
                Quisquam minus maiores repudiandae nobis, minima saepe id, fugit
                ullam similique! Beatae, minima quisquam molestias facere ea.
                Perspiciatis unde omnis iste natus error sit voluptatem accusant
            </div> -->
    <!--Countdown Timer-->
    <!-- <div class="time-counter">
                <div class="time-countdown clearfix" data-countdown="2020/2/01">
                    <div class="counter-column">
                        <div class="inner"><span class="count">00</span>Days</div>
                    </div>
                    <div class="counter-column">
                        <div class="inner"><span class="count">00</span>Hours</div>
                    </div>
                    <div class="counter-column">
                        <div class="inner"><span class="count">00</span>Mins</div>
                    </div>
                    <div class="counter-column">
                        <div class="inner"><span class="count">00</span>Secs</div>
                    </div>
                </div>
            </div>
            <a href="cart.html" class="cart-btn mt-3"><i class="fas fa-shopping-cart"></i> Add to
                Cart</a>
        </div>
    </div>
    </div>
    </section> -->
    <!-- end cart banner section -->

    <!-- testimonail-section -->
    <div class="testimonail-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-center">
                    <div class="testimonial-sliders">
                        <?php
                        $sql = "SELECT * FROM `rating` inner join `customer`on rating.cid=customer.cid";
                        $res = mysqli_query($con, $sql);
                        while ($fetch = mysqli_fetch_assoc($res)) {

                        ?>
                            <div class="single-testimonial-slider">
                                <div class="client-avater">
                                    <img src="assets/img/avaters/avatar1.png" alt="" />
                                </div>
                                <div class="client-meta">
                                    <h3><?php echo $fetch['fname']; ?></h3>
                                    <p class="testimonial-body">
                                        <?php echo $fetch['feedback']; ?>
                                    </p>
                                    <div class="last-icon">
                                        <i class="fas fa-quote-right"></i>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end testimonail-section -->

    <!-- advertisement section -->
    <!-- <div class="abt-section mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="abt-bg">
                        <a href="https://www.youtube.com/watch?v=DBLlFWYcIGQ" class="video-play-btn popup-youtube"><i class="fas fa-play"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="abt-text">
                        <p class="top-sub">Since Year 1999</p>
                        <h2>We are <span class="orange-text">SaviRuchi</span></h2>
                        <p>
                            Etiam vulputate ut augue vel sodales. In sollicitudin neque et
                            massa porttitor vestibulum ac vel nisi. Vestibulum placerat eget
                            dolor sit amet posuere. In ut dolor aliquet, aliquet sapien sed,
                            interdum velit. Nam eu molestie lorem.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Sapiente facilis illo repellat veritatis minus, et labore minima
                            mollitia qui ducimus.
                        </p>
                        <a href="about.html" class="boxed-btn mt-4">know more</a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- end advertisement section -->

    <!-- shop banner -->

    <br><br><br>
    <!-- end shop banner -->

    <!-- latest news -->
    <!-- <div class="latest-news pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Our</span> News</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Aliquid, fuga quas itaque eveniet beatae optio.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-news">
                        <a href="single-news.html">
                            <div class="latest-news-bg news-bg-1"></div>
                        </a>
                        <div class="news-text-box">
                            <h3>
                                <a href="single-news.html">You will vainly look for fruit on it in autumn.</a>
                            </h3>
                            <p class="blog-meta">
                                <span class="author"><i class="fas fa-user"></i> Admin</span>
                                <span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
                            </p>
                            <p class="excerpt">
                                Vivamus lacus enim, pulvinar vel nulla sed, scelerisque
                                rhoncus nisi. Praesent vitae mattis nunc, egestas viverra
                                eros.
                            </p>
                            <a href="single-news.html" class="read-more-btn">read more <i
                                    class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-news">
                        <a href="single-news.html">
                            <div class="latest-news-bg news-bg-2"></div>
                        </a>
                        <div class="news-text-box">
                            <h3>
                                <a href="single-news.html">A man's worth has its season, like tomato.</a>
                            </h3>
                            <p class="blog-meta">
                                <span class="author"><i class="fas fa-user"></i> Admin</span>
                                <span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
                            </p>
                            <p class="excerpt">
                                Vivamus lacus enim, pulvinar vel nulla sed, scelerisque
                                rhoncus nisi. Praesent vitae mattis nunc, egestas viverra
                                eros.
                            </p>
                            <a href="single-news.html" class="read-more-btn">read more <i
                                    class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                    <div class="single-latest-news">
                        <a href="single-news.html">
                            <div class="latest-news-bg news-bg-3"></div>
                        </a>
                        <div class="news-text-box">
                            <h3>
                                <a href="single-news.html">Good thoughts bear good fresh juicy fruit.</a>
                            </h3>
                            <p class="blog-meta">
                                <span class="author"><i class="fas fa-user"></i> Admin</span>
                                <span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
                            </p>
                            <p class="excerpt">
                                Vivamus lacus enim, pulvinar vel nulla sed, scelerisque
                                rhoncus nisi. Praesent vitae mattis nunc, egestas viverra
                                eros.
                            </p>
                            <a href="single-news.html" class="read-more-btn">read more <i
                                    class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <a href="news.html" class="boxed-btn">More News</a>
                </div>
            </div>
        </div>
    </div> -->
    <!-- end latest news -->

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
                            <script src="assets/js/main.js"></script>
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
    <script src="assets/js/main.js">
    </script>
</body>

</html>