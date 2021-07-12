<?php include "includes/db.php"; ?>


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
    <script>
        // HIDE error message
        // $(document).ready(function() {
        //     $('#show-error').hide();
        // });

        // Validation form js
        // function validform() {
        //     var name = document.forms["form"]["pname"].value;
        //     var desc = document.forms["form"]["productdis"].value;
        //     var price = document.forms["form"]["pprice"].value;
        //     var qty = document.forms["form"]["pqty"].value;
        //     var img = document.forms["form"]["pimg"].value;
        //     var img2 = document.forms["form"]["pimg2"].value;
        //     var img3 = document.forms["form"]["pimg3"].value;
        //     var brand = document.forms["form"]["pbrand"].value;
        //     var category = document.forms["form"]["pcategory"].value;


        //     if (name == '' || desc == '' || price == '' || qty == '' || img == '' || img2 == '' || img3 == '' || brand == '' || category == '') {
        //         // alert('error');
        //         $("#show-error").show();
        //         return false;
        //     }
        // }
    </script>
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
                        <img src="img/img-profile.jpg" alt="Profile Pic" /></div>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li>Hello Admin</li>
                            <li><a href="#">Config</a></li>
                            <li><a href="#">Logout</a></li>
                        </ul>
                        <br />
                        <span class="small grey">Last Login: 3 hours ago</span>
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
                <li class="ic-dashboard"><a href="dashboard.html"><span>Dashboard</span></a> </li>
                <li class="ic-form-style"><a href="javascript:"><span>Controls</span></a>
                    <ul>
                        <li><a href="form-controls.html">Forms</a> </li>
                        <li><a href="buttons.html">Buttons</a> </li>
                        <li><a href="form-controls.html">Full Page Example</a> </li>
                        <li><a href="table.html">Page with Sidebar Example</a> </li>
                    </ul>
                </li>
                <li class="ic-typography"><a href="typography.html"><span>Typography</span></a></li>
                <li class="ic-charts"><a href="charts.html"><span>Charts & Graphs</span></a></li>
                <li class="ic-grid-tables"><a href="table.html"><span>Data Table</span></a></li>
                <li class="ic-gallery dd"><a href="javascript:"><span>Image Galleries</span></a>
                    <ul>
                        <li><a href="image-gallery.html">Pretty Photo</a> </li>
                        <li><a href="gallery-with-filter.html">Gallery with Filter</a> </li>
                    </ul>
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
                        <li><a class="menuitem">Menu 1</a>
                            <ul class="submenu">
                                <li><a>Submenu 1</a> </li>
                                <li><a>Submenu 2</a> </li>

                            </ul>
                        </li>
                        <li><a class="menuitem">Menu 2</a>
                            <ul class="submenu">
                                <li><a>Submenu 1</a> </li>
                                <li><a>Submenu 2</a> </li>
                                <li><a>Submenu 3</a> </li>
                                <li><a>Submenu 4</a> </li>
                                <li><a>Submenu 5</a> </li>
                            </ul>
                        </li>


                    </ul>
                </div>
            </div>
        </div>
        <div class="" style="background-color: white">

            <div class="grid_10">
                <div class="box round first">
                    <h2> Add Product</h2>
                    <div class="block">
                        <div class="alert alert-danger" role="alert" id="show-error">
                            please fill all the fields
                        </div>


                        <!-- Form starts -->
                        <form name="form" action="index.php" method="post" onsubmit="return validform()" enctype="multipart/form-data">

                            <table>
                                <tr>
                                    <td>Product Name</td>
                                    <td><input type="text" name="pname"></td>
                                </tr>

                                <tr>
                                    <td>Product Desc</td>
                                    <td><textarea name="productdis" cols="20" rows="3"></textarea> </td>
                                </tr>

                                <tr>
                                    <td>Product price</td>
                                    <td><input type="text" name="pprice"></td>
                                </tr>
                                <tr>
                                    <td>Product quantity</td>
                                    <td><input type="text" name="pqty"></td>
                                </tr>
                                <tr>
                                    <td>Product Image</td>
                                    <td><input type="file" name="pimg"></td>
                                </tr>
                                <tr>
                                    <td>Product Image 2</td>
                                    <td><input type="file" name="pimg2"></td>
                                </tr>
                                <tr>
                                    <td>Product Image 3</td>
                                    <td><input type="file" name="pimg3"></td>
                                </tr>
                                <tr>
                                    <td>Product brand</td>
                                    <td>
                                        <select name="pbrand">

                                            <option>-----select-----</option>
                                            <?php
                                            $get_brand = "SELECT brand_id,brand_title FROM brands";

                                            $run_brand = mysqli_query($con, $get_brand);

                                            while ($row_brand = mysqli_fetch_assoc($run_brand)) {

                                                $bid = $row_brand['brand_id'];
                                                $btitle = $row_brand['brand_title'];

                                                $get_brand_id = $bid['pbrand'];
                                                $get_brand_title = $btitle['pbrand'];
                                                // $cat_title = $ca;
                                                //echo "<option value='$cat_name'>{$row_cat['shop']}</option>";

                                                echo "<option value='$bid'>$btitle</option>";
                                            };

                                            ?>

                                        </select>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Product Category</td>
                                    <td>
                                        <select name="pcategory">

                                            <option>-----select-----</option>
                                            <?php $get_cat = "select cat_id,cat_title from categories";

                                            $run = mysqli_query($con, $get_cat);

                                            while ($row_cat = mysqli_fetch_assoc($run)) {

                                                $cid = $row_cat['cat_id'];
                                                $ctitle = $row_cat['cat_title'];

                                                $cat_id = $cid['pcategory'];
                                                $cat_title = $row_cat['pcategory'];


                                                echo "<option value='$cid'>$ctitle</option>";
                                            };


                                            ?>

                                        </select>

                                    </td>

                                </tr>
                                <tr>
                                    <td colspan='2' align="center">
                                        <input type="submit" name="submit" values="upload">
                                    </td>
                                </tr>
                            </table>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div id="site_info">
            <p>
                dfjgkdgj
            </p>
        </div>

    </div>
