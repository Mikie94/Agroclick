<?php 
    include('connection.php'); 
   
?>
<?php
    $id= $_GET['id'];
    $sql = "DELETE FROM user WHERE id='$id'";
    $result = mysqli_query($conn, $sql); 
    if($result){
        echo "Deleted Successfully";
        header("location:userRecords.php");
    }else {
        echo "ERROR";
    }
?> 

