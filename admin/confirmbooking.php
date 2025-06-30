<?php
include "connection.php";
if (isset($_POST['submit'])) {
    $rid = $_POST['rid'];
    $status = $_POST['status'];
    $qry = mysqli_query($con, "UPDATE `orders` SET `status`='$status' WHERE rid=" . $rid);
    echo "<script>alert('Booking Updated');window.location='viewReservations.php';</script>";
}