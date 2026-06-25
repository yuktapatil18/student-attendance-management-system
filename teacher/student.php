<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <?php include 'head.php';?>
</head>
<body>
<?php include 'menu.php';?>
<a href="addstud.php"><input type="button" class="btn btn-warning" value="Add Student"></a>
<div class="row">
  <div class="col-md-12">
    <table class="table">
      <tr>
       
        <th>
         Class Name
        </th>
        <th>
           Name
        </th>
         <th>
           Email
        </th>
         <th>
           Gender
        </th>
         <th>
           Phone
        </th>
        
         
    </tr>
    <?php
    if($_GET['id']!=null){
    $_SESSION['subid']=$_GET['id'];
  }

      $q=mysqli_query($con,"select * from tblstudent,tblclass where tblstudent.cid=tblclass.cid and tblstudent.cid=".$_SESSION['cid']);
      while ($r=mysqli_fetch_array($q)) {
       
        ?>
        <tr>
          <td><?php echo $r['cname'];?></td>
           <td><?php echo $r['firstname']." ".$r['lastname'];?></td>
           <td><?php echo $r['email'];?></td>
                      <td><?php echo $r['gender'];?></td>
           <td><?php echo $r['phone'];?></td>
 <td>
          <?php
          $color="primary";
          $color2="primary";
          $ddate=date('Y-m-d');
     
          $qry2=mysqli_query($con,"select * from tblattendance where sid='".$r['sid']."' and ddate='$ddate' and subid='".$_SESSION['subid']."'");
          $r2=mysqli_fetch_array($qry2);
      
          if($r2['status']==1){
            
            $color="success";
          }
          else if($r2['status']==2){
            $color2="danger";
          }
          else{
            $color="primary";
            $color2="primary";
          }
         
            ?>
            <a href="attend.php?id=<?php echo $r['sid'];?>&attend=1"><input type="button" value="Present" class="btn btn-<?php echo $color;?>"></a>
           </td>
           <td>
            <a href="attend.php?id=<?php echo $r['sid'];?>&attend=2"><input type="button" value="Absent" class="btn btn-<?php echo $color2;?>"></a>
          </td>
           <Td><a href="deletestudent.php?id=<?php echo $r['sid'];?>"><input type="button" value="Delete" class="btn btn-danger"></a></Td>

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



   