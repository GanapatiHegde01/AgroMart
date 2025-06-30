<?php
$con = mysqli_connect("localhost", "root", "", "agromart");
if (!$con) {
    die("Sorry, failed to connect: " . mysqli_connect_error());
}
define("UPLOAD_SRC", $_SERVER['DOCUMENT_ROOT'] . "/agromart /uploaded_image/");
define("FETCH_SRC", "http://127.0.0.1/agromart/uploaded_image/");