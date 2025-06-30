<?php


session_start();
if (!isset($_SESSION['cid'])) {
    # code...

    header("location:loginform.html");
}
include 'connection.php';

if (isset($_POST['cash'])) {
    // Get POST data
    $amount = $_POST['amount'];
    $uid = $_SESSION['cid'];
    $tid = $_POST['tcode'];
    $method = $_POST['method'];
    $date = date('y-m-d');

    // Check if required variables are set
    if (empty($amount) || empty($uid) || empty($tid) || empty($method)) {
        echo "<script>alert('Missing required fields');window.location='bookinginfo.php';</script>";
        exit;
    }

    // Prepared statement to insert payment data
    $stmt = $con->prepare("INSERT INTO `payment`(`cid`, `t_code`, `method`, `date`, `status`, `amt`) VALUES (?, ?, ?, ?, 'paid', ?)");
    $stmt->bind_param("issss", $uid, $tid, $method, $date, $amount);

    if ($stmt->execute()) {
        echo "<script>alert('Saved successfully');</script>";
        header("Location: bookinginfo.php");
        exit;
    } else {
        echo "<script>alert('Error saving data');</script>";
    }

    // Close statement
    $stmt->close();
}
?>
<!-- End -->