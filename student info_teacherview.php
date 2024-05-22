<?php

include "TEACHER_HOME.php";
include "config.php";

$statment1="select * from student where class='$classroom' order by Reg_no asc";
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
<style>

table.table1 tr:nth-child(odd) {background-color: #fff0f5; }



button.buttonT {
color: #cd853f !important;
//text-transform: uppercase;
background: #ffffff;
padding: 7px;
border: 4px solid #66cdaa !important;
border-radius: 15px;
display: inline-block;
transition: all 0.3s ease 0s;

}



button.buttonT:hover {
color: #494949 !important;
border-radius: 50px;
border-color: #494949 !important;
transition: all 0.3s ease 0s;
}






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

<center><h1 style="background-color:lightgrey;">Students</h1></center>

<br>
<center>

</center>
<br>
<br>
<center>

<?php

if(!$result1)
{

  echo "<pre>



  <big><center><i>No Students were Added in this Class</i></center></big>
 
 
 
 </pre>";
 

}

else{   ?>

  <form action="student info_teacherview.php" method="POST">
  <table class=table1 cellpadding=5px width=50%>
  
  <?php
$count=1;

while($rows2=mysqli_fetch_assoc($result1))
{

?>

<tr>
        <td align="center" width=30px><b><?php echo $rows2['Reg_no'] ?></b></td>
        <td align="center" width=300px><b><?php echo $rows2['Student_name'] ?></b></td>
        
        <td align=center> <a class="example_d" href="My Profile student_teacherviewview.php?id=<?php echo $rows2['Email_id']; ?>" rel="nofollow noopener">Profile</a></td>
       <!--<td align=center><a class="example_d" onClick="<?php echo "javascript: return confirm('Remove this Student from this class?');"?>" href="delete_tchr.php?id=<?php echo $rows2['Email_id']; ?>" class="example_d"><u>Remove</u></a></td>-->


        <td align=center><a class="example_d" href="internal(teacher view).php?id=<?php echo $rows2['Email_id'];?>"  rel="nofollow noopener">Internal</a></td>
    </tr>


<?php

}

?>


   
   
</table>

</form>
<?php } ?>

</center>


</body>
</html>
