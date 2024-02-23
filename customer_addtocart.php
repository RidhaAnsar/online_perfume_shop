<?php include 'customerheader.php';
$cid=$_SESSION['cust_id'];
extract($_GET);






if (isset($_POST['add'])) {
	extract($_POST);
    

    $qty=$quantity;
    $stock=$stock;

    if ($stock < $qty) {
    	alert('Enter less Quantity');
    }else{



	$q2="select * from tbl_cartmaster where cust_id='$cid' and status='pending'";
	$res=select($q2);
	if (sizeof($res)>0) {
		$cmid=$res[0]['cart_master_id'];
	}else{

	echo$q="insert into tbl_cartmaster values(null,'$cid','$total','pending')";
	$cmid=insert($q);

	$q1="insert into tbl_order values(null,'$cmid',curdate())";
	insert($q1);
	echo$q3="insert into tbl_cartchild values(null,'$cmid','$pid','$amo','$quantity')";
	insert($q3);

	alert('Successfuly');
	return redirect('customer_searchproduct.php');
}
  $q4="select * from tbl_cartchild where item_id='$pid' and cart_master_id='$cmid' ";
  $res2=select($q4);

  if (sizeof($res2)>0) {
  	$cdid=$res2[0]['cart_child_id'];

  	$q5="update tbl_cartchild set qty=qty+'$quantity', total_price=total_price+'$amo' where cart_child_id='$cdid' ";
  	update($q5);
  	
  }else{

	$q3="insert into tbl_cartchild values(null,'$cmid','$pid','$amo','$quantity')";
	insert($q3);
	}

	$q6="update tbl_cartmaster set total_amount=total_amount+'$total' where cart_master_id='$cmid' ";
	update($q6);
	alert('successfuly');
	return redirect('customer_searchproduct.php');

}

}
 ?>
<!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 700px">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
<center>

<script type="text/javascript">
	function TextOnTextChange()
	{
		var x =document.getElementById("p_amount").value;
		var y =document.getElementById("p_qnty").value;
		document.getElementById("t_amount").value = x * y;
	}

</script> 

<center>
<h1>Add To Cart</h1>
<form method="post" >
	<table class="table" style="width:500px;color: white">

		<tr>
			<th>Amount</th>
			<td><input type="number" required="" class="form-control" value="<?php echo $amount ?>"  id="p_amount" name="amo"></td>
		</tr>

		<tr>
			<th>Quantity</th>
			<td><input type="number" required="" class="form-control" id="p_qnty" onchange="TextOnTextChange()"  name="quantity"></td>
		</tr>

		<tr>
			<th>Total</th>
			<td><input type="number" required="" class="form-control" id="t_amount" name="total"></td>
		</tr>

		<td align="center" colspan="2"><input type="submit" name="add" value="OK" class="btn-get-started"></td>
	</table>
</form>
</center>
 </div>
  </section><!-- End Hero -->
<?php include 'footer.php' ?>