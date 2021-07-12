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
    <!-- so now when we clicked view_all products -->
    <!-- If view products pass in url by ?view_products -->
    <?php if (isset($_GET['view_products'])) { ?>

        <h4 style="text-align: center">View All Products</h4>
        <table class="table">
            <thead class="thead-dark" style="text-transform:capitalize;">
                <tr>
                    <th scope="col">Product No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total Sold</th>
                    <th scope="col">Status</th>
                    <th scope="col">edit</th>
                    <th scope="col">delete</th>
                </tr>
            </thead>
            <?php
            include "includes/db.php";

            // intitlaztion from i= 0 the serial no
            $i = 0;
            $get_pro = "select * from products";
            $run_pr = mysqli_query($con, $get_pro);

            // In loop fetch array.

            // Here fetching all products with specific product_id
            while ($row_pro = mysqli_fetch_array($run_pr)) {

                $p_id = $row_pro['product_id'];
                $p_title = $row_pro['product_title'];
                $p_img = $row_pro['product_img'];
                $p_price = $row_pro['product_price'];


                $i++;


            ?>
                <tbody>
                    <tr>
                        <th scope="row"><?php echo $i; ?></th>
                        <td><?php echo $p_title; ?></td>
                        <td><img src="product-images/<?php echo $p_img ?>" width="60" height="60"></td>
                        <td><?php echo $p_price; ?></td>

                        <!-- showing pending order details in count sold  -->
                        <td>
                            <?php
                            $get_sold = "SELECT * FROM pending_orders where product_id = '$p_id'";

                            $run_sold = mysqli_query($con, $get_sold);

                            $count = mysqli_num_rows($run_sold);

                            echo $count;

                            ?>


                        </td>
                        <td>
                            <!-- showing pending order values in details in database pending -->
                            <?php
                            $get_status = "SELECT * FROM pending_orders where product_id = '$p_id'";

                            $run_status = mysqli_query($con, $get_status);

                            $status = mysqli_fetch_array($run_status);

                            // $ps = $status['order_status'];

                            // if there is no pending then no sold;
                            if ($status) {
                                $ps = $status['order_status'];
                                echo $ps;
                            } else {
                                echo "Not sold";
                            }

                            // if (!$row) {
                            //     printf("Error: %s\n", mysqli_error($con));
                            //     // exit();
                            // }
                            // $status = $row['invoice'];
                            // echo '$status';

                            ?>

                        </td>


                        <!-- Edit products includes edit_prd.php -->
                        <td><a href="edit_prd.php?edit_prd=<?php echo "$p_id"; ?>">Edit</a></td>
                        <!-- Now here redirection of del_prd  -->
                        <td><a href="del_prd.php?delete_pro=<?php echo "$p_id"; ?>">Delete</a></td>
                    </tr>
                <?php }

                ?>

                </tbody>

        </table>

    <?php } ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>