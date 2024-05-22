
<?php include 'config.php';
include 'STUDENT_HOME.php';
include 'refresh_prevent.js';

$id = $_SESSION['username'];
      $name="select * from users where Login_id='$id'";
      $NAME=mysqli_query($db,$name);
      $rows1=mysqli_fetch_assoc($NAME);
      $Email=$rows1['Email_id'];
      $class=$rows1['current_class'];


    $display="select * from attendence where student='$Email' order by att_id desc";
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
    <th ></th>
    <th>Semester</th>
      <th>Subject Name</th>
      <th>Duration of Attendence</th>
      
      <th>MY Attendence</th>
      <th>Total Number of Attendence</th>
      <th>MY Attendence in Persentage(%)</th>

     
    </tr>


    <?php
$sn=0;
while($rows=mysqli_fetch_assoc($result))
{
 $sn=$sn+1; 
 $id_id=$rows['att_id'];
 $display1="select * from attendence_info where att_id='$id_id'";
    //$count=0;
    $result1=mysqli_query($db,$display1);
    $rows1=mysqli_fetch_assoc($result1);
    
    $email=$rows1['upload_by'];
    $display1="select * from teacher where Email_id='$email'";
       //$count=0;
       $result2=mysqli_query($db,$display1);
       $rows2=mysqli_fetch_assoc($result2);

?>



    <tr>
      <td> <button href=""> <?php echo $sn;  ?> </button> </td>
      <!--<td> <MARK>  <?php  echo $rows2['Teacher_name'];?>  </mark> <br> <font size="2px"> <?php  echo $rows['current'];?> </font></td>-->
      
      <td><font size="2px"> <MARK><?php  echo $rows2['Teacher_name'];?>  </mark><br> <?php  echo $rows1['upload_date'];?></font> </td>
      <td> <?php  echo $rows1['sem'];?> </td>
      <td> <?php  echo $rows1['sub'];?>  </td>
      <td>  <?php  echo $rows1['duration'];?> </td>
      
      
      
      <td> <?php  echo $rows['no_of_attendence'];?> <br> <font size="1px"><?php  echo $rows['upload_date'];?> </font> </td>

      <td> <?php  echo $rows1['total_attendence'];?>    </td>

      <td>  <?php  echo $rows['percentage']." %";?> </td>
    
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