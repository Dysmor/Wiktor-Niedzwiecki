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
   
            $query = "select * from users where user_name = '$user_name' limit 1";

            $result = mysqli_query($con, $query);

            if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);
                    if($user_data['password'] === $password)
                    {
                        $_SESSION['user_id'] = $user_data['user_id'];
                        header("Location: index.php");
                         die;
                    }
                }
                echo "Błędna nazwa uzytkownika lub hasło";
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
    <title>log in</title>
</head>
<body>
    <p>zaloguj sie</p>
    <nav id="box"> 
        <form method="post">
             <input type="text" name="user_name">
             <input type="password" name="password">
             <input type="submit" value="login">
             <p>kliknij aby sie <a href="signup.php">zarejestrowac</a></p>
        </form>
</body>
</html>