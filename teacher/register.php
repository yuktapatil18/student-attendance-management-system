<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<?php include 'head.php';?>
</head>
<body>
    <?php include 'menu.php';?>
  <br>
  <br>   

<h1 align="center">Teacher Registeration | <a class="nav-item nav-link" href="index.php">Click here for Teacher Login</a></a></h1>
<hr>
<?php

if(isset($_POST['btnsave'])){
  extract($_POST);
  mysqli_query($con,"INSERT INTO `tblteacher`(`firstname`, `lastname`, `email`, `upass`, `gender`, `phone`) VALUES ('$txtfname','$txtlname','$txtemail','$txtpass','$rbgender','$txtphone')");
  ?>
  <script type="text/javascript">
    alert("Registration Successfull");
    window.location.href="index.php";
  </script>
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