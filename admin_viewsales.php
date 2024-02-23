<?php include 'adminheader.php';
extract($_GET);



 ?>
   <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 300px">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
         </div>
  </section><!-- End Hero -->
<center>
	<h1>View Sales</h1>
	<form>
		<table class="table" style="width: 1000px">
			<tr>
				<th>No</th>
			   <th>Date</th>
			
				
			     <th>Product</th>
				<th>Quantity</th>
                <th>Status</th>
				
				
			
			

				
			</tr>
			<?php 

     $q="SELECT * FROM `tbl_order` INNER JOIN `tbl_cartmaster` USING (`cart_master_id`)INNER JOIN `tbl_cartchild` USING (cart_master_id) INNER JOIN `tbl_item` USING (item_id) where status='paid' ";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['o_date'] ?></td>
    		
    		
    		<td><?php echo $row['item_name'] ?></td>
    		<td><?php echo $row['qty'] ?></td>
    	
    		<td><?php echo $row['status'] ?></td>
            <td><a class="btn-get-started" href="admin_viewpayment.php?oid=<?php echo $row['order_id'] ?>"><b>View Payment</b></a></td>

            <?php 
            if ($row['status']=="paid") {
                ?>
                <td><a class="btn-get-started" href="admin_assigncourier.php?oid=<?php echo $row['order_id'] ?>&cmid=<?php echo $row['cart_master_id'] ?>"><b>Asssign To Courier</b></a></td>
           <?php  }


             ?>
           
    		
           
    		

    
    	</tr>
    <?php }




			 ?>
		</table>
	</form>
</center>
<?php include 'adminfooter.php' ?>