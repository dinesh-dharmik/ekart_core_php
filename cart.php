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


    <!-- CSS cart -->

    <!-- <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script> -->
    <!-- //for-mobile-apps -->
    <link href="styles/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="styles/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- font-awesome icons -->
    <link href="styles/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
    <!-- //font-awesome icons -->

    <link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

    <style>
        #header {
            background: #ffffff !important;
        }

        .option-w3ls {
            height: 40px !important;
        }
    </style>
</head>

<body>
    <div id="header">
        <div class="container">

            <h3 style="text-align: center;margin-top:20px;">Chec<span>kout</span></h3>
            <div class="checkout-right">
                <h4>Your shopping cart contains: <span>3 Products</span></h4>

                <?php
                $ip_add = getrealipaddres();


                global $db;

                $total = 0;

                $sel_price = "SELECT * FROM cart WHERE ip_add ='$ip_add'";

                $run_price = mysqli_query($db, $sel_price);

                while ($record = mysqli_fetch_assoc($run_price)) {

                    $pro_id = $record['p_id'];

                    $pro_price = "SELECT * FROM products where product_id = $pro_id";

                    $run_pro_price = mysqli_query($con, $pro_price);

                    while ($p_price = mysqli_fetch_array($run_pro_price)) {

                        $product_price = array($p_price['product_price']);
                        $product_title = $p_price['product_title'];
                        $product_img = $p_price['product_img1'];

                        $values = array_sum($product_price);



                        $total += $values;
                    }
                }

                echo "Rs" . $total;
                ?>
                <table class='timetable_sub'>
                    <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Product</th>
                            <th>Quality</th>
                            <th>Product Name</th>

                            <th>Price</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="rem1">
                            <td class="invert">1</td>

                            <td class="invert-image"><a href="admin-area/product-images/pro_id=425"><img src="admin-area/product-images/<?php $product_img; ?>" alt=" " class="img-responsive"></a></td>
                            <td class="invert">
                                <div class="quantity">
                                    <div class="quantity-select">
                                        <div class="entry value-minus">&nbsp;</div>
                                        <div class="entry value"><span>1</span></div>
                                        <div class="entry value-plus active">&nbsp;</div>
                                    </div>
                                </div>
                            </td>
                            <td class="invert"><?php echo $product_title ?></td>

                            <td class="invert"><?php echo $pro_price ?></td>
                            <td class="invert">
                                <div class="rem">
                                    <div class="close1"><input type="checkbox" name="remove[]" value="<?php echo $pro_id ?>"></div>
                                </div>
                            </td>
                        </tr>
                        </td>
                        </tr>
                    </tbody>
                </table>
            </div> <br />
            <br />
            <div class="well well-small">
                <!-- checkout start -->


                <div class="checkout-left">
                    <div class="col-md-4 checkout-left-basket">
                        <h4>Continue to basket</h4>
                        <ul>
                            <li>Product1 <i>-</i> <span>$15.00 </span></li>
                            <li>Product2 <i>-</i> <span>$25.00 </span></li>
                            <li>Product3 <i>-</i> <span>$29.00 </span></li>
                            <li>Total Service Charges <i>-</i> <span>$15.00</span></li>
                            <li>Total <i>-</i> <span>$84.00</span></li>
                        </ul>
                    </div>
                    <div class="col-md-8 address_form_agile">
                        <h4>Add a new Details</h4>
                        <form action="payment.php" method="post" class="creditly-card-form agileinfo_form">
                            <section class="creditly-wrapper wthree, w3_agileits_wrapper">
                                <div class="information-wrapper">
                                    <div class="first-row form-group">
                                        <div class="controls">
                                            <label class="control-label">Full name: </label>
                                            <input class="billing-address-name form-control" type="text" name="name" placeholder="Full name">
                                        </div>
                                        <div class="w3_agileits_card_number_grids">
                                            <div class="w3_agileits_card_number_grid_left">
                                                <div class="controls">
                                                    <label class="control-label">Mobile number:</label>
                                                    <input class="form-control" type="text" placeholder="Mobile number">
                                                </div>
                                            </div>
                                            <div class="w3_agileits_card_number_grid_right">
                                                <div class="controls">
                                                    <label class="control-label">Landmark: </label>
                                                    <input class="form-control" type="text" placeholder="Landmark">
                                                </div>
                                            </div>
                                            <div class="clear"> </div>
                                        </div>
                                        <div class="controls">
                                            <label class="control-label">Town/City: </label>
                                            <input class="form-control" type="text" placeholder="Town/City">
                                        </div>
                                        <div class="controls">
                                            <label class="control-label">Address type: </label>
                                            <select class="form-control option-w3ls">
                                                <option>Office</option>
                                                <option>Home</option>
                                                <option>Commercial</option>

                                            </select>
                                        </div>
                                    </div>
                                    <button class="submit check_out">Delivery to this Address</button>
                                </div>
                            </section>
                        </form>
                        <div class="checkout-right-basket">
                            <a href="payment.php">Make a Payment <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
                        </div>
                    </div>

                    <div class="clearfix"> </div>

                </div>



                <!-- checkout ends here -->
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