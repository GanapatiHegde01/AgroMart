<!DOCTYPE html>
<?php

session_start();
if (!isset($_SESSION['cid'])) {
    # code...

    header("location:Login/loginform.html");
}

?>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>AgroMart</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
    <script type='text/javascript' src=''></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif
        }

        body {
            background: linear-gradient(rgba(246, 247, 249, 0.5), rgba(246, 247, 249, 0.5)), url(userreg/images/images.jpeg) no-repeat center center fixed;
            background-size: cover
        }


        .wrapper {
            max-width: 600px;
            margin: 100px auto
        }

        .wrapper form {
            padding: 30px 50px
        }

        .wrapper form .form-group {
            padding-bottom: .5rem
        }

        .wrapper form .option {
            position: relative;
            padding-left: 25px;
            cursor: pointer;
            display: block
        }

        .wrapper form .option input {
            display: none
        }

        .wrapper form .checkmark {
            position: absolute;
            top: 4px;
            left: 40;
            height: 17px;
            width: 17px;
            background-color: #fff;
            border: 1px solid #aaa;
            border-radius: 50%
        }

        .wrapper form .option input:checked~.checkmark:after {
            display: block
        }

        .wrapper form .option .checkmark:after {
            content: "";
            width: 7px;
            height: 7px;
            display: block;
            border-radius: 50%;
            background-color: #333;
            position: absolute;
            top: 48%;
            left: 52%;
            transform: translate(-50%, -50%) scale(0);
            transition: 200ms ease-in-out 0s
        }

        .wrapper form .option:hover input[type="radio"]~.checkmark {
            background-color: #f4f4f4
        }

        .wrapper form .option input[type="radio"]:checked~.checkmark {
            background: #fff;
            color: #fff;
            transition: 300ms ease-in-out 0s
        }

        .wrapper form .option input[type="radio"]:checked~.checkmark:after {
            transform: translate(-50%, -50%) scale(1);
            color: #fff
        }

        .wrapper form a {
            color: #333
        }

        .wrapper form .form-control {
            outline: none;
            border: none
        }

        .wrapper form .form-control:focus {
            box-shadow: none
        }

        .wrapper form input[type="text"]:focus::placeholder {
            color: transparent
        }

        input[type="date"] {
            cursor: pointer
        }

        .wrapper form .label::after {
            position: absolute;
            top: 5px;
            left: 0px;
            font-size: 0.9rem;
            margin: 0rem 0.4rem;
            text-transform: uppercase;
            letter-spacing: 0.08rem;
            font-weight: 600;
            color: #999;
            transition: all .2s ease-in-out;
            transform: scale(0)
        }

        .wrapper form .label#from::after {
            content: 'From'
        }

        .wrapper form .label#to::after {
            content: 'To'
        }

        .wrapper form .label#depart::after {
            content: 'Depart Date'
        }

        .wrapper form .label#return::after {
            content: 'Return Date'
        }

        .wrapper form .label#psngr::after {
            content: 'Traveller(s)'
        }

        .wrapper form input[type="text"]:focus~.label::after {
            top: -15px;
            left: 0px;
            transform: scale(1)
        }

        .wrapper form input[type="date"]:focus~.label::after {
            top: -15px;
            left: 0px;
            transform: scale(1)
        }

        .margin {
            margin: 2rem 0rem
        }

        @media(max-width: 575.5px) {
            .wrapper {
                margin: 10px
            }

            .wrapper form {
                padding: 20px
            }

            .margin {
                margin: .2rem 0rem
            }
        }
    </style>
</head>

<body oncontextmenu='return false' class='snippet-body'>
    <div class="wrapper bg-yellow">
        <!-- <form action="#"> -->
        <div class="mt-3 mt-md-5">

            <head>

                <br>
                <h5 align="center"><b><u>Change Password</u></b></h5><br>
            </head>
            <form action="" method="POST">
                <div class="d-flex flex-column pb-3">
                    <label for="password">Old Password</label>
                    <input type="password" name="opwd" id="pwd" class="border-bottom border-primary" required="">
                </div>
                <div class="d-flex flex-column pb-3">
                    <label for="password">New Password</label>
                    <input type="password" name="npwd" id="pwd" class="border-bottom border-primary" required="">
                </div>
                <div class="d-flex flex-column pb-3">
                    <label for="password">Confirm Password</label>
                    <input type="password" name="cpwd" id="pwd" class="border-bottom border-primary" required="">
                </div>

                <div class="form-group my-3">
                    <button type="submit" name="change" class="btn btn-primary rounded" align="center">Change </button>
                </div>
            </form>

            <?php
            $uid = $_SESSION['cid'];
            include "connection.php";

            if (isset($_POST['change'])) {
                # code...

                $opwd = $_POST['opwd'];
                $npwd = $_POST['npwd'];
                $cpwd = $_POST['cpwd'];
                $sql = mysqli_query($con, "SELECT * from customer
        where cid='$uid' and password='$opwd'") or die(mysqli_error($con));
                $nrows = mysqli_num_rows($sql);
                if ($nrows == 1) {
                    if ($npwd == $cpwd) {
                        $qry = mysqli_query($con, "UPDATE customer set password='$npwd' where cid='$uid'") or die(mysqli_error($con));
                        if ($qry) {
                            echo '<script>alert("succefully Changed the password");window.location="Login/loginform.html";</script>';
                        } else {
                            echo '<script>alert("Failed to change");
                        window.location="changepassword.php";</script>';
                        }
                    } else {
                        echo '<script>alert("New Password and Confirm Password mismatch ...try again!!!!");</script>';
                    }
                } else {
                    echo '<script>alert("Current password is not matching...try again!!!!");</script>';
                }
            }
            ?>
        </div>
        <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
        <script type='text/javascript'></script>
</body>

</html>