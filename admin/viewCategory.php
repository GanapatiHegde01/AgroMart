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
    <title>Manage Category</title>

    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>

</head>

<body>
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
                        <h3>Category List</h3>
                        <p class="text-subtitle text-muted">View,Delete and Upadate Category</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Product Category</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div id="app">
                <?php
                include 'sidebar.php';
                include 'connection.php';
                ?>
                <?php
                if (isset($_GET['success'])) {
                    if ($_GET['success'] == 'added') {
                        echo <<<alert
                        <div class="container alert alert-success alert-dismissible text-center" role="alert">
                            <strong>New Category Added</strong> 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    alert;
                    }
                    if ($_GET['success'] == 'removed') {
                        echo <<<alert
                        <div class="container alert alert-success alert-dismissible text-center" role="alert">
                            <strong>Category Removed</strong> 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    alert;
                    }
                }
                ?>
                <section class="section">
                    <div class="row" id="table-head">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Manage Product Categories</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <!-- <p>Similar to tables and dark tables, use the modifier classes <code
                                    class="highlighter-rouge">.thead-light</code> or <code
                                    class="highlighter-rouge">.thead-dark</code> to
                                make <code class="highlighter-rouge">&lt;thead&gt;</code>s appear light or dark gray.
                            </p> -->
                                    </div>
                                    <!-- Table with outer spacing -->
                                    <!-- PHP Code -->

                                    <div class="table-responsive">
                                        <table class="table table-lg">
                                            <thead>
                                                <tr>
                                                    <th width="10%">Sr. No</th>
                                                    <th width="15%">Image</th>
                                                    <th width="15%">Product Name</th>
                                                    <th width="45%">Description</th>
                                                    <th width="15%">Action</th>
                                                </tr>
                                            </thead>
                                            <!-- PHP Code -->
                                            <?php
                                            $query = "SELECT * FROM `product_category`";
                                            $result = mysqli_query($con, $query);
                                            $i = 1;
                                            $fetch_src = FETCH_SRC;
                                            while ($fetch = mysqli_fetch_assoc($result)) {
                                                echo <<<event
                                            <tbody>
                                                <tr>        
                                                <td>$i</td>         
                                                    <td class="text-bold-500"><img src="$fetch_src$fetch[Eimage]"
                                            height="100"> </td>
                                            <td class="text-bold-500"> $fetch[Ename]</td>
                                            <td> $fetch[Edescription]</td>
                                            <td class="text-bold-500"><a
                                                    href="updateCategory.php?edit=$fetch[Eid]"
                                                    class="btn icon btn-primary"><i
                                                        class="bi bi-pencil"></i></a>&nbsp; <button onclick="confirm_rem($fetch[Eid])" class="btn btn-danger"><i class="bi bi-trash"></i></button></td>
                                            </tr>
                                            event;
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
                    <footer>
                        <div class="footer clearfix mb-0 text-muted">
                            <div class="float-start">
                                <!-- <p>2021 &copy; Mazer</p> -->
                            </div>
                            <div class="float-end">
                                <!-- <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="https://saugi.me">Saugi</a></p> -->
                            </div>
                        </div>
                    </footer>
            </div>
        </div>
        <script src="assets/js/bootstrap.js"></script>
        <script src="assets/js/app.js"></script>
        <script>
        function confirm_rem(id) {
            if (confirm("Are you sure, you want to delete this item?")) {
                window.location.href = "operations.php?rem=" + id;
            }
        }
        </script>

</body>

</html>