<?php
include "refresh_prevent.js";
include "config.php";
// Starting the session, to use and 
// store data in session variable 
session_start(); 

date_default_timezone_set('Asia/kolkata');
$user=$_SESSION['username'];
//echo $user;


if (isset($_GET['logout'])) { 
	session_destroy(); 
	unset($_SESSION['username']); 
	header("location: HOME MAIN.php"); 
} 

?>



<doctype html>
<html>




<script>

function fn(val)
{
  console.log(val);

  <?php
      echo "praveena";
      
      ?>
  

}



</script>





<head>
<style>
{
  box-sizing: border-box;
}

:root {
  --background: #E5FFB3;
  //--background-accent: #DBF8A3;
  //--background-accent-2: #BDE66E;
  --light: #92DE34;
  //--dark: #69BC22;
  --text: #025600;
}

body {
  background-color: var(--background);
  background-image: linear-gradient(
    var(--background-accent-2) 50%,
    var(--background-accent) 50%
  ), linear-gradient(
    var(--background-accent) 50%,
    var(--background-accent-2) 50%
  );
  background-repeat: no-repeat;
  background-size: 100% 30px;
  background-position: top left, bottom left;
  min-height: 98vh;
}

/*div {
  display: block;
  width: 400px;
  margin: 0 auto 0 auto;
  position: absolute;
  left: 0;
  right: 0;
  top: 30vh;
}*/

.button {
  display: block;
  cursor: pointer;
  outline: none;
  border: none;
  background-color: var(--light);
  width: 700px;
  height: 50px;
  border-radius: 30px;
  font-size: 2.2rem;
  font-weight: 600;
  color: var(--text);
  background-size: 100% 100%;
  box-shadow: 0 0 0 7px var(--light) inset;
  margin-bottom: 15px;
  
}

.button:hover {
  background-image: linear-gradient(
    145deg,
    transparent 10%,
    var(--dark) 10% 20%,
    transparent 20% 30%,
    var(--dark) 30% 40%,
    transparent 40% 50%,
    var(--dark) 50% 60%,
    transparent 60% 70%,
    var(--dark) 70% 80%,
    transparent 80% 90%,
    var(--dark) 90% 100%
  );
}

  
/* @keyframes background {
  0% {
    background-position: 0 0;
  }
  100% {
    background-position: 400px 0;
  }
}*/

.anchor {
color: #000000 !important;
//text-transform: uppercase;
background: #ff4500;
padding: 8px;
border: 4px solid #66cdaa !important;
border-radius: 15px;
display: inline-block;
transition: all 0.3s ease 0s;
}

.anchor:hover {
color: #494949 !important;
border-radius: 50px;
border-color: #494949 !important;
transition: all 0.3s ease 0s;
}

.anchor { }


</style>

</head>
<body>
<br>
<p align="right"><a  href="class.php?logout='1'"><b><font size="5px">LogOut</font></b></a>&nbsp;&nbsp;&nbsp;</p>
<center>
<br><br>

<a class="anchor" href="select class.php"><b>ADD CLASS</b></a>

  <h1>  <font color="#00008b"> <b>Your Classes </b></font></h1>
<?php


$st="select * from users where Login_id='$user'";
$query=mysqli_query($db,$st);
$row=mysqli_fetch_assoc($query);


$class2=$row['class2'];
//echo $class2;
$class3=$row['class3'];
//echo $class3;
$class4=$row['class4'];
//echo $class4;
$class5=$row['class5'];
//echo $class5;
$class6=$row['class6'];
//echo $class6;
$class7=$row['class7'];
//echo $class7;
$class8=$row['class8'];
//echo $class8;
$class9=$row['class9'];
//echo $class9;
$class10=$row['class10'];
//echo $class10;
//echo "<br><br>";
$count=0;

if($class2!=0)
{
  
  $count++;
  $st1="select * from tutor where tutor_id='$class2'";
  $query1=mysqli_query($db,$st1);
  $row1=mysqli_fetch_assoc($query1);
  //echo "2";
?>

<div>
  <!--<button class="button" value="<?php echo $row1['tutor_id']; ?>" onClick="fn(this.value)" > <?php echo  $row1['UG_PG']." ".$row1['Department']." ".$row1['Year_of_Admission'];  ?></button>-->
 <a class="button" href="current_class.php?id=<?php echo $row1['tutor_id']; ?>" > <?php echo  $row1['UG_PG']." ".$row1['Department']." ".$row1['Year_of_Admission'];  ?></a>
</div>

<?php
}

