<?php
include 'config.php';

$id=$_GET['A'];

$del=mysqli_query($con,"delete from tblcat where Cid='$id'");
if ($del) 
{
    header("location:viewcategory.php");
}
else 
{
    echo "Error deleting record";
}

?>
