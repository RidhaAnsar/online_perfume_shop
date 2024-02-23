<?php include 'adminheader.php';


extract($_GET);



 ?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 200px">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
    </div></section>



<center>
	<h1>View Purchase Details</h1>
	<form>
		<table class="table" style="width: 700px">
			<tr>
				<th>No</th>
        <th>Vendor</th>
				<th>Item </th>
				<th>Quantity</th>

				<th>Cost Price</th>
				<!-- <th>total price</th>
				 -->
				
				
				


				
			</tr>
			<?php 

     $q="SELECT * FROM`tbl_purchase_master` INNER JOIN `tbl_purchase_child` USING(`pur_master_id`) INNER JOIN `tbl_vendor` USING(`vendor_id`) INNER JOIN tbl_item USING(item_id) WHERE `tbl_purchase_master`.`status`='paid'";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
        <td><?php echo $row['vendor_name'] ?></td>
    		<td><?php echo $row['item_name'] ?></td>
    		<td><?php echo $row['quantity'] ?></td>
    		<td><?php echo $row['cost_price'] ?></td>
    		
    
    		
    		
    		

    	
    		
    		<!-- <td><a href="?did=<?php echo $row['member_id'] ?>">delete</a></td>
    		<td><a href="?uid=<?php echo $row['member_id'] ?>">update</a></td> -->
    	</tr>
    <?php }




			 ?>
		</table>
	</form>
</center>
<?php include 'footer.php' ?>