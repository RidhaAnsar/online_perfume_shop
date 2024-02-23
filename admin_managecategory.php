<?php include 'adminheader.php';


if (isset($_POST['category'])) {
	extract($_POST);
	$qa="SELECT * FROM `tbl_category` WHERE `cat_name`='$fname'";
	$ress=select($qa);
	if(sizeof($ress)>0){alert("Category already exists");
	}else{
    
  $q1="insert into tbl_category values(null,'$fname','$dis') ";
   insert($q1);
   alert('Sucessfully');}
   return redirect('admin_managecategory.php');
 }
  if (isset($_GET['uid'])) {
 	extract($_GET);

 	 $q="select * from tbl_category where cat_id='$uid'";
 	$res=select($q);

 }

 if (isset($_POST['update'])) {
 	extract($_POST);

 	$q="update tbl_category set cat_name='$fname' ,cat_description='$dis' where cat_id='$uid'";
 	update($q);
 	 alert('Sucessfully');
   return redirect('admin_managecategory.php');

 }




 ?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 700px">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
<center>
<h1>Manage Category</h1>
<form method="post">
	<?php   if (isset($_GET['uid'])) { ?>
	<table class="table" style="width:500px;color: white">
		<tr>
			<th>Name</th>
			<td><input type="text" required="" class="form-control" value="<?php echo $res[0]['cat_name'] ?>" name="fname"></td>
		</tr>
		
		
		<tr>
			<th>Description</th>
			<td><textarea name="dis" required="" class="form-control"></textarea></td>
		</tr>
		
		
		<td align="center" colspan="2"><input type="submit" name="update" value="submit" class="btn-get-started"></td>
	</table>
<?php }else{ ?>
	<table class="table" style="width:500px;color: white">
		<tr>
			<th>Name</th>
			<td><input type="text" required="" class="form-control" name="fname"></td>
		</tr>
		
		
		<tr>
			<th>Description</th>
			<td><textarea name="dis" required="" class="form-control"></textarea></td>
		</tr>
		
		
		<td align="center" colspan="2"><input type="submit" name="category" value="OK" class="btn-get-started"></td>
	</table>
<?php } ?>
</form>
</center>
</div>
</section><!-- End Hero -->
<center>
	<h1>View Categories</h1>
	<form>
		<table class="table" style="width: 1000px">
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Description</th>
				
				
			</tr>
			<?php 

     $q="select * from tbl_category";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['cat_name'] ?></td>
    		<td><?php echo $row['cat_description'] ?></td>
    	
    		
    		
    		<td><a class="btn-get-started" href="?uid=<?php echo $row['cat_id'] ?>"><b>Update</b></a></td>
    	</tr>
    <?php }




			 ?>
		</table>
	</form>
</center>
<?php include 'footer.php' ?>