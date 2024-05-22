<?php
include "refresh_prevent.js";
include "config.php";
// Starting the session, to use and 
// store data in session variable 
session_start(); 

date_default_timezone_set('Asia/kolkata');
$user=$_SESSION['username'];
//echo $user;

?>


<doctype html>
<html>

<head>
<style>


.btn {
  background-color: green;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: 25px;
  cursor: pointer;
  width: 7.5%;
  
  font-size:20px;
}


.btn:hover {
  opacity: 0.4;
}


body {
  margin: 0;
  padding: 0;
  background-color:#E5FFB3 ;
}

.box {
 position: relative;
 top: 50%;
 left: 50%;
  transform: translate(-50%, -50%);
}

.box select {
  background-color: ;
  color: black;
  padding: 12px;
  width: 250px;
  border: none;
  font-size: 20px;
  box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);
  -webkit-appearance: button;
  appearance: button;
  outline: none;
  position : relative;
}

.box::before {
 // content: "\f13a";
  font-family: FontAwesome;
  position: absolute;
  top: 0;
  right: 0;
  width: 20%;
  height: 100%;
  text-align: center;
  font-size: 28px;
  line-height: 45px;
  color: rgba(255, 255, 255, 0.5);
  background-color: rgba(255, 255, 255, 0.1);
  pointer-events: none;
}

.box:hover::before {
  color: rgba(255, 255, 255, 0.6);
  background-color: rgba(255, 255, 255, 0.2);
}

.box select option {
  padding: 30px;
}
</style>
</head>

<body>

<center>
<font color="#00008b"> 
  <br>
  <pre align="right"><a href="class.php" ><b><font size="5px" color="red">Back</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</pre>
  <br>
<h2>Select Class</h2></font>
<br> <!--<font color="orange">  <h5></h5> </font>-->


<br>
<br>
<br>


<form action="select class.php" method="POST">


<?php

$st="select * from tutor";
$query=mysqli_query($db,$st);
$row=mysqli_fetch_assoc($query);


$st1="select * from tutor group by UG_PG order by UG_PG ASC";
$query1=mysqli_query($db,$st1);


?>



<div class="box">
<big><b><font color="grey">Graduation</font></b></big><br><br>
  <select name="graguation" id="graguation" required>

  <option selected="selected" disabled="disabled" style="display:none;"></option>

   <?php
  
  while($row1=mysqli_fetch_array($query1))
   {
  ?>

    <option  value="<?php echo $row1['UG_PG']; ?>"> <?php echo $row1['UG_PG']; ?> </option>
    
   <?php } ?> 
    
  



</select></div>


<?php



$st2="select * from tutor group by Department order by Department ASC";
$query2=mysqli_query($db,$st2);

?>




<div class="box">
<br>
<br>
<big><b><font color="grey">Department</font></b></big><br><br>
 

  <select name="department" id="department" required><option selected="selected" disabled="disabled" style="display:none;"></option>
<?php
  while($row2=mysqli_fetch_array($query2))
  {



?>
    <option  value="<?php  echo $row2['Department']; ?>"> <?php  echo $row2['Department']; ?></option>
    
<?php } ?>


  </select>

</div>
  <?php

  

  $st3="select * from tutor group by Year_of_Admission order by Year_of_Admission DESC";
  $query3=mysqli_query($db,$st3);




?>



<div class="box">
<br>
<br>
<big><b><font color="grey">Year of Admisson of student of the class</font></b></big><br><br>



  <select name="year" id="year" required><option selected="selected" disabled="disabled" style="display:none;"></option>



  <?php
  while($row3=mysqli_fetch_assoc($query3))
  {
?>
    <option  value="<?php  echo $row3['Year_of_Admission']; ?>"> <?php  echo $row3['Year_of_Admission']; ?></option>
    
<?php


  

  }


?>


    



  </select>
</div>


 


<div class="box">
<br>
<br>
<button class="btn" name="submit">Done</button> &nbsp; &nbsp; &nbsp;</div>
<?php
  



?>

</form>
<?php

