<?php include "includes/db.php";

include "header.php";
include "functions.php" ?>
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
    <style>
        .name {
            text-align: end;


        }

        .name:hover {
            cursor: pointer;
        }
    </style>


</head>

<body>

    <!-- Header End====================================================================== -->
    <div id="mainBody">
        <div class="container">
            <div class="row">
                <!-- Sidebar ================================================== -->
                <?php include "sidebar.php"; ?>

                <div id="sidebar" class="span3">
                </div>
                <!-- Sidebar end=============================================== -->
                <div class="span9">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a> <span class="divider">/</span></li>
                        <li><a href="products.php">Products</a> <span class="divider">/</span></li>
                        <li class="active">product Details</li>
                    </ul>

                    <!-- PRODUCTS details -->
                    <?php

                    // pro_detail();
                    global $db;

                    if (isset($_GET['pro_id']));
                    // after clicking pro_id--->a tag passing the id with it
                    $product_id = $_GET['pro_id'];

                    global $db;

                    // if (isset($_GET['cat'])) {

                    $get_product = "select * from products where product_id = $product_id";
                    // select products where product_id tbl colmn name - $product_id declare variable 
                    $run_products = mysqli_query($db, $get_product);
                    while ($row_products = mysqli_fetch_array($run_products)) {
                        $prod_id = $row_products['product_id'];
                        $prod_title = $row_products['product_title'];
                        $prod_cat = $row_products['cat_id'];
                        $prod_brand = $row_products['brand_id'];
                        $prod_desc = $row_products['product_desc'];
                        $prod_price = $row_products['product_price'];
                        $prod_img = $row_products['product_img'];
                        $prod_img2 = $row_products['product_img1'];
                        $prod_img3 = $row_products['product_img2'];
                        $prod_qty = $row_products['product_qty'];
                    }


                    echo "<div class='row'>
                              <div id='gallery' class='span3'>
                              <a href='admin-area/product-images/$prod_img' title=''>
                              <img src='admin-area/product-images/$prod_img' style='width:100%' alt='s' /></a>
                              <div id='differentview' class='moreOptopm carousel slide'>
                              <div class='carousel-inner>
                              <div class='item active'>
                              <a href='admin-area/product-images/$prod_img'>
                             <img style='width: 78px;height: 78px;object-fit: contain;'src='admin-area/product-images/$prod_img' alt='' /></a>

                             <a href='admin-area/product-images/$prod_img2'> <img style='width: 78px;height: 78px;object-fit: contain;' src='admin-area/product-images/$prod_img2' alt='' /></a>

                             <a href='admin-area/product-images/$prod_img3'> <img style='width: 78px;height: 78px;object-fit: contain;' src='admin-area/product-images/$prod_img3' alt='' /></a>                               

                    </div>
                                                        <div class='item'>
                                                        <a href='admin-area/product-images/$prod_img'> <img style='    width: 78px;
                                                        height: 78px;object-fit: contain;' src='admin-area/product-images/$prod_img' alt='' /></a>

                                                            <a href='admin-area/product-images/$prod_img2'> <img style='width: 78px;
                                                            height: 78px;object-fit: contain;' src='admin-area/product-images/$prod_img2' alt='' /></a>

                                                            <a href='admin-area/product-images/$prod_img3'> <img style='    width: 78px;
                                                            height: 78px;object-fit: contain;' src='admin-area/product-images/$prod_img3' alt='' /></a>

                                                        </div>
                                                    </div>
                                                    <!--  
                                  <a class='left carousel-control' href='#myCarousel' data-slide='prev'>‹</a>
                                  <a class='right carousel-control' href='#myCarousel' data-slide='next'>›</a> 
                                  -->
                                                </div>
                                                <div class='span6'>
                                                <h3>$prod_title </h3>

                                                <hr class='soft' />
                                                <form class='form-horizontal qtyFrm' action='product_details.php?addd_cart=$prod_id' method='POST'>
                                                    <div class='control-group'>
                                                        <label class='control-label'><span>Rs.$prod_price</span></label>
                                                        <div class='controls'>

                                                        <select style='width: 50px;' name='select_qty' type='submit'>
                                                        <option value='1'>1</option>
                                                        <option value='2'>2</option>
                                                        <option value='3'>3</option>
                                                        </select>
                                                        
                                                        <button  name='submit' type='submit' class='btn btn-large btn-primary'>
                                                        Add to Cart
                                                        <i class=' icon-shopping-cart'></i></button>   
                                                         
                                                        </div>
                                                    </div>
                                                </form>

                                                <hr class='soft' />
                                                <h4>$prod_qty items in stock</h4>
                                                <form class='form-horizontal qtyFrm pull-right'>

                                                </form>
                                                <hr class='soft clr' />
                                                <p>
                                                    $prod_desc
                                                </p>

                                            </div>
                                            </div>


                                        </div>";


                    // cart1();
                    if (isset($_POST['submit'])) {
                        $qty = $_POST['select_qty'];  // Storing Selected Value In Variable
                        // echo "You have selected :" . $qty;  // Displaying Selected Value

                        // isset($_GET['addd_cart']);
                        if (isset($_GET['addd_cart'])) {
                            // add_cart --->add to cart index.php when someone click add to cart--->$_COOKIE
                            //href='index.php?add_cart=$prod_id'
                            // with product id 
                            global $db;
                            $p_id = $_GET['addd_cart'];
                            $qty = $_POST['select_qty'];

                            echo "<script> window.location.href =' document.getElementsByTagName('option')[x].value;</script>'";

                            // $qty = $_POST['qty'];
                            // echo "$qty";

                            // $ip_add = getrealipaddres();
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
                                $ip_add = $row_customer['customer_ip'];
                            }


                            // ip address function declare with variables
                            $check_pro = "SELECT * FROM cart WHERE p_id = '$p_id' AND ip_add = '$ip_add'";

                            // $qty = 1;
                            $run_check = mysqli_query($db, $check_pro);

                            if (mysqli_num_rows($run_check) > 0) {
                                // The mysqli_num_rows() function is an inbuilt function in PHP which is
                                //  used to return the number of rows present in the result set. 
                                // It is generally used to check if data is present in the database or not.
                                //  To use this function, it is mandatory to first set up the connection with 
                                // the MySQL database.
                                echo "";
                            } else {

                                // $qty = $_GET['qty_update'];
                                // $q = "INSERT INTO cart(p_id,ip_add) values ('$p_id','$ip_add')";

                                // $qty = 1;

                                $q = "INSERT INTO cart(p_id,ip_add,qty) values ('$p_id','$ip_add','$qty')";
                                // echo "$q";
                                // inserting cart by query
                                $run_q = mysqli_query($db, $q);
                                // echo "<script>alert('Product inserted into cart');</script>";

                                echo "<script>window.open('product_summary.php','_self')</script>";
                                // Replace the current window with a new window:
                                // The open() method opens a new browser window, or a new tab, depending on your browser settings and the parameter values.

                            }
                        }
                    }
                    // }
                    ?>
                    <!-- PRODUCTS related -->
                    <p class="name">
                        Related products
                    </p>



                    <div class="span9">
                        <ul id="productDetail" class="nav nav-tabs">
                            <li class=""><a href="#home" data-toggle="tab">Product Details</a></li>
                            <li class="active"><a href="#profile" data-toggle="tab">Related Products</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade" id="home">
                                <h4>Product Information</h4>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr class="techSpecRow">
                                            <th colspan="2">Product Details</th>
                                        </tr>
                                        <tr class="techSpecRow">
                                            <td class="techSpecTD1">Brand: </td>
                                            <td class="techSpecTD2">Fujifilm</td>
                                        </tr>
                                        <tr class="techSpecRow">
                                            <td class="techSpecTD1">Model:</td>
                                            <td class="techSpecTD2">FinePix S2950HD</td>
                                        </tr>
                                        <tr class="techSpecRow">
                                            <td class="techSpecTD1">Released on:</td>
                                            <td class="techSpecTD2"> 2011-01-28</td>
                                        </tr>
                                        <tr class="techSpecRow">
                                            <td class="techSpecTD1">Dimensions:</td>
                                            <td class="techSpecTD2"> 5.50" h x 5.50" w x 2.00" l, .75 pounds</td>
                                        </tr>
                                        <tr class="techSpecRow">
                                            <td class="techSpecTD1">Display size:</td>
                                            <td class="techSpecTD2">3</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <h5>Features</h5>
                                <p>
                                    14 Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos and 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced resolution. Tracking Auto Focus. Motion Panorama Mode. Face Detection technology with Blink detection and Smile and shoot mode. 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm. Weight 0.341kg (excluding battery and memory card). Weight 0.437kg (including battery and memory card).<br>
                                    OND363338
                                </p>

                                <h4>Editorial Reviews</h4>
                                <h5>Manufacturer's Description </h5>
                                <p>
                                    With a generous 18x Fujinon optical zoom lens, the S2950 really packs a punch, especially when matched with its 14 megapixel sensor, large 3.0" LCD screen and 720p HD (30fps) movie capture.
                                </p>

                                <h5>Electric powered Fujinon 18x zoom lens</h5>
                                <p>
                                    The S2950 sports an impressive 28mm – 504mm* high precision Fujinon optical zoom lens. Simple to operate with an electric powered zoom lever, the huge zoom range means that you can capture all the detail, even when you're at a considerable distance away. You can even operate the zoom during video shooting. Unlike a bulky D-SLR, bridge cameras allow you great versatility of zoom, without the hassle of carrying a bag of lenses.
                                </p>
                                <h5>Impressive panoramas</h5>
                                <p>
                                    With its easy to use Panoramic shooting mode you can get creative on the S2950, however basic your skills, and rest assured that you will not risk shooting uneven landscapes or shaky horizons. The camera enables you to take three successive shots with a helpful tool which automatically releases the shutter once the images are fully aligned to seamlessly stitch the shots together in-camera. It's so easy and the results are impressive.
                                </p>

                                <h5>Sharp, clear shots</h5>
                                <p>
                                    Even at the longest zoom settings or in the most challenging of lighting conditions, the S2950 is able to produce crisp, clean results. With its mechanically stabilised 1/2 3", 14 megapixel CCD sensor, and high ISO sensitivity settings, Fujifilm's Dual Image Stabilisation technology combines to reduce the blurring effects of both hand-shake and subject movement to provide superb pictures.
                                </p>
                            </div>
                            <div class="tab-pane fade active in" id="profile">
                                <div id="myTab" class="pull-right">
                                    <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
                                    <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
                                </div>
                                <br class="clr">
                                <hr class="soft">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="listView">
                                        <?php rel_getPro() ?>

                                    </div>
                                    <div class="tab-pane" id="blockView">
                                        <ul class="thumbnails">
                                            <li class="span3">
                                                <div class="thumbnail">
                                                    <a href="product_details.php"><img src="themes/images/products/10.jpg" alt=""></a>
                                                    <div class="caption">
                                                        <h5>Manicure &amp; Pedicure</h5>
                                                        <p>
                                                            Lorem Ipsum is simply dummy text.
                                                        </p>
                                                        <h4 style="text-align:center"><a class="btn" href="product_details.php"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">€222.00</a></h4>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="span3">
                                                <div class="thumbnail">
                                                    <a href="product_details.php"><img src="themes/images/products/11.jpg" alt=""></a>
                                                    <div class="caption">
                                                        <h5>Manicure &amp; Pedicure</h5>
                                                        <p>
                                                            Lorem Ipsum is simply dummy text.
                                                        </p>
                                                        <h4 style="text-align:center"><a class="btn" href="product_details.php"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">€222.00</a></h4>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="span3">
                                                <div class="thumbnail">
                                                    <a href="product_details.php"><img src="themes/images/products/12.jpg" alt=""></a>
                                                    <div class="caption">
                                                        <h5>Manicure &amp; Pedicure</h5>
                                                        <p>
                                                            Lorem Ipsum is simply dummy text.
                                                        </p>
                                                        <h4 style="text-align:center"><a class="btn" href="product_details.php"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">€222.00</a></h4>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="span3">
                                                <div class="thumbnail">
                                                    <a href="product_details.php"><img src="themes/images/products/13.jpg" alt=""></a>
                                                    <div class="caption">
                                                        <h5>Manicure &amp; Pedicure</h5>
                                                        <p>
                                                            Lorem Ipsum is simply dummy text.
                                                        </p>
                                                        <h4 style="text-align:center"><a class="btn" href="product_details.php"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">€222.00</a></h4>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="span3">
                                                <div class="thumbnail">
                                                    <a href="product_details.php"><img src="themes/images/products/1.jpg" alt=""></a>
                                                    <div class="caption">
                                                        <h5>Manicure &amp; Pedicure</h5>
                                                        <p>
                                                            Lorem Ipsum is simply dummy text.
                                                        </p>
                                                        <h4 style="text-align:center"><a class="btn" href="product_details.php"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">€222.00</a></h4>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="span3">
                                                <div class="thumbnail">
                                                    <a href="product_details.php"><img src="themes/images/products/2.jpg" alt=""></a>
                                                    <div class="caption">
                                                        <h5>Manicure &amp; Pedicure</h5>
                                                        <p>
                                                            Lorem Ipsum is simply dummy text.
                                                        </p>
                                                        <h4 style="text-align:center"><a class="btn" href="product_details.php"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">€222.00</a></h4>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <hr class="soft">
                                    </div>
                                </div>
                                <br class="clr">
                            </div>
                        </div>
                    </div>
                    <!-- 
                    <hr class="soft" />
                    <div class="tab-pane fade" >
                        <div class="tab-pane" id="listView">
                            <div class="tab-pane" id="listView">
                                <?php rel_getPro() ?>
                            </div>
                        </div>
                    </div> -->
                    <!-- -->



                </div>

            </div>
        </div>
    </div>
    <!-- MainBody End ============================= -->
    <!-- Footer ================================================================== -->
    <div id=" footerSection">
        <div class="container">
            <div class="row">
                <div class="span3">
                    <h5>ACCOUNT</h5>
                    <a href="login.php">YOUR ACCOUNT</a>
                    <!-- <a href="login.php">PERSONAL INFORMATION</a> -->
                    <!-- <a href="login.php">ADDRESSES</a> -->
                    <!-- <a href="login.php">DISCOUNT</a> -->
                    <!-- <a href="login.html">ORDER HISTORY</a> -->
                </div>
                <div class="span3">
                    <h5>INFORMATION</h5>
                    <!-- <a href="contact.html">CONTACT</a> -->
                    <a href="register.php">REGISTRATION</a>
                    <!-- <a href="legal_notice.html">LEGAL NOTICE</a> -->
                    <!-- <a href="tac.html">TERMS AND CONDITIONS</a> -->
                    <!-- <a href="faq.html">FAQ</a> -->
                </div>
                <div class="span3">
                    <!-- <h5>OUR OFFERS</h5>
                    <a href="#">NEW PRODUCTS</a>
                    <a href="#">TOP SELLERS</a>
                    <a href="special_offer.html">SPECIAL OFFERS</a>
                    <a href="#">MANUFACTURERS</a>
                    <a href="#">SUPPLIERS</a> -->
                </div>
                <div id="socialMedia" class="span3 pull-right">
                    <h5>SOCIAL MEDIA </h5>
                    <a href="#"><img width="60" height="60" src="themes/images/facebook.png" title="facebook" alt="facebook" /></a>
                    <a href="#"><img width="60" height="60" src="themes/images/twitter.png" title="twitter" alt="twitter" /></a>
                    <a href="#"><img width="60" height="60" src="themes/images/youtube.png" title="youtube" alt="youtube" /></a>
                </div>
            </div>
            <p class="pull-right">&copy; Bootshop</p>
        </div><!-- Container End -->
    </div>
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