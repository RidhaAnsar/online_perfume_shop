<?php include 'adminheader.php';
 
extract($_GET);



 ?>
<!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 700px">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
<center>
  <h1>Search  Sales</h1>
  <form method="post">
    <table border="10" style="color: black;width: 100px">

  
       <td style="color: white"><input type="date" name="daily" > Date </td>
        <td  style="color: white"> <input type="month" name="monthly"> Month</td>
        <td  style="color: white"> <input type="text" name="cusname">Customer  </td>

     <tr>
       <td align="center" colspan="3"><input type="submit" name="sale" class="btn btn-get-started" value="submit"></td>
      </tr>
    

      </tr>
    </table>
  </form>
</center>


 </div>
  </section><!-- End Hero -->





<center>
	<h1 style="color: white">View Sales</h1>
 
	<table class="table" style="width: 800px;color: black">
		<tr>
			<th>No</th>
         <th>Date</th>
      <th>Customer</th>
        
           <th>Product</th>
        <th>Quantity</th>
                <th>Status</th>
         
		</tr>
		<?php 
         if (isset($_POST['sale'])) {
           extract($_POST);
           // echo $monthly;
           if ($daily!="") {
             // "hi";
           $q="SELECT * FROM `tbl_order` INNER JOIN `tbl_cartmaster` USING (`cart_master_id`)INNER JOIN `tbl_cartchild` USING (cart_master_id) INNER JOIN `tbl_customer` USING(`cust_id`) INNER JOIN `tbl_item` USING (item_id)  where o_date='$daily' and status='paid' ";
           }
            else if ($monthly!="") {

            
             $q="SELECT * FROM `tbl_order` INNER JOIN `tbl_cartmaster` USING (`cart_master_id`)INNER JOIN `tbl_cartchild` USING (cart_master_id) INNER JOIN `tbl_customer` USING(`cust_id`) INNER JOIN `tbl_item` USING (item_id)  where o_date like '$monthly%' and status='paid' ";

             }
             else if ($cusname!="") {

            
             $q="SELECT * FROM `tbl_order` INNER JOIN `tbl_cartmaster` USING (`cart_master_id`)INNER JOIN `tbl_cartchild` USING (cart_master_id) INNER JOIN `tbl_customer` USING(`cust_id`) INNER JOIN `tbl_item` USING (item_id) where cust_fname like '$cusname%'and status='paid' ";
             }
           }
             else{
             $q="SELECT * FROM `tbl_order` INNER JOIN `tbl_cartmaster` USING (`cart_master_id`)INNER JOIN `tbl_cartchild` USING (cart_master_id) INNER JOIN `tbl_customer` USING(`cust_id`) INNER JOIN `tbl_item` USING (item_id) where status='paid' ";
            }

                $res=select($q);
                $_SESSION['res']=$res;
                $r=$_SESSION['res'];

       $slno=1;
       foreach ($res as $row) {
       	?>
    <tr>
    	<td><?php echo $slno++; ?></td>
    	
    
        <td><?php echo $row['o_date'] ?></td>
        <td><?php echo $row['cust_fname'] ?></td>
        
        <td><?php echo $row['item_name'] ?></td>
        <td><?php echo $row['qty'] ?></td>
      
        <td><?php echo $row['status'] ?></td>
        
    </tr>
  
     <?php
       }


		 ?>
      
	</table>
  <h2><a class="btn btn-get-started" href="sales.php"><b>Print</b></a></h2>
</center>
<?php include 'footer.php' ?>