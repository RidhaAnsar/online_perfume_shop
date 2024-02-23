<?php include 'adminheader.php';


if (isset($_POST['type'])) {
	extract($_POST);
	$qa="SELECT * FROM `tbl_type` WHERE `type_name`='$fname'";
	$ress=select($qa);
	if(sizeof($ress)>0){alert("Fragrance Type already exists");
	}else{
    
  echo$q1="insert into tbl_type values(null,'$fname','$dis') ";
   insert($q1);
   alert('sucessfully');}
   return redirect('admin_managetype.php');
 }
 if (isset($_GET['uid'])) {
 	extract($_GET);

 	 $q="select * from tbl_type inner join tbl_category using (cat_id) where type_id='$uid'";
 	$res1=select($q);

 }

 if (isset($_POST['update'])) {
 	extract($_POST);

 	$q="update tbl_type set type_name='$fname' ,description='$dis' where type_id='$uid'";
 	update($q);
 	 alert('Sucessfully');
   return redirect('admin_managetype.php');

 }




 ?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 700px">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
<center>
<h1>Manage Fragrance Type</h1>
<form method="post">
	<?php  if (isset($_GET['uid'])) { ?>
	<table class="table" style="width:500px;color: white">
       


		<tr>
			<th>Name</th>
			<td><input type="text" required="" class="form-control" value="<?php echo $res1[0]['type_name'] ?>" name="fname"></td>
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
		
		
		<td align="center" colspan="2"><input type="submit" name="type" value="OK" class="btn-get-started"></td>
	</table>
<?php } ?>
</form>
</center>
</div>
</section><!-- End Hero -->
<center>
	<h1>View Fragrance Type</h1>
	<form>
		<table class="table" style="width: 1000px">
			<tr>
				<th>No</th>
				
				<th>Name</th>
				<th>Description</th>
				
				
			</tr>
			<?php 

     $q="select * from tbl_type";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		
    		<td><?php echo $row['type_name'] ?></td>
    		<td><?php echo $row['description'] ?></td>

    	
    		
    		<td><a class="btn-get-started" href="?uid=<?php echo $row['type_id'] ?>"><b>Update</b></a></td>
    	</tr>
    <?php }




			 ?>
		</table>
	</form>
</center>
<?php include 'adminfooter.php' ?>