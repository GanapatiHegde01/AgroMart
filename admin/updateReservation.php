<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Orders</title>

    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png">

</head>

<body>
    <div id="app">
        <?php
        include 'sidebar.php';
        include 'connection.php';
        ?>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Update Orders</h3>
                            <p class="text-subtitle text-muted">Accept or Reject Orders</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Update Orders</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <section id="basic-horizontal-layouts">
                    <div class="row match-height">
                        <div class="col-md-15 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <!-- <h4 class="card-title">Horizontal Form</h4> -->
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-horizontal" action="confirmbooking.php" method="POST"
                                            enctype="multipart/form-data">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <?php
                                                        $rid = $_GET['id'];
                                                        $sql = "SELECT * FROM `orders` inner join `product` on orders.mc_id=product.mc_id inner join `product_category` on product.Eid=product_category.Eid where rid=$rid";
                                                        $res = mysqli_query($con, $sql);
                                                        $fetch = mysqli_fetch_assoc($res);

                                                        ?>
                                                        <label>Customer Name:</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <fieldset class="form-group">
                                                            <input type="text" name="" id=""
                                                                value="<?php echo $fetch['name']; ?>"
                                                                class="form-control" disabled>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Mobile No:</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <fieldset class="form-group">
                                                            <input type="text" name="" id=""
                                                                value="<?php echo $fetch['contact']; ?>"
                                                                class="form-control" disabled>
                                                        </fieldset>
                                                    </div>
                                                    <div class=" col-md-2">
                                                        <label>Address:</label>
                                                    </div>

                                                    <div class="col-md-7 form-group">
                                                        <textarea class="form-control" id="exampleFormControlTextarea1"
                                                            name="Mcdescription" rows="3"
                                                            disabled><?php echo $fetch['address']; ?></textarea>
                                                        <input type="hidden" name="rid"
                                                            value="<?php echo $fetch['rid']; ?>">
                                                    </div>

                                                    <div class="col-md-2"></div>



                                                    <div class="col-md-2">
                                                        <label>Date:</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <fieldset class="form-group">
                                                            <input type="text" name="" id=""
                                                                value="<?php echo $fetch['date']; ?>"
                                                                class="form-control" disabled>
                                                        </fieldset>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>Product Type:</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <fieldset class="form-group">
                                                            <input type="text" name="" id=""
                                                                value="<?php echo $fetch['Ename']; ?>"
                                                                class="form-control" disabled>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Product Name:</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <fieldset class="form-group">
                                                            <input type="text" name="" id=""
                                                                value="<?php echo $fetch['mc_name']; ?>"
                                                                class="form-control" disabled>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Quantity:</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <fieldset class="form-group">
                                                            <input type="text" name="" id=""
                                                                value="<?php echo $fetch['quantity']; ?>"
                                                                class="form-control" disabled>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Price:</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <fieldset class="form-group">
                                                            <input type="text" name="" id=""
                                                                value="<?php echo $fetch['price']; ?>"
                                                                class="form-control" disabled>
                                                        </fieldset>
                                                    </div>
                                                    <?php
                                                    $sql = "SELECT * FROM `payment` where rid=$rid";
                                                    $res = mysqli_query($con, $sql);
                                                    $data = mysqli_fetch_assoc($res);

                                                    ?>
                                                    <div class="col-md-2">
                                                        <label>Payment Status:</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <fieldset class="form-group">
                                                            <input type="text" name="" id=""
                                                                value="<?php echo $fetch['status']; ?>"
                                                                class="form-control" disabled>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Order Status:</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <fieldset class="form-group">
                                                            <select class="form-select" id="basicSelect" name="status">
                                                                <option value="Booked"><?php echo $fetch['status']; ?>
                                                                </option>
                                                                <option value="Accepted">Accepted</option>
                                                                <option value="Shipped">Shipped</option>
                                                                <option value="Delivered">Delivered</option>

                                                                <option value="Cancelled">Cancel</option>
                                                            </select>
                                                            <!-- <option value=""></option></select> -->
                                                        </fieldset>
                                                    </div>

                                                    <!--  <div class="col-md-4">
                                                        <label> Price</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="first-name" class="form-control"
                                                            name="price" placeholder=" " Price>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="exampleFormControlTextarea1"
                                                            class="form-label">Description</label>
                                                    </div>
                                                    <div class="col-md-8 form-group mb-3">

                                                        <textarea class="form-control" id="exampleFormControlTextarea1"
                                                            name="Mdescription" rows="3"> </textarea>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Image</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <img src="" alt="" style="width:200px;padding: 8px;">

                                                        <input type="file" id="contact-info" class="form-control"
                                                            name="Mimage" placeholder="Mimage">
                                                    </div> -->


                                                    <!-- <div class='form-check'>
                                                <div class="checkbox">
                                                    <input type="checkbox" id="checkbox1" class='form-check-input'
                                                        checked>
                                                    <label for="checkbox1">Remember Me</label>
                                                </div>
                                            </div> -->


                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <input type="submit" name="submit" class="btn btn-primary"
                                                            value="Update">

                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <footer>
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <!-- <p>2021 &copy; Mazer</p> -->
                        </div>
                        <div class="float-end">
                            <!-- <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="https://saugi.me">Saugi</a></p> -->
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="assets/js/bootstrap.js"></script>
        <script src="assets/js/app.js"></script>

</body>

</html>