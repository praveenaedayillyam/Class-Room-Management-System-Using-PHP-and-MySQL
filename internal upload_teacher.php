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
      $Email=$rows1['Email_id'];
      
      $work_id=$rows1['work_id'];


    $q=mysqli_query($db,"select * from users where Login_id='$user'");
    $q2=mysqli_fetch_assoc($q);

      $class=$q2['current_class'];

      //echo $work_id;

    $display="select * from student_work where work_id='$work_id'";
    $count=0;
    $result=mysqli_query($db,$display);



    
    $display11="select * from student where class='$class'AND added='1' order by Student_name asc";
  
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

tr.tr1:nth-child(even) {background-color: #ffd700;}
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
<pre align="right"><a href="see works_teacherview1.php" ><b><font size="6px" color="red">Back</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</pre>
<center><h1 style="background-color:lightgrey;">Internal Upload</h1></center>
<br>

<br>
<br>


<div style="overflow-x:auto;">
  <table class="table1">
    <tr class="tr1">
      
      <th class="th1">uploaded Date&Time</th>
      <th class="th1">Sem</th>
      <th class="th1">Subject</th>
      <th class="th1">Work</th>
      <th class="th1">Topic</th>
      <th class="th1">Description</th>
      <th class="th1">Last Date of Submission</th>
      
      <th>OUT OF</th>
     
    </tr>



    <?php



$rows=mysqli_fetch_assoc($result);


?>

<tr class=tr1>
      
      <td class="td1"> <font size="2px"> <?php  echo $rows['current'];?> </font></td>

      <td class="td1"> <?php  echo $rows['sem'];?> </td>
      <td class="td1"> <?php  echo $rows['subjectname'];?> </td>
      <td class="td1"> <?php  echo $rows['Work'];?>  </td>
      <td class="td1">  <?php  echo $rows['Topic'];?> </td>
      
      <td class="td1"> <?php  echo $rows['descriptn'];?>  </td>
      <td class="td1"> <?php  echo $rows['Last_Date'];?>  </td>
      <td class="td1"> <?php  echo $rows['out_of'];?>  </td>
      
    </tr>

    <?php
    
   
?>

  </table>
</div>
<br>
<br>
<br>
<div>
<form action="internal upload_teacher.php" method="POST">


<input type="text" name="wrkid" value="<?php echo $work_id; ?>" readonly hidden>



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

<td><font color="grey">Submitted Date</font><br><input type="date" name="submitdate"></td>
<td><font color="grey">Obtained mark</font><br><input type="text" name="mark"></td>
<td><br><button name="submit" id="submit" class="button">Upload</button></td>




</tr>
</table>
</center>
</form>

<?php
if(isset($_POST['submit']))
    {
        $date=date('d-m-y h:i:s');
       $wrkid=$_POST['wrkid'];
       $name=$_POST['student'];
       $subdate=$_POST['submitdate'];
       $mark1=$_POST['mark'];
       $outof=$rows['out_of'];

       if($mark1>$outof)
       {
 
         echo "<script>
         alert('This value is GREATER than TOTAL INTERNAL MARK')
        
         </script>";
 
       }
 
 else
    {
       


       $sa="SELECT * from student where Email_id='$name'";
      $sa1=mysqli_query($db,$sa);
      $sa2=mysqli_fetch_assoc($sa1);
      $regno=$sa2['Reg_no'];

       $s="SELECT * from work_update where work_id='$wrkid' AND student='$name'";
      $s1=mysqli_query($db,$s);
      $s2=mysqli_fetch_assoc($s1);


      if($subdate==NULL AND $mark1==NULL)
      {
        

      }

      
     else if($s2==NULL)
          {

              $st="INSERT INTO work_update(work_id,student,reg_no,date,submitted_date,mark) VALUES('$wrkid','$name','$regno','$date','$subdate','$mark1')";
              $st1=mysqli_query($db,$st);
          }

         else if($s2!=NULL)
          {


          if($subdate!=NULL or $mark1!=NULL)
               {
                   if($subdate==NULL)
                      {

                         $st="UPDATE work_update set mark='$mark1',date='$date' where work_id='$wrkid' AND student='$name'";
                         $st1=mysqli_query($db,$st);

                      }



                    if($mark1==NULL)
                      {

                            $st="UPDATE work_update set submitted_date='$subdate',date='$date' where work_id='$wrkid' AND student='$name'";
                           $st1=mysqli_query($db,$st);

                      }
               }

          
            else{}


          }


      /* if($st1)
       {

        echo "<script>
        alert('Updated Successfully')

        </script>";


       }

       if(!$st1)
       {

        echo "<script>
        alert('Updation Failed')
        
        </script>";


       }*/


    }  
  }

?>
</div>
<br><br>

<div>
<center>

<!--<?php echo $work_id;?>-->

<table class="table2">

<tr class="tr2">
<th class="th2"></th>
<th class="th2"><font size="2px">Uploaded Date&Time</font></th>

<th class="th2">Student Name</th>
<th class="th2">Submitted Date</th>
<th class="th2">Obtained Mark</th>
</tr>


<?php


$ss="SELECT * from work_update where work_id='$work_id' order by reg_no asc";
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
<td class="td2"><font size="2px">  <?php echo $ss2['date'];  ?> </font> </td>

<td class="td2"> <?php echo $sss2['Student_name'];  ?></td>
<td class="td2"> <?php echo $ss2['submitted_date'];  ?></td>
<td class="td2"> <?php echo $ss2['mark'];  ?></td>


</tr>

<?php $count2++; }  ?>

<table>
</center>
</div>




<pre>













</pre>
</body>
</html>

