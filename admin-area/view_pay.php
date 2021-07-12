<?php include "includes/db.php" ?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Ekart Admin</title>
    <style>
        .table {
            width: 0 !important;
            margin: auto;
        }

        th,
        td {
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- If view products pass in url by ?view_products -->
    <?php if (isset($_GET['view_pay'])) { ?>

        <h4 style="text-align: center">View All Orders</h4>
        <table class="table">
            <thead class="thead-dark" style="text-transform:capitalize;">
                <tr>
                    <th scope="col">Payment No</th>
                    <th scope="col"> Email</th>
                    <!-- <th scope="col">Due Amount</th> -->
                    <th scope="col">Due Amount</th>
                    <!-- <th scope="col"> Qty</th> -->
                    <th scope="col"> Status</th>
                    <th scope="col"> Delete</th>

                </tr>
            </thead>
            <?php
            include "includes/db.php";

            // intitlaztion from 0 the serial no
            $i = 0;
            $get_orders = "select * from pending_orders";
            $run_orders = mysqli_query($con, $get_orders);

            // In loop fetch array.

            // Here fetching all products with specific product_id
            while ($row_or = mysqli_fetch_array($run_orders)) {

                $o_id = $row_or['order_id'];
                $c_id = $row_or['customer_id'];
                // $due_amount = $row_or['due_amount'];
                // $customer = $row_or['customer_id'];
                $invoice = $row_or['invoice_no'];
                $pr_id = $row_or['product_id'];
                $o_qty = $row_or['qty'];
                $o_status = $row_or['order_status'];

                $i++;



            ?>


                <tbody>
                    <tr>
                        <th scope="row"><?php echo $i; ?></th>
                        <td><?php
                            $get_cut =  "SELECT * FROM customers WHERE customer_id = '$c_id'";

                            $run_cut = mysqli_query($con, $get_cut);

                            $row_cut = mysqli_fetch_array($run_cut);

                            $cut_id = $row_cut['customer_id'];

                            $cust_email = $row_cut['customer_email'];


                            echo "$cust_email";


                            // echo $o_id;
                            ?></td>
                        <td><?php

                                    $getco = "SELECT * FROM customer_orders WHERE customer_id = '$c_id'";

                                    $quer = mysqli_query($con, $getco);

                                    $rs = mysqli_fetch_array($quer);

                                    $due_amount = $rs['due_amount'];

                                    echo $due_amount; ?></td>
                        <!-- <td><?php echo $c_id; ?></td>
                        <td><?php echo $invoice; ?></td>
                        <td><?php echo $pr_id; ?></td> -->
                        <!-- <td><?php echo $o_qty; ?></td> -->
                        <td><?php

                            if ($o_status == 'pending') {
                                echo $o_status = 'pending';
                            } else {
                                echo $o_status = 'complete';
                            }

                            ?></td>

                        <?php
                        // echo $c_city;
                        ?>
                        <!-- </td> -->

                        <!-- showing pending order details in count sold  -->
                        <!-- Now here redirection of del_prd  -->
                        <td><a href="del_order.php?delete_order=<?php echo "$o_id"; ?>">Delete</a></td>

                    </tr>
                <?php }
                ?>

                </tbody>

        </table>

    <?php } else {
        echo "No payment data";
    }
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>