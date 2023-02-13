<?php  
include('connection.php');
 if(isset($_POST["export"]))  
 {  
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=CropScouting.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array('Id', 'Date', 'Field', 'Details', 'Assign', 'Due Date'));  
    $query = "SELECT * from cropscouting WHERE date >= '".$start_date."' 
    AND date <= '".$end_date."'   ORDER BY id DESC";
    $result = mysqli_query($conn, $query);  
    while($row = mysqli_fetch_assoc($result))  
    {  
        fputcsv($output, $row);  
    }  
    fclose($output);  
 }  
 ?>  