<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'banking'); 

class DB_Connection{

    public $con="";
    
    public function __construct() {
        
        $this->con = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

        // if($this->con){
        //     echo "connected";
        // }
        // else{
        //     echo "Not Connected";
        // }

    }
    

    public function getUserDetails(){
    

        $SqlQry = "SELECT * FROM user_details";

        $result = $this->con->query($SqlQry);
       // $result=mysqli_query($this->con,$SqlQry);
        if($result->num_rows > 0){
            return $result;
        }
        else{
            return false;
        }

    }

    public function dispUserDetails($acno){
    
        $SqlQry = "SELECT * FROM user_details WHERE AccountNo = $acno ";

        $result = $this->con->query($SqlQry);
       // $result=mysqli_query($this->con,$SqlQry);
        if($result->num_rows > 0){
            return $result;
        }
        else{
            return false;
        }

    }

    public function getAccountType(){

        $qry = "SELECT * FROM account_types";

        $result = $this->con->query($qry);

        if($result->num_rows > 0){
            return $result;
        }
        else{
            return false;
        }

    }

    public function getTransactionDetails($acno){

        $qry = "SELECT * FROM account_transaction WHERE AccountNo = $acno";

        $result = $this->con->query($qry);

        if($result->num_rows > 0){
            return $result;
        }
        else{
            return false;
        }

    }

    public function insertAccType($name){

        echo $name;

        $insQry = "INSERT INTO account_types(TypeName) VALUES ('$name')";

        $result = $this->con->query($insQry);

        return $result;
        // if($result->num_rows > 0){
        //     echo "Data Inserted Successfully";
        // }
        // else{
        //     echo "Data Cannot be Inserted";
        // }

    }

    public function editProfile($arr){
        
        $updateQry = "UPDATE user_details SET User_Mail = '$arr[0]',UserName = '$arr[1]',UserContact = $arr[2],User_Address = '$arr[3]',pic_add='$arr[5]' WHERE AccountNo = $arr[4]";

        $result = $this->con->query($updateQry);

        return $result;
    }


    public function TransactionInsert($arr){

        $insertQry = "INSERT INTO account_transaction (TransactionID,AccountNo, TypeID, TransactionType,TransactionAmt) VALUES('',$arr[0],$arr[1],'$arr[2]',$arr[3])"; 

        $result = $this->con->query($insertQry);
        return $result;

    }

    public function changePass($arr){

        $qry = "UPDATE user_details SET UserPass = '$arr[1]' WHERE AccountNo = $arr[0]";
        $result = $this->con->query($qry);
        return $result;

    }

    public function deleteTransaction($tid){
        $dltQry = "DELETE FROM account_transaction WHERE TransactionID = $tid";
        $result = $this->con->query($dltQry);
        return $result;
    }
}

// $obj = new DB_Connection();
?>
