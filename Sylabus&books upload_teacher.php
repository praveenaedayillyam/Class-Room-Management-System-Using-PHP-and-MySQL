<?php include 'config.php';
include 'TEACHER_HOME.php';
$id = $_SESSION['username'];
$name="select * from teacher where Login_id='$id'";
$NAME=mysqli_query($db,$name);
 $rows1=mysqli_fetch_assoc($NAME);
 $Email=$rows1['Email_id'];
 $class=$classroom;
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

label{ font-weight: italic; color: gray;}



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
  background-color: #fafad2;
}

.btn1 {
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
<center><h1 style="background-color:lightgrey;">Syllabus</h1></center>

<form action="Sylabus&books upload_teacher.php" method="post" enctype="multipart/form-data" name="frm_usr">

<table cellspacing="5px"cellpading="5px">

  <tr>  <td><label for="sem">Semester</label></td>
    <td><select id="sem" name="sem" required>
    <option selected="selected" disabled="disabled" style="display:none;"></option>
    <option value="1<sup>st</sup> Sem">1<sup>st</sup> Sem</option>
    <option value="2<sup>nd</sup> Sem">2<sup>nd</sup> Sem</option>
    <option value="3<sup>rd</sup> Sem">3<sup>rd</sup> Sem</option>
    <option value="4<sup>th</sup> Sem">4<sup>th</sup> Sem</option>
    <option value="5<sup>th</sup> Sem">5<sup>th</sup> Sem</option>
    <option value="6<sup>th</sup> Sem">6<sup>th</sup> Sem</option>
    
    </select>
    
    </td>
    
</tr>


<tr>
    <td><label for="subcode">Subject Code</label></td>
    <td><input type="text" id="subjectcode" name="subjectcode"></td>
    
</tr>

<tr>
    <td><label for="subject">Subject Name</label></td>
   <td> <input type="text" id="subject" name="subject" required></td>
  
</tr>



<tr>
   <td> <label for="syllabus"><b>Syllabus</b></label></td>
    <td><input type="file" id="syllabus" name="sylabus"></td>
    <td> <label for="description"><b>Description</b></label></td>
    <td><textarea id="description" name="discription"></textarea></td>  
</tr>



</table><br><br>


<div>
  <button type="submit" class=btn1 name="submit">Send</button></div>
</form>
</center>




<?php
if(isset($_POST['submit']))
    {



      
      if (count($_FILES) > 0) {
          if (is_uploaded_file($_FILES['sylabus']['tmp_name'])) {
            $imgData = addslashes(file_get_contents($_FILES['sylabus']['tmp_name']));
            $imageProperties = getimageSize($_FILES['sylabus']['tmp_name']);
          }
      }
     
      $sem = $_POST['sem'];
      $code = $_POST['subjectcode'];
      $subject = $_POST['subject'];
      $description=$_POST['discription'];
      $date=date('d-m-y h:i:s');

      $statement="INSERT INTO metirials(upload_by,upload_date,sem,sub_code,sub_name,syllabus,syllabus_description,sylabus_type,class)
      VALUES('$Email','$date','$sem','$code','$subject','{$imgData}','$description','{$imageProperties['mime']}','$class')";
     $sql=mysqli_query($db,$statement);

     if($sql)
  
     {
      
      
       echo "<script>
                alert('Updated Successfully')
                
                </script>";
       
     }

     if(!$sql)
  
     {
      
      
       echo "<script>
                alert('Failed!!!!!!!!!!!!!!')
                
                </script>";
       
     }

    }

?>
</body>
</html>

