<?php
include "header.php";
include 'config.php';
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Add Categroy </h1>
                    <!-- Content Row -->
                    <div class="container">
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="text" class="form-control mt-3 " name="txtcname" placeholder="Product Name">
                            <select name="txtstatus"  class="form-control mt-3 ">
                                <option>yes</option>
                                <option>No</option>
                            </select>
                            <input type="submit" value="Add categroy" class="btn btn-info mt-3 " name="txtaddcat">
                        </form>
                        <?php
                        if(isset($_POST["txtaddcat"]))
                        {
                            $cn=$_POST['txtcname'];
                            $cstatus=$_POST['txtstatus'];

                            $insert=mysqli_query($con,"insert into tblcat values('null','$cn','$cstatus')");
                            if($insert>0)
                            {
                                echo "Categroy Add";
                            }
                            else
                            {
                                echo "Categroy Not Add";
                            }
                        }
                        ?>

                    <!-- Content Row -->


                </div>
                <!-- /.container-fluid -->

            </div>

            <!-- End of Main Content -->

<?php
include "footer.php";
?>