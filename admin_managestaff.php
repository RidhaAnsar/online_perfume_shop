<?php include 'adminheader.php';


if (isset($_POST['staffreg'])) {
	extract($_POST);
	$q1="select * from tbl_login where username='$uname' and password='$pwd'";
 		$res1=select($q1);
 		if (sizeof($res1)>0) {
 			alert('Already exists');
 		}else{
    echo$q="insert into tbl_login values('$uname','$pwd','Staff','1')";
     insert($q);
  echo$q1="insert into tbl_staff values(null,'$uname','$fname','$lname','$num','$city','$district','$pin','$gen','$date') ";
   insert($q1);
   alert('Sucessfully');
   return redirect('admin_managestaff.php');
}
}
if (isset($_GET['iid'])) {
	extract($_GET);

	$q="update tbl_login set status='0' where username='$iid'";
	update($q);

}
if (isset($_GET['aid'])) {
	extract($_GET);

	$q="update tbl_login set status='1' where username='$aid'";
	update($q);
}
 if (isset($_GET['uid'])) {
 	extract($_GET);

 	 $q="select * from tbl_staff where staff_id='$uid'";
 	$res=select($q);

 }

 if (isset($_POST['update'])) {
 	extract($_POST);

 	$q="update tbl_staff set staff_fname='$fname' ,staff_lname='$lname',staff_phone='$num',staff_city='$city',staff_dist='$district',staff_pin='$pin',staff_gender='$gen',date='$date'where staff_id='$uid'";
 	update($q);
 	 alert('Sucessfully');
   return redirect('admin_managestaff.php');

 }




 ?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 900px">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
<center>
<h1>Manage Staff</h1>
<form method="post">
	<?php  if (isset($_GET['uid'])) { ?>
	<table class="table" style="width:500px;color: white">
		<tr>
			<th>First Name</th>
			<td><input type="text" required="" class="form-control" value="<?php echo $res[0]['staff_fname'] ?>" name="fname"></td>
		</tr>
		<tr>
			<th>Last Name</th>
			<td><input type="text" required="" class="form-control" value="<?php echo $res[0]['staff_lname'] ?>" name="lname"></td>
		</tr>
		<tr>
			<th>Phone</th>
			<td><input type="text" required="" pattern="[0-9]{10}" value="<?php echo $res[0]['staff_phone'] ?>" class="form-control" name="num"></td>
		</tr>
		<tr>
			<th>City</th>
			<td><input type="text" required="" value="<?php echo $res[0]['staff_city'] ?>" class="form-control" name="city"></td>
		</tr>
		<tr>
			<th>District</th>
			<td><input type="text" required="" class="form-control" value="<?php echo $res[0]['staff_dist'] ?>" name="district"></td>
		</tr>
		<tr>
			<th>Pincode</th>
			<td><input type="text" required="" pattern="[0-9]{6}" class="form-control" value="<?php echo $res[0]['staff_pin'] ?>" name="pin"></td>
		</tr>
		<tr>
			<th>Gender</th>
			<td><input type="radio" required="" class="form-control" name="gen" value="female">Female
			<input type="radio" required="" class="form-control" name="gen" value="male">Male
			<input type="radio" required="" class="form-control" name="gen" value="other">Others</td>
		</tr>
		<tr>
			<th>Date</th>
			<td><input type="date" required="" class="form-control" value="<?php echo $res[0]['date'] ?>" name="date"></td>
		</tr>

		<td align="center" colspan="2"><input type="submit" name="update" value="submit" class="btn-get-started"></td>
	</table>
<?php }else{ ?>
	<table class="table" style="width:500px;color: white">
		<tr>
			<th>First Name</th>
			<td><input type="text" required="" class="form-control" name="fname"></td>
		</tr>
		<tr>
			<th>Last Name</th>
			<td><input type="text" required="" class="form-control" name="lname"></td>
		</tr>
		<tr>
			<th>Phone</th>
			<td><input type="text" required="" pattern="[0-9]{10}" class="form-control" name="num"></td>
		</tr>
		<tr>
			<th>City</th>
			<td><input type="text" required="" class="form-control" name="city"></td>
		</tr>
		<tr>
			<th>District</th>
			<td><input type="text" required="" class="form-control" name="district"></td>
		</tr>
		<tr>
			<th>Pincode</th>
			<td><input type="text" required="" pattern="[0-9]{6}" class="form-control" name="pin"></td>
		</tr>
		<tr>
			<th>Gender</th>
			<td><input type="radio" class="btn-get-started" required=""  name="gen" value="female">Female
			<input type="radio" class="btn-get-started" required=""  name="gen" value="male">Male
			<input type="radio" class="btn-get-started" required=""name="gen" value="other">Others</td>
		</tr>
		<tr>
			<th>Date</th>
			<td><input type="date" required="" class="form-control" name="date"></td>
		</tr>

		<tr>
			<th>User Name</th>
			<td><input type="email" required="" class="form-control"  name="uname"></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="password" required="" class="form-control" name="pwd"></td>
		</tr>
		<td align="center" colspan="2"><input type="submit" name="staffreg" value="Register Staff" class="btn-get-started"></td>
	</table>
<?php } ?>
</form>
</center>
</div>
</section><!-- End Hero -->
<center>
	<h1>View Staff</h1>
	<form>
		<table class="table" style="width: 1000px">
			<tr>
				<th>No</th>
			   <th>First Name</th>
				<th>Last Name</th>
				<th>Phone</th>
			     <th>City</th>
				<th>District</th>
				<th>Pincode</th>
				<th>Gender</th>
				<th>Date</th>
			
			

				
			</tr>
			<?php 

     $q="select * from tbl_staff inner join tbl_login using(username)";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['staff_fname'] ?></td>
    		<td><?php echo $row['staff_lname'] ?></td>
    		<td><?php echo $row['staff_phone'] ?></td>
    		<td><?php echo $row['staff_city'] ?></td>
    		<td><?php echo $row['staff_dist'] ?></td>
    	
    		<td><?php echo $row['staff_pin'] ?></td>
    		<td><?php echo $row['staff_gender'] ?></td>
    		<td><?php echo $row['date'] ?></td>

    		<?php 
    		if ($row['status']=="1") {?>

            <td><a class="btn-get-started" href="?iid=<?php echo $row['username'] ?>"><b>InActive</b></a></td>
           

    		<?php 
    		}elseif ($row['status']=="0") {
    			?>
    			<td><a class="btn-get-started" href="?aid=<?php echo $row['username'] ?>"><b>Active</b></a></td>
    		<?php 
    		} ?>
    		   <td><a class="btn-get-started" href="?uid=<?php echo $row['staff_id'] ?>"><b>Update</b></a></td>

    
    	</tr>
    <?php }




			 ?>
		</table>
	</form>
</center>
<?php include 'adminfooter.php' ?>