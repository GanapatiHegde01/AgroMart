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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>Menu</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!-- animate css -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- mean menu css -->
    <link rel="stylesheet" href="assets/css/meanmenu.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- responsive -->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <style>
        .product-details {
            display: flex;
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 200px;
            flex-wrap: wrap;
        }

        .product-image img {
            width: 100%;
            max-width: 300px;
            height: auto;
            object-fit: cover;
        }

        .product-info {
            margin-left: 20px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .product-info h1 {
            margin: 0;
            font-size: 2em;
        }

        .product-info .description {
            margin: 20px 0;
            font-size: 1.2em;
        }

        .product-info .price {
            font-size: 1.5em;
            color: #e74c3c;
        }

        .product-info .quantity {
            margin: 20px 0;
        }

        .product-info .quantity label {
            font-size: 1.2em;
            margin-right: 10px;
        }

        .product-info .quantity input {
            width: 60px;
            padding: 5px;
            font-size: 1em;
        }

        .product-info .buy-now {
            padding: 10px 10px;
            font-size: 1.2em;
            color: #fff;
            background-color: #3498db;
            border: none;
            cursor: pointer;
        }

        .product-info .buy-now:hover {
            background-color: #2980b9;
        }

        @media (max-width: 768px) {
            .product-details {
                flex-direction: column;
                align-items: center;
            }

            .product-info {
                margin-left: 0;
                margin-top: 20px;
                width: 100%;
                align-items: center;
            }

            .product-info h1 {
                font-size: 1.8em;
            }

            .product-info .description {
                font-size: 1em;
                text-align: center;
            }

            .product-info .price {
                font-size: 1.3em;
            }

            .product-info .quantity {
                width: 100%;
                text-align: center;
            }

            .product-info .quantity label,
            .product-info .quantity input {
                font-size: 1em;
            }

            .product-info .buy-now {
                font-size: 1em;
            }
        }

        @media (max-width: 480px) {
            .product-info h1 {
                font-size: 1.5em;
            }

            .product-info .description {
                font-size: 0.9em;
            }

            .product-info .price {
                font-size: 1.2em;
            }

            .product-info .quantity label,
            .product-info .quantity input {
                font-size: 0.9em;
            }

            .product-info .buy-now {
                font-size: 0.9em;
                padding: 8px 8px;
            }
        }
    </style>

</head>

<body>

    <!--PreLoader-->
    <!-- <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div> -->
    <!--PreLoader Ends-->

    <!-- header -->
    <div class="top-header-area" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="index.html">
                                <img src="assets/img/logo.png" alt="">
                            </a>
                        </div>
                        <!-- logo -->

                        <!-- menu start -->
                        <?php include 'sidebar.php';

                        ?>
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
                            <input type="text" placeholder="Keywords">
                            <button type="submit">Search <i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end search arewa -->

    <!-- breadcrumb-section -->
    <!-- <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>See more Details</p>
                        <h1>Menu</h1>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- end breadcrumb section -->

    <!-- single product -->
    <?php
    // $id = $_GET['id'];
    // $qry = "SELECT * FROM `menu` where mc_id=$id";
    // $res = mysqli_query($con, $qry);
    // while ($row = mysqli_fetch_assoc($res)) {
    //     $imgpath = FETCH_SRC;

    ?>
    <?php
    $mcid = $_GET['id'];
    $qry = "SELECT * FROM `product` where `mc_id`=$mcid";
    $res = mysqli_query($con, $qry);
    while ($fetch = mysqli_fetch_assoc($res)) {
        $img_path = FETCH_SRC;
    ?>

        <section class="product-details">
            <div class="product-image">
                <img src=<?php echo  $img_path . $fetch['mc_image']  ?> alt="Product Image">
            </div>

            <div class="product-info">

                <p><b>Name: <?php echo   $fetch['mc_name']  ?> </b></p>

                <p class="description"><b>Description:</b><?php echo  $fetch['mc_description']
                                                            ?></p>
                <p class="price"><b>Price: </b>₹<?php echo  $fetch['price']
                                                ?></p>
                <div class="quantity">
                    <label for="quantity">Min-Quantity:</label>
                    <input type="number" id="quantity" name="mquantity" min="<?php echo   $fetch['mquantity']  ?>" value="<?php echo   $fetch['mquantity']  ?>" readonly>
                </div>

                <form action="reservations.php" method="POST">
                    <div class="quantity">
                        <label for="quantity">Quantity:</label>
                        <input type="number" id="quantity" name="quantity" min="<?php echo   $fetch['mquantity']  ?>" value="<?php echo   $fetch['mquantity']  ?>">
                    </div>
                    <input type="hidden" name="menucat_id" value="<?php echo $fetch['mc_id']; ?>">
                    <input type="hidden" name="event_id" value="<?php echo $fetch['Eid']; ?>">
                    <input type="hidden" name="product_name" value="<?php echo $fetch['mc_name']; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $fetch['price']; ?>">
                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                    <div class="product-info">
                        <input type="submit" name="book" value="Buy Now" class="cart-btn text-white">

                </form>
            </div>
        </section>

    <?php } ?>

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