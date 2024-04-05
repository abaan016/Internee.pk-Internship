<?php

include 'header.php';
include 'config.php';
session_start();
?>
<?php
if(isset($_GET['A']))
{
  $cid=$_GET['A'];
  $delete=mysqli_query($con,"delete from tblcart where CartId='$cid'");
  echo "Product Deleted Successfully";
}


?>


  <!--================Home Banner Area =================-->
  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>Cart Products</h2>
              <p>Home <span>-</span>Cart Products</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->

  <!--================Cart Area =================-->
  <section class="cart_area padding_top">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                <?php
                $select=mysqli_query($con,"select * from tblproduct join tblcart on tblcart.pid=tblproduct.PId");
                foreach($select as $data)
                {
                ?>
             <tr>
                <td>
                  <div class="media">
                    <div class="d-flex">
                      <img src="<?php echo "admin/Images/".$data['Pimage'] ?>" width=50 height="50" alt="" />
                    </div>
                    <div class="media-body">
                      <p><?php echo $data['Pname'] ?></p>
                    </div>
                  </div>
                </td>
                <td>
                  <h5><?php echo $data['Pprice'] ?></h5>
                </td>
     
                <td>
                <a href="cart.php?A=<?php echo $data['CartId']?>"  class="btn btn-danger" >Delete</a>
                </td>
              </tr>

                <?php
                }

                ?>
             

              <tr>
               
                <td>
                  <h5>Subtotal</h5>
                </td>
                  <?php
                  $ip=$_SERVER['REMOTE_ADDR'];
                  $select=mysqli_query($con,"select sum(Pprice) from tblcart where IP_Address='$ip'");
                  $data=mysqli_fetch_assoc($select);
                  ?>
                <td>
                  <h5>
                    <?php
                    $_SESSION['sub_total']=$data['sum(Pprice)'];
                    echo  $_SESSION['sub_total'];
                   
                   ?></h5>
                </td>
                <td>
                  <a href="index.php" class="btn btn-info">Continue Shopping</a>
                </td>
                <td>
                  <a href="checkout.php" class="btn btn-warning">Proceed to Checkout</a>
                </td>
              </tr>
              
            </tbody>
          </table>
          <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="#">Continue Shopping</a>
            <a class="btn_1 checkout_btn_1" href="#">Proceed to checkout</a>
          </div>
        </div>
      </div>
  </section>
  <!--================End Cart Area =================-->


<?php
include 'footer.php';
?>