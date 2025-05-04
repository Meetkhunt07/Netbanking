<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Type</title>
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


?>

    <h1>Change Password</h1><br><br>
    <form method="post">
    <label for="AccountNo">Account No : </label>
    <input type="text" name="AccountNo" value="<?php echo $acno ?>">
    <br><br>
    <label for="oldPassword">Enter Old Password</label>
    <input type="password" name="oldPassword">
<br><br>
    <label for="newPassword">Enter New Password</label>
    <input type="password" name="newPassword">
<br><br>
    <label for="confirmNewPassword">Enter Confirm New Password</label>
    <input type="password" name="confirmNewPassword">
<br><br>
    <input type="submit" value="submit" name="submit">

    </form>

    
<br><br>
<button ><a class='btnLink' href ='UserDetails.php'>Back</a></button>
</body>
</html>

<?php 
 
include "connection.php";
$obj = new DB_Connection();

if(isset($_POST['submit'])){

    $oldPass = $_POST['oldPassword'];
    $newPass = $_POST['newPassword'];
    $newConfPass = $_POST['confirmNewPassword'];

    $passPattern ="/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,16}$/";

    if((!preg_match($passPattern,$oldPass)) && (!preg_match($passPattern,$newPass)) && (!preg_match($passPattern,$newConfPass))){
        echo "Enter Proper Passwords";
    }
    else if(!preg_match($passPattern,$oldPass))
    {
        echo "Enter Proper Old Password";
    }
    else if(!preg_match($passPattern,$newPass)){
        echo "Enter Proper New Password";
    }
    else if(!preg_match($passPattern,$newConfPass)){
        echo "Enter Proper New Confirm Password";
    }
    else{

        if($newConfPass == $newPass){
            if($oldPass != $newPass){
                $val = $obj->dispUserDetails($acno);

                if($val != false){
                    $result = mysqli_fetch_array($val);
                        if($result[0] == $acno && $result[9] == $oldPass){
        
                        $arr = array();
                        $arr[0] = $acno;
                        $arr[1] = $newPass;
        
                        $output = $obj->changePass($arr);

                        if($output){
                            header("location:UserDetails.php");
                        }
                        else{
                            echo "Password Not Changed";
                        }
                    }
                    else{
                       echo "Old Password Is Incorrect";
                    }
                }
        }
        else{
            echo "New Password Cannot be Same As Old Password";
        }

    }
    else{
        echo "New Confirm Password should be same as New Password";
    }
}
}
?>