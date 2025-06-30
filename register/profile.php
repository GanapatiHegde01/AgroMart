<!DOCTYPE html>
<?php

session_start();
if (!isset($_SESSION['cid'])) {
    # code...

    header("location:../Login/loginform.html");
}

?>
<html>

<head>
    <meta charset="utf-8">
    <title>SG Caterers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="wrapper" style="background-image: url('images/bg-reg5.jpg');">
        <div class="inner">
            <div class="image-holder">
                <img src="images\reg.svg" height="500" alt="">
            </div>
            <?php
            include "connection.php";
            $id = $_SESSION['cid'];
            $qry = mysqli_query($con, "SELECT * FROM customer where cid=" . $id);
            $row = mysqli_fetch_array($qry);
            ?>
            <form action="edit.php" method="POST">
                <h3>Profile Form</h3>
                <div class="form-group">
                    <input type="text" placeholder="First Name" name="fname" value="<?php echo $row['fname']; ?>" class="form-control" required="">
                    <input type="text" placeholder="Last Name" name="lname" value="<?php echo $row['lname']; ?>" class="form-control" required="">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                </div>
                <!-- <div class="form-wrapper">
						<input type="text" placeholder="Username" name="cname" class="form-control" required="">
						<i class="zmdi zmdi-account"></i>
					</div> -->
                <div class="form-wrapper">
                    <input type="text" placeholder="Email Address" name="email" value="<?php echo $row['email']; ?>" class="form-control" required="">
                    <i class="zmdi zmdi-email"></i>
                </div>
                <div class="form-wrapper">
                    <input type="text" placeholder="Contact No" name="contact" value="<?php echo $row['contact']; ?>" class="form-control" required="" maxlength="10">
                    <i class="zmdi zmdi-phone"></i>
                </div>
                <div class="form-wrapper">
                    <input type="date" placeholder="Date Of Birth" name="DOB" maxlength="10" value="<?php echo $row['DOB']; ?>" class="form-control" required="">
                </div>
                <div class="form-wrapper">
                    <!-- <select name="" id="" class="form-control">
							<option value="" disabled selected>Gender</option>
							<option value="male">Male</option>
							<option value="femal">Female</option>
							<option value="other">Other</option>
						</select> -->
                    <div class="form-wrapper">
                        <div class="input-group">
                            <textarea name="address" id="textarea-input" rows="9" placeholder="Address" name="address" value="" class="form-control" required=""><?php echo $row['address']; ?></textarea>
                        </div>
                    </div>
                    <!-- <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i> -->
                </div>
                <div class="form-wrapper">
                    <input type="password" placeholder="Password" name="password" value="<?php echo $row['password']; ?>" class="form-control" required="" readonly>
                    <!-- <i class="zmdi zmdi-lock"></i>  -->
                </div>
                <!-- <div class="form-wrapper">
					  <input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $row['']; ?>" class="form-control" required=""> -->
                <!-- <i class="zmdi zmdi-lock"></i> -->
                <!-- </div> -->
                <button type="submit" name="Register">Change
                    <i class="zmdi zmdi-arrow-right"></i>
                </button>
            </form>


        </div>
    </div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>