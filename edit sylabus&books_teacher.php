
<?php
session_start(); 
include "config.php";

$user=$_SESSION['username'];
$t=mysqli_query($db,"SELECT * from users where Login_id='$user'");
$t1=mysqli_fetch_assoc($t);
$email=$t1['Email_id'];

//include "refresh_prevent.js";

$id1=$_REQUEST['id'];
//echo $id1;


$query="select * from metirials where id_no='$id1'";
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

button.picupload {
  background-color: blue;
  color: white;
  //width: 6%;
 // border-radius:35%;
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

<br>

<pre align="right"><a href="Sylabus&books teacher view.php" ><b><font size="6px" color="red">Back</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</pre>
<center><h1 style="background-color:lightgrey;"> Edit Syllabus</h1>

<form id="studentwork" method="post" action="edit sylabus&books_teacher.php" enctype="multipart/form-data">

<br>
<br>

<table  cellpading="20px" cellspacing="20px" leftmargin="10px" frame="box">

<tr>
<td> <label for="syllabus">Syllabus  &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</label></td>
    <td><input type="file" id="syllabus" name="sylabus">  <button type="submit" name="picupload"class="picupload"> upload</button> </td>
    </tr>
</table>

<br>
<br>

<table cellspacing="10px" cellpading="10px" width=600px frame="box">



<?php
$rows=mysqli_fetch_assoc($result);

?>

<tr>
   
    <td><input value="<?php echo $id1 ?>" type="text" id="idno" name="idno" readonly hidden></td>
</tr>


<tr>  <td><label for="sem">Semester</label></td>
    <td><select id="sem" name="sem" required>
    <option value="<?php echo $rows['sem']; ?>"> <?php echo $rows['sem']; ?> </option>
    <!--<option selected="selected"><?php echo $rows['sem']; ?></option>-->
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
    <td><label for="subjectcode"> Subject Code</label></td>
    <td><input value="<?php echo $rows['sub_code']; ?>" type="text" id="subcode" name="subcode" required></td>
</tr>


<tr>
    <td><label for="subject"> Subject Name</label></td>
    <td><input value="<?php echo $rows['sub_name']; ?>" type="text" id="subject" name="subject" required></td>
</tr>


<tr>
   
    <td> <label for="description">Description</label></td>
    <td><textarea id="description" name="discription"> <?php echo $rows['syllabus_description']; ?> </textarea></td>  
</tr>




</table><br><br>
<div>
  <button type="submit" class=btn1 name=submit>Send</button></div>

<br>
<br>
</form>
</center>


<?php




if (count($_FILES) > 0) {
    if (is_uploaded_file($_FILES['myfile']['tmp_name'])) {
    	$imgData = addslashes(file_get_contents($_FILES['myfile']['tmp_name']));
    	$imageProperties = getimageSize($_FILES['myfile']['tmp_name']);
    }
}


if(isset($_POST['submit']))
{

  $sem=$_POST['sem'];
  $code = $_POST['subcode'];
  
     $Subject = $_POST['subject'];
      
      $Description = $_POST['discription'];
      $id2=$_POST['idno'];
      
     
  $statement2="UPDATE metirials SET upload_by='$email',sem='$sem',sub_code='$code', sub_name='$Subject',syllabus_description='$Description' WHERE id_no='$id2'";
  $sql2=mysqli_query($db,$statement2);

  if($sql2)
  
  {
    
   
  // echo "<script> location.reload();  </script>";
   
  echo "<script>
            alert('Updated Successfully');
            window.location.href='Sylabus&books teacher view.php'; 
    </script>";
  }


  if(!$sql2)
  
  {
    
   
  // echo "<script> location.reload();  </script>";
   
  echo "<script>
            alert('Failed!!!');
            window.location.href='Sylabus&books teacher view.php'; 
    </script>";
  }


}






if(isset($_POST['picupload']))
{
  
 // $username = $_POST['username'];
  
  //$contactNo = $_POST['contactNo'];
  //$email = $_POST['email'];
  $id2=$_POST['idno'];








  if (count($_FILES) > 0) {
      if (is_uploaded_file($_FILES['sylabus']['tmp_name'])) {
        $imgData = addslashes(file_get_contents($_FILES['sylabus']['tmp_name']));
        $imageProperties = getimageSize($_FILES['sylabus']['tmp_name']);
      }
  }
  


  $statement2="UPDATE metirials set sylabus_type='{$imageProperties['mime']}',syllabus='{$imgData}' WHERE id_no='$id2'";
  $sql2=mysqli_query($db,$statement2);
 // echo "890"; 
?>
<font color="red">
<?php
 if(!$sql2)
 {
   echo "Updation failed!!!!!";
 }
?>
</font>
<font color="blue">
<?php
    if($sql2)
  
    {
     
     
      echo "<script>
               alert('Updated Successfully')
               window.location.href='Sylabus&books teacher view.php'
               </script>";
      
    }

    if(!$sql2)
  
    {
     
     
      echo "<script>
               alert('Failed!!!')
               window.location.href='Sylabus&books teacher view.php'
               </script>";
      
    }


}    


mysqli_close($db);
?>









</body>
</html>

