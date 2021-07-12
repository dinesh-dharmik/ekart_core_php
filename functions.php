<?php

##############################<----Database connections----->###############################################

$db = mysqli_connect("localhost", "root", "", "ekartt");

##############################<----FETCHIING PRODUCTS RANDOMLY LIMIT 0,3 IN CAROSEL----->###############################################
// carosel pro function--->carousel products
function carPro()
{
    global $db;
    $get_products = "select * from products order by rand() LIMIT 0,3";
    // products--->fetching in random function used in show limit 4     
    $run_products = mysqli_query($db, $get_products);
    // execution for sql query--->ie used mysqli_query
    while ($row_products = mysqli_fetch_array($run_products)) {
        // in loopp product_details are fetch 
        $prod_id = $row_products['product_id'];
        $prod_title = $row_products['product_title'];
        $prod_cat = $row_products['cat_id'];
        $prod_brand = $row_products['brand_id'];
        $prod_desc = $row_products['product_desc'];
        $prod_price = $row_products['product_price'];
        $prod_img = $row_products['product_img'];
        $prod_img2 = $row_products['product_img1'];
        $prod_img3 = $row_products['product_img2'];
        // substring function limited string
        $prod_title = substr($prod_title, 0, 10);

        // declare the variables--->product_details.php?     declare--->variable and assgin them--->pro_id = $prod_id;
        // same as $prod_img fetching
        echo "<li class='span3'><div class='thumbnail'>
        <a href='product_details.php?pro_id=$prod_id'>
        <img style='height: 40%;object-fit: contain;' src='admin-area/product-images/$prod_img' alt='' /></a>
        <div class='caption' style='padding:0'>
        <h5>$prod_title</h5>
        <h4 style='text-align:center'>
        <a class='btn' href='product_details.php?pro_id=$prod_id'>
        <i class='icon-zoom-in'></i></a> 
        <a class='btn' href='index.php?add_cart=$prod_id'>Add to <i class='icon-shopping-cart'></i></a> 
        <a class='btn btn-primary' href='product_details.php?pro_id=$prod_id'>Rs.$prod_price</a></h4>
</div>
</div>
";  
    }
}
##############################<----FETCHIING PRODUCTS RANDOMLY ON INDEX PAGE----->###############################################

// <a class='btn' href='index.php?add_cart=$prod_id'>Add to <i class='icon-shopping-cart'></i></a> 
// <a class='btn btn-primary' href='product_details.php?pro_id=$prod_id'>Rs.$prod_price</a></h4>

// getpro()----->fetching products randomly
function getPro()

{
    global $db;
    $get_products = "select * from products order by rand()";
    // selecting products table and fetching randomly--->
    $run_products = mysqli_query($db, $get_products);
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


        $prod_title = substr($prod_title, 0, 30);
        // a tag-->link to product.php?pro_id = $prod_id
        // so while hover or click that product id wil fetch on that page
        //same with add to cart wen click add to cart then product id fetch.
        // add_cart 

        echo "<li class='span3'>
              <div class='thumbnail'>
              <a href='product_details.php?pro_id=$prod_id'>
              <img style='height:230px;object-fit: contain;' src='admin-area/product-images/$prod_img' alt='' /></a>
              <div class='caption' style='padding:0'>
              <h5 style='font-size:12px'>$prod_title</h5>
              <h4 style='text-align:center'><a class='btn' href='product_details.php?pro_id=$prod_id'> 
              <i class='icon-zoom-in'></i></a> 

              <a class='btn' href='index.php?add_cart=$prod_id'>Add to Cart</i></a>

              <a class='btn btn-primary' href='product_details.php?pro_id=$prod_id'>Rs.$prod_price</a></h4>
              </div>
              </div>
              ";
        //   after clicking add to cart it will reload index.php and send variable add_cart=$prod_id
    }
}


##############################<----FETCHIING BRAND IN LOOP (TITLE) SIDEBAR----->###############################################

// function getbrand()----->getting brand in side bar
function getbrand()
{
    global $db;
    $get_brands = "select * from brands ";
    // selecting brand table
    $run_brands = mysqli_query($db, $get_brands);
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
}

##############################<----FETCHIING CATEGORY (title) IN LOOP SIDEBAR----->###############################################

