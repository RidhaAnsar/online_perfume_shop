<?php include 'adminheader.php';
extract($_GET);



 ?>
   <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 300px">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
         </div>
  </section><!-- End Hero -->
<center>
	<h1>View Payment Details</h1>
	<form>
		<table class="table" style="width: 10 .00px">
			<tr>
				<th>Sino</th>
			   <th>Card Name</th>
				<th>Customer Name</th>
				
			     <th>Order Date</th>
				
				
			
			

				
			</tr>
			<?php 

     $q="SELECT * FROM `tbl_payment` INNER JOIN `tbl_card` USING (`card_id`) INNER JOIN `tbl_order` USING (`order_id`) INNER JOIN `tbl_customer` ON `tbl_customer`.cust_id=`tbl_card`.cust_id  where order_id='$oid'";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['card_name'] ?></td>
    		<td><?php echo $row['cust_fname'] ?></td>
    		
    		<td><?php echo $row['o_date'] ?></td>
    	
           
    		
           
    		

    
    	</tr>
    <?php }




			 ?>
		</table>
	</form>
</center>
<?php include 'adminfooter.php' ?>