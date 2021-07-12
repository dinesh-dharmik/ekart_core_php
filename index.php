<?php include "includes/db.php"; ?>
<?php include "functions.php";

@session_start();
?>
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
                        // $ip_add = $row_customer['customer_ip'];
                    }

                    echo "<div class='span6'>Welcome! <strong>" . $cust_fname . "</strong></div>";
                };

                ?>

                <!-- echo "<div class='span6'>Welcome! <strong>".$_SESSION['customer_email'] ."</strong></div>"; -->

                <!-- <div class="span6">Welcome!<strong> User</strong></div>
                <div class="span6">Welcome!<strong> User</strong></div> -->
                <div class="span6">
                    <div class="pull-right">
                        <!-- <a href="product_summary.html"><span class="">Fr</span></a>
                        <a href="product_summary.html"><span class="">Es</span></a>
                        <span class="btn btn-mini">En</span> -->
                        <!-- <a href="product_summary.html"><span>&pound;</span></a> -->
                        <span class="btn btn-mini">total Price : Rs.<?php total_price() ?>
                        </span>
                        <!-- <a href="product_summary.html"><span class="">$</span></a> -->
                        <a href="product_summary.php"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> <?php items(); ?> Itemes in your cart </span> </a>
                        <!-- <a href="logout.php">Logout</a> -->
                    </div>
                </div>
            </div>
            <?php include "header.php"; ?>

            <div id="carouselBlk">
                <div id="myCarousel" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="container">
                                <a href="register.php"><img src="themes/images/carousel/6.png" alt="" /></a>
                                <div class="carousel-caption">
                                    <h4>Second Thumbnail label</h4>
                                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="container">
                                <a href="register.php"><img style="width:100%" src="themes/images/carousel/2.png" alt="" /></a>
                                <div class="carousel-caption">
                                    <h4>Second Thumbnail label</h4>
                                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="container">
                                <a href="register.php"><img src="themes/images/carousel/3.png" alt="" /></a>
                                <div class="carousel-caption">
                                    <h4>Second Thumbnail label</h4>
                                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                </div>

                            </div>
                        </div>
                        <div class="item">
                            <div class="container">
                                <a href="register.php"><img src="themes/images/carousel/4.png" alt="" /></a>
                                <div class="carousel-caption">
                                    <h4>Second Thumbnail label</h4>
                                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                </div>

                            </div>
                        </div>
                        <div class="item">
                            <div class="container">
                                <a href="register.php"><img src="themes/images/carousel/5.png" alt="" /></a>
                                <div class="carousel-caption">
                                    <h4>Second Thumbnail label</h4>
                                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="container">
                                <a href="register.php"><img src="themes/images/carousel/6.png" alt="" /></a>
                                <div class="carousel-caption">
                                    <h4>Second Thumbnail label</h4>
                                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
                </div>
            </div>
            <div id="mainBody">
                <div class="container">
                    <div class="row">
                        <!-- Sidebar ================================================== -->
                        <?php include "sidebar.php"; ?>

                        <div class="span9">
                            <div class="well well-small">
                                <h4>Featured Products <small class="pull-right">200+ featured products</small></h4>
                                <div class="row-fluid">
                                    <div id="featured" class="carousel slide">
                                        <div class="carousel-inner">
                                            <div class="item active">
                                                <ul class="thumbnails">
                                                    <li class="span3">

                                                        <?php carPro(); ?>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="item">
                                                <ul class="thumbnails">
                                                    <li class="span3">
                                                        <div class="thumbnail">
                                                            <i class="tag"></i>
                                                            <a href="product_details.php"><img src="themes/images/products/5.jpg" alt=""></a>
                                                            <div class="caption">
                                                                <h5>Product name</h5>
                                                                <h4><a class="btn" href="product_details.php">VIEW</a> <span class="pull-right">$222.00</span></h4>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="span3">
                                                        <div class="thumbnail">
                                                            <i class="tag"></i>
                                                            <a href="product_details.php"><img src="themes/images/products/6.jpg" alt=""></a>
                                                            <div class="caption">
                                                                <h5>Product name</h5>
                                                                <h4><a class="btn" href="product_details.php">VIEW</a> <span class="pull-right">$222.00</span></h4>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="span3">
                                                        <div class="thumbnail">
                                                            <a href="product_details.php"><img src="themes/images/products/7.jpg" alt=""></a>
                                                            <div class="caption">
                                                                <h5>Product name</h5>
                                                                <h4><a class="btn" href="product_details.php">VIEW</a> <span class="pull-right">$222.00</span></h4>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="span3">
                                                        <div class="thumbnail">
                                                            <a href="product_details.php"><img src="themes/images/products/8.jpg" alt=""></a>
                                                            <div class="caption">
                                                                <h5>Product name</h5>
                                                                <h4><a class="btn" href="product_details.php">VIEW</a> <span class="pull-right">$222.00</span></h4>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            
                                        </div>
                                        <a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
                                        <a class="right carousel-control" href="#featured" data-slide="next">›</a>
                                    </div>
                                </div>
                            </div>
                            <!-- latest-product -->
                            <h4>Latest Products </h4>
                            <ul class="thumbnails">
                                <!-- <li class="span3"> -->
                                <?php getPro() ?>


                                <?php
                                cart1();
                                ?>
                                <!-- <h3> -->
                                <!-- // $prod_title
                                        // </h3>
                                        // <img src='admin-area/product-images/$prod_img'> -->

                                <!-- <div class="thumbnail">
                                        <a href="product_details.html"><img src="themes/images/products/6.jpg" alt="" /></a>
                                        <div class="caption">
                                            <h5>Product name</h5>
                                            <p>
                                                Lorem Ipsum is simply dummy text.
                                            </p>

                                            <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">$222.00</a></h4>
                                        </div>
                                    </div> -->
                                </li>
                                <!-- <li class="span3">
                                    <div class="thumbnail">
                                        <a href="product_details.html"><img src="themes/images/products/7.jpg" alt="" /></a>
                                        <div class="caption">
                                            <h5>Product name</h5>
                                            <p>
                                                Lorem Ipsum is simply dummy text.
                                            </p>
                                            <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">$222.00</a></h4>
                                        </div>
                                    </div>
                                </li> -->

                            </ul>

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