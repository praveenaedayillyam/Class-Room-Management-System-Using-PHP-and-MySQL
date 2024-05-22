

<?php include 'config.php';
include 'TEACHER_HOME.php';
include 'refresh_prevent.js';

$id = $_SESSION['username'];
      $name="select * from teacher where Login_id='$id'";
      $NAME=mysqli_query($db,$name);
      $rows1=mysqli_fetch_assoc($NAME);
      $Email=$rows1['Email_id'];
      $class=$classroom;


    $display="select * from metirials where class='$class' order by sub_name asc";
    $count=0;
    $result=mysqli_query($db,$display);
    

?>

<!DOCTYPE html>
<html>
<head>
<style>
table.table2 table {
  border-collapse: collapse;
  width: 70%;
}



table.table2 th{
  text-align: center;
  padding: 8px;
  color: gray;
  font-size: 15px;
  
}

table.table2 td {
  text-align: center;
  padding: 8px;
  border-spacing: 5px;
}


button.edit {background-color:#4CAF50;    color:white; font-size: "50px"; padding: "16px" } 

table.table2 tr:nth-child(even) {background-color: #ffe4b5; }


</style>


</head>
<body>

<center><h1 style="background-color:lightgrey;">Syllabus</h1></center>
<br>
<center>

<form method="POST" action="Sylabus&books teacher view.php">



<select id="me" name="me" required>

<option value="upload by ME">upload by ME</option>
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


<select name="dep" id="dep" placeholder="--select--" required> 
    
  <?php  while($rw=mysqli_fetch_assoc($result))
  {
?>

<option  value="<?php echo $rw['sub_name']; ?>"><?php echo $rw['sub_name']; ?></option>
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
  
  
  ?>
 <hr align="left" width="90px" size="5px" color="red" noshade>
 <?php


$display1=mysqli_query($db,"select * from metirials where class='$class' AND upload_by='$Email' order by id_no asc");



while($r=mysqli_fetch_assoc($display1))
{
  $person=$r['upload_by']; 
  $display11=mysqli_query($db,"select * from teacher where Email_id='$person'");
  $r1=mysqli_fetch_assoc($display11);
  $nam=$r1['Teacher_name'];

?>





<pre>   <mark><font size="3px">  <?php echo $nam.",".$r['upload_date']; ?>  </font></mark></mark>
<table class=table1 cellspacing=10px cellpading=10px>


<tr>
<td><pre>       <button class="edit" name=btn1 onclick="window.location.href='edit sylabus&books_teacher.php?id=<?php echo $r['id_no']; ?>';">edit</button></pre> </td>
<td></td>
<td> </td>
</tr>



<tr>
<td></td>
<td></td>
<td> </td>
</tr>

<tr>
<td><font color=gray><pre>       Sem</pre></font></td>
<td>:</td>
<td><b><?php echo $r['sem']; ?> </b></td>
</tr>


<tr>
<td><font color=gray><pre>       Subject Code</pre></font></td>
<td>:</td>
<td><?php echo $r['sub_code']; ?> </td>
</tr>

<tr>
<td><font color=gray><pre>       Subject Name</pre></font></td>
<td>:</td>
<td> <?php echo $r['sub_name']; ?></td>
</tr>





<tr>
  <td><font color=gray><pre>       Description</pre></font></td>
  <td>:</td>
  <td><?php echo $r['syllabus_description']; ?> </td>
  </tr>

  </table></p>
  


<font color=gray><pre>         Syllabus     :</pre></font><br>


<center>
<img src="sylabus_view.php?id=<?php echo $r['id_no']; ?>" alt="Syllabus picture NOT uploaded" width="90%">



</center>
<pre>

</pre>


<hr align="center" width="95%" size="5px" color="red" noshade>

<?php
}





}














if(isset($_POST['choice']))
{
  
  
  ?>
 <hr align="left" width="90px" size="5px" color="red" noshade>
 <?php
$choice=$_POST['sem'];

$display1=mysqli_query($db,"select * from metirials where class='$class' AND sem='$choice' order by sub_name asc");



while($r=mysqli_fetch_assoc($display1))
{
  $person=$r['upload_by']; 
  $display11=mysqli_query($db,"select * from teacher where Email_id='$person'");
  $r1=mysqli_fetch_assoc($display11);
  $nam=$r1['Teacher_name'];

?>





<pre>   <mark><font size="3px">  <?php echo $nam.",".$r['upload_date']; ?>  </font></mark></mark>
<table class=table1 cellspacing=10px cellpading=10px>


<tr>
<!--<td><pre>       <button class="edit" name=btn1 onclick="window.location.href='edit sylabus&books.php?id=<?php echo $r['id_no']; ?>';">edit</button></pre> </td>-->
<td></td>
<td> </td>
<td></td>
</tr>



<tr>
<td></td>
<td></td>
<td> </td>
</tr>

<tr>
<td><font color=gray><pre>       Sem</pre></font></td>
<td>:</td>
<td><b><?php echo $r['sem']; ?> </b></td>
</tr>


<tr>
<td><font color=gray><pre>       Subject Code</pre></font></td>
<td>:</td>
<td><?php echo $r['sub_code']; ?> </td>
</tr>

<tr>
<td><font color=gray><pre>       Subject Name</pre></font></td>
<td>:</td>
<td> <?php echo $r['sub_name']; ?></td>
</tr>





<tr>
  <td><font color=gray><pre>       Description</pre></font></td>
  <td>:</td>
  <td><?php echo $r['syllabus_description']; ?> </td>
  </tr>

  </table></p>
  


<font color=gray><pre>         Syllabus     :</pre></font><br>


<center>
<img src="sylabus_view.php?id=<?php echo $r['id_no']; ?>" alt="Syllabus picture NOT uploaded" width="90%">



</center>
<pre>

</pre>


<hr align="center" width="95%" size="5px" color="red" noshade>

<?php
}





}



if(isset($_POST['choice1']))
{
  
  
  ?>
 <hr align="left" width="90px" size="5px" color="red" noshade>
 <?php
$choice=$_POST['dep'];

$display1=mysqli_query($db,"select * from metirials where class='$class' AND sub_name='$choice'");



$r=mysqli_fetch_assoc($display1);

  $person=$r['upload_by']; 
  $display11=mysqli_query($db,"select * from teacher where Email_id='$person'");
  $r1=mysqli_fetch_assoc($display11);
  $nam=$r1['Teacher_name'];

?>





<pre>   <mark><font size="3px">  <?php echo $nam.",".$r['upload_date']; ?>  </font></mark></mark>
<table class=table1 cellspacing=10px cellpading=10px>


<tr>
<!--<td><pre>       <button class="edit" name=btn1 onclick="window.location.href='edit sylabus&books.php?id=<?php echo $r['id_no']; ?>';">edit</button></pre> </td>-->
<td></td>
<td> </td>
</tr>



<tr>
<td></td>
<td></td>
<td> </td>
</tr>

<tr>
<td><font color=gray><pre>       Sem</pre></font></td>
<td>:</td>
<td><?php echo $r['sem']; ?> </td>
</tr>


<tr>
<td><font color=gray><pre>       Subject Code</pre></font></td>
<td>:</td>
<td><?php echo $r['sub_code']; ?> </td>
</tr>

<tr>
<td><font color=gray><pre>       Subject Name</pre></font></td>
<td>:</td>
<td><b> <?php echo $r['sub_name']; ?> </b></td>
</tr>





<tr>
  <td><font color=gray><pre>       Description</pre></font></td>
  <td>:</td>
  <td><?php echo $r['syllabus_description']; ?> </td>
  </tr>

  </table></p>
  


<font color=gray><pre>         Syllabus     :</pre></font><br>


<center>
<img src="sylabus_view.php?id=<?php echo $r['id_no']; ?>">



</center>
<pre>

</pre>


<hr align="center" width="95%" size="5px" color="red" noshade>

<?php











}


?>
<pre>








</pre>
</body>
</html>













<!--<p align="50px">
<table class=table1 cellspacing=10px>


<tr>
<td>  <button class="edit" name=btn1 onclick="window.location.href='edit Attendence view(tchr).html';">edit</button> </td>
<td></td>
<td> </td>
</tr>



<tr>
<td></td>
<td></td>
<td> </td>
</tr>

<tr>
<td><font color=gray>Sem</font></td>
<td>:</td>
<td> </td>
</tr>


<tr>
<td><font color=gray>Subject Code</font></td>
<td>:</td>
<td> </td>
</tr>

<tr>
<td><font color=gray>Subject Name</font></td>
<td>:</td>
<td> </td>
</tr>





<tr>
  <td><font color=gray>Description</font></td>
  <td>:</td>
  <td> </td>
  </tr>


  <tr>
<td><font color=gray>Syllabus</font></td>
<td>:</td>
<td> </td>
</tr>




</table></p>



</div>-->