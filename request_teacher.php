<?php include 'config.php';
include 'TEACHER_HOME.php';
$id = $_SESSION['username'];
$name="select * from teacher where Login_id='$id'";
$NAME=mysqli_query($db,$name);
 $rows1=mysqli_fetch_assoc($NAME);
 $Email=$rows1['Email_id'];
 $class=$classroom;
?>


<!DOCTYPE html>
<html>
<head>

<script> 
function optionvalue()
{
  document.getElementById('select').value="<?php echo $_GET['select'];?>";
}
</script>


<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body.body1 {font-family: Arial, Helvetica, sans-serif;}

hr {
  //height:5px;
border: 3px double;
width: 95%;
margin-left: auto;
margin-right: auto;
color: #4169e1;
}



/* Full-width input fields */
textarea{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}



/* Set a style for all buttons */
button.btn {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button.btn:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}



.container {
  padding: 16px;
}



/* The Modal (background) */
.request {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
  
}

/* Modal Content/Box */
.request-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Modal (background) */
.requestview {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
  
}

/* Modal Content/Box */
.requestview-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}








/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body name=body1 id=body1>

<center><h1 style="background-color:lightgrey;">Messages</h1></center>

<b><center>

<form action="request_teacher.php" method="post">

<select name="select">

<!--<option <?php if ($_GET['select'] == 'Send by me') { ?>selected="true" <?php }; ?>value="Send by me">Send by me</option>
   <option <?php if ($_GET['select'] == 'Send to me') { ?>selected="true" <?php }; ?>value="Send to me">Send to me</option>

   </select>&nbsp;&nbsp;
<button class="choice" name="choice" id="choice" onclick="optionvalue()">ok</button>-->
<option value="NOT replyed by me">NOT replyed by me</option>
<option value="Send by me">Send by me</option>
<option value="Send to me">Send to me</option>


</select>&nbsp;&nbsp;
<button class="choice" name="choice" id="choice" onclick="optionvalue()">ok</button>

<script> 
function optionvalue()
{
  document.getElementById('select').value="<?php echo $_GET['select'];?>";
}
</script>
</form>

</center></b>


<button class="btn" name=btn1 onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Send Message</button><br><br>

<div id="id01" class="request">
  
  <form class="request-content animate" action="request_teacher.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Message">&times;</span>
      
    </div>

      <div class="container">
     <table cellspacing=5px cellpadding=5px>
        <tr> <th align="left"></th>
     <td> <input type="text" placeholder="Your Name" value="<?php echo $Email; ?>" name="from" required  readonly hidden></td>
       </tr>

<?php



$st="select * from users where class1='class' or class2='$class' or class3='$class' or class4='$class' or class5='$class' or class6='$class' or class7='$class' or class8='$class' or class9='$class' or class10='$class'order by username";
$stm=mysqli_query($db,$st);


?>
<tr><th align="left">To</th>
    <td>  <select name="to" id="to" placeholder="--select--" required>
  <?php  while($rw=mysqli_fetch_assoc($stm))
  {
?>

<option  value="<?php echo $rw['username']; ?>"><?php echo $rw['username']; ?></option>
<?php } ?>
    </tr>  </table> <br>

    <label for="sub"><b>Sub</b></label>
    <label>
     <td> <input type="text" name="sub"></td>
       </tr>
  </label>
<br><br>
      <label for="req"><b>Message</b></label>
      <textarea placeholder="Type message" name="message" required></textarea>
        
      <button class="btn" name="send" id="send">Send</button>
      <label>
        
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      
    </div>
  </form>
<?php
  if(isset($_POST['send']))
    {
    
      //echo "1234";
      $from = $_POST['from'];
      $to = $_POST['to'];
      $message = $_POST['message'];
      $sub=$_POST['sub'];

      $querty="select * from users where username='$to'";
      $result=mysqli_query($db,$querty);
      $result1=mysqli_fetch_assoc($result);
      $to1=$result1['Email_id'];
      $time1=date('d-m-y h:i:s');
      
     // echo "567";
      $statement="INSERT INTO request(current,from_who,to_whom,Sub,msg) VALUES('$time1','$from','$to1','$sub','$message')";
      $sql=mysqli_query($db,$statement);
      //echo "890"; 
      if($sql)
        {
          echo  "<script>
            alert('Sended Successfully')
            window.location.href='request_teacher.php'
            </script>";
      
        }
    
        if(!$sql)
        {

            echo  "<script>
            alert('Failed!!!!!!!!!')
            window.location.href='request_teacher.php'
            </script>";
      
        }
    
    }
  
  ?>

