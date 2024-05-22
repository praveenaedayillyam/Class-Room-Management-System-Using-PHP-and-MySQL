
 

<?php 
session_start();
include "refresh_prevent.js"; 
?>




<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

body {background:url('classroom.jpg') no-repeat center fixed;
background-size: cover;}

/*h2 {
  font-family: Merriweather, serif;
  font-size: 40px;
  }*/

/*h2 {
    font-family: 'Andika';font-size: 46px;
}*/

h2 {
  font-family: Cinzel, serif;
  font-size: 46px;  
}

p {text-align:left;}
.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

.icon {
  padding: 10px;
  background: dodgerblue;
  color: white;
  min-width: 50px;
  text-align: center;
}

.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 2px solid dodgerblue;
}

/* Set a style for the submit button */
.btn {
  background-color: dodgerblue;
  color: black;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}
</style>
</head>
<body leftmargin=250px>

<form action="reg TEACHER.php" method="post" enctype="multipart/form-data" name="frm_usr" style="max-width:500px;">

<H2><center><font color="midnightblue">Class Management</font></center></h2>

  <h3><font color="grey">Registration Form</font></h3>



  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Your name" name="username" required>
  </div>

  <div class="input-container">
    <i class="fa fa-phone icon"></i>
    <input class="input-field" type="tel" placeholder="Contact Number" name="contactNo" pattern="^\d{10}$" title="phone number contain 10 digits" required>
  </div>


  <div class="input-container">
    <i class="fa fa-envelope icon"></i>
    <input class="input-field" type="email" placeholder="Email" name="email" required>
  </div>


 <!-- <div class="input-container">
    <i class="fa fauniversity icon"></i>
    <select class="input-field"  name="graguation" required>
    <option disabled selected hidden>--select UG/PG--</option>
    <option value="UG">UG</option>
    <option value="PG">PG</option>
    </select>
  </div>-->



   <div class="input-container">
    <i class="fa fa-university icon"></i>
    <input class="input-field" type="text" placeholder="department Name" name="department" required>
  </div>

 <!--<div class="input-container">
    <i class="fa fa-hacker-news icon"></i>
    <input class="input-field" type="text" placeholder="Year of Admission of Students in the class" name="AdmissionYear" required>
  </div>-->


    <div class="input-container">
    <i class="fa fa-id-badge icon"></i>
    <input class="input-field" type="text" placeholder="Login Id" name="LoginId" required>
  </div>

  
  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" placeholder="Password" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required>
  </div>

  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="Password" placeholder="Confirm Password" name="confirmpsw" required>
  </div>


  <div><label for=photo>Select Photo <font size="small">(use croped photo of your face only)</font></label></div>
 <br> <input type="file" name="myfile"  height=100 width=100 required>
 <br>
<br>

 <center> <button type="submit" name="submit" id="submit" class="btn">Register</button></center>
</form>

 <?php
if (count($_FILES) > 0) {
    if (is_uploaded_file($_FILES['myfile']['tmp_name'])) {
    	$imgData = addslashes(file_get_contents($_FILES['myfile']['tmp_name']));
    	$imageProperties = getimageSize($_FILES['myfile']['tmp_name']);
    }
}
?>



<font color="red"><b>
<center>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<?php

/* $mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "classroom";
$bd = new mysqli($mysql_hostname, $mysql_user, $mysql_password);

if($bd)
{
echo "connected successfully to database";
}

if(!$bd)
{
die("Could not connect database");
}
$selectdb = mysqli_select_db($bd,$mysql_database);
if(!$selectdb)
{
   die("Could not select database");
}
if($selectdb)
{
   echo " selected successfully database";
} */

// Starting the session, necessary 
// for using session variables 


// Declaring and hoisting the variables 
$username = ""; 
$email = ""; 
$errors = array(); 
$_SESSION['success'] = ""; 

// DBMS connection code -> hostname, 
// username, password, database name 
$db = mysqli_connect('localhost', 'root', '', 'classroom'); 
if($db)
{
//echo "connected successfully to database";
}

if(!$db)
{
die("Could not connect database");
}

if(isset($_POST['submit']))
{
  
  $username = $_POST['username'];
  
  $contactNo = $_POST['contactNo'];
  $email = $_POST['email'];
 // $graguation = $_POST['graguation'];
  $department = $_POST['department'];
  //$AdmissionYear = $_POST['AdmissionYear'];
  $LoginId = $_POST['LoginId'];
  $psw = $_POST['psw'];
  $confirmpsw = $_POST['confirmpsw'];
  
  if($psw!=$confirmpsw)
  { 
   echo "<script>
      alert('Password do not match')
      
      </script>";
    die(); 
  }
    // Checking if the passwords match 
 

    $query = "SELECT * FROM users WHERE Login_id='$LoginId'"; 
$results = mysqli_query($db, $query); 

if (mysqli_num_rows($results) >= 1)
  { 
    echo "<script>
    alert('UserId Already exist')
   
    </script>";
     die();
  }


  $query11 = "SELECT * FROM users WHERE Email_id='$email'"; 
  $results11 = mysqli_query($db, $query11); 
  
  if (mysqli_num_rows($results11) >= 1)
    { 
      echo "<script>
      alert('This Email id has already Registered')
      
      </script>";
       die();
    }

 // $statement="INSERT INTO tutor(Tutor_name, Contact_no, Email_id,UG_PG,Department,Year_of_Admission, Login_id, passwrd) VALUES('$username', '$contactNo', '$email','$graguation', '$department', '$AdmissionYear', '$LoginId', '$psw')";
 // $sql=mysqli_query($db,$statement);
 // echo "890"; 


 
 $statement1="INSERT INTO teacher(Teacher_name, Contact_no, Email_id,Login_id,passwrd,photo_type,photo) VALUES('$username', '$contactNo', '$email', '$LoginId', '$psw','{$imageProperties['mime']}','{$imgData}')";
 $sql1=mysqli_query($db,$statement1) or die(mysqli_error());



 $statement2="INSERT INTO users(username, Login_id, Email_id, passwrd) VALUES('$username', '$LoginId' , '$email', '$psw')";
 $sql2=mysqli_query($db,$statement2)or die(mysqli_error());

 
 



 if(!$sql1 && !$sql2)
 {


    echo "<script>
        alert('Registration Failed!!!!')
        
        </script>"; 
   //echo "New record inserted failed!!!!!";
 }


  if($sql1 && $sql2)
  {
    



        echo "<script>
        alert('You have registered successfully')
        
        </script>";

      //echo "<br>Registerd sucessfully";
    

    

   // Storing username of the logged in user, 
		// in the session variable 
		$_SESSION['username'] = $LoginId; 
		
		// Welcome message 
		$_SESSION['success'] = "<br>You have logged in"; 
		
		// Page on which the user will be 
		// redirected after logging in 
	//	header('location: class.php'); 

 echo "<script>window.location.href='class.php'</script>";
}
}

?>
</center>
</b></font> 
</form>

<pre>

</pre>

</body>
</html>

