<?php session_start();
// include "function.php"
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
	<?php include "header.php" ?>
	<!-- Header End====================================================================== -->
	<div id="mainBody">
		<div class="container">
			<div class="row">
				<!-- Sidebar ================================================== -->
				<div id="sidebar" class="span3">
					<div class="well well-small"><a id="myCart" href="product_summary.php"><img src="themes/images/ico-cart.png" alt="cart">3 Items in your cart <span class="badge badge-warning pull-right">$155.00</span></a></div>
					<ul id="sideManu" class="nav nav-tabs nav-stacked">
						<!-- Categories display====================================================================== -->
						<li class="subMenu open"><a>Categories</a>
							<ul>
								<?php

								$get_cat = "select * from categories";
								$run = mysqli_query($con, $get_cat);
								// perform query and connected db
								while ($row_cat = mysqli_fetch_array($run)) {
									// Fetch array in associative array in looop
									$cat_id = $row_cat['cat_id'];
									//declare new var and feteching column data--->row_cat and row Id particluar
									$cat_title = $row_cat['cat_title'];
									echo "
						<li><a class='active' href='products.php?cat=$cat_id'>
								<i class='icon-chevron-right'></i>$cat_title </a></li>";
									// after clicking--->a tag-->product.php? declare variable cat = $cat_id


									// so now getting category product by id

								};
								?>
							</ul>
						</li>
						<li class="subMenu"><a> Brands </a>
							<ul style="display:none">
								<?php

								$get_brands = "select * from brands ";
								// selecting brand table
								$run_brands = mysqli_query($con, $get_brands);
								// sql query
								while ($row_brands = mysqli_fetch_array($run_brands)) {

									$brand_id = $row_brands['brand_id'];
									$brand_title = $row_brands['brand_title'];
									// $prod_img = $row_brands['product_img1'];

									//  after clicking a tag---> cat declare variable---> with $brand_id
									echo "<li><a href='products.php?cat=$brand_id'>
        <i class='icon-chevron-right'></i>$brand_title </a></li>";


									// so now getting brand product by id
								}
								?>

							</ul>
						</li>
						
					</ul>
					<br />
					<br />
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
						<li class="active">Registration</li>
					</ul>
					<h3> Registration</h3>
					<div class="well">
						<!--
	<div class="alert alert-info fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
	 </div>
	<div class="alert fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
	 </div>
	 <div class="alert alert-block alert-error fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Lorem Ipsum is simply</strong> dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
	 </div> -->
						<!-- <div class="alert alert-block alert-error fade in">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>Lorem Ipsum is simply</strong> dummy text of the printing and typesetting
							industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
						</div> -->


						<h4>Your personal information</h4>
						<!-- <div class="control-group">
								<label class="control-label">Title <sup>*</sup></label>
								<div class="controls">
									<select class="span1" name="days">
										<option value="">-</option>
										<option value="1">Mr.</option>
										<option value="2">Mrs</option>
										<option value="3">Miss</option>
									</select>
								</div>
							</div> -->

						<form action="register.php" method="POST" enctype="multipart/form-data" class="form-horizontal">

							<div class="control-group">
								<label class="control-label" for="inputFname1">full name <sup>*</sup></label>
								<div class="controls">
									<input type="text" name="fname" placeholder="First Name" required>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="input_email">Email <sup>*</sup></label>
								<div class="controls">
									<input type="text" name="cemail" placeholder="Email" required>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword1">Password <sup>*</sup></label>
								<div class="controls">
									<input type="password" name="c_pass" placeholder="Password" required>
								</div>
							</div>


							<h4>Your address</h4>


							<div class="control-group">
								<label class="control-label" for="address">Address<sup>*</sup></label>
								<div class="controls">
									<input type="text" name="c_address" placeholder="c_Adress" required /> <span>Street address, P.O.
										box, company name, c/o</span>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="address2">Address (Line 2)<sup>*</sup></label>
								<div class="controls">
									<input type="text" name="c_addre" placeholder="Adress line 2" required /> <span>Apartment,
										suite, unit, building, floor, etc.</span>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="city">City<sup>*</sup></label>
								<div class="controls">
									<input type="text" name="c_city" placeholder="c_city" required />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="state">State<sup>*</sup></label>
								<div class="controls">
									<input type="text" name="c_state" placeholder="state" required />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="postcode">Zip / Postal Code<sup>*</sup></label>
								<div class="controls">
									<input type="text" name="c_pincode" placeholder="Zip / Postal Code" required />
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="country">Country<sup>*</sup></label>
								<div class="controls">
									<input type="text" name="c_country" placeholder="India">
								</div>

							</div>
							<div class="control-group">
								<label class="control-label" for="aditionalInfo">Additional information</label>
								<div class="controls">
									<textarea name="c_info" cols="26" rows="3"></textarea>
								</div>
							</div>


							<div class="control-group">
								<label class="control-label" for="mobile">Mobile Phone </label>
								<div class="controls">
									<input type="text" name="c_phone" placeholder="Mobile Phone" required />
								</div>
							</div>

							<!-- <div class="control-group">
								<label class="control-label" for="mobile">Customer Image </label>
								<div class="controls">
									<input type="file" name="c_img" id="mobile" placeholder="Upload file" required />
								</div>
							</div> -->
							<!-- <p><sup>*</sup>Required field </p> -->

							<div class="control-group">
								<div class="controls">
									<!-- <input type="hidden" name="email_create" value="1">
									<input type="hidden" name="is_new_customer" value="1"> -->
									<input class="btn btn-large btn-success" type="submit" name="register" value="Submit" />
								</div>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>
	<!-- MainBody End ============================= -->
	<!-- Footer ================================================================== -->
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
				<p style="margin:0;line-height:normal;margin-left:-10px;display:none;"><small>These are just examples
						and you can build your own color scheme in the backend.</small></p>
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


