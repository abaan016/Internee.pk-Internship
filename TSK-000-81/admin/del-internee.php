<?php

$interneeId = $_GET['id'];

require_once 'config.php';

$query = "DELETE FROM `tbl_internees` WHERE Internee_Id = '$interneeId'";
$result = mysqli_query($conn, $query);

header('Location:sub-index.php');
?>
