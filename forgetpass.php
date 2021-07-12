<?php include "header.php" ?>
<!-- Navbar ================================================== -->
<!-- Header End====================================================================== -->
<div id="mainBody">
    <div class="container">
        <div class="row">
            <!-- Sidebar ================================================== -->
            <div id="sidebar" class="span3">
                <div class="well well-small"><a id="myCart" href="product_summary.php"><img src="themes/images/ico-cart.png" alt="cart">3 Items in your cart <span class="badge badge-warning pull-right">$155.00</span></a></div>
                <ul id="sideManu" class="nav nav-tabs nav-stacked">
                    <li class="subMenu open"><a> ELECTRONICS [230]</a>
                        <ul>
                            <li><a class="active" href="products.php"><i class="icon-chevron-right"></i>Cameras (100) </a></li>
                            <li><a href="products.php"><i class="icon-chevron-right"></i>Computers, Tablets & laptop (30)</a></li>
                            <li><a href="products.php"><i class="icon-chevron-right"></i>Mobile Phone (80)</a></li>
                            <li><a href="products.php"><i class="icon-chevron-right"></i>Sound & Vision (15)</a></li>
                        </ul>
                    </li>
                    <li class="subMenu"><a> CLOTHES [840] </a>
                        <ul style="display:none">
                            <li><a href="products.php"><i class="icon-chevron-right"></i>Women's Clothing (45)</a></li>
                            <li><a href="products.php"><i class="icon-chevron-right"></i>Women's Shoes (8)</a></li>
                            <li><a href="products.php"><i class="icon-chevron-right"></i>Women's Hand Bags (5)</a></li>
                            <li><a href="products.php"><i class="icon-chevron-right"></i>Men's Clothings (45)</a></li>
                            <li><a href="products.php"><i class="icon-chevron-right"></i>Men's Shoes (6)</a></li>
                            <li><a href="products.php"><i class="icon-chevron-right"></i>Kids Clothing (5)</a></li>
                            <li><a href="products.php"><i class="icon-chevron-right"></i>Kids Shoes (3)</a></li>
                        </ul>
                    </li>
                    <li class="subMenu"><a>FOOD AND BEVERAGES [1000]</a>
                        <ul style="display:none">
                            <li><a href="products.php"><i class="icon-chevron-right"></i>Angoves (35)</a></li>
                            <li><a href="products.php"><i class="icon-chevron-right"></i>Bouchard Aine & Fils (8)</a></li>
                            <li><a href="products.php"><i class="icon-chevron-right"></i>French Rabbit (5)</a></li>
                            <li><a href="products.php"><i class="icon-chevron-right"></i>Louis Bernard (45)</a></li>
                            <li><a href="products.php"><i class="icon-chevron-right"></i>BIB Wine (Bag in Box) (8)</a></li>
                            <li><a href="products.php"><i class="icon-chevron-right"></i>Other Liquors & Wine (5)</a></li>
                            <li><a href="products.php"><i class="icon-chevron-right"></i>Garden (3)</a></li>
                            <li><a href="products.php"><i class="icon-chevron-right"></i>Khao Shong (11)</a></li>
                        </ul>
                    </li>
                    <li><a href="products.php">HEALTH & BEAUTY [18]</a></li>
                    <li><a href="products.php">SPORTS & LEISURE [58]</a></li>
                    <li><a href="products.php">BOOKS & ENTERTAINMENTS [14]</a></li>
                </ul>
                <br />
                <div class="thumbnail">
                    <img src="themes/images/products/panasonic.jpg" alt="Bootshop panasonoc New camera" />
                    <div class="caption">
                        <h5>Panasonic</h5>
                        <h4 style="text-align:center"><a class="btn" href="product_details.php"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">$222.00</a></h4>
                    </div>
                </div><br />
                <div class="thumbnail">
                    <img src="themes/images/products/kindle.png" title="Bootshop New Kindel" alt="Bootshop Kindel">
                    <div class="caption">
                        <h5>Kindle</h5>
                        <h4 style="text-align:center"><a class="btn" href="product_details.php"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">$222.00</a></h4>
                    </div>
                </div><br />
                <div class="thumbnail">
                    <img src="themes/images/payment_methods.png" title="Bootshop Payment Methods" alt="Payments Methods">
                    <div class="caption">
                        <h5>Payment Methods</h5>
                    </div>
                </div>
            </div>
            <!-- Sidebar end=============================================== -->
            <div class="span9">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a> <span class="divider">/</span></li>
                    <li class="active">Forget password?</li>
                </ul>
                <h3> FORGET YOUR PASSWORD?</h3>
                <hr class="soft" />

                <div class="row">
                    <div class="span9" style="min-height:900px">
                        <div class="well">
                            <h5>Reset your password</h5><br />
                            Please enter the email address for your account. A verification code will be sent to you. Once you have received the verification code, you will be able to choose a new password for your account.<br /><br /><br />
                            <form action="" method="POST">
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail1">E-mail address</label>
                                    <div class="controls">
                                        <input class="span3" type="text" name="c_email" id="inputEmail1" placeholder="Email">
                                    </div>
                                </div>
                                <div class="controls">
                                    <button type="submit" name="forgot_pass" class="btn block">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- MainBody End ============================= -->


<?php

if (isset($_POST['forgot_pass'])) {

    $c_email = $_POST['c_email'];


    $sel_customer = "SELECT * From customers where customer_email= '$c_email'";

    $run = mysqli_query($con, $sel_customer);


    $check_c = mysqli_num_rows($run);

    $row_c = mysqli_fetch_array($run);

    $cust_name = $row_c['customer_fullname'];
    $cust_pass = $row_c['customer_pass'];

    if ($check_c == 0) {

        echo "<script>alert('This email does not exist! check the email address and try again!')</script>";
        exit();
    } else {

        $from = 'admin@ekart.com';

        $subject = '[Ekart] Please reset your password';

        $message = "

        <html>
        <h4>hy $cust_name;</h4>
        <p>We heard that you lost your Ekart password. Sorry about that!</p>
        <p>But don’t worry! Your Password is $cust_pass</p>
        <p>Thanks for using Ekart [The Ekart Team]</p></html>";
        // mail 4 parameter with MAIL
        mail($c_email, $subject, $message, $from);


        echo "<script>alert('password is sent to your email, Please check your Inbox')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";

    }
}



?>
<!-- Footer ================================================================== -->
<div id="footerSection">
    <div class="container">
        <div class="row">
            <div class="span3">
                <h5>ACCOUNT</h5>
                <a href="login.php">YOUR ACCOUNT</a>
                <a href="login.php">PERSONAL INFORMATION</a>
                <a href="login.php">ADDRESSES</a>
                <a href="login.php">DISCOUNT</a>
                <a href="login.php">ORDER HISTORY</a>
            </div>
            <div class="span3">
                <h5>INFORMATION</h5>
                <a href="contact.php">CONTACT</a>
                <a href="register.php">REGISTRATION</a>
                <a href="legal_notice.php">LEGAL NOTICE</a>
                <a href="tac.php">TERMS AND CONDITIONS</a>
                <a href="faq.php">FAQ</a>
            </div>
            <div class="span3">
                <h5>OUR OFFERS</h5>
                <a href="#">NEW PRODUCTS</a>
                <a href="#">TOP SELLERS</a>
                <a href="special_offer.php">SPECIAL OFFERS</a>
                <a href="#">MANUFACTURERS</a>
                <a href="#">SUPPLIERS</a>
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