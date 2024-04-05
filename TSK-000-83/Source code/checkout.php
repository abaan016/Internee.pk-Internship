<?php
include 'header.php';
include 'config.php';
session_start();    
?>
<style>
   .bill{
        height: inherit;
        border: solid 5px;
        border-radius: 5px;
    }
</style>
  <!--================Home Banner Area =================-->
  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>Product Checkout</h2>
              <p>Home <span>-</span> Shop Single</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->

  <!--================Checkout Area =================-->
  <section class="checkout_area padding_top">
    <div class="container">
      <div class="returning_customer">
        <div class="check_title">
          <h2>
            Returning Customer?
            <a href="#">Click here to login</a>
          </h2>
        </div>
        <p>
          If you have shopped with us before, please enter your details in the
          boxes below. If you are a new customer, please proceed to the
          Billing & Shipping section.
        </p>
        <form class="row contact_form" action="#" method="post">
          <div class="col-md-6 form-group p_star bill">
            <input type="text" class="form-control" id="name" name="name" value=" " />
            <span class="placeholder" data-placeholder="Username or Email"></span>
          </div>
          <div class="col-md-6 form-group p_star bill">
            <input type="password" class="form-control" id="password" name="password" value="" />
            <span class="placeholder" data-placeholder="Password"></span>
          </div>
          <div class="col-md-12 form-group">
            <button type="submit" value="submit" class="btn_3 btn btn-success">
              log in
            </button>
            <div class="creat_account">
              <input type="checkbox" id="f-option" name="selector" />
              <label for="f-option">Remember me</label>
            </div>
            <a class="lost_pass" href="#">Lost your password?</a>
          </div>
        </form>
      </div>
     
      <div class="billing_details ">
        <div class="row">
          <div class="col-lg-8">
            <h3>Billing Details</h3>
            <form class="row contact_form" action="#" method="post" >
              <div class="col-md-6 form-group p_star bill">
                <input type="text" class="form-control" id="first" name="txtn" />
                <span class="placeholder" data-placeholder="First name"></span>
              </div>
              
              <div class="col-md-6 form-group p_star bill">
                <input type="text" class="form-control" id="number" name="txtpn" />
                <span class="placeholder" data-placeholder="Phone number"></span>
              </div>
              <div class="col-md-6 form-group p_star bill">
                <input type="text" class="form-control" id="email" name="txte" />
                <span class="placeholder" data-placeholder="Email Address"></span>
              </div>
            
              <div class="col-md-12 form-group p_star bill">
                <input type="text" class="form-control" id="add1" name="txtadd" />
                <span class="placeholder" data-placeholder="Address line 01"></span>
              </div>       
              <div class="col-md-12 form-group p_star bill">
                <input type="text" class="form-control" id="add2" name="txtadd" />
                <span class="placeholder" data-placeholder="Address line 02"></span>
              </div>       
              <div class="col-md-12 form-group p_star bill">
                <input type="text" class="form-control" id="city" name="txtcity" />
                <span class="placeholder" data-placeholder="City"></span>
              </div>       
              <div class="col-md-12 form-group p_star bill">
                <input type="text" class="form-control" id="state" name="txtstate" />
                <span class="placeholder" data-placeholder="State"></span>
              </div>       
              <div class="col-md-12 form-group p_star bill">
                <input type="text" class="form-control" id="zip" name="txtzip" />
                <span class="placeholder" data-placeholder="Zip Code"></span>
              </div>       
          </div>
         
          <div class="col-lg-4">
            <div class="order_box">
              <h2>Your Order</h2>
              <ul class="list">
                <li>
                  <a href="#">Product
                  <?php
       
       if(isset($_POST['porder']))
       {
         $selectt=mysqli_query($con,"select * from tblproduct join tblcart on tblcart.pid=tblproduct.PId");
   foreach($selectt as $fetch)
   {
         $fn=$_POST['txtn'];
         $phone=$_POST['txtpn'];
         $e=$_POST['txte'];
         $add=$_POST['txtadd'];
         $city=$_POST['txtcity'];
         $state=$_POST['txtstate'];
         $zipcode=$_POST['txtzip'];
         $uid="2";
         $pn=$fetch['Pname'];
         $pp=$fetch['Pprice'];
         $pi=$fetch['Pimage'];
         $pid=$fetch['Pid'];
         $ppay=$_POST['pay'];   
         $date=date("Y-m-d H:i:s");               
         
         $insert=mysqli_query($con,"insert into orders values('null','$fn','$phone','$e','$add','$uid','$pn','$pp','$pi','$pid','$ppay','$date','$city','$state','$zipcode')");
         
   }   
               if($insert>0)
               {
                 echo "<script>alert('thanks for Shopping')</script>";
               }
              
       }

       else{
         $select=mysqli_query($con,"select * from tblproduct join tblcart on tblcart.Pid=tblproduct.Pid");
         foreach($select as $data)
         {
         ?>
             <li>
               <a href="#"><?php echo $data['Pname'] ?>
                 
                 <span class="last"><?php echo $data['Pprice'] ?></span>
               </a>
             </li>
             
         <?php
         }
         
             }
             
 ?>
           <ul class="list list_2">
                <li>
                  <a href="#">Total
                    
                    <span><?php  echo $_SESSION['sub_total']; ?></span>
                  </a>
                </li>
               
              </ul>
                  </a>
                </li>
                <!-- ye code neche se paste kiya ha start-->
                <div class="payment_item">
                <div class="radion_btn">
                  <input type="radio" id="f-option5" name="pay" value="Check payments"/>
                  <label for="f-option5">Check payments</label>
                  <div class="check"></div>
                </div>
                <p>
                  Please send a check to Store Name, Store Street, Store Town,
                  Store State / County, Store Postcode.
                </p>
              </div>
              <div class="payment_item active">
                <div class="radion_btn">
                  <input type="radio" id="f-option6" name="pay" checked value="Cash On Delivery"/>
                  <label for="f-option6">Cash On Delivery </label>
                  <!-- <img src="img/product/single-product/card.jpg" alt="" /> -->
                  <div class="check"></div>
                </div>
                <p>
                  Please send a check to Store Name, Store Street, Store Town,
                  Store State / County, Store Postcode.
                </p>
              </div>
                <!-- ye code neche se paste kiya ha end-->
             
              
                <!-- <li>
                  <a href="#">Fresh Blackberry
                    <span class="middle">x 02</span>
                    <span class="last">$720.00</span>
                  </a>
                </li>
                <li>
                  <a href="#">Fresh Tomatoes
                    <span class="middle">x 02</span>
                    <span class="last">$720.00</span>
                  </a>
                </li>
                <li>
                  <a href="#">Fresh Brocoli
                    <span class="middle">x 02</span>
                    <span class="last">$720.00</span>
                  </a>
                </li> -->
              </ul>

           
            
              <!-- <a class="btn_3" href="#">Place Order</a> -->
              <input type="submit" class="btn_3 mt-2 btn btn-success" value="place Order" name="porder">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php

?>
  <!--================End Checkout Area =================-->


<?php
include 'footer.php';
?>