// function getcategory()----->getting category in side bar
function get_cat()
{
    global $db;
    $get_cat = "select * from categories";
    $run = mysqli_query($db, $get_cat);
    // perform query and connected db 
    while ($row_cat = mysqli_fetch_array($run)) {
        // Fetch array in associative array in looop
        $cat_id = $row_cat['cat_id'];
        //declare  new var and feteching column data--->row_cat and row Id particluar
        $cat_title = $row_cat['cat_title'];
        echo "<li><a class='active' href='products.php?cat=$cat_id'>
        <i class='icon-chevron-right'></i>$cat_title </a></li>";
        // after clicking--->a tag-->product.php? declare variable cat = $cat_id


        // so now getting category product by id

    };
}


##############################<----FETCHING  PRODUCTS BY CATEGORY ID----->###############################################

// product.php--->getting products by category id
function get_prodlist()
{
    global $db;
    // if (isset($_GET['cat'])) {
    // cat--->declare variable in a_>tag ----->?cat=$cat_id'
    $category_id = $_GET['cat'];
    // $_GETTING cat-id product and assing in variables.about

    $get_cat_product = "select * from products where cat_id = $category_id";
    // sql query where products-->cat_id = $category_id
    $run_cat_products = mysqli_query($db, $get_cat_product);

    while ($row_cat_products = mysqli_fetch_array($run_cat_products)) {
        $prod_id = $row_cat_products['product_id'];
        $prod_title = $row_cat_products['product_title'];
        $prod_cat = $row_cat_products['cat_id'];
        $prod_brand = $row_cat_products['brand_id'];
        $prod_desc = $row_cat_products['product_desc'];
        $prod_price = $row_cat_products['product_price'];
        $prod_img = $row_cat_products['product_img'];
        $prod_img2 = $row_cat_products['product_img1'];
        $prod_img3 = $row_cat_products['product_img2'];


        echo "<li class='span3'>
               <div class='thumbnail'>
               <a href='product_details.php?pro_id=$prod_id'>
               <img style='height: 200px;object-fit: contain;' src='admin-area/product-images/$prod_img' alt='' /></a>
               <div class='caption' style='padding:0'>
               <h5>$prod_title</h5>
               <h4 style='text-align:center'><a class='btn' href='product_details.php'> 
               <i class='icon-zoom-in'></i></a> 
               <a class='btn' href='index.php?add_cart=$prod_id'>Add to <i class='icon-shopping-cart'></i></a>
                <a class='btn btn-primary' href='product_details.php?pro_id=$prod_id'>$prod_price</a></h4>
               </div>
               </div>
               </li>
               
               ";
        // href='product_details.php?pro_id=$prod_id'
    }
}


##############################<----FETCHING  PRODUCTS details.php----->###############################################


// product_details fetch
function pro_detail()
{
    // global $db;

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
                            <form class='form-horizontal qtyFrm'>
                                <div class='control-group'>
                                    <label class='control-label'><span>Rs.$prod_price</span></label>
                                    <div class='controls'>
                                        
                                    
                                        <a class='btn btn-large btn-primary' href='index.php?add_cart=$prod_id'>Add to Cart<i class=' icon-shopping-cart'></i></a>
                                        
                                        
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
}



##############################<add_cart=$prod_id'----FETCHING  product_details in that related products in php ----->##################
// related products fetch
function rel_getPro()

{
    global $db;
    $get_products = "select * from products order by rand() LIMIT 0,3";
    $run_products = mysqli_query($db, $get_products);
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
        echo "<div class='row'>	  
                        <div class='span2'>
                            <img src='admin-area/product-images/$prod_img' alt=''>
                        </div>
                    <div class='span4'>
                        <h3>New | Available</h3>				
                        <hr class='soft'>
                        <h5>$prod_title </h5>
                        <p>
                        $prod_desc
                        </p>
                        <a class='btn btn-small pull-right' href='product_details.php?pro_id=$prod_id'>View Details</a>
                        <br class='clr'>
                    </div>
        <div class='span3 alignR'>
            <form class='form-horizontal qtyFrm'>
            <h3> Rs.$prod_price</h3>
            <br>
            <div class='btn-group'>
            <a href='product_details.php' class='btn btn-large btn-primary'> Add to <i class=' icon-shopping-cart'></i></a>
            </div>
                </form>
        </div>
</div>
<hr class='soft'/>";
    }
}


##############################<----Fetching IP address ----->###############################################
// getting ip address
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


##############################<----ADD TO CART---->###############################################

