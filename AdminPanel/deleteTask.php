<?php 
    include('../AdminPanel/connection.php'); 
?>
<?php
    $id= $_GET['id'];
    $sql = "DELETE FROM task WHERE id='$id'";
    $result = mysqli_query($conn, $sql); 
    if($result){
        echo "Deleted Successfully";
        header("location:index.php");
    }else {
        echo "ERROR";
    }
    ?> 
<?php
mysqli_close($conn);
?>