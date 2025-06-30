<?php
include 'connection.php';

session_start();
if (!isset($_SESSION['cid'])) {
    # code...
    $id = $_POST['menucat_id'];
    header("location:loginform1.html?id=$id");
}

?>
<!DOCTYPE html>
<!---Coding By CodingLab | www.codinglabweb.com--->
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Order details</title>
    <!---Custom CSS File--->
    <link rel="stylesheet" href="css/style2.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(function() {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();
            var maxDate = year + '-' + month + '-' + day;
            $('#inputdate').attr('min', maxDate);
        });
    </script>
</head>

<body>
    <section class="container">
        <header>Please fill all the details</header>
        <form action="payment.php" method="POST" class="form">
            <div class="input-box">
                <label>Full Name</label>
                <input type="text" placeholder="Enter full name" name="name" />
            </div>

            <div class="input-box">
                <label>Email Address</label>
                <input type="text" name="email" placeholder="Enter email address" required />
            </div>



            </div>

            </div>
            <div class="input-box address">
                <label>Address</label>
                <textarea name="address" id="" cols="30" rows="6"></textarea>
            </div>


            <?php
            if (isset($_POST['book'])) {
                $user_id = $_POST['user_id'];

                $mc_id = $_POST['menucat_id'];

                $eid = $_POST['event_id'];
                $product_name = $_POST['product_name'];
                $product_price = $_POST['product_price'];
                $quantity = $_POST['quantity'];

            ?>
                <?php
                $qry = "SELECT * FROM product_category INNER join `product` on product.Eid=product_category.Eid   where product.mc_id='$mc_id'";

                $res = mysqli_query($con, $qry);
                $fetch = mysqli_fetch_assoc($res);
                ?>
                <div class="column">
                    <div class="input-box">
                        <label for="contact">Product name</label>
                        <input type="text" name="product_name" value="<?php echo $fetch['mc_name'] ?>" id="contact" disabled>
                    </div>
                    <div class="input-box">
                        <label for="contact">Category</label>
                        <input type="text" name="event" value="<?php echo $fetch['Ename'] ?>" disabled />
                        <input type="hidden" name="eid" value="<?php echo $fetch['Eid'] ?>" />
                        <input type="hidden" name="mc_id" value="<?php echo $fetch['mc_id'] ?>" />
                        <!-- <input type="hidden" name="m_id" value="" /> -->
                        <input type="hidden" name="price" value="<?php echo $fetch['price'] ?>" />

                    </div>

                </div>
                <div class="column">
                    <div class="input-box">
                        <label for="contact">Phone Number</label>
                        <input type="number" id="phone" name="contact" required>
                    </div>
                    <div class="input-box">

                        <label for="contact">Quantity</label>
                        <input type="number" name="quantity" min="<?php echo $fetch['mquantity'] ?>" value="<?php echo $quantity ?>" />
                    </div>

                </div>

                <button name="booknow">Book Now</button>

        </form>
    <?php

            }
    ?>
    </section>
</body>

</html>