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
    <title>Update Category</title>

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
        $id = $_GET['edit'];
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
                            <h3>Update Category</h3>
                            <p class="text-subtitle text-muted">Update Category name, description and image</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Update Category</li>
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
                                <!-- PHP coding -->

                                <?php
                                if (isset($_GET['edit']) && $_GET['edit'] > 0) {
                                    $query = "SELECT * FROM product_category where Eid='$_GET[edit]'";
                                    $result = mysqli_query($con, $query);
                                    $fetch = mysqli_fetch_assoc($result);
                                    $fetch_src = FETCH_SRC;
                                }
                                ?>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-horizontal" method="POST" action="operations.php" enctype="multipart/form-data">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Product Category Name</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="first-name" class="form-control" name="Ename" placeholder="" value="<?php echo $fetch['Ename']; ?>">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                                    </div>
                                                    <div class="col-md-8 form-group mb-3">

                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="Edescription"><?php echo $fetch['Edescription']; ?></textarea>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Image</label>

                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <img src="<?php echo $fetch_src . $fetch['Eimage']; ?>" alt="" style="width:200px;padding: 8px;">
                                                        <input type="file" id="contact-info" class="form-control" name="Eimage" placeholder="Eimage">
                                                    </div>

                                                    <div class="col-12 col-md-8 offset-md-4 form-group">
                                                        <!-- <div class='form-check'>
                                                <div class="checkbox">
                                                    <input type="checkbox" id="checkbox1" class='form-check-input'
                                                        checked>
                                                    <label for="checkbox1">Remember Me</label>
                                                </div>
                                            </div> -->
                                                        <input type="hidden" name="editpid" id="editpid" value="<?php echo $_GET['edit']; ?>">
                                                    </div>
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button type="submit" name="update_event" class="btn btn-primary me-1 mb-1">Update</button>
                                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
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

<!-- PHP coding -->
<?php

if (isset($_POST['update_event'])) {

    $Event_name  = $_POST['Ename'];
    $Event_description = $_POST['Edescription'];
    $Event_image = $_FILES['Eimage']['name'];
    $Event_image_tmp_name = $_FILES['Eimage']['tmp_name'];
    $Event_image_folder = 'uploaded_image/' . $Event_image;



    $update_data = "UPDATE product_categroy SET Ename='$Event_name', Edescription='$Event_description', Eimage='$Event_image'  WHERE Eid = '$id'";
    $upload = mysqli_query($con, $update_data);

    if ($upload) {
        move_uploaded_file($Event_image_tmp_name, $Event_image_folder);
        // header('location:viewEvents.php');
?>
        <script>
            window.location.replace("viewCategory.php");
        </script>
<?php
    } else {
        $message[] = 'please fill out all!';
    }
};
?>