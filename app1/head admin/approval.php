<?php
include 'connect.php';

if (isset($_GET['id'])) {
    $appId = $_GET['id'];

    $query = "UPDATE appstatus SET headadmin = 'OK' WHERE appID = '$appId'";
    $rs = mysqli_query($connect, $query);

    if ($rs) {
        header('Location: wantApprovalApp.php');
        exit();
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}
?>
