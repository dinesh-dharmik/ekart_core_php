<?php include "includes/db.php";


// If admin click on delete--->then here passing delete_pro variabl
if (isset($_GET['del_brand'])) {

    // declare delete with php variable
    $delete_id =   $_GET['del_brand'];

    

    $delete_pro = "DELETE FROM brands WHERE brand_id = '$delete_id' ";

    $run_del = mysqli_query($con, $delete_pro);

    if ($run_del) {

        echo "<script>alert('One Brand has been Deleted Successfully!')</script>";

        echo "<script>window.open('dashboard.php?edit_brand','_self')</script>";
    } else {
        echo "failed";
    }
}
