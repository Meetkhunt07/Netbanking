<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
</head>
<body>


<?php
session_start();
if(isset($_SESSION['ACNO'])){
    $acno = $_SESSION['ACNO'];
}
else{
    header('location:login.php');
}


include "connection.php";

$obj = new DB_Connection();

$val = $obj->dispUserDetails($acno);

if($val != false){

    $result = mysqli_fetch_array($val);

    ?>

    <h1>Edit Profile</h1>

    <form method="post" enctype="multipart/form-data">

        <label for="AccountNo">Account No</label>
        <input type="text" name="AccountNo" value="<?php echo $result['AccountNo'] ?> " disabled><br><br>
        <label for="UserMail">User Email</label>
        <input type="email" name="email" value = "<?php echo $result['User_Mail'] ?>"><br><br>
        <label for="User_AccType">Account Type</label>
        <input type="text" name="User_AccType" value="<?php echo $result['User_AccType'] ?> "disabled><br><br>
        <label for="UserName">User Name</label>
        <input type="text" name="userName" value="<?php echo $result['UserName'] ?>"><br><br>
        <label for="UserContact">Contact No </label>
        <input type="text" name="contact" value="<?php echo $result['UserContact'] ?>"><br><br>
        <label for="KYC_No">KYC No </label>
        <input type="text" name="KYC_No" value="<?php echo $result['KYC_No'] ?>" disabled><br><br>
        <label for="User_CurrentBal">Current Balance </label>
        <input type="text" name="currentBal" value="<?php echo $result['User_CurrentBal'] ?>" disabled><br><br>
        <label for="OpeningDate">Opening Date</label>        
        <input type="text" name="openDate" value="<?php echo $result['OpeningDate'] ?>" disabled><br><br>
        <label for="User_Address">Address</label>
        <input type="text" name="address" value="<?php echo $result['User_Address'] ?>" ><br><br>
        <input type="file" name="userphoto">
        <br><br>
        <input type="submit" value="update" name="submit">
    </form>

    <?php

}

if(isset($_POST['submit'])){

    $arr = array();
    $arr[0] = $_POST['email'];
    $arr[1] = $_POST['userName'];
    $arr[2] = $_POST['contact'];
    $arr[3] = $_POST['address'];
    $arr[4] = $acno;
    $arr[5] = $_FILES['userphoto']['name'];

    $path = "image/".$arr[5];
    // echo $path;
    move_uploaded_file($_FILES['userphoto']['tmp_name'],$path);

    $unmPattern = "/^[a-zA-Z0-9]+$/";
    $unmFlag=1;
    $conFlag=1;
    $addFlag=1;

    if(!preg_match($unmPattern,$arr[1])){
        echo "Enter Proper UserName<br>";
        $unmFlag=0;
    }
    if(!preg_match('/^[0-9]{10}$/',$arr[2])){
        echo "Enter Proper Contact<br>";
        $conFlag=0;
    }
    if(!preg_match('#^[a-zA-Z0-9-,/]{5,}$#',$arr[3])){
        echo "Enter Proper Address<br>";
        $addFlag=0;
    }

    if($unmFlag==0 && $conFlag==0 && $addFlag==0){
    }
    else{
        $obj->editProfile($arr);
        header("location:UserDetails.php");
    }
}


?>
<br><br>
<button ><a class='btnLink' href ='UserDetails.php'>Back</a></button>

</body>
</html>