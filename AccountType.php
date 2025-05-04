<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Types</title>

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

$val = $obj->getAccountType();

if($val != false){

    ?>
    <h2>Account type</h2>
    <table border=solid>
        <tr>
            <th>Type Id</th>
            <th>Type Name</th>
        </tr>

        <?php

            while($result = mysqli_fetch_array($val)){

            ?>
            <tr>
                <td><?php echo $result['TypeId'] ?></td>
                <td><?php echo $result['TypeName'] ?></td>
            </tr>
            <?php

            }

        ?>
        
    </table>
    <br><br>


    <?php
}
else{
    echo "No Data Found";
}
    ?>
    <br><br>
     <button class=""><a href ='insertType.php'>Insert Type</a></button><br>
     <br><button ><a class='btnLink' href ='welcome.php'>Back</a></button>


</body>
</html>