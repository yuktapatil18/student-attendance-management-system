<!DOCTYPE html> 
<html>
<head>
  <meta charset="utf-8">
  <title>Monthly Absent Report</title>
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
          <?php for ($i = 1; $i <= 12; $i++) {
            $month = str_pad($i, 2, "0", STR_PAD_LEFT);
            echo "<option value='$month'>$month</option>";
          } ?>
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
      <td>Choose Class</td>
      <td>
        <select class="form-control" name="cmbclass">
          <option>--Select--</option>
          <?php
          $q = mysqli_query($con, "SELECT * FROM tblclass");
          while ($r = mysqli_fetch_array($q)) {
            echo "<option value='{$r['cid']}'>{$r['cname']}</option>";
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
  <h1>Total Absent Students =
  <?php
  $q2 = mysqli_query($con, "SELECT COUNT(*) as 'tcount' FROM tblstudent 
    JOIN tblclass ON tblstudent.cid = tblclass.cid 
    JOIN tblattendance ON tblattendance.sid = tblstudent.sid 
    WHERE status = '2' AND tblstudent.cid = '$cmbclass' 
    AND MONTH(tblattendance.ddate) = '$cmbmonth' 
    AND YEAR(tblattendance.ddate) = '$cmbyear'");
  $r2 = mysqli_fetch_array($q2);
  echo $r2['tcount'];
  ?>
  </h1>

  <table class="table">
    <tr>
      <th>Student Name</th>
      <th>Student Email</th>
      <th>Student Class</th>
      <th>Gender</th>
      <th>Phone</th>
      <th>Date</th>
      <th>Time</th>
      <th>Subject</th>
    </tr>
    <?php
    $q = mysqli_query($con, "SELECT * FROM tblstudent 
      JOIN tblclass ON tblstudent.cid = tblclass.cid 
      JOIN tblattendance ON tblattendance.sid = tblstudent.sid 
      JOIN tblsubject ON tblsubject.subid = tblattendance.subid 
      WHERE status = '2' AND tblstudent.cid = '$cmbclass' 
      AND MONTH(tblattendance.ddate) = '$cmbmonth' 
      AND YEAR(tblattendance.ddate) = '$cmbyear'");
    
    while ($r = mysqli_fetch_array($q)) {
      ?>
      <tr>
        <td><?php echo $r['firstname'] . " " . $r['lastname']; ?></td>
        <td><?php echo $r['email']; ?></td>
        <td><?php echo $r['cname']; ?></td>
        <td><?php echo $r['gender']; ?></td>
        <td><?php echo $r['phone']; ?></td>
        <td><?php echo $r['ddate']; ?></td>
        <td><?php echo $r['ttime']; ?></td>
        <td><?php echo $r['sname']; ?></td>
      </tr>
      <?php
    }
    ?>
  </table>
  <?php
}
?>
</body>
</html>