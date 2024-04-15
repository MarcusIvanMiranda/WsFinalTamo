<?php
include 'connection.php';

if (isset($_POST["edit"])) {
    $monitor = $_POST['monitorStatus'];
    $keyboard = $_POST['keyboardStatus'];
    $mouse = $_POST['mouseStatus'];
    $ram = $_POST['ramStatus'];
    $harddisk = $_POST['hardDiskStatus'];
    $keycaps = $_POST['keycapsStatus'];
    $id = $_POST['id'];

    $sql = "UPDATE computer_table SET monitor='$monitor', keyboard='$keyboard', mouse='$mouse', ram='$ram', harddisk='$harddisk', keycaps='$keycaps' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Location: admin.php');
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM computer_table WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $monitor = $row['monitor'];
        $keyboard = $row['keyboard'];
        $mouse = $row['mouse'];
        $ram = $row['ram'];
        $harddisk = $row['harddisk'];
        $keycaps = $row['keycaps'];
    } else {
        echo "No record found";
    }
} else {
    echo "Invalid request";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Computer Parts</title>
    <link rel="stylesheet" href="update.css">
</head>

<body>

    <div class="form-container">
        <h1>Edit Computer Parts</h1>

        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label class="label" for="monitorStatus">Monitor:</label>
                <label class="input"><input type="radio" name="monitorStatus" value="Active" <?php if ($monitor == 'Active') echo 'checked'; ?>> Active</label>
                <label class="input"><input type="radio" name="monitorStatus" value="In-Active" <?php if ($monitor == 'In-Active') echo 'checked'; ?>> In-Active</label>
            </div>
            <div class="form-group">
                <label class="label" for="keyboardStatus">Keyboard:</label>
                <label class="input"><input type="radio" name="keyboardStatus" value="Active" <?php if ($keyboard == 'WorActiveking') echo 'checked'; ?>> Active</label>
                <label class="input"><input type="radio" name="keyboardStatus" value="In-Active" <?php if ($keyboard == 'In-Active') echo 'checked'; ?>> In-Active</label>
            </div>
            <div class="form-group">
                <label class="label" for="mouseStatus">Mouse:</label>
                <label class="input"><input type="radio" name="mouseStatus" value="Active" <?php if ($mouse == 'Active') echo 'checked'; ?>> Active</label>
                <label class="input"><input type="radio" name="mouseStatus" value="In-Active" <?php if ($mouse == 'In-Active') echo 'checked'; ?>> In-Active</label>
            </div>
            <div class="form-group">
                <label class="label" for="ramStatus">RAM:</label>
                <label class="input"><input type="radio" name="ramStatus" value="Active" <?php if ($ram == 'WorkActiveing') echo 'checked'; ?>> Active</label>
                <label class="input"><input type="radio" name="ramStatus" value="In-Active" <?php if ($ram == 'In-Active') echo 'checked'; ?>> In-Active</label>
            </div>
            <div class="form-group">
                <label class="label" for="hardDiskStatus">Hard Disk:</label>
                <label class="input"><input type="radio" name="hardDiskStatus" value="Active" <?php if ($harddisk == 'Active') echo 'checked'; ?>> Active</label>
                <label class="input"><input type="radio" name="hardDiskStatus" value="In-Active" <?php if ($harddisk == 'In-Active') echo 'checked'; ?>> In-Active</label>
            </div>

            <div class="form-group">
                <label class="label" for="keycapsStatus">Keycaps:</label>

                <label class="input"><input type="radio" name="keycapsStatus" value="Active" <?php if ($keycaps == 'Active') echo 'checked'; ?>>Active</label>

                <label class="input"><input type="radio" name="keycapsStatus" value="In-Active" <?php if ($keycaps == 'In-Active') echo 'checked'; ?>> In-Active</label>
            </div>
            
            
        </form>
        <div class="btn">
            <button type="submit" name="edit">edit now</button>
            </div>

    </div>

</body>

</html>