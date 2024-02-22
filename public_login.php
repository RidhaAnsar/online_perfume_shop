<?php include 'publicheader.php';


if (isset($_POST['login'])) {
	extract($_POST);

	$q="select * from tbl_login where username='$uname' and password='$pwd'";
	$res=select($q);
	if (sizeof($res)>0) {

           $_SESSION['username']=$res[0]['username'];
           $lid=$_SESSION['username'];
           $_SESSION['user_type']=$res[0]['user_type'];
 	      $user_type=$_SESSION['user_type'];

		if ($res[0]['user_type']=="admin") {

				$q="SELECT * FROM `tbl_item` WHERE stock<10";
 		       $res=select($q);
 		      if (sizeof($res)>0) {
 			  alert('Out Of Stock ,Add Product ');
 			
 		}
          return redirect('admin_home.php');
			
		}elseif ($res[0]['user_type']=="Customer") {

			$q1="select * from tbl_login where username='$uname' and status='0'";
 		$res1=select($q1);
 		if (sizeof($res1)>0) {
 			alert('Inactive');
 		}else{


 			$q2="select * from tbl_customer inner join tbl_login using (username) where username='$lid'";
 			$res2=select($q2);
 			if (sizeof($res2)>0) {
 				 $_SESSION['cust_id']=$res2[0]['cust_id'];
                     $cid=$_SESSION['cust_id'];
           return redirect('customer_home.php');}
			
		}

		}elseif ($res[0]['user_type']=="Staff") {

			$q1="select * from tbl_login where username='$uname' and status='0'";
 		$res1=select($q1);
 		if (sizeof($res1)>0) {
 			alert('Inactive');
 		}else{
			

		 $q="select * from tbl_staff inner join tbl_login using (username) where username='$lid'";
		 $res=select($q);
		 if (sizeof($res)>0) {
		 		$_SESSION['staff_id']=$res[0]['staff_id'];
			$cid=$_SESSION['staff_id'];
			return redirect('admin_home.php');


		    }
		 }		
		}elseif ($res[0]['user_type']=="Courier") {



			$q1="select * from tbl_login where username='$uname' and status='0'";
 		$res1=select($q1);
 		if (sizeof($res1)>0) {
 			alert('Inactive');
 		}else{
			
			$q4="select * from tbl_courier inner join tbl_login using(username) where username='$lid'";
 			$res4=select($q4);
 			if (sizeof($res4)>0) {

 				$_SESSION['courier_id']=$res4[0]['courier_id'];
 				$cid=$_SESSION['courier_id'];
 				return redirect('courier_home.php');
 			}
		}
	}

	}else{
		alert('invalid username and password');
	}

}




 ?>



  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
     <center>
<h1>Login</h1>
<form method="post">
	<table class="table" style="width:500px;color: white">
		
		<tr>
			<th>User Name</th>
			<td><input type="email" required="" class="form-control"  name="uname"></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="password" required="" class="form-control" name="pwd"></td>
		</tr>
		<td align="center" colspan="2"><input  type="submit" name="login" value="Login" class="btn-get-started"></td>
	</table>
</form>
</center>
    </div>
  </section><!-- End Hero -->

<?php include 'footer.php' ?>