</body>

</html>
<?php

if (isset($_POST['submit']) && isset($_POST['productdis'])) {

    // form data--->add to db
    $product_title = $_POST['pname'];
    $product_d = $_POST['productdis'];
    // $product_dec = $_POST['pc'];
    $product_price = $_POST['pprice'];
    $product_qty = $_POST['pqty'];
    // img name
    $product_img = $_FILES['pimg']['name'];
    $product_img2 = $_FILES['pimg2']['name'];
    $product_img3 = $_FILES['pimg3']['name'];
    // ends here
    $product_brand = $_POST['pbrand'];
    $product_catgory = $_POST['pcategory'];
    $status = "on";
    // Image temp-name
    $temp_name1 = $_FILES['pimg']['tmp_name'];
    $temp_name2 = $_FILES['pimg2']['tmp_name'];
    $temp_name3 = $_FILES['pimg3']['tmp_name'];

    // new code for img

    // declare
    $name1 = $_FILES['pimg']['name'];
    $name2 = $_FILES['pimg2']['name'];
    $name3 = $_FILES['pimg3']['name'];

    // target-directory fetch img
    $target_dir = "product-images/";
    $target_file = $target_dir . basename($_FILES["pimg"]["name"]);
    $target_file = $target_dir . basename($_FILES["pimg2"]["name"]);
    $target_file = $target_dir . basename($_FILES["pimg3"]["name"]);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("jpg", "jpeg", "png", "gif");

    // Check extension
    if (in_array($imageFileType, $extensions_arr)) {
        // Upload file
        move_uploaded_file($_FILES['pimg']['tmp_name'], $target_dir . $name1);
        move_uploaded_file($_FILES['pimg2']['tmp_name'], $target_dir . $name2);
        move_uploaded_file($_FILES['pimg3']['tmp_name'], $target_dir . $name3);
    }
    // ends here
    // // upload img to folders
    // move_uploaded_file($temp_name1, 'product-images/$product_img');
    // move_uploaded_file($temp_name2, 'product-images/$product_img2');
    // move_uploaded_file($temp_name3, 'product-images/$product_img3');

    $insert_product = "INSERT INTO
    products (
    cat_id,
    brand_id,
    date,
    product_title,
    product_img1,
    product_img2,
    product_img3,
    product_price,
    product_descthem,
    product_qty
    )
VALUES
    (
    '$product_catgory',
    '$product_brand',
    Now(),
    '$product_title',
    '$product_img',
    '$product_img2',
    '$product_img3',
    '$product_price',
    '$product_d',
    '$product_qty'
    );";

    // echo "$insert_product";
    $run_prod = mysqli_query($con, $insert_product);
    // echo "$run_prod";

    // if ($run_prod) {

    //     echo "<script type='text/javascript'>
    // alert('product added Sucessfully');
    // </script>
    // ";

    //     // return false;
    //     exit();
    // } else {
    //     echo "failed";
    // }
    if (false === $run_prod) {
        printf("error: %s\n", mysqli_error($con));
    } else {
        echo 'done.';
        echo "dis" . $bid;;
    }
}
?>