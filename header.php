<?php
@session_start();
include "includes/db.php"; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Ekart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--Less styles -->
    <!-- Other Less css file //different less files has different color scheam
	<link rel="stylesheet/less" type="text/css" href="themes/less/simplex.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/classified.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/amelia.less">  MOVE DOWN TO activate
	-->
    <!--<link rel="stylesheet/less" type="text/css" href="themes/less/bootshop.less">
	<script src="themes/js/less.js" type="text/javascript"></script> -->

    <!-- Bootstrap style -->
    <link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen" />
    <link href="themes/css/base.css" rel="stylesheet" media="screen" />
    <!-- Bootstrap style responsive -->
    <link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet" />
    <link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
    <!-- Google-code-prettify -->
    <link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet" />
    <!-- fav and touch icons -->
    <link rel="shortcut icon" href="themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">
    <style type="text/css" id="enject"></style>
</head>


<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
    <a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>
    <div class="navbar-inner">
        <a class="brand" href="index.php"><img src="themes/images/logo.png" alt="Bootsshop" /></a>
        <!-- <form class="form-inline navbar-search" method="post" action="products.html" > -->
        <!-- <form class="form-inline navbar-search" method="Get" action="result.php" enctype="multipart/form-data">
            <input id="srchFld" name="user_query" class="srchTxt" type="text" style="    padding: 15px 0;" /> -->
        <!-- <input id="srchFld" class="srchTxt" type="text" /> -->



        <!-- <select class="srchTxt"> -->
        <?php
        // $get_cat = "select * from categories";

        // $run = mysqli_query($con, $get_cat);

        // while ($row_cat = mysqli_fetch_array($run)) {

        //     $cat_id = $row_cat['cat_id'];
        //     $cat_title = $row_cat['cat_title'];

        //     echo  "<option>$cat_title</option>";
        // };


        ?>

        <!-- </select> -->
        <!-- <button type="submit" value="search" id="submitButton" class="btn btn-primary">Go</button> -->
        <!-- </form> -->
        <ul id="topMenu" class="nav pull-right">
            <!-- <li class=""><a href="special_offer.html">Specials Offer</a></li>
            <li class=""><a href="normal.html">Delivery</a></li> -->
            <!-- <li class=""><a href="account.php">Account</a></li> -->
            <!-- <li class=""><a href="contact.php">Contact</a></li> -->
            <li class=""><a href="register.php">Register</a></li>
            <li class=""><a href="product_summary.php">Cart</a></li>
            <li class="">
                <!-- <a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Login</span></a> -->
                <!-- <a href="cust_login.php" role="button" style="padding-right:0"><span class="btn btn-large btn-success">Login</span></a> -->


                <?php if (!isset($_SESSION['customer_email'])) {

                    echo "<a href='checkout.php' role='button' style='padding-right:0'><span class='btn btn-large btn-success'>Login</span></a>";
                } else {
                    echo "<a href='logout.php' role='button' style='padding-right:0'><span class='btn btn-large btn-success'>Logout</span></a>";
                }



                ?>
                <div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3>Login Block</h3>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal loginFrm">
                            <div class="control-group">
                                <input type="text" id="inputEmail" placeholder="Email">
                            </div>
                            <div class="control-group">
                                <input type="password" id="inputPassword" placeholder="Password">
                            </div>
                            <div class="control-group">
                                <label class="checkbox">
                                    <input type="checkbox"> Remember me
                                </label>
                            </div>
                        </form>
                        <button type="submit" class="btn btn-success">Sign in</button>
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
</div>
</div>
<!-- Header End====================================================================== -->