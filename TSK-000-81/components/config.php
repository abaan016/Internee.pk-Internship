<?php 

// Tittle 
$title = "Internee.pk | PAKISTAN'S VIRTUAL INTERNSHIP PROGRAM";


$conn = new mysqli("localhost", "root", "", "db_internee.pk");

if($conn->connect_error)
{
    echo "<h1>Server Error</h1>";
}

?>