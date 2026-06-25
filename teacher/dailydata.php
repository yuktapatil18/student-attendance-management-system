<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    
    <?php include 'head.php'; ?> <!-- Ensure this includes DB connection -->
</head>
<body>

<?php include 'menu.php'; ?>

<h2>Today's Attendance</h2>
<?php
// Get today's date
$today_date = date('Y-m-d');

// Fetch all subjects
$q_subjects = mysqli_query($con, "SELECT * FROM tblsubject");

while ($subject = mysqli_fetch_array($q_subjects)) {
    $subject_id = $subject['subid'];
    $subject_name = $subject['sname'];
    
    // Fetch attendance for the subject
    $q_attendance = mysqli_query($con, "SELECT tblstudent.firstname, tblstudent.lastname, 
                                               tblclass.cname, tblattendance.ddate, tblattendance.ttime, tblattendance.status 
                                        FROM tblattendance
                                        INNER JOIN tblstudent ON tblattendance.sid = tblstudent.sid
                                        INNER JOIN tblclass ON tblstudent.cid = tblclass.cid
                                        WHERE tblattendance.subid = '$subject_id' 
                                        AND tblattendance.ddate = '$today_date'");

    // Check if there are records for this subject
    if (mysqli_num_rows($q_attendance) > 0) {
        echo "<h3>Subject: $subject_name</h3>";
        echo "<table class='table'>
                <tr>
                    <th>Student Name</th>
                    <th>Class</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                </tr>";

        while ($attendance = mysqli_fetch_array($q_attendance)) {
            echo "<tr>
                    <td>{$attendance['firstname']} {$attendance['lastname']}</td>
                    <td>{$attendance['cname']}</td>
                    <td>{$attendance['ddate']}</td>
                    <td>{$attendance['ttime']}</td>
                    <td>" . ($attendance['status'] == '1' ? 'Present' : 'Absent') . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<h3>Subject: $subject_name</h3><p>No attendance records found for today.</p>";
    }
}
?>

<?php include 'footer.php'; ?>
</body>
</html>
