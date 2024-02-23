<?php include 'adminheader.php' ?>
<section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
<font size="4" face="Lato"  style="color: #FFB6C1">
  <br>
</font>
<font size="4" face="Lato">
<form method="post" align=center>
<table align="left" cellpadding=20  style="color: #FFB6C1">
      
     <tr>
   <td> ID:</td>
    <td><input type="text" name="COURIER_ID" class="form-control"></td>
     </tr>
     <tr>
     <td>User Name:</td>
    <td> <input type="text" name="USERNAME" class="form-control"></td>
    </tr>
  <tr>
    
    <td>Staff ID:</td>
    <td> <input type="text" name="STAFF_ID" class="form-control"></td>
    </tr>
    <tr>
    
    <td>Name:</td>
    <td> <input type="text" name="COURIER_NAME" class="form-control"></td>
    </tr>
    <tr>
    
    <td>Phone:</td>
    <td> <input type="number" name="COURIER_PHONE" class="form-control"></td>
    </tr>
    <tr>
    
    <td>Email:</td>
    <td> <input type="text" name="COURIER_EMAIL" class="form-control"></td>
    </tr>
    <tr>
    
    <td>Location:</td>
    <td> <input type="text" name="C_LOCATION" class="form-control"></td>
    </tr>
     <tr align=center>
      <td colspan="3">  <button type="button" class="btn-get-started">ADD COURIER</button>
    </tr>
</table>
</form>
</font>
</div></div></div></section>
<main id="main">
  <?php include 'courierfooter.php' ?>