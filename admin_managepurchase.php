<?php include 'adminheader.php';


extract($_GET);


if (isset($_POST['purchase'])) {
	extract($_POST);


if($sell<$cost){
	alert("Sellinig Price Must be Greater than or Equal to Coast Price.");
}
else{

$qq="SELECT * FROM `tbl_purchase_master` WHERE `vendor_id`='$vendor' AND `status`='pending'";
$r=select($qq);
if(sizeof($r)>0){
	$pur_master_id=$r[0]['pur_master_id'];
	$qr="SELECT * FROM `tbl_purchase_child`  WHERE  item_id='$item' AND cost_price='$cost' and pur_master_id='$pur_master_id'";
	$res=select($qr);
	if (sizeof($res)>0) {
		$q4="update tbl_purchase_child set  quantity=quantity+'$quantity' where pur_child_id='".$res[0]['pur_child_id']."'";
		update($q4);
		$q6="update tbl_purchase_master set tot_amount=tot_amount+'$total' where pur_master_id='$pur_master_id' ";
			update($q6);

		}
		else{

			echo$q1="insert into tbl_purchase_child values(null,'$pur_master_id','$item','$cost','$sell','$quantity') ";
  			insert($q1);	
  			$q61="update tbl_purchase_master set tot_amount=tot_amount+'$total' where pur_master_id='$pur_master_id' ";
			update($q61);



		}
	}
else{

	$q6="insert into tbl_purchase_master values(null,'0','$vendor','$total',curdate(),'pending') ";
   $cmid=insert($q6);
   $q1="insert into tbl_purchase_child values(null,'$cmid','$item','$cost','$sell','$quantity') ";
  insert($q1);

}



$q3="update tbl_item set stock=stock+'$quantity',item_rate='$sell',item_status='1' where item_id='$item'";
  update($q3);
 alert('Successfully');


}

return redirect('admin_managepurchase.php');



// $qr="SELECT * FROM `tbl_purchase_child`  WHERE  item_id='$item' AND cost_price='$cost'";
// $res=select($qr);
// if (sizeof($res)>0) {
// $q4="update tbl_purchase_child set  quantity=quantity+'$quantity' where cost_price='$cost'";
// update($q4);
//    alert('Sucessfully');
//    return redirect('admin_managepurchase.php');
// }else{




// 	echo$q2="select * from tbl_purchase_master where vendor_id='$vendor' and status='pending'";
// 	$res=select($q2);
// 	if (sizeof($res)>0) {
// 		$cmid=$res[0]['pur_master_id'];
// 	}else{

// 	echo$q6="insert into tbl_purchase_master values(null,'$cid','$vendor','$total',curdate(),'pending') ";
//    $cmid=insert($q6);
//    echo$q1="insert into tbl_purchase_child values(null,'$cmid','$item','$cost','$quantity') ";
//   insert($q1);
	

//  //   alert('Sucessfully');
//  // return redirect('admin_managepurchase.php');
// }



// $q4="select * from tbl_purchase_child where item_id='$item' and pur_master_id='$cmid' ";
//   $res2=select($q4);

//   if (sizeof($res2)>0) {
//   	$cdid=$res2[0]['pur_child_id'];

//   	$q5="update tbl_purchase_child set quantity=quantity+'$quantity', cost_price=cost_price+'$cost' where pur_child_id='$cdid' ";
//   	update($q5);
  	
//   }else{

// 	$q1="insert into tbl_purchase_child values(null,'$cmid','$item','$cost','$quantity')";
// 	insert($q1);
// 	}

// 	$q6="update tbl_purchase_master set tot_amount=tot_amount+'$total' where pur_master_id='$cmid' ";
// 	update($q6);

// 	$q3="update tbl_item set stock=stock+'$quantity' where item_id='$item'";
//    update($q3);
//  // alert('Sucessfully');
//  // return redirect('admin_managepurchase.php');

// }
    
	





}

if (isset($_GET['id'])) 
{
	$qr="update tbl_purchase_master set status='paid' where pur_master_id='$id' ";
	update($qr);
	alert("Items Purchased..");
	return redirect("admin_managepurchase.php");
}

 ?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 700px">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">


 <script type="text/javascript">



function TextOnTextChange()
	{
		var x =document.getElementById("p_amount").value;
		var y =document.getElementById("p_qnty").value;
		var z =document.getElementById("s_amount").value;
		// alert(z)
		// document.getElementById("sp").innerHTML = "mmm : "+x;
		document.getElementById("t_amount").value = x * y;



		
	}


