<?php

$revId = $_GET['id'];

require_once 'config.php';

$query = "DELETE FROM `sub_interns` WHERE Id = '$revId'";
$result = mysqli_query($conn, $query);

header('Location:sub-index.php');
?>
