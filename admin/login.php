<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/lstyle.css">
</head>

<body>

    <body>
        <section class="login">
            <div class="login_box">
                <div class="left">

                    <div class="contact">
                        <form method="post">
                            <h3>SIGN IN</h3>
                            <input type="text" name="username" placeholder="USERNAME" required>
                            <input type="password" name="password" placeholder="PASSWORD" required>
                            <button name='submit' class="submit">LET'S GO</button>
                        </form>
                    </div>
                </div>
                <div class="right">
                    <div class="right-text">
                        <h2>AgroMart</h2>
                        <h5>Admin Login</h5>
                    </div>
                    <div class="right-inductor"><img src="https://lh3.googleusercontent.com/fife/ABSRlIoGiXn2r0SBm7bjFHea6iCUOyY0N2SrvhNUT-orJfyGNRSMO2vfqar3R-xs5Z4xbeqYwrEMq2FXKGXm-l_H6QAlwCBk9uceKBfG-FjacfftM0WM_aoUC_oxRSXXYspQE3tCMHGvMBlb2K1NAdU6qWv3VAQAPdCo8VwTgdnyWv08CmeZ8hX_6Ty8FzetXYKnfXb0CTEFQOVF4p3R58LksVUd73FU6564OsrJt918LPEwqIPAPQ4dMgiH73sgLXnDndUDCdLSDHMSirr4uUaqbiWQq-X1SNdkh-3jzjhW4keeNt1TgQHSrzW3maYO3ryueQzYoMEhts8MP8HH5gs2NkCar9cr_guunglU7Zqaede4cLFhsCZWBLVHY4cKHgk8SzfH_0Rn3St2AQen9MaiT38L5QXsaq6zFMuGiT8M2Md50eS0JdRTdlWLJApbgAUqI3zltUXce-MaCrDtp_UiI6x3IR4fEZiCo0XDyoAesFjXZg9cIuSsLTiKkSAGzzledJU3crgSHjAIycQN2PH2_dBIa3ibAJLphqq6zLh0qiQn_dHh83ru2y7MgxRU85ithgjdIk3PgplREbW9_PLv5j9juYc1WXFNW9ML80UlTaC9D2rP3i80zESJJY56faKsA5GVCIFiUtc3EewSM_C0bkJSMiobIWiXFz7pMcadgZlweUdjBcjvaepHBe8wou0ZtDM9TKom0hs_nx_AKy0dnXGNWI1qftTjAg=w1920-h979-ft" alt=""></div>
                </div>
            </div>
        </section>
    </body>

</html>
</body>

</html>
<?php
include 'connection.php';
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $qry = "SELECT * FROM `admin` WHERE `username`='$username' and `password`='$password'";
    $res = mysqli_query($con, $qry);
    $num = mysqli_num_rows($res);
    if ($num > 0) {
        session_start();
        $_SESSION['uid'] = $username;

        header('location:index.php');
    } else {
        echo "<script>alert('Incorrect Password');</script>";
    }
}
?>