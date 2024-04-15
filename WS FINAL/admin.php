<?php
@include 'connection.php';

session_start();

if (!isset($_SESSION['admin_name'])) {
    header('location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="admin.css">
    <style>
       .table2-container{
            margin-left: 20px;
       }
       #searchInput{
        width: 400px;
        margin-left: 60px;
        margin-top: 20px;
        height: 30px;
        background: #0F0529;
        outline: none;
        border: none;
        border-radius: 5px;
        border-bottom: 2px solid gray;
        border-left: 2px solid gray;
       }
       #searchInput2{
        width: 400px;
        margin-left: 30px;
        margin-top: 20px;
        height: 30px;
        background: #0F0529;
        outline: none;
        border: none;
        border-radius: 5px;
        border-bottom: 2px solid gray;
        border-left: 2px solid gray;
       }
       .bx-search-alt{
        color: gray;
        position: absolute;
        font-size: 25px;
        margin-left: -40px;
        margin-top: 23px;
        width: 50px;
       }
    </style>
</head>

<body>

    <div class="container">

        <div class="content">
            <h1>Hi, <span>Admin</span></h1>
            <h1>Welcome <span><?php echo $_SESSION['admin_name']; ?></span></h1>
            <h1>PSAU ACCOUNT: <span><?php echo $_SESSION['admin_email']; ?></span></h1>
        </div>

        <h3>Student List</h3>
        <input type="text" id="searchInput" onkeyup="filterTable()" placeholder="Search by name or Gmail" style="color: #fff; font-weight: 700;">
        <i class='bx bx-search-alt'></i>
        <div class="table1-container">

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>USER_TYPE</th>
                        <th>YEAR & SECTION</th>
                        <th>SUBJECT</th>
                        <th>DATE</th>
                        <th>OPERATIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM ws_table_user";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo $row["user_type"]; ?></td>
                        <td><?php echo $row["yas"]; ?></td>
                        <td><?php echo $row["subject"]; ?></td>
                        <td><?php echo $row["date"]; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
                            <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <!--table1-->

        <h3>Computer parts List</h3>
        <input type="text" id="searchInput2" onkeyup="filterTable()" placeholder="Search by Gmail" style="color: #fff; font-weight: 700;">
        <i class='bx bx-search-alt'></i>
        <div class="table2-container">

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>MONITOR</th>
                        <th>KEYBOARD</th>
                        <th>MOUSE</th>
                        <th>RAM</th>
                        <th>HARD DISK</th>
                        <th>KEYCAPS</th>
                        <th>DATE</th>
                        <th>OPERATIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM computer_table";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["student_name"]; ?></td>
                        <td><?php echo $row["monitor"]; ?></td>
                        <td><?php echo $row["keyboard"]; ?></td>
                        <td><?php echo $row["mouse"]; ?></td>
                        <td><?php echo $row["ram"]; ?></td>
                        <td><?php echo $row["harddisk"]; ?></td>
                        <td><?php echo $row["keycaps"]; ?></td>
                        <td><?php echo $row["date"]; ?></td>
                        <td>
                            <a href="edit2.php?id=<?php echo $row['id']; ?>">Edit</a> |
                            <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <!--table2-->

    </div>

    <script>
        
    function filterTable() {
    var input1 = document.getElementById("searchInput").value.toLowerCase();
    var input2 = document.getElementById("searchInput2").value.toLowerCase();
    var rows1 = document.querySelectorAll(".table1-container tr");
    var rows2 = document.querySelectorAll(".table2-container tr");

    for (var i = 1; i < rows1.length; i++) {
        var name = rows1[i].getElementsByTagName("td")[1].innerText.toLowerCase();
        var gmail = rows1[i].getElementsByTagName("td")[2].innerText.toLowerCase();
        var date = rows1[i].getElementsByTagName("td")[6].innerText.toLowerCase();

        if (name.includes(input1) || gmail.includes(input1) || date.includes(input1)) {
            rows1[i].style.display = "";
        } else {
            rows1[i].style.display = "none";
        }
    }

    for (var i = 1; i < rows2.length; i++) {
        var name = rows2[i].getElementsByTagName("td")[1].innerText.toLowerCase();
        var gmail = rows2[i].getElementsByTagName("td")[2].innerText.toLowerCase();
        var date = rows2[i].getElementsByTagName("td")[8].innerText.toLowerCase();

        if (gmail.includes(input2) || date.includes(input2) || name.includes(input2)) {
            rows2[i].style.display = "";
        } else {
            rows2[i].style.display = "none";
        }
    }
}
</script>
</body>

</html>