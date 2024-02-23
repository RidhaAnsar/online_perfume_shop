<?php include 'adminheader.php';


if (isset($_POST['product'])) {
	extract($_POST);
    $qa="SELECT * FROM `tbl_item` WHERE `item_name`='$fname'";
	$ress=select($qa);
	if(sizeof($ress)>0){alert("Item already exists");
	}else{

$dir = "image/";
	$file = basename($_FILES['imgg']['name']);
	$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
	$target = $dir.uniqid("image_").".".$file_type;
	if(move_uploaded_file($_FILES['imgg']['tmp_name'], $target))
	{
		 	
	$q1="insert into tbl_item values(null,'$category','$type','$brand','$fname','$dis','$target','0',0,'0') ";
   insert($q1);
   alert('Sucessfully');
   return redirect('admin_manageproduct.php');
 }
		else
		{
			echo "File uploading error occured";
		}


}
}
if (isset($_GET['nid'])) {
	extract($_GET);

	$q="update tbl_item set item_status='0' where item_id='$nid'";
	update($q);
	  return redirect('admin_manageproduct.php');

}
if (isset($_GET['aid'])) {
	extract($_GET);

	$q="update tbl_item set item_status='1' where item_id='$aid'";
	update($q);
	  return redirect('admin_manageproduct.php');
}

if (isset($_GET['uid'])) {
 	extract($_GET);

 	echo  $q="select * from tbl_item inner join tbl_category using (cat_id) inner join tbl_type using (type_id) inner join tbl_brand using (brand_id) where item_id='$uid'";
 	$res1=select($q);

 }

 if (isset($_POST['update'])) {
 	extract($_POST);

$dir = "image/";
	$file = basename($_FILES['imgg']['name']);
	$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
	$target = $dir.uniqid("image_").".".$file_type;
	if(move_uploaded_file($_FILES['imgg']['tmp_name'], $target))
	{
		

 	$q="update tbl_item set cat_id='$category' ,type_id='$type',brand_id='$brand',item_name='$fname',description='$dis',item_image='$target',stock='0' where item_id='$uid'";
 	update($q);
 	 alert('Sucessfully');
   return redirect('admin_manageproduct.php');

 }
  else
		{
			echo "File uploading error occured";
		}


} 





 ?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 800px">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
