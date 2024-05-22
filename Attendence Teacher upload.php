<?php include 'config.php';
include 'TEACHER_HOME.php';
$id = $_SESSION['username'];
$name="select * from users where Login_id='$id'";
$NAME=mysqli_query($db,$name);
 $rows1=mysqli_fetch_assoc($NAME);
 $Email=$rows1['Email_id'];
 $class=$classroom; 



 


if(isset($_POST['submit']))
{
    
      //echo "1234";
      //$Date = $_POST['date'];
      //$time = $_POST['time'];
      $Subject= $_POST['subject'];
      $duration = $_POST['duration'];
      $total = $_POST['totalattendence'];
      $class =$_POST['class'];
      $sem=$_POST['sem'];
      $current=date('d-m-y');
      $uploadby=$rows1['Email_id'];
     
    
 $st="INSERT into attendence_info(upload_date,upload_by,sem,sub,duration,total_attendence,class) VALUES('$current','$uploadby','$sem','$Subject','$duration','$total','$class')";         
 $stm=mysqli_query($db,$st);


if($stm)
{

$st1=mysqli_query($db,"SELECT * from attendence_info where upload_date='$current' AND sem='$sem' AND upload_by='$uploadby' AND sub='$Subject' AND duration='$duration' AND  total_attendence='$total' AND class='$class'");
$stm1=mysqli_fetch_assoc($st1);

$attid=$stm1['att_id'];


$st2=mysqli_query($db,"UPDATE users set att_id='$attid' where Email_id='$Email'");




  echo "<script>
  alert('Updated Successfully')
  window.location.href='individual_att_teacher.php'
  </script>";

}



if(!$stm)
{

  echo "<script>
  alert('Failed!!!!!!!!!!!!!!!!!!')
  
  </script>";

}


}
  

  
  ?>






<!DOCTYPE html>
<html>
<head>
<style> 
input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid red;
 background-color: #fafad2;
}

label{ font-weight: italic; color: #696969;}


select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid red;
 background-color: #fafad2;
}
  

textarea {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid red;
  color: #fffacd;
}

button.submit {
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

button.sumbit:hover {
  opacity: 0.8;
}



</style>
</head>
<body>
<center>
<center><h1 style="background-color:lightgrey;">Students Attendence Upload</h1></center>





<form id="attendence" action="Attendence Teacher upload.php" method="post">





<table cellspacing="5px"cellpading="5px" width=600px>

  



<tr>  <td><label for="sem">Semester</label></td>
    <td><select id="sem" name="sem" required>
    <option selected="selected" disabled="disabled" style="display:none;"></option>
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
    <td><input type="text" id="subject" name="subject" required></td>
</tr>




<tr>
    <td><label for="duration">Duration of uploading Attendence</label></td>
    <td><input type="text" id="duration" name="duration" required></td>
</tr>

<tr>
    <td><label for="totalattendence">Total Number of Attendence</label></td>
    <td> <input type="text" id="totalattendence" name="totalattendence" required></td>
</tr>




<tr> 
<td><input type="text" id="uploadby" name="uploadby" readonly value="<?php echo $Email; ?>" hidden></td>
<td><input type="text" id="class" name="class" value="<?php echo $class; ?>" readonly hidden></td>
</tr>




  
</table>
<div>
  <button type="submit" name="submit" type="submit" class="submit">Update</button></div>











</form>


</center>


<script>
  if( window.history.replaceState)
  {
     window.history.replaceState(null, null, window.location.href);
  }
  </script>

</body>
</html>

