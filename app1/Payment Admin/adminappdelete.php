<?php
include 'connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the item from the wishlist
    $deleteSql1 = "DELETE FROM apps WHERE ID='$id'";
    if ($connect->query($deleteSql1) === TRUE) {

        $deleteSql2 = "DELETE FROM appstatus WHERE appID='$id'";
        if ($connect->query($deleteSql2) === TRUE) {
            header("Location:PublishedApp.php");
            exit();
        } else {
            echo "Error deleting item: " . mysqli_connect_error();
        }
    } else {
        echo "Error deleting item: " .mysqli_connect_error();
    }
}
?>
