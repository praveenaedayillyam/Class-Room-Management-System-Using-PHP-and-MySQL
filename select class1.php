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
  <select name="graguation" id="graguation">
   <?php
  
  while($row1=mysqli_fetch_array($query1))
   {
  ?>

    <option  value="<?php echo $row1['UG_PG']; ?>"> <?php echo $row1['UG_PG']; ?> </option>
    
   <?php } ?> 
    
  



</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button name="ug_pg">OK</button> </div>


<?php

if(isset($_POST['ug_pg']))
{

  $ugpg=$_POST['graguation'];

$st2="select * from tutor group by Department having UG_PG='$ugpg' order by Department ASC";
$query2=mysqli_query($db,$st2);

?>




<div class="box">
<big><b><font color="grey">Department</font></b></big><br><br>
 

  <select name="department" id="department">
<?php
  while($row2=mysqli_fetch_array($query2))
  {



?>
    <option  value="<?php  echo $row2['Department']; ?>"> <?php  echo $row2['Department']; ?></option>
    
<?php } ?>


  </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button name="dep" id="dep" width="5px">OK</button> 

</div>
  <?php

  }
if(isset($_POST['dep']))
{

  $dep=$_POST['department'];

  $st3="select * from tutor group by Year_of_Admission having Department='$dep' order by Year_of_Admission DESC";
  $query3=mysqli_query($db,$st3);




?>



<div class="box">
<big><b><font color="grey">Year of Admisson of student of the class</font></b></big><br><br>



  <select name="year" id="year">



  <?php
  while($row3=mysqli_fetch_assoc($query3))
  {
?>
    <option  value="<?php  echo $row3['Year_of_Admission']; ?>"> <?php  echo $row3['Year_of_Admission']; ?></option>
    
<?php


  

  }


?>


    



  </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div>


 


<div class="box">
<button class="btn" name="submit">Done</button> &nbsp; &nbsp; &nbsp;</div>
<?php
  


}
?>

</form>
<?php

if(isset($_POST['submit']))
{

 $year=$_POST['submit'];

 $st3="select * from tutor where UG_PG='$ugpg' AND Department='$dep' AND Year_of_Admission='$year'";
 $query3=mysqli_query($db,$st3);
 $row3=mysqli_fetch_assoc($query3);
 $class=$row3['tutor_id'];

 $st4="select * from users where Login_id='$user'";
 $query4=mysqli_query($db,$st4);
 $row=mysqli_fetch_assoc($query4);



 if($row['class2']==0)
 {
     $st1="update users set class2='$class' where Login_id='$LoginId'";
     $stm1=mysqli_query($db,$st1);
 }


else if($row['class3']==0)
 {
     $st1="update users set class3='$class' where Login_id='$LoginId' ";
     $stm1=mysqli_query($db,$st1);
 }

 else if($row['class4']==0)
 {
     $st1="update users set class4='$class' where Login_id='$LoginId'";
     $stm1=mysqli_query($db,$st1);
 }

 else if($row['class5']==0)
 {
     $st1="update users set class5='$class' where Login_id='$LoginId'";
     $stm1=mysqli_query($db,$st1);
 }

 else if($row['class6']==0)
 {
     $st1="update users set class6='$class' where Login_id='$LoginId'";
     $stm1=mysqli_query($db,$st1);
 }

 else if($row['class7']==0)
 {
     $st1="update users set class7='$class' where Login_id='$LoginId'";
     $stm1=mysqli_query($db,$st1);
 }

 else if($row['class8']==0)
 {
     $st1="update users set class8='$class' where Login_id='$LoginId'";
     $stm1=mysqli_query($db,$st1);
 }

 else if($row['class9']==0)
 {
     $st1="update users set class9='$class' where Login_id='$LoginId'";
     $stm1=mysqli_query($db,$st1);
 }

 else if($row['class10']==0)
 {
     $st1="update users set class10='$class' where Login_id='$LoginId'";
     $stm1=mysqli_query($db,$st1);
 }

else {}



}



?>
</div>

</center>


</body>
</html>

