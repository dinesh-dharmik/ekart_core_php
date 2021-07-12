<?php include "includes/db.php";


// If admin click on delete--->then here passing delete_pro variabl
if(isset($_GET['delete_pro'])){

    // declare delete with php variable
    $delete_id =   $_GET['delete_pro'];

    $delete_pro = "DELETE FROM products WHERE product_id = '$delete_id' ";


    $run_del = mysqli_query($con,$delete_pro);

    if($run_del){

        echo "<script>alert('One product has been Deleted Successfully!')</script>";
        echo "<script>window.open('dashboard.php?view_products','_self')</script>";


    }
}


?>