<?php

include 'connection.php';
if(isset($_POST["edit"])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $user_type = $_POST['user_type'];
    $yas = $_POST['yas'];
    $subject = $_POST['subject'];
    $id = $_POST['id'];

    $sql = "UPDATE ws_table_user SET name = '$name', email = '$email', user_type = '$user_type', yas = '$yas', subject = '$subject' WHERE id = '$id'";
    if(mysqli_query($conn, $sql)){
        echo "Record Updated";
    }else{
        die("Something went wrong");
    }
    header('location:admin.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Form</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    
<div class="form-container">

<?php

if(isset($_GET["id"])){
    $id = $_GET["id"];
    include 'connection.php';
    $sql = "SELECT * FROM ws_table_user WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);


    ?>
    <div class="input-form">
        <form action="" method="post">
        <h3>Edit now</h3>


        <input type="text" name="name" value="<?php echo $row['name']; ?>" placeholder="name" required>
        <input type="email" name="email"  value="<?php echo $row['email']; ?>" placeholder="email" required>

        <select name="user_type">
            <option value="Admin" <?php if($row['user_type'] == "Admin"){echo "selected";} ?>>Admin</option>
            <option value="Student" <?php if($row['user_type'] == "Student"){echo "selected";} ?>>Student</option>
        </select>

        <select name="yas">
            <option value="1 A" <?php if($row['yas'] == "1-A"){echo "selected";} ?>>1-A</option>
            <option value="1 B" <?php if($row['yas'] == "1-B"){echo "selected";} ?>>1-B</option>
            <option value="1 C" <?php if($row['yas'] == "1-C"){echo "selected";} ?>>1-C</option>
            <option value="1 D" <?php if($row['yas'] == "1-D"){echo "selected";} ?>>1-D</option>
            <option value="2 A" <?php if($row['yas'] == "2-A"){echo "selected";} ?>>2-A</option>
            <option value="2 B" <?php if($row['yas'] == "2-B"){echo "selected";} ?>>2-B</option>
            <option value="2 C" <?php if($row['yas'] == "2-C"){echo "selected";} ?>>2-C</option>
            <option value="2 D" <?php if($row['yas'] == "2-D"){echo "selected";} ?>>2-D</option>
            <option value="3 A" <?php if($row['yas'] == "3-A"){echo "selected";} ?>>3-A</option>
            <option value="3 B" <?php if($row['yas'] == "3-B"){echo "selected";} ?>>3-B</option>
            <option value="3 C" <?php if($row['yas'] == "3-C"){echo "selected";} ?>>3-C</option>
            <option value="3 D" <?php if($row['yas'] == "3-D"){echo "selected";} ?>>3-D</option>
            <option value="4 A" <?php if($row['yas'] == "4-A"){echo "selected";} ?>>4-A</option>
            <option value="4 B" <?php if($row['yas'] == "4-B"){echo "selected";} ?>>4-B</option>
            <option value="4 C" <?php if($row['yas'] == "4-C"){echo "selected";} ?>>4-C</option>
            <option value="4 D" <?php if($row['yas'] == "4-D"){echo "selected";} ?>>4-D</option>
        </select>

        <select name="subject">
            <option value="CC_105" <?php if($row['subject'] == "CC_105"){echo "selected";} ?>>CC_105</option>
            <option value="NET_101" <?php if($row['subject'] == "NET_101"){echo "selected";} ?>>NET_101</option>
            <option value="WS_102" <?php if($row['subject'] == "WS_102"){echo "selected";} ?>>WS_102</option>
            <option value="IPT_101" <?php if($row['subject'] == "IPT_101"){echo "selected";} ?>>IPT_101</option>
        </select>

        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

        <input class="btn" type="submit" name="edit" value="edit now">
        <button class="btn"><a href="admin.php">Cancel</a></button>
    </form>
    </div>
    <?php
}

?>



    

</div>

</body>
</html>