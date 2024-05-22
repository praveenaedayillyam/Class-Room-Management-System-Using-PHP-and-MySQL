<?php
session_start(); 

//include "refresh_prevent.js";
include "config.php";
$id1=$_REQUEST['id'];
//echo $id1;


$query="select * from student_work where work_id='$id1'";
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
<pre align="right"><a href="see works_teacherview1.php" ><b><font size="6px" color="red">Back</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</pre>
<center>
<center><h1 style="background-color:lightgrey;">Edit Students Works Upload</h1></center>
<center>
<form id="edit work" action="edit student work upload_teacher.php" method="POST">

<table cellspacing="7px" cellpading="7px" width=600px >


<?php
$rows=mysqli_fetch_assoc($result);

?>


  <!--<tr>  <td><label for="date">Today's Date ( dd/mm/yy )</label></td>
    <td><input type="text" id="date" name="date"></td>
</tr>-->

<tr>
   
    <td><input value="<?php echo $id1 ?>" type="text" id="idno" name="idno" readonly hidden></td>
</tr>



<tr>  <td><label for="sem">Semester</label></td>
    <td><select id="sem" name="sem" required>
    <option selected="selected" disabled="disabled" style="display:none;"> <?php echo $rows['sem']; ?> </option>
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
    <td><label for="subject"> Subject Name</label></td>
    <td><input value="<?php echo $rows['subjectname']; ?>" type="text" id="subject" name="subject"></td>
</tr>




<tr>
    <td><label for="Work"> Work</label></td>
    <td><input value="<?php echo $rows['Work']; ?>" type="text" id="work" name="work"></td>
</tr>

<tr>
    <td><label for="topic">Topic</label></td>
    <td> <input value="<?php  echo $rows['Topic'];?> " type="text" id="topic" name="topic"> </td>
</tr>

<tr>
    <td><label for="discription">Description</label></td>
    <td> <textarea  name="discription" id="discription" cols=20 rows=4><?php  echo $rows['descriptn'];?>  </textarea> </td>
</tr>


<tr>
    <td><label for="lastdate">Due Date </label></td>
    <td> <input value="<?php  echo $rows['Last_Date'];?>" type="date" id="lastdate" name="lastdate"> </td>
</tr>


<tr>
    <td><label for="outof">OUT OF </label></td>
    <td> <input value="<?php  echo $rows['out_of'];?>" type="text" id="outof" name="outof"> </td>
</tr>


</table><br><br>
<div>
  <button type="submit" name="submit" id="submit">Update</button></div>

</center>

<?php


if(isset($_POST['submit']))
{
  
     $Subject = $_POST['subject'];
      $work = $_POST['work'];
      $topic = $_POST['topic'];
      $lastdate = $_POST['lastdate'];
      $Description = $_POST['discription'];
      $id2=$_POST['idno'];
      $outof=$_POST['outof'];
      $sem=$_POST['sem'];
  $statement2="UPDATE student_work SET sem='$sem', subjectname='$Subject', Work='$work', Topic='$topic', Last_Date='$lastdate', descriptn='$Description',out_of='$outof' WHERE work_id='$id2'";
  $sql2=mysqli_query($db,$statement2);

  //$st="select * from student_work where id_no='$id2'";
  //$stm=mysqli_query($db,$st);
  //$rw=mysqli_fetch_assoc( $stm);

 // echo $rw['subjectname'].$rw['Work'].$rw['Topic'].$rw['Last_Date'].$rw['descriptn'];
  
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
      
     
    // echo "<script> location.reload();  </script>";
     
    echo "<script>
              alert('Updated Successfully');
              window.location.href='see works_teacherview1.php'; 
      </script>";
    }

    if($sql2)
  
    {
      
     
      echo "<br><b>Updated sucessfully</>";
     /* echo "<script> alert('<?php echo $rw['subjectname'].$rw['Work'].$rw['Topic'].$rw['Last_Date'].$rw['descriptn']; ?>');</script>"; */
    }

  }


  //mysqli_close($db);


?>



</center>


</form>
</body>
</html>