<?php
function getrealipaddres()
{

	//whether ip is from share internet
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip_address = $_SERVER['HTTP_CLIENT_IP'];
	}
	//whether ip is from proxy
	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	//whether ip is from remote address
	else {
		$ip_address = $_SERVER['REMOTE_ADDR'];
	}
}


if (isset($_POST['register'])) {

	$fname = $_POST['fname'];
	$cemail = $_POST['cemail'];
	$c_pass = $_POST['c_pass'];
	$c_addres = $_POST['c_address'];
	$c_adds = $_POST['c_addre'];
	$c_city = $_POST['c_city'];
	$c_state = $_POST['c_state'];
	$c_code = $_POST['c_pincode'];
	$c_cntry = $_POST['c_country'];
	$c_info = $_POST['c_info'];
	$c_phone = $_POST['c_phone'];
	// $c_img = $_Files['c_img']['name'];
	// $c_img_temp = $_Files['c_img']['tmp_name'];
	$c_ip = getrealipaddres();

	$insert_customer = "INSERT INTO
	customers (
	 customer_fullname,
	  customer_email,
	  customer_pass,
	  customer_add,
	  customer_address,
	  customer_city,
	  customer_state,
	  customer_code,
	  customer_country,
	  customer_info,
	  customer_phone,
	  customer_ip
	)
  VALUES
	(
	'$fname',
	'$cemail',
	'$c_pass',
	'$c_addres',
	'$c_adds',
	'$c_city',
	'$c_state',
	'$c_code',
	'$c_cntry',
	'$c_info',
	'$c_phone',
	'$c_ip'
);";


	echo $insert_customer;

	$run_customer = mysqli_query($con, $insert_customer);

	// move_uploaded_file($c_img_temp,"customer/customer_photos/$c_img");

	// if (!$run_customer) {
	// 	printf("Error: %s\n", mysqli_error($con));
	// 	exit();
	// }



	$sel_cart = "select * from cart where ip_add='$c_ip' ";

	$run_cart = mysqli_query($con, $sel_cart);

	$check_cart = mysqli_num_rows($run_cart);

	if ($check_cart == 1) {
		$_SESSION['customer_email'] = $cemail;
		$_SESSION['customer_fullname'] = $fname;

		echo "<script>alert('account created successfully');</script>";
		echo "<script>window.open('payment_option.php','_self')</script>";
	} else {
		echo "<script>alert('account created successfully');</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}
}

?>