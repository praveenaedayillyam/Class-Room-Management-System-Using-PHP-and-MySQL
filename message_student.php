<!DOCTYPE html>
<html>




<?php include 'config.php';
      include 'STUDENT_HOME.php';
       
      $id = $_SESSION['username'];
      $name="select * from student where Login_id='$id'";
      $NAME=mysqli_query($db,$name);
      $rows1=mysqli_fetch_assoc($NAME);
      $Email=$rows1['Email_id'];
      $class=$classroom;

   
    
    
  


$display="select * from message where class='$class' order by id_no desc";
$count=0;
$result=mysqli_query($db,$display);




?>




<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

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
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  border-radius: 0%;
}

button:hover {
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
.message {
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
.message-content {
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
<body>

<center><h1 style="background-color:lightgrey;" >Broadcasts</h1></center>









<?php
while($rows=mysqli_fetch_assoc($result))
{

  $email=$rows['fromwho'];
  $display2="select * from users where Email_id='$email'";
     //$count=0;
     $result2=mysqli_query($db,$display2);
     $rows2=mysqli_fetch_assoc($result2);
     $from=$rows2['username'];
      
?>

<?php
if(($count%2)!=0)

{
?>


<br>
    <div style="background-color:#add8e6" style="opacity: 1;">
      <br>
        <p><font color="red"><b>&nbsp;<?php  echo $from;?> :</b></font> <font size=1px color=grey> <b><?php echo  $rows['current'];?> </b> </font><br></p>
          <p>&nbsp; <?php echo  $rows['msg'];?> </p>
       <br>        
    </div>

<?php
}
?>


<?php
if(($count%2)==0)

{
?>



    <br>
    <div style="background-color:#fad1d0" width="80%">
      <br>
        <p><font color="red"><b>&nbsp; <?php echo $rows2['username'];?>:</b></font><font size=1px color=grey> <b><?php echo  $rows['current'];?> </b> </font><br></p>
          <p>&nbsp;<?php echo $rows['msg'];?></p>
       <br>        
    </div>

<?php
}
?>
<?php
$count++; }
mysqli_close($db);

?>





   
    
<script>
  if( window.history.replaceState)
  {
     window.history.replaceState(null, null, window.location.href);
  }
  </script>



    

</body>
</html>

