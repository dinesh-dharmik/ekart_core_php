<?php


include('includes/db.php');

if (!isset($_SESSION['customer_email'])) {

    // echo "<script>alert('login first');</script>";
    echo "<script>window.open('cust_login.php','_self')</script>";
}
if (isset($_GET['edit_account'])) {


    $customer_email = $_SESSION['customer_email'];

    $get_customer = "SELECT * from customers where customer_email='$customer_email'";


    $r_customer = mysqli_query($con, $get_customer);

    $row_c = mysqli_fetch_array($r_customer);

    // 	if (!$row_c) {
    // 	printf("Error: %s\n", mysqli_error($con));
    // 	// exit();
    // }


    $id = $row_c['customer_id'];
    $fname = $row_c['customer_fullname'];
    $email = $row_c['customer_email'];
    $pass = $row_c['customer_pass'];
    $add = $row_c['customer_add'];
    $address = $row_c['customer_address'];
    $city = $row_c['customer_city'];
    $state = $row_c['customer_state'];
    $code = $row_c['customer_code'];
    $country = $row_c['customer_country'];
    $info = $row_c['customer_info'];
    $phone = $row_c['customer_phone'];
}

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
    <h4 style="text-align: center">Update Your Account </h4>
    <div style="display: flex;margin:auto;    text-align: center;
    margin-top: 20px;">

        <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">

            <div class="control-group">
                <label class="control-label" for="inputFname1">full name <sup>*</sup></label>
                <div class="controls">
                    <input type="text" name="fname" value='<?php echo "$fname"; ?>' placeholder="First Name">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="input_email">Email <sup>*</sup></label>
                <div class="controls">
                    <input type="text" name="cemail" value='<?php echo "$email"; ?>' placeholder="Email">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputPassword1">Password <sup>*</sup></label>
                <div class="controls">
                    <input type="password" name="c_pass" value='<?php echo "$pass"; ?>' placeholder="Password">
                </div>
            </div>


            <h4>Your address</h4>


            <div class="control-group">
                <label class="control-label" for="address">Address<sup>*</sup></label>
                <div class="controls">
                    <input type="text" name="c_address" placeholder="c_Adress" value='<?php echo "$add"; ?>' /> <span>Street address, P.O.
                        box, company name, c/o</span>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="address2">Address (Line 2)<sup>*</sup></label>
                <div class="controls">
                    <input type="text" name="c_addre" value='<?php echo "$address"; ?>' placeholder="Adress line 2" /> <span>Apartment,
                        suite, unit, building, floor, etc.</span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="city">City<sup>*</sup></label>
                <div class="controls">
                    <input type="text" name="c_city" value='<?php echo "$city"; ?>' placeholder="c_city" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="state">State<sup>*</sup></label>
                <div class="controls">
                    <input type="text" name="c_state" value='<?php echo "$state"; ?>' placeholder="state" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="postcode">Zip / Postal Code<sup>*</sup></label>
                <div class="controls">
                    <input type="text" name="c_pincode" value='<?php echo "$code"; ?>' placeholder="Zip / Postal Code" />
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="country">Country<sup>*</sup></label>
                <div class="controls">
                    <input type="text" name="c_country" value='<?php echo "$country"; ?>' placeholder="India">
                </div>

            </div>



            <div class="control-group">
                <label class="control-label" for="mobile">Mobile Phone </label>
                <div class="controls">
                    <input type="text" name="c_phone" value='<?php echo "$phone"; ?>' placeholder="Mobile Phone" />
                </div>
            </div>

            <div class="control-group">
                <div class="controls">
                    <!-- <input type="hidden" name="email_create" value="1">
									<input type="hidden" name="is_new_customer" value="1"> -->
                    <input class="btn btn-large btn-success" type="submit" name="update_account" value="Update Now" />

                </div>
            </div>
        </form>
    </div>
    <?php
    if (isset($_POST['update_account'])) {

        $update_id = $id;

        $c_fname = $_POST['fname'];
        $c_email = $_POST['cemail'];
        $c_pass = $_POST['c_pass'];
        $c_address = $_POST['c_address'];
        $c_add = $_POST['c_addre'];
        $c_city = $_POST['c_city'];
        $c_state = $_POST['c_state'];
        $c_code = $_POST['c_pincode'];
        $c_country = $_POST['c_country'];
        $c_phone = $_POST['c_phone'];

        $update_c = "UPDATE  customers SET 
        customer_fullname='$c_fname',customer_email='$c_email', 
        customer_pass='$c_pass',customer_add='$c_address',
        customer_address='$c_add',customer_city='$c_city',
        customer_state='$c_state',customer_code='$c_code',
        customer_country='$c_country',customer_phone='$c_phone'
        WHERE customer_id='$update_id';
        ";

        $run_c = mysqli_query($con, $update_c);

        if (!$run_c) {
            printf("Error: %s\n", mysqli_error($con));
            // exit();
        }

        if ($run_c) {

            echo "<script>alert('Your account is updated!')</script>";
            echo "<script>window.open('account.php','_self')</script>";
        } else {
            echo "error";
        }
    }






    ?>
</body>

</html>