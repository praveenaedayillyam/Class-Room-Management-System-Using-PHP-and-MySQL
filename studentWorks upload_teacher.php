<!DOCTYPE html>
<html>



<?php include 'config.php';
include 'TEACHER_HOME.php';
$id = $_SESSION['username'];
$name="select * from teacher where Login_id='$id'";
$NAME=mysqli_query($db,$name);
 $rows1=mysqli_fetch_assoc($NAME);
 $Email=$rows1['Email_id'];
 $class=$classroom;


 if(isset($_POST['submit']))
 {
 
   //echo "1234";
   //$Date = $_POST['date'];
   //$time = $_POST['time'];
   $Subject = $_POST['subject'];
   $work = $_POST['work'];
   $topic = $_POST['topic'];
   $lastdate = $_POST['lastdate'];
   $Description = $_POST['discription'];
   $current=date('d-m-y h:i:s');
   $uploadby=$rows1['Email_id'];
   $sem=$_POST['sem'];
   $outof=$_POST['outof'];
   
  // echo "567";
   $statement="INSERT INTO student_work(upload_by,current,sem,subjectname,Work,Topic,Last_Date,descriptn,out_of,class)
    VALUES('$uploadby','$current','$sem','$Subject','$work','$topic','$lastdate','$Description','$outof','$class')";
   $sql=mysqli_query($db,$statement);
   //echo "890"; 
   if($sql)
     {
       //echo "New record inserted sucessfully";


       echo "<script>
alert('Updated Successfully')
window.location.href='see works_teacherview1.php'
</script>";
   
     }
 
     if(!$sql)
     {
       echo "New record inserted failed!!!!!";
     }
 
 }

?>






<!DOCTYPE html>
<html>
<head>
<style> 



select {
width: 100%;
padding: 12px 20px;
margin: 8px 0;
box-sizing: border-box;
border: none;
border-bottom: 2px solid red;
background-color: #fafad2;
}


input[type=text] {
width: 100%;
padding: 12px 20px;
margin: 8px 0;
box-sizing: border-box;
border: none;
border-bottom: 2px solid red;
background-color: #fafad2;
}

input[type=date] {
width: 100%;
padding: 12px 20px;
margin: 8px 0;
box-sizing: border-box;
border: none;
border-bottom: 2px solid red;
background-color: #fafad2;
}



label{ font-weight: italic; color: gray;}

textarea {
width: 100%;
padding: 12px 20px;
margin: 8px 0;
box-sizing: border-box;
border: none;
border-bottom: 2px solid red;
background-color: #fafad2;
}

button.buttonA {
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

button.buttonA:hover {
opacity: 0.8;
}



</style>
</head>
<body>
<center>
<center><h1 style="background-color:lightgrey;">Student Works</h1></center>

<form id="studentwork" action="studentWorks upload_teacher.php" method="post">

<table cellspacing="5px"cellpading="5px" width=600px>

<!-- <tr>  <td><label for="date">Today's Date ( dd/mm/yy )</label></td>
 <td><input type="text" id="date" name="date"></td>
</tr>-->


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
 <td><label for="work">Work</label></td>
<td> <input type="text" id="work" name="work" title="Viva , Assignment , Seminar etc..." required></td>
</tr>



<tr>
<td> <label for="topic">Topic name</label></td>
 <td><input type="text" id="topic" name="topic" required></td>
</tr>
<tr>  <td><label for="lastdate">Due Date</label></td>
 <td><input type="date" id="lastdate" name="lastdate" required></td>
</tr>





<tr>
<td> <label for="description">Description</label></td>
 <td><textarea id="description" name="discription"></textarea></td>
</tr>


<tr>  <td><label for="outof">Mark</label></td>
 <td><input type="text" id="outof" name="outof" required></td>
</tr>


</table><br><br>
<div>
<button class="buttonA" type="submit" name="submit" id="submit">Send</button></div>
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

