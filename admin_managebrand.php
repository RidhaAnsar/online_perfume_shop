<?php include 'adminheader.php';


if (isset($_POST['brand'])) {
	extract($_POST);


	$qa="SELECT * FROM `tbl_brand` WHERE `brand_name`='$fname'";
	$ress=select($qa);
	if(sizeof($ress)>0){
		alert("Brand already exists");
	}else{
		$q1="insert into tbl_brand values(null,'$fname') ";
	   insert($q1);
	   alert('Sucessfully');

	}
   return redirect('admin_managebrand.php');
 }

 if (isset($_GET['uid'])) {
 	extract($_GET);

  $q="select * from tbl_brand where brand_id='$uid'";
 	$res=select($q);

 }

 if (isset($_POST['update'])) {
 	extract($_POST);

 	$q="update tbl_brand set brand_name='$fname' where brand_id='$uid'";
 	update($q);
 	 alert('Sucessfully');
   return redirect('admin_managebrand.php');

 }







 ?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 700px">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
<center>
<h1>Manage Brands</h1>
<form method="post">
	<?php  if (isset($_GET['uid'])) { ?>
	<table class="table" style="width:500px;color: white">
		
		<tr>
			<th>Name</th>
			<td><input type="text" required="" class="form-control" value="<?php echo $res[0]['brand_name'] ?>"  name="fname"></td>
		</tr>

		<td align="center" colspan="2"><input type="submit" name="update" value="OK" class="btn-get-started"></td>
	</table>
<?php }else{ ?>
	<table class="table" style="width:500px;color: white">
		
		<tr>
			<th>Name</th>
			<td><input type="text" required="" class="form-control" name="fname"></td>
		</tr>

		<td align="center" colspan="2"><input type="submit" name="brand" value="submit" class="btn-get-started"></td>
	</table>
<?php } ?>
</form>
</center>
</div>
</section><!-- End Hero -->
<center>
	<h1>View Brands</h1>
	<form>
		<table class="table" style="width: 1000px">
			<tr>
				<th>No</th>
				
				<th>Name</th>

			</tr>
			<?php 

     $q="select * from tbl_brand";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		
	        <td><?php echo $row['brand_name'] ?></td>
	
    		<td><a class="btn-get-started" href="?uid=<?php echo $row['brand_id'] ?>"><b>Update</b></a></td> 
    	</tr>
    <?php }

			 ?>
		</table>
	</form>
</center>
<?php include 'adminfooter.php' ?>