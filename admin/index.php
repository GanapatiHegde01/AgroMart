<?php
session_start();
if (!isset($_SESSION['uid'])) {
  header('location:login.php');
  // echo"<script>alert('success')</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin-Dashboard</title>

  <link rel="stylesheet" href="assets/css/main/app.css" />
  <link rel="stylesheet" href="assets/css/main/app-dark.css" />
  <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon" />
  <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png" />

  <link rel="stylesheet" href="assets/css/shared/iconly.css" />
</head>

<body>
  <div id="app">
    <?php
    include 'sidebar.php';
    ?>
    <div id="main">

      <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
          <i class="bi bi-justify fs-3"></i>
        </a>
      </header>

      <div class="page-heading">
        <h3>Profile Statistics</h3>
      </div>

      <div class="page-content">
        <section class="row">
          <div class="col-12 col-lg-9">
            <div class="row">
              <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                  <div class="card-body px-4 py-4-5">
                    <div class="row">
                      <?php
                      include 'connection.php';
                      $query = "SELECT COUNT(*) from orders";

                      $result = mysqli_query($con, $query);
                      $i      = 1;
                      if (mysqli_affected_rows($con) != 0) {
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                      ?>
                          <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon purple mb-2">
                              <i class="iconly-boldShow"></i>
                            </div>
                          </div>
                          <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">
                              Total Orders
                            </h6>
                            <h6 class="font-extrabold mb-0"><?php echo $row['COUNT(*)']; ?></h6>
                          </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php
                        }
                      }

                      $query = "SELECT COUNT(*) from customer";

                      $result = mysqli_query($con, $query);
                      $i      = 1;
                      if (mysqli_affected_rows($con) != 0) {
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            ?>
              <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                  <div class="card-body px-4 py-4-5">
                    <div class="row">
                      <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                        <div class="stats-icon blue mb-2">
                          <i class="iconly-boldProfile"></i>
                        </div>
                      </div>
                      <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">
                          Happy customers
                        </h6>
                        <h6 class="font-extrabold mb-0"><?php echo $row['COUNT(*)']; ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          <?php
                        }
                      }
                      $i = 1;
          ?>
          <?php

          $query = "SELECT COUNT(*) from rating";

          $result = mysqli_query($con, $query);
          $i      = 1;
          if (mysqli_affected_rows($con) != 0) {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          ?>
              <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                  <div class="card-body px-4 py-4-5">
                    <div class="row">
                      <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                        <div class="stats-icon green mb-2">
                          <i class="iconly-boldAdd-User"></i>
                        </div>
                      </div>
                      <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Reviews</h6>
                        <h6 class="font-extrabold mb-0"><?php echo $row['COUNT(*)']; ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          <?php
            }
          }
          $i = 1;
          ?>

          <!-----------------END OF NUMBER OF BOOKINGS---------->
          <?php

          $query = "SELECT COUNT(*) from product";

          $result = mysqli_query($con, $query);
          $i      = 1;
          if (mysqli_affected_rows($con) != 0) {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          ?>
              <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                  <div class="card-body px-4 py-4-5">
                    <div class="row">
                      <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                        <div class="stats-icon red mb-2">
                          <i class="iconly-boldBookmark"></i>
                        </div>
                      </div>
                      <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Total Products</h6>
                        <h6 class="font-extrabold mb-0"><?php echo $row['COUNT(*)']; ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      <?php
            }
          }
          $i = 1;
      ?>


      <!-- <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>Profile Visit</h4>
                    </div>
                    <div class="card-body">
                      <div id="chart-profile-visit"></div>
                    </div>
                  </div>
                </div> -->

      <!-- <div class="col-12 col-xl-4">
                  <div class="card">
                    <div class="card-header">
                      <h4>Profile Visit</h4>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-6">
                          <div class="d-flex align-items-center">
                            <svg
                              class="bi text-primary"
                              width="32"
                              height="32"
                              fill="blue"
                              style="width: 10px"
                            >
                              <use
                                xlink:href="assets/images/bootstrap-icons.svg#circle-fill"
                              />
                            </svg>
                            <h5 class="mb-0 ms-3">Europe</h5>
                          </div>
                        </div>
                        <div class="col-6">
                          <h5 class="mb-0">862</h5>
                        </div>
                        <div class="col-12">
                          <div id="chart-europe"></div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-6">
                          <div class="d-flex align-items-center">
                            <svg
                              class="bi text-success"
                              width="32"
                              height="32"
                              fill="blue"
                              style="width: 10px"
                            >
                              <use
                                xlink:href="assets/images/bootstrap-icons.svg#circle-fill"
                              />
                            </svg>
                            <h5 class="mb-0 ms-3">America</h5>
                          </div>
                        </div>
                        <div class="col-6">
                          <h5 class="mb-0">375</h5>
                        </div>
                        <div class="col-12">
                          <div id="chart-america"></div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-6">
                          <div class="d-flex align-items-center">
                            <svg
                              class="bi text-danger"
                              width="32"
                              height="32"
                              fill="blue"
                              style="width: 10px"
                            >
                              <use
                                xlink:href="assets/images/bootstrap-icons.svg#circle-fill"
                              />
                            </svg>
                            <h5 class="mb-0 ms-3">Indonesia</h5>
                          </div>
                        </div>
                        <div class="col-6">
                          <h5 class="mb-0">1025</h5>
                        </div>
                        <div class="col-12">
                          <div id="chart-indonesia"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> -->
      <!-- <div class="col-12 col-xl-8">
                  <div class="card">
                    <div class="card-header">
                      <h4>Latest Comments</h4>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-hover table-lg">
                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>Comment</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="col-3">
                                <div class="d-flex align-items-center">
                                  <div class="avatar avatar-md">
                                    <img src="assets/images/faces/5.jpg" />
                                  </div>
                                  <p class="font-bold ms-3 mb-0">Si Cantik</p>
                                </div>
                              </td>
                              <td class="col-auto">
                                <p class="mb-0">
                                  Congratulations on your graduation!
                                </p>
                              </td>
                            </tr>
                            <tr>
                              <td class="col-3">
                                <div class="d-flex align-items-center">
                                  <div class="avatar avatar-md">
                                    <img src="assets/images/faces/2.jpg" />
                                  </div>
                                  <p class="font-bold ms-3 mb-0">Si Ganteng</p>
                                </div>
                              </td>
                              <td class="col-auto">
                                <p class="mb-0">
                                  Wow amazing design! Can you make another
                                  tutorial for this design?
                                </p>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div> -->

      <div class="col-12 col-lg-3">
        <div class="card">
          <div class="card-body py-4 px-4">
            <div class="d-flex align-items-center">
              <div class="avatar avatar-xl">
                <img src="assets/images/faces/1.jpg" alt="Face 1" />
              </div>
              <div class="ms-3 name">
                <h5 class="font-bold">Ganapati</h5>
                <h6 class="text-muted mb-0">@Ganapati</h6>

              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <!-- <div class="card-header">
                  <h4>Recent Messages</h4>
                </div>
                <div class="card-content pb-4">
                  <div class="recent-message d-flex px-4 py-3">
                    <div class="avatar avatar-lg">
                      <img src="assets/images/faces/4.jpg" />
                    </div>
                    <div class="name ms-4">
                      <h5 class="mb-1">Hank Schrader</h5>
                      <h6 class="text-muted mb-0">@johnducky</h6>
                    </div>
                  </div>
                  <div class="recent-message d-flex px-4 py-3">
                    <div class="avatar avatar-lg">
                      <img src="assets/images/faces/5.jpg" />
                    </div>
                    <div class="name ms-4">
                      <h5 class="mb-1">Dean Winchester</h5>
                      <h6 class="text-muted mb-0">@imdean</h6>
                    </div>
                  </div>
                  <div class="recent-message d-flex px-4 py-3">
                    <div class="avatar avatar-lg">
                      <img src="assets/images/faces/1.jpg" />
                    </div>
                    <div class="name ms-4">
                      <h5 class="mb-1">John Dodol</h5>
                      <h6 class="text-muted mb-0">@dodoljohn</h6>
                    </div>
                  </div>
                  <div class="px-4">
                    <button
                      class="btn btn-block btn-xl btn-outline-primary font-bold mt-3"
                    >
                      Start Conversation
                    </button>
                  </div>
                </div> -->
        </div>
        <!-- <div class="card">
                <div class="card-header">
                  <h4>Visitors Profile</h4>
                </div>
                <div class="card-body">
                  <div id="chart-visitors-profile"></div>
                </div>
              </div> -->
      </div>
        </section>
      </div>
      <h3 class="">Recent Orders</h3>
      <div class="table-responsive">
        <table class="table table-lg">
          <thead>
            <tr>
              <th>Sr.no</th>
              <th>Name</th>
              <th>Product</th>

              <th>Date</th>
              <th>Quantity</th>

              <th>Status</th>


            </tr>

          </thead>
          <tbody>
            <?php

            $i = 1;
            $sql = "SELECT * FROM `orders` inner join `product` on orders.mc_id=product.mc_id  ORDER BY date DESC";
            $res = mysqli_query($con, $sql);
            while ($fetch = mysqli_fetch_assoc($res)) {
              if ($i > 4) {
                break;
              }
            ?>

              <tr>
                <td class="text-bold-500"><?php echo $i++ ?></td>
                <td class="text-bold-500"><?php echo $fetch['name']; ?></td>
                <td class="text-bold-500"><?php echo $fetch['mc_name']; ?></td>
                <td class="text-bold-500"><?php echo $fetch['date']; ?></td>
                <td class="text-bold-500"><?php echo $fetch['quantity']; ?></td>

                <td><?php echo $fetch['status']; ?>
                </td>




              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <footer>
        <div class="footer clearfix mb-0 text-muted">
          <div class="float-start">
            <p>2023&copy; Hegde</p>
          </div>
          <div class="float-end">
            <p>
              <!-- <span class="text-danger"><i class="bi bi-heart"></i></span> -->
              <a href="https://saugi.me"></a>
            </p>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/app.js"></script>

  <!-- Need: Apexcharts -->
  <script src="assets/extensions/apexcharts/apexcharts.min.js"></script>
  <script src="assets/js/pages/dashboard.js"></script>
</body>

</html>