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
    <title>Update Product</title>

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
                            <h3>Update Product</h3>
                            <p class="text-subtitle text-muted">Update Product name, description and image</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Update Product</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <section id="basic-horizontal-layouts">
                    <div class="row match-height">
                        <div class="col-md-10 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <!-- <h4 class="card-title">Horizontal Form</h4> -->
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-horizontal" method="post" action="operations.php"
                                            enctype="multipart/form-data">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <!-- PHP coding -->

                                                        <?php
                                                        if (isset($_GET['edit']) && $_GET['edit'] > 0) {
                                                            $query = "SELECT * FROM product INNER join product_category on product.Eid=product_category.Eid where mc_id='$_GET[edit]'";
                                                            $result = mysqli_query($con, $query);
                                                            $fetch = mysqli_fetch_assoc($result);
                                                            $fetch_src = FETCH_SRC;
                                                        }
                                                        ?>
                                                        <label>Product Type </label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <select class="form-select" id="basicSelect" name="Eid">
                                                            <option value="<?php echo $fetch['Eid']; ?>">
                                                                <?php echo $fetch['Ename']; ?></option>
                                                            <?php

                                                            $qry = mysqli_query($con, "SELECT * FROM product_category");
                                                            while ($row = mysqli_fetch_array($qry)) { ?>
                                                            <option value="<?php echo $row['Eid']; ?>">
                                                                <?php echo $row['Ename']; ?></option>
                                                            <?php   }
                                                            ?>


                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Product Name</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="first-name" class="form-control"
                                                            name="Mcname" placeholder=""
                                                            value="<?php echo $fetch['mc_name']; ?>">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="exampleFormControlTextarea1"
                                                            class="form-label">Description</label>
                                                    </div>
                                                    <div class="col-md-8 form-group mb-3">

                                                        <textarea class="form-control" id="exampleFormControlTextarea1"
                                                            name="Mcdescription"
                                                            rows="3"><?php echo $fetch['mc_description']; ?></textarea>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Price</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="first-name" class="form-control"
                                                            name="price" placeholder=""
                                                            value="<?php echo $fetch['price']; ?>">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Min-Quantity</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="first-name" class="form-control"
                                                            name="mquantity" placeholder=""
                                                            value="<?php echo $fetch['mquantity']; ?>">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Image</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <img src="<?php echo $fetch_src . $fetch['mc_image']; ?>" alt=""
                                                            style="width:200px;padding: 8px;">
                                                        <input type="file" id="contact-info" class="form-control"
                                                            name="mc_image" placeholder="Mcimage">
                                                    </div>

                                                    <div class="col-12 col-md-8 offset-md-4 form-group">
                                                        <!-- <div class='form-check'>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="checkbox1" class='form-check-input'
                                                            checked>
                                                        <label for="checkbox1">Remember Me</label>
                                                    </div>
                                                </div> -->
                                                        <input type="hidden" name="editpid1" id="editpid1"
                                                            value="<?php echo $_GET['edit']; ?>">
                                                    </div>
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button type="submit" name="update_menucat"
                                                            class="btn btn-primary me-1 mb-1">Update</button>
                                                        <button type="reset"
                                                            class="btn btn-light-secondary me-1 mb-1">Reset</button>
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