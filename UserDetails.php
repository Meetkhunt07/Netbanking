<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
</head>
<body>
<?php 

// if($logChk){
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

    ?>
    <table border=2>
        <tr>
            <th>Account No</th>
            <th>User Mail</th>
            <th>Account Type</th>
            <th>User Name</th>
            <th>Contact No</th>
            <th>KYC No</th>
            <th>Current Balance</th>
            <th>Opening Date</th>
            <th>Address</th>
        </tr>

        <?php

            while($result = mysqli_fetch_array($val)){

            ?>
            <tr>
                <td><?php echo $result['AccountNo'] ?></td>
                <td><?php echo $result['User_Mail'] ?></td>
                <td><?php echo $result['User_AccType'] ?></td>
                <td><?php echo $result['UserName'] ?></td>
                <td><?php echo $result['UserContact'] ?></td>
                <td><?php echo $result['KYC_No'] ?></td>
                <td><?php echo $result['User_CurrentBal'] ?></td>
                <td><?php echo $result['OpeningDate'] ?></td>
                <td><?php echo $result['User_Address'] ?></td>
            </tr>
            <?php

            }

        ?>
        
    </table>
    <br><br>

    <button><a href ='EditProfile.php'>Edit Profile</a></button><br><br>
    <button><a href ='UpdatePassword.php'>Update Password</a></button><br><br>
    <button ><a class='btnLink' href ='welcome.php'>Back</a></button>


    <?php
}
else{
    echo "No Users Found";
}

// }
// else{
//     header('location:login.php');
// }
    ?>

    
</body>
</html>