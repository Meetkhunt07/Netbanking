<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>


<?php
    
session_start();

    include 'connection.php';


    if(isset($_POST['submit'])){
        $acno = $_POST['AccountNo'];
        $pass = $_POST['user_pass'];
        $flag=1;
    }
    else if($_SESSION['ACNO']){
        $acno = $_SESSION['ACNO'];
        $pass = $_SESSION['PASS'];
        $flag=1;
    }
    else{
        header('location:login.php?error=Login First');
    }

    if($flag==1){

        $AcNoPattern = "/^[0-9]+$/";
        $passPattern ="/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,16}$/";

        if((!preg_match($AcNoPattern,$acno)) && (!preg_match($passPattern,$pass))){
            header('location:login.php?error=Enter Proper Account No And Passoword');
        }
        else if(!preg_match($AcNoPattern,$acno))
        {
            header('location:login.php?error=Enter proper Account No');
        }
        else if(!preg_match($passPattern,$pass)){
            header('location:login.php?error=Enter Proper Password');
        }
        else{
            
        $obj = new DB_Connection();

        $val = $obj->dispUserDetails($acno);

        if($val != false){
            $result = mysqli_fetch_array($val);
                if($result[0] == $acno && $result[9] == $pass){
                    $_SESSION['ACNO'] = $acno;
                    $_SESSION['PASS'] = $pass;
                echo "<h1> Welcome </h1>";
                echo "<br>";
            //   image a display in welcome page...
                $imageUrl = 'image/'.$result[10];
                echo "<img src='$imageUrl' alt='Update Profile To Add Profile Photo' height='100px' width='100px'><br><br>";
            // display all webpage on button tag...
                echo "<button><a href ='UserDetails.php' >User Details</a></button> <br><br>";
                echo "<button><a href ='AccountTransaction.php'>Account Transactions</a></button><br><br>";
                echo "<button><a href='AccountType.php'>Account Types</a></button><br><br>";
      
                

                }
                else{
                    header('location:login.php?error=Enter Correct Account No and Password');
                }
            } 
     }
     }        

?>

<form method="post" action="logout.php">

    <input type="submit" value="Logout" name="logout">

</form>

</body>
</html>