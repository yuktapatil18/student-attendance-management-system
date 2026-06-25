<?php
include 'head.php';
mysqli_query($con,"delete from tblclass where cid=".$_GET['id']);
?>
<script type="text/javascript">
	window.location.href="class.php";
</script>