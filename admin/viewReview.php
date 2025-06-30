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
    <title>View Feedbacks</title>

    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

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
                        <h3>Feebacks</h3>
                        <p class="text-subtitle text-muted">View Feedbacks</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Reviews</li>
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

                <section class="section">
                    <div class="row" id="table-head">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Feedbacks</h4>
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
                                                    <th>Sr. No</th>
                                                    <th>Name</th>
                                                    <th>Rating</th>
                                                    <th>Review</th>

                                                </tr>
                                            </thead>
                                            <!-- PHP Code -->
                                            <?php
                                            $query = "SELECT * FROM `rating` inner join `customer` on rating.cid=customer.cid";
                                            $result = mysqli_query($con, $query);
                                            $i = 1;

                                            while ($fetch = mysqli_fetch_assoc($result)) {
                                                echo <<<event
                                            <tbody>
                                                <tr>        
                                                <td>$i</td>         
                                                    <td class="text-bold-500">$fetch[fname] $fetch[lname]</td>
                                            <td class="text-bold-500"> $fetch[rating]</td>
                                        
                                            <td class="text-bold-500">$fetch[feedback]</td>
                                            
                                           
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


</body>

</html>