<?php

include "STUDENT_HOME.php";
include "config.php";
$id=$_SESSION['username'];
$statment1="select * from student where Login_id='$id'";
$result1=mysqli_query($db,$statment1);
if(!$result1)
{
  echo "result select failed!!!!!";
}






?>




<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<script type="text/javascript">
function ConfirmDelete()
{
  var x = confirm("Are you sure you want to delete?");
  if (x)
      return true;
  else
    return false;
}
</script>

<style>

table.table1 tr:nth-child(odd) {background-color: #fff0f5; }






/*button {
color: #cd853f !important;
//text-transform: uppercase;
background: #ffffff;
padding: 7px;
border: 4px solid #66cdaa !important;
border-radius: 15px;
display: inline-block;
transition: all 0.3s ease 0s;

}



button:hover {
color: #494949 !important;
border-radius: 50px;
border-color: #494949 !important;
transition: all 0.3s ease 0s;
}*/






.example_d {
color: #cd853f !important;
//text-transform: uppercase;
background: #ffffff;
padding: 6px;
border: 4px solid #66cdaa !important;
border-radius: 15px;
display: inline-block;
transition: all 0.3s ease 0s;
}



.example_d:hover {
color: #494949 !important;
border-radius: 50px;
border-color: #494949 !important;
transition: all 0.3s ease 0s;
}

.example_d1 {
color: #000000 !important;
//text-transform: uppercase;
background: #ffa07a;
padding: 10px;
border: 4px solid #ff8c00 !important;
border-radius: 15px;
display: inline-block;
transition: all 0.3s ease 0s;
}



.example_d1:hover {
color: red !important;
border-radius: 50px;
border-color: red !important;
transition: all 0.3s ease 0s;
}




</style>
</head>

<body>

<center><h1 style="background-color:lightgrey;">Teachers</h1></center>

<br>
<center>
<table cellpadding=5px width=50%>
 <tr><td width=300px></td>
<td align=center width=100></td>
<!--<td align=center><a class="example_d1" href="add Teachers.php" target="_blank" rel="nofollow noopener">ADD</a></td>
<td align=center><a class="example_d1" href="see teachers requests.php" target="_blank" rel="nofollow noopener">REQUESTS</a></td>-->
</tr>
</table>
</center>
<br>
<br>
<center>
<form action="Teacher info_studentview.php" method="POST">
<table class=table1 cellpadding=5px width=50%>



<?php

$rows1=mysqli_fetch_assoc($result1);
$class=$classroom;



$statment22="select * from users where class1='$class'";
$result22=mysqli_query($db,$statment22);
$rows22=mysqli_fetch_assoc($result22);
?>
<tr>
        <td width=30px><b> <?php echo "1"; ?></b></td>
        <td width=300px><b> <?php echo $rows22['username']." "."<font color='red'>*(class Tutor) &nbsp;</font>";  ?></b></td>
        
        <td align=center> <a class="example_d" href="profile teacher_studentview.php?id=<?php echo $rows22['Login_id']; ?>" rel="nofollow noopener">Profile</a></td>
</tr>
<?php
$count=2;
$statment2="select * from users where class2='$class' or class3='$class' or class4='$class' or class5='$class' or class6='$class' or class7='$class' or class8='$class' or class9='$class' or class10='$class'  order by username asc";
$result2=mysqli_query($db,$statment2);
while($rows2=mysqli_fetch_assoc($result2))
{


$st="select * from teacher order by Teacher_name asc";
$stm=mysqli_query($db,$st);
while($rows3=mysqli_fetch_assoc($stm))
{
  if($rows3['Teacher_name']==$rows2['username'])
  {
?>



   
    <tr>
        <td width=30px><b> <?php echo $count; ?></b></td>
        <td width=300px><b> <?php echo $rows2['username'] ?></b></td>
        
        <td align=center> <a class="example_d" href="profile teacher_studentview.php?id=<?php echo $rows2['Login_id']; ?>" rel="nofollow noopener">Profile</a></td>
      <!-- <td align=center><a class="example_d" onClick="<?php echo "javascript: return confirm('Remove this Teacher from this class?');"?>" href="deletetchr.php?id=<?php echo $rows2['Login_id']; ?>" class="example_d"><u>Remove</u></a></td>
-->        
    </tr>

<?php
}
}


$count++;
}

?>

 
</table>

</center>


</body>
</html>
