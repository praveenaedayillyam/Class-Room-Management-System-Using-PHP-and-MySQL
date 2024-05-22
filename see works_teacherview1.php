<?php include 'config.php';
include 'TEACHER_HOME.php';


$id = $_SESSION['username'];
      $name="select * from teacher where Login_id='$id'";
      $NAME=mysqli_query($db,$name);
      $rows1=mysqli_fetch_assoc($NAME);
      $Email=$rows1['Email_id'];
      $class=$classroom;


    $display="select * from student_work where class='$class' and upload_by='$Email' order by work_id desc";
    $count=0;
    $result=mysqli_query($db,$display);
    
    

   
    
    if($result)
    {
     // echo "result selected";
    }
    
    if(!$result)
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

<center><h1 style="background-color:lightgrey;">Given Works</h1></center>
<br>
<div style="overflow-x:auto;">
  <table border="1" frame="void">
    <tr>
    <th></th>
      <th>uploaded Date&Time</th>
      <th>Sem</th>
      <th>Subject</th>
      <th>Work</th>
      <th>Topic</th>
      <th>Description</th>
      <th>Last Date of Submission</th>
      <th>OUT OF</th>
      <th></th>
     
    </tr>


    <?php
$sn=0;
while($rows=mysqli_fetch_assoc($result))
{
 $sn=$sn+1; 
 $email=$rows['upload_by'];
 $display1="select * from teacher where Email_id='$email'";
    //$count=0;
    $result1=mysqli_query($db,$display1);
    $rows1=mysqli_fetch_assoc($result1);
    


?>



    <tr>
      <td>  <?php echo $sn;  ?>  </td>
      <!--<td> <MARK>  <?php  echo $rows1['Teacher_name'];?>  </mark> <br> <font size="2px"> <?php  echo $rows['current'];?> </font></td>-->

      <td><font size="2px"> <?php  echo $rows['current'];?></font> </td>
      <td> <?php  echo $rows['sem'];?> </td>
      <td> <?php  echo $rows['subjectname'];?> </td>
      <td> <?php  echo $rows['Work'];?>  </td>
      <td>  <?php  echo $rows['Topic'];?> </td>
      
      <td> <?php  echo $rows['descriptn'];?>  </td>
      <td> <?php  echo $rows['Last_Date'];?>  </td>
      <td> <?php  echo $rows['out_of'];?>  </td>
      <!--<td><button href="edit student work upload.php?id=<?php echo $rows['work_id']; ?>">Edit</button></td>-->
      <td><button  onclick="window.location.href='edit student work upload_teacher.php?id=<?php echo $rows['work_id']; ?>'">Edit</button></td>
     <!-- <td><button  onclick="window.location.href='internal upload.php?id=<?php echo $rows['work_id']; ?>'">Internal Upload</button></td>
     <td><a  onClick="<?php $_SESSION['workidid']=$rows['work_id']; ?>"  href="internal upload.php"><b>Internal Upload</b></a></td>
     <td><a href="internal upload.php?id=<?php echo $rows['work_id']; ?>"><b>Internal Upload</b></a></td>-->
     
     <td width="125px"><a href="work_id_teacher.php?id=<?php echo $rows['work_id']; ?>"><b>Internal Upload</b></a></td>
     
    
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

