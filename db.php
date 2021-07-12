<?php

// $con = mysqli_connect("sql307.epizy.com", "epiz_25559596_ekartt", "y5dhg236", "epiz_25559596_ekartt");

// $c = mysqli_connect("sql307.epizy.com", "epiz_25559596", "y5dhg236", "epiz_25559596_ekartt");

// $cw = mysqli_connect("localhost", "epiz_25559596_ekartt", "y5dhg236", "epiz_25559596_ekartt");

// $cs = mysqli_connect("ekarrtt.epizy.com", "epiz_25559596_ekartt", "y5dhg236", "epiz_25559596_ekartt");

// $w = mysqli_connect("ekarrtt.epizy.com", "epiz_25559596", "y5dhg236", "epiz_25559596_ekartt");

// $w = mysqli_connect("localhost", "epiz_25559596_ekartt", "y5dhg236", "epiz_25559596_ekartt");



// if ($con) {
//     echo "connected";
// } else {
//     echo "not-connected";
// }


// if ($c) {
//     echo "connected";
// } else {
//     echo "not-connected";
// }

// if ($cw) {
//     echo "connected";
// } else {
//     echo "not-connected";
// }



// if ($cs) {
//     echo "connected";
// } else {
//     echo "not-connected";
// }


// if ($w) {
//     echo "connected";
// } else {
//     echo "not-connected";
// }
// <?php
$servername = "sql307.epizy.com";
$database = "epiz_25559596_ekartt";
$username = "epiz_25559596";
$password = "y5dhg236";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if ($conn) {
    // echo "connected";
} else {
    echo "Not Connected ";
}


?>
<!-- // mysqli_close($conn); -->