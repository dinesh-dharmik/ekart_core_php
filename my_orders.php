<?php

include "includes/db.php";
// include "functions.php";




getdefault();



// GETTING CUSTOMER ID--->START HERE
if (!isset($_SESSION['customer_email'])) {

    // echo "<script>alert('login first');</script>";
    echo "<script>window.open('cust_login.php','_self')</script>";

}

$c = $_SESSION['customer_email'];
// query where customer_email--->saved in $c;
$get_c = "SELECT * FROM customers WHERE customer_email= '$c'";
// run query--->
$run_c = mysqli_query($db, $get_c);

$row_c = mysqli_fetch_array($run_c);
// array
$customer_id = $row_c['customer_id'];

// ENDS HERE CUSTOMER ID

?>



<div style="display: flex;margin-top:20px;">
    <table width="650" align="center" style="color:white;background-color:blue;text-align:center;">
        <tr>
            <td>order No</td>
            <td>Due amount</td>
            <td>Invoice No</td>
            <td>total products</td>
            <td>Order Date</td>
            <td>Paid/unpaid</td>
            <td>Status</td>
        </tr>
        <?php

        $get_order = "SELECT * FROM customer_orders WHERE customer_id='$customer_id'";

        $run_order = mysqli_query($con, $get_order);
        // order id serail no so
        $i = 0;

        while ($row_orders = mysqli_fetch_array($run_order)) {

            $order_id = $row_orders['order_id'];
            $due_amount = $row_orders['due_amount'];
            $invoice_no = $row_orders['invoice_no'];
            $order_id = $row_orders['order_id'];
            $product = $row_orders['total_products'];
            $date = $row_orders['order_date'];
            $status = $row_orders['order_status'];

            if ($status == 'pending') {
                $status = 'unpaid';
            } else {

                $status = 'paid';
            }

            $i++;
            echo "<tr align=center;>
        <td>$i</td>
        <td>$due_amount</td>
        <td>$invoice_no</td>
        
        <td>$date</td>
        <td>$status</td>
        <td><a href='confirm.php' style='color:white;'>confirm if paid</a></td>
        </tr>";
        }

        ?>


    </table>
</div>
<!-- <div style="    display: flex;
    justify-content: space-between;background-color:#dcd4d4;    margin: 0 0 13px;">
    <div>
        <p style="padding: 10px 0 0 14px;">Order Placed</p>
        <p style="padding: 10px 0 0 14px;">date</p>
    </div>
    <div>
        <p style="    padding: 10px 10px 0 0;">Order No</p>

    </div>
</div>
<div class="main-wrapper" style="display: flex">
    <img src='admin-area/product-images/$prod_img' alt='' style="width:10%;">
    <div style="width: 45%">
        <p>title</p>
        <p>desc</p>
        <p>amount</p>
        <p>Buy Again</p>
    </div>

    <div style="width: 45%;text-align:right;">
        <p></p>
        <p>status-</p>
        <p>Ask product question</p>
        <p>Feedback</p>

    </div>
</div> -->
<!-- <div class='span2'>
    <img src='admin-area/product-images/$prod_img' alt=''>
</div>
<p>Order No</p>
<div class='span4'>
    <p>Order No.</p>
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
            <a href='product_details.html' class='btn btn-large btn-primary'> Add to <i class=' icon-shopping-cart'></i></a>
        </div>
    </form>
</div> -->