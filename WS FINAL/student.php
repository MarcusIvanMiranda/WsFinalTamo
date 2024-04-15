<?php
@include 'connection.php';

session_start();

if(!isset($_SESSION['student_name'])){
    header('locationlogin.php');
}

$name = $_SESSION['student_name'];
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the selected labels from the form
  $monitorLabel = $_POST['monitorStatus'];
  $keyboardLabel = $_POST['keyboardStatus'];
  $mouseLabel = $_POST['mouseStatus'];
  $ramLabel = $_POST['ramStatus'];
  $diskLabel = $_POST['hardDiskStatus'];
  $keycapsLabel = $_POST['keycapsStatus'];

  // Insert the data into the database table
  $sql = "INSERT INTO computer_table (student_name,monitor, keyboard, mouse, ram, harddisk, keycaps)
          VALUES ('$name','$monitorLabel', '$keyboardLabel', '$mouseLabel', '$ramLabel', '$diskLabel', '$keycapsLabel')";

  if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully.";
    // Redirect back to the login page
    header("Location: login.php");
    exit(); // Make sure to exit after performing the redirection
  } else {
    echo "Error: " . $conn->error;
  }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT</title>
    <link rel="stylesheet" href="student.css">
</head>
<body>
    
<div class="container">

    <div class="content">
        <h1>hi, <span>Student</span></h1>
        <h1>wlecome <span><?php echo $_SESSION['student_name'] ?></span></h1>
        <h1>PSAU ACCOUNT:  <span><?php echo $_SESSION['student_email'] ?></span></h1>
    </div>

    <div class="form-container">
    <h3>Select All Active Peripherals</h3>
    
    <div class="forms">
        <form action="#" method="post">
            <div class="input-form">
                <label for="monitor">Monitor</label>
                <input type="radio" id="monitor" name="monitorStatus" value="active" required>Active
                <input type="radio" id="monitor-inactive" name="monitorStatus" value="inactive">In-Active
            </div>

        <div class="input-form">
            <label for="keyboard">Keyboard</label>
            <input type="radio" id="keyboard" name="keyboardStatus" value="active" required>Active
            <input type="radio" id="keyboard-inactive" name="keyboardStatus" value="inactive">In-Active
        </div>

        <div class="input-form">
            <label for="mouse">Mouse</label>
            <input type="radio" id="mouse" name="mouseStatus" value="active" required>Active
            <input type="radio" id="mouse-inactive" name="mouseStatus" value="inactive">In-Active
        </div>

        <div class="input-form">
            <label for="ram">RAM</label>
            <input type="radio" id="ram" name="ramStatus" value="active" required>Active
            <input type="radio" id="ram-inactive" name="ramStatus" value="inactive">In-Active
        </div>

        <div class="input-form">
            <label for="hard-disk">Hard Disk</label>
            <input type="radio" id="hard-disk" name="hardDiskStatus" value="active" required>Active
            <input type="radio" id="hard-disk-inactive" name="hardDiskStatus" value="inactive">In-Active
        </div>

        <div class="input-form">
            <label for="keycaps">Keycaps</label>
            <input type="radio" id="keycaps" name="keycapsStatus" value="active" required>Active
            <input type="radio" id="keycaps-inactive" name="keycapsStatus" value="inactive">In-Active
        </div>
</div>

        <button type="submit">Submit</button>

    </form>
    </div>

</div>

</body>
</html>