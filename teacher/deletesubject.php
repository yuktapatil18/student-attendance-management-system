<?php
include 'head.php';
mysqli_query($con,"delete from tblsubject where subid=".$_GET['id']);
?>
<script type="text/javascript">
	window.location.href="subject.php";
</script>