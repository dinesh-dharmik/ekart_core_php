<?php include "header.php"; ?>
<?php include "includes/db.php"; ?>
<?php include "functions.php";
?>


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

<body>

    <!-- Header End====================================================================== -->
    <div id="mainBody">
        <div class="container">
            <div class="row">
                <!-- Sidebar ================================================== -->
                <?php include "sidebar.php"; ?>
                <!-- Sidebar end=============================================== -->

                <div class="span9">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a> <span class="divider">/</span></li>
                        <li class="active"> SHOPPING CART</li>
                    </ul>
                    <h3> SHOPPING CART [ <small><?php items() ?> Items in cart </small>]<a href="index.php" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> <input type="submit" style="border:none;font-size: 16px;
    font-weight: bold;" name="continue" value="Continue Shopping"> </a></h3>
                    <hr class="soft" />
                    <!-- <table class="table table-bordered">
                            <tr>
                                <th> I AM ALREADY REGISTERED </th>
                            </tr>
                            <tr>
                                <td>
                                    <form class="form-horizontal">
                                        <div class="control-group">
                                            <label class="control-label" for="inputUsername">Username</label>
                                            <div class="controls">
                                                <input type="text" id="inputUsername" placeholder="Username">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputPassword1">Password</label>
                                            <div class="controls">
                                                <input type="password" id="inputPassword1" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <div class="controls">
                                                <button type="submit" class="btn">Sign in</button> OR <a href="register.html" class="btn">Register Now!</a>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <div class="controls">
                                                <a href="forgetpass.html" style="text-decoration:underline">Forgot password ?</a>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        </table> -->
                    <!-- Form  -->
                    <form action="product_summary.php" method="POST" enctype="multipart/form-data">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Remove</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // ip address
                                $ip_add = getrealipaddres();

                                global $con;

                                $total = 0;
                                $total_price = 0;

                                // fetching from cart where 
                                $sel_price = "SELECT * FROM cart WHERE ip_add ='$ip_add'";

                                $run_price = mysqli_query($con, $sel_price);

                                while ($record = mysqli_fetch_assoc($run_price)) {

                                    $pro_id = $record['p_id'];

                                    // product from prd =--> id
                                    $pro_price = "SELECT * FROM products where product_id = $pro_id";

                                    $run_pro_price = mysqli_query($con, $pro_price);

                                    while ($p_price = mysqli_fetch_array($run_pro_price)) {

                                        $product_price = array($p_price['product_price']);
                                        $product_title = $p_price['product_title'];
                                        $product_img = $p_price['product_img'];

                                        $pp = $p_price['product_price'];
                                        $values = array_sum($product_price);


                                        $total += $values;

                                ?>
                                        <!-- product details  -->
                                        <tr>
                                            <td> <img width="60" src='admin-area/product-images/<?php echo "$product_img"; ?> ' alt="" /></td>
                                            <td><?php echo $product_title; ?></td>
                                            <td style="text-align: center;">
                                                <?php
                                                $get_pid = "SELECT * FROM cart where p_id = '$pro_id'";

                                                $run_id = mysqli_query($con, $get_pid);

                                                while ($row_orders = mysqli_fetch_array($run_id)) {
                                                    $pro_id = $row_orders['p_id'];
                                                    $pro_qty = $row_orders['qty'];
                                                }
                                                $total = ((int) $values * (int) $pro_qty);
                                                // for final price 
                                                $total_price += $pp * $pro_qty;


                                                ?>
                                                <!-- <div class="input-append"><input name="qty" class="span1" style="max-width:34px" placeholder="1" value="" id="appendedInputButtons" size="16" type="number"> -->
                                                <p><?php echo $pro_qty ?></p>
                                                <!-- <button class="btn" type="button"><i class="icon-minus"></i></button>
                                                    <button class="btn" type="button"><i class="icon-plus"></i></button> -->
                                                <!-- <button class="btn btn-danger" name="remove[]" value="" type="button"><i class="icon-remove icon-white"></i></button> -->
                </div>
                <!-- updating qty -->
                </td>
                <!-- price -->
                <td>Rs.<?php echo number_format($values);  ?></td>
                <!-- discount -->
                <td style="text-align: center;">00</td>
                <td style="text-align: center;">
                    <?php
                                        $get_pid = "SELECT * FROM cart where p_id = '$pro_id'";


                                        $run_id = mysqli_query($con, $get_pid);

                                        while ($row_orders = mysqli_fetch_array($run_id)) {
                                            $pro_id = $row_orders['p_id'];
                                            $pro_qty = $row_orders['qty'];
                                        }
                                        // echo "$pro_id";
                    ?>
                    <!-- <a href="product_summary.php?pro_id= <?php
                                                                // echo $pro_id; 
                                                                ?>" name="removed" value="echo $pro_id;">Remove</a> -->
                    <button style="background-color:#b94a48;font-family:cursive;color:whitesmoke;border:none;padding:4px;" type="submit" name="removed" value="<?php echo $pro_id; ?>">Remove</button>
                    <!--
                                                     <input type="checkbox" name="removed[]" value="<?php
                                                                                                    // echo $pro_id;
                                                                                                    ?>"> -->
                    <!-- delete multiple thts y removed []  single den removed-->
                </td>
                <!-- total price -->
                <td>Rs.<?php echo number_format($total);  ?></td>
                </tr>
        <?php    }
                                } ?>

        <tr>
            <!-- final price -->
            <td colspan="6" style="text-align:right">Total Price: </td>

            <!--  final price -->
            <td> <?php echo "Rs " .


                        number_format($total_price);
                    ?></td>

        </tr>
        <tr>
            <td colspan="6" style="text-align:right">Total Discount: </td>
            <td> 00</td>
        </tr>
        <tr>
            <td colspan="6" style="text-align:right">Total Tax: </td>
            <td> 00</td>
        </tr>
        <tr>
            <td colspan="6" style="text-align:right"><strong>TOTAL </strong></td>
            <td class="label label-important" style="display:block"> <strong><?php echo "Rs " .                         number_format($total_price);
                                                                                ?></strong></td>
        </tr>
        </tbody>


        </table>
        </form>
        <!-- Function update cart()  removed button start here-->
        <?php
        function remov_pid()

        {
            global $con;

            if (isset($_POST['removed'])) {


                $pro_id = $_POST['removed'];
                // echo "$pro_id";
                $delete_products = "DELETE from cart where p_id = '$pro_id'";

                $run_delete = mysqli_query($con, $delete_products);

                if ($run_delete) {
                    echo "<script> window.open('product_summary.php','_self')</script>";
                }
            }
        }

        echo @$up_cart = remov_pid();
        // inactive functions save in varaibles


        if (isset($_POST['continue'])) {
            echo "<script>window.open('index.php','_self')</script>";
        }
        ?>
        <!-- ends here update cart function  -->
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>
                        <form class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label"><strong> VOUCHERS CODE: </strong> </label>
                                <div class="controls">
                                    <input type="text" class="input-medium" placeholder="CODE">
                                    <button type="submit" class="btn"> ADD </button>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>

            </tbody>
        </table>

        <table class="table table-bordered">
            <tr>
                <th>ESTIMATE YOUR SHIPPING </th>
            </tr>
            <tr>
                <td>
                    <form class="form-horizontal">
                        <div class="control-group">
                            <label class="control-label" for="inputCountry">Country </label>
                            <div class="controls">
                                <input type="text" id="inputCountry" placeholder="Country">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputPost">Post Code/ Zipcode </label>
                            <div class="controls">
                                <input type="text" id="inputPost" placeholder="Postcode">
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn">ESTIMATE </button>
                            </div>
                        </div>
                    </form>
                </td>
            </tr>
        </table>
        <a href="index.php" class="btn btn-large"><i class="icon-arrow-left"></i><input type="submit" style="border:none;font-size: 16px;
    font-weight: bold;" name="continue" value="Continue Shopping"> </a>
        <a href="checkout.php" class="btn btn-large pull-right">Next <i class="icon-arrow-right"></i></a>

            </div>
        </div>
    </div>
    </div>
    <!-- MainBody End ============================= -->
    <!-- Footer ================================================================== -->
    <div id="footerSection">
        <div class="container">
            <div class="row">
                <div class="span3">
                    <h5>ACCOUNT</h5>
                    <a href="login.php">YOUR ACCOUNT</a>
                    <a href="register.php">PERSONAL INFORMATION</a>
                    <a href="cart.php">ORDER HISTORY</a>
                </div>
                <div class="span3">
                    <h5>INFORMATION</h5>
                    <a href="contact.php">CONTACT</a>
                    <a href="register.php">REGISTRATION</a>
                </div>
                <!-- <div class="span3">
                    <h5>OUR OFFERS</h5>
                    <a href="#">NEW PRODUCTS</a>
                    <a href="#">TOP SELLERS</a>
                    <a href="special_offer.html">SPECIAL OFFERS</a>
                    <a href="#">MANUFACTURERS</a>
                    <a href="#">SUPPLIERS</a>
                </div> -->
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