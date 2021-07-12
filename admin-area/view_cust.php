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
    <?php if (isset($_GET['view_cust'])) { ?>

        <h4 style="text-align: center">View All Customers</h4>
        <table class="table">
            <thead class="thead-dark" style="text-transform:capitalize;">
                <tr>
                    <th scope="col">Sr No</th>
                    <th scope="col">Customer Fullname</th>
                    <th scope="col">Customer Email</th>
                    <!-- <th scope="col">Customer Pass</th> -->
                    <th scope="col"> Address 1</th>
                    <th scope="col"> Address 2</th>
                    <th scope="col"> City</th>
                    <th scope="col"> State</th>
                    <th scope="col"> Pincode</th>
                    <th scope="col"> Country</th>
                    <!-- <th scope="col">Customer Info</th> -->
                    <th scope="col"> Phone No</th>
                    <th scope="col">Delete</th>

                    <!-- <th scope="col">Customer IP</th> -->
                </tr>
            </thead>
            <?php
            include "includes/db.php";

            // intitlaztion from 0 the serial no
            $i = 0;
            $get_cust = "select * from customers";
            $run_cust = mysqli_query($con, $get_cust);

            // In loop fetch array.

            // Here fetching all products with specific product_id
            while ($row_cu = mysqli_fetch_array($run_cust)) {

                $c_id = $row_cu['customer_id'];
                $c_fname = $row_cu['customer_fullname'];
                $c_email = $row_cu['customer_email'];
                // $c_pass = $row_cu['customer_pass'];
                $c_add = $row_cu['customer_add'];
                $c_address = $row_cu['customer_address'];
                $c_city = $row_cu['customer_city'];
                $c_state = $row_cu['customer_state'];
                $c_code = $row_cu['customer_code'];
                $c_country = $row_cu['customer_country'];
                $c_phone = $row_cu['customer_phone'];
                // $c_ip = $row_cu['customer_ip'];


                $i++;


            ?>
                <tbody>
                    <tr>
                        <th scope="row"><?php echo $i; ?></th>
                        <td><?php echo $c_fname; ?></td>
                        <td><?php echo $c_email; ?></td>
                        <!-- <td><?php echo $c_pass; ?></td> -->
                        <td><?php echo $c_add; ?></td>
                        <td><?php echo $c_address; ?></td>
                        <td><?php echo $c_city; ?></td>
                        <td><?php echo $c_state; ?></td>
                        <td><?php echo $c_code; ?></td>
                        <td><?php echo $c_country; ?></td>
                        <!-- <td><?php echo $c_info; ?></td> -->
                        <td><?php echo $c_phone; ?></td>
                        <!-- <td> -->
                        <?php
                        // echo $c_city;
                        ?>
                        <!-- </td> -->

                        <!-- showing pending order details in count sold  -->
                        <!-- Now here redirection of del_prd  -->
                        <td><a href="del_prd.php?delete_cust=<?php echo "$c_id"; ?>">Delete</a></td>
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