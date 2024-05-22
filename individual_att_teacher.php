<?php include 'config.php';
include 'refresh_prevent.js';

// Starting the session, to use and 
// store data in session variable 
session_start(); 

date_default_timezone_set('Asia/kolkata');
$user=$_SESSION['username'];
//echo $user;

//include 'TU_HOMEPAGE NEW.php';

//$workid=$_REQUEST['id'];
//$_SESSION['work_id']=$workid;
//$work_id=$GLOBALS['wrk_id'];

//echo $work_id;

//$id = $_SESSION['username'];
      $name="select * from users where Login_id='$user'";
      $NAME=mysqli_query($db,$name);
      $rows1=mysqli_fetch_assoc($NAME);

      $name1="select * from users where Login_id='$user'";
      $NAME1=mysqli_query($db,$name1);
      $rows11=mysqli_fetch_assoc($NAME1);


      $Email=$rows1['Email_id'];
      $class=$rows11['current_class'];
      $att_id=$rows1['att_id'];

     // echo $att_id;

    $display="select * from attendence_info where att_id='$att_id'";
    $count=0;
    $result=mysqli_query($db,$display);



    
    $display11="select * from student where class='$class' AND added='1' order by Student_name asc";
  
    $result11=mysqli_query($db,$display11);
   // $studentname=mysqli_fetch_assoc($result11);
    
    

   
    
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
<head><!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
<style>



.button {
  background-color: blue;
  color: white;
  height: 200%;
  width: 100%;
  //border-radius:35%;
}


table.table1 {
  border-collapse: collapse;
  width: 100%;
}

th.th1{
  text-align: center;
  padding: 8px;
  color: gray;
  font-size: 15px;
  
}

 td.td1 {
  text-align: center;
  padding: 8px;
  border-spacing: 5px;
}

tr.tr1:nth-child(even) {background-color: #5efb6e;}
button{size: 5px;}




table.table2 {
  border-collapse: collapse;
  //width: 100%;
}

th.th2{
  text-align: center;
  padding: 8px;
  color: gray;
  font-size: 15px;
  
}

 td.td2 {
  text-align: center;
  padding: 8px;
  border-spacing: 5px;
}

tr.tr2:nth-child(even) {background-color: #ffe4b5;}
button{size: 5px;}





</style>
</head>
<body>
<br>
<pre align="right"><a href="see attendence_teacherview_1.php" ><b><font size="6px" color="red">Back</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</pre>
<center><h1 style="background-color:lightgrey;">Attendence Upload</h1></center>
<br>

<br>
<br>


<div style="overflow-x:auto;">
  <table class="table1">
    <tr class="tr1">
      
      <th class="th1">uploaded Date&Time</th>
      <th class="th1">Sem</th>
      <th class="th1">Subject Name</th>
      <th class="th1">Duration of uploading Attendence</th>
      <th class="th1">Total Number of Attendence</th>
      
      
     
     
    </tr>



    <?php



$rows=mysqli_fetch_assoc($result);


?>

<tr class=tr1>
      


      
      <td class="td1"> <font size="2px"><?php  echo $rows['upload_date'];?> </font></td>
      <td class="td1"> <?php  echo $rows['sem'];?>  </td>
      <td class="td1"> <?php  echo $rows['sub'];?>  </td>
      <td class="td1">  <?php  echo $rows['duration'];?> </td>
      
      <td class="td1"> <?php  echo $rows['total_attendence'];?>  </td>
     
      
    </tr>

    <?php
    
   
?>

  </table>
</div>
<br>
<br>
<br>
<div>
<form action="individual_att_teacher.php" method="POST">


<input type="text" name="attid" value="<?php echo $att_id; ?>" readonly hidden>



<center>

<table cellpading="20px" cellspacing="20px" leftmargin="10px" frame="box">
<tr>
<td><font color="grey">select Student Name<br></font>
<select name="student" id="student" class="box" style="width:200px" style="height:200px" required>
<option selected="selected" disabled="disabled" style="display:none;"></option>
<?php 
$count1=1;
while($studentname=mysqli_fetch_assoc($result11))
{
?>

<option value="<?php echo $studentname['Email_id']; ?>"><?php echo $count1.". ".$studentname['Student_name']; ?></option>

<?php
$count1++;
}


?>
</select>
</td>

<td><font color="grey">No: of Attendence of this student</font><br><input type="text" name="att" required></td>

<td><br><button name="submit" id="submit" class="button">Upload</button></td>




</tr>
</table>
</center>
</form>

<?php
if(isset($_POST['submit']))
    {
        //$date=date('d-m-y h:i:s');
       $attid=$_POST['attid'];
       $name=$_POST['student'];
       $att=$_POST['att'];
       $date=date('d-m-y h:i:s');

       $total=$rows['total_attendence'];

     

       
       
      if($att>$total)
      {

        echo "<script>
        alert('This value is GREATER than TOTAL NUMBER OF ATTENDENCE')
        
        </script>";

      }

else{


  $att_per=((int)$att/(int)$total)*100;
       $sa="SELECT * from student where Email_id='$name'";
      $sa1=mysqli_query($db,$sa);
      $sa2=mysqli_fetch_assoc($sa1);
      $regno=$sa2['Reg_no'];

       $s="SELECT * from attendence where att_id='$attid' AND student='$name'";
      $s1=mysqli_query($db,$s);
      $s2=mysqli_fetch_assoc($s1);


      

      
      if($s2==NULL)
          {

              $st="INSERT INTO attendence(att_id,upload_date,roll_no,student,no_of_attendence,percentage,class)
               VALUES('$attid','$date','$regno','$name','$att','$att_per','$class')";
              $st1=mysqli_query($db,$st);
          }

         if($s2!=NULL)
          {


         
                   

                         $st="UPDATE attendence set no_of_attendence='$att',percentage='$att_per',upload_date='$date'  where att_id='$attid' AND student='$name'";
                         $st1=mysqli_query($db,$st); 
               }

          
        


          



      if($st1)
       {

        

       }

       if(!$st1)
       {

        echo "<script>
        alert('Updation Failed')
        
        </script>";


       }

      }
    }  


?>
</div>
<br><br>

<div>
<center>



<table class="table2">

<tr class="tr2">
<th class="th2"></th>
<th class="th2"><font size="2px">Uploaded Date&Time</font></th>

<th class="th2">Student Name</th>
<th class="th2">Attendence in Number</th>
<th class="th2">Attendence in percentage(%)</th>
</tr>


<?php


$ss="SELECT * from attendence where att_id='$att_id' order by roll_no asc";
$ss1=mysqli_query($db,$ss);

$count2=1;

while($ss2=mysqli_fetch_assoc($ss1))
{
  $name1=$ss2['student'];
  $sss="SELECT * from student where Email_id='$name1'";
  $sss1=mysqli_query($db,$sss);
  $sss2=mysqli_fetch_assoc($sss1);

?>


<tr class="tr2"> 
<td class="td2"> <?php echo $count2;  ?></td>
<td class="td2"><font size="2px">  <?php echo $ss2['upload_date'];  ?> </font> </td>

<td class="td2"> <?php echo $sss2['Student_name'];  ?></td>
<td class="td2"> <?php echo $ss2['no_of_attendence'];  ?></td>
<td class="td2"> <?php echo $ss2['percentage']." %";  ?></td>


</tr>

<?php $count2++; }  ?>

<table>
</center>
</div>




<pre>













</pre>
</body>
</html>

