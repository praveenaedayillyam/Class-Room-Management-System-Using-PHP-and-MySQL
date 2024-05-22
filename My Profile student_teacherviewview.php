<?php
 session_start(); 

 date_default_timezone_set('Asia/kolkata');
include 'config.php'; 
//include 'TU_HOMEPAGE NEW.php';
$id=$_REQUEST['id'];
$query="select * from student where Email_id='$id'";
$result=mysqli_query($db,$query);
mysqli_close($db);
if($query)
{
 // echo "result selected";
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
    background: -webkit-gradient(linear, left top, right top, from(#f29263), to(#ee5a6f));
    background: linear-gradient(to right, #ee5a6f, #f29263)
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


<pre align="right"><a href="student info_teacherview.php" ><b><font size="6px" color="Red">Back</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</pre>


<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            

 <?php
$rows=mysqli_fetch_assoc($result);

?>




<div class="card-block text-center text-white">
                    <center><div class="m-b-25"> <img src="imageview_student.php?id=<?php echo $rows2['Email_id']; ?>" alt="User-Profile-Image" height=100 width=100>  </div>
                                <h3 class="f-w-600"> <?php  echo $rows['Student_name'];?></h3>
                                <br> 
                            </div><center>


                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">






                                <h4>
                                <table align="center" cellpadding=5px cellspacing=25%>

<tr>  <th align=left> <i>Register Number<i> </th>   <td>:</td>   <td><b><?php  echo $rows['Reg_no']; ?></b> </td>    </tr>

<tr>  <th align=left> <i> Contact Number<i></th>   <td>:</td>   <td> <b><?php  echo $rows['Contact_no']; ?></b> </td>    </tr>




<tr>  <th align=left> <i>E-mail<i> </th>   <td>:</td>   <td> <b> <?php  echo $rows['Email_id']; ?></b> </td>    </tr>

<tr>    <th align=left> <i>Class<i> </th>   <td>:</td>   <td> <b> <?php  echo $rows['UG_PG']." ".$rows['Department']." ".$rows['Year_of_Addmission']; ?></b> </td>   </tr>




<!--<tr>  <th align=left> <i>Department</i> </th>   <td>:</td>   <td><b> <?php  echo $rows['Department']; ?> </b> </td>    </tr>

<tr>  <th align=left><i> Year Of Admission </i></th>   <td>:</td>   <td><b> <?php  echo $rows['Year_of_Addmission']; ?></b>  </td>    </tr> -->

<!--<tr>  <th align=left> <i>Parent Name</i> </th>   <td>:</td>   <td>  <b> <?php  echo $rows['Parant_Name']; ?></b></td>    </tr>

<tr>  <th align=left> <i>Parant's Contact Number </i></th>   <td>:</td>   <td> <b> <?php  echo $rows['Parent_Contact_No']; ?></b> </td>    </tr>

<tr>  <th align=left> <i>Address</i> </th>   <td>:</td>   <td>  <b> <?php  echo $rows['adress']; ?></b></td>    </tr>-->
</table>
</h4>

                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

