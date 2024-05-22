<?php include 'config.php';
include 'TEACHER_HOME.php';
include 'refresh_prevent.js';

$id = $_SESSION['username'];
      $name="select * from users where Login_id='$id'";
      $NAME=mysqli_query($db,$name);
      $rows1=mysqli_fetch_assoc($NAME);
      $Email=$rows1['Email_id'];
      $class=$rows1['current_class'];


    $display="select * from attendence_info where class='$class' and upload_by='$Email' order by att_id desc";
    $count=0;
    $result=mysqli_query($db,$display);
    
    

   
    
    if($display)
    {
     // echo "result selected";
    }
    
    if(!$display)
    {
      echo "result select failed!!!!!";
    }
    
    
  ?>




<!DOCTYPE html>
<html>
<head>
<style>
table {
  border-collapse: collapse;
  width: 100%;
  border-color:white;
}

th{
  text-align: center;
  padding: 8px;
  color: gray;
  font-size: 15px;
  
}

 td {
  text-align: center;
  padding: 8px;
  border-spacing: 5px;
}

tr:nth-child(even) {background-color: #ffe4b5;}
</style>
</head>
<body>

<center><h1 style="background-color:lightgrey;">Attendence View</h1></center>
<br>
<div style="overflow-x:auto;">
  <table border=1 frame="void">
    <tr>
    <th></th>
    <th >uploaded Date&Time</th>
    <th>Semester</th>
      <th>Subject Name</th>
      <th>Duration of uploading Attendence</th>
      <th>Total Number of Attendence</th>

     
    </tr>


    <?php
$sn=0;
while($rows=mysqli_fetch_assoc($result))
{
 $sn=$sn+1; 
 $email=$rows['upload_by'];
 $display1="select * from tutor where Email_id='$email'";
    //$count=0;
    $result1=mysqli_query($db,$display1);
    $rows1=mysqli_fetch_assoc($result1);
    


?>



    <tr>
      <td> <button href=""> <?php echo $sn;  ?> </button> </td>
      <!--<td> <MARK>  <?php  echo $rows1['Teacher_name'];?>  </mark> <br> <font size="2px"> <?php  echo $rows['current'];?> </font></td>-->
      
      <td><font size="2px"> <?php  echo $rows['upload_date'];?></font> </td>
      <td> <?php  echo $rows['sem'];?> </td>
      <td> <?php  echo $rows['sub'];?>  </td>
      <td>  <?php  echo $rows['duration'];?> </td>
      
      <td> <?php  echo $rows['total_attendence'];?>  </td>
      
      <!--<td><button href="edit student work upload.php?id=<?php echo $rows['work_id']; ?>">Edit</button></td>-->
      <td><button  onclick="window.location.href='edit Attendence teacher upload.php?id=<?php echo $rows['att_id']; ?>'">Edit</button></td>
     <!-- <td><button  onclick="window.location.href='internal upload.php?id=<?php echo $rows['work_id']; ?>'">Internal Upload</button></td>
     <td><a  onClick="<?php $_SESSION['workidid']=$rows['work_id']; ?>"  href="internal upload.php"><b>Internal Upload</b></a></td>
     <td><a href="internal upload.php?id=<?php echo $rows['work_id']; ?>"><b>Internal Upload</b></a></td>-->
     
     <td><a href="att_id_teacher.php?id=<?php echo $rows['att_id']; ?>">Student's Attendence</a></td>
     
    
    </tr>
    <?php

}
//mysqli_close($db);
?>

  </table>
</div>

<!--<script>
  if( window.history.replaceState)
  {
     window.history.replaceState(null, null, window.location.href);
  }
  </script>-->

</body>
</html>