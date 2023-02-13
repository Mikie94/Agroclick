<?php
include("connection.php");
$title = "View Expense";
include('header.php');
include('sidebar.php');


$sql = "SELECT * from expense";
$result = mysqli_query($conn, $sql); 
$id = "";
?>

?>
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row ">
                                <div class="col-12 col-md-12 col-lg-12 ">
                                    <form class="card card-sm" method="POST">
                                        <div class="card-body row no-gutters align-items-center ">
                                            <div class="col-auto ">
                                                <i class="fas fa-search h4 text-body "></i>
                                            </div>
                                            <div class="col-md-3 ">
                                                <input class="form-control form-control form-control-borderless ml-2 " name="searchid" type="search" placeholder="Search By Date">
                                            </div>
                                            <div class="col-auto ">
                                                <input class="btn btn-lg btn-primary ml-3"  type="submit" name="search" value="Search">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                
                            </div>
                            <div class="row mt-3">
                        <div class="col-lg-12">
                            <div class="row ">
                                <div class="col-12 col-md-12 col-lg-12 ">
                                    <form class="card card-sm" method="POST" action="exportExpense.php">
                                        <div class="card-body row no-gutters align-items-center ">
                                            <div class="col-auto ">
                                                <i class="fas fa-search h4 text-body "></i>
                                            </div>
                                            <div class="col-md-3 ">
                                                <input class="form-control form-control form-control-borderless ml-2 " name="start_date" type="search" placeholder="Enter Start Date" required>
                                            </div>
                                            <div class="col-md-3 ml-3">
                                                <input class="form-control form-control form-control-borderless ml-2 " name="end_date" type="search" placeholder="Enter End Date" required>
                                            </div>
                                            <div class="col-auto ">
                                                <input class="btn btn-lg btn-primary ml-3"  type="submit" name="export" value="Export Seasonal Report">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                
                            </div>


                            <?php
                                if(isset($_POST['search'])){
                                    $id = $_POST['searchid'];

                                    $query1 = "SELECT * FROM  expense WHERE date='$id'";
        
                                   ?>
                                    <div class="main-card mb-3 card mt-4">

                                        <div class="card-body">
                                            <h5 class="card-title">Expense Information</h5>
                                            <table class="mb-0 table table-bordered">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>#</th>
                                                        <th>Date</th>
                                                        <th>Cost Center</th>
                                                        <th>Details</th>
                                                        <th>Quantity</th>
                                                        <th>Unit Cost</th>
                                                        <th>Total Cost</th>
                                                        <th>Payroll Cost</th>
                                                        <th>Total</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    $query_run = mysqli_query($conn, $query1);
                                        
                                                    while($roww = mysqli_fetch_array($query_run)){
                                        
                                                ?>
                                                    <tr class="text-center">
                                                        <th scope="row"><?php echo $roww["id"] ?></th>
                                                        <td><?php echo $roww["date"] ?></td>
                                                        <td><?php echo $roww["costcenter"] ?></td>
                                                        <td><?php echo $roww["details"] ?></td>
                                                        <td><?php echo $roww["quantity"] ?></td>
                                                        <td><?php echo $roww["unitcost"] ?></td>
                                                        <td><?php echo $roww["totalcost"] ?></td>
                                                        <td><?php echo $roww["payrollcost"] ?></td>
                                                        <td><?php echo $roww["total"] ?></td>
                                                        <td> <a href="updateExpense.php?id=<?php echo $row['id'] ?>" class="btn btn-warning btn-sm ">Edit</a> &nbsp; &nbsp;<a href="deleteExpense.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm ">Delete</a></td>
                                                    </tr>
                                                    <?php 
                                                        }
                                                    }
                                                    ?> 
                                                </tbody>
                                            </table>
                                        </div>
                                        </div>
                                        
                            <?php
                            if($id == ""){
                            ?>
                            <div class="main-card mb-3 card mt-4">

                                <div class="card-body">
                                    <h5 class="card-title">Expense Information</h5>
                                    <table class="mb-0 table table-bordered">
                                        <thead>
                                                    <tr class="text-center">
                                                        <th>#</th>
                                                        <th>Date</th>
                                                        <th>Cost Center</th>
                                                        <th>Details</th>
                                                        <th>Quantity</th>
                                                        <th>Unit Cost</th>
                                                        <th>Total Cost</th>
                                                        <th>Payroll Cost</th>
                                                        <th>Total</th>
                                                        <th>Action</th>
                                                    </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (mysqli_num_rows( $result ) > 0) {
                                            
                                            while($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <tr class="text-center">
                                                        <th scope="row"><?php echo $row["id"] ?></th>
                                                        <td><?php echo $row["date"] ?></td>
                                                        <td><?php echo $row["costcenter"] ?></td>
                                                        <td><?php echo $row["details"] ?></td>
                                                        <td><?php echo $row["quantity"] ?></td>
                                                        <td><?php echo $row["unitcost"] ?></td>
                                                        <td><?php echo $row["totalcost"] ?></td>
                                                        <td><?php echo $row["payrollcost"] ?></td>
                                                        <td><?php echo $row["total"] ?></td>
                                                        <td> <a href="updateExpense.php?id=<?php echo $row['id'] ?>" class="btn btn-warning btn-sm ">Edit</a> &nbsp; &nbsp;<a href="deleteExpense.php?id=<?php echo $row['id'] ?>"  class="btn btn-danger btn-sm ">Delete</a></td>
                                                    </tr>
                                            <?php 
                                                }
                                            }
                                        }
                                            ?> 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <?php
include('footer.php');

?>