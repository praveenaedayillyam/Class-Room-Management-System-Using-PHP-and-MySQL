<?php 
include "refresh_prevent.js";


// Starting the session, necessary 
// for using session variables
//session_id("session1"); 

session_start(); 



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
  echo "<br>";
 // echo "connected successfully";
}


// User login 
if (isset($_POST['login'])) { 
	
	// Data sanitization to prevent SQL injection 
	$username = mysqli_real_escape_string($db, $_POST['uname']); 
	$password = mysqli_real_escape_string($db, $_POST['psw']); 

	// Error message if the input field is left blank 
	if (empty($username)) { 
		array_push($errors, "Username is required"); 
    //echo "username is required";
	} 
	if (empty($password)) { 
		array_push($errors, "Password is required"); 
	} 

	// Checking for the errors 
//	if (count($errors) == 0) { 
		
		// Password matching 
		//$password = md5($password); 
		
		$query = "SELECT * FROM users WHERE Login_id='$username' AND Passwrd='$password'"; 
		$results = mysqli_query($db, $query); 



if($results)
{
  echo "<br><br>";
  
 // echo "result is equal to ONE";
  echo "<br>";
    $q=mysqli_num_rows($results);
    //echo "$q";
    echo "<br>";
}
else
{
  
  echo "<br>result failed";
}


		// $results = 1 means that one user with the 
		// entered username exists 
		if (mysqli_num_rows($results) == 1) { 
			
			// Storing username in session variable 
			$_SESSION['username'] = $username; 
			
			// Welcome message 
			$_SESSION['success'] = "You have logged in!"; 
			
			// Page on which the user is sent 
			// to after logging in 
			header('location: class.php'); 
		} 
		else { 
      	// If the username and password doesn't match 
		//	array_push($errors, "Username or password incorrect"); 
    //echo "<h3 style='background-color:white'><font color='red'>";
    //echo " Incorrect Username or password ";
    //echo "</font></h3>";

    echo "<script>
    alert('Incorrect Username or Password ')
    window.location.href='HOME MAIN.php'
    </script>";


  } 
}

	 
//} 

?> 







<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Website Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="form_home_css.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }

  
.jumbotron { background: url('images\ \(25\).jpeg');}
h1 { background-color: rgb(0,255,255,0.7); }

  </style>




</head>
<body style="background-color: rgb(241, 245, 190);">

<div class="jumbotron text-center" style="margin-bottom:0">
  <h1>--CLASS MANAGEMENT--</h1><br>
  <br><br>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Contact Us</a></li>
        

      </ul>
    </div>
  </div>
</nav>

<div class="container">
  





    <div class="col-sm-8">
      <h2>TITLE HEADING</h2>
      <h5>Title description, Dec 7, 2017</h5>
      <div class="fakeimg">Fake Image</div>
      <p>Some text..</p>
      <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
      <br>
      <h2>TITLE HEADING</h2>
      <h5>Title description, Sep 2, 2017</h5>
      <div class="fakeimg">Fake Image</div>
      <p>Some text..</p>
      <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
    </div>



    <div class="row" align="center">
        <div class="col-sm-4" align="center">
            <div class="login-page" align="center">
                <div class="form" align="center">
                    
                  
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                    
                    
                    
                    <form class="login-form" action="HOME MAIN.php" method="POST">
                      <center>
                      <table><p>
                   <tr align="center"><th align="center"> <input type="text" placeholder="Login Id"  name="uname" required></th></tr>
                   <tr align="center"><th align="center"> <input type="password" placeholder="password"  name="psw" required> </th></tr>
                   <tr align="center"><th align="center"><p align=center> <button class="button10" name="login" id="login">login</button> </p></th></tr>
                  </p> </table></center>
                   <p class="message"> <a href="forgot_password.php">Forgot password</a></p>
                   <p class="message">RegisterAs<a href="Reg_student_s.php"> <b>STUDENT</b></a>
                    &nbsp;&nbsp;&nbsp;&nbsp;RegisterAs<a href="reg TEACHER.php"><b>TEACHER</b></a></p>

                  </form>
                </div>
              </div>
        </div>
     </div>
</div>

<div class="" style="margin-bottom:0">
  <pre>






    </pre>
</div>

</body>
</html>
