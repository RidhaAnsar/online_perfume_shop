<?php include 'customerheader.php';
$cid=$_SESSION['cust_id'];
extract($_GET);

 ?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 300px">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
         </div>
  </section><!-- End Hero -->
<center>
	<h1>My Orders</h1>

  
	 
   <section id="team" class="team">
      <div class="container">

        <div class="row">
          <div class="col-sm-3">
            <div class="section-title" data-aos="fade-right">
         
            </div>
          </div>
          <div class="col-lg-8">
            <div class="row">
			<?php
      $q="SELECT * FROM  tbl_order INNER JOIN `tbl_cartmaster` USING (`cart_master_id`) INNER JOIN `tbl_cartchild` USING (`cart_master_id`) INNER JOIN `tbl_customer` USING (`cust_id`) INNER JOIN `tbl_item` USING (`item_id`) where cust_id='$cid' and (status='paid' or status='Delivered') ";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
        <div class="col-lg-6 mt-4">
                <div class="member" data-aos="zoom-in" data-aos-delay="400">
                  <div ><img src="<?php echo $row['item_image'] ?>" height="100" width="200"></div>
                  <div class="member-info">
                               <h4>Order Date:<?php echo $row['o_date'] ?><br><br>
                              Item Name:<?php echo $row['item_name'] ?><br><br>
                                    Quantity:<?php echo $row['qty'] ?><br><br>
                                Price:<?php echo $row['total_price'] ?><br><br>
                              Status:<?php echo $row['status'] ?></h4>

                              



                           



                             
                          <?php   

                            ?>


                             
                  </div><a class="btn btn-get-started" href="bill.php?oid=<?php echo $row['order_id'];?>"><b>Print Bill</b></a>
                </div>
              </div>
              <?php
} 

?>

           

            </div>

          </div>
        </div>

      </div>
    </section><!--  End Team Section -->
    
</center>
<?php include 'footer.php' ?>