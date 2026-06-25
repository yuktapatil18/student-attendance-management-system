<?php
include 'head.php';
mysqli_query($con,"delete from tblstudent where sid=".$_GET['id']);
?>
<script type="text/javascript">
	window.location.href="student.php";
</script>