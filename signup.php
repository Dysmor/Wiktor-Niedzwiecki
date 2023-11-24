<?php
session_start();

    include("connection.php");
    include("functions.php");

  if($_SERVER['REQUEST_METHOD'] == "POST")
    {

       $user_name = $_POST['user_name'];
       $password = $_POST['password'];

       if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
       {
            $user_id = random_num(20);
            $query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

            mysqli_query($con, $query);

            header("Location: login.php");
            die;
       }
       else
       {
        echo "Prosze zapisać poprawne informacje";
       }
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up</title>
</head>
<body>
    <p>zarejestruj sie</p>
    <nav id="box"> 
        <form method="post">
             <input type="text" name="user_name">
             <input type="password" name="password">
             <input type="submit" value="login">
             <p>kliknij aby sie <a href="signup.php">zalogowac</a></p>
        </form>
</body>
</html>