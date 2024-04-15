<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
    include 'connection.php';
    $sql = "DELETE FROM ws_table_user WHERE id = '$id'";
    if(mysqli_query($conn, $sql)){
        echo "Deleted";
    }
    header('location:admin.php');
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    include 'connection.php';
    $sql = "DELETE FROM computer_table WHERE id = '$id'";
    if(mysqli_query($conn, $sql)){
        echo "Deleted";
    }
    header('location:admin.php');
}

?>