<?php

session_start();

if (isset($_SESSION['ACNO'])) {

    $_SESSION['ACNO'] = null;
    session_destroy();
    header("Location: login.php");
    exit;
}
 else {
    echo "Cannot Logout";
    // header("Location: login.php");
    exit;

}

?>
