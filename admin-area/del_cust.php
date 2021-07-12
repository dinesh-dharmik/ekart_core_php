<?php include "includes/db.php";


// If admin click on delete--->then here passing delete_pro variabl
if (isset($_GET['delete_cust'])) {

    // declare delete with php variable
    $delete_id =   $_GET['delete_cust'];

    

    $delete_pro = "DELETE FROM customers WHERE customer_id = '$delete_id' ";

    $run_del = mysqli_query($con, $delete_pro);

    if ($run_del) {

        echo "<script>alert('One customer has been Deleted Successfully!')</script>";

        echo "<script>window.open('dashboard.php?view_cust','_self')</script>";
    } else {
        echo "failed";
    }
}