<center>
<h1>Manage Products</h1>
<form method="post" enctype="multipart/form-data">
	<?php if (isset($_GET['uid'])) { ?>
	<table class="table" style="width:500px;color: white;">
		<tr>
			<th>Category</th>
			<td><select name="category" class="form-control">
				<option value="<?php  echo $res1[0]['cat_id'] ?>"><?php echo $res1[0]['cat_name'] ?></option>

				<option>Select</option>
				<?php 

				$q="select * from tbl_category";
				$res=select($q);
				foreach ($res as $row) {
					?>
					<option value="<?php echo $row['cat_id'] ?>"><?php echo $row['cat_name'] ?></option>
				<?php 
			}
				 ?>
			</select></td>
		</tr>
		<tr>
			<th>Fragrance Type</th>
			<td><select name="type" class="form-control">

				<option value="<?php echo $res1[0]['type_id'] ?>"><?php echo $res1[0]['type_name'] ?></option>
				<option>Select</option>
				<?php 

				$q="select * from tbl_type";
				$res=select($q);
				foreach ($res as $row) {
					?>
					<option value="<?php echo $row['type_id'] ?>"><?php echo $row['type_name'] ?></option>
				<?php 
			}
				 ?>
			</select></td>
		</tr>
		<tr>
			<th>Brand</th>
			<td><select name="brand" class="form-control">
				<option value="<?php echo $res1[0]['brand_id'] ?>"><?php echo $res1[0]['brand_name'] ?></option>
				<option>Select</option>
				<?php 

				$q="select * from tbl_brand";
				$res=select($q);
				foreach ($res as $row) {
					?>
					<option value="<?php echo $row['brand_id'] ?>"><?php echo $row['brand_name'] ?></option>
				<?php 
			}
				 ?>
			</select></td>
		</tr>
		<tr>
			<th>Name</th>
			<td><input type="text" required="" class="form-control" value="<?php echo $res1[0]['item_name'] ?>" name="fname"></td>
		</tr>
		<tr>
			<th>Description</th>
			<td><textarea name="dis" required="" cols="10" rows="5" class="form-control"><?php echo $res1[0]['description'] ?></textarea></td>
		</tr>
		<tr>
			<th>Item Image</th>
			<td><input type="file" required="" class="form-control" value="<?php echo $res1[0]['item_image'] ?>" name="imgg"></td>
		</tr>
		<tr>
			<th>Rate</th>
			<td><input type="number" readonly  required="" class="form-control" value="<?php echo $res1[0]['item_rate'] ?>" name="rate"></td>
		</tr>
		<!-- <tr>
			<th>Stock</th>
			<td><input type="number" required="" class="form-control" value="<?php //echo $res1[0]['stock'] ?>" name="stock"></td>
		</tr> -->

		<td align="center" colspan="2"><input type="submit" name="update" value="submit" class="btn-get-started"></td>
	</table>
<?php }else{ ?>
	<table class="table" style="width:500px;color: white">
		<tr>
			<th>Category</th>
			<td><select name="category" class="form-control">
				
				<option>Select</option>
				<?php 

				$q="select * from tbl_category";
				$res=select($q);
				foreach ($res as $row) {
					?>
					<option value="<?php echo $row['cat_id'] ?>"><?php echo $row['cat_name'] ?></option>
				<?php 
			}
				 ?>
			</select></td>
		</tr>
		<tr>
			<th>Fragrance Type</th>
			<td><select name="type" class="form-control">
				<option>Select</option>
				<?php 

				$q="select * from tbl_type";
				$res=select($q);
				foreach ($res as $row) {
					?>
					<option value="<?php echo $row['type_id'] ?>"><?php echo $row['type_name'] ?></option>
				<?php 
			}
				 ?>
			</select></td>
		</tr>
		<tr>
			<th>Brand</th>
			<td><select name="brand" class="form-control">
				<option>Select</option>
				<?php 

				$q="select * from tbl_brand";
				$res=select($q);
				foreach ($res as $row) {
					?>
					<option value="<?php echo $row['brand_id'] ?>"><?php echo $row['brand_name'] ?></option>
				<?php 
			}
				 ?>
			</select></td>
		</tr>
		<tr>
			<th>Name</th>
			<td><input type="text" required="" class="form-control" name="fname"></td>
		</tr>
		<tr>
			<th>Description</th>
			<td><textarea name="dis" required="" class="form-control"></textarea></td>
		</tr>
		<tr>
			<th>Item Image</th>
			<td><input type="file" required="" class="form-control" name="imgg"></td>
		</tr>
		<!-- <tr>
			<th>Rate</th>
			<td><input type="number" required="" class="form-control" name="rate"></td>
		</tr> -->
		<!-- <tr>
			<th>Stock</th>
			<td><input type="number" required="" class="form-control" name="stock"></td>
		</tr> -->

		<td align="center" colspan="2"><input type="submit" name="product" value="OK" class="btn-get-started"></td>
	</table>
<?php } ?>
</form>
</center>
</div>
</section><!-- End Hero -->
<center>
	<h1>View Products</h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>No</th>
				<th>Category</th>
				<th>Fragrance Type</th>
				<th>Brand</th>
				<th>Name</th>
				<th>Description</th>
				<th>Item Image</th>
				<th>Rate</th>
				<th>Stock</th>	
			</tr>
			<?php 

     $q="select *,concat (tbl_item.description) as des  from tbl_item inner join tbl_category using (cat_id) inner join tbl_type using (type_id) inner join tbl_brand using (brand_id)";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['cat_name'] ?></td>
    		<td><?php echo $row['type_name'] ?></td>
    		<td><?php echo $row['brand_name'] ?></td>
    		<td><?php echo $row['item_name'] ?></td>
    		<td><?php echo $row['des'] ?></td>
    		<td><img src="<?php echo $row['item_image'] ?>" height="100" width="100"></td>
    		<td><?php echo $row['item_rate'] ?></td>
    		<td><?php echo $row['stock'] ?></td>
    		<?php 

              if ($row['item_status']==1) {?>
              
              	<td><a class="btn-get-started" href="?nid=<?php echo $row['item_id'] ?>"><b>Not Available</b></a></td>
         <?php }elseif ($row['item_status']==0) {?>
         	<td><a class="btn-get-started" href="?aid=<?php echo $row['item_id'] ?>"><b>Available</b></a></td>
        <?php }
    		 ?>
    		 	<td><a class="btn-get-started" href="?uid=<?php echo $row['item_id'] ?>"><b>Update</b></a></td>
    		
    	</tr>
    <?php }

			 ?>
		</table>
	</form>
</center>
<?php include 'adminfooter.php' ?>