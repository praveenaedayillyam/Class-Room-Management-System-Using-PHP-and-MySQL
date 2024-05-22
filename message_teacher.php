<!DOCTYPE html>
<html>




<?php include 'config.php';
      include 'TEACHER_HOME.php';
       
      $id = $_SESSION['username'];
      $name="select * from teacher where Login_id='$id'";
      $NAME=mysqli_query($db,$name);
      $rows1=mysqli_fetch_assoc($NAME);
      $Email=$rows1['Email_id'];
      $class=$classroom;

    if(isset($_POST['submit']))
    {
    
      //echo "1234";
      
     
      $user=$_POST['name'];
      $message = $_POST['msg'];
      $current=date('d-m-y h:i:s');
      
      //echo "567";
      $statement="INSERT INTO message(current,fromwho,msg,class) VALUES('$current', '$user','$message','$class')";
      $sql=mysqli_query($db,$statement);
     // echo "890"; 
      if($sql)
        {
         // echo "New record inserted sucessfully";
      
        }
    
        if(!$sql)
        {
          echo "New record inserted failed!!!!!";
        }
    
    }
    
    
  


$display="select * from message where class='$class' order by id_no desc";
$count=0;
$result=mysqli_query($db,$display);




if($display)
{
  //echo "result selected";
}

if(!$display)
{
  echo "result select failed!!!!!";
}


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

<p align=right><button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Add Message</button></p>

<div id="id01" class="message">
  
  <form class="message-content animate" action="message_teacher.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Message">&times;</span>
      
    </div>
  <!--<?php $rows1=mysqli_fetch_assoc($NAME);
  
  
  ?>-->




    <div class="container">
      <!--<label for="uname"><b>Your Name</b></label>-->
      <input type="text"  name="name" value="<?php echo $Email; ?>" required readonly hidden> 
       <br><br><br>
      <label for="msg"><b>Message</b></label>
      <textarea placeholder="type Message" name="msg" required></textarea>
        
      <button type="submit" name="submit" id="submit">Send</button>
      <label>
        
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      
    </div>
  </form>
</div>




<script>
// Get the modal
var message = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == message) {
        message.style.display = "none";
    }
}

</script>


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

