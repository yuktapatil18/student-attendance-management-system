<?php
include 'head.php';
$ddate=date('Y-m-d');
$ttime=date('H:i:s');
$qry=mysqli_query($con,"select * from tblattendance where sid='".$_GET['id']."' and ddate='$ddate' and subid='".$_SESSION['subid']."'");
if(mysqli_num_rows($qry)==0){
if($_GET['attend']==1){

	mysqli_query($con,"insert into tblattendance(sid,subid,ddate,ttime,status,tid)values('".$_GET['id']."','".$_SESSION['subid']."','$ddate','$ttime','1','".$_SESSION['tid']."')");
}
else{
	mysqli_query($con,"insert into tblattendance(sid,subid,ddate,ttime,status,tid)values('".$_GET['id']."','".$_SESSION['subid']."','$ddate','$ttime','2','".$_SESSION['tid']."')");
}
?>
	<script>
		alert("Attendance is applied");
		window.location.href="student.php";
	</script>
	<?php
}
else{
	?>
	<script>
		alert("Attendance is already applied");
		window.location.href="student.php";
	</script>
	<?php
}
?>