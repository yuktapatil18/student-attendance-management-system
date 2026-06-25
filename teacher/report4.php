<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <?php include 'head.php';?>
</head>
<body>

<?php include 'menu.php';?>

<form method="post">
  <table class="table">
    <tr>
      <td>
        Choose Month
      </td>
      <td>
        <select name="cmbmonth" class="form-control">
          <option>01</option>
          <option>02</option>
          <option>03</option>
          <option>04</option>
          <option>05</option>
          <option>06</option>
          <option>07</option>
          <option>08</option>
          <option>09</option>
          <option>10</option>
          <option>11</option>
          <option>12</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>
        Choose Year
      </td>
      <td>
        <select name="cmbyear" class="form-control">
          <option>2024</option>
          <option>2025</option>
        </select>
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
        Choose Date
      </td>
      <Td>
        <input type="date" name="txtdate" class="form-control">
      </Td>
    </tr>
    <tr>
      <Td>
        <input type="submit" name="btnshow" value="Show">
      </Td>
    </tr>
  </table>
</form>
<?php
if(isset($_POST['btnshow'])){
  extract($_POST);
?>
<h1>Total Present Students=
<?php  $q2=mysqli_query($con,"select count(*) as 'tcount' from tblstudent,tblclass,tblattendance where tblstudent.cid=tblclass.cid and tblattendance.sid=tblstudent.sid and status='1' and ddate='$txtdate' and tblstudent.cid='$cmbclass'");
$r2=mysqli_fetch_array($q2);
echo $r2['tcount'];
      
?>
</h1>
<table class="table">
      <tr>
         <th>
          Student Name
        </th>
        <th>
         Student Email
        </th>
        <th>
          Student Class
        </th>
           <th>
          Gender
        </th>
           <th>
          Phone
        </th>
         <th>
          Date
        </th>
        <th>
          Time
        </th>
        <th>
          Subject
        </th>

<?php
$q=mysqli_query($con,"select * from tblstudent,tblclass,tblattendance,tblsubject where tblsubject.subid=tblattendance.subid and tblstudent.cid=tblclass.cid and tblattendance.sid=tblstudent.sid and ddate='$txtdate' and status='1' and tblstudent.cid='$cmbclass'");
while ($r=mysqli_fetch_array($q)) {
  $z=explode("-", $r['ddate']);
  if($cmbmonth==$z[1] && $cmbyear==$z[0]){
  ?>

    <tr>
        <td><?php echo $r['firstname']." ".$r['lastname'];?></td>
          <td><?php echo $r['email'];?></td>
         
          <td><?php echo $r['cname'];?></td>
             <td><?php echo $r['gender'];?></td>
           <td><?php echo $r['phone'];?></td>
           <td><?php echo $r['ddate'];?></td>
           <td><?php echo $r['ttime'];?></td>
           <td><?php echo $r['sname'];?></td>
</tr>
  <?php
}
}
?>


</table>
<?php
}
?>