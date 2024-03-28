<?php

$msgId = $_GET['id'];

require_once 'config.php';

$query = "DELETE FROM `tbl_contact` WHERE Id = '$msgId'";
$result = mysqli_query($conn, $query);

header('Location:message.php');
?>
