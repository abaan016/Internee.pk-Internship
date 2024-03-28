<?php 

session_start();

session_destroy();
session_unset();
header("refresh:0.2,url='index.php'");

?>