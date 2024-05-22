<?php 
session_start();
include "refresh_prevent.js";
include "config.php";

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
 

<form id="form" name="form" action="Reg_student_s.php" method="POST" enctype="multipart/form-data" style="max-width:500px;" >


<H2><center><font color="midnightblue">Class Management</font></center></h2>

  <h3><font color="grey">Registration Form</font></h3>




  <?php

$st="select * from tutor";
$query=mysqli_query($db,$st);
$row=mysqli_fetch_assoc($query);


$st1="select * from tutor group by UG_PG order by UG_PG ASC";
$query1=mysqli_query($db,$st1);


?>





  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Your Name" name="username" required>
  </div>

  <div class="input-container">
    <i class="fa fa-registered icon"></i>
    <input class="input-field" type="text" placeholder="Register Number" name="RegNo" required>
  </div>

  <div class="input-container">
    <i class="fa fa-phone icon"></i>
    <input class="input-field" type="tel" placeholder="Contact Number" name="contactNo" pattern="^\d{10}$" title="phone number contain 10 digits" required>
  </div>


  <div class="input-container">
    <i class="fa fa-envelope icon"></i>
    <input class="input-field" type="email" placeholder="Email" name="email" required>
  </div>



  <div class="input-container">
    <i class="fa fauniversity icon"></i>
    <select class="input-field"  name="graguation" required>
    <option disabled selected hidden value="">--select UG/PG--</option>
    <?php
  
  while($row1=mysqli_fetch_array($query1))
   {
  ?>

    <option  value="<?php echo $row1['UG_PG']; ?>"> <?php echo $row1['UG_PG']; ?> </option>
    
   <?php } ?> 
    
  



</select></div>
  




<?php



$st2="select * from tutor group by Department order by Department ASC";
$query2=mysqli_query($db,$st2);

?>


 <div class="input-container">
    <i class="fa fa-university icon"></i>
    <!--  <input class="input-field" type="text" placeholder="department Name" name="department" required>
  </div>-->



  <select class="input-field" placeholder="department Name" name="department" required><option selected="selected" disabled="disabled" style="display:none;" value="">--select department--</option>
<?php
  while($row2=mysqli_fetch_array($query2))
  {



?>
    <option  value="<?php  echo $row2['Department']; ?>"> <?php  echo $row2['Department']; ?></option>
    
<?php } ?>


  </select>

</div>










  <?php

  

$st3="select * from tutor group by Year_of_Admission order by Year_of_Admission DESC";
$query3=mysqli_query($db,$st3);




?>




<div class="input-container">
    <i class="fa fa-hacker-news icon"></i>
   <!-- <input class="input-field" type="text" placeholder="Year of Admission" name="AdmissionYear" required>
  </div>-->



<select class="input-field" placeholder="Year of Admission" name="AdmissionYear" required><option selected="selected" disabled="disabled" style="display:none;" value="">--select Year of Admission--</option>



<?php
while($row3=mysqli_fetch_assoc($query3))
{
?>
  <option  value="<?php  echo $row3['Year_of_Admission']; ?>"> <?php  echo $row3['Year_of_Admission']; ?></option>
  
<?php




}


?>


  



</select>
</div>










   <div class="input-container">
    <i class="fa fa-address-card icon"></i>
    <textarea rows=6 cols=62% placeholder="Adress" name=address required></textarea>
  </div>


  <div class="input-container">
    <i class="fa fa-male icon,fa fa-female icon"></i>
    <input class="input-field" type="text" placeholder="Parent's Name" name="parent" required>
  </div>

    <div class="input-container">
    <i class="fa fa-phone icon"></i>
    <input class="input-field" type="tel" placeholder="Parent's Contact Number" name="parentNo" pattern="^\d{10}$" title="phone number contain 10 digits" required>
  </div>


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


 <center> <button type="submit" class="btn" name="submit" id="submit">Register</button></center>
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









if(isset($_POST['submit']))
{
  //echo "1234";
  $username = $_POST['username'];
  $regno =strtoupper($_POST['RegNo']);
  $contactNo = $_POST['contactNo'];
  $email = $_POST['email'];
  $graguation = $_POST['graguation'];
  
  $department = $_POST['department'];
  $AdmissionYear = $_POST['AdmissionYear'];
  $adress = $_POST['address'];
  $parent = $_POST['parent'];
  $parentNo = $_POST['parentNo'];
  $LoginId = $_POST['LoginId'];
  $psw = $_POST['psw'];
  $confirmpsw = $_POST['confirmpsw'];


  /*if($graguation!="UG" OR $graguation!="PG")
  { 
   echo "<script>
      alert('Select UG or PG from SELECT BOX')
      
      </script>";
    die(); 
  }*/


  if($psw!=$confirmpsw)
  { 
   echo "<script>
      alert('Password do not match')
      
      </script>";
    die(); 
  }


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





    $st5= "SELECT * from tutor where UG_PG='$graguation' AND Department='$department' AND Year_of_Admission='$AdmissionYear'";
    $query5=mysqli_query($db, $st5);
    //$row5=mysqli_fetch_assoc($query5);

    if( mysqli_num_rows($query5) >= 1)
    {
    
    
    
    }


    else
    {
    
    echo "<script>
        
          alert('Class does NOT exist')
          </script>";
          die();
    
    }
    

    $rowss=mysqli_fetch_assoc($query5);
    $class1=$rowss['Login_id'];

  //echo "567";
  $statement="INSERT INTO student(Student_name, Reg_no, Contact_no, Email_id, UG_PG, Department, Year_of_Addmission, class, adress, Parent_Name, Parent_Contact_No, Login_id, passwrd, photo_type, photo)
                           VALUES('$username','$regno', '$contactNo', '$email','$graguation', '$department', '$AdmissionYear','$class1', '$adress', '$parent', '$parentNo', '$LoginId', '$psw','{$imageProperties['mime']}','{$imgData}')";
  $sql=mysqli_query($db,$statement);


  


 // echo "890"; 
  if($sql)
    {
     
      echo "<script>
      alert('You have registered successfully')
      
      </script>";


      echo "<script>
      alert('You can join the class only when tutur let you In..')
      window.location.href='HOME MAIN.php'
      </script>";


    }

    if(!$sql)
    {
     
    echo "<script>
    alert('Registration Failed!!!!')
    
    </script>"; 
    }

}


?>




</body>
</html>

