<?php include "includes/db.php"; ?>
<?php include "functions.php";
?>

<head>
    <style>
        .nes {
            font-size: 16px !important;
            line-height: 35px !important;
        }
    </style>
</head>

<body>
    <div id="header">
        <div class="container">
            <div id="welcomeLine" class="row">
                <?php
                if (!isset($_SESSION['customer_email'])) {

                    echo "<div class='span6'>Welcome!<strong> User</strong></div>";
                } else {
                    $get_customer = "select * from customers";
                    // customer--->fetching in fullname  
                    $run_customer = mysqli_query($db, $get_customer);
                    // execution for sql query--->ie used mysqli_query
                    while ($row_customer = mysqli_fetch_array($run_customer)) {
                        // in loopp product_details are fetch 
                        $cust_id = $row_customer['customer_id'];
                        $cust_fname = $row_customer['customer_fullname'];
                        // echo "<div class='span6'>Welcome! <strong>" . $_SESSION['customer_email'] . "</strong></div>";
                        // echo "<div class='span6'>Welcome! <strong>" . $_SESSION['customer_fullname'] . "</strong></div>";
                    }
                    echo "<div class='span6'>Welcome! <strong>" . $cust_fname . "</strong></div>";
                }

                ?>

                <!-- echo "<div class='span6'>Welcome! <strong>".$_SESSION['customer_email'] ."</strong></div>"; -->

                <!-- <div class="span6">Welcome!<strong> User</strong></div>
                <div class="span6">Welcome!<strong> User</strong></div> -->
                <div class="span6">
                    <div class="pull-right">
                        <!-- <a href="product_summary.php"><span class="">Fr</span></a>
                        <a href="product_summary.php"><span class="">Es</span></a>
                        <span class="btn btn-mini">En</span> -->
                        <!-- <a href="product_summary.php"><span>&pound;</span></a> -->
                        <span class="btn btn-mini">total Price : Rs.<?php total_price() ?>
                        </span>
                        <!-- <a href="product_summary.php"><span class="">$</span></a> -->
                        <a href="product_summary.php"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> <?php items(); ?> Itemes in your cart </span> </a>
                        <!-- <a href="logout.php">Logout</a> -->
                    </div>
                </div>
            </div>
            <?php include "header.php"; ?>

            <div id="mainBody">
                <div class="container">
                    <div class="row">
                        <!-- Sidebar ================================================== -->
                        <div id="sidebar" class="span3">
                            <div class="well well-small"><a id="myCart" href="product_summary.php"><img src="themes/images/ico-cart.png" alt="cart"><?php items(); ?> Items in your cart <span class="badge badge-warning pull-right">Rs.<?php total_price() ?></span></a></div>
                            <ul id="sideManu" class="nav nav-tabs nav-stacked">
                                <li class="subMenu open">
                                    <a>Manage account</a>
                                    <ul>
                                        <li class='active '><a class="nes" href="account.php?my_orders">My orders</a></li>
                                        <!-- <li class='active '><a class="nes" href="account.php?my_orders.php">My orders</a></li> -->
                                        <!-- <li class='active '><a class="nes" href="account.php">My orders</a></li> -->
                                        <!-- <li class='active '><a class="nes" href="account.php?my_orders">My orders</a></li> -->
                                        <li class='active '><a class="nes" href="account.php?edit_account">Edit Profile</a></li>

                                        <!-- get variables -->
                                        <li class='active '><a class="nes" href="account.php?chng_pswd"> Change Address</a></li>

                                        <li class='active'><a class="nes" href="account.php?del_account">Saved Card Details</a></li>
                                    </ul>
                                </li>
                                <li class="subMenu "><a> Categories</a>
                                    <ul>
                                        <!-- display db categories in looped -->
                                        <!-- sql-query -->
                                        <?php get_cat() ?>
                                        <!-- <li><a href="products.php"><i class="icon-chevron-right"></i>Computers, Tablets & laptop (30)</a></li> -->
                                    </ul>
                                </li>
                                <li class="subMenu"><a> Brands </a>
                                    <ul style="display:none">
                                        <?php
                                        getbrand();
                                        ?>
                                    </ul>
                                </li>

                                <br />
                                <br />
                                <div class="thumbnail">
                                    <img src="themes/images/payment_methods.png" title="Bootshop Payment Methods" alt="Payments Methods">
                                    <div class="caption">
                                        <h5>Payment Methods</h5>
                                    </div>
                                </div>
                        </div>
                        <?php

                        // $customer_session = $_SESSION['customer_email'];
                        if (!isset($_SESSION['customer_email'])) {

                            echo "<li class='active '><a class='nes' href='account.php?my_orders'>My orders</a></li>'";
                            echo "<li class='active '><a class='nes' href='account.php?edit_account'>Edit Profile</a></li>";
                            echo "<li class='active '><a class='nes' href='account.php?chng_pswd'> Change Address</a></li>";
                            echo "<li class='active'><a class='nes' href='account.php?del_account'>Saved Card Details</a></li>";
                        }

                        // $get_customer_pic = "SELECT * From customers where user_email='user_session'";
                        // $run_customer = mysqli_query($con,$get_customer_pic);
                        // $row_customer = mysqli_fetch_array($run_customer);
                        // $customer_pic = $row_customer['customer_img'];
                        // echo "<img src='customer_photos/$customer_pic' width>

                        ?>

                        <!-- Contents -->


                        <!--  -->
                        <div>
                            <?php
                            // getdefault();

                            ?>


                            <?php
                            if (isset($_GET['my_orders'])) {
                                include('my_orders.php');
                            }
                            if (isset($_GET['edit_account'])) {
                                include('edit_account.php');
                            }


                            ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>
    <?php include "footer.php" ?>
    <!-- Placed at the end of the document so the pages load faster ============================================= -->
    <script src="themes/js/jquery.js" type="text/javascript"></script>
    <script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="themes/js/google-code-prettify/prettify.js"></script>

    <script src="themes/js/bootshop.js"></script>
    <script src="themes/js/jquery.lightbox-0.5.js"></script>

    <!-- Themes switcher section ============================================================================================= -->
    <div id="secectionBox">
        <link rel="stylesheet" href="themes/switch/themeswitch.css" type="text/css" media="screen" />
        <script src="themes/switch/theamswitcher.js" type="text/javascript" charset="utf-8"></script>
        <div id="themeContainer">
            <div id="hideme" class="themeTitle">Style Selector</div>
            <div class="themeName">Oregional Skin</div>
            <div class="images style">
                <a href="themes/css/#" name="bootshop"><img src="themes/switch/images/clr/bootshop.png" alt="bootstrap business templates" class="active"></a>
                <a href="themes/css/#" name="businessltd"><img src="themes/switch/images/clr/businessltd.png" alt="bootstrap business templates" class="active"></a>
            </div>
            <div class="themeName">Bootswatch Skins (11)</div>
            <div class="images style">
                <a href="themes/css/#" name="amelia" title="Amelia"><img src="themes/switch/images/clr/amelia.png" alt="bootstrap business templates"></a>
                <a href="themes/css/#" name="spruce" title="Spruce"><img src="themes/switch/images/clr/spruce.png" alt="bootstrap business templates"></a>
                <a href="themes/css/#" name="superhero" title="Superhero"><img src="themes/switch/images/clr/superhero.png" alt="bootstrap business templates"></a>
                <a href="themes/css/#" name="cyborg"><img src="themes/switch/images/clr/cyborg.png" alt="bootstrap business templates"></a>
                <a href="themes/css/#" name="cerulean"><img src="themes/switch/images/clr/cerulean.png" alt="bootstrap business templates"></a>
                <a href="themes/css/#" name="journal"><img src="themes/switch/images/clr/journal.png" alt="bootstrap business templates"></a>
                <a href="themes/css/#" name="readable"><img src="themes/switch/images/clr/readable.png" alt="bootstrap business templates"></a>
                <a href="themes/css/#" name="simplex"><img src="themes/switch/images/clr/simplex.png" alt="bootstrap business templates"></a>
                <a href="themes/css/#" name="slate"><img src="themes/switch/images/clr/slate.png" alt="bootstrap business templates"></a>
                <a href="themes/css/#" name="spacelab"><img src="themes/switch/images/clr/spacelab.png" alt="bootstrap business templates"></a>
                <a href="themes/css/#" name="united"><img src="themes/switch/images/clr/united.png" alt="bootstrap business templates"></a>
                <p style="margin:0;line-height:normal;margin-left:-10px;display:none;"><small>These are just examples and you can build your own color scheme in the backend.</small></p>
            </div>
            <div class="themeName">Background Patterns </div>
            <div class="images patterns">
                <a href="themes/css/#" name="pattern1"><img src="themes/switch/images/pattern/pattern1.png" alt="bootstrap business templates" class="active"></a>
                <a href="themes/css/#" name="pattern2"><img src="themes/switch/images/pattern/pattern2.png" alt="bootstrap business templates"></a>
                <a href="themes/css/#" name="pattern3"><img src="themes/switch/images/pattern/pattern3.png" alt="bootstrap business templates"></a>
                <a href="themes/css/#" name="pattern4"><img src="themes/switch/images/pattern/pattern4.png" alt="bootstrap business templates"></a>
                <a href="themes/css/#" name="pattern5"><img src="themes/switch/images/pattern/pattern5.png" alt="bootstrap business templates"></a>
                <a href="themes/css/#" name="pattern6"><img src="themes/switch/images/pattern/pattern6.png" alt="bootstrap business templates"></a>
                <a href="themes/css/#" name="pattern7"><img src="themes/switch/images/pattern/pattern7.png" alt="bootstrap business templates"></a>
                <a href="themes/css/#" name="pattern8"><img src="themes/switch/images/pattern/pattern8.png" alt="bootstrap business templates"></a>
                <a href="themes/css/#" name="pattern9"><img src="themes/switch/images/pattern/pattern9.png" alt="bootstrap business templates"></a>
                <a href="themes/css/#" name="pattern10"><img src="themes/switch/images/pattern/pattern10.png" alt="bootstrap business templates"></a>

                <a href="themes/css/#" name="pattern11"><img src="themes/switch/images/pattern/pattern11.png" alt="bootstrap business templates"></a>
                <a href="themes/css/#" name="pattern12"><img src="themes/switch/images/pattern/pattern12.png" alt="bootstrap business templates"></a>
                <a href="themes/css/#" name="pattern13"><img src="themes/switch/images/pattern/pattern13.png" alt="bootstrap business templates"></a>
                <a href="themes/css/#" name="pattern14"><img src="themes/switch/images/pattern/pattern14.png" alt="bootstrap business templates"></a>
                <a href="themes/css/#" name="pattern15"><img src="themes/switch/images/pattern/pattern15.png" alt="bootstrap business templates"></a>

                <a href="themes/css/#" name="pattern16"><img src="themes/switch/images/pattern/pattern16.png" alt="bootstrap business templates"></a>
                <a href="themes/css/#" name="pattern17"><img src="themes/switch/images/pattern/pattern17.png" alt="bootstrap business templates"></a>
                <a href="themes/css/#" name="pattern18"><img src="themes/switch/images/pattern/pattern18.png" alt="bootstrap business templates"></a>
                <a href="themes/css/#" name="pattern19"><img src="themes/switch/images/pattern/pattern19.png" alt="bootstrap business templates"></a>
                <a href="themes/css/#" name="pattern20"><img src="themes/switch/images/pattern/pattern20.png" alt="bootstrap business templates"></a>

            </div>
        </div>
    </div>
    <span id="themesBtn"></span>
</body>

</html>