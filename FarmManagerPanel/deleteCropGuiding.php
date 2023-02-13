<?php 
    include('../AdminPanel/connection.php'); 
?>
<?php
    $id= $_GET['id'];
    $sql = "DELETE FROM cropguiding WHERE id='$id'";
    $result = mysqli_query($conn, $sql); 
    if($result){
        echo "Deleted Successfully";
        header("location:viewCropGuiding.php");
    }else {
        echo "ERROR";
    }
    ?> 
<?php
mysqli_close($conn);
?>