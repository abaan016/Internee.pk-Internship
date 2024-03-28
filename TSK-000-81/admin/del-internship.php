<?php

$internshipId = $_GET['id'];

require_once 'config.php';

$query = "DELETE FROM `internships` WHERE Id = '$internshipId'";
$result = mysqli_query($conn, $query);

header('Location:internships.php');
?>
