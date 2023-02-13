<?php
include('connection.php');
// Downloads files
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // fetch file to download from database
    $sql = "SELECT * FROM cropguiding WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    

    $file = mysqli_fetch_assoc($result);
    $filepath = 'assets/uploads/' . $file['files'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('assets/uploads/' . $file['files']));
        readfile('assets/uploads/' . $file['files']);

        // Now update downloads count
        // $newCount = $file['files'] + 1;
        // $updateQuery = "UPDATE cropguiding SET files=$newCount WHERE id=$id";
        // mysqli_query($conn, $updateQuery);
        header("location:viewCropGuiding.php");
        exit;
    }

}

?>