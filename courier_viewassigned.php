<?php include 'courierheader.php';
$cid=$_SESSION['courier_id'];
extract($_GET);


if (isset($_GET['cid'])) {
	extract($_GET);

	$q="update tbl_cartmaster set status='Delivered' where cart_master_id='$cid' ";
	update($q);
	alert('Successfully');
	return redirect('courier_viewassigned.php');
}


 ?>
   <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 300px">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
         </div>
  </section><!-- End Hero -->
 <center>
	<h1> View Assigned Orders</h1>
	<form>
		<table class="table" style="width: 1000px">
			<tr>
				<th>Sino</th>
				<th>Amount</th>
				<th>Courier </th>
				<th>Delivery Date</th>
				<th>Status</th>
				
			</tr>
			<?php 

     $q="SELECT * FROM `tbl_delivery` INNER JOIN `tbl_order` USING (`order_id`)INNER JOIN `tbl_courier` USING (`courier_id`)INNER JOIN `tbl_cartmaster` USING (`cart_master_id`) where courier_id='$cid'";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['total_amount'] ?></td>
    		<td><?php echo $row['courier_name'] ?></td>
    		
    		<td><?php echo $row['delivery_date'] ?></td>
    		<td><?php echo $row['status'] ?></td>
    		<td><a class="btn-get-started" href="courier_viewcustomer.php?cid=<?php echo $row['cust_id'] ?>"> <b>View Customer</b></a></td>

    		<?php 

             if ($row['status']=="Assigned") {
             	?>
             	<td><a class="btn-get-started" href="?cid=<?php echo $row['cart_master_id'] ?>"><b>Delivered</b></a></td>
           <?php 
            }


    		 ?>
    		
	
    		
    	</tr>
    <?php }


			 ?>
		</table>
	</form>
</center>
<?php include 'courierfooter.php' ?>