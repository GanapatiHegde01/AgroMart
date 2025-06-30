<?php
session_start();
$user_id = $_SESSION['cid'];
if (!isset($_SESSION['cid'])) {
    # code...

    header("location:Login/loginform.html");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template">

    <!-- title -->
    <title>Reviews and Ratings</title>

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
    <link rel="stylesheet" href="css1/demo.css">
    <link rel="stylesheet" href="css1/style.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>


<body>

    <body>
        <!--PreLoader-->
        <!-- <div class="loader">
            <div class="loader-inner">
                <div class="circle"></div>
            </div>
        </div>  -->
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
                                    <img src="assets/img/logo.png" alt="" />
                                </a>
                            </div>
                            <!-- logo -->
                            <?php
                            include 'sidebar.php';
                            ?>
                            <!-- menu start -->

                            <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                            <div class="mobile-menu"></div>
                            <!-- menu end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end header -->

        <!-- end search arewa -->

        <!-- breadcrumb-section -->
        <div class="breadcrumb-section breadcrumb-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="breadcrumb-text">

                            <h2 style="color:white;">Feedbacks</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ScriptTop">
            <div class="rt-container">
                <div class="col-rt-4" id="float-right">
                    <!-- Ad Here -->
                </div>
            </div>
        </div>


        <section class="vh-100" style="background-color: white;">
            <div class="container py-5 h-100">
                <div class="rt-container">
                    <div class="col-rt-12">
                        <div class="Scriptcontent">
                            <div class="feedback">
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <label>1. Your overall experience with us ?</label><br />

                                    <span class="star-rating">
                                        <input type="radio" name="rating" value="1" /><i></i>1
                                        <input type="radio" name="rating" value="2" /><i></i>
                                        <input type="radio" name="rating" value="3" /><i></i>
                                        <input type="radio" name="rating" value="4" /><i></i>
                                        <input type="radio" name="rating" value="5" /><i></i>
                                    </span>



                                    <div class="clear"></div>
                                    <hr class="survey-hr" />
                                    <label for="m_3189847521540640526commentText">4. Any Other
                                        suggestions:</label><br /><br />
                                    <textarea cols="75" name="message" rows="5"></textarea>
                                    <input type="hidden" name="id" value="<?php echo $_SESSION['cid']; ?>"><br />
                                    <br />
                                    <div class="clear"></div>
                                    <input style="
                    background: #43a7d5;
                    color: #fff;
                    padding: 12px;
                    border: 0;
                  " type="submit" name="save" value="Submit your feedback" />&nbsp;
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="bg-white">
            <h2 class="text-center"><u>Feebacks</u></h2>
            <br>
            <div class="d-flex justify-content-center row">
                <div class="col-md-10">
                    <table class="table table-hover table-bordered text-align-center">
                        <tr>
                            <th>Sr.NO</th>
                            <th>Name</th>
                            <th>Rating</th>
                            <th>Feedback</th>
                        </tr>
                        <?php
                        $sql = "SELECT * FROM `rating` inner join customer on  rating.cid=customer.cid";
                        $res = mysqli_query($con, $sql);
                        $i = 1;
                        while ($fetch = mysqli_fetch_assoc($res)) {
                            echo <<<rate
              <tr>
                <td class="text-center"> $i </td>
                <td class="text-center">$fetch[fname]</td>
                <td class="text-center">$fetch[rating]</td>
                <td class="text-center">$fetch[feedback]</td>
              </tr>
            
            rate;
                            $i++;
                        }
                        ?>
                    </table>

                </div>
            </div>
        </div>
        <div class="bg-white"> <br> <br></div>

        <?php


        if (isset($_POST['save'])) {
            # code...
            $cid = $_SESSION['cid'];

            $rating = $_POST['rating'];
            $message = mysqli_real_escape_string($con, $_POST['message']);

            $review = $_POST['rating1'];
            $qry = "INSERT INTO `rating`(`rateid`,`cid`, `rating`,  `feedback`) VALUES ('','" . $cid . "','" . $rating . "','" . $message . "')";
            if (mysqli_query($con, $qry)) {

                echo "<script>alert('Saved successfully');window.location='index.php';</script>";
            } else {
                "<script>alert('Error');window.location='index.php';</script>";
            }
        }
        ?>
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