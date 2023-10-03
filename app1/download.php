<?php
if (isset($_GET['id'])) {
    $appId = $_GET['id'];

    include 'connect.php';
    $sql = "SELECT APK FROM apps WHERE ID = '$appId'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $apkFilePath = $row["APK"];

        // Set appropriate headers
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=" . basename($apkFilePath));
        header("Content-Length: " . filesize($apkFilePath));

        // Read the file and output it to the user
        readfile($apkFilePath);

        // Redirect to the homepage after file download
        header("Location: homepage.php");
        exit;
       
    }
}
?>
