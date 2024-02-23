<?php include 'connection.php';
extract($_GET);

 // $r=$_SESSION['res'];
 
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
  <!-- <div id="div_print" > -->
    <div id="div_print" > <div class="logo">
         <!-- <h1 class="text-light" style="color: #E7A099 ; font-family: Freestyle Script Regular;font-size: 40px "><span>Zephyr Fragrances</span></h1> -->
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>
  <div id="div_print" align="right" ><h6 style="margin-right: 1em;padding: 2em;">Date:<?php echo date("Y-m-d"); ?></h6>
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
<h4 style="padding-top: 30px;font-size: 30px">CUSTOMER REPORT</h4>

<!-- <h1>View Sales</h1> --> 
<?php
$q="select * from tbl_customer";
$res=select($q);?>
<table class="table table-striped" style="width: 1000px;color: black;font-size: 14px" border="5">
  <thead>
    <tr>
      <th>No</th>
         <th>Customer</th>
        
           <th>City</th>
        <th>District</th>
                <th>State</th>
        <th>Pincode</th>
        <th>Phone</th><th>Gender</th>
    </tr>
  </thead>
  <tbody>
    <?php 

       
      // $res=$r;
       $slno=1;
       foreach ($res as $row) {
      ?>
        
        
  <td><?php echo $slno++; ?></td>
        <td><?php echo $row['cust_fname'] ?></td>
        
        
        <td><?php echo $row['cust_city'] ?></td>
        <td><?php echo $row['cust_district'] ?></td>
      
        <td><?php echo $row['cust_state'] ?></td>
        <td><?php echo $row['cust_pincode'] ?></td>
        <td><?php echo $row['cust_phone'] ?></td>
        <td><?php echo $row['cust_gender'] ?></td>
    </tr>
     <?php
       }


     ?>
   </tbody>
  </table>
</center>