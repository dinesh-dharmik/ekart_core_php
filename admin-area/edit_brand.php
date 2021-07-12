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
    <?php if (isset($_GET['edit_brand'])) { ?>

        <h4 style="text-align: center">Brands</h4>
        <!-- form -->
        <form action="" method="POST" style="    text-align: center;
    height: 51px;">
            <input type="text" name="brand_title1">
            <input type="submit" name="insert_brand" value="Add New Brand" />
        </form>

        <!-- table -->
        <table class="table">
            <thead class="thead-dark" style="text-transform:capitalize;">
                <tr>
                    <th scope="col">Brand No</th>
                    <th scope="col">Brand Title</th>
                    <!-- <th scope="col">Edit Category</th> -->
                    <th scope="col">Delete brand</th>
                </tr>
            </thead>
            <?php
            include "includes/db.php";

            $i = 0;
            $get_brand =  "SELECT brand_id ,brand_title FROM Brands";

            $run_brand = mysqli_query($con, $get_brand);

            while ($row_brand = mysqli_fetch_array($run_brand)) {

                $b_id = $row_brand['brand_id'];
                $b_title = $row_brand['brand_title'];

                $i++;

            ?>
                <tbody>
                    <tr>
                        <th scope="row"><?php echo $i; ?></th>
                        <td><?php echo $b_title; ?></td>

                        <td><a href="del_cats.php?del_brand=<?php echo $b_id ?>">Delete</a></td>

                        </td>

                    </tr>
                <?php }

                ?>

                </tbody>


        </table>

    <?php } ?>



    <!-- Insert category-->
    <?php

    include "includes/db.php";


    if (isset($_POST['insert_brand'])) {

        $cat_title = $_POST['brand_title1'];

        $insert_brands = "INSERT INTO brands (brand_title) values ('$brand_title')";

        $run_br = mysqli_query($con, $insert_brands);

        if ($run_br) {

            echo "<script>alert('New Brand Has Been Inserted!')</script>";

            echo "<script>window.open('dashboard.php?edit_brand','_self')</script>";
        }
    }



    ?>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>