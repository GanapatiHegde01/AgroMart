<?php
include "connection.php";

if (isset($_POST['Register'])) {
    # code...

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $DOB = $_POST['DOB'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];
    $hash = password_hash(
        $password,
        PASSWORD_DEFAULT
    );
    $qry = mysqli_query($con, "INSERT INTO `customer`( `contact`, `DOB`, `address`, `email`, `password`, `fname`, `lname`) VALUES ('" . $contact . "','" . $DOB . "','" . $address . "','" . $email . "','" . $hash . "','" . $fname . "','" . $lname . "')") or die(mysqli_error($con));

    echo "<script>alert('Registration Success');window.location='../Login/loginform.html';</script>";
}