function TextOnTextChanges()
	{
		var x =document.getElementById("p_amount").value;
		var y =document.getElementById("p_qnty").value;
		var z =document.getElementById("s_amount").value;
		// alert(z)
		document.getElementById("sp").innerHTML = "Minimum Selling Price : "+x +"/-";
		document.getElementById("t_amount").value = x * y;
		
	}

	function TextOnTextChangess()
	{
		var x =document.getElementById("p_amount").value;
		var y =document.getElementById("p_qnty").value;
		var z =document.getElementById("s_amount").value;
		// alert(z)
		if(x>x){
			// alert("helloooo")
			document.getElementById("sp").innerHTML = "Minimum Selling Price : "+x;
		}
		
		// document.getElementById("t_amount").value = x * y;
		
	}
</script> 


<center>
<h1>Manage Purchase</h1>
<form method="post" >
	<table class="table" style="width:500px;color: white">
		<tr>
			<th>Vendor</th>
			<td><select name="vendor" class="form-control">
				<option>Select</option>
				<?php 

				$q="select * from tbl_vendor";
				$res=select($q);
				foreach ($res as $row) {
					?>
					<option value="<?php echo $row['vendor_id'] ?>"><?php echo $row['vendor_name'] ?></option>
				<?php 
			}
				 ?>
			</select></td>
		</tr>
		<tr>
			<th>Product</th>
			<td><select name="item" class="form-control">
				<option>Select</option>
				<?php 

				$q="select * from tbl_item";
				$res=select($q);
				foreach ($res as $row) {
					?>
					<option value="<?php echo $row['item_id'] ?>"><?php echo $row['item_name'] ?></option>
				<?php 
			}
				 ?>
			</select></td>
		</tr>
	
		<tr>
			<th>Cost Price</th>
			<td><input type="number" required=""  id="p_amount" onchange="TextOnTextChanges()" class="form-control" name="cost"></td>
		</tr>

		<tr>
			<th>Selling Price</th>
			<td><input type="number" required=""  id="s_amount" onchange="TextOnTextChangess()"  class="form-control" name="sell"><br>
				<p id="sp"></p></td>
		</tr>
		

		<tr>
			<th>Quantity</th>
			<td><input type="number" required="" class="form-control"   id="p_qnty" onchange="TextOnTextChange()" name="quantity"></td>
		</tr>
		

		<tr>
			<th>Total</th>
			<td><input type="number" required="" class="form-control" id="t_amount" name="total"></td>
		</tr>

		<td align="center" colspan="2"><input type="submit" name="purchase" value="OK" class="btn-get-started"></td>
	</table>
</form>
</center>
</div>
</section><!-- End Hero -->
<center>
	<h1>View Purchase Cart</h1>
	<form>
		<table class="table" style="width: 700px">
			<tr>
				<th>No</th>
				<th>Vendor</th>
				<th>Item </th>
				<th>Quantity</th>

				<th>Cost Price</th>
				<!-- <th>total price</th> -->
				
				
				
				


				
			</tr>
			<?php 

     $qr="SELECT * FROM`tbl_purchase_master` INNER JOIN `tbl_purchase_child` USING(`pur_master_id`) INNER JOIN `tbl_vendor` USING(`vendor_id`) INNER JOIN tbl_item USING(item_id) WHERE `tbl_purchase_master`.`status`='pending'";
     $ress=select($qr);
     $sino=1;

    foreach ($ress as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['vendor_name'] ?></td>
    		<td><?php echo $row['item_name'] ?></td>
    		<td><?php echo $row['quantity'] ?></td>
    		<td><?php echo $row['cost_price'] ?></td>
    		
    
    		
    		
    		

    	
    		
    		<!-- <td><a href="?did=<?php echo $row['member_id'] ?>">delete</a></td>
    		<td><a href="?uid=<?php echo $row['member_id'] ?>">update</a></td> -->
    	</tr>
    <?php }




			 ?>
			 <?php
			 if(sizeof($ress)>0)
			 {
			 	?>
			 	<tr>
			 		<td colspan="5" align="right">Grand Total : <?php echo $ress[0]['tot_amount'] ?>/-</td>
			 	</tr>
			 	<tr>
			 		<td colspan="5" align="right"><a href="?id=<?php echo $ress[0]['pur_master_id'] ?>"><b>Confirm Purchase</b></a></td>
			 	</tr>
			 	<?php
			 }  ?>
		</table>
	</form>
</center>
<?php include 'footer.php' ?>