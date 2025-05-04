<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Type</title>
</head>
<body>
    <h2>Insert type</h2>
    <form method="post">

    <label for="AccountType">Account Type</label>
    <select name="AccountType">
        <option value="Savings">Savings</option>
        <option value="Current">Current</option>
        <option value="FD">FD</option>
        <option value="Recurring">Recurring</option>
    </select>
    <br><br>
    <input type="submit" value="submit" name="submit">

    </form>
    <br><button ><a class='btnLink' href ='AccountType.php'>Back</a></button>

</body>
</html>

<?php 
include "connection.php";
 session_start();
 if(isset($_SESSION['ACNO'])){
     $acno = $_SESSION['ACNO'];
 }
 else{
     header('location:login.php');
 }
 

    if(isset($_POST['AccountType'])){

        

        $obj = new DB_Connection();
        
        $output = $obj->insertAccType($_POST['AccountType']);

        if($output){
            header('location:AccountType.php');
        }
        else{
            echo "<br><br><b>Data Cannot Be Inserted</b>";
        }
}
?>