<?php 
    include('connection.php'); 

    
?>
<?php
    $id= $_GET['id'];
    $sql = "DELETE FROM attendance WHERE id='$id'";
    $result = mysqli_query($conn, $sql); 
    if($result){
        echo "Deleted Successfully";
        header("location:viewAttendance.php");
    }else {
        echo "ERROR";
    }
?> 

