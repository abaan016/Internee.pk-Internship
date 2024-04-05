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
                            <th>category ID</th>
                            <th>Cateyory Name</th>
                            <th>Status</th>
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
                                 <td>$data[Cid]</td>
                                 <td>$data[Cname]</td>
                                 <td>$data[Status]</td>
                                 <a href='delcategory.php?A=$data[Cid]' class='btn btn-danger'>Delete</a>
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