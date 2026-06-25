<!DOCTYPE html> 
<html>
<head>
  <meta charset="utf-8">
  <title>Attendance Report</title>
  <?php include 'head.php'; ?>
</head>
<body>
<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>

<form method="post">
  <table class="table">
    <tr>
      <td>Choose Month</td>
      <td>
        <select name="cmbmonth" class="form-control">
          <?php for ($i = 1; $i <= 12; $i++) { 
            $month = str_pad($i, 2, "0", STR_PAD_LEFT); ?>
            <option value="<?= $month; ?>"><?= $month; ?></option>
          <?php } ?>
        </select>
      </td>
    </tr>
    <tr>
      <td>Choose Year</td>
      <td>
        <select name="cmbyear" class="form-control">
          <option value="2024">2024</option>
          <option value="2025">2025</option>
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

  // Debugging: Show Selected Month & Year
  echo "<h3>Showing data for: $cmbmonth-$cmbyear</h3>";

  // ✅ Fix Present Attendance Count
  $q2 = mysqli_query($con, "SELECT COUNT(*) AS tcount 
                            FROM tblattendance 
                            WHERE status='1' 
                            AND sid='" . $_SESSION['sid'] . "' 
                            AND DATE_FORMAT(ddate, '%Y-%m') = '$cmbyear-$cmbmonth'");
  $r2 = mysqli_fetch_array($q2);
?>

<h1>Present Attendance = <?= $r2['tcount']; ?></h1>

<table class="table">
  <tr>
    <th>Class</th>
    <th>Date</th>
    <th>Time</th>
    <th>Subject</th>
  </tr>

  <?php
  $q = mysqli_query($con, "SELECT tblclass.cname, tblattendance.ddate, tblattendance.ttime, tblsubject.sname 
                           FROM tblattendance 
                           JOIN tblstudent ON tblattendance.sid = tblstudent.sid 
                           JOIN tblclass ON tblstudent.cid = tblclass.cid 
                           JOIN tblsubject ON tblattendance.subid = tblsubject.subid 
                           WHERE tblattendance.status='1' 
                           AND tblstudent.sid='" . $_SESSION['sid'] . "' 
                           AND DATE_FORMAT(tblattendance.ddate, '%Y-%m') = '$cmbyear-$cmbmonth'");
  
  while ($r = mysqli_fetch_array($q)) { ?>
    <tr>
      <td><?= $r['cname']; ?></td>
      <td><?= $r['ddate']; ?></td>
      <td><?= $r['ttime']; ?></td>
      <td><?= $r['sname']; ?></td>
    </tr>
  <?php } ?>
</table>

<?php
  // ✅ Fix Absent Attendance Count
  $q2 = mysqli_query($con, "SELECT COUNT(*) AS tcount 
                            FROM tblattendance 
                            WHERE status='2' 
                            AND sid='" . $_SESSION['sid'] . "' 
                            AND DATE_FORMAT(ddate, '%Y-%m') = '$cmbyear-$cmbmonth'");
  $r2 = mysqli_fetch_array($q2);
?>

<h1>Absent Attendance = <?= $r2['tcount']; ?></h1>

<table class="table">
  <tr>
    <th>Class</th>
    <th>Date</th>
    <th>Time</th>
    <th>Subject</th>
  </tr>

  <?php
  $q = mysqli_query($con, "SELECT tblclass.cname, tblattendance.ddate, tblattendance.ttime, tblsubject.sname 
                           FROM tblattendance 
                           JOIN tblstudent ON tblattendance.sid = tblstudent.sid 
                           JOIN tblclass ON tblstudent.cid = tblclass.cid 
                           JOIN tblsubject ON tblattendance.subid = tblsubject.subid 
                           WHERE tblattendance.status='2' 
                           AND tblstudent.sid='" . $_SESSION['sid'] . "' 
                           AND DATE_FORMAT(tblattendance.ddate, '%Y-%m') = '$cmbyear-$cmbmonth'");
  
  while ($r = mysqli_fetch_array($q)) { ?>
    <tr>
      <td><?= $r['cname']; ?></td>
      <td><?= $r['ddate']; ?></td>
      <td><?= $r['ttime']; ?></td>
      <td><?= $r['sname']; ?></td>
    </tr>
  <?php } ?>
</table>

<?php } ?>
</body>
</html>
