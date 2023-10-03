<?php
include 'connect.php';

if (isset($_GET['id'])) {
    $appId = $_GET['id'];

    $query = "UPDATE appstatus SET Payment = 'OK' WHERE appID = '$appId'";
    $rs = mysqli_query($connect, $query);

    if ($rs) {
        header('Location: PaymentwantApprovalApp.php');
        exit();
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}
?>
