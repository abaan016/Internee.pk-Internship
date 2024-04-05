<?php
include "header.php";
include "config.php";
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">User contact </h1>
                    <!-- Content Row -->
                    <table class="table table-dark ">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            $select=mysqli_query($con, "select * from tblcontact");
                            foreach($select as $data)
                            {
                                echo
                                 "
                                 <tr>
                                 <td>$data[name]</td>
                                 <td>$data[email]</td>
                                 <td>$data[subject]</td>
                                 <td>$data[message]</td>
                                 
                                 
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