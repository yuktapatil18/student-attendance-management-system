<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Student Attendance Report</title>
  <?php include 'head.php';?>
</head>
<body>

<?php include 'menu.php';?>

<form method="post">
  <table class="table">
    <tr>
      <td>Choose Month</td>
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
      <td>Choose Year</td>
      <td>
        <select name="cmbyear" class="form-control">
          <option>2024</option>
          <option>2025</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>Choose Student</td>
      <td>
        <select class="form-control" name="cmbstudent">
          <option>--Select--</option>
          <?php
          $q = mysqli_query($con, "SELECT * FROM tblstudent");
          while ($r = mysqli_fetch_array($q)) {
            echo "<option value='{$r['sid']}'>{$r['firstname']} {$r['lastname']}</option>";
          }
          ?>
        </select>
      </td>
    </tr>
    <tr>
      <td>Choose Subject</td>
      <td>
        <select class="form-control" name="cmbsubject">
          <option>--Select--</option>
          <?php
          $q = mysqli_query($con, "SELECT * FROM tblsubject");
          while ($r = mysqli_fetch_array($q)) {
            echo "<option value='{$r['subid']}'>{$r['sname']}</option>";
          }
          ?>
        </select>
      </td>
    </tr>
    <tr>
      <td><input type="submit" name="btnshow" value="Show"></td>
    </tr>
  </table>
</form>

<?php
if (isset($_POST['btnshow'])) {
  extract($_POST);
?>

<h1>Attendance Report for Student</h1>

<h3>Present Days: 
<?php  
  $q2 = mysqli_query($con, "SELECT COUNT(*) AS tcount 
                            FROM tblattendance 
                            WHERE sid = '$cmbstudent' 
                            AND subid = '$cmbsubject' 
                            AND MONTH(ddate) = '$cmbmonth' 
                            AND YEAR(ddate) = '$cmbyear'
                            AND status = '1'");

  $r2 = mysqli_fetch_array($q2);
  echo $r2['tcount'];
?>
</h3>

<table class="table">
  <tr>
    <th>Date</th>
    <th>Time</th>
  </tr>

<?php
$q = mysqli_query($con, "SELECT ddate, ttime 
                         FROM tblattendance
                         WHERE sid = '$cmbstudent' 
                         AND subid = '$cmbsubject' 
                         AND MONTH(ddate) = '$cmbmonth' 
                         AND YEAR(ddate) = '$cmbyear'
                         AND status = '1'");

while ($r = mysqli_fetch_array($q)) {
  ?>
    <tr>
      <td><?php echo $r['ddate']; ?></td>
      <td><?php echo $r['ttime']; ?></td>
    </tr>
  <?php
}
?>
</table>

<h3>Absent Days: 
<?php  
  $q2 = mysqli_query($con, "SELECT COUNT(*) AS tcount 
                            FROM tblattendance 
                            WHERE sid = '$cmbstudent' 
                            AND subid = '$cmbsubject' 
                            AND MONTH(ddate) = '$cmbmonth' 
                            AND YEAR(ddate) = '$cmbyear'
                            AND status = '2'");

  $r2 = mysqli_fetch_array($q2);
  echo $r2['tcount'];
?>
</h3>

<table class="table">
  <tr>
    <th>Date</th>
    <th>Time</th>
  </tr>

<?php
$q = mysqli_query($con, "SELECT ddate, ttime 
                         FROM tblattendance
                         WHERE sid = '$cmbstudent' 
                         AND subid = '$cmbsubject' 
                         AND MONTH(ddate) = '$cmbmonth' 
                         AND YEAR(ddate) = '$cmbyear'
                         AND status = '2'");

while ($r = mysqli_fetch_array($q)) {
  ?>
    <tr>
      <td><?php echo $r['ddate']; ?></td>
      <td><?php echo $r['ttime']; ?></td>
    </tr>
  <?php
}
?>
</table>

<?php
}
?>
