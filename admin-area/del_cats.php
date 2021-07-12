<?php include "includes/db.php";


// If admin click on delete--->then here passing delete_pro variabl
if (isset($_GET['del_category'])) {

    // declare delete with php variable
    $delete_id =   $_GET['del_category'];


    $delete_pro = "DELETE FROM categories WHERE cat_id = '$delete_id' ";

    $run_del = mysqli_query($con, $delete_pro);

    if ($run_del) {

        echo "<script>alert('One category has been Deleted Successfully!')</script>";

        echo "<script>window.open('dashboard.php?edit_category','_self')</script>";
    } else {
        echo "failed";
    }
}
