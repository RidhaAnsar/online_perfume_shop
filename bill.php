<?php include 'connection.php';
 $cid=$_SESSION['cust_id'];
extract($_GET)

 ?>
 <link href="bootstrap-4.1.3/css/bootstrap.css" rel="stylesheet">
<script> 
    function printDiv() { 
      var divContents = document.getElementById("div_print").innerHTML; 
      var a = window.open('', '', 'height=500, width=500'); 
      a.document.write(divContents); 
      a.document.close(); 
      a.print(); 
    } 
  </script> 
<body onload="printDiv()">
    <div id="div_print" > <div class="logo">
         <!-- <h1 class="text-light" style="color: #E7A099 ; font-family: Freestyle Script Regular;font-size: 40px "><span>Zephyr Fragrances</span></h1> -->
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>
  <div id="div_print" align="right" ><h6 style="margin-right: 1em;padding: 2em;">Date:<?php echo date("Y-m-d"); ?></h6></div>
<center>
 <h2>Zephyr Fragrances</h2>
            <p>
              A108 Adam Street, 
              Ernakulam, 
              Kerala, 
              India <br><br>
              <strong>Phone:</strong> +91 6238673277<br> +91 778788260<br>
              <strong>Email:</strong> zephfragrances@gmail.com<br> zephperfumes@gmail.com<br> 
            </p> 
<h4 style="padding-top: 30px;font-size: 30px">INVOICE</h4>

<!-- <h1>View Sales</h1> -->
<table   class="table table-striped" style="width: 1000px;color: black;font-size: 14px" border="5">
  <thead>
   <tr>
        <th>No</th>
         <th>Date</th>
        <!-- <th>Total Amount</th> -->
        
           <th>Product</th>
        <th>Quantity</th>
                
        <!-- <th>Image</th> -->
        <th>Amount</th>
               <!--  <th>Status</th> -->
        
      </tr>
    </thead>
    <tbody>
      <?php 

     $q="SELECT * FROM `tbl_order` INNER JOIN `tbl_cartmaster` USING (`cart_master_id`)INNER JOIN `tbl_cartchild` USING (cart_master_id) INNER JOIN `tbl_customer` USING (`cust_id`) INNER JOIN `tbl_item` USING (item_id) where cust_id='$cid' and status!='pending'  and order_id='$oid' ";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
      <tr>
        <td><?php echo $sino++; ?></td>
        <td><?php echo $row['o_date'] ?></td> 
        <!-- <td><?php echo $row['total_amount'] ?></td> -->
      
        <td><?php echo $row['item_name'] ?></td>
        <td><?php echo $row['qty'] ?></td>
            
        <!-- <td><img src="<?php //echo $row['item_image'] ?>" height="100" width="100"></td> -->
        <td><?php echo $row['total_price'] ?></td></tr>
     <?php
       }


     ?>
     <tr > <th colspan="4" align="left">  </th>
      <td colspan="" align="left"><b>Total amount : <?php echo $row['total_amount'] ?></b></td></tr>
</tbody>
  </table>
</center>