<?php include 'customerheader.php';
$cid=$_SESSION['cust_id'];
extract($_GET);


 $q1="SELECT * FROM `tbl_cartmaster` INNER JOIN `tbl_cartchild` USING(`cart_master_id`)  INNER JOIN `tbl_item` USING(`item_id`)  INNER JOIN `tbl_brand` USING(`brand_id`) INNER JOIN `tbl_category` USING(`cat_id`) INNER JOIN `tbl_type` USING(`type_id`) WHERE `cust_id`='$cid' AND `status`='Pending'";
$res1=select($q1);
$qq="SELECT * ,COUNT(`cart_child_id`) AS cart_count , SUM(`total_price`) AS ttamount FROM `tbl_cartmaster` INNER JOIN `tbl_cartchild` USING(`cart_master_id`)  WHERE `cust_id`='$cid' AND `status`='Pending'";
$rr=select($qq);

if(isset($_GET['remove_item'])){
    extract($_GET);
     $qu="UPDATE `tbl_cartmaster` SET `total_amount`=`total_amount`- ('$amount' * '$qua') WHERE  `cart_master_id`='$cart_mid'";
    update($qu);
     $qd="DELETE FROM `tbl_cartchild` WHERE `item_id`='$remove_item' AND `cart_master_id`='$cart_mid'";
    delete($qd);

     $g="select * from  tbl_cartmaster where cart_master_id='$cart_mid' and total_amount='0'";
    $hg=select($g);
    if(sizeof($hg)>0)
    {
       $j="delete from tbl_cartmaster where cart_master_id='$cart_mid'";
        delete($j);
        
    }


    alert("Successfully Removed");
    redirect("customer_buy.php");

}




 ?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 300px">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
         </div>
  </section><!-- End Hero -->
<center>
  <h1>View Orders</h1>
  <form>
    <table class="table" style="width: 1000px">
      <tr>
        <th>No</th>
         <th>Date</th>
        <!-- <th>Total Amount</th> -->
        
           <th>Product</th>
        <th>Quantity</th>
                <th>Amount</th>
        <th>Image</th>
               <!--  <th>Status</th> -->
        
      </tr>
      <?php 

     $q="SELECT * FROM `tbl_order` INNER JOIN `tbl_cartmaster` USING (`cart_master_id`)INNER JOIN `tbl_cartchild` USING (cart_master_id) INNER JOIN `tbl_item` USING (item_id) where cust_id='$cid' and status='pending'";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
      <tr>
        <td><?php echo $sino++; ?></td>
        <td><?php echo $row['o_date'] ?></td> 
        <!-- <td><?php echo $row['total_amount'] ?></td> -->
      
        <td><?php echo $row['item_name'] ?></td>
        <td><?php echo $row['qty'] ?></td>
            <td><?php echo $row['total_price'] ?></td>
        <td><img src="<?php echo $row['item_image'] ?>" height="100" width="100"></td>


        <td><a type="button" href="?remove_item=<?php echo $row['item_id']; ?>&cart_mid=<?php echo $row['cart_master_id']; ?>&amount=<?php echo $row['total_price']; ?> &qua=<?php echo $row['qty']; ?>"/><b>Remove</b></td>
      
      <!--  <td><?php echo $row['status'] ?></td> -->

        
            
           
        
           
        

    
      </tr>


     
      
    <?php }




       ?>
<?php 

if (sizeof($res)>0) {
 if ($res[0]['stock']>=$res[0]['qty']){?>
  <tr>
        <td align="center" colspan="8">Total Amount:<?php echo $row['total_amount'] ?><a  class="btn btn-get-started" href="customer_makepayment.php?oid=<?php echo $row['order_id'] ?>&cmid=<?php echo $row['cart_master_id'] ?>&amo=<?php echo $row['total_amount'] ?>"><b>Buy Now</b></a></td>
            
      </tr>
<?php } else{?>

  <center><font><a class="btn btn-get-started" href="#"><b>Sorry..<?php echo $res[0]['item_name'];?> is not available</b></a></font></center>

 <?php }
 } ?>

       
    </table>
  </form>
</center>
<?php include 'footer.php' ?>