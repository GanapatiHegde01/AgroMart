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
    <meta name="description"
        content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>Orders</title>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
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
                        <?php
                        include 'sidebar.php';
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
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>See more Details</p>
                        <h1>Order Details</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs- keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body ">
                    <div class="text-right"> <i class="fa fa-close close" data-dismiss="modal"></i> </div>

                    <div class="px-2 py-3">
                        <h6><u>CUSTOMER DETAILS:</u></h6>
                        <div class="pdetails" style="margin-left:30px;">
                            <span><b>NAME:</b></span>
                            <p class="text-uppercase" style="display: inline;font-weight:bold;" id="cname"></p><br>

                            <span><b>Mob Number:</b></span>
                            <p style="display: inline;font-weight:bold;" id="contact"></p><br>
                        </div>
                        <br>
                        <h6><u>ORDER DETAILS:</u></h6>
                        <div class="pdetails" style="margin-left:30px;">
                            <span><b>PRODUCT CATEGORY:</b></span>
                            <p class="text-uppercase" style="display: inline;font-weight:bold;" id="event"></p><br>
                            <span><b>PRODUCT NAME:</b></span>
                            <p class="text-uppercase" style="display: inline;font-weight:bold;" id="mname"></p><br>
                            <span><b>ADDRESS:</b></span>
                            <p style="display: inline;font-weight:bold;" id="addr"></p>
                            <br>
                            <span><b>ORDER DATE:</b></span>
                            <p style="display: inline;font-weight:bold;" id="date"></p>
                            <br>

                            <span><b>QUANTITY:</b></span>
                            <p style="display: inline;font-weight:bold;" id="quantity"></p>
                            <br>
                            <span><b>TOTAL PRICE:</b></span>
                            <p style="display: inline;font-weight:bold;" id="price"></p>
                            <br>
                            <span><b>PAYMENT STATUS:</b></span>
                            <span class="badge badge-success" id="pstatus"></span>
                            <?php
                            if (isset($_GET['edit']) && is_numeric($_GET['edit'])) {
                                $sql = "SELECT * FROM `orders` where `rid`=" . $_GET['edit'];
                                $res = mysqli_query($con, $sql);
                                $data1 = mysqli_fetch_assoc($res);
                            }
                            ?>
                            <!-- <a href="payment.php?id1=<?php echo $data1['m_id']; ?>&id2=<?php //echo $data1['date']; 
                                                                                            ?>&id3=<?php //echo $data1['time']; 
                                                                                                    ?>"
                                id="pay" style="background-color:green;border-radius:4px;color:aliceblue;"></a>
                            <br> -->
                            <span><b>ORDER STATUS:</b></span>
                            <span class="badge badge-success" id="bstatus"></span>
                            <br>

                        </div>
                        <!-- <span class="theme-color">Payment Summary</span>
                        <div class="mb-3">
                            <hr class="new1">
                        </div>

                        <div class="d-flex justify-content-between">
                            <span class="font-weight-bold">Ether Chair(Qty:1)</span>
                            <span class="text-muted">$1750.00</span>
                        </div>

                        <div class="d-flex justify-content-between">
                            <small>Shipping</small>
                            <small>$175.00</small>
                        </div>


                        <div class="d-flex justify-content-between">
                            <small>Tax</small>
                            <small>$200.00</small>
                        </div>

                        <div class="d-flex justify-content-between mt-3">
                            <span class="font-weight-bold">Total</span>
                            <span class="font-weight-bold theme-color">$2125.00</span>
                        </div>


 -->
                        <div class="text-center mt-5">



                            <h4 class="mt-5 theme-color mb-5">Thanks for your order</h4>



                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->
    <div class="container mt-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                <div class="rounded">
                    <div class="table-responsive table-borderless">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        <div class="toggle-btn">
                                            <div class="inner-circle"></div>
                                        </div>
                                    </th>
                                    <th>Sr. NO</th>
                                    <th>Customer name</th>
                                    <th>Product Name</th>
                                    <th>Order Date</th>

                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody class="table-body">
                                <?php
                                $sql = "SELECT * FROM `orders` inner join `product` on product.mc_id=orders.mc_id where cid=$user_id";
                                $res = mysqli_query($con, $sql);
                                $i = 1;
                                while ($fetch = mysqli_fetch_assoc($res)) {
                                    echo <<<reserve
                                        <tr class="cell-1">
                                            <td class="text-center">
                                                <div class="toggle-btn">
                                                    <div class="inner-circle"></div>
                                                </div>
                                            </td>
                                            <td> $i</td>
                                            <td> $fetch[name]</td>
                                <td> $fetch[mc_name] </td>
                                <td>$fetch[date] </td>
                                                               <td><span class="badge badge-success">$fetch[status]</span></td>
                                <td><a href="?edit=$fetch[rid]" class="btn btn-primary btn-sm" 
                                      >View Details
                                    </a></td>
                                </tr>
                                <?php
                            reserve;
                                    $i++;
                                }
                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="background-color: while; height:200px;">

    </div>
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
    <?php
    if (isset($_GET['edit']) && is_numeric($_GET['edit'])) {
        // Validate and sanitize the input
        $editValue = intval($_GET['edit']);
        // Create a prepared statement
        $query = "SELECT * FROM `orders`   inner join`product` on orders.mc_id=product.mc_id inner join `product_category` on product.Eid=product_category.Eid WHERE `rid`=?";
        $stmt = mysqli_prepare($con, $query);
        // Bind the parameter
        mysqli_stmt_bind_param($stmt, "i", $editValue);
        // Execute the query
        mysqli_stmt_execute($stmt);
        // Get the result
        $result = mysqli_stmt_get_result($stmt);
        // Fetch the data
        $fetch = mysqli_fetch_assoc($result);
        // Close the statement
        mysqli_stmt_close($stmt);
        $sql = "SELECT * FROM `payment` where rid=" . $_GET['edit'];
        $res = mysqli_query($con, $sql);
        $data = mysqli_fetch_assoc($res);
        // Rest of the code remains the same
        echo "
    <script>
    var staticBackdrop = new bootstrap.Modal(document.getElementById('staticBackdrop'), {
    keyboard:false
    });
     document.querySelector('#cname').innerText = `{$fetch['name']}`;
     document.querySelector('#addr').innerText = `{$fetch['address']}`;
     document.querySelector('#contact').innerText = `{$fetch['contact']}`;
     document.querySelector('#event').innerText = `{$fetch['Ename']}`;
     document.querySelector('#mname').innerText = `{$fetch['mc_name']}`;
     document.querySelector('#date').innerText = `{$fetch['date']}`;
     
     document.querySelector('#quantity').innerText = `{$fetch['quantity']}`;
     document.querySelector('#price').innerText = `{$fetch['price']}`*`{$fetch['quantity']}`;
     
     if('$data[status]'=='paid' || '$fetch[status]'=='Cancelled'){
        document.querySelector('#pstatus').innerText = `{$data['status']}`;
     }
        else if('$data[status]'=='COD'){
          document.querySelector('#pstatus').innerText = 'COD';
        }
     else{
        document.querySelector('#pay').innerText = 'Pay Now';
     }
     document.querySelector('#bstatus').innerText = `{$fetch['status']}`;
  
 
    staticBackdrop.show();
    </script>";
    } ?>

</body>

</html>