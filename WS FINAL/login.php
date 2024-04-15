<?php
@include 'connection.php';

session_start();

if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $select = "SELECT * FROM ws_table_user WHERE email = '$email' && password = '$password' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
       
        $row = mysqli_fetch_array($result);

        if($row['user_type'] == 'Admin'){
            $_SESSION['admin_name'] = $row['name'];
            $_SESSION['admin_email'] = $row['email'];
            header('location:admin.php');
        }
        elseif($row['user_type'] == 'Student'){
            $_SESSION['student_name'] = $row['name'];
            $_SESSION['student_email'] = $row['email'];
            header('location:student.php');
        }
    }else{
        $error[] = 'incorrect email or password';
    }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    
<div class="form-container">

    <form autocomplete="off" action="" method="post">
        <h3>login now</h3>

        <?php

            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-message">'.$error.'</span>';
                }
            }

        ?>
    <div class="input-form">
        <input type="email" name="email" placeholder="email" required>
        <input type="password" name="password" placeholder="password" required>

        <input class="btn" type="submit" name="submit" value="submit now">
        <p>alredy have an account? <a href="register.php">register now</a></p>
    </form>
    </div>
</div>

</body>
</html>