<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
<style>
    #TransIdInp{
    visibility: hidden;
    height: 0;
    width: 0;
}
</style>
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

if(isset($_POST['delete'])){
    $tid = $_POST['TransId'];

    $output = $obj->deleteTransaction($tid);

    if($output){
        echo "<h1 class='alert alert-primary' id='alert'>Data Deleted Successfully</h1>";
    }
    else{
        echo "<h1 class='alert alert-primary' id='alert'>Data Not Deleted</h1>";
    }
}

$val = $obj->getTransactionDetails($acno);

if($val != false){

    ?>
    <h2>Account Transaction</h2>
    <table border=solid>
        <tr>
            <th>Transaction Id</th>
            <th>Account No</th>
            <th>Type Id </th>
            <th>Transaction Type</th>
            <th>Transaction Amount</th>
            <th>Transcation Date</th>
        </tr>

        <?php

            while($result = mysqli_fetch_array($val)){

            ?>
            <tr>
                <td><?php echo $result['TransactionID'] ?></td>
                <td><?php echo $result['AccountNo'] ?></td>
                <td><?php echo $result['TypeID'] ?></td>
                <td><?php echo $result['TransactionType'] ?></td>
                <td><?php echo $result['TransactionAmt'] ?></td>
                <td><?php echo $result['TransactionDate'] ?></td>
                <td><form method="post">
                    <input type="submit" value="delete" name="delete">
                    <input type="text" name="TransId" value="<?php echo $result['TransactionID'] ?>" id="TransIdInp">
                </form></td>
            </tr>
            <?php

            }

        ?>
        
    </table>
    <br><br>


    <?php
}
else{
    echo "No Transaction Found";
}
echo "<br><br><button ><a class='btnLink' href ='AddTransaction.php'>Add Transaction</a></button>";
echo "<br><br><button ><a class='btnLink' href ='welcome.php'>Back</a></button>";



    ?>
       <br><br> 
       <br><br>

       

</body>
</html>