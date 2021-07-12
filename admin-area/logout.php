<?php
session_start();


session_destroy();

echo "<script>window.open('index.php?logout=You sucessfully logged out,come back soon!','_self')</script>"






?>