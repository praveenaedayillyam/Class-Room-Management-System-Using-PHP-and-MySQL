<?php include 'config.php';
include 'STUDENT_HOME.php';
include 'refresh_prevent.js';

$id = $_SESSION['username'];
      $name="select * from users where Login_id='$id'";
      $NAME=mysqli_query($db,$name);
      $rows1=mysqli_fetch_assoc($NAME);
      $Email=$rows1['Email_id'];
      $class=$rows1['current_class'];


    $display="select * from student_work where class='$class' order by work_id desc";
   
    $result=mysqli_query($db,$display);
    
    $count=0;

   
    
    if($display)
    {
     // echo "result selected";
    }
    
    if(!$display)
    {
      echo "result select failed!!!!!";
    }
    
    
  ?>




<!DOCTYPE html>
<html>
<head>
<style>
table {
  border-collapse: collapse;
  width: 100%;
  border-color:white;
}

th{
  text-align: center;
  padding: 8px;
  color: gray;
  font-size: 15px;
  
}

 td {
  text-align: center;
  padding: 8px;
  border-spacing: 5px;
}

tr:nth-child(even) {background-color: #ffe4b5;}
</style>
</head>
<body>

<center><h1 style="background-color:lightgrey;">Works and Internals</h1></center>
<br>


<center>

<form method="POST" action="internal(student view).php">



<select id="all" name="all" required>

<option value="all">All</option>
</select>

&nbsp;
<button class="choice" name="choice2" id="choice2">ok</button>

&nbsp;&nbsp;    &nbsp;&nbsp;    &nbsp;&nbsp;    &nbsp;&nbsp;    &nbsp;&nbsp;    &nbsp;&nbsp;

&nbsp;&nbsp;    &nbsp;&nbsp;    &nbsp;&nbsp;    &nbsp;&nbsp;    &nbsp;&nbsp;    &nbsp;&nbsp;




<select id="sem" name="sem" required>
    
    <option value="1<sup>st</sup> sem">1<sup>st</sup> Sem</option>
    <option value="2<sup>nd</sup> sem">2<sup>nd</sup> Sem</option>
    <option value="3<sup>rd</sup> sem">3<sup>rd</sup> Sem</option>
    <option value="4<sup>th</sup> sem">4<sup>th</sup> Sem</option>
    <option value="5<sup>th</sup> sem">5<sup>th</sup> Sem</option>
    <option value="6<sup>th</sup> sem">6<sup>th</sup> Sem</option>
    
    </select>
    
    &nbsp;
<button class="choice" name="choice" id="choice">ok</button>


&nbsp;&nbsp;    &nbsp;&nbsp;    &nbsp;&nbsp;    &nbsp;&nbsp;    &nbsp;&nbsp;    &nbsp;&nbsp;

&nbsp;&nbsp;    &nbsp;&nbsp;    &nbsp;&nbsp;    &nbsp;&nbsp;    &nbsp;&nbsp;    &nbsp;&nbsp;


<select name="teacher" id="teacher" placeholder="--select--" required> 
<?php

$statment2="select * from users where (class1='$class' or class2='$class' or class3='$class' or class4='$class' or class5='$class' or class6='$class' or class7='$class' or class8='$class' or class9='$class' or class10='$class') AND class_type='10'  order by username asc";
$result2=mysqli_query($db,$statment2);
//while($rows2=mysqli_fetch_assoc($result2))



    
   while($rw=mysqli_fetch_assoc($result2))
  {
?>

<option  value="<?php echo $rw['Email_id']; ?>"><?php echo $rw['username']; ?></option>
<?php } ?>

  </select>
  &nbsp;
  <button class="choice" name="choice1" id="choice1">ok</button>



  </form>
</center>
<br>
<?php

if(isset($_POST['choice2']))
{
 


if (mysqli_num_rows($result) >= 1)
{
 ?> 

<div style="overflow-x:auto;">
  <table border=1 frame="void">
    <tr>
    <th></th>
      <th></th>
      <th>Sem</th>
      <th>Subject</th>
      <th>Work</th>
      <th>Topic</th>
      <th>Description</th>
      <th>Last Date of Submission</th>
      <th><font color="red">Submitted Date</font></th>
      <th><font color="red">Obtained Mark</font></th>
      <th>OUT OF</th>
      <th></th> 

     
    </tr>


    <?php





$sn=0;
while($rows=mysqli_fetch_assoc($result))
{
 $sn=$sn+1; 
 $id_id=$rows['work_id'];
 $display1="select * from work_update where work_id='$id_id' AND student='$Email'";
    //$count=0;
    $result1=mysqli_query($db,$display1);
    $rows1=mysqli_fetch_assoc($result1);
    
    $email=$rows['upload_by'];
    $display1="select * from teacher where Email_id='$email'";
       //$count=0;
       $result2=mysqli_query($db,$display1);
       $rows2=mysqli_fetch_assoc($result2);

?>



    <tr>
    <td> <button href=""> <?php echo $sn;  ?> </button> </td>
      <td> <font size="2px">  <mark> <?php  echo $rows2['Teacher_name'];?></mark></font> <br> <font size="1px"><?php  echo $rows['current'];?> </font></td>

      <td> <?php  echo $rows['sem'];?> </td>
      <td> <?php  echo $rows['subjectname'];?> </td>
      <td> <?php  echo $rows['Work'];?>  </td>
      <td>  <?php  echo $rows['Topic'];?> </td>
      
      <td> <?php  echo $rows['descriptn'];?>  </td>
      <td> <?php  echo $rows['Last_Date'];?>  </td>


<?php

      if($rows1!=NULL)
{

?>


      
      <td><B> <?php  echo $rows1['submitted_date'];?></b>  </td>
      <td><b> <?php  echo $rows1['mark'];?> </b> </td>

<?php }  ?>


<?php


if($rows1==NULL)
{

?>


      
      <td><font color="red"><b>  -- </b></font></td>
      <td><font color="red"> <b> --</b> </font></td>

<?php } 


?>

<td> <?php  echo $rows['out_of'];?>  </td> </tr>
  
    
<?php

}?>

   </table> <?php
}


else
{
echo "<br><br><br><center><b><i><font color='grey'>No Uploads<font></i></b></center>";

}




}?>





<?php


if(isset($_POST['choice']))
{


$sem=$_POST['sem'];


$display="select * from student_work where class='$class' AND sem='$sem' order by work_id desc";
   
$result=mysqli_query($db,$display);


if (mysqli_num_rows($result) >= 1)
{
 ?> 

<div style="overflow-x:auto;">
  <table border=1 frame="void">
    <tr>
    <th></th>
      <th></th>
      <th>Sem</th>
      <th>Subject</th>
      <th>Work</th>
      <th>Topic</th>
      <th>Description</th>
      <th>Last Date of Submission</th>
      <th><font color="red">Submitted Date</font></th>
      <th><font color="red">Obtained Mark</font></th>
      <th>OUT OF</th>
      <th></th> 

     
    </tr>


    <?php





$sn=0;
while($rows=mysqli_fetch_assoc($result))
{
 $sn=$sn+1; 
 $id_id=$rows['work_id'];
 $display1="select * from work_update where work_id='$id_id' AND student='$Email'";
    //$count=0;
    $result1=mysqli_query($db,$display1);
    $rows1=mysqli_fetch_assoc($result1);
    
    $email=$rows['upload_by'];
    $display1="select * from teacher where Email_id='$email'";
       //$count=0;
       $result2=mysqli_query($db,$display1);
       $rows2=mysqli_fetch_assoc($result2);

?>



    <tr>
    <td> <button href=""> <?php echo $sn;  ?> </button> </td>
      <td> <font size="2px">  <mark> <?php  echo $rows2['Teacher_name'];?></mark></font> <br> <font size="1px"><?php  echo $rows['current'];?> </font></td>

      <td> <?php  echo $rows['sem'];?> </td>
      <td> <?php  echo $rows['subjectname'];?> </td>
      <td> <?php  echo $rows['Work'];?>  </td>
      <td>  <?php  echo $rows['Topic'];?> </td>
      
      <td> <?php  echo $rows['descriptn'];?>  </td>
      <td> <?php  echo $rows['Last_Date'];?>  </td>


<?php

      if($rows1!=NULL)
{

?>


      
      <td><B> <?php  echo $rows1['submitted_date'];?></b>  </td>
      <td><b> <?php  echo $rows1['mark'];?> </b> </td>

<?php }  ?>


<?php


if($rows1==NULL)
{

?>


      
      <td><font color="red"><b>  -- </b></font></td>
      <td><font color="red"> <b> --</b> </font></td>

<?php } 


?>

<td> <?php  echo $rows['out_of'];?>  </td> </tr>
  
    
   
    <?php

}?>

   </table> <?php
}


else
{
echo "<br><br><br><center><b><i><font color='grey'>No Uploads<font></i></b></center>";

}




}?>








<?php


if(isset($_POST['choice1']))
{


  $person=$_POST['teacher'];


$display="select * from student_work where class='$class' AND upload_by='$person' order by work_id desc";
   
$result=mysqli_query($db,$display);


if (mysqli_num_rows($result) >= 1)
{
 ?> 

<div style="overflow-x:auto;">
  <table border=1 frame="void">
    <tr>
    <th></th>
      <th></th>
      <th>Sem</th>
      <th>Subject</th>
      <th>Work</th>
      <th>Topic</th>
      <th>Description</th>
      <th>Last Date of Submission</th>
      <th><font color="red">Submitted Date</font></th>
      <th><font color="red">Obtained Mark</font></th>
      <th>OUT OF</th>
      <th></th> 

     
    </tr>


    <?php





$sn=0;
while($rows=mysqli_fetch_assoc($result))
{
 $sn=$sn+1; 
 $id_id=$rows['work_id'];
 $display1="select * from work_update where work_id='$id_id' AND student='$Email'";
    //$count=0;
    $result1=mysqli_query($db,$display1);
    $rows1=mysqli_fetch_assoc($result1);
    
    $email=$rows['upload_by'];
    $display1="select * from teacher where Email_id='$email'";
       //$count=0;
       $result2=mysqli_query($db,$display1);
       $rows2=mysqli_fetch_assoc($result2);

?>



    <tr>
    <td> <button href=""> <?php echo $sn;  ?> </button> </td>
      <td> <font size="2px">  <mark> <?php  echo $rows2['Teacher_name'];?></mark></font> <br> <font size="1px"><?php  echo $rows['current'];?> </font></td>

      <td> <?php  echo $rows['sem'];?> </td>
      <td> <?php  echo $rows['subjectname'];?> </td>
      <td> <?php  echo $rows['Work'];?>  </td>
      <td>  <?php  echo $rows['Topic'];?> </td>
      
      <td> <?php  echo $rows['descriptn'];?>  </td>
      <td> <?php  echo $rows['Last_Date'];?>  </td>


<?php

      if($rows1!=NULL)
{

?>


      
      <td><B> <?php  echo $rows1['submitted_date'];?></b>  </td>
      <td><b> <?php  echo $rows1['mark'];?> </b> </td>

<?php }  ?>


<?php


if($rows1==NULL)
{

?>


      
      <td><font color="red"><b>  -- </b></font></td>
      <td><font color="red"> <b> --</b> </font></td>

<?php } 


?>

<td> <?php  echo $rows['out_of'];?>  </td> </tr>
  
    
   
    <?php

}?>

   </table> <?php
}


else
{
echo "<br><br><br><center><b><i><font color='grey'>No Uploads<font></i></b></center>";

}




}?>








</div>


</body>
</html>