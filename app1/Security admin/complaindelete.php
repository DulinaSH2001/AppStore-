<?php
include 'connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

   
    $deleteSql = "DELETE FROM complain WHERE ID='$id'";
    if ($connect->query($deleteSql) === TRUE) {
        header("Location:ManageComplain.php");
        exit();
    } else {
        echo "Error deleting item: " . mysqli_connect_error();
    }
} else {
    echo "Error deleting item: ID not set.";
}
?>
 