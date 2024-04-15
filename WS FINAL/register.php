<?php
@include 'connection.php';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $user_type = $_POST['user_type'];
    $yas = $_POST['yas'];
    $subject = $_POST['subject'];

    $select = "SELECT * FROM ws_table_user WHERE email = '$email' && password = '$password' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $error[] = 'user alredy exist';
    }else{
        if($password != $cpassword){
            $error[] = 'password not match';
        }else{
            $insert = "INSERT INTO ws_table_user(name, email, password, user_type, yas, subject) VALUES('$name','$email','$password','$user_type', '$yas', '$subject')";
            mysqli_query($conn, $insert);
            header('location:login.php');
        }
    }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet" href="register.css">
    <style>
        .error-message{
            color: #0F0529;
            font-weight: 700;
            background: crimson;
            padding: 10px 232px;
            margin-left: 50px;
        }
    </style>
</head>
<body>
    
<div class="form-container">

    <form autocomplete="off" action="" method="post">
        <h3>register now</h3>

        <?php

            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-message">'.$error.'</span>';
                }
            }

        ?>
    <div class="input-form">
        <input type="text" name="name" placeholder="Enter your Name:" required>
        <input type="email" name="email" placeholder="Enter your Email:" required>
        <input type="password" name="password" placeholder="Enter your Password" required>
        <input type="password" name="cpassword" placeholder="Confirm your Password" required>

        <select name="user_type" required>
            <option value="" selected disabled hidden>User_Type</option>
            <option value="Admin">Admin</option>
            <option value="Student">Student</option>
        </select>

        <select name="yas" required>
            <option value="" selected disabled hidden>Year and Section</option>
            <option value="Admin">Admin</option>
            <option value="1 A">1-A</option>
            <option value="1 B">1-B</option>
            <option value="1 C">1-C</option>
            <option value="1 D">1-D</option>
            <option value="2 A">2-A</option>
            <option value="2 B">2-B</option>
            <option value="2 C">2-C</option>
            <option value="2 D">2-D</option>
            <option value="3 A">3-A</option>
            <option value="3 B">3-B</option>
            <option value="3 C">3-C</option>
            <option value="3 D">3-D</option>
            <option value="4 A">4-A</option>
            <option value="4 B">4-B</option>
            <option value="4 C">4-C</option>
            <option value="4 D">4-D</option>
        </select>

        <select name="subject" required>
            <option value="" selected disabled hidden>Subject</option>
            <option value="Admin">Admin</option>
            <option value="CC_105">CC_105</option>
            <option value="NET_101">NET_101</option>
            <option value="WS_102">WS_102</option>
            <option value="IPT_101">IPT_101</option>
        </select>

        <input class="btn" type="submit" name="submit" value="submit now">
        <p>alredy have an account? <a href="login.php">login now</a></p>
    </form>
    </div>
</div>

</body>
</html>