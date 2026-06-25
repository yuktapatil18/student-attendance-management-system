<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <?php include 'head.php';?>
</head>
<body>
<?php include 'menu.php';?>
<a href="addclass.php"><input type="button" class="btn btn-warning" value="Add Class"></a>
<div class="row">
  <div class="col-md-12">
    <table class="table">
      <tr>
         <th>
          Class Id
        </th>
        <th>
          Class Name
        </th>
    </tr>
    <?php
      $q=mysqli_query($con,"select * from tblclass order by cid");
      while ($r=mysqli_fetch_array($q)) {
       
        ?>
        <tr>
          <td><?php echo $r['cid']; ?></td>
           <td><?php echo $r['cname'];?></td>
            <Td><a href="subject.php?id=<?php echo $r['cid'];?>"><input type="button" value="Choose Subject" class="btn btn-primary"></a></Td>
           <Td><a href="deleteclass.php?id=<?php echo $r['cid'];?>"><input type="button" value="Delete" class="btn btn-danger"></a></Td>
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



   