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
if(isset($_POST['btnaddcat'])){
  extract($_POST);
  mysqli_query($con,"INSERT INTO `tblclass`(`cname`) VALUES ('$txtcname')");
  ?>
  <script type="text/javascript">
    alert("Record Added Successfully");
  </script>
  <?php
}
?>
<div class="row">
  <div class="col-md-8">
<form method="post">
  <table class="table">
    <Tr>
      <TD>
        Class Name
      </TD>
      <td>
        <input type="text" class="form-control" name="txtcname">
      </td>
    </Tr>
    <tr>
      <td colspan="2" align="center">
        <input type="submit" name="btnaddcat" value="Add Class" class="btn btn-success">
      </td>
    </tr>
  </table>
</form>
</div>
</div>
<?php include 'footer.php';?>
</body>
</html>



   