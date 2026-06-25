<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<?php include 'head.php';?>
</head>
<body>
<?php include 'menu.php';?>
<?php

if(isset($_POST['btnsave'])){
  extract($_POST);

$q1=mysqli_query($con,"select count(*) as 'tcount' from tblstudent where cid='$cmbclass'");
$r1=mysqli_fetch_array($q1);
echo "No of Students=".$r1['tcount'];
  if($r1['tcount']<=60){
  mysqli_query($con,"INSERT INTO `tblstudent`(`firstname`, `lastname`, `email`, `upass`, `gender`, `phone`,`cid`) VALUES ('$txtfname','$txtlname','$txtemail','$txtpass','$rbgender','$txtphone','$cmbclass')");
  ?>
  <script type="text/javascript">
    alert("Registration Successfull");
    window.location.href="student.php";
  </script>
  
  <?php
  }
  else{
    ?>
<script type="text/javascript">
  alert("Count of students cannot be more than 60");
</script>
    <?php
  }
  ?>
  <?php
}
?>
<div class="row">
  <div class="col-md-3">
  </div>
  <div class="col-md-6">
    <form method="post">
    <table class="table">
      <tr>
        <td>
          First Name
        </td>
        <td>
          <input type="text" class="form-control" required name="txtfname">
        </td>
      </tr>
      <tr>
        <td>
          Last Name
        </td>
        <td>
          <input type="text" class="form-control" required name="txtlname">
        </td>
      </tr>
      <tr>
        <td>
          Email
        </td>
        <td>
          <input type="email" class="form-control" required name="txtemail">
        </td>
      </tr>
      <tr>
        <td>
          Password
        </td>
        <td>
          <input type="password" class="form-control" required name="txtpass">
        </td>
      </tr>
       <tr>
        <td>
          Gender
        </td>
        <td>
          <input type="radio" name="rbgender" value="Male">Male
          <input type="radio" name="rbgender" value="Female">Female
        </td>
      </tr>
      <tr>
      <Td>
        Choose Class
      </Td>
      <td>
        <select class="form-control" name="cmbclass">
          <option>--Select--</option>
         <?php
          $q=mysqli_query($con,"select * from tblclass");
          while ($r=mysqli_fetch_array($q)) {
           echo "<option value=".$r['cid'].">".$r['cname']."</option>";
          }
          ?>
        </select>
      </td>
    </tr>
       <tr>
        <td>
          Phone
        </td>
        <td>
          <input type="text" pattern="\d{10}" class="form-control" required name="txtphone">
        </td>
      </tr>
      <Tr>
        <tD colspan=2 align=center>
          <input type="submit" class="btn btn-success btn-rounded" name="btnsave" value="Register">


        </tD>
      </Tr>
    </table>
  </form>
  </div>
  <div class="col-md-3">
  </div>
<?php include 'footer.php';?>
</body>
</html>