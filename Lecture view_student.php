<!DOCTYPE html>
<html>



<?php include 'config.php';
include 'STUDENT_HOME.php';


$id = $_SESSION['username'];
      $name="select * from student where Login_id='$id'";
      $NAME=mysqli_query($db,$name);
      $rows1=mysqli_fetch_assoc($NAME);
      $Email=$rows1['Email_id'];
      $class=$classroom;


    $display="select * from lecture where class='$class' order by id_no desc";
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









<head>
<style>
table {
  border-collapse: collapse;
  width: 100%;
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

tr:nth-child(even) {background-color: #ffe4b5; }
</style>
</head>
<body>

<center><h1 style="background-color:lightgrey;">Lecture Schedules</h1></center>
<br>
<div style="overflow-x:auto;">



<table border="1" bordercolor="white">
    <tr>
    <th></th>
    <th></th>
      <th>Date</th>
      <th>Time</th>
      <th>Subject</th>
      <th>Link</th>
      <th>Link Code</th>
      <th>Discription</th>
     
     
    </tr>


<?php
$sn=0;
while($rows=mysqli_fetch_assoc($result))
{
 $sn=$sn+1; 
 $email=$rows['upload_by'];
 $display1="select * from users where Email_id='$email'";
    //$count=0;
    $result1=mysqli_query($db,$display1);
    $rows1=mysqli_fetch_assoc($result1);
    


?>

    <tr>
    <td> <?php echo $sn; ?> </td>
       <TD><MARK>  <?php  echo $rows1['username'];?>  </mark> <br> <font size="2px"> <?php  echo $rows['current'];?> </font></TD>
      <td> <?php  echo $rows['lec_date'];?> </td>
      <td><?php  echo $rows['lec_time'];?> </td>
      <td> <?php  echo $rows['lec_subject'];?></td>
      <td><?php  echo $rows['link'];?> </td>
      <td><?php  echo $rows['link_code'];?> </td>
      <td> <?php  echo $rows['lec_description'];?></td>
    </tr>

 <?php

}
mysqli_close($db);
?>

   
  </table>
</div>


<script>
  if( window.history.replaceState)
  {
     window.history.replaceState(null, null, window.location.href);
  }
  </script>




</body>
</html>

