<?php
include 'connection.php';

session_start();
$cid = $_SESSION['cid'];
if (!isset($_SESSION['cid'])) {
    # code...

    header("location:loginform1.html");
} ?>

<?php if (isset($_POST['booknow'])) {
    //fuction
    function isReservationExist($date, $time, $con)
    {
        $date = mysqli_real_escape_string($con, $date); // Escape the input to prevent SQL injection
        $time = mysqli_real_escape_string($con, $time);

        $qry = "SELECT COUNT(*) as count FROM `reservation` WHERE `date` = '$date' AND `time` = '$time' AND (`status`='Booked' OR `status`='Accepted')";
        $res = mysqli_query($con, $qry);

        if ($res) {
            $row = mysqli_fetch_assoc($res);
            $count = $row['count'];
            return $count > 0;
        }

        return false;
    }
    $name = $_POST['name'];
    $mid = $_POST['m_id'];
    $mc_id = $_POST['mc_id'];
    $eid = $_POST['event_id'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $quantity = $_POST['quantity'];
    $price = $_POST['quantity'] * $_POST['price'];


    if (isReservationExist($date, $time, $con)) {



        echo '<script>alert("This date and time is already reserved");
        window.location.href="index.php";
        </script>';
    } else {


        $qry = "INSERT INTO `reservation`(`rid`, `name`, `address`, `date`, `time`, `cid`, `m_id`, `contact`, `status`, `Eid`, `mc_id`, `quantity`, `price`) VALUES ('','$name','$address','$date','$time','$cid','$mid','$contact','Booked','$eid','$mc_id','$quantity','$price')" or die(mysqli_error($con));
        mysqli_query($con, $qry);
        echo "<script>alert('Booked successfully');</script>";
        header("location:payment.php?id1=$mid&id2=$date&id3=$time");
    }
} ?>