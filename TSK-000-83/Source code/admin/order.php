<?php
    include "header.php";
    include "config.php";

    ?>

                    
                        <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <h1 class="h3 mb-4 text-gray-800">view Orders</h1>
                        <!-- Content Row -->
                        <table class="table table-dark ">
                            <thead>
                            <tr>
                                
                                <th>Name</th>
                                <th>Phone #</th>
                                <th>Address</th>
                                
                                <th>Product Title</th>
                                <th>Product Price</th>
                                <th>Product Image</th>
                                <th>Product Payment</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                $select=mysqli_query($con, "select * from orders");
                                foreach($select as $data)
                                {
                                    echo
                                    "
                                    <tr>
                                    
                                    <td>$data[name]</td>
                                    <td>$data[email]</td>
                                    
                                    <td>$data[address]</td>
                                    
                                    <td>$data[product_title]</td>
                                    <td>$data[price]</td>
                                    <td>$data[image]</td>
                                    
                                    <td>$data[payment]</td>
                                    
                                   
                                
                                    
                                    <td>
                                    <a href='delorder.php?A=$data[id]' class='btn btn-danger'>Delete</a>
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