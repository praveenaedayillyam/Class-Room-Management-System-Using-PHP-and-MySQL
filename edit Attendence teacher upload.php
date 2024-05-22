<?php
session_start(); 

//include "refresh_prevent.js";
include "config.php";
$id1=$_REQUEST['id'];
//echo $id1;


$query="select * from attendence_info where att_id='$id1'";
$result=mysqli_query($db,$query);

if($query)
{
 //echo "result selected";
}

if(!$query)
{
  echo "result select failed!!!!!";
}


?>








<!DOCTYPE html>
<html>
<head>
<style> 


label{ font-weight: italic; color: #696969;}



button {
  background-color: blue;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 10%;
  font-size:20px;
  border-radius:50%;
  
}

button:hover {
  opacity: 0.8;
}



</style>
</head>
<body>
<center>

<pre align="right"><a href="see works_teacherview_1.php" ><b><font size="6px" color="red">Back</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</pre>


<center><h1 style="background-color:lightgrey;">Edit Students Attendence Upload</h1></center>

<form id="attendence" method="post" action="edit Attendence teacher upload.php">

<table cellspacing="7px"cellpading="7px" width=600px>


<?php
$rows=mysqli_fetch_assoc($result);

?>


<tr>  <td><label for="sem">Semester</label></td>
    <td><select id="sem" name="sem" required>
    <option value="<?php  echo $rows['sem'];?>" selected><?php  echo $rows['sem'];?></option>
    <option value="1<sup>st</sup> sem">1<sup>st</sup> Sem</option>
    <option value="2<sup>nd</sup> sem">2<sup>nd</sup> Sem</option>
    <option value="3<sup>rd</sup> sem">3<sup>rd</sup> Sem</option>
    <option value="4<sup>th</sup> sem">4<sup>th</sup> Sem</option>
    <option value="5<sup>th</sup> sem">5<sup>th</sup> Sem</option>
    <option value="6<sup>th</sup> sem">6<sup>th</sup> Sem</option>
    
    </select>
    
    </td>
    
</tr>



<tr>
    <td><label for="subject">Subject Name</label></td>
    <td><input type="text" id="subject" name="subject" value="<?php echo $rows['sub']; ?>"></td>
</tr>




<tr>
    <td><label for="duration">Duration of uploading Attendence</label></td>
    <td><input type="text" id="duration" name="duration" value="<?php echo $rows['duration']; ?>"></td>
</tr>

<tr>
    <td><label for="totalattendence">Total Number of Attendence</label></td>
    <td> <input type="text" id="totalattendence" name="totalattendence" value="<?php echo $rows['total_attendence']; ?>"></td>
</tr>


<tr>
   
    <td><input value="<?php echo $id1 ?>" type="text" id="idno" name="idno" readonly hidden></td>
</tr>




</table><br><br>
<div>
  <button type="submit" name="submit">Update</button></div>
</form>
</center>





<?php


if(isset($_POST['submit']))
{
    
      //echo "1234";
      //$Date = $_POST['date'];
      //$time = $_POST['time'];
      $Subject= $_POST['subject'];
      $duration = $_POST['duration'];
      $total = $_POST['totalattendence'];
      //$class =$_POST['class'];
      $sem=$_POST['sem'];
      $idno=$_POST['idno'];
     // $current=date('d-m-y');
     // $uploadby=$rows1['Email_id'];


     $st2=mysqli_query($db,"UPDATE attendence_info set sub='$Subject',duration='$duration',total_attendence='$total',sem='$sem' where att_id='$idno'");

     if($st2)
     {

     echo "<script>
     alert('Updated Successfully')
     window.location.href='see attendence_teacherview_1.php'
     </script>";
   
    }
   
   
   
   if(!$st2)
   {
   
     echo "<script>
     alert('Failed!!!!!!!!!!!!!!!!!!')
     
     </script>";
   
   }

  }

?>

</body>
</html>

