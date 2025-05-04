<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Transaction</title>
</head>
<body>

    <h1>Add Transaction</h1>

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

        $result = mysqli_fetch_array($val);
        ?>
    <form method="post">
    <!-- action="AccountTransaction.php?acn=<?php //echo $acno ?>" -->
        <label for="AccountNo">Account No</label>
        <input type="text" name="AccountNo" value="<?php echo $result['AccountNo']?> " disabled><br><br>
        <label for="TypeID">Type Id</label>
        <input type="text" name="User_AccType" value="<?php echo $result['User_AccType'] ?>"disabled><br><br>
        <label for="TransactionType">Transaction Type</label>
        <select name="TransType">
            <option value="select" disabled>Select</option>
            <option value="Debit">Debit</option>
            <option value="Credit">Credit</option>
        </select><br><br>
        <label for="Amount">Transaction Amount</label>
        <input type="number" name="TransAmt">
        <br><br>
        <label for="TransDate">Transaction Date</label>
        <input type="date" name="date">
        <input type="submit" value="Add" name="submit">

    </form>
    <br><br>
    <button ><a class='btnLink' href ='AccountTransaction.php'>Back</a></button>

</body>
</html>

<?php 

    if(isset($_POST['submit'])){

        $arr = array();
        $arr[0]= $acno;
        $arr[1]= $result['User_AccType'];
        $arr[2]= $_POST['TransType'];
        $arr[3]= $_POST['TransAmt'];
     
        $output = $obj->TransactionInsert($arr);

        if($output){
            header("location:AccountTransaction.php");
        }
        else{
            echo "<br><br><b>Data Cannot Be Inserted</b>";
        }

        
    }

?>