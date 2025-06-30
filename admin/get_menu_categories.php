<?php
// Include your database connection here
$con = mysqli_connect("localhost", "root", "", "sgcaterers");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['Eid'])) {
    $selectedEventId = $_GET['Eid'];

    $menuCategories = array();
    $qry = mysqli_query($con, "SELECT * FROM menu_category WHERE Eid = '$selectedEventId'");
    while ($row = mysqli_fetch_array($qry)) {
        $menuCategories[] = array(
            'mc_id' => $row['mc_id'],
            'mc_name' => $row['mc_name']
        );
    }

    header('Content-Type: application/json');
    echo json_encode($menuCategories);
}

mysqli_close($con);