if(isset($_POST['submit']))
{

 $ugpg=$_POST['graguation'];
 $dep=$_POST['department'];
 $year=$_POST['year'];




 $st5="select * from tutor where UG_PG='$ugpg' AND Department='$dep' AND Year_of_Admission='$year'";
 $query5=mysqli_query($db,$st5);
 $row5=mysqli_fetch_assoc($query5);

?>

 
<script> 

var ugpg="<?php echo $ugpg ?>";
var dep="<?php echo $dep ?>";
var year="<?php echo $year ?>";

</script>

<?php

//$alert="<script> alert(ugpg+' '+dep+' '+year.' '+'Class does NOT exist')</script>";

if( $row5==NULL)
{

echo "<script>
    
      alert('Class does NOT exist')
      </script>";
      die();

}



 $class=$row5['tutor_id'];

 $st4="select * from users where Login_id='$user'";
 $query4=mysqli_query($db,$st4);
 $row=mysqli_fetch_assoc($query4);
 $class1=$row['class1'];
 $class2=$row['class2'];
 $class3=$row['class3'];
 $class4=$row['class4'];
 $class5=$row['class5'];
 $class6=$row['class6'];
 $class7=$row['class7'];
 $class8=$row['class8'];
 $class9=$row['class9'];
 $class10=$row['class10'];



 if($row['class2']==0)
 {
   if($class1!=$class AND $class2!=$class AND $class3!=$class AND $class4!=$class AND $class5!=$class AND $class6!=$class AND $class7!=$class AND $class8!=$class AND $class9!=$class AND $class10!=$class)
    {
     $st1="update users set class2='$class' where Login_id='$user'";
     $stm1=mysqli_query($db,$st1);
    }

    else
    { 
       echo "<script>
       alert('you have already in this class')
      </script>";
      die();
    }
 }


else if($row['class3']==0)
 {
  if($class1!=$class AND $class2!=$class AND $class3!=$class AND $class4!=$class AND $class5!=$class AND $class6!=$class AND $class7!=$class AND $class8!=$class AND $class9!=$class AND $class10!=$class)
  {
   $st1="update users set class3='$class' where Login_id='$user'";
   $stm1=mysqli_query($db,$st1);
  }

  else
  { 
     echo "<script>
     alert('you have already in this class')
    </script>";
    die();
  }
 }

 else if($row['class4']==0)
 {
  if($class1!=$class AND $class2!=$class AND $class3!=$class AND $class4!=$class AND $class5!=$class AND $class6!=$class AND $class7!=$class AND $class8!=$class AND $class9!=$class AND $class10!=$class)
  {
   $st1="update users set class4='$class' where Login_id='$user'";
   $stm1=mysqli_query($db,$st1);
  }

  else
  { 
     echo "<script>
     alert('you have already in this class')
    </script>";
    die();
  }
 }

 else if($row['class5']==0)
 {
  if($class1!=$class AND $class2!=$class AND $class3!=$class AND $class4!=$class AND $class5!=$class AND $class6!=$class AND $class7!=$class AND $class8!=$class AND $class9!=$class AND $class10!=$class)
  {
   $st1="update users set class5='$class' where Login_id='$user'";
   $stm1=mysqli_query($db,$st1);
  }

  else
  { 
     echo "<script>
     alert('you have already in this class')
    </script>";
    die();
  }
 }

 else if($row['class6']==0)
 {
  if($class1!=$class AND $class2!=$class AND $class3!=$class AND $class4!=$class AND $class5!=$class AND $class6!=$class AND $class7!=$class AND $class8!=$class AND $class9!=$class AND $class10!=$class)
  {
   $st1="update users set class6='$class' where Login_id='$user'";
   $stm1=mysqli_query($db,$st1);
  }

  else
  { 
     echo "<script>
     alert('you have already in this class')
    </script>";
    die();
  }
 }

 else if($row['class7']==0)
 {
  if($class1!=$class AND $class2!=$class AND $class3!=$class AND $class4!=$class AND $class5!=$class AND $class6!=$class AND $class7!=$class AND $class8!=$class AND $class9!=$class AND $class10!=$class)
  {
   $st1="update users set class7='$class' where Login_id='$user'";
   $stm1=mysqli_query($db,$st1);
  }

  else
  { 
     echo "<script>
     alert('you have already in this class')
    </script>";
    die();
  }
 }

 else if($row['class8']==0)
 {
  if($class1!=$class AND $class2!=$class AND $class3!=$class AND $class4!=$class AND $class5!=$class AND $class6!=$class AND $class7!=$class AND $class8!=$class AND $class9!=$class AND $class10!=$class)
  {
   $st1="update users set class8='$class' where Login_id='$user'";
   $stm1=mysqli_query($db,$st1);
  }

  else
  { 
     echo "<script>
     alert('you have already in this class')
    </script>";
    die();
  }
 }

 else if($row['class9']==0)
 {
  if($class1!=$class AND $class2!=$class AND $class3!=$class AND $class4!=$class AND $class5!=$class AND $class6!=$class AND $class7!=$class AND $class8!=$class AND $class9!=$class AND $class10!=$class)
  {
   $st1="update users set class9='$class' where Login_id='$user'";
   $stm1=mysqli_query($db,$st1);
  }

  else
  { 
     echo "<script>
     alert('you have already in this class')
    </script>";
    die();
  }
 }

 else if($row['class10']==0)
 {
  if($class1!=$class AND $class2!=$class AND $class3!=$class AND $class4!=$class AND $class5!=$class AND $class6!=$class AND $class7!=$class AND $class8!=$class AND $class9!=$class AND $class10!=$class)
  {
   $st1="update users set class10='$class' where Login_id='$user'";
   $stm1=mysqli_query($db,$st1);
  }

  else
  { 
     echo "<script>
     alert('you have already in this class')
    </script>";
    die();
  }
 }

else {

  echo "<script>
  alert('class Selection Failed!!----else')
  
  </script>";


}







if($stm1)
{


  echo "<script>
  alert('class Selected Successfully')
  
  </script>";


}



if(!$stm1)
{


  echo "<script>
  alert('class Selection Failed!!')
  
  </script>";


}
}

?>
</div>

</center>


</body>
</html>

