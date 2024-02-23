<?php include 'adminheader.php';
extract($_GET);




if (isset($_POST['Assign'])) {
	extract($_POST);
    
	 	
	$q1="insert into tbl_delivery values(null,'$oid','$courier','$date') ";
   insert($q1);
   $q2="update tbl_cartmaster set status='Assigned' where cart_master_id='$cmid'";
   update($q2);
  
   alert('Sucessfully');
   return redirect("admin_assigncourier.php?oid=$oid");
 }
	




 ?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 700px">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
<center>
<h1>Assign To Courier Service</h1>
<form method="post" >
	<table class="table" style="width:500px;color: white">
		<tr>
			<th>Courier</th>
			<td><select name="courier" class="form-control" >
				<option>Select</option>
				<?php 

				$q="SELECT * FROM tbl_courier INNER JOIN `tbl_login` USING (username) WHERE `status`='1'";
				$res=select($q);
				foreach ($res as $row) {
					?>
					<option value="<?php echo $row['courier_id'] ?>"><?php echo $row['courier_name'] ?></option>
				<?php 
			}
				 ?>
			</select></td>
		</tr>
		
	
		<tr>
			<th>Date</th>
			<td><input type="date" id="txtDate" name="date" min="<?php echo date("Y-m-d"); ?>"></td>
		</tr>
		

		<td align="center" colspan="2"><input type="submit" name="Assign" value="submit" class="btn-get-started"></td>
	</table>
</form>
</center>
 </div>
  </section><!-- End Hero -->
 <center>
	<h1> View Assigned To Courier Service</h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>Sino</th>
				<th>Amount</th>
				<th>Courier </th>
				<th>Delivery Date</th>
				<th>Status</th>	
			</tr>
			<?php 

     $q="SELECT * FROM `tbl_delivery` INNER JOIN `tbl_order` USING (`order_id`)INNER JOIN `tbl_courier` USING (`courier_id`)INNER JOIN`tbl_cartmaster` USING (`cart_master_id`) where order_id='$oid' ";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['total_amount'] ?></td>
    		<td><?php echo $row['courier_name'] ?></td>
    		
    		<td><?php echo $row['delivery_date'] ?></td>
    		<td><?php echo $row['status'] ?></td>
	
    	</tr>
    <?php }

			 ?>
		</table>
	</form>
</center>
<?php include 'adminfooter.php' ?>