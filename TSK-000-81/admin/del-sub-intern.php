<?php

$subinternid = $_GET['id'];

require_once 'config.php';

$query = "DELETE FROM `sub_interns` WHERE subId = '$subinternid'";
$result = mysqli_query($conn, $query);

header('Location:sub-internships.php');
?>
