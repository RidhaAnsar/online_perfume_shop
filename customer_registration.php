<?php include 'publicheader.php' ;

if (isset($_POST['cusreg'])) {
	extract($_POST);
	$q1="select * from tbl_login where username='$uname' and password='$pwd'";
 		$res1=select($q1);
 		if (sizeof($res1)>0) {
 			alert('Already exists');
 		}else{
    $q="insert into tbl_login values('$uname','$pwd','Customer','1')";
     insert($q);
  $q1="insert into tbl_customer values(null,'$uname','$fname','$lname','$city','$district','$state','$pin','$num','$gen') ";
   insert($q1);
   alert('Successfully');
   return redirect('customer_registration.php');
}
}


?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 900px">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
<center>
<h1>Customer Registration</h1>
<form method="post">
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
			<th>City</th>
			<td><input type="text" required="" class="form-control" name="city"></td>
		</tr>
		<tr>
			<th>District</th>
			<td><input type="text" required="" class="form-control" name="district"></td>
		</tr>
		
		<tr>
			<th>State</th>
			<td><input type="text" required="" class="form-control" name="state"></td>
		</tr>
		<tr>
			<th>Pincode</th>
			<td><input type="text" required="" pattern="[0-9]{6}" class="form-control" name="pin"></td>
		</tr>
		<tr>
			<th>Phone</th>
			<td><input type="text" required="" pattern="[0-9]{10}" class="form-control" name="num"></td>
		</tr>
		<tr>
			<th>Gender</th>
			<td><input type="radio" required=""  class="btn-get-started" name="gen" value="female">Female
			<input type="radio" required="" class="btn-get-started" name="gen" value="male">Male
			<input type="radio" required=""  class="btn-get-started" name="gen" value="other">Others</td>
		</tr>

		
		<tr>
			<th>User Name</th>
			<td><input type="email" required="" class="form-control"  name="uname"></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="password" required="" class="form-control" name="pwd"></td>
		</tr>
		<td align="center" colspan="2"><input type="submit" name="cusreg" value="Register" class="btn-get-started"></td>
	</table>
</form>
</center>
</div>
</section><!-- End Hero -->
<?php include 'footer.php' ?>