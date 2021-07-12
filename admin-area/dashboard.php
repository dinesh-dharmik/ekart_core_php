<?php include "includes/db.php";

Session_start();
?>

<!DOCTYPE html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Ekart Admin Panel</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="css/jquery.jqplot.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script language="javascript" type="text/javascript" src="js/jqPlot/jquery.jqplot.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.barRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.pieRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.highlighter.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.pointLabels.min.js"></script>
    <!-- END: load jqplot -->
    <script src="js/setup.js" type="text/javascript"></script>
    <!-- <script>
        // HIDE error message
        $(document).ready(function() {
            $('#show-error').hide();
        });

        // Validation form js
        function validform() {
            var name = document.forms["form"]["pname"].value;
            var desc = document.forms["form"]["productdis"].value;
            var price = document.forms["form"]["pprice"].value;
            var qty = document.forms["form"]["pqty"].value;
            var img = document.forms["form"]["pimg"].value;
            var img2 = document.forms["form"]["pimg2"].value;
            var img3 = document.forms["form"]["pimg3"].value;
            var brand = document.forms["form"]["pbrand"].value;
            var category = document.forms["form"]["pcategory"].value;


            if (name == '' || desc == '' || price == '' || qty == '' || img == '' || img2 == '' || img3 == '' || brand == '' || category == '') {
                // alert('error');
                $("#show-error").show();
                return false;
            }
        }

       
    </script> -->
    </script>
    <style>
        table {
            border-collapse: separate;
            border-spacing: 0 15px;
        }

        th {
            background-color: #4287f5;
            color: white;
        }

        th,
        td {
            width: 150px;
            text-align: center;
            border: 1px solid #bab4b4;
            ;
            vertical-align: middle;
            padding: 5px;
        }

        ul.menu ul li a {
            padding-left: 10px !important;
            font-size: 12px !important;

        }
    </style>
</head>

<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft">
                    <img src="img/logo.png" alt="Logo" /></div>
                <div class="floatright">
                    <div class="floatleft">
                    </div>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">

                            <?php
                            // $em = $_SESSION['admin_email'];

                            // echo "$em";



                            // To fetch admin name;
                            $get_orders = "SELECT * from admins ";

                            $run_orders = mysqli_query($con, $get_orders);

                            $row_or = mysqli_fetch_array($run_orders);

                            $fname = $row_or['admin_name'];

                            ?>
                            <li>Hello <?php echo "$fname"; ?></li>

                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                        <br />

                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="grid_12">
            <ul class="nav main">
                <!-- <li class="ic-dashboard"><a href="dashboard.html"><span>Dashboard</span></a> </li> -->
                <li class="ic-form-style"><a href="javascript:"><span>Controls</span></a>
                    <ul>
                        <li><a href="form-controls.html">Forms</a> </li>
                        <li><a href="buttons.html">Buttons</a> </li>
                        <li><a href="form-controls.html">Full Page Example</a> </li>
                        <li><a href="table.html">Page with Sidebar Example</a> </li>
                    </ul>
                </li>
                <!-- <li class="ic-typography"><a href="typography.html"><span>Typography</span></a></li> -->
                <!-- <li class="ic-charts"><a href="charts.html"><span>Charts & Graphs</span></a></li> -->
                <!-- <li class="ic-grid-tables"><a href="table.html"><span>Data Table</span></a></li> -->
                <!-- <li class="ic-gallery dd"><a href="javascript:"><span>Image Galleries</span></a> -->
                <!-- <ul>
                        <li><a href="image-gallery.html">Pretty Photo</a> </li>
                        <li><a href="gallery-with-filter.html">Gallery with Filter</a> </li>
                    </ul> -->
                </li>
                <li class="ic-notifications"><a href="notifications.html"><span>Notifications</span></a></li>

            </ul>
        </div>

        <div class="clear">
        </div>
        <div class="grid_2">
            <div class="box sidemenu">
                <div class="block" id="section-menu">
                    <ul class="section menu">
                        <li><a class="menuitem">Manage Content</a>
                            <ul class="submenu">
                                <!-- ###########______________________LINKED____________########  -->
                                <!-- passing variables insert_prd 
                            so now if we isset get insert_prd then set excutes
                            -->
                                <li id="show-prd"><a href="dashboard.php?insert_prd">Insert New product</a> </li>
                                <li id="ac"><a href="dashboard.php?view_products">View all products</a> </li>
                                <!-- <li><a href="dashboard.php?edit_prd">Update or Edit products</a> </li> -->
                                <li><a href="dashboard.php?edit_category">View all Category</a> </li>
                                <li><a href="dashboard.php?edit_brand">Edit Brand <Brand></Brand></a> </li>
                            </ul>
                        </li>
                        <!-- ###########______________________LINKED____________########  -->
                        <li><a class="menuitem">Customer Content</a>
                            <ul class="submenu">
                                <li><a href="dashboard.php?view_cust">View Customer</a> </li>
                                <li><a href="dashboard.php?view_order">View Orders</a> </li>
                                <li><a href="dashboard.php?view_pay">View Payment</a> </li>
                            </ul>
                        </li>


                    </ul>
                </div>
            </div>
        </div>


        <div style="background-color: white">
            <div class="grid_10">
                <div class="box round first">

                    <div class="block">


                        <!-- Form starts -->

                        <!-- One page and desgin adding  Page-->
                        <?php
                        // if issest get view_products--->include viewproduct.php page
                        if (isset($_GET['view_products'])) {

                            include "view_product.php";
                        }

                        if (isset($_GET['insert_prd'])) {
                            include "insert_prd.php";
                        }
                        if (isset($_GET['edit_category'])) {

                            include "edit_cats.php";
                        }

                        if (isset($_GET['edit_brand'])) {

                            include "edit_brand.php";
                        }
                        if (isset($_GET['view_cust'])) {

                            include "view_cust.php";
                        }
                        if (isset($_GET['view_order'])) {

                            include "cust_orders.php";
                        }
                        if (isset($_GET['view_pay'])) {

                            include "view_pay.php";
                        }

                        ?>

                    </div>
                </div>
            </div>
        </div>
        <div id="site_info">
            <p>
                Dinesh Dharmik
            </p>
        </div>

    </div>
</body>

</html>