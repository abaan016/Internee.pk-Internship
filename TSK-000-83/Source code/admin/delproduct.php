<?php
include 'config.php';

$id=$_GET['A'];

$del=mysqli_query($con,"delete from tblproduct where Pid='$id'");
if ($del) 
{
    header("location:viewproduct.php");
}
else 
{
    echo "Error deleting record";
}

?>
