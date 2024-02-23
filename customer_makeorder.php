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
	<h1>View Cart</h1>
	<form>
		<table class="table" style="width: 1000px">
			<tr>
				<th>Sino</th>
			   <!-- <th>Date</th> -->
				<th>Total Amount</th>
				
			  <!--    <th>Product</th>
				<th>Quantity</th>
				<th>Image</th> -->
                <th>Status</th>
				
			</tr>
			<?php 

     $q="SELECT * FROM `tbl_order` INNER JOIN `tbl_cartmaster` USING (`cart_master_id`) INNER JOIN tbl_cartchild USING (cart_master_id)INNER JOIN `tbl_item`USING (item_id)  where cust_id='$cid' group by order_id";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    	<!-- 	<td><?php echo $row['o_date'] ?></td> -->
    		<td><?php echo $row['total_amount'] ?></td>
    		<!-- 
    		<td><?php echo $row['item_name'] ?></td>
    		<td><?php echo $row['qty'] ?></td>
    		<td><img src="<?php echo $row['item_image'] ?>" height="100" width="100"></td> -->
    	
    		<td><?php echo $row['status'] ?></td>

    		<td><a class="btn-get-stared" href="customer_buy.php?oid=<?php echo $row['order_id'] ?>&cmid=<?php echo $row['cart_master_id'] ?>"> <b>Order Details </b></a></td>

    		<?php 

               if ($row['status']=="pending") {?>
              <td><a  class="btn-get-stared" href="customer_makepayment.php?oid=<?php echo $row['order_id'] ?>&cmid=<?php echo $row['cart_master_id'] ?>&amo=<?php echo $row['total_amount'] ?>"> <b>Make Payment</b></a></td>
            
              <?php 
               }

    		 ?>
    		
           
    		
           
    		

    
    	</tr>
    	
    <?php }




			 ?>
		</table>
	</form>
</center>
<?php include 'footer.php' ?>