</div>

<script>
// Get the modal
var request = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == request) {
        request.style.display = "none";
    }
}
</script>




<?php if(isset($_POST['choice']))
{
  $select=$_POST['select'];
   echo "<center><font color='red'><b><i>".$select."</i></b></font></center>";

   ?>
   <hr>
   
     
<?php
   
 
   
   
   if($select=="Send by me")
  {
      $count=1;
      //echo "send by me";
     $st1="select * from request where from_who='$Email' order by id_no desc";
     $stm1=mysqli_query($db,$st1);


     while($rw1=mysqli_fetch_assoc($stm1))
       {

       $e_mail= $rw1['to_whom'];
      $s="select * from users where Email_id='$e_mail'";
      $s1=mysqli_query($db,$s);
      $s2=mysqli_fetch_assoc($s1);
      $towhom=$s2['username'];
     ?>

    

        <table cellspacing=5px cellpadding=5px leftmargin="30px"> 
      <!--<br>-->
      <!--<tr><td colspAN=2><hr></td></tr>-->
     
      <!--<tr>
      <th>From</th> <td>:</td> <td></td>
      </tr>-->
      <tr><td>  <button> <?php echo $count ?></button>  </td></tr>
      <tr>
      <th>To</th> <td>:</td> <td><?php echo $towhom ?></td>
      </tr>
      <tr>
      <th>Sub</th> <td>:</td> <td><?php echo $rw1['Sub']?></td>
      </tr>
      <tr>
      <th>Message</th><td>:</td>  <td><?php echo $rw1['msg']." ".$rw1['current']?></td>
      </tr>

      <?php
if($rw1['Reply']!==NULL)
{
  ?>
      <tr>
      <th>Reply</th> <td>:</td> <td><mark><?php echo $rw1['Reply']." ".$rw1['reply_time'];?></mark></td>
      </tr>
      
      </table>
      <hr>
      <?php
      $count++;

      ?>

  <?php
    }


  if($rw1['Reply']==NULL)
{
  ?>
      <tr>
      <th>Reply</th> <td>:</td> <td> <font color="red" size="3px"> <i>Not replyed yet</i></font></td>
      </tr>
      
      </table>
      <hr>
      <?php
      $count++;
}

  }
      ?>
  
      
    <pre>




</pre>
   <?php   
      
  }


   if($select=="Send to me")
  {
    
       //echo "send to me";

   


       $count=1;
       //echo "send by me";
      $st1="select * from request where to_whom='$Email' order by id_no desc";
      $stm1=mysqli_query($db,$st1);
 
 
      while($rw1=mysqli_fetch_assoc($stm1))
        {
 
        $e_mail= $rw1['from_who'];
       $s="select * from users where Email_id='$e_mail'";
       $s1=mysqli_query($db,$s);
       $s2=mysqli_fetch_assoc($s1);
       $fromwho=$s2['username'];
      ?>
 
     
 <table cellspacing=5px cellpadding=5px leftmargin="30px"> 
         
       <!--<br>-->
       <!--<tr><td colspAN=2><hr></td></tr>-->
      
       <!--<tr>
       <th>From</th> <td>:</td> <td></td>
       </tr>-->
       <form action="request_.php" method="post">

       <tr><td>  <button> <?php echo $count ?></button> <input type=text name="idno" id="idno" value="<?php echo $rw1['id_no'] ?>" readonly hidden> </td></tr>
       <tr>
       <th>From</th> <td>:</td> <td><?php echo $fromwho ?></td>
       </tr>
       <tr>
       <th>Sub</th> <td>:</td> <td><?php echo $rw1['Sub']?></td>
       </tr>

       


       <tr>
       <th>Message</th><td>:</td>  <td><?php echo $rw1['msg']." ".$rw1['reply_time'];?></td>
       </tr>
      
       <?php
 if($rw1['Reply']!==NULL)
 {
   ?>
       <tr>
       <th>Reply</th> <td>:</td> <td><?php echo $rw1['Reply']." ".$rw1['reply_time'];?></td>
       </tr>
       
      
       
       <?php
       $count++;
 
       ?>
 
   <?php
     }
 
 
   if($rw1['Reply']==NULL)
 {
   ?>

   
       <th> Reply</th> <td>:</td> <td>  <textarea name="rply" id="rply" placeholder="Type Reply" cols="100"></textarea>
      <br>
      <?php
      echo " <font color='red' size='4px'> <i>*you NOT replyed this one</i></font>";
         ?>
       </td>
     <td>  <button class="btn" style="width: Auto;" name="rplybtn" id="rplybtn">Send</button><br><br>
       </td>
      </tr>
       <?php
       $count++;
       

 }

 
   
       ?>
   
       
       
       
</form>

<?php



?>



<table>
  <hr> 
       
       
     
    <?php 
      

      }



       ?>

 <?php    
  }









  if($select=="NOT replyed by me")
  {
    
       //echo "send to me";

   

      $rply111=NULL;
       $count=1;
       //echo "send by me";
      $st1="SELECT * from request where to_whom='$Email' AND Reply IS NULL order by id_no desc";
      $stm1=mysqli_query($db,$st1);
 
 
      while($rw1=mysqli_fetch_assoc($stm1))
        {
 
        $e_mail= $rw1['from_who'];
       $s="select * from users where Email_id='$e_mail'";
       $s1=mysqli_query($db,$s);
       $s2=mysqli_fetch_assoc($s1);
       $fromwho=$s2['username'];
      ?>
 
     
 <table cellspacing=5px cellpadding=5px leftmargin="30px"> 
         
       <!--<br>-->
       <!--<tr><td colspAN=2><hr></td></tr>-->
      
       <!--<tr>
       <th>From</th> <td>:</td> <td></td>
       </tr>-->
       <form action="request_teacher.php" method="post">

       <tr><td>  <button> <?php echo $count ?></button> <input type=text name="idno" id="idno" value="<?php echo $rw1['id_no'] ?>" readonly hidden> </td></tr>
       <tr>
       <th>From</th> <td>:</td> <td><?php echo $fromwho ?></td>
       </tr>
       <tr>
       <th>Sub</th> <td>:</td> <td><?php echo $rw1['Sub']?></td>
       </tr>

       


       <tr>
       <th>Message</th><td>:</td>  <td><?php echo $rw1['msg']?></td>
       </tr>
      
       
 
 
   <?php
     
 
 
   

   ?>

   
       <th> Reply</th> <td>:</td> <td>  <textarea name="rply" id="rply" placeholder="Type Reply" cols="100"></textarea>
      <br>
      <?php
      echo " <font color='red' size='4px'> <i>*you NOT replyed this one</i></font>";
         ?>
       </td>
     <td>  <button class="btn" style="width: Auto;" name="rplybtn" id="rplybtn">Send</button><br><br>
       </td>
      </tr>
       <?php
       $count++;
       



 
   
       ?>
   
       
       
       
</form>

<?php



?>



</table>
  <hr> 
       
       
     
    <?php 
      

      }



       ?>

 <?php    
  }




}


if(isset($_POST['rplybtn']))
{

  $id_id=$_POST['idno'];  //echo  $id_id;
  $rply_rply=$_POST['rply']; //echo $rply_rply;
  $time=date('d-m-y h:i:s');


$a="update request set Reply='$rply_rply',reply_time='$time'  where id_no='$id_id'";
$b=mysqli_query($db,$a);
if($b)
{
  
  echo "<script>
  alert('Replyed Successfully');
 
  </script>";

}

if(!$b)
{
  
  echo "<script>
  alert('Failed!!!!!!!!!!!');
 
  </script>";

}


}

?>









</body>
</html>