// adding  to cart
function cart()
{
    if (isset($_GET['add_cart'])) {
        // add_cart --->add to cart index.php when someone click add to cart--->$_COOKIE
        //href='index.php?add_cart=$prod_id'
        // with product id 
        global $db;

        $p_id = $_GET['add_cart'];
        // $p_qty = $_

        $ip_add = getrealipaddres();

        // ip address function declare with variables

        $check_pro = "SELECT * FROM cart WHERE p_id = '$p_id' AND ip_add = '$ip_add'";

        $run_check = mysqli_query($db, $check_pro);

        if (mysqli_num_rows($run_check) > 0) {
            // The mysqli_num_rows() function is an inbuilt function in PHP which is used to return the number of rows present in the result set. 
            // It is generally used to check if data is present in the database or not.
            //  To use this function, it is mandatory to first set up the connection with the MySQL database.
            echo "";
        } else {
            // $q = "INSERT INTO cart(p_id,ip_add) values ('$p_id','$ip_add')";
            $q = "INSERT INTO cart(p_id,ip_add) values ('$p_id','$ip_add',)";

            echo "$q";
            // inserting cart by query
            $run_q = mysqli_query($db, $q);



            echo "<script>alert('inserted');</script>";

            // echo "<script>window.open('index.php','_self')</script>";
            // Replace the current window with a new window:
            // The open() method opens a new browser window, or a new tab, depending on your browser settings and the parameter values.

        }
    }
}
##############################<----Index ADD TO CART 2---->###############################################
function cart1()
{
    if (isset($_GET['add_cart'])) {
        // add_cart --->add to cart index.php when someone click add to cart--->$_COOKIE
        //href='index.php?add_cart=$prod_id'
        // with product id 
        global $db;

        $p_id = $_GET['add_cart'];
        // $p_qty = $_

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

        $qty = 1;

        $run_check = mysqli_query($db, $check_pro);

        if (mysqli_num_rows($run_check) > 0) {
            // The mysqli_num_rows() function is an inbuilt function in PHP which is
            //  used to return the number of rows present in the result set. 
            // It is generally used to check if data is present in the database or not.
            //  To use this function, it is mandatory to first set up the connection with 
            // the MySQL database.
            echo "";
        } else {
            // $q = "INSERT INTO cart(p_id,ip_add) values ('$p_id','$ip_add')";
            $q = "INSERT INTO cart(p_id,ip_add,qty) values ('$p_id','$ip_add',$qty)";

            echo "$q";
            // inserting cart by query
            $run_q = mysqli_query($db, $q);
            // echo "<script>alert('inserted');</script>";

            echo "<script>window.open('index.php','_self')</script>";
            // Replace the current window with a new window:
            // The open() method opens a new browser window, or a new tab, depending on your browser settings and the parameter values.

        }
    }
}


##############################<----FETCHING  NO. OF ITEMS IN CART----->###############################################
// Getting Numbers of items in cart

function items()
{
    if (isset($_GET['add_cart'])) {

        global $db;

        $ip_add = getrealipaddres();
        // getting ip address

        $get_items = "SELECT * FROM cart WHERE ip_add ='$ip_add'";
        // $get_items = "SELECT * FROM cart WHERE ip_add ='1'";
        // check same ip address
        $run_items = mysqli_query($db, $get_items);
        $count_items = mysqli_num_rows($run_items);
        // The mysqli_num_rows() function is an inbuilt function in PHP which is used to return the number of rows present in the result set. 
        // It is generally used to check if data is present in the database or not.
        //  To use this function, it is mandatory to first set up the connection with the MySQL database.

    } else {
        global $db;

        $ip_add = getrealipaddres();

        $get_items = "SELECT * FROM cart WHERE ip_add ='$ip_add'";

        $run_items = mysqli_query($db, $get_items);

        $count_items = mysqli_num_rows($run_items);
        // The mysqli_num_rows() function is an inbuilt function in PHP which is used to return the number of rows present in the result set. 
        // It is generally used to check if data is present in the database or not.
        //  To use this function, it is mandatory to first set up the connection with the MySQL database.
    }
    echo $count_items;
    // now writing
    //  <?php items(); 
    //  Itemes in your cart
}
##############################<----FETCHING  TOTAL CART Price----->###############################################


// getting total price
function total_price()
{
    $ip_add = getrealipaddres();
    // get ip add function with local variable store ip addres
    global $db;

    $total = 0;
    // initalization value starting total==0    

    $sel_price = "SELECT * FROM cart WHERE ip_add ='$ip_add'";
    // cart tble--->ip address--->detect and 

    $run_price = mysqli_query($db, $sel_price);

    while ($record = mysqli_fetch_array($run_price)) {
        // while ($record = mysqli_fetch_assoc($run_price)) {
        // mysqli_result::fetch_assoc -- mysqli_fetch_assoc — 
        // Fetch a result row as an associative array

        $pro_id = $record['p_id'];
        // fetch product_id from table which user--->selected 

        $pro_price = "SELECT * FROM products where product_id = $pro_id";
        // so now gng to product tbl-->where product_id--->$prod_id
        // this is called relation between product id
        $run_pro_price = mysqli_query($db, $pro_price);

        while ($p_price = mysqli_fetch_array($run_pro_price)) {

            // fetching array 
            $product_price = array($p_price['product_price']);
            // multiple production--->thts y array.about

            // inside array--->product_price-
            $values = array_sum($product_price);
            // array_sum()functions. inbuild functions
            // array--->sums *(product_price)
            $total += $values;
            // total values-->0
        }
    }
    echo $total;
    // .<?php total_price() 
}


