<?php include 'customerheader.php' ?>
<!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 700px">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
<center>
<center>
	<h1>Filter Product</h1>
	<form method="post">
	<table class="table" style="width: 500px;color: white">
		<tr>
			<th>Search</th>
			<td><input type="text"  class="form-control" required="" name="filter"></td>
		</tr>
		<tr>
			<td align="center" colspan="2"><input type="submit" class="btn-get-started" name="search"></td>
		</tr>
	</table>
	</form>
</center>
 </div>
  </section><!-- End Hero -->
<center>
	<h1>View Products</h1>
	<form>
		<table class="table" style="width: 1200px">
			<tr>
				<th>Sino</th>
				<th>Category</th>
				<th>Fragrance Type</th>
				<th>Brand</th>
				<th>Name</th>
				<th>Description</th>
				<th>Item Image</th>
				<th>Rate</th>
			
			</tr>
			<?php 


			if (isset($_POST['search'])) {
				extract($_POST);
				 $q="select * from tbl_item inner join tbl_category using (cat_id) inner join tbl_type using (type_id) inner join tbl_brand using (brand_id) where (type_name like '$filter%' or cat_name like '$filter%' or brand_name like '$filter%') and (item_status='1') ";
			

			}else{

     $q="SELECT * FROM tbl_item INNER JOIN tbl_category USING (cat_id) INNER JOIN tbl_type USING (type_id) INNER JOIN tbl_brand USING (brand_id) WHERE item_status='1'" ;}
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['cat_name'] ?></td>
    		<td><?php echo $row['type_name'] ?></td>
    		<td><?php echo $row['brand_name'] ?></td>
    		<td><?php echo $row['item_name'] ?></td>
    		<td><?php echo $row['description'] ?></td>
    		<td><img src="<?php echo $row['item_image'] ?>" height="100" width="100"></td>
    		<td><?php echo $row['item_rate'] ?></td>
    	

    		<?php 

             if ($row['stock']>1) {?>
             	<td><a class="btn-get-started" href="customer_addtocart.php?pid=<?php echo $row['item_id'] ?>&amount=<?php echo $row['item_rate'] ?>&stock=<?php echo $row['stock'] ?>"><b>Add to cart</b></a></td>		
            <?php  }elseif ($row['stock']<=1) {?>
            	<td><a href="#"><b>Out Of Stock! </b></a></td>
          <?php   }

    		 ?>
    		
    	</tr>
    <?php }

			 ?>
		</table>
	</form>
</center>
<?php include 'footer.php' ?>