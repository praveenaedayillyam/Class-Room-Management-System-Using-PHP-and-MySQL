<?php
 
include 'config.php'; 
include 'TEACHER_HOME.php';
$user=$_SESSION['username'];
$query="select * from teacher where Login_id='$user'";
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





</style></head>
<body>


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
                    <center><div class="m-b-25"> <img src="imageview_teacher.php" class="img-radius" alt="User-Profile-Image" height=100 width=100>  </div>
                                <h3 class="f-w-600"> <?php  echo $rows['Teacher_name'];?></h3>
                                <br> <button name=btn1 onclick="window.location.href='edit teacher profile.php'">Edit</button>
                            </div><center>


                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                

                                <h4>
                                <table align="center" cellpading=25px cellspacing=25%>


<tr>  <th align=left> <i> Contact Number<i></th>   <td>:</td>   <td> <b> <?php  echo $rows['Contact_no'];?> </b> </td>    </tr>
<tr>  <th align=left> <i>E-mail<i> </th>   <td>:</td>   <td> <b> <?php  echo $rows['Email_id'];?></b> </td>    </tr>






<tr>  <th align=left> <i> From</i> </th>   <td>:</td>   <td><b> <?php  echo $rows['Department']." department";?> </b> </td>    </tr>


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

</html>