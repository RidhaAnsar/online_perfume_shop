<?php include 'adminheader.php';


if (isset($_POST['vendor'])) {
	extract($_POST);
    
  echo$q1="insert into tbl_vendor values(null,'$fname','$num','$email','1') ";
   insert($q1);
   alert('Sucessfully');
   return redirect('admin_managevendor.php');
 }
if (isset($_GET['iid'])) {
	extract($_GET);

	$q="update tbl_vendor set status='0' where vendor_id='$iid'";
	update($q);

}
if (isset($_GET['aid'])) {
	extract($_GET);

	$q="update tbl_vendor set status='1' where vendor_id='$aid'";
	update($q);
}

 if (isset($_GET['uid'])) {
 	extract($_GET);

 	 $q="select * from tbl_vendor where vendor_id='$uid'";
 	$res=select($q);

 }

 if (isset($_POST['update'])) {
 	extract($_POST);

 	$q="update tbl_vendor set vendor_name='$fname' ,vendor_phone='$num' ,vendor_email='$email' where vendor_id='$uid'";
 	update($q);
 	 alert('Sucessfully');
   return redirect('admin_managevendor.php');

 }




 ?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 700px">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
<center>
<h1>Manage Vendor</h1>
<form method="post">
	<?php  if (isset($_GET['uid'])) { ?>
	<table class="table" style="width:500px;color: white">
		<tr>
			<th>Name</th>
			<td><input type="text" required="" class="form-control" value="<?php echo $res[0]['vendor_name'] ?>" name="fname"></td>
		</tr>
		
		
		<tr>
			<th>Phone</th>
			<td><input type="text" required="" pattern="[0-9]{10}" class="form-control" value="<?php echo $res[0]['vendor_phone'] ?>"  name="num"></td>
		</tr>
		<tr>
			<th>E-Mail</th>
			<td><input type="email" required="" class="form-control" value="<?php echo $res[0]['vendor_email'] ?>" name="email"></td>
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
			<th>Phone</th>
			<td><input type="text" required="" pattern="[0-9]{10}" class="form-control" name="num"></td>
		</tr>
		<tr>
			<th>E-Mail</th>
			<td><input type="email" required="" class="form-control" name="email"></td>
		</tr>
		
		<td align="center" colspan="2"><input type="submit" name="vendor" value="Register" class="btn-get-started"></td>
	</table>
<?php } ?>
</form>
</center>
</div>
</section><!-- End Hero -->
<center>
	<h1>View Vendors</h1>
	<form>
		<table class="table" style="width: 1000px">
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Phone</th>
				<th>E-Mail</th>
				<!-- <th>Status</th> -->
				
				
			</tr>
			<?php 

     $q="select * from tbl_vendor";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['vendor_name'] ?></td>
    		<td><?php echo $row['vendor_phone'] ?></td>

    		<td><?php echo $row['vendor_email'] ?></td>
    		

    		<?php 

              if ($row['status']=="1") {?>
              <td><a class="btn-get-started" href="?iid=<?php echo $row['vendor_id'] ?>"><b>InActive</b></a></td>
            
             <?php }elseif ($row['status']=="0") {?>
             	<td><a class="btn-get-started" href="?aid=<?php echo $row['vendor_id'] ?>"><b>Active</b></a></td>
             <?php }?>
      <td><a class="btn-get-started" href="?uid=<?php echo $row['vendor_id'] ?>"><b>Update</b></a></td>
             
    	</tr>
    <?php }

			 ?>
		</table>
	</form>
</center>
<?php include 'adminfooter.php' ?>