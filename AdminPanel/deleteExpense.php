<?php 
    include('connection.php'); 
  
?>
<?php
    $id= $_GET['id'];
    $sql = "DELETE FROM expense WHERE id='$id'";
    $result = mysqli_query($conn, $sql); 
    if($result){
        echo "Deleted Successfully";
        header("location:viewExpense.php");
    }else {
        echo "ERROR";
    }
?> 

