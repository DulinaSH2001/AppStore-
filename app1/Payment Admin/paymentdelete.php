<?php
include 'connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the item from the wishlist
    $deleteSql = "DELETE FROM payments WHERE ID='$id'";
    if ($connect->query($deleteSql) === TRUE) {
        header("Location: paymentmanage.php");
        exit();
    } else {
        echo "Error deleting item: " . mysqli_connect_error();
    }
} else {
    echo "Error deleting item: ID not set.";
}
?>
 