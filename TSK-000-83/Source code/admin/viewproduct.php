<?php
include "header.php";
include "config.php";
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">viewproduct</h1>
                    <!-- Content Row -->
                    <table class="table table-dark ">
                        <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product description</th>
                            <th>Product Images</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            $select=mysqli_query($con, "select * from tblproduct");
                            foreach($select as $data)
                            {
                                echo
                                 "
                                 <tr>
                                 <td>$data[Pid]</td>
                                 <td>$data[Pname]</td>
                                 <td>$data[Pprice]</td>
                                 <td>$data[Pdescription]</td>
                                 <td>$data[Pimage]</td>
                                 <td>
                                 <a href='delproduct.php?A=$data[Pid]' class='btn btn-danger'>Delete</a>
                                 </td>
                                 </tr>
                                 ";
                            }
                            ?>
                        </tbody>
                    </table>

                    <!-- Content Row -->


                </div>
                <!-- /.container-fluid -->

            </div>

            <!-- End of Main Content -->

<?php
include "footer.php";
?>