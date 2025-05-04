<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <h1 >Login</h1>
    <form  action="welcome.php" method="post">
          <br><br>
              <label for="username">Account No</label><br>
              <input class="input" name="AccountNo" type="text" placeholder="Username" id="username">
          <br><br>
              <label for="password">Password</label><br>
              <input class="input" name="user_pass" type="password" placeholder="Password" id="password">
          <br><br>
              <input type="submit" name="submit" class="buttonSub" value="Login">
          <br><br>
      </form>

<a href="signUp.php">New User ? Clickhere to Register</a>
</body>
</html>

<?php

    if(isset($_GET['error'])){
      echo $_GET['error'];
    }

?>