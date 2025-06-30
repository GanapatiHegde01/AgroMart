<?php
session_start();
include "connection.php";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // Fetch the hashed password from the database
    $qry = mysqli_query($con, "SELECT * FROM customer WHERE email='$email'") or die(mysqli_error($con));
    $row = mysqli_fetch_array($qry);

    if ($row) {
        $hash = $row['password']; // Assuming the column name for the hashed password is 'password'
        $cid = $row['cid'];

        // Verify the password
        if (password_verify($pass, $hash)) {
            $_SESSION['email'] = $email;
            $_SESSION['cid'] = $cid;
            echo "<script>alert('Success');window.location='../index.php';</script>";
        } else {
            echo "<script>alert('Failed');window.location='../Login/loginform.html';</script>";
        }
    } else {
        echo "<script>alert('Failed');window.location='../Login/loginform.html';</script>";
    }
}