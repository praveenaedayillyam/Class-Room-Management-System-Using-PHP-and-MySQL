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
      $Date = $_POST['date'];
      $time = $_POST['time'];
      $Subject = $_POST['subject'];
      $link = $_POST['link'];
      $linkcode = $_POST['code'];
      $Description = $_POST['discription'];
      $current=date('d-m-y h:i:s');
      $uploadby=$rows1['Email_id'];
      
      
     // echo "567";
      $statement="INSERT INTO lecture(upload_by,current,lec_date,lec_time,lec_subject,link,link_code,lec_description,class) VALUES('$uploadby','$current','$Date','$time','$Subject','$link','$linkcode','$Description','$class')";
      $sql=mysqli_query($db,$statement);
      //echo "890"; 
      if($sql)
        {
          //echo "New record inserted sucessfully";
          echo "<script>
          alert('Uploaded Successfully')
          window.location.href='LECTURE SCHEDULING upload_teacher.php'
          </script>";
 
      
        }
    
        if(!$sql)
        {
          echo "New record inserted failed!!!!!";
        }
    
    }
  
  ?>



<head>
<style> 

input[type=date] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid red;
  background-color: #fafad2;
}

input[type=time] {
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

label{ font-weight: italic; color: #696969;}


textarea {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid red;
  background-color: #fafad2;
}

.submit {
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

.submit:hover {
  opacity: 0.8;
}



</style>
</head>
<body>
<center>
<center><h1 style="background-color:lightgrey;">Lecture Scheduling</h1></center>

<form action="LECTURE SCHEDULING upload_teacher.php" id="lecture" method="post">

<table cellspacing="5px"cellpading="5px" width=600px>




  <tr>  <td><label for="date">Date of Lucture</label></td>
    <td><input type="date" id="text" name="date" required></td>
</tr>

<tr> 
    <td><label for="time">Time of Lucture</label></td>
    <td><input type="time" id="time" name="time" required></td>
</tr>

<tr>
    <td><label for="subject">Subject Name</label></td>
    <td><input type="text" id="subject" name="subject" required></td>
</tr>

<tr>
    <td><label for="link">Link</label></td>
   <td> <input type="text" id="link" name="link"></td>
</tr>

<tr>
   <td> <label for="code">Code</label></td>
    <td><input type="text" id="code" name="code"></td>
</tr>


<tr>
   <td> <label for="description">Description</label></td>
    <td><textarea id="description" name="discription"></textarea></td>
</tr></table><br><br>
<div>
  <button type="submit" class="submit" name="submit" id="submit">Send</button></div>
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

