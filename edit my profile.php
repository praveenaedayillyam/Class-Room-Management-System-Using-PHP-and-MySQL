<?php
 
include 'config.php'; 
include "refresh_prevent.js";
// Starting the session, to use and 
// store data in session variable 
session_start(); 

// If the session variable is empty, this 
// means the user is yet to login 
// User will be sent to 'login.php' page 
// to allow the user to login 
if (!isset($_SESSION['username'])) { 
	$_SESSION['msg'] = "You have to log in first"; 
	header('location: HOME MAIN.php'); 
} 




//include 'TU_HOMEPAGE NEW.php';
$user=$_SESSION['username'];
$query="select * from student where Login_id='$user'";
$result=mysqli_query($db,$query);

if($query)
{
 //echo "result selected";
}

if(!$query)
{
  echo "result select failed!!!!!";
}


?>




<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width", initial-scale=1">

<style>


button.picupload {
  background-color: blue;
  color: white;
  
}

button.submit {
  background-color: blue;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 10%;
  font-size:20px;
  border-radius:50%;
  
}

button.submit:hover {
  opacity: 0.8;
}



body {
    background-color: #f9f9fa
}

.padding {
    padding: 3rem !important
}

.user-card-full {
    overflow: hidden
}

.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
    box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
    border: none;
    margin-bottom: 30px
}

.m-r-0 {
    margin-right: 0px
}

.m-l-0 {
    margin-left: 0px
}

.user-card-full .user-profile {
    border-radius: 5px 0 0 5px
}

