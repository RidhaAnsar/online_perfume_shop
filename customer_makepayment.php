<?php include 'customerheader.php';
$cid=$_SESSION['cust_id'];
extract($_GET);

if (isset($_POST['payment'])) {
	extract($_POST);

	echo $exp_date=$date;
	echo $cd=date("Y-m");

if ($exp_date < $cd) {


alert('Expired'); 
			

}else{


$q1="insert into tbl_card values(null,'$cid','$num','$name','$bname','$date')";
$id=insert($q1);
$q="insert into tbl_payment values(null,'$id','$cid','$oid',curdate())";
insert($q);
$q2="update tbl_cartmaster set status='paid' where cart_master_id='$cmid'";
update($q2);
$q2="select * from tbl_cartchild where cart_master_id='$cmid'";
$res=select($q2);
foreach ($res as $key) {

 echo $pid= $key['item_id'] ;

echo $qty=$key['qty'];

echo$q="update tbl_item set stock=stock-'$qty' where item_id='$pid'";
update($q);


alert('Successfully');
return redirect('customer_myorders.php');
}
}
}
 ?>
 <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 700px">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
<center>
<center>
<h1>Make Payment</h1>
<form method="post">

	<table class="table" style="width:500px;color: white">
		<tr>
			<th>Card Number</th>
			<td><input type="text" required="" title="Enter 16 Digits" pattern="[0-9]{16}"  class="form-control" name="num"></td>
		</tr>
		<tr>
			<th> Card Name</th>
			<td><input type="text" required="" class="form-control" name="name"></td>
		</tr>
		
		<tr>
			<th> Bank Name</th>
			<td><input type="text" required="" class="form-control" name="bname"></td>
		</tr>

		<tr>
			<th>C V V</th>
			<td><input type="password" pattern="[0-9]{3}" required="" class="form-control" name="cvv"></td>
		</tr>

		<tr>
			<th>Expiry Date</th>
			<td><input type="month" required="" class="form-control" name="date"></td>
		</tr>
	<tr>
		<th>Amount</th>
		<td><input type="text" class="form-control" value="<?php echo $amo ?>" name="amo"></td>
	</tr>
		
		<tr>
		<td align="center" colspan="2"><input type="submit" name="payment" value="OK" class="btn-get-started"></td>
		</tr>
	</table>

</form>
</center>
 </div>
  </section><!-- End Hero -->
<?php include 'footer.php' ?>