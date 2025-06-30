<!doctype html>
<?php
include "connection.php";
session_start();
if (!isset($_SESSION['cid'])) {
    header("location:loginform.html");
    exit();
}

if (isset($_POST['booknow'])) {
    $uid = $_SESSION['cid'];
    $cid = $_SESSION['cid'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $eid = $_POST['eid'];
    $pid = $_POST['mc_id'];
    $sql = "SELECT * FROM `product` WHERE product.mc_id=$pid";
    $res = mysqli_query($con, $sql);
    $fetch = mysqli_fetch_assoc($res);
    $quantity = $_POST['quantity'];
    $payamount = $fetch['price'] * $quantity;

    // Store these variables in the session
    $_SESSION['order'] = [
        'name' => $name,
        'address' => $address,
        'contact' => $contact,
        'eid' => $eid,
        'pid' => $pid,
        'quantity' => $quantity,
        'payamount' => $payamount,
        'bdate' => date('Y-m-d')
    ];
}
?>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>M-Sanitize</title>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <style>
    body {
        background: #f5f5f5
    }

    .rounded {
        border-radius: 1rem
    }

    .nav-pills .nav-link {
        color: #555
    }

    .nav-pills .nav-link.active {
        color: white
    }

    input[type="radio"] {
        margin-right: 5px
    }

    .bold {
        font-weight: bold
    }
    </style>
</head>

<body oncontextmenu='return false' class='snippet-body'>
    <div class="container py-5">
        <!-- For demo purpose -->
        <div class="row mb-4">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-6">Make Your Payment</h1>
            </div>
        </div> <!-- End -->
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card ">
                    <div class="card-header">
                        <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                            <!-- Credit card form tabs -->
                            <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                                <li class="nav-item"> <a data-toggle="pill" href="#credit-card"
                                        class="nav-link active "> <i class="fas fa-credit-card mr-2"></i>Credit Card</a>
                                </li>
                                <!-- <li class="nav-item"> <a data-toggle="pill" href="#paypal" class="nav-link"> <i class="fab fa-paypal mr-2"></i>Paypal</a> </li> -->
                                <li class="nav-item"> <a data-toggle="pill" href="#net-banking" class="nav-link"> <i
                                            class="fas fa-mobile-alt mr-2"></i>N-Banking</a> </li>
                                <li class="nav-item"><a data-toggle="pill" href="#cash" class="nav-link"> <i
                                            class="fas fa-money mr-2"></i>COD</a></li>
                            </ul>
                        </div> <!-- End -->
                        <!-- Credit card form content -->
                        <div class="tab-content">
                            <!-- credit card info-->

                            <div id="credit-card" class="tab-pane fade show active pt-3">
                                <form action="" method="POST">
                                    <div class="form-group"> <label for="username">
                                            <h6>Amount</h6>
                                            <!-- <input type="hidden" name="method" value="card"> -->
                                        </label>
                                        <input type="text" name="amount" value="<?php echo $payamount; ?>" required
                                            class="form-control " readonly="">
                                    </div>
                                    <!-- <div class="form-group"> <label for="sid">
                                            <h6>Service id</h6>
                                            <input type="hidden" name="method" value="card">
                                        </label>
                                        <input type="hidden" name="bid" value="<?php echo $id3; ?>">
                                        <input type="text" name="sid" value="<?php echo $id1; ?>" required
                                            class="form-control " readonly="">
                                    </div> -->

                                    <div class="form-group"> <label for="username">
                                            <h6>Transaction Code</h6>
                                            <!-- <input type="hidden" name="method" value="card"> -->
                                        </label>
                                        <input type="text" name="tcode" value="<?php echo (rand(10, 100000)); ?>"
                                            required class="form-control " placeholder="Transaction code" readonly="">
                                    </div>
                                    <div class="form-group"> <label for="username">
                                            <h6>Card Owner</h6>
                                            <input type="hidden" name="method" value="card">
                                        </label> <input type="text" name="username" placeholder="Card Owner Name"
                                            required class="form-control ">
                                    </div>
                                    <div class="form-group"> <label for="cardNumber">
                                            <h6>Card number</h6>
                                        </label>
                                        <div class="input-group"> <input type="text" name="cardNumber"
                                                placeholder="Valid card number" maxlength="12" class="form-control "
                                                required>
                                            <div class="input-group-append"> <span class="input-group-text text-muted">
                                                    <i class="fab fa-cc-visa mx-1"></i> <i
                                                        class="fab fa-cc-mastercard mx-1"></i> <i
                                                        class="fab fa-cc-amex mx-1"></i> </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group"> <label><span class="hidden-xs">
                                                        <h6>Expiration Date</h6>
                                                    </span></label>
                                                <div class="input-group"> <input type="number" placeholder="MM" name=""
                                                        class="form-control" required maxlength="2" max="12" min="1">
                                                    <input type="number" placeholder="YY" maxlength="2" min="23" name=""
                                                        class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-4"> <label data-toggle="tooltip"
                                                    title="Three digit CV code on the back of your card">
                                                    <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                                </label> <input type="text" required class="form-control" maxlength="3">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <input type="submit" class="subscribe btn btn-primary btn-block shadow-sm"
                                            name="paycard" value="Pay">
                                        <input type="hidden" name="name"
                                            value="<?php echo $_SESSION['order']['name']; ?>">
                                        <input type="hidden" name="address"
                                            value="<?php echo $_SESSION['order']['address']; ?>">
                                        <input type="hidden" name="contact"
                                            value="<?php echo $_SESSION['order']['contact']; ?>">
                                        <input type="hidden" name="eid"
                                            value="<?php echo $_SESSION['order']['eid']; ?>">
                                        <input type="hidden" name="pid"
                                            value="<?php echo $_SESSION['order']['pid']; ?>">
                                        <input type="hidden" name="quantity"
                                            value="<?php echo $_SESSION['order']['quantity']; ?>">
                                        <input type="hidden" name="payamount"
                                            value="<?php echo $_SESSION['order']['payamount']; ?>">
                                        <input type="hidden" name="bdate"
                                            value="<?php echo $_SESSION['order']['bdate']; ?>">
                                </form>

                            </div>
                        </div> <!-- End -->
                        <?php
                        if (isset($_POST['paycard'])) {
                            # code...

                            $amount = $_POST['amount'];
                            $uid = $_SESSION['cid'];
                            $tid = $_POST['tcode'];
                            $method = $_POST['method'];
                            $date = date('y-m-d');

                            $name = $_SESSION['order']['name'];
                            $address = $_SESSION['order']['address'];
                            $contact = $_SESSION['order']['contact'];
                            $eid = $_SESSION['order']['eid'];
                            $pid = $_SESSION['order']['pid'];
                            $quantity = $_SESSION['order']['quantity'];
                            $payamount = $_SESSION['order']['payamount'];
                            $bdate = $_SESSION['order']['bdate'];

                            $query = mysqli_query($con, "INSERT INTO orders (name, address, date, cid, contact, status, eid, mc_id, quantity, total) VALUES ('$name', '$address', '$bdate', '$uid', '$contact', 'paid', '$eid', '$pid', '$quantity', '$payamount')");

                            if ($query) {
                                // Get the last inserted order ID (rid)
                                $order_id = mysqli_insert_id($con);

                                // Insert into the payment table with the retrieved order_id (rid)
                                $qry = mysqli_query($con, "INSERT INTO payment (pay_id, cid, t_code, method, date, status, amt, rid) VALUES ('', '$uid', '$tid', '$method', '$date', 'paid', '$amount', '$order_id')");

                                if ($qry) {
                                    echo "<script>alert('Saved successfully');window.location='bookinginfo.php';</script>";
                                } else {
                                    echo "<script>alert('Error in saving payment');</script>";
                                }
                            } else {
                                echo "<script>alert('Error in saving order');</script>";
                            }
                        }
                        ?>
                        <!-- Paypal info -->
                        <!-- <div id="paypal" class="tab-pane fade pt-3">
                            <form action="" method="POST">
                                <h6 class="pb-2">Select your paypal account type</h6>
                                <div class="form-group "> <label class="radio-inline"> <input type="radio" name="optradio" checked> Domestic </label> <label class="radio-inline">
                                        <input type="radio" name="optradio" class="ml-5">International </label></div>
                                <div class="form-group"> <label for="username">
                                        <h6>Amount</h6> -->
                        <!-- <input type="hidden" name="method" value="card"> -->
                        <!-- </label>
                                    <input type="text" name="amount" value="<?php echo $payamount; ?>" required class="form-control " readonly="">
                                    <input type="hidden" name="method" value="paypal">
                                </div>

                                <div class="form-group"> <label for="username">
                                        <h6>Transaction Code</h6> -->
                        <!-- <input type="hidden" name="method" value="card"> -->
                        <!-- </label>
                                    <input type="text" name="tcode" required value="<?php echo (rand(10, 100000)); ?>" class="form-control " placeholder="Transaction code" readonly="">
                                </div>
                                <p> <button type="submit" class="btn btn-primary " type="submit" name="paypal"><i class="fab fa-paypal mr-2"></i> Log into my Paypal</button> </p>
                                <p class="text-muted"> Note: After clicking on the button, you will be directed to a
                                    secure gateway for payment. After completing the payment process, you will be
                                    redirected back to the website to view details of your order. </p>
                            </form> -->
                        <?php
                        // session_start();

                        if (isset($_POST['paypal'])) {
                            # code...

                            $amount = $_POST['amount'];
                            $uid = $_SESSION['cid'];
                            $tid = $_POST['tcode'];
                            $method = $_POST['method'];
                            $date = date('y-m-d');
                            //  $sql = mysqli_query($con, "UPDATE `booking` SET `status`='Paid' WHERE bid=" . $id3);
                            $name = $_SESSION['order']['name'];
                            $address = $_SESSION['order']['address'];
                            $contact = $_SESSION['order']['contact'];
                            $eid = $_SESSION['order']['eid'];
                            $pid = $_SESSION['order']['pid'];
                            $quantity = $_SESSION['order']['quantity'];
                            $payamount = $_SESSION['order']['payamount'];
                            $bdate = $_SESSION['order']['bdate'];

                            // Insert into the orders table first
                            $query = mysqli_query($con, "INSERT INTO orders (name, address, date, cid, contact, status, eid, mc_id, quantity, total) VALUES ('$name', '$address', '$bdate', '$uid', '$contact', 'paid', '$eid', '$pid', '$quantity', '$payamount')");

                            if ($query) {
                                // Get the last inserted order ID (rid)
                                $order_id = mysqli_insert_id($con);

                                // Insert into the payment table with the retrieved order_id (rid)
                                $qry = mysqli_query($con, "INSERT INTO payment (pay_id, cid, t_code, method, date, status, amt, rid) VALUES ('', '$uid', '$tid', '$method', '$date', 'paid', '$amount', '$order_id')");

                                if ($qry) {
                                    echo "<script>alert('Saved successfully');window.location='bookinginfo.php';</script>";
                                } else {
                                    echo "<script>alert('Error in saving payment');</script>";
                                }
                            } else {
                                echo "<script>alert('Error in saving order');</script>";
                            }
                        }
                        ?>
                        <!-- </div> End -->
                        <!-- bank transfer info -->
                        <div id="net-banking" class="tab-pane fade pt-3">
                            <form action="" method="POST">
                                <div class="form-group"> <label for="username">
                                        <h6>Amount</h6>
                                        <!-- <input type="hidden" name="method" value="card"> -->
                                    </label>
                                    <input type="text" name="amount" value="<?php echo $payamount; ?>" required
                                        class="form-control " readonly="">
                                    <input type="hidden" name="method" value="netbank">
                                </div>

                                <div class="form-group"> <label for="username">
                                        <h6>Transaction Code</h6>
                                        <!-- <input type="hidden" name="method" value="card"> -->
                                    </label>
                                    <input type="text" name="tcode" required value="<?php echo (rand(10, 100000)); ?>"
                                        class="form-control" placeholder="Transaction code" readonly="">
                                </div>
                                <div class="form-group "> <label for="Select Your Bank">
                                        <h6>Select your Bank</h6>
                                    </label> <select class="form-control" id="ccmonth">
                                        <option value="" selected disabled>--Please select your Bank--</option>
                                        <option>Karnataka Bank</option>
                                        <option>Syndicate Bank</option>
                                        <option>Canara Bank</option>
                                        <option>State Bank</option>
                                        <option>Vijaya Bank</option>
                                        <option>Bank 6</option>
                                        <option>Bank 7</option>
                                        <option>Bank 8</option>
                                        <option>Bank 9</option>
                                        <option>Bank 10</option>
                                    </select> </div>
                                <div class="form-group">
                                    <p> <button type="submit" class="btn btn-primary " name="netbank"><i
                                                class="fas fa-mobile-alt mr-2"></i>Proceed Payment</button> </p>
                                </div>
                                <p class="text-muted">Note: After clicking on the button, you will be directed to a
                                    secure gateway for payment. After completing the payment process, you will be
                                    redirected back to the website to view details of your order. </p>
                            </form>
                            <?php
                            // session_start();

                            if (isset($_POST['netbank'])) {
                                # code...

                                $amount = $_POST['amount'];
                                $uid = $_SESSION['cid'];
                                $tid = $_POST['tcode'];
                                $method = $_POST['method'];
                                $date = date('y-m-d');
                                //  $sql = mysqli_query($con, "UPDATE `booking` SET `status`='Paid' WHERE bid=" . $id3);
                                $name = $_SESSION['order']['name'];
                                $address = $_SESSION['order']['address'];
                                $contact = $_SESSION['order']['contact'];
                                $eid = $_SESSION['order']['eid'];
                                $pid = $_SESSION['order']['pid'];
                                $quantity = $_SESSION['order']['quantity'];
                                $payamount = $_SESSION['order']['payamount'];
                                $bdate = $_SESSION['order']['bdate'];

                                $query = mysqli_query($con, "INSERT INTO orders (name, address, date, cid, contact, status, eid, mc_id, quantity, total) VALUES ('$name', '$address', '$bdate', '$uid', '$contact', 'paid', '$eid', '$pid', '$quantity', '$payamount')");

                                if ($query) {
                                    // Get the last inserted order ID (rid)
                                    $order_id = mysqli_insert_id($con);

                                    // Insert into the payment table with the retrieved order_id (rid)
                                    $qry = mysqli_query($con, "INSERT INTO payment (pay_id, cid, t_code, method, date, status, amt, rid) VALUES ('', '$uid', '$tid', '$method', '$date', 'paid', '$amount', '$order_id')");

                                    if ($qry) {
                                        echo "<script>alert('Saved successfully');window.location='bookinginfo.php';</script>";
                                    } else {
                                        echo "<script>alert('Error in saving payment');</script>";
                                    }
                                } else {
                                    echo "<script>alert('Error in saving order');</script>";
                                }
                            }
                            ?>
                        </div> <!-- End -->
                        <div id="cash" class="tab-pane fade pt-3">
                            <form action="" method="POST">
                                <div class="form-group"> <label for="username">
                                        <h6>Amount</h6>
                                        <!-- <input type="hidden" name="method" value="card"> -->
                                    </label>
                                    <input type="text" name="amount" value="<?php echo $payamount; ?>" required
                                        class="form-control " readonly="">
                                    <input type="hidden" name="method" value="cod">
                                </div>

                                <div class="form-group"> <label for="username">
                                        <h6>Transaction Code</h6>
                                        <!-- <input type="hidden" name="method" value="card"> -->
                                    </label>
                                    <input type="text" name="tcode" required value="<?php echo (rand(10, 100000)); ?>"
                                        class="form-control " placeholder="Transaction code" readonly="">
                                </div>

                                <div class="form-group">
                                    <p> <button type="submit" class="btn btn-primary " name="cash"><i
                                                class="fas fa-mobile-alt mr-2"></i>Confirm</button> </p>
                                </div>
                                <p class="text-muted">Note: After clicking on the button, you will be directed to a
                                    secure gateway for payment. After completing the payment process, you will be
                                    redirected back to the website to view details of your order. </p>
                            </form>
                            <?php
                            // session_start();

                            if (isset($_POST['cash'])) {
                                # code...

                                $amount = $_POST['amount'];
                                $uid = $_SESSION['cid'];
                                $tid = $_POST['tcode'];
                                $method = $_POST['method'];
                                $date = date('y-m-d');
                                // $sql = mysqli_query($con, "UPDATE `booking` SET `status`='Paid' WHERE bid=" . $id3);
                                $name = $_SESSION['order']['name'];
                                $address = $_SESSION['order']['address'];
                                $contact = $_SESSION['order']['contact'];
                                $eid = $_SESSION['order']['eid'];
                                $pid = $_SESSION['order']['pid'];
                                $quantity = $_SESSION['order']['quantity'];
                                $payamount = $_SESSION['order']['payamount'];
                                $bdate = $_SESSION['order']['bdate'];
                                $query = mysqli_query($con, "INSERT INTO orders (name, address, date, cid, contact, status, eid, mc_id, quantity, total) VALUES ('$name', '$address', '$bdate', '$uid', '$contact', 'COD', '$eid', '$pid', '$quantity', '$payamount')");

                                if ($query) {
                                    // Get the last inserted order ID (rid)
                                    $order_id = mysqli_insert_id($con);

                                    // Insert into the payment table with the retrieved order_id (rid)
                                    $qry = mysqli_query($con, "INSERT INTO payment (pay_id, cid, t_code, method, date, status, amt, rid) VALUES ('', '$uid', '$tid', '$method', '$date', 'COD', '$amount', '$order_id')");

                                    if ($qry) {
                                        echo "<script>alert('Saved successfully');window.location='bookinginfo.php';</script>";
                                    } else {
                                        echo "<script>alert('Error in saving payment');</script>";
                                    }
                                } else {
                                    echo "<script>alert('Error in saving order');</script>";
                                }
                            }
                            ?>


                            <!-- End -->
                        </div>
                    </div>
                </div>
            </div>
            <script type='text/javascript'
                src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
            <script type='text/javascript'>
            $(function() {
                $('[data-toggle="tooltip"]').tooltip()
            })
            </script>
</body>

</html>