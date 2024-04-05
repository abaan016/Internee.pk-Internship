<?php
include "header.php";
include "config.php";
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Add Products </h1>
                    <!-- Content Row -->
                    <div class="container">
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="text" class="form-control mt-3 " name="txtPn" placeholder="Product Name">
                            <input type="number" class="form-control mt-3 " name="txtPp" placeholder="Product Price">
                            <textarea class="form-control mt-3 " name="txtPd" col="30" rows="10" placeholder="Product description"></textarea>                         
                            <input type="file" class="form-control mt-3" name="txtt" >
                            <select class="form-control mt-3 " name="txtcid">
                            <?php
							  $select=mysqli_query($con,"select *from tblcat");
							  foreach($select as $data)
							  {
								echo 
								"
                                <option value=$data[Cid]>$data[Cname]</option>

								";
							  }
							?>
                            </select>
                            <input type="submit" value="Add Product" class="btn btn-info mt-3 " name="txtaddproduct">
                        </form>
                        <?php
                        if(isset($_POST["txtaddproduct"]))
                        {
                            $n=$_POST['txtPn'];
                            $Pp=$_POST['txtPp'];
                            $d=$_POST['txtPd'];

                            $fname=$_FILES['txtt']['name'];
                            $cid=$_POST['txtcid'];

                            $tmpname=$_FILES['txtt']['tmp_name'];
                            move_uploaded_file($tmpname,"Images/".$fname);

                            $insert=mysqli_query($con,"insert into tblproduct values('null','$n','$Pp','$d','$fname','$cid')");
                            if($insert>0)
                            {
                                echo "Product Add";
                            }
                            else
                            {
                                echo "Product Not Add";
                            }
                        }
                        ?>

                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>

            <!-- End of Main Content -->

<?php
include "footer.php";
?>