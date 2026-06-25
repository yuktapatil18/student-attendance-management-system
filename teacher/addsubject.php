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
if(isset($_POST['btnaddclass'])){
  extract($_POST);
  
 mysqli_query($con,"INSERT INTO `tblsubject`(`sname`, `cid`) VALUES ('$txtsname','$cmbclass')");

}
?>
<div class="row">
  <div class="col-md-8">

<form method="post" enctype="multipart/form-data">
  <table class="table">
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
      <Td>
        Subject Name
      </Td>
      <td>
        <input type="text" name="txtsname" class="form-control" required>
    </td>
  </tr>
    <tr>
      <td colspan="2" align="center">
        <input type="submit" name="btnaddclass" value="Add Subject" class="btn btn-success">
      </td>
    </tr>
  </table>
</form>
</div>
</div>
<?php include 'footer.php';?>
</body>
</html>



   