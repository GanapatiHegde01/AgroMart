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
    <title>Manage Orders</title>

    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
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
                        <h3>View Orders</h3>
                        <p class="text-subtitle text-muted">View,Delete and Update Orders </p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Orders </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div id="app">
                <?php
                include 'sidebar.php';
                ?>
                <section class="section">
                    <div class="row" id="table-head">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Orders</h4>
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
                                    <div class="table-responsive">
                                        <table class="table table-lg">
                                            <thead>
                                                <tr>
                                                    <th>Sr.no</th>
                                                    <th>Name</th>
                                                    <th>Product</th>
                                                    <th>Date</th>
                                                    <th>Status</th>

                                                    <th>Action</th>
                                                </tr>

                                            </thead>
                                            <tbody>
                                                <?php
                                                include 'connection.php';
                                                $i = 1;
                                                $sql = "SELECT * FROM `orders` inner join `product` on orders.mc_id=product.mc_id";
                                                $res = mysqli_query($con, $sql);
                                                while ($fetch = mysqli_fetch_assoc($res)) {

                                                ?>

                                                    <tr>
                                                        <td class="text-bold-500"><?php echo $i++ ?></td>
                                                        <td class="text-bold-500"><?php echo $fetch['name']; ?></td>
                                                        <td class="text-bold-500"><?php echo $fetch['mc_name']; ?></td>
                                                        <td class="text-bold-500"><?php echo $fetch['date']; ?></td>
                                                        <td><span><?php echo $fetch['status']; ?></span>
                                                        </td>

                                                        <td class="text-bold-500"><a href="updateReservation.php?id=<?php echo $fetch['rid']; ?>" class="btn icon btn-success"><i class="bi bi-pencil"></i></a>
                                                        </td>


                                                    </tr>
                                                <?php } ?>
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
                                <!-- <p> <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="https://saugi.me"></a></p> -->
                            </div>
                        </div>
                    </footer>
            </div>
        </div>
        <script src="assets/js/bootstrap.js"></script>
        <script src="assets/js/app.js"></script>

</body>

</html>