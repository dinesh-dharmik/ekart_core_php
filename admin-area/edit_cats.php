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
    <?php if (isset($_GET['edit_category'])) { ?>

        <h4 style="text-align: center">Categories</h4>
        <!-- form -->
        <form action="" method="POST" style="text-align: center;
    height: 51px;">
            <input type="text" id="addcat" name="cat_title1">
            <input type="submit" onclick="myfun" name="insert_cat" value="Add New Category" />
        </form>

        <!-- table -->
        <table class="table">
            <thead class="thead-dark" style="text-transform:capitalize;">
                <tr>
                    <th scope="col">Category No</th>
                    <th scope="col">Category Title</th>
                    <!-- <th scope="col">Edit Category</th> -->
                    <th scope="col">delete Category</th>
                </tr>
            </thead>
            <?php
            include "includes/db.php";

            $i = 0;
            $get_cat =  "SELECT cat_id ,cat_title FROM categories";

            $run_cat = mysqli_query($con, $get_cat);

            while ($row_cat = mysqli_fetch_array($run_cat)) {

                $c_id = $row_cat['cat_id'];
                $c_title = $row_cat['cat_title'];

                $i++;

            ?>
                <tbody>
                    <tr>
                        <th scope="row"><?php echo $i; ?></th>
                        <td><?php echo $c_title; ?></td>

                        <td><a href="del_cats.php?del_category=<?php echo $c_id ?>">Delete</a></td>

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


    if (isset($_POST['insert_cat'])) {

        $cat_title = $_POST['cat_title1'];

        $insert_cate = "INSERT INTO categories (cat_title) values ('$cat_title')";

        $run_cat = mysqli_query($con, $insert_cate);


        if ($run_cat) {

            echo "<script>alert('New Category Has Been Inserted!')</script>";

            echo "<script>window.open('dashboard.php?edit_category','_self')</script>";
        }
    }

    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script type="text/javascript">
        function myfun() {
            if ("#addcat") {

            }
            document.getElementById("addcat") = "";
        }
    </script>
</body>

</html>