<?php

include "includes/db.php";

include "functions.php";

// geting cutomer id
// this c_id--->customer_id from payment.option.php 
if (isset($_GET['c_id'])) {

    $customer_id = $_GET['c_id'];

    $c_email = "SELECT * FROM customers WHERE customer_id = '$customer_id'";

    $run_email = mysqli_query($con, $c_email);

    // echo "$run_email";
    
    $r_em = mysqli_fetch_array($run_email);

    $customer_email = $r_em['customer_email'];

    $customer_fname = $r_em['customer_fullname'];
}
##############################<----Getting Product price and No.----->###############################################

// get ip add function with local variable store ip addres
$ip_add = getrealipaddres();

// initalization value starting total==0    
$total = 0;

// cart tble--->ip address--->detect and 
$checkip = "SELECT * FROM cart WHERE ip_add ='$ip_add'";

$run_ip = mysqli_query($db, $checkip);

// status pending
$status = 'pending';

// random invoice mt function php
$invoice_no = mt_rand();

// check data present in db or not
$count_pro = mysqli_num_rows($run_ip);

// while ($record = mysqli_fetch_assoc($run_price)) {
// mysqli_result::fetch_assoc -- mysqli_fetch_assoc — 
// Fetch a result row as an associative array
while ($record = mysqli_fetch_array($run_ip)) {
    // fetch product_id from table which user--->selected 
    $pro_id = $record['p_id'];
    // so now gng to product tbl-->where product_id--->$prod_id
    // this is called relation between product id
    $pro_price = "SELECT * FROM products where product_id = $pro_id";

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
// echo $total;



##############################<----Getting qty from product----->###############################################

$get_cart = "SELECT * FROM cart WHERE ip_add = '$ip_add'";

$run_cart = mysqli_query($con, $get_cart);

$get_qty = mysqli_fetch_array($run_cart);
// fetching cart qty value and saved in local variables
$qty = $get_qty['qty'];

if ($qty == 0) {

    $qty = 1;
    $sub_total = $total;
} else {
    $qty = $qty;

    $sub_total = $total * $qty;
}

// inserting customer order in tbl with sql
$insert_order = "INSERT INTO customer_orders 
(order_id,customer_id,due_amount,invoice_no,total_products,order_date,order_status)
 VALUES 
('','$customer_id','$sub_total','$invoice_no','$count_pro',NOW(),'$status')";

$run_order = mysqli_query($con, $insert_order);


// if (!$run_order) {
//     printf("Error: %s\n", mysqli_error($con));
//     exit();
// }
// if ($run_order) {

echo "<script>alert('Order Successfull thanks!')</script>";


// if (!$run_query) {
//     printf("Error: %s\n", mysqli_error($con));
//     exit();
// }


$insert_to_pending_orders = "INSERT INTO pending_orders
 (order_id,customer_id,invoice_no,product_id,qty,order_status)
 VALUES 
('','$customer_id','$invoice_no','$pro_id','$count_pro','$status')";

$run_pending_query = mysqli_query($con, $insert_to_pending_orders);

// if (!$run_pending_query) {
//     printf("Error: %s\n", mysqli_error($con));
//     exit();
// }
//     else {
//     echo "error";
// }

$empty_cart = "DELETE from cart where ip_add = '$ip_add'";

$run_query = mysqli_query($con, $empty_cart);


// $from = 'admin@ekart.com';

// $subject = '[Ekart] Order Details';
// $message = "<html>
// <h4>Hello $customer_fname</h4>
// <p>Thank you for your order. We’ll send a confirmation when your order ships. 
// Your estimated delivery date is indicated below. If you would like to view the status of
//  your order or make any changes to it, please visit Your Orders on Amazon.in.</p>
 
 
//  </html>
//  ";
// // mail 4 parameter with MAIL
// mail($c_email, $subject, $message, $from);

// echo "<script>alert('password is sent to your email, Please check your Inbox')</script>";
// echo "<script>window.open('checkout.php','_self')</script>";

echo "<script>window.open('index.php','_self')</script>";