##############################<----GETTING THE DEFAULT FOR CUSTOMERS----->###############################################

function getdefault()
{

    global $db;
    // stored session email if customer login--->

    // GETTING CUSTOMER ID--->STARTS HERE
    $c = $_SESSION['customer_email'];
    // query where customer_email--->saved in $c;
    $get_c = "SELECT * FROM customers WHERE customer_email= '$c'";
    // run query--->
    $run_c = mysqli_query($db, $get_c);

    $row_c = mysqli_fetch_array($run_c);
    // array
    $customer_id = $row_c['customer_id'];
    // ENDS HERE CUSTOMER ID

    // if it is not active 
    if (!isset($_GET['my_orders'])) {
        if (!isset($_GET['edit_account'])) {
            if (!isset($_GET['chng_pswd'])) {
                if (!isset($_GET['del_account'])) {

                    // $get_products = "select * from products";
                    // $run_products = mysqli_query($db, $get_products);
                    // $row_products = mysqli_fetch_array($run_products);

                    // $prod_id = $row_products['product_id'];
                    // $prod_title = $row_products['product_title'];
                    // $prod_cat = $row_products['cat_id'];
                    // $prod_brand = $row_products['brand_id'];
                    // $prod_desc = $row_products['product_desc'];
                    // $prod_price = $row_products['product_price'];
                    // $prod_img = $row_products['product_img'];
                    // $prod_img2 = $row_products['product_img1'];
                    // $prod_img3 = $row_products['product_img2'];

                    // show pending orders
                    $get_orders = "SELECT * FROM customer_orders WHERE customer_id = '$customer_id' AND order_status='pending' ";

                    $run_orders = mysqli_query($db, $get_orders);
                    // The mysqli_num_rows() function is an inbuilt function in PHP which is used to 
                    // return the number of rows present in the result set. It is generally used to check if data is present in the database or not. To use this function,
                    //  it is mandatory to first set up the connection with the MySQL database.
                    $count_orders = mysqli_num_rows($run_orders);

                    if ($count_orders > 0) {

                        // echo "<div style='padding:10px'>
                        // <h1 style='color:red'>IMPORTANT</h1>
                        // <h3>You Have $count_orders Pending Orders</h3>
                        // </div>";

                        echo " <h3 style='text-align:center;'>Pending Orders $count_orders</h3>";
                        // echo "please see orders clicking details <a href='account.php?my_orders.php'>Link</a> Or <a href='pay_offline.php'>Pay offline</a>

                        echo "<table width='750' style='color:white;background-color:blue;text-align:center;margin: auto;'>
                        <tr>
                            <td>order No</td>
                            <td>Due amount</td>
                            <td>Invoice No</td>
                            
                            <td>Order Date</td>
                            <td>Paid/unpaid</td>
                            <td>Status</td>
                        </tr>
                    ";
                    } else {
                        echo " <h3 style='text-align:center;'>No Pending orders</h3>";
                        echo "<h6 style='text-align:center;'>You can see orders history <a style='padding:5px;background-color:green;color:white;    border-radius: 25px;text-decoration:none;'href='account.php?my_orders'>history order</a></h6>";
                    }
                }
            }
        }
    }
}
?>
<!-- <div class='span2'>
                             <img src='admin-area/product-images/$prod_img' alt=''>
                         </div>
                     <div class='span4'>
                         <h3>New | Available</h3>				
//                         <hr class='soft'>
//                         <h5>$prod_title </h5>
//                         <p>
//                         $prod_desc
//                         </p>
//                         <a class='btn btn-small pull-right' href='product_details.php?pro_id=$prod_id'>View Details</a>
//                         <br class='clr'>
//                     </div>
//         <div class='span3 alignR'>
//             <form class='form-horizontal qtyFrm'>
//             <h3> Rs.$prod_price</h3>
//             <br>
//             <div class='btn-group'>
//             <a href='product_details.html' class='btn btn-large btn-primary'> Add to <i class=' icon-shopping-cart'></i></a>
//             </div>
//                 </form>
//         </div> -->