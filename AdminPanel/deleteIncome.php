<?php
include('connection.php');


?>
<?php
    $id= $_GET['id'];
    $sql = "DELETE FROM income WHERE id='$id'";
    $result = mysqli_query($conn, $sql); 
    if($result){
        echo "Deleted Successfully";
        header("location:viewIncome.php");
    }else {
        echo "ERROR";
    }
    ?> 
<?php
mysqli_close($conn);
?>