.bg-c-lite-green {
    background: -webkit-gradient(linear, left top, right top, from(#63f2a3), to(#5aee73));
    background: linear-gradient(to right, #5aee6e, #aff263)
}

.user-profile {
    padding: 20px 0
}

.card-block {
    padding: 1.25rem
}

.m-b-25 {
    margin-bottom: 25px
}

.img-radius {
    border-radius: 50%
}

h6 {
    font-size: 14px
}

.card .card-block p {
    line-height: 25px
}

@media only screen and (min-width: 1400px) {
    p {
        font-size: 14px
    }
}

.card-block {
    padding: 1.25rem
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0
}

.m-b-20 {
    margin-bottom: 20px
}

.p-b-5 {
    padding-bottom: 5px !important
}

.card .card-block p {
    line-height: 25px
}

.m-b-10 {
    margin-bottom: 10px
}

.text-muted {
    color: #919aa3 !important
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0
}

.f-w-600 {
    font-weight: 600
}

.m-b-20 {
    margin-bottom: 20px
}

.m-t-40 {
    margin-top: 20px
}

.p-b-5 {
    padding-bottom: 5px !important
}

.m-b-10 {
    margin-bottom: 10px
}

.m-t-40 {
    margin-top: 20px
}

.user-card-full .social-link li {
    display: inline-block
}

.user-card-full .social-link li a {
    font-size: 20px;
    margin: 0 10px 0 0;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out
}





</style>
<body>
<br>
<pre align="right"><a href="My Profile student.php" ><b><font size="5px" color="red">Back</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</pre>

<?php
$rows=mysqli_fetch_assoc($result);

?>



<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            


<div class="card-block text-center text-white">
                    <center>
                    	<form action="edit my profile.php" method="post" enctype="multipart/form-data" name="frm_usr">
                    	<div class="m-b-25"> <img src="imageview_student_self.php" class="img-radius"alt="" height=100 width=100>  </div>
                                
                                <div><label for=photo>Select Photo</label></div>
                                <br> <input type="file" name="myfile"  height=100 width=100><br>
                                <button name="picupload" class="picupload" id="picupload" > Upload Pic</button>

                            </div><center>


                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h4>
                                
                                <table align="center" cellpadding=5px cellspacing=25%>

                                

                                <tr>  <th align=left> <i>Name<i> </th>   <td>:</td>   <td><b> <input type="text"  name="username" required value="<?php  echo $rows['Student_name'];?>" required></b> </td>    </tr>
<tr>  <th align=left> <i>Register Number<i> </th>   <td>:</td>   <td><b> <input type="text"  name="RegNo" required value="<?php  echo $rows['Reg_no'];?>" required></b> </td>    </tr>

<tr>  <th align=left> <i> Contact Number<i></th>   <td>:</td>   <td> <b> <input type="text" name="contactNo" required value="<?php  echo $rows['Contact_no'];?>" pattern="^\d{10}$" title="phone number contain 10 digits" required></b> </td>    </tr>
<tr>  <th align=left> <i>E-mail<i> </th>   <td>:</td>  <td><font color="grey"><?php echo $rows['Email_id'];?></font> </td>    </tr>
<tr>  <th align=left> <i>Department</i> </th>   <td>:</td>   <td><font color="grey"><?php echo $rows['UG_PG']." ".$rows['Department']." ".$rows['Year_of_Addmission'];?></font> </td>    </tr>





<tr>  <th align=left> <i>Parent Name</i> </th>   <td>:</td>   <td>  <b> <input class="input-field" type="text" name="parent" required value="<?php  echo $rows['Parant_Name'];?>"></b></td>    </tr>
<tr>  <th align=left> <i>Parant's Contact Number </i></th>   <td>:</td>   <td> <b> <input class="input-field" type="text" name="parenttNo" required value="<?php  echo $rows['Parent_Contact_No'];?>" pattern="^\d{10}$" title="phone number contain 10 digits" required></b> </td>    </tr>
</table>

</h4>
                            <center>  <div> <button class="submit" type="submit" name="submit" id="submit">Update</button></div>  

                            


<?php
if (count($_FILES) > 0) {
    if (is_uploaded_file($_FILES['myfile']['tmp_name'])) {
    	$imgData = addslashes(file_get_contents($_FILES['myfile']['tmp_name']));
    	$imageProperties = getimageSize($_FILES['myfile']['tmp_name']);
    }
}
 
    if(isset($_POST['submit']))
    {
      
        $username = $_POST['username'];
        $regno =strtoupper($_POST['RegNo']);
        $contactNo = $_POST['contactNo'];
        $parent = $_POST['parent'];
        $parentNo = $_POST['parentNo'];
    
      $statement1="UPDATE student set Student_name='$username',Reg_no='$regno', Contact_no='$contactNo',Parant_Name='$parent',Parent_Contact_No='$parentNo'  WHERE Login_id='$user'";
      $sql1=mysqli_query($db,$statement1);



      $statement11="UPDATE users set username='$username' WHERE Login_id='$user'";
      $sql11=mysqli_query($db,$statement11);


 // echo "890"; 
?>
<font color="red">
<?php
 if(!$sql1)
 {
   echo "Updation failed!!!!!";
 }
?>
</font>
<font color="blue">
<?php
    if($sql1&&$sql11)
  
    {
     
     
      echo "<script>
               alert('Updated Successfully')
               window.location.href='edit my profile.php'
               </script>";
      
    }


}    



if(isset($_POST['picupload']))
{
  
  //$username = $_POST['username'];
  
  //$contactNo = $_POST['contactNo'];
  //$email = $_POST['email'];
 

  $statement11="UPDATE student set photo_type='{$imageProperties['mime']}',photo='{$imgData}' WHERE Login_id='$user'";
  $sql11=mysqli_query($db,$statement11);
 // echo "890"; 
?>
<font color="red">
<?php
 if(!$sql11)
 {
   echo "Updation failed!!!!!";
 }
?>
</font>
<font color="blue">
<?php
    if($sql11)
  
    {
     
     
      echo "<script>
               alert('Updated Successfully')
               window.location.href='edit my profile.php'
               </script>";
      
    }


}    


mysqli_close($db);
?>
</font>
</center>
<!-- <script type="text/javascript"> location.reload();  </script> -->
</form>

                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
