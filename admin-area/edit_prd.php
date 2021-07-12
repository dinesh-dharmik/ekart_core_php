<?php include "includes/db.php";



##############################<----Getting Specific product from table----->###############################################

// here Get edit_prd. so now --->execute
if (isset($_GET['edit_prd'])) {

    // Storing edit_prd in  variable 
    $edit_id = $_GET['edit_prd'];

    // specific id 
    $get_edit = "SELECT * FROM products WHERE  product_id='$edit_id'";

    $run_edit = mysqli_query($con, $get_edit);

    $row_edit = mysqli_fetch_array($run_edit);

    $update_id = $row_edit['product_id'];

    $p_title = $row_edit['product_title'];
    $cat_id = $row_edit['cat_id'];
    $brand_id = $row_edit['brand_id'];
    $p_img = $row_edit['product_img'];
    $p_img1 = $row_edit['product_img1'];
    $p_img2 = $row_edit['product_img2'];
    $p_price = $row_edit['product_price'];
    $p_desc = $row_edit['product_desc'];
    $p_qty = $row_edit['product_qty'];



    // echo "$update_id";
}

##############################<----Getting category by title----->###############################################

// $get_cat =  "SELECT * FROM categories WHERE cat_id ='$cat_id'";
$get_cat =  "SELECT cat_id ,cat_title FROM categories";

$run_cat = mysqli_query($con, $get_cat);

$row_cat = mysqli_fetch_array($run_cat);

$cat_id = $row_cat['cat_id'];

$cat_row = mysqli_fetch_array($run_cat);

$cat_edit_title = $cat_row['cat_title'];

##############################<----Getting brand by title----->###############################################


$get_brand =  "SELECT brand_id,brand_title FROM brands";

$run_brand = mysqli_query($con, $get_brand);

$brand_row = mysqli_fetch_array($run_brand);

$cat_id = $brand_row['brand_id'];

$brand_edit_title = $brand_row['brand_title'];

?>

<!doctype html>
<html lang="en">

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
    <div style="background-color: white">
        <div class="grid_10">
            <div class="box round first">
                <h2> Update or Edit Products</h2>
                <div class="block">
                    <!-- <div class="alert alert-danger" role="alert" id="show-error">
                        please fill all the fields
                    </div> -->


                    <!-- Form starts -->
                    <!-- edit_prd.php?passing value and update id 
                    which is get from Get
                And using in PPOST to specific id changed
                -->
                    <form action="edit_prd.php?edit_prd=<?php echo "$update_id"; ?>" method="POST" enctype="multipart/form-data">

                        <!-- Getting the value property of specific which is showing  -->
                        <table>
                            <tr>
                                <td>Product Name</td>
                                <td><input type="text" name="pname"></td>
                                <td><?php echo "$p_title";  ?></td>
                            </tr>
                            <tr>
                                <td>Product Desc</td>
                                <td><textarea name="productdis" cols="20" rows="5"></textarea> </td>
                            </tr>
                            <tr>
                                <td>Product price</td>
                                <td><input type="text" name="pprice"></td>
                                <td><?php echo "Rs.$p_price";  ?></td>
                            </tr>
                            <tr>
                                <td>Product quantity</td>
                                <td><input type="text" name="pqty"></td>
                                <td><?php echo "$p_qty";  ?></td>
                            </tr>
                            <tr>
                                <td>Product Image</td>
                                <td><input type="file" name="pimg"></td>
                                <td><img src="product-images/<?php echo "$p_img"; ?>" width=" 50" height="50"></td>

                            </tr>
                            <tr>
                                <td>Product Image 2</td>
                                <td><input type="file" name="pimg2"></td>
                                <td><img src="product-images/<?php echo "$p_img1"; ?>" width=" 50" height="50"></td>
                            </tr>
                            <tr>
                                <td>Product Image 3</td>
                                <td><input type="file" name="pimg3"></td>
                                <td><img src="product-images/<?php echo "$p_img2"; ?>" width=" 50" height="50"></td>
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
                                <td><?php echo "$brand_edit_title"; ?></td>
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
                                <td><?php echo "$cat_edit_title"; ?></td>

                            </tr>
                            <tr>
                                <td colspan='2' align="center">
                                    <input type="submit" name="update_product" values="update_product">
                                </td>
                            </tr>
                        </table>
                    </form>

                </div>
            </div>
        </div>
    </div>


    </div>
</body>


</html>

<?php

// if update_product click
if (isset($_POST['update_product'])) {

    // form data--->add to db
    // $update_id = $_POST['product_id'];
    $product_title = $_POST['pname'];
    $prd_description = $_POST['productdis'];
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


    // Change specific product
    $update_product = "UPDATE products SET cat_id = '$cat_id', brand_id = '$product_brand',
     cat_id = '$product_catgory',
    date = NOW(),
    product_title ='$product_title',
    product_img = '$product_img',
    product_img1 = '$product_img2',
    product_img2 = '$product_img3',
    product_price = '$product_price',
    product_desc = '$prd_description',
    product_qty = '$product_qty' 
    WHERE product_id='$update_id'";


    $run_update = mysqli_query($con, $update_product);
    // echo "$prd_description";

    if ($run_update) {

        echo "<script type='text/javascript'>
    alert('product Updated Sucessfully');
    </script>
    ";
        echo "<script>window.open('dashboard.php?view_products','_self')</script>";
    } else {
        echo "failed";
    }


    // if (false === $run_prod) {
    //     printf("error: %s\n", mysqli_error($con));
    // } else {
    //     echo 'done.';
    //     echo "dis" . $bid;;
    // }

}
// }
?>
</body>

</html>