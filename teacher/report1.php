<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <?php include 'head.php';?>
</head>
<body>
<?php include 'menu.php';?>
<h1>Total Students=
<?php  $q1=mysqli_query($con,"select count(*) as 'tcount' from tblstudent,tblclass where tblstudent.cid=tblclass.cid");
$r1=mysqli_fetch_array($q1);
echo $r1['tcount'];
      
?>
</h1>
<div class="row">
  <div class="col-md-12">
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
         
    </tr>
    <?php
      $q=mysqli_query($con,"select * from tblstudent,tblclass where tblstudent.cid=tblclass.cid");
      while ($r=mysqli_fetch_array($q)) {
       
        ?>
        <tr>
          <td><?php echo $r['firstname']." ".$r['lastname'];?></td>
          <td><?php echo $r['email'];?></td>
         
          <td><?php echo $r['cname'];?></td>
             <td><?php echo $r['gender'];?></td>
           <td><?php echo $r['phone'];?></td>
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



   