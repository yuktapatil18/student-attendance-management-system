<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <?php include 'head.php';?>
</head>
<body>
<?php include 'menu.php';?>
<a href="addsubject.php"><input type="button" class="btn btn-warning" value="Add Subject"></a>
<div class="row">
  <div class="col-md-12">
    <table class="table">
      <tr>
         <th>
          Subject Id
        </th>
        <th>
         Class Name
        </th>
        <th>
          Subject Name
        </th>
         
    </tr>
    <?php
    $_SESSION['cid']=$_GET['id'];
      $q=mysqli_query($con,"select * from tblsubject,tblclass where tblclass.cid=tblsubject.cid and tblsubject.cid=".$_GET['id']);
      while ($r=mysqli_fetch_array($q)) {
       
        ?>
        <tr>
          <td><?php echo $r['subid'];?></td>
           <td><?php echo $r['cname'];?></td>
           <td><?php echo $r['sname'];?></td>
           <Td><a href="student.php?id=<?php echo $r['subid'];?>"><input type="button" value="Choose Student" class="btn btn-primary"></a></Td>
           <Td><a href="deletesubject.php?id=<?php echo $r['subid'];?>"><input type="button" value="Delete" class="btn btn-danger"></a></Td>
        </tr>
        <?php
      }

    ?>
    </table>
  </div>
</div>
<?php include 'footer.php';?>
</body>
</html>



   