if($class3!=0)
{
  $count++;
  //echo "3";
  $st1="select * from tutor where tutor_id='$class3'";
  $query1=mysqli_query($db,$st1);
  $row1=mysqli_fetch_assoc($query1);

?>
<div>
<a class="button" href="current_class.php?id=<?php echo $row1['tutor_id']; ?>"  > <?php echo  $row1['UG_PG']." ".$row1['Department']." ".$row1['Year_of_Admission'];  ?></a>
</div>


<?php
}

if($class4!=0)
{
  $count++;
 // echo "4";
  $st1="select * from tutor where tutor_id='$class4'";
  $query1=mysqli_query($db,$st1);
  $row1=mysqli_fetch_assoc($query1);

?>
<div>
<a class="button" href="current_class.php?id=<?php echo $row1['tutor_id']; ?>"  > <?php echo  $row1['UG_PG']." ".$row1['Department']." ".$row1['Year_of_Admission'];  ?></a>
</div>


<?php
}

if($class5!=0)
{
  $count++;
  //echo "5";
  $st1="select * from tutor where tutor_id='$class5'";
  $query1=mysqli_query($db,$st1);
  $row1=mysqli_fetch_assoc($query1);

?>
<div>
<a class="button" href="current_class.php?id=<?php echo $row1['tutor_id']; ?>"  > <?php echo  $row1['UG_PG']." ".$row1['Department']." ".$row1['Year_of_Admission'];  ?></a>
</div>

<?php
}

if($class6!=0)
{
  $count++;
 // echo "6";
  $st1="select * from tutor where tutor_id='$class6'";
  $query1=mysqli_query($db,$st1);
  $row1=mysqli_fetch_assoc($query1);

?>
<div>
<a class="button" href="current_class.php?id=<?php echo $row1['tutor_id']; ?>"  > <?php echo  $row1['UG_PG']." ".$row1['Department']." ".$row1['Year_of_Admission'];  ?></a>
</div>

<?php
}

if($class7!=0)
{
  $count++;
  //echo "7";
  $st1="select * from tutor where tutor_id='$class7'";
  $query1=mysqli_query($db,$st1);
  $row1=mysqli_fetch_assoc($query1);

?>
<div>
<a class="button" href="current_class.php?id=<?php echo $row1['tutor_id']; ?>"  > <?php echo  $row1['UG_PG']." ".$row1['Department']." ".$row1['Year_of_Admission'];  ?></a>
</div>

<?php
}

if($class8!=0)
{
  $count++;
 // echo "8";
  $st1="select * from tutor where tutor_id='$class8'";
  $query1=mysqli_query($db,$st1);
  $row1=mysqli_fetch_assoc($query1);

?>
<div>
<<a class="button" href="current_class.php?id=<?php echo $row1['tutor_id']; ?>"  > <?php echo  $row1['UG_PG']." ".$row1['Department']." ".$row1['Year_of_Admission'];  ?></a>
</div>

<?php
}

if($class9!=0)
{
  $count++;
 // echo "9";
  $st1="select * from tutor where tutor_id='$class9'";
  $query1=mysqli_query($db,$st1);
  $row1=mysqli_fetch_assoc($query1);

?>
<div>
<a class="button" href="current_class.php?id=<?php echo $row1['tutor_id']; ?>"  > <?php echo  $row1['UG_PG']." ".$row1['Department']." ".$row1['Year_of_Admission'];  ?></a>
</div>

<?php
}

if($class10!=0)
{
  $count++;
  //echo "10";
  $st1="select * from tutor where tutor_id='$class10'";
  $query1=mysqli_query($db,$st1);
  $row1=mysqli_fetch_assoc($query1);

?>
<div>
<a class="button" href="current_class.php?id=<?php echo $row1['tutor_id']; ?>"  > <?php echo  $row1['UG_PG']." ".$row1['Department']." ".$row1['Year_of_Admission'];  ?></a>
</div>


<?php
}
if( $count==0)

{

  echo "<pre>



 <big><center><i>No classe is choosen</i></center></big>



</pre>";
}

?>

</center>
</body>
</html>

