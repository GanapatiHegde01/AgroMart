<nav class="main-menu">
    <ul>

        <li class="current-list-item">
            <a href="index.php">Home</a>
            <!-- <ul class="sub-menu"> -->
            <!-- <li><a href="">Static Home</a></li> -->
            <!-- <li><a href="index_2.html">Slider Home</a></li> -->
            <!-- </ul> -->
        </li>
        <li><a href="about.php">About</a></li>
        <li>
            <a href="Events.php">Products</a>
            <ul class="sub-menu">
                <?php

                include 'connection.php';
                $qry = "SELECT * FROM `product_category`";
                $res = mysqli_query($con, $qry);

                while ($fetch = mysqli_fetch_assoc($res)) {

                ?>
                    <li><a href="procat.php?id=<?php echo  $fetch['Eid']  ?>"><?php echo $fetch['Ename'];
                                                                                ?> </a></li>
                    <!-- <li><a href="about.html"> </a></li>
                      <li><a href="cart.html"></a></li>
                      <li><a href="checkout.html"> </a></li>
                      <li><a href="contact.html"></a></li>
                      <li><a href="news.html"></a></li>
                      <li><a href="shop.html"></a></li> -->
                <?php
                }
                ?>
            </ul>
        </li>
        <li>
            <a href="bookinginfo.php">My Orders</a>
            <!-- <ul class="sub-menu">
                <li><a href="news.html">News</a></li>
                <li><a href="single-news.html">Single News</a></li>
            </ul> -->
        </li>
        <li><a href="rating.php">Feedbacks</a></li>
        <li><a href="guide.php">Help</a></li>
        <!-- <li>
            <a href="shop.php">Shop</a>
            <ul class="sub-menu">
                <li><a href="shop.php">Shop</a></li>
                <li><a href="checkout.php">Check Out</a></li>
                <li><a href="single-product.html">Single Product</a></li>
                <li><a href="cart.php">Cart</a></li>
            </ul>
        </li> -->

        <?php if (!$user_id) : ?>
            <li>
                <a href="">Login</a>
                <ul class="sub-menu">
                    <li><a href="register/registration.html">Register</a></li>
                    <li><a href="Login/loginform.html">Login</a></li>
                </ul>
            </li>
        <?php endif; ?>
        <li>
            <div class="header-icons">
                <!--   <a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a> -->
                <a class="shopping-cart" href="logout.php">

                    <i class="fas fa-sign-out-alt"></i>

                </a>
                <a class="shopping-cart" href="register/profile.php">

                    <i class="far fa-user"></i>
                    <a class="shopping-cart" href="changepassword.php">

                        <i class="fas fa-key"></i>

                    </a>
            </div>
        </li>
    </ul